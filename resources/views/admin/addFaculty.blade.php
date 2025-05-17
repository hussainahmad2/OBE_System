@section('title', 'Add Faculty')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Faculty</title>
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
            height: 100vh;
            background: linear-gradient(to bottom, #3C9AA5, #23546B);
            color: white;
            padding-top: 30px;
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

        .btn-sidebar.student-management-fix {
            white-space: nowrap;
            font-size: 1rem;
            padding-top: 10px;
            padding-bottom: 10px;
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
                font-size: 1rem;
            }
            .main-div{
                padding-right: 10px;
                padding-left: 10px;
            }
            input[type="text"], input[type="email"], 
            input[type="password"],  select, textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 5px;
                border-radius: 5px;
                border: 1px solid #ddd;
            }
        }
    </style>
</head>

<body>

<!-- Navbar -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg" style="background: linear-gradient(to bottom, #3C9AA5, #23546B);">
        <div class="container-fluid d-flex align-items-center justify-content-center" style="gap: 20px;">
            <img src="{{ asset('img/logo.jpeg') }}" alt="FUI Logo" class="logo img-fluid" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
            <span class="logo-heading text-center" style="font-size: 2rem; font-weight: bold; color: #fff; flex: 1;">Foundation University Rawalpindi</span>
            <div class="icon-container" style="margin-left: auto;">
                <a href="https://fusst.fui.edu.pk/" title="Home" target="_blank">
                    <i class="fas fa-home"></i>
                </a>
                <a href="https://fusst.fui.edu.pk/" title="Information" target="_blank">
                    <i class="fas fa-info-circle"></i>
                </a>
                <a href="https://fusst.fui.edu.pk/index.php/aboutus/about-campus/contact-us" title="Contact Us" target="_blank" data-toggle="tooltip" data-placement="left">
                    <i class="fas fa-envelope"></i>
                </a>
            </div>
        </div>
    </nav>

    <div class="row m-0" >
        <!-- Sidebar Section -->
        <div class="col-md-3 col-lg-2 sidebar">
            <button class="btn btn-sidebar font-weight-bold" data-toggle="collapse" style="color: white" data-target="#facultyMenu">Faculty Management</button>
            <div id="facultyMenu" class="collapse">
                <a href="{{ route('faculty.list') }}" class="d-block pl-4 py-1">Faculty List</a>
                <a href="{{ route('add.faculty') }}" class="d-block pl-4 py-1">Add Faculty</a>
            </div>

            <!-- Student Management Section -->
            <button class="btn btn-sidebar font-weight-bold student-management-fix" data-toggle="collapse" style="color: white" data-target="#studentMenu">Student Management</button>
            <div id="studentMenu" class="collapse">
                <a href="{{ route('student.list') }}" class="d-block pl-4 py-1">Student List</a>
                <a href="{{ route('add.student') }}" class="d-block pl-4 py-1">Add Student</a>
            </div>

            <button class="btn btn-sidebar font-weight-bold" data-toggle="collapse" style="color: white" data-target="#qecMenu">QEC Management</button>
            <div id="qecMenu" class="collapse">
                <a href="{{ route('QualityEnhancementCell.list') }}" class="d-block pl-4 py-1">QEC List</a>
                <a href="{{ route('add.QualityEnhancementCell') }}" class="d-block pl-4 py-1">Add QEC</a>
            </div>


            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            
            <button class="btn btn-sidebar font-weight-bold" style="color: white" onclick="document.getElementById('logout-form').submit();">
                Sign out
            </button>
        </div>

        <!-- Main Content Section -->
       
        <div class="col-md-9 col-lg-10 d-flex justify-content-center align-items-start main-div">
            <div class="adjust">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form id="facultyForm" method="POST" action="{{ route('register.faculty'    ) }}" autocomplete="off" novalidate>
                    <h2 class="text-center">Add Faculty</h2>
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input type="text" id="name" name="name" placeholder="Name">
                            <p class="text-danger" id="nameError" style="text-align: left;"></p>
                            <p class="text-danger" style="text-align: left;">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="email" id="email" name="email" placeholder="Email" required autocomplete="off">
                            <p class="text-danger" id="emailError" style="text-align: left;"></p>
                            <p class="text-danger" style="text-align: left;">{{ $errors->first('email') }}</p>
                        </div>
                    </div>
                
                
                    <div class="row">
                        <div class="col-md-6">
                            <input type="password" id="password" name="password" placeholder="Password" required autocomplete="new-password" minlength="8" maxlength="32" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!@#$%^&*()_+\-=\[\]{};':\">
                            <div id="password-strength" style="font-weight:bold; display:none;"></div>
                            <p class="text-danger" id="passwordError" style="text-align: left;"></p>
                            <p class="text-danger" style="text-align: left;">{{ $errors->first('password') }}</p>
                        </div>
                
                    <!-- New Department Dropdown -->
                        <div class="col-md-6">
                            <select id="department" name="department" required>
                                <option value="" disabled selected>Select Department</option>
                                <option value="Information Technology">Information Technology</option>
                            </select>
                            <p class="text-danger" id="departmentError" style="text-align: left;"></p>
                            <p class="text-danger" style="text-align: left;">{{ $errors->first('department') }}</p>
                        </div>
                    </div>

                    <!-- Add Primary Role Dropdown -->
                    <div class="mb-4">
                        <label class="block font-bold">Primary Designation</label>
                        <select name="designation" id="designation" required class="w-full p-2 border rounded">
                            <option value="" disabled selected>Select Designation</option>
                            @foreach($primaryRoles as $role)
                                <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                            @endforeach
                        </select>
                        <p class="text-danger" id="designationError" style="text-align: left;"></p>
                    </div>

                    <!-- Add Duties Checkboxes -->
                    <div class="mb-4">
                        <label class="block font-bold">Additional Duties</label>
                        @foreach($dutyRoles as $duty)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="duties[]" value="{{ $duty->id }}" id="duty{{ $duty->id }}">
                                <label class="form-check-label" for="duty{{ $duty->id }}">{{ $duty->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <input type="submit" value="Submit"> 
        
                
                    
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".mobilemenu").click(function() {
            $(".sidebar").toggleClass("active"); // Toggle sidebar visibility
            $(this).toggleClass("fa-bars fa-times"); // Toggle menu icon (bars ↔ close)
        });
    });

    // Professional client-side validation for Add Faculty form
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('facultyForm');
        const name = document.getElementById('name');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const department = document.getElementById('department');
        const designation = document.getElementById('designation');

        const nameError = document.getElementById('nameError');
        const emailError = document.getElementById('emailError');
        const passwordError = document.getElementById('passwordError');
        const departmentError = document.getElementById('departmentError');
        const designationError = document.getElementById('designationError');

        function validateName() {
            const value = name.value.trim();
            if (!value) {
                nameError.textContent = 'Name is required.';
                return false;
            } else if (!/^[A-Za-z ]+$/.test(value)) {
                nameError.textContent = 'Name can only contain letters and spaces.';
                return false;
            } else if (value.length < 3) {
                nameError.textContent = 'Name must be at least 3 characters.';
                return false;
            }
            nameError.textContent = '';
            return true;
        }

        function validateEmail() {
            const value = email.value.trim();
            if (!value) {
                emailError.textContent = 'Email is required.';
                return false;
            } else if (!/^\S+@\S+\.\S+$/.test(value)) {
                emailError.textContent = 'Please enter a valid email address.';
                return false;
            }
            emailError.textContent = '';
            return true;
        }

        function validatePassword() {
            const value = password.value;
            if (!value) {
                passwordError.textContent = 'Password is required.';
                return false;
            } else if (value.length < 6) {
                passwordError.textContent = 'Password must be at least 6 characters.';
                return false;
            } else if (!/[A-Za-z]/.test(value) || !/[0-9]/.test(value)) {
                passwordError.textContent = 'Password must contain at least one letter and one number.';
                return false;
            }
            passwordError.textContent = '';
            return true;
        }

        function validateDepartment() {
            if (!department.value) {
                departmentError.textContent = 'Please select a department.';
                return false;
            }
            departmentError.textContent = '';
            return true;
        }

        function validateDesignation() {
            if (!designation.value) {
                designationError.textContent = 'Please select a designation.';
                return false;
            }
            designationError.textContent = '';
            return true;
        }

        name.addEventListener('input', validateName);
        email.addEventListener('input', validateEmail);
        password.addEventListener('input', validatePassword);
        department.addEventListener('change', validateDepartment);
        designation.addEventListener('change', validateDesignation);

        form.addEventListener('submit', function(e) {
            let valid = true;
            if (!validateName()) valid = false;
            if (!validateEmail()) valid = false;
            if (!validatePassword()) valid = false;
            if (!validateDepartment()) valid = false;
            if (!validateDesignation()) valid = false;
            if (!valid) {
                e.preventDefault();
            }
        });

        const passwordInput = document.getElementById('password');
        const strengthDiv = document.getElementById('password-strength');
        passwordInput.addEventListener('input', function() {
            const val = passwordInput.value;
            if (!val) {
                strengthDiv.style.display = 'none';
                strengthDiv.textContent = '';
                return;
            }
            let strength = '';
            let color = '';
            if (val.length < 8) {
                strength = 'Weak'; color = 'red';
            } else if (/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!@#$%^&*()_+\-=\[\]{};':\",.<>/?]{8,}$/.test(val)) {
                if (val.length >= 12 && /[!@#$%^&*()_+\-=\[\]{};':\",.<>/?]/.test(val)) {
                    strength = 'Excellent'; color = 'green';
                } else {
                    strength = 'Strong'; color = 'orange';
                }
            } else {
                strength = 'Weak'; color = 'red';
            }
            strengthDiv.textContent = strength;
            strengthDiv.style.color = color;
            strengthDiv.style.display = 'block';
        });
    });
</script>
</body>
</html>





























