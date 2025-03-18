<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <title>DentalCare | Dentist</title>

    <style>
        :root {
            --primary-color: #345D95;
            --primary-light: #e8f0fe;
            --primary-dark: #264573;
            --secondary-color: #6c757d;
            --success-color: #4caf50;
            --error-color: #f44336;
            --warning-color: #ff9800;
            --text-color: #333;
            --light-gray: #f8f9fa;
            --border-color: #e0e0e0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .text-default,
        .text-default:hover,
        .text-default:focus,
        .text-default:active {
            color: var(--primary-color);
        }

        .btn-default,
        .btn-default:hover,
        .btn-default:focus,
        .btn-default:active {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-default:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 93, 149, 0.2);
        }

        .bg-default {
            background-color: var(--primary-color);
        }

        /* Navbar styling */
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
            background-color: white !important;
            z-index: 1030;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        nav .dropdown-toggle::after {
            content: none;
        }

        .dropdown-menu {
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--border-color);
            padding: 10px;
        }

        .dropdown-item {
            border-radius: 6px;
            padding: 8px 15px;
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background-color: var(--primary-light);
            color: var(--primary-color);
        }

        /* Sidebar styling */
        .sidebar {
            background: linear-gradient(to bottom, var(--primary-color), var(--primary-dark));
            color: white;
            height: calc(100vh - 76px);
            overflow-y: auto;
            transition: all 0.3s ease;
            z-index: 1020;
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-link:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }

        .nav-link.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.2);
            font-weight: 600;
        }

        .nav-link i {
            font-size: 18px;
        }

        /* Content area */
        .content-wrapper {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            background-color: #f5f7fa;
            height: calc(100vh - 76px);
        }

        .content-wrapper::-webkit-scrollbar {
            width: 8px;
        }

        .content-wrapper::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .content-wrapper::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }

        .content-wrapper::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        /* Dashboard cards */
        .dashboard-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 20px;
            transition: all 0.3s;
            height: 100%;
            cursor: pointer;
            border: 1px solid var(--border-color);
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-light);
        }

        .dashboard-card .icon-container {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .dashboard-card .card-title {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .dashboard-card .card-count {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        /* Tables */
        .table-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 30px;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .table-title {
            font-weight: 600;
            color: var(--primary-color);
            margin: 0;
        }

        .table {
            border-collapse: separate;
            border-spacing: 0;
        }

        .table thead th {
            background-color: var(--primary-light);
            color: var(--primary-color);
            font-weight: 600;
            border: none;
            padding: 12px 15px;
        }

        .table thead th:first-child {
            border-top-left-radius: 8px;
        }

        .table thead th:last-child {
            border-top-right-radius: 8px;
        }

        .table tbody tr {
            transition: all 0.2s;
        }

        .table tbody tr:hover {
            background-color: rgba(52, 93, 149, 0.05);
        }

        .table tbody td {
            padding: 12px 15px;
            vertical-align: middle;
            border-top: 1px solid var(--border-color);
        }

        /* Status badges */
        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            display: inline-block;
        }

        .status-pending {
            background-color: rgba(255, 193, 7, 0.2);
            color: #ff9800;
        }

        .status-done {
            background-color: rgba(76, 175, 80, 0.2);
            color: #4caf50;
        }

        .status-cancelled {
            background-color: rgba(244, 67, 54, 0.2);
            color: #f44336;
        }

        .status-upcoming {
            background-color: rgba(33, 150, 243, 0.2);
            color: #2196f3;
        }

        .status-rescheduled {
            background-color: rgba(156, 39, 176, 0.2);
            color: #9c27b0;
        }

        /* Action buttons */
        .action-buttons {
            display: flex;
            gap: 5px;
            justify-content: center;
        }

        .btn-action {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
            padding: 0;
        }

        .btn-view {
            background-color: var(--primary-light);
            color: var(--primary-color);
        }

        .btn-view:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-edit {
            background-color: rgba(33, 150, 243, 0.1);
            color: #2196f3;
        }

        .btn-edit:hover {
            background-color: #2196f3;
            color: white;
        }

        .btn-delete {
            background-color: rgba(244, 67, 54, 0.1);
            color: #f44336;
        }

        .btn-delete:hover {
            background-color: #f44336;
            color: white;
        }

        /* Modals */
        .modal-content {
            border-radius: 12px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            border-bottom: 1px solid var(--border-color);
            padding: 15px 20px;
            background-color: var(--primary-light);
        }

        .modal-title {
            color: var(--primary-color);
            font-weight: 600;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            border-top: 1px solid var(--border-color);
            padding: 15px 20px;
        }

        /* Form controls */
        .form-label {
            font-weight: 500;
            color: var(--text-color);
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            padding: 10px 15px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            transition: all 0.3s;
            font-size: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 93, 149, 0.2);
        }

        /* Alerts */
        .custom-alert {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 15px 20px;
            font-weight: 500;
            z-index: 1050;
            max-width: 500px;
            width: 90%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* User profile section */
        .profile-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-bottom: 30px;
        }

        .profile-image-container {
            position: relative;
            display: inline-block;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary-color);
        }

        .online-indicator {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            border: 2px solid white;
        }

        .online-indicator.online {
            background-color: var(--success-color);
        }

        .online-indicator.offline {
            background-color: var(--secondary-color);
        }

        /* Print styles */
        @media print {
            .no-print {
                display: none !important;
            }

            body {
                background-color: white;
            }

            .content-wrapper {
                padding: 0;
                overflow: visible;
                height: auto;
            }

            .table-container {
                box-shadow: none;
                padding: 0;
            }

            .table thead th {
                background-color: #f1f1f1;
                color: black;
            }
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .sidebar {
                width: 250px;
            }
        }

        @media (max-width: 768px) {
            .dashboard-card {
                margin-bottom: 20px;
            }

            .table-responsive {
                overflow-x: auto;
            }
        }
    </style>
