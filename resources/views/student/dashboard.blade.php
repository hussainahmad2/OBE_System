<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/FUSSTLogo.jpg') }}">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Sidebar Styles */
        .sidebar {
            height: auto;
            background: linear-gradient(to bottom, #3C9AA5, #23546B);
            color: white;
            padding-top: 70px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            border: none;
            text-align: left;
            transition: background-color 0.3s, transform 0.2s;
        }
        .sidebar a:hover {
            text-decoration: underline;
            transform: scale(1.05);
        }
        .btn-sidebar {
            width: 100%;
            margin-bottom: 10px;
            text-align: left;
            background: #23546B;
            padding-top: 10px;
        }
        .btn-sidebar.active {
            background: linear-gradient(to right, #3C9AA5, #23546B);
        }
        .mainbar{

        }

        /* Navbar and Page Layout */
        body {
            background-color: #E2ECF2 ;
        }
        .navbar {
            background: linear-gradient(to bottom, #23546B, #3C9AA5);
        }
        .logo {
            max-width: 300px;
            border-radius: 30px;
            mix-blend-mode: color-burn;
        }
        form {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px; /* Rounded corners for the form */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
            margin-top: 50px;
        }
        label {
            font-weight: bold;
            color: black;
        }
        input[type="text"], input[type="email"], 
        input[type="password"],  select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        input[type="submit"] {
            background-color: #3C9AA5;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #23546B;
        }
        .icon-container {
            display: flex;
            flex-direction: row;
            align-items: flex-end; /* Aligns icons to the right */
            margin-left: auto; /* Pushes the icons to the far right */
        }
        .icon-container a {
            color: white;
            font-size: 24px;
            margin: 0 10px;
        }
        .mobilemenu{
                display: none;
        }
        .heading{
            margin: 50px 50px 50px 0;
        }




          @media (max-width: 768px) {
            .logo {
            max-width: 200px;
            border-radius: 30px;
            mix-blend-mode: color-burn;
            }
            .sidebar{
                padding-top: 0;
                height: auto;
            }
            .text-center{
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>

<!-- Navbar -->
<div class="container-fluid p-0">
    <nav class="col-md-12 col-lg-12 navbar ">
        <div class="container-fluid">
            <img src="{{ asset('img/logo_wn.png') }}" alt="FUI Logo" class="logo img-fluid" >
            <div class="icon-container">
                <a href="admin_main.php">
                    <i class="fas fa-home"></i>
                </a>
                <a href="https://fusst.fui.edu.pk/" title="Information">
                    <i class="fas fa-info-circle"></i>
                </a>
                <a href="#" title="fusst@fui.edu.pk" data-toggle="tooltip" data-placement="left">
                    <i class="fas fa-envelope"></i>
                </a>
            </div>
        </div>
    </nav>

    <div class="row m-0" >
        <!-- Sidebar Section -->
        <div class="col-md-3 col-lg-2 sidebar">
            <button class="btn btn-sidebar font-weight-bold" data-toggle="collapse" style="color: white" data-target="#facultyMenu">Detail</button>
            <div id="facultyMenu" class="collapse">
                <a href="#" class="d-block pl-4 py-1">Result</a>
            </div>


            <form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            
            <button class="btn btn-sidebar font-weight-bold" style="color: white" onclick="document.getElementById('logout-form').submit();">
                Sign out
            </button>
        </div>

        <!-- Main Content Section -->
        <div class="container">
            <h2 class="heading">Select Cources Registration</h2>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        
            <!-- Semester Selection -->
            {{-- <div class="mb-3">
                <label>Select Semester:</label>
                @for ($i = 1; $i <= 8; $i++)
                    <input type="checkbox" name="semester[]" value="{{ $i }}" class="semester-checkbox" 
                           @if(in_array($i, [6,7,8])) checked @endif> {{ $i }}th Semester
                @endfor
            </div> --}}
        
            <!-- Course Registration Form -->
            {{-- <div class="row"> --}}
                <form class="col-12 col-md-12" action="{{ route('courses.register') }}" method="POST">
                    @csrf
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Course Name</th>
                                <th>Teacher Name</th>
                                <th>Class</th>
                                <th>Register</th>
                                
                            </tr>
                        </thead>
                        <tbody id="course-list">
                            @foreach ($courses as $index => $course)
                                <tr data-semester="{{ $course->semester }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $course->course->name }} ({{ $course->course->code }})</td>
                                    <td>{{ $course->faculty->user->name }}</td>
                                    <td>
                                        @if(empty($course->section))
                                            -
                                        @else
                                            {{ $course->batch }} - {{ $course->section }}
                                        @endif
                                    </td>
                                    
                                    <!-- Hidden input fields to store IDs -->
                                    <input type="hidden" name="teacher_ids[]" value="{{ $course->faculty->user_id }}">
                                    <input type="hidden" name="course_ids[]" value="{{ $course->course_id }}">
                                    <input type="hidden" name="course_allocation_ids[]" value="{{ $course->id }}">
                                    <input type="hidden" name="student_id" value="{{ $coreuser->id }}">
                                    <td>
                                        <input type="checkbox" name="selected_courses[]" value="{{ $course->id }}" class="course-checkbox">
                                    </td>
                                </tr>
                                {{-- <tr data-semester="{{ $course->semester }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $course->course->name }} ({{ $course->course->code }})</td>
                                    <td>{{ $course->faculty->user->name }}</td>
                                    <td>{{ $course->batch }} - {{ $course->section }}</td>

                                    <!-- Use course_allocation_id as the key for related data -->
                                    <input type="hidden" name="course_data[{{ $course->id }}][teacher_id]" value="{{ $course->faculty->user_id }}">
                                    <input type="hidden" name="course_data[{{ $course->id }}][course_id]" value="{{ $course->course_id }}">
                                    <input type="hidden" name="course_data[{{ $course->id }}][allocation_id]" value="{{ $course->id }}">
                                    <input type="hidden" name="student_id" value="{{ $coreuser->id }}">

                                    <td>
                                        <input type="checkbox" name="selected_courses[]" value="{{ $course->id }}" class="course-checkbox">
                                    </td>
                                </tr> --}}
                            @endforeach
                        </tbody>
                    </table>

                    <h2 class="heading text-center">Registered Courses Status</h2>

                    @if($courseRegistration->isNotEmpty()) 
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S#</th>
                                    <th>Course Title</th>
                                    <th>Class</th>
                                    <th>Faculty</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courseRegistration as $index => $registration)
                                    <tr>
                                        <td>{{ $index + 1 }}</td> <!-- Serial Number -->
                                        <td>{{ $registration->course->name }} ({{ $registration->course->code }})</td> <!-- Course Title -->
                                        <td>{{ $registration->courseAllocation->batch }} - {{ $registration->courseAllocation->section }}</td> <!-- Class -->
                                        <td>{{ $registration->courseAllocation->faculty->user->name ?? 'N/A' }}</td> <!-- Faculty Name -->
                                        <td>{{ ucfirst($registration->status) }}</td> <!-- Status with First Letter Capitalized -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center">courses not registered yet.</p>
                    @endif
                
                    <p><strong>Selected Courses:</strong> <span id="selected-courses">0</span></p>
                
                    <button type="submit" class="btn btn-primary">Register Selected Courses</button>
                </form>
                
        </div>
        
        <!-- JavaScript to Handle Selection -->
        
        
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".mobilemenu").click(function() {
            $(".sidebar").toggleClass("active"); // Toggle sidebar visibility
            $(this).toggleClass("fa-bars fa-times"); // Toggle menu icon (bars ↔ close)
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let checkboxes = document.querySelectorAll('.course-checkbox');
        let selectedCourses = document.getElementById('selected-courses');
        let totalCredits = document.getElementById('total-credits');

        function updateCounts() {
            let selected = 0;
            let credits = 0;
            checkboxes.forEach(chk => {
                if (chk.checked) {
                    selected++;
                    credits += parseInt(chk.closest('tr').querySelector('td:nth-child(5)').textContent);
                }
            });
            selectedCourses.textContent = selected;
            totalCredits.textContent = credits;
        }

        checkboxes.forEach(chk => chk.addEventListener('change', updateCounts));
        updateCounts();
    });
</script>
</body>
</html>





























