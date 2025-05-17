@section('title', 'QEC List')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QEC List</title>

    
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/FUSSTLogo.jpg') }}">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* Sidebar Styles */
        .sidebar {
            height: auto;
            background: linear-gradient(to bottom, #3C9AA5, #23546B);
            color: white;
            padding-top: 30px;
            min-height: 100vh;
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

        /* Navbar and Page Layout */
        body {
            background-color: #E2ECF2;
        }
        .navbar {
            background: linear-gradient(to bottom, #23546B, #3C9AA5);
        }
        .logo {
            max-width: 300px;
            border-radius: 30px;
            mix-blend-mode: color-burn;
        }
        .icon-container {
            display: flex;
            flex-direction: row;
            align-items: flex-end;
            margin-left: auto;
        }
        .icon-container a {
            color: white;
            font-size: 24px;
            margin: 0 10px;
        }

        /* Table Styling */
        .faculty-table {
            width: 100%;
            margin-top: 20px;
            background-color: #ffffff;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .faculty-table th, .faculty-table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }
        .faculty-table th {
            background-color: #23546B;
            color: #ffffff;
            font-weight: bold;
        }
        .faculty-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .faculty-table tr:hover {
            background-color: #d3eaf2;
            cursor: pointer;
        }
        .search-container {
        display: flex;
        align-items: center;
        border-bottom: 2px solid #23546B; /* Underline effect */
        padding: 5px;
        width: 100%;
        max-width: 400px; /* Adjust as needed */
    }

        .search-container input {
            flex: 1;
            border: none;
            background: transparent;
            outline: none;
            font-size: 16px;
            padding: 5px;
            color: #23546B; /* Text color */
        }

        .search-container input::placeholder {
            color: #23546B;
            opacity: 0.7;
        }

        .search-container button {
            background-color: #23546B;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }

        .search-container button:hover {
            background-color: #1D4256;
        }

        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                padding: 10px;
            }
            .logo {
            max-width: 200px;
            border-radius: 30px;
            mix-blend-mode: color-burn;
            }
            .table-responsive {
                overflow-x: auto;
            }
            .textnone{
                display: none;
            }
        }

        .btn-sidebar.student-management-fix {
            white-space: nowrap;
            font-size: 1rem;
            padding-top: 10px;
            padding-bottom: 10px;
        }
    </style>
</head>

<body>

<!-- Navbar -->
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

<div class="container-fluid">
    <div class="row">
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
        <div class="col-md-9 col-lg-10 mt-4 px-4">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="search d-flex justify-content-between">
                <h2 class="textnone">QEC List</h2>
                <form method="GET" action="{{ route('QualityEnhancementCell.list') }}" class="search-container" onsubmit="return false;">
                    <input type="text" id="qec-search" name="search" placeholder="Search QEC..." value="{{ request('search') }}" autocomplete="off" />
                    <button type="button" style="background-color: #23546B; color: white; border: none; padding: 8px 15px; border-radius: 5px; cursor: pointer;">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="table-responsive">
                <table class="faculty-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($qualityenhancementcells as $qualityenhancementcell)
                            <tr>
                                <td>{{ $qualityenhancementcell->name }}</td>
                                <td>{{ $qualityenhancementcell->email }}</td>
                                <td>
                                    <a href="{{ route('edit.QualityEnhancementCell', $qualityenhancementcell->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('delete.QualityEnhancementCell', $qualityenhancementcell->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Initialize Bootstrap tooltips
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('qec-search');
        const table = document.querySelector('.faculty-table tbody');
        searchInput.addEventListener('input', function() {
            const filter = searchInput.value.toLowerCase();
            const rows = table.querySelectorAll('tr');
            rows.forEach(row => {
                const name = row.children[0].textContent.toLowerCase();
                const email = row.children[1].textContent.toLowerCase();
                if (name.includes(filter) || email.includes(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>

</body>
</html>