</head>

<body class="overflow-hidden vh-100">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Alerts -->
    @if (session('success'))
    <div id="success-alert" class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-4 custom-alert" role="alert">
        <div class="d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($errors->has('invalid'))
    <div id="error-alert" class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-4 custom-alert" role="alert">
        <div class="d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            <span>{{ $errors->first('invalid') }}</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container-fluid px-4">
            <a class="navbar-brand text-default" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                    <path d="M19 4H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Z"></path>
                    <path d="M16 2v4"></path>
                    <path d="M8 2v4"></path>
                    <path d="M3 10h18"></path>
                    <path d="M8 14h.01"></path>
                    <path d="M12 14h.01"></path>
                    <path d="M16 14h.01"></path>
                    <path d="M8 18h.01"></path>
                    <path d="M12 18h.01"></path>
                    <path d="M16 18h.01"></path>
                </svg>
                DentalCare
                <span class="ms-2 fw-normal fs-6">
                    @switch ($log->status)
                    @case (1)
                    Secretary
                    @break
                    @case (2)
                    Dentist
                    @break
                    @endswitch
                </span>
            </a>

            <div class="d-flex align-items-center gap-3">
                <div class="dropdown">
                    <button class="btn dropdown-toggle fs-5 p-0 px-2 shadow-none border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        <li><a class="dropdown-item" href="#">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar col-md-2 p-3" role="tablist" aria-orientation="vertical" id="navbar">
            <div class="container-fluid d-flex flex-column align-items-center py-3 mb-3">
                <div class="position-relative d-flex justify-content-center mb-3">
                    <img src="{{ asset($user->image_path ?: 'profile_images/blank_profile_default.png') }}" style="height: 100px; width: 100px; border: solid white 3px; border-radius: 50%; object-fit: cover;">

                    @if ($is_online)
                    <span class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle">
                        <span class="visually-hidden">Online</span>
                    </span>
                    @else
                    <span class="position-absolute top-0 start-100 translate-middle p-2 bg-secondary border border-light rounded-circle">
                        <span class="visually-hidden">Offline</span>
                    </span>
                    @endif
                </div>

                <h6 class="text-center text-white m-0 fw-bold">{{ $log->fname . ' ' . $log->mname . ' ' . $log->lname }}</h6>
                @if ($log->specialty == 'Other')
                <p class="fw-light text-white mb-2 small">{{ $log->custom_specialty }}</p>
                @else
                <p class="fw-light text-white mb-2 small">{{ $log->specialty }}</p>
                @endif

                <form class="w-100 d-flex justify-content-center" action="{{ route('availability') }}" method="post" id="availability">
                    @csrf
                    <select class="form-select form-select-sm w-100 fw-bold" name="online" onchange="document.getElementById('availability').submit()">
                        <option class="fw-bold" value="1" @selected($is_online==1)>Available</option>
                        <option class="fw-bold" value="0" @selected($is_online==0)>Not Available</option>
                    </select>
                </form>
            </div>

            <button class="nav-link active" id="nav-dashboard" data-bs-toggle="pill" data-bs-target="#tab-dashboard" type="button" role="tab" aria-controls="tab-dashboard" aria-selected="true">
                <i class="bi bi-speedometer"></i>
                Dashboard
            </button>

            <button class="nav-link" id="nav-appointments" data-bs-toggle="pill" data-bs-target="#tab-appointments" type="button" role="tab" aria-controls="tab-appointments" aria-selected="false">
                <i class="bi bi-calendar-event-fill"></i>
                Appointments
            </button>

            @if ($log->status > 1)
            <button class="nav-link" id="nav-services" data-bs-toggle="pill" data-bs-target="#tab-services" type="button" role="tab" aria-controls="tab-services" aria-selected="false">
                <i class="bi bi-clipboard-plus-fill"></i>
                Services
            </button>
            @endif

            <button class="nav-link" id="nav-patient" data-bs-toggle="pill" data-bs-target="#tab-patients" type="button" role="tab" aria-controls="tab-patients" aria-selected="false">
                <i class="bi bi-people-fill"></i>
                Patients
            </button>

            @if ($log->status > 1)
            <button class="nav-link" id="nav-listing" data-bs-toggle="pill" data-bs-target="#tab-listings" type="button" role="tab" aria-controls="tab-listings" aria-selected="false">
                <i class="bi bi-building-fill"></i>
                Clinics
            </button>
            @endif

            <button class="nav-link" id="nav-transactions" data-bs-toggle="pill" data-bs-target="#tab-transactions" type="button" role="tab" aria-controls="tab-transactions" aria-selected="false">
                <i class="bi bi-cash-stack"></i>
                Transactions
            </button>

            <button class="nav-link" id="nav-collab" data-bs-toggle="pill" data-bs-target="#tab-collab" type="button" role="tab" aria-controls="tab-collab" aria-selected="false">
                <i class="bi bi-person-fill-add"></i>
                Clinic Team
            </button>

            <button class="nav-link" id="nav-profile" data-bs-toggle="pill" data-bs-target="#tab-profile" type="button" role="tab" aria-controls="tab-profile" aria-selected="false">
                <i class="bi bi-gear-fill"></i>
                Profile
            </button>

            <a class="nav-link mt-auto" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </a>
        </div>

        <!-- Content Area -->
        <div class="content-wrapper col-md-10 tab-content">
            <!-- Dashboard Tab -->
            <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard" tabindex="0">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="mb-0">
                            @switch ($log->status)
                            @case (1)
                            Welcome Secretary!
                            @break
                            @case (2)
                            Welcome Dentist!
                            @break
                            @endswitch
                        </h1>
                        <p class="text-secondary">Dashboard</p>
                    </div>

                    @if ($log->status > 1)
                    <button class="btn btn-default" data-bs-toggle="modal" data-bs-target="#add-collab">
                        <i class="bi bi-plus-lg me-2"></i>Add Secretary
                    </button>
                    @endif
                </div>

                <hr class="mb-4">

                <div class="row g-4">

                    <div class="col-md-4">
                        <div class="dashboard-card" onclick="document.getElementById('nav-patient').click()">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="icon-container">
                                        <img src="{{ asset('images/patient_icon.png') }}" style="height: 80px; width: 80px;">
                                    </div>
                                    <h5 class="card-title">Patients</h5>
                                </div>
                                <h2 class="card-count">{{ $users->count() }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="dashboard-card" onclick="document.getElementById('nav-appointments').click()">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="icon-container">
                                        <img src="{{ asset('images/event_icon.png') }}" style="height: 80px; width: 80px;">
                                    </div>
                                    <h5 class="card-title">Appointments</h5>
                                </div>
                                <h2 class="card-count">{{ $appointments->count() }}</h2>
                            </div>
                        </div>
                    </div>

                    @if($log->status != 1)
                    <div class="col-md-4">
                        <div class="dashboard-card" onclick="document.getElementById('nav-services').click()">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="icon-container">
                                        <img src="{{ asset('images/images.png') }}" style="height: 80px; width: 80px;">
                                    </div>
                                    <h5 class="card-title">Services</h5>
                                </div>
                                <h2 class="card-count">{{ $services->count() }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="dashboard-card" onclick="document.getElementById('nav-listing').click()">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="icon-container">
                                        <img src="{{ asset('images/download.png') }}" style="height: 80px; width: 80px;">
                                    </div>
                                    <h5 class="card-title">Clinics</h5>
                                </div>
                                <h2 class="card-count">{{ $listings->count() }}</h2>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>

            <!-- Appointments Tab -->
            <div class="tab-pane fade" id="tab-appointments" role="tabpanel" aria-labelledby="tab-appointments" tabindex="0">
                <div id="printAppointments">
                    <h1 class="mb-4">Appointments</h1>

                    <div class="table-container">
                        <div class="table-header">
                            <h5 class="table-title">Appointment History</h5>

                            <div class="d-flex gap-2 no-print">
                                <select class="form-select no-print" id="statusFilter" style="width: 200px;">
                                    <option value="All">All Statuses</option>
                                    <option value="Done">Done</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Rescheduled">Rescheduled</option>
                                    <option value="Cancelled">Cancelled</option>
                                    <option value="Upcoming">Upcoming</option>
                                </select>

                                <div class="input-group" style="width: 250px;">
                                    <input class="form-control" type="search" id="tableSearch" placeholder="Search...">
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-success mb-3 no-print" onclick="printTableAppointments()">
                            <i class="bi bi-printer me-2"></i>Print Table
                        </button>

                        <div class="table-responsive">
                            <table class="table" id="appointmentTable">
                                <thead>
                                    <tr>
                                        <th>Dentist Name</th>
                                        <th>Patient Name</th>
                                        <th>Clinic</th>
                                        <th>Services</th>
                                        <th>Appointment Time</th>
                                        <th>Status</th>
                                        <th class="text-center no-print">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $appointment)
                                    <tr data-status="{{ $appointment->status }}">
                                        <td class="dentist">{{ ($appointment->dentist->fname ?? '') . ' ' . ($appointment->dentist->mname ?? '') . ' ' . ($appointment->dentist->lname ?? '') }}</td>

                                        @if ($appointment->guest)
                                        <td class="patient">{{ $appointment->guest->name . ' ' . $appointment->guest->middlename . ' ' . $appointment->guest->lastname }}</td>
                                        @elseif ($appointment->temporary)
                                        @php
                                        $temp = json_decode($appointment->temporary, true);
                                        @endphp
                                        <td class="patient">{{ ($temp['fname'] ?? 'N/A') . ' ' . ($temp['mname'] ?? 'N/A') . ' ' . ($temp['lname'] ?? 'N/A') }}</td>
                                        @else
                                        <td class="patient">{{ $appointment->user->fname . ' ' . $appointment->user->mname . ' ' . $appointment->user->lname }}</td>
                                        @endif

                                        <td class="clinic">{{ $appointment->clinic->name }}</td>
                                        <td class="service">{{ $appointment->service->name }}</td>
                                        <td>{{ Carbon\Carbon::parse($appointment->rescheduled_time ?? $appointment->appointment_time)->format('F j, Y - h:i A') }}</td>
                                        <td>
                                            @switch ($appointment->status)
                                            @case ('Pending')
                                            <span class="status-badge status-pending">Pending</span>
                                            @break
                                            @case ('Deny')
                                            <span class="status-badge status-cancelled">Denied</span>
                                            @break
                                            @case ('Done')
                                            <span class="status-badge status-done">Done</span>
                                            @break
                                            @case ('Upcoming')
                                            <span class="status-badge status-upcoming">Upcoming</span>
                                            @break
                                            @case ('Rescheduled')
                                            <span class="status-badge status-rescheduled">Rescheduled</span>
                                            @break
                                            @case ('Cancelled')
                                            <span class="status-badge status-cancelled">Cancelled</span>
                                            @break
                                            @endswitch
                                        </td>
                                        <td class="text-center no-print">
                                            <div class="action-buttons">
                                                <a class="btn btn-action btn-view" href="{{ route('record.appointment', $appointment->id) }}">
                                                    <i class="bi bi-calendar-event-fill"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services Tab -->
            <div class="tab-pane fade" id="tab-services" role="tabpanel" aria-labelledby="tab-services" tabindex="0">
                <div id="printServices">
                    <h1 class="mb-4">Services</h1>

                    <div class="table-container">
                        <div class="table-header">
                            <h5 class="table-title">List of Services</h5>
                        </div>

                        <button class="btn btn-success mb-3 no-print" onclick="printTableServices()">
                            <i class="bi bi-printer me-2"></i>Print Table
                        </button>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name of Service</th>
                                        <th>Duration</th>
                                        <th>Price Range</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ floor($service->duration / 60) . 'hr ' . ($service->duration % 60) . 'm' }}</td>
                                        <td>₱ {{ number_format($service->price_start) }} - ₱ {{ number_format($service->price_end) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Patients Tab -->
            <div class="tab-pane fade" id="tab-patients" role="tabpanel" aria-labelledby="tab-patients" tabindex="0">
                <div id="printPatients">
                    <h1 class="mb-4">Patients</h1>

                    <div class="table-container">
                        <div class="table-header">
                            <h5 class="table-title">List of Patients</h5>
                        </div>

                        <button class="btn btn-success mb-3 no-print" onclick="printTablePatients()">
                            <i class="bi bi-printer me-2"></i>Print Table
                        </button>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Patient Name</th>
                                        <th class="text-center">Age</th>
                                        <th>Email Address</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->fname . ' ' . $user->mname . ' ' . $user->lname }}</td>
                                        <td class="text-center">{{ Carbon\Carbon::parse($user->birthdate)->age }} yrs old</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ trim("{$user->street_name}, {$user->city}, {$user->province}", ', ') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Clinics Tab -->
            <div class="tab-pane fade" id="tab-listings" role="tabpanel" aria-labelledby="tab-listings" tabindex="0">
                <div id="printClinics">
                    <h1 class="mb-4">Clinics</h1>

                    <div class="table-container">
                        <div class="table-header">
                            <h5 class="table-title">Dental Clinics</h5>
                        </div>

                        <button class="btn btn-success mb-3 no-print" onclick="printTableClinics()">
                            <i class="bi bi-printer me-2"></i>Print Table
                        </button>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Clinic Name</th>
                                        <th>Email Address</th>
                                        <th>Contact No.</th>
                                        <th>Barangay</th>
                                        <th>Street Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listings as $listing)
                                    <tr>
                                        <td>{{ $listing->clinic->name }}</td>
                                        <td>{{ $listing->clinic->email }}</td>
                                        <td>{{ $listing->clinic->contact }}</td>
                                        <td>{{ $listing->clinic->barangay }}</td>
                                        <td>{{ $listing->clinic->street_address }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transactions Tab -->
            <div class="tab-pane fade" id="tab-transactions" role="tabpanel" aria-labelledby="tab-transactions" tabindex="0">
                <div id="printTransactions">
                    <h1 class="mb-4">Transactions</h1>

                    <div class="table-container">
                        <div class="table-header">
                            <h5 class="table-title">Appointment History</h5>
                        </div>

                        <button class="btn btn-success mb-3 no-print" onclick="printTableTransactions()">
                            <i class="bi bi-printer me-2"></i>Print Table
                        </button>

                        @if($appointments->isEmpty())
                        <div class="alert alert-info" role="alert">
                            No past appointments found.
                        </div>
                        @else
                        <div class="row g-4">
                            @foreach ($appointments as $appointment)
                            @php
                            $serviceFee = $appointment->fees->whereNotNull('service_name')->first();
                            $additionalFees = $appointment->fees->whereNull('service_name');
                            @endphp

                            @if($serviceFee) <!-- Check if serviceFee exists -->
                            <div class="col-md-6">
                                <div class="card shadow-sm h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="card-title mb-0">
                                                {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('F j, Y, g:i a') }}
                                            </h5>
                                            <span class="status-badge status-done">Completed</span>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <p class="card-text mb-1"><strong>Patient:</strong>
                                                    @if ($appointment->guest)
                                                    {{ $appointment->guest->name . ' ' . $appointment->guest->middlename . ' ' . $appointment->guest->lastname }}
                                                    @elseif ($appointment->temporary)
                                                    @php
                                                    $temp = json_decode($appointment->temporary, true);
                                                    @endphp
                                                    {{ ($temp['fname'] ?? 'N/A') }} {{ ($temp['lname'] ?? 'N/A') }}
                                                    @else
                                                    {{ $appointment->user->fname }} {{ $appointment->user->lname }}
                                                    @endif
                                                </p>
                                            </div>

                                            <div class="col-md-6">
                                                <p class="card-text mb-1"><strong>Service:</strong> {{ $serviceFee->service_name }}</p>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <p class="card-text mb-1"><strong>Service Amount:</strong> ₱{{ number_format($serviceFee->service_amount ?? 0, 2) }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="card-text mb-1"><strong>Service Discount:</strong> {{ $serviceFee->service_discount ?? '0' }}%</p>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-outline-primary no-print" data-bs-toggle="modal" data-bs-target="#appointmentModal-{{ $appointment->id }}">
                                            <i class="bi bi-eye me-2"></i>View Details
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endif <!-- End of serviceFee check -->
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Staff Tab -->
            <div class="tab-pane fade" id="tab-collab" role="tabpanel" aria-labelledby="tab-collab" tabindex="0">
                <h1 class="mb-4">Clinic Team</h1>

                <div class="table-container">
                    <div class="table-header">
                        <h5 class="table-title">List of Team</h5>
                        @switch(auth()->user()->status)
                        @case(1) {{-- Status 1 = Secretary --}}
                        {{-- Do nothing (button is hidden) --}}
                        @break

                        @default {{-- Status is NOT Secretary, show the button --}}
                        <button class="btn btn-default" data-bs-toggle="modal" data-bs-target="#add-collab">
                            <i class="bi bi-plus-lg me-2"></i>Add Secretary
                        </button>
                        @endswitch
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Contact No.</th>
                                    <th>Date Added</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collaborators as $collab)
                                <tr>
                                    <td>{{ $collab->fname . ' ' . $collab->mname . ' ' . $collab->lname }}</td>
                                    <td>{{ $collab->phone }}</td>
                                    <td>{{ \Carbon\Carbon::parse($collab->created_at)->format('F j, Y') }}</td>
                                    <td>
                                        @if ($collab->status == 1)
                                        <span class="badge bg-info">Secretary</span>
                                        @elseif ($collab->status == 2)
                                        <span class="badge bg-primary">Dentist</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($collab->is_online)
                                        <span class="status-badge status-done">Online</span>
                                        @else
                                        <span class="status-badge status-cancelled">Offline</span>
                                        @endif
                                    </td>
                                    <td class="text-center no-print">
                                        <div class="action-buttons">
                                            @if ($collab->status != 2) {{-- Hide button if user is a Dentist --}}
                                            <button class="btn btn-action btn-delete" data-bs-toggle="modal" data-bs-target="#delete-secretary" data-user-id="{{ $collab->id }}">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Delete Secretary Modal -->
            <div class="modal fade" data-bs-backdrop="static" id="delete-secretary" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Secretary</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <p class="mb-0">Are you sure you want to remove this secretary?</p>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                            <form id="remove-secretary-form" action="" method="POST" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-danger" type="submit">
                                    <i class="bi bi-trash me-2"></i>Unassign Secretary
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Tab -->
            <div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="tab-profile" tabindex="0">
                <h1 class="mb-4">Profile</h1>

                <div class="profile-container">
                    <form action="{{ route('update.account') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="row mb-4">
                            <div class="col-md-3 text-center">
                                <div class="profile-image-container mb-3">
                                    <img src="{{ asset($log->image_path ?: 'profile_images/blank_profile_default.png') }}" class="profile-image" id="profile-thumbnail-img">
                                    <div class="online-indicator {{ $is_online ? 'online' : 'offline' }}"></div>
                                </div>
                                <div class="d-flex gap-2 justify-content-center">
                                    <input class="visually-hidden" type="file" name="profile" onchange="previewThumbnail(this)" id="profile">
                                    <button class="btn btn-sm btn-primary" type="button" onclick="document.getElementById('profile').click()">
                                        <i class="bi bi-upload me-1"></i>Upload
                                    </button>
                                    <button class="btn btn-sm btn-danger" type="button">
                                        <i class="bi bi-x-circle me-1"></i>Remove
                                    </button>
                                </div>
                                <p class="text-muted small mt-2">Image should be below 4MB</p>
                            </div>

                            <div class="col-md-9">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="fname">First Name</label>
                                        <input class="form-control" type="text" name="fname" value="{{ $log->fname }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="mname">Middle Name</label>
                                        <input class="form-control" type="text" name="mname" value="{{ $log->mname }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="lname">Last Name</label>
                                        <input class="form-control" type="text" name="lname" value="{{ $log->lname }}">
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="birth">Birthdate</label>
                                        <input class="form-control" type="date" name="birth" value="{{ Carbon\Carbon::parse($log->birthdate)->format('Y-m-d') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="gender">Gender</label>
                                        <select class="form-select" name="gender">
                                            <option value="0" @selected($log->gender == 0)>Male</option>
                                            <option value="1" @selected($log->gender == 1)>Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="phone">Contact No.</label>
                                        <input class="form-control" type="tel" name="phone" value="{{ $log->phone }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="email">Email Address</label>
                                        <input class="form-control" type="email" name="email" value="{{ $log->email }}">
                                    </div>

                                    @if(auth()->user()->status != 1)
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="specialty">Specialty</label>
                                            <select class="form-select" name="specialty" id="specialty" onchange="toggleSpecialtyInput()">
                                                <option value="">Select Specialty</option>
                                                <option value="Orthodontics" @selected($log->specialty == 'Orthodontics')>Orthodontics</option>
                                                <option value="Periodontics" @selected($log->specialty == 'Periodontics')>Periodontics</option>
                                                <option value="Endodontics" @selected($log->specialty == 'Endodontics')>Endodontics</option>
                                                <option value="Prosthodontics" @selected($log->specialty == 'Prosthodontics')>Prosthodontics</option>
                                                <option value="Oral Surgery" @selected($log->specialty == 'Oral Surgery')>Oral Surgery</option>
                                                <option value="Other" @selected($log->specialty == 'Other')>Other</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6" id="custom-specialty-container" style="display: none;">
                                            <label class="form-label" for="custom_specialty">Other Specialty</label>
                                            <input class="form-control" type="text" name="custom_specialty" id="custom_specialty" value="{{ $log->custom_specialty }}">
                                        </div>
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <script>
                            function toggleSpecialtyInput() {
                                var specialtySelect = document.getElementById("specialty");
                                var customSpecialtyContainer = document.getElementById("custom-specialty-container");
                                var customSpecialtyInput = document.getElementById("custom_specialty");

                                if (specialtySelect.value === "Other") {
                                    customSpecialtyContainer.style.display = "block";
                                    customSpecialtyInput.required = true;
                                } else {
                                    customSpecialtyContainer.style.display = "none";
                                    customSpecialtyInput.required = false;
                                    customSpecialtyInput.value = "";
                                }
                            }

                            // Run function on page load in case "Other" was already selected
                            window.onload = toggleSpecialtyInput;
                        </script>

                        <h5 class="mb-3">Address Information</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="street_name" class="form-label">Street Name</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    name="street_name"
                                    id="street_name"
                                    value="{{ $log->street_name }}"
                                    placeholder="Street Name">
                            </div>
                            <div class="col-md-6">
                                <label for="province" class="form-label">Province</label>
                                <select class="form-control" id="province" name="province">
                                    <option value="">Select Province</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="city" class="form-label">City</label>
                                <select class="form-control" id="city" name="city" disabled>
                                    <option value="">Select City</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="postal_code" class="form-label">Postal Code</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    name="postal_code"
                                    id="postal_code"
                                    value="{{ $log->postal_code }}"
                                    placeholder="Postal Code">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-default" type="submit">
                                <i class="bi bi-save me-2"></i>Save Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Collaborator Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="add-collab" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Secretary</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form class="modal-body" action="{{ route('save.collaboration') }}" method="post" id="create-collab">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="secretary_id">Select Secretary</label>
                        <select class="form-select" name="secretary_id" required>
                            <option value="" selected disabled>-- Select Secretary --</option>
                            @foreach($secretaries as $secretary)
                            <option value="{{ $secretary->id }}">{{ $secretary->fname }} {{ $secretary->lname }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-default" type="button" onclick="document.getElementById('create-collab').submit()">
                        <i class="bi bi-plus-circle me-2"></i>Add Secretary
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaction Details Modals -->
    @foreach ($appointments as $appointment)
    @php
    $serviceFee = $appointment->fees->whereNotNull('service_name')->first();
    $additionalFees = $appointment->fees->whereNull('service_name');

    if ($serviceFee) {
    // Service price and discount calculation
    $servicePrice = $serviceFee->service_amount ?? 0;
    $serviceDiscount = $serviceFee->service_discount ?? 0;
    $serviceDiscountAmount = ($serviceDiscount / 100) * $servicePrice;
    $discountedServicePrice = $servicePrice - $serviceDiscountAmount;

    // Additional fees calculation
    $totalAdditionalFees = 0;
    $totalDiscountedFees = 0;
    $totalFeeDiscounts = 0;
    $feesWithDiscounts = [];

    if ($additionalFees->isNotEmpty()) {
    foreach ($additionalFees as $fee) {
    $feeAmount = $fee->fee_amount ?? 0;
    $feeDiscount = $fee->discount_percentage ?? 0;
    $feeDiscountAmount = ($feeDiscount / 100) * $feeAmount;
    $discountedFeeAmount = $feeAmount - $feeDiscountAmount;

    $totalAdditionalFees += $feeAmount;
    $totalDiscountedFees += $discountedFeeAmount;
    $totalFeeDiscounts += $feeDiscountAmount;

    // Store fee details for display
    $feesWithDiscounts[] = [
    'name' => $fee->fee_type ?? 'N/A',
    'original_price' => $feeAmount,
    'discount' => $feeDiscount,
    'discount_amount' => $feeDiscountAmount,
    'discounted_price' => $discountedFeeAmount,
    ];
    }
    }

    // Grand total before discount
    $grandTotal = $servicePrice + $totalAdditionalFees;
    // Total discount given
    $totalDiscountGiven = $serviceDiscountAmount + $totalFeeDiscounts;
    // Total after applying all discounts
    $totalAfterDiscount = $grandTotal - $totalDiscountGiven;
    @endphp

    <div class="modal fade" id="appointmentModal-{{ $appointment->id }}" tabindex="-1" aria-labelledby="appointmentModalLabel-{{ $appointment->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="appointmentModalLabel-{{ $appointment->id }}">
                        <i class="bi bi-calendar-check me-2"></i>Appointment Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="container-fluid">
                        <!-- Appointment Date and Dentist -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <h6 class="text-muted mb-3"><i class="bi bi-calendar-date me-2"></i>Appointment Date</h6>
                                        <p class="lead mb-0">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('F j, Y, g:i a') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <h6 class="text-muted mb-3"><i class="bi bi-person-badge me-2"></i>Dentist</h6>
                                        <p class="lead mb-0">Dr. {{ $appointment->dentist->fname }} {{ $appointment->dentist->lname }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Service Details -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <h6 class="text-muted mb-3"><i class="bi bi-clipboard2-pulse me-2"></i>Service Details</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mb-2"><strong>Service Name:</strong> {{ $serviceFee->service_name ?? 'N/A' }}</p>
                                        <p class="mb-2"><strong>Service Price:</strong> ₱{{ number_format($servicePrice, 2) }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-2"><strong>Service Discount:</strong> {{ $serviceDiscount }}%</p>
                                        <p class="mb-0 text-success"><strong>After Discount:</strong> ₱{{ number_format($discountedServicePrice, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Fees -->
                        @if(!empty($feesWithDiscounts))
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <h6 class="text-muted mb-3"><i class="bi bi-receipt me-2"></i>Additional Fees</h6>
                                <ul class="list-group list-group-flush">
                                    @foreach($feesWithDiscounts as $fee)
                                    <li class="list-group-item px-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span>{{ $fee['name'] }}</span>
                                            <span class="badge bg-primary rounded-pill">₱{{ number_format($fee['original_price'], 2) }}</span>
                                        </div>
                                        <small class="text-muted">Discount: {{ $fee['discount'] }}% (₱{{ number_format($fee['discount_amount'], 2) }})</small>
                                        <p class="text-success mb-0"><strong>After Discount:</strong> ₱{{ number_format($fee['discounted_price'], 2) }}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @else
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <h6 class="text-muted mb-3"><i class="bi bi-receipt me-2"></i>Additional Fees</h6>
                                <p class="lead mb-0">No additional fees</p>
                            </div>
                        </div>
                        @endif

                        <!-- Payment History -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <h6 class="text-muted mb-3"><i class="bi bi-clock-history me-2"></i>Payment History</h6>
                                @if($appointment->payments && $appointment->payments->count() > 0)
                                <ul class="list-group list-group-flush">
                                    @foreach($appointment->payments as $payment)
                                    <li class="list-group-item px-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span>
                                                <strong>Amount:</strong> ₱{{ number_format($payment->amount_paid, 2) }}<br>
                                                <small class="text-muted">Date: {{ \Carbon\Carbon::parse($payment->created_at)->format('F j, Y, g:i a') }}</small>
                                            </span>
                                            <span class="badge bg-secondary rounded-pill text-capitalize">{{ $payment->payment_type }}</span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                <p class="lead mb-0">No payments made yet.</p>
                                @endif
                            </div>
                        </div>

                        <!-- Summary -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <h6 class="text-muted mb-3"><i class="bi bi-file-earmark-text me-2"></i>Summary</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mb-2"><strong>Grand Total:</strong> ₱{{ number_format($grandTotal, 2) }}</p>
                                        <p class="mbGrand Total:</strong> ₱{{ number_format($grandTotal, 2) }}</p>
                                        <p class=" mb-2 text-danger"><strong>Total Discount Given:</strong> ₱{{ number_format($totalDiscountGiven, 2) }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-2 text-success"><strong>Total After Discount:</strong> ₱{{ number_format($totalAfterDiscount, 2) }}</p>
                                        <p class="mb-0"><strong>Remaining Balance:</strong> ₱{{ number_format($totalAfterDiscount - $appointment->total_paid, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Form -->
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="text-muted mb-3"><i class="bi bi-credit-card me-2"></i>Add Payment</h6>
                                <form action="{{ route('store.payment', $appointment->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="amount_paid" class="form-label">Payment Amount</label>
                                        <input type="number" step="0.01" class="form-control" name="amount_paid" required
                                            max="{{ $totalAfterDiscount - $appointment->total_paid }}">
                                        <small class="text-muted">Remaining Balance: ₱{{ number_format($totalAfterDiscount - $appointment->total_paid, 2) }}</small>
                                    </div>
                                    <div class="mb-3">
                                        <label for="payment_type" class="form-label">Payment Type</label>
                                        <select class="form-select" name="payment_type">
                                            <option value="full">Full</option>
                                            <option value="installment">Installment</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="bi bi-plus-circle me-2"></i>Add Payment
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-2"></i>Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    @php
    }
    @endphp
    @endforeach

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                let successAlert = document.getElementById("success-alert");
                let errorAlert = document.getElementById("error-alert");

                if (successAlert) {
                    successAlert.classList.remove("show");
                    successAlert.classList.add("fade");
                }

                if (errorAlert) {
                    errorAlert.classList.remove("show");
                    errorAlert.classList.add("fade");
                }
            }, 5000);

            // Sort appointments by nearest time
            sortAppointmentsByNearestTime();

            // Check if there's a page parameter in the session
            switch (parseInt("{{ session('page') }}", 10)) {
                case 3:
                    document.getElementById('nav-services').click();
                    break;
                case 5:
                    document.getElementById('nav-listings').click();
                    break;
                case 7:
                    document.getElementById('nav-collab').click();
                    break;
                case 8:
                    document.getElementById('nav-profile').click();
                    break;
                case 9:
                    document.getElementById('nav-collab').click();
                    break;
                default:
                    break;
            }

            // Get references to the search input, status filter, and table rows
            const searchInput = document.getElementById("tableSearch");
            const statusFilter = document.getElementById("statusFilter");
            const tableRows = document.querySelectorAll("#appointmentTable tbody tr");

            // Check if all elements exist before proceeding
            if (searchInput && statusFilter && tableRows) {
                function filterTable() {
                    // Get the current search text and selected status value
                    const searchText = searchInput.value.toLowerCase();
                    const selectedStatusValue = statusFilter.value;

                    // Loop through each table row
                    tableRows.forEach(row => {
                        // Extract text from the columns to search
                        const dentist = row.querySelector("td.dentist")?.textContent.toLowerCase() || '';
                        const patient = row.querySelector("td.patient")?.textContent.toLowerCase() || '';
                        const clinic = row.querySelector("td.clinic")?.textContent.toLowerCase() || '';
                        const service = row.querySelector("td.service")?.textContent.toLowerCase() || '';
                        const status = row.querySelector("td:nth-child(6)")?.textContent.toLowerCase() || '';

                        // Combine the text from all searchable columns
                        const searchableText = [dentist, patient, clinic, service, status].join(" ");

                        // Get the row's status from the data-status attribute
                        const rowStatus = row.getAttribute("data-status");

                        // Determine if the row matches the search and status criteria
                        const matchesSearch = searchText === "" || searchableText.includes(searchText);
                        const matchesStatus = selectedStatusValue === "All" || rowStatus === selectedStatusValue;

                        // Show or hide the row based on both conditions
                        row.style.display = (matchesSearch && matchesStatus) ? "" : "none";
                    });
                }

                // Add event listeners to trigger filtering on input or status change
                searchInput.addEventListener("input", filterTable);
                statusFilter.addEventListener("change", filterTable);
            }

            const url = new URL(window.location.href);
            const page = url.searchParams.get('page');

            if (page === '2') {
                document.getElementById('nav-appointments').click();
            }

            if (page === '2') {
                document.getElementById('nav-patients').click();
            }

            // Check if there's a page parameter in the session
            switch (parseInt("{{ session('page') }}", 10)) {
                case 4:
                    document.getElementById('nav-dentist').click();
                    break;
                case 5:
                    document.getElementById('nav-listing').click();
                    break;
                case 6:
                    document.getElementById('nav-secretary').click();
                    break;
                case 7:
                    document.getElementById('nav-patient').click();
                    break;
                case 8:
                    document.getElementById('nav-services').click();
                    break;
                case 9:
                    document.getElementById('nav-transactions').click();
                    break;
                case 10:
                    document.getElementById('nav-collab').click();
                    break;
                default:
                    break;
            }

            // Province and City API integration
            const provinceSelect = document.getElementById("province");
            const citySelect = document.getElementById("city");
            const existingProvince = "{{ $log->province }}";
            const existingCity = "{{ $log->city }}";

            if (provinceSelect && citySelect) {
                let provinceMap = {}; // Map to store province code -> name

                fetch("https://psgc.gitlab.io/api/provinces/")
                    .then(response => response.json())
                    .then(provinces => {
                        provinces.sort((a, b) => a.name.localeCompare(b.name));

                        provinces.forEach(province => {
                            provinceMap[province.code] = province.name; // Store mapping
                            let option = document.createElement("option");
                            option.value = province.name; // Store name in <option> value
                            option.textContent = province.name; // Display name
                            option.setAttribute("data-code", province.code); // Store code for fetching cities

                            if (province.name === existingProvince) {
                                option.selected = true;
                            }

                            provinceSelect.appendChild(option);
                        });

                        if (existingProvince) {
                            const selectedOption = Array.from(provinceSelect.options).find(opt => opt.value === existingProvince);
                            if (selectedOption) {
                                const provinceCode = selectedOption.getAttribute("data-code");
                                loadCities(provinceCode, existingCity);
                            }
                        }
                    })
                    .catch(error => console.error("Error fetching provinces:", error));

                function loadCities(provinceCode, selectedCity = null) {
                    citySelect.innerHTML = '<option value="">Select City</option>';
                    citySelect.disabled = true;

                    if (provinceCode) {
                        fetch(`https://psgc.gitlab.io/api/provinces/${provinceCode}/cities/`)
                            .then(response => response.json())
                            .then(cities => {
                                cities.sort((a, b) => a.name.localeCompare(b.name));

                                cities.forEach(city => {
                                    let option = document.createElement("option");
                                    option.value = city.name; // Save city name
                                    option.textContent = city.name;

                                    if (city.name === selectedCity) {
                                        option.selected = true;
                                    }

                                    citySelect.appendChild(option);
                                });

                                citySelect.disabled = false;
                            })
                            .catch(error => {
                                console.error("Error fetching cities:", error);
                                citySelect.innerHTML = '<option value="">Error loading cities</option>';
                            });
                    }
                }

                provinceSelect.addEventListener("change", function() {
                    let selectedOption = this.options[this.selectedIndex];
                    let provinceCode = selectedOption.getAttribute("data-code");
                    loadCities(provinceCode);
                });
            }
        });

        function sortAppointmentsByNearestTime() {
            const table = document.getElementById("appointmentTable");
            if (!table) return;

            const tbody = table.querySelector("tbody");
            const rows = Array.from(tbody.querySelectorAll("tr"));

            rows.sort((rowA, rowB) => {
                const timeA = extractDateTime(rowA.cells[4].textContent);
                const timeB = extractDateTime(rowB.cells[4].textContent);
                return timeA - timeB;
            });

            // Append sorted rows back to the table
            rows.forEach(row => tbody.appendChild(row));
        }

        function extractDateTime(dateTimeStr) {
            // Convert "March 1, 2025 - 02:30 PM" format to Date object
            return new Date(Date.parse(dateTimeStr.replace("-", "")));
        }

        // Print functions
        function printTableAppointments() {
            var content = document.getElementById("printAppointments").innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = content;
            window.print();
            document.body.innerHTML = originalContent;
        }

        function printTableServices() {
            var content = document.getElementById("printServices").innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = content;
            window.print();
            document.body.innerHTML = originalContent;
        }

        function printTablePatients() {
            var content = document.getElementById("printPatients").innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = content;
            window.print();
            document.body.innerHTML = originalContent;
        }

        function printTableClinics() {
            var content = document.getElementById("printClinics").innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = content;
            window.print();
            document.body.innerHTML = originalContent;
        }

        function printTableTransactions() {
            var content = document.getElementById("printTransactions").innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = content;
            window.print();
            document.body.innerHTML = originalContent;
        }

        function previewThumbnail(input) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const previewer = document.getElementById('profile-thumbnail-img');
                    previewer.src = e.target.result;
                }

                reader.readAsDataURL(file);
            }
        }

        $('#delete-secretary').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var userId = button.data('user-id');

            var form = $(this).find('#remove-secretary-form');
            form.attr('action', '/unassign-secretary/' + userId);
        });
    </script>
</body>

</html>