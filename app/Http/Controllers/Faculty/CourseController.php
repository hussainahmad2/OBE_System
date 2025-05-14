<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \App\Models\Faculty;
use App\Models\Role;
use \App\Models\Stu;
use \App\Models\Course;
use \App\Models\course_content_point;
use \App\Models\course_content;
use \App\Models\course_outcome;
use \App\Models\course_detail;
use \App\Models\practical_outcome;
use \App\Models\CourseAllocation;
use \App\Models\AdvisorClassAssignment;

class CourseController extends Controller
{
 
    public function courselist(){   
        $user = Auth::user();
        $faculty = Faculty::where('user_id', $user->id)->first();
        $designation = $faculty->designation;
        $duties = Role::whereIn('id', json_decode($faculty->duties))->get();
        $primaryTasks = Role::find($user->role_id)->tasks;
        $dutyTasks = $duties->flatMap->tasks;
        $courses = Course::whereIn('semester', [1])->get();
        // dd($courses);
        return view('lecturar.program_manager.course_list' , compact('primaryTasks', 'duties', 'dutyTasks' ,'designation' , 'courses' ));      
    }

    public function courselist_detail($id){
        
        $user = Auth::user();
        $faculty = Faculty::where('user_id', $user->id)->first();
        $designation = $faculty->designation;
        $duties = Role::whereIn('id', json_decode($faculty->duties))->get();
        $primaryTasks = Role::find($user->role_id)->tasks;
        $dutyTasks = $duties->flatMap->tasks;
        $courses_detail = Course::with(  'course_detail','course_outcome','course_content','course_content_point','practical_outcome')->where('id', $id)->first();
        // dd($courses_detail);
        return view('lecturar.program_manager.course_detail' , compact('primaryTasks', 'duties', 'dutyTasks' ,'designation' ,'courses_detail'));      
    }

    public function getCoursesBySemester(Request $request) {
        $selectedSemesters = $request->input('semesters', []);
        
        $courses = empty($selectedSemesters) 
            ? Course::all() 
            : Course::whereIn('semester', $selectedSemesters)->get();
    
            // dd($courses);
        return response()->json($courses); // Direct return, no data wrapper
    }

    public function facultylist(){
        
        $user = Auth::user();
        $faculty = Faculty::where('user_id', $user->id)->first();
        $facultylist = Faculty::with('user')->get();
        $designation = $faculty->designation;
        $duties = Role::whereIn('id', json_decode($faculty->duties))->get();
        $primaryTasks = Role::find($user->role_id)->tasks;
        $dutyTasks = $duties->flatMap->tasks;   
        return view('lecturar.program_manager.faculty' , compact('primaryTasks', 'duties', 'dutyTasks' ,'designation'  , 'facultylist' ));      
    }

    public function courseallocate()
    {
        $user = Auth::user();
        $faculty = Faculty::where('user_id', $user->id)->first();
        $facultylist = Faculty::all();
        $designation = $faculty->designation;
        $duties = Role::whereIn('id', json_decode($faculty->duties))->get();
        $primaryTasks = Role::find($user->role_id)->tasks;
        $dutyTasks = $duties->flatMap->tasks;
        $courses = Course::all();
        $faculties = Faculty::with('user')->get();

        return view('lecturar.program_manager.assign_faculty', compact('courses', 'faculties' , 'primaryTasks', 'duties', 'dutyTasks' ,'designation' ,'facultylist'));
    }

    public function Assignadvisor()
    {
        $user = Auth::user();
        $faculty = Faculty::where('user_id', $user->id)->first();
        $facultylist = Faculty::all();
        $designation = $faculty->designation;
        $duties = Role::whereIn('id', json_decode($faculty->duties))->get();
        $primaryTasks = Role::find($user->role_id)->tasks;
        $dutyTasks = $duties->flatMap->tasks;
        $courses = Course::all();

        // Step 1: Get all advisor_ids from AdvisorClassAssignment
        $assignedAdvisorIds = AdvisorClassAssignment::pluck('advisor_id');

        // Step 2: Get faculties with duty 11, and exclude the ones already assigned
        $faculties = Faculty::with('user')
            ->where('duties', 'like', '%\\\"11\\\"%')  // Escaped JSON string match
            ->whereNotIn('user_id', $assignedAdvisorIds)   // Filter out already assigned
            ->get();

            // dd($assignedAdvisorIds);
        // $faculties = Faculty::with('user')
        // ->where('duties', 'like', '%\\\"11\\\"%')
        // ->get();


        return view('lecturar.program_manager.AssignCourceAdvisor', compact('courses', 'faculties' , 'primaryTasks', 'duties', 'dutyTasks' ,'designation' ,'facultylist'));
    }


    public function courseAllocateStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'faculty_id' => 'required|exists:faculties,id',
            'batch' => 'required|string',
            'section' => 'required|string'
        ]);

        CourseAllocation::create([
            'course_id' => $request->course_id,
            'faculty_id' => $request->faculty_id,
            'batch' => $request->batch,
            'section' => $request->section,
        ]);

        return redirect()->back()->with('success', 'Course allocated successfully.');
    }
   
   
    public function Assignadvisorstore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'faculty_id' => 'required',
            'batch' => 'required|string',
            'section' => 'required|string'
        ]);

        AdvisorClassAssignment::create([
            'advisor_id' => $request->faculty_id,
            'batch' => $request->batch,
            'section' => $request->section,
        ]);

        return redirect()->back()->with('success', 'Course allocated successfully.');
    }


    public function create()
    {

        $user = Auth::user();
        $faculty = Faculty::where('user_id', $user->id)->first();
        $facultylist = Faculty::all();
        $designation = $faculty->designation;
        $duties = Role::whereIn('id', json_decode($faculty->duties))->get();
        $primaryTasks = Role::find($user->role_id)->tasks;
        $dutyTasks = $duties->flatMap->tasks;
        $courses = Course::all();
        $faculties = Faculty::with('user')->get();
        return view('lecturar.program_manager.create_course' , compact('courses', 'faculties' , 'primaryTasks', 'duties', 'dutyTasks' ,'designation' ,'facultylist'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:courses,code',
            'semester' => 'required|string|max:50',
            'batch' => 'required|string|max:50',
            'section' => 'required|string|max:10',
        ]);

        

        Course::create([
            'name' => $request->name,
            'code' => $request->code,
            'semester' => $request->semester,
            'pre_req' => $request->pre_req,
            'Credit_Hours' => $request->Credit_Hours,
            'Status' => $request->Status,
        ]);

        return redirect()->back()->with('success', 'Course created successfully.');
    }
}