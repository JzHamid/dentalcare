<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <title>DentalCare | Superadmin</title>

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

        :root {
            --card-border-radius: 12px;
            --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --card-hover-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --transition-speed: 0.3s;
        }

        .card {
            border: none;
            border-radius: var(--card-border-radius);
            background-color: #ffffff;
            box-shadow: var(--card-shadow);
            transition: all var(--transition-speed) ease;
            height: 100%;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-hover-shadow);
        }

        .card-header {
            border-bottom: none;
            border-radius: var(--card-border-radius) var(--card-border-radius) 0 0;
            padding: 1.25rem 1.5rem;
            position: relative;
            z-index: 1;
        }

        .card-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: rgba(255, 255, 255, 0.2);
        }

        .card-header h5 {
            font-weight: 600;
            margin: 0;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
        }

        .card-body {
            padding: 1.75rem;
        }

        .stats-value {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
            line-height: 1.2;
        }

        .stats-label {
            font-size: 0.9rem;
            color: rgba(0, 0, 0, 0.6);
        }

        .chart-container {
            position: relative;
            margin: auto;
            height: 100%;
            min-height: 300px;
        }

        .dashboard-title {
            position: relative;
            display: inline-block;
            margin-bottom: 2rem;
        }

        .dashboard-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 4px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }

        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            border-radius: var(--card-border-radius);
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid rgba(var(--primary-color-rgb), 0.2);
            border-radius: 50%;
            border-top-color: var(--primary-color);
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .metric-card {
            text-align: center;
            padding: 1.5rem;
        }

        .metric-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: rgba(var(--primary-color-rgb), 0.1);
            margin-bottom: 1rem;
        }

        .metric-icon i {
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        canvas {
            max-height: 400px;
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

    @if(session('error'))
    <div id="error-message" class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-4 custom-alert" role="alert">
        <div class="d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            <span>{{ session('error') }}</span>
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
                DentalCare <span class="ms-2 fw-normal fs-6">Superadmin</span>
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
            <button class="nav-link active" id="nav-dashboard" data-bs-toggle="pill" data-bs-target="#tab-dashboard" type="button" role="tab" aria-controls="tab-dashboard" aria-selected="true">
                <i class="bi bi-speedometer"></i>
                Dashboard
            </button>

            <button class="nav-link" id="nav-appointments" data-bs-toggle="pill" data-bs-target="#tab-appointments" type="button" role="tab" aria-controls="tab-appointments" aria-selected="false">
                <i class="bi bi-calendar-event-fill"></i>
                Appointments
            </button>

            <button class="nav-link" id="nav-services" data-bs-toggle="pill" data-bs-target="#tab-services" type="button" role="tab" aria-controls="tab-services" aria-selected="false">
                <i class="bi bi-clipboard-plus-fill"></i>
                Services
            </button>

            <button class="nav-link" id="nav-patient" data-bs-toggle="pill" data-bs-target="#tab-patients" type="button" role="tab" aria-controls="tab-patients" aria-selected="false">
                <i class="bi bi-people-fill"></i>
                Patients
            </button>

            <button class="nav-link" id="nav-dentist" data-bs-toggle="pill" data-bs-target="#tab-dentist" type="button" role="tab" aria-controls="tab-dentist" aria-selected="false">
                <i class="bi bi-person-fill-add"></i>
                Dentists
            </button>

            <button class="nav-link" id="nav-secretary" data-bs-toggle="pill" data-bs-target="#tab-secretary" type="button" role="tab" aria-controls="tab-secretary" aria-selected="false">
                <i class="bi bi-person-lines-fill"></i>
                Secretaries
            </button>

            <button class="nav-link" id="nav-listing" data-bs-toggle="pill" data-bs-target="#tab-listing" type="button" role="tab" aria-controls="tab-listing" aria-selected="false">
                <i class="bi bi-building-fill"></i>
                Clinics
            </button>

            <button class="nav-link" id="nav-transactions" data-bs-toggle="pill" data-bs-target="#tab-transactions" type="button" role="tab" aria-controls="tab-transactions" aria-selected="false">
                <i class="bi bi-cash-stack"></i>
                Transactions
            </button>

            <button class="nav-link" id="nav-statistics" data-bs-toggle="pill" data-bs-target="#tab-statistics" type="button" role="tab" aria-controls="tab-statistics" aria-selected="false">
                <i class="bi bi-graph-up"></i>
                Statistics
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
                <h1 class="mb-4">Welcome Admin!</h1>
                <hr class="mb-4">

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="dashboard-card" onclick="document.getElementById('nav-dentist').click()">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="icon-container">
                                        <img src="{{ asset('images/dentist_icon.png') }}" style="height: 80px; width: 80px;">
                                    </div>
                                    <h5 class="card-title">Dentists</h5>
                                </div>
                                <h2 class="card-count">{{ $dentist->count() }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="dashboard-card" onclick="document.getElementById('nav-secretary').click()">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="icon-container">
                                        <img src="{{ asset('images/dentist_icon.png') }}" style="height: 80px; width: 80px;">
                                    </div>
                                    <h5 class="card-title">Secretaries</h5>
                                </div>
                                <h2 class="card-count">{{ $secretary->count() }}</h2>
                            </div>
                        </div>
                    </div>

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
                </div>
            </div>

            <!-- Appointments Tab -->
            <div class="tab-pane fade" id="tab-appointments" role="tabpanel" aria-labelledby="tab-appointments" tabindex="0">
                <div id="printTable">
                    <h1 class="mb-4">Appointments</h1>

                    <div class="table-container">
                        <div class="table-header">
                            <h5 class="table-title">Appointment History</h5>

                            <div class="d-flex gap-2">
                                <!-- Status Filter Dropdown -->
<select class="form-select no-print" id="statusFilter" style="width: 200px;">
    <option value="All">All Statuses</option>
    <option value="Done">Done</option>
    <option value="Pending">Pending</option>
    <option value="Rescheduled">Rescheduled</option>
    <option value="Cancelled">Cancelled</option>
    <option value="Upcoming">Upcoming</option>
</select>

                                <!-- Search Bar -->
                                <div class="input-group no-print" style="width: 250px;">
                                    <input class="form-control" type="search" id="tableSearch" placeholder="Search...">
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-success mb-3 no-print" onclick="printTable()">
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
                            <button class="btn btn-default no-print" data-bs-toggle="modal" data-bs-target="#add-service">
                                <i class="bi bi-plus-lg me-2"></i>Add Service
                            </button>
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
                                        <th class="text-center no-print">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ floor($service->duration / 60) . 'hr ' . ($service->duration % 60) . 'm' }}</td>
                                        <td>₱ {{ number_format($service->price_start) }} - ₱ {{ number_format($service->price_end) }}</td>
                                        <td class="text-center no-print">
                                            <div class="action-buttons">
                                                <button class="btn btn-action btn-edit" data-bs-toggle="modal" data-bs-target="#edit-service" onclick="get_service('{{ $service->id }}')">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button class="btn btn-action btn-delete" data-bs-toggle="modal" data-bs-target="#delete-service" onclick="setDeleteFormAction(`{{ route('destroy.service', $service->id) }}`)">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
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
                                        <th class="text-center no-print">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->fname . ' ' . $user->mname . ' ' . $user->lname }}</td>
                                        <td class="text-center">{{ Carbon\Carbon::parse($user->birthdate)->age }} yrs old</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ trim("{$user->street_name}, {$user->city}, {$user->province}", ', ') }}</td>
                                        <td class="text-center no-print">
                                            <div class="action-buttons">
                                                <button class="btn btn-action btn-edit" data-bs-toggle="modal" data-bs-target="#edit-patient" onclick="get_patient('{{ $user->id }}')">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button class="btn btn-action btn-delete" data-bs-toggle="modal" data-bs-target="#delete-user" data-user-id="{{ $user->id }}">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
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

            <!-- Dentists Tab -->
            <div class="tab-pane fade" id="tab-dentist" role="tabpanel" aria-labelledby="tab-dentist" tabindex="0">
                <div id="printDentists">
                    <h1 class="mb-4">Dentists</h1>

                    <div class="table-container">
                        <div class="table-header">
                            <h5 class="table-title">List of Dentists</h5>
                            <button class="btn btn-default no-print" data-bs-toggle="modal" data-bs-target="#add-dentist">
                                <i class="bi bi-plus-lg me-2"></i>Add Dentist
                            </button>
                        </div>

                        <button class="btn btn-success mb-3 no-print" onclick="printTableDentists()">
                            <i class="bi bi-printer me-2"></i>Print Table
                        </button>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Dentist Name</th>
                                        <th>Specialization</th>
                                        <th>Email Address</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th class="text-center no-print">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($dentist as $dent)
                                    <tr>
                                        <td>Dr. {{ $dent->fname . ' ' . $dent->mname . ' ' . $dent->lname }}</td>
                                        <td></td>
                                        <td>{{ $dent->email }}</td>
                                        <td>{{ $dent->phone }}</td>
                                        <td>{{ trim("{$dent->street_name}, {$dent->city}, {$dent->province}", ', ') }}</td>
                                        <td class="text-center no-print">
                                            <div class="action-buttons">
                                                <button class="btn btn-action btn-edit" data-bs-toggle="modal" data-bs-target="#edit-dentist" onclick="get_dentist('{{ $dent->id }}')">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button class="btn btn-action btn-delete" data-bs-toggle="modal" data-bs-target="#delete-dentist" data-user-id="{{ $dent->id }}">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
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

            <!-- Secretary Tab -->
            <div class="tab-pane fade" id="tab-secretary" role="tabpanel" aria-labelledby="tab-secretary" tabindex="0">
                <div id="printSecretaries">
                    <h1 class="mb-4">Secretaries</h1>

                    <div class="table-container">
                        <div class="table-header">
                            <h5 class="table-title">List of Secretaries</h5>
                            <button class="btn btn-default no-print" data-bs-toggle="modal" data-bs-target="#add-secretary">
                                <i class="bi bi-plus-lg me-2"></i>Add Secretary
                            </button>
                        </div>

                        <button class="btn btn-success mb-3 no-print" onclick="printTableSecretaries()">
                            <i class="bi bi-printer me-2"></i>Print Table
                        </button>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Secretary Name</th>
                                        <th>Email Address</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th class="text-center no-print">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($secretary as $sec)
                                    <tr>
                                        <td>{{ $sec->fname . ' ' . $sec->mname . ' ' . $sec->lname }}</td>
                                        <td>{{ $sec->email }}</td>
                                        <td>{{ $sec->phone }}</td>
                                        <td>{{ trim("{$sec->street_name}, {$sec->city}, {$sec->province}", ', ') }}</td>
                                        <td class="text-center no-print">
                                            <div class="action-buttons">
                                                <button class="btn btn-action btn-edit" data-bs-toggle="modal" data-bs-target="#edit-secretary" onclick="get_secretary('{{ $sec->id }}')">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button class="btn btn-action btn-delete" data-bs-toggle="modal" data-bs-target="#delete-secretary" data-user-id="{{ $sec->id }}">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
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

            <!-- Clinics Tab -->
            <div class="tab-pane fade" id="tab-listing" role="tabpanel" aria-labelledby="tab-listing" tabindex="0">
                <div id="printClinics">
                    <h1 class="mb-4">Clinics</h1>

                    <div class="table-container">
                        <div class="table-header">
                            <h5 class="table-title">Dental Clinics</h5>
                            <button class="btn btn-default no-print" data-bs-toggle="modal" data-bs-target="#add-listing">
                                <i class="bi bi-plus-lg me-2"></i>Add Clinic
                            </button>
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
                                        <th>Location</th>
                                        <th class="text-center no-print">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($listings as $listing)
                                    <tr>
                                        <td>{{ $listing->name }}</td>
                                        <td>{{ $listing->email }}</td>
                                        <td>{{ $listing->contact }}</td>
                                        <td>{{ $listing->location }}</td>
                                        <td class="text-center no-print">
                                            <div class="action-buttons">
                                                <button class="btn btn-action btn-edit" data-bs-toggle="modal" data-bs-target="#view-listing" onclick="get_listing('{{ $listing->id }}')">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button class="btn btn-action btn-delete" data-bs-toggle="modal" data-bs-target="#delete-listing">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
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
                        <div class="row">
                            @foreach ($appointments as $appointment)
                            @php
                            $serviceFee = $appointment->fees->whereNotNull('service_name')->first();
                            $additionalFees = $appointment->fees->whereNull('service_name');
                            @endphp

                            @if($serviceFee) <!-- Check if serviceFee exists -->
                            <div class="col-md-6 mb-4">
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


            <div class="tab-pane fade" id="tab-statistics" role="tabpanel" aria-labelledby="nav-statistics">
                <div class="container-fluid py-5">
                    <div class="text-end">
                        <button id="download-pdf" class="btn btn-primary">Download PDF</button>
                    </div>
                    <h2 class="text-center dashboard-title" style="color: var(--primary-color);">Statistics Dashboard</h2>
                    <div class="row g-4">
                        <!-- Summary Cards Row -->
                        <div class="col-12">
                            <div class="row g-4">
                                <!-- Most Profitable Procedure -->
                                <div class="col-md-6 col-lg-6">
                                    <div class="card shadow-sm h-100 position-relative">
                                        <div class="loading-overlay" id="loading-profitable">
                                            <div class="spinner"></div>
                                        </div>
                                        <div class="card-header" style="background-color: var(--primary-color); color: #fff;">
                                            <h5 class="card-title mb-0">
                                                <i class="fas fa-trophy me-2"></i>
                                                Most Profitable Procedure
                                            </h5>
                                        </div>
                                        <div class="card-body metric-card">

                                            <div class="stats-value" style="color: var(--primary-color);" id="mostProfitableProcedure">-</div>
                                            <div class="stats-label">All Time Revenue Leader</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Most Profitable Procedure This Month -->
                                <div class="col-md-6 col-lg-6">
                                    <div class="card shadow-sm h-100 position-relative">
                                        <div class="loading-overlay" id="loading-profitable-month">
                                            <div class="spinner"></div>
                                        </div>
                                        <div class="card-header" style="background-color: var(--primary-color); color: #fff;">
                                            <h5 class="card-title mb-0">
                                                <i class="fas fa-calendar-check me-2"></i>
                                                Most Profitable Procedure (This Month)
                                            </h5>
                                        </div>
                                        <div class="card-body metric-card">

                                            <div class="stats-value" style="color: var(--primary-color);" id="mostProfitableMonth">-</div>
                                            <div class="stats-label">Current Month Leader</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Charts Row -->
                        <div class="col-12">
                            <div class="row g-4">
                                <!-- Revenue per Procedure (Bar Chart) -->
                                <div class="col-md-6 col-lg-6">
                                    <div class="card shadow-sm h-100 position-relative">
                                        <div class="loading-overlay" id="loading-revenue-chart">
                                            <div class="spinner"></div>
                                        </div>
                                        <div class="card-header" style="background-color: var(--primary-color); color: #fff;">
                                            <h5 class="card-title mb-0">
                                                <i class="fas fa-chart-bar me-2"></i>
                                                Revenue per Procedure
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-container">
                                                <canvas id="revenueChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Most Booked Services (Pie Chart) -->
                                <div class="col-md-6 col-lg-6">
                                    <div class="card shadow-sm h-100 position-relative">
                                        <div class="loading-overlay" id="loading-services-chart">
                                            <div class="spinner"></div>
                                        </div>
                                        <div class="card-header" style="background-color: var(--primary-color); color: #fff;">
                                            <h5 class="card-title mb-0">
                                                <i class="fas fa-chart-pie me-2"></i>
                                                Most Booked Services
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-container">
                                                <canvas id="servicesPieChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Service Comparison (Bar Chart) -->
                        <div class="col-12">
                            <div class="card shadow-sm position-relative">
                                <div class="loading-overlay" id="loading-comparison-chart">
                                    <div class="spinner"></div>
                                </div>
                                <div class="card-header" style="background-color: var(--primary-color); color: #fff;">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-balance-scale me-2"></i>
                                        Service Comparison (Revenue vs Bookings)
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="chart-container">
                                        <canvas id="serviceComparisonChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <!-- Create Service Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="add-service" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form class="modal-body" action="{{ route('create.service') }}" method="post" id="create-service" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Service Image</label>
                        <div class="d-flex align-items-center gap-3">
                            <img src="/placeholder.svg" style="height: 100px; width: 100px; border-radius: 8px; border: 2px dashed #ddd; padding: 5px;" id="service_thumbnail">
                            <div>
                                <input class="visually-hidden" type="file" name="service_file" id="service_file" onchange="previewListing(this, 4)">
                                <button type="button" class="btn btn-outline-primary" onclick="document.getElementById('service_file').click()">
                                    <i class="bi bi-upload me-2"></i>Upload Image
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="service_name">Service Name</label>
                        <input class="form-control" type="text" name="service_name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="service_description">Description</label>
                        <textarea class="form-control" name="service_description" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="duration">Duration</label>
                        <div class="input-group" id="duration">
                            <span class="input-group-text">Hours</span>
                            <input class="form-control" type="number" min="0" name="service_hours" required>
                            <span class="input-group-text">Minutes</span>
                            <input class="form-control" type="number" max="60" min="0" name="service_minutes" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price Range</label>
                        <div class="input-group">
                            <span class="input-group-text">₱</span>
                            <input class="form-control" type="number" min="0" name="service_price_start" placeholder="From" required>
                            <span class="input-group-text">To</span>
                            <input class="form-control" type="number" min="0" name="service_price_end" placeholder="To" required>
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-default" type="button" onclick="document.getElementById('create-service').submit()">
                        <i class="bi bi-plus-circle me-2"></i>Create Service
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Service Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="edit-service" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form class="modal-body" method="post" id="edit-service-form" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Service Image</label>
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ isset($service) && $service->image_path ? asset('/' . $service->image_path) : asset('images/default.png') }}" style="height: 100px; width: 100px; border-radius: 8px; border: 2px solid #ddd; padding: 5px;" id="eservice_thumbnail">
                            <div>
                                <input class="visually-hidden" type="file" name="eservice_file" id="eservice_file" onchange="previewListing(this, 5)">
                                <button type="button" class="btn btn-outline-primary" onclick="document.getElementById('eservice_file').click()">
                                    <i class="bi bi-upload me-2"></i>Update Image
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="eservice_name">Service Name</label>
                        <input class="form-control" type="text" name="eservice_name" id="eservice-name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="eservice_description">Description</label>
                        <textarea class="form-control" name="eservice_description" id="eservice-description" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="duration">Duration</label>
                        <div class="input-group" id="duration">
                            <span class="input-group-text">Hours</span>
                            <input class="form-control" type="number" min="0" name="eservice_hours" id="eservice-hours" required>
                            <span class="input-group-text">Minutes</span>
                            <input class="form-control" type="number" max="60" min="0" name="eservice_minutes" id="eservice-minutes" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price Range</label>
                        <div class="input-group">
                            <span class="input-group-text">₱</span>
                            <input class="form-control" type="number" min="0" name="eservice_price_start" id="eservice-price-start" required>
                            <span class="input-group-text">To</span>
                            <input class="form-control" type="number" min="0" name="eservice_price_end" id="eservice-price-end" required>
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="button" onclick="document.getElementById('edit-service-form').submit()">
                        <i class="bi bi-save me-2"></i>Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Service Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="delete-service" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to delete this service? This action cannot be undone.</p>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="button" onclick="document.getElementById('delete-service-form').submit()">
                        <i class="bi bi-trash me-2"></i>Delete Service
                    </button>
                    <form id="delete-service-form" action="{{ route('destroy.service', $service->id ?? 0) }}" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Dentist Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="add-dentist" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Dentist</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form class="modal-body" action="{{ route('create.dentist') }}" method="post" id="add-dentist-form">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="fnamed">First Name</label>
                            <input class="form-control" type="text" name="fnamed" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="mnamed">Middle Name</label>
                            <input class="form-control" type="text" name="mnamed">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="lnamed">Last Name</label>
                            <input class="form-control" type="text" name="lnamed" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="birthdated">Date of Birth</label>
                            <input class="form-control" type="date" name="birthdated" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="sexd">Gender</label>
                            <select class="form-select" name="sexd" required>
                                <option value="" selected disabled>-- Select Gender required>
                                <option value="" selected disabled>-- Select Gender --</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="phoned">Contact No.</label>
                            <input class="form-control" type="tel" name="phoned" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="emaild">Email Address</label>
                            <input class="form-control" type="email" name="emaild" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="street_named">Street Name</label>
                        <input class="form-control" type="text" id="streetName" name="street_named" placeholder="Enter street name">
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="provinced">Province</label>
                            <select class="form-select" id="province" name="provinced" required>
                                <option value="">Select Province</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="cityd">City</label>
                            <select class="form-select" id="city" name="cityd" required disabled>
                                <option value="">Select City</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="postal_coded">Postal Code</label>
                        <input class="form-control" type="text" id="postalCode" name="postal_coded" placeholder="Enter postal code">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="passwordd">Default Password</label>
                        <input class="form-control" type="password" name="passwordd" required>
                    </div>
                </form>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-default" type="button" onclick="document.getElementById('add-dentist-form').submit()">
                        <i class="bi bi-plus-circle me-2"></i>Add Dentist
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Dentist Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="edit-dentist" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Dentist</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form class="modal-body" action="{{ route('update.dentist') }}" method="post" id="edit-dentist-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="dentist-id">

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="fnamee">First Name</label>
                            <input class="form-control" type="text" name="fnamee" id="fnamee" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="mnamee">Middle Name</label>
                            <input class="form-control" type="text" name="mnamee" id="mnamee">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="lnamee">Last Name</label>
                            <input class="form-control" type="text" name="lnamee" id="lnamee" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="birthdatee">Date of Birth</label>
                            <input class="form-control" type="date" name="birthdatee" id="birthdatee" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="sexe">Gender</label>
                            <select class="form-select" name="sexe" id="sexe" required>
                                <option selected disabled>-- Select Gender --</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="phonee">Contact No.</label>
                            <input class="form-control" type="tel" name="phonee" id="phonee" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="emaile">Email Address</label>
                            <input class="form-control" type="email" name="emaile" id="emaile" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold" for="location">Address</label>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label for="street_namee" class="form-label">Street Name</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    name="street_namee"
                                    id="street_namee"
                                    placeholder="Street Name">
                            </div>
                            <div class="col-md-6">
                                <label for="provincee" class="form-label">Province</label>
                                <select class="form-control" id="provincee" name="provincee">
                                    <option value="">Select Province</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="citye" class="form-label">City</label>
                                <select class="form-control" id="citye" name="citye" disabled>
                                    <option value="">Select City</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="postal_codee" class="form-label">Postal Code</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    name="postal_codee"
                                    id="postal_codee"
                                    placeholder="Postal Code">
                            </div>
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="button" onclick="document.getElementById('edit-dentist-form').submit()">
                        <i class="bi bi-save me-2"></i>Update Dentist
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Dentist Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="delete-dentist" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Dentist</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to delete this dentist? This action cannot be undone.</p>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <form id="delete-dentist-form" action="" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">
                            <i class="bi bi-trash me-2"></i>Delete Dentist
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Secretary Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="add-secretary" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Secretary</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form class="modal-body" action="{{ route('create.secretary') }}" method="post" id="add-secretary-form">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="fnames">First Name</label>
                            <input class="form-control" type="text" name="fnames" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="mnames">Middle Name</label>
                            <input class="form-control" type="text" name="mnames">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="lnames">Last Name</label>
                            <input class="form-control" type="text" name="lnames" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="birthdates">Date of Birth</label>
                            <input class="form-control" type="date" name="birthdates" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="sexs">Gender</label>
                            <select class="form-select" name="sexs" required>
                                <option value="" selected disabled>-- Select Gender --</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="phones">Contact No.</label>
                            <input class="form-control" type="tel" name="phones" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="emails">Email Address</label>
                            <input class="form-control" type="email" name="emails" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="street_names">Street Name</label>
                        <input class="form-control" type="text" id="streetName" name="street_names" placeholder="Enter street name">
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="provinces">Province</label>
                            <select class="form-select" id="provincesecre" name="provinces" required>
                                <option value="">Select Province</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="citys">City</label>
                            <select class="form-select" id="citypsecre" name="citys" required disabled>
                                <option value="">Select City</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="postal_codes">Postal Code</label>
                        <input class="form-control" type="text" id="postalCode" name="postal_codes" placeholder="Enter postal code">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="passwords">Default Password</label>
                        <input class="form-control" type="password" name="passwords" required>
                    </div>
                </form>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-default" type="button" onclick="document.getElementById('add-secretary-form').submit()">
                        <i class="bi bi-plus-circle me-2"></i>Add Secretary
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Secretary Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="edit-secretary" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Secretary</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form class="modal-body" action="{{ route('update.secretary') }}" method="post" id="edit-secretary-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="secretary-id">

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="fnamesec">First Name</label>
                            <input class="form-control" type="text" name="fnamesec" id="fnamesec" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="mnamesec">Middle Name</label>
                            <input class="form-control" type="text" name="mnamesec" id="mnamesec">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="lnamesec">Last Name</label>
                            <input class="form-control" type="text" name="lnamesec" id="lnamesec" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="birthdatesec">Date of Birth</label>
                            <input class="form-control" type="date" name="birthdatesec" id="birthdatesec" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="sexsec">Gender</label>
                            <select class="form-select" name="sexsec" id="sexsec" required>
                                <option selected disabled>-- Select Gender --</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="phonesec">Contact No.</label>
                            <input class="form-control" type="tel" name="phonesec" id="phonesec" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="emailsec">Email Address</label>
                            <input class="form-control" type="email" name="emailsec" id="emailsec" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold" for="location">Address</label>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label for="street_namesec" class="form-label">Street Name</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    name="street_namesec"
                                    id="street_namesec"
                                    placeholder="Street Name">
                            </div>
                            <div class="col-md-6">
                                <label for="provincesec" class="form-label">Province</label>
                                <select class="form-control" id="provincesec" name="provincesec">
                                    <option value="">Select Province</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="citysec" class="form-label">City</label>
                                <select class="form-control" id="citysec" name="citysec" disabled>
                                    <option value="">Select City</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="postal_codesec" class="form-label">Postal Code</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    name="postal_codesec"
                                    id="postal_codesec"
                                    placeholder="Postal Code">
                            </div>
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="button" onclick="document.getElementById('edit-secretary-form').submit()">
                        <i class="bi bi-save me-2"></i>Update Secretary
                    </button>
                </div>
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
                    <p class="mb-0">Are you sure you want to delete this secretary? This action cannot be undone.</p>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <form id="delete-secretary-form" action="" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">
                            <i class="bi bi-trash me-2"></i>Delete Secretary
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Patient Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="edit-patient" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form class="modal-body" action="{{ route('update.patient') }}" method="post" id="edit-patient-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="patient-id">

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="fnamep">First Name</label>
                            <input class="form-control" type="text" name="fnamep" id="fnamep" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="mnamep">Middle Name</label>
                            <input class="form-control" type="text" name="mnamep" id="mnamep">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="lnamep">Last Name</label>
                            <input class="form-control" type="text" name="lnamep" id="lnamep" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="birthdatep">Date of Birth</label>
                            <input class="form-control" type="date" name="birthdatep" id="birthdatep" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="sexp">Gender</label>
                            <select class="form-select" name="sexp" id="sexp" required>
                                <option selected disabled>-- Select Gender --</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="phonep">Contact No.</label>
                            <input class="form-control" type="tel" name="phonep" id="phonep" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="emailp">Email Address</label>
                            <input class="form-control" type="email" name="emailp" id="emailp" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold" for="location">Address</label>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label for="street_namep" class="form-label">Street Name</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    name="street_namep"
                                    id="street_namep"
                                    placeholder="Street Name">
                            </div>
                            <div class="col-md-6">
                                <label for="provincep" class="form-label">Province</label>
                                <select class="form-control" id="provincep" name="provincep">
                                    <option value="">Select Province</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="cityp" class="form-label">City</label>
                                <select class="form-control" id="cityp" name="cityp" disabled>
                                    <option value="">Select City</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="postal_codep" class="form-label">Postal Code</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    name="postal_codep"
                                    id="postal_codep"
                                    placeholder="Postal Code">
                            </div>
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="button" onclick="document.getElementById('edit-patient-form').submit()">
                        <i class="bi bi-save me-2"></i>Update Patient
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete User Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="delete-user" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to delete this patient? This action cannot be undone.</p>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <form id="delete-user-form" action="" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">
                            <i class="bi bi-trash me-2"></i>Delete Patient
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Clinic Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="add-listing" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Clinic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form class="modal-body" action="{{ route('create.listing') }}" method="post" enctype="multipart/form-data" id="create-listing">
                    @csrf

                    <div class="d-flex gap-3 mb-4">
                        <img class="border rounded" style="height: 150px; width: 150px; object-fit: cover;" id="listing-thumbnail-img" src="/placeholder.svg">
                        <div class="d-flex flex-column justify-content-center">
                            <h5 class="mb-3 fw-bold">Clinic Image</h5>
                            <div class="d-flex gap-2">
                                <input class="visually-hidden" type="file" name="listing-thumbnail" onchange="previewListing(this, 1)" accept="image/*" id="listing-thumbnail">
                                <button class="btn btn-outline-primary" type="button" onclick="document.getElementById('listing-thumbnail').click()">
                                    <i class="bi bi-upload me-2"></i>Upload Image
                                </button>
                                <button class="btn btn-outline-danger" type="button">
                                    <i class="bi bi-x-circle me-2"></i>Remove
                                </button>
                            </div>
                        </div>
                    </div>

                    <hr class="mb-4">

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="listing-name">Clinic Name</label>
                        <input class="form-control" type="text" name="listing-name" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold" for="listing-email">Email Address</label>
                            <input class="form-control" type="email" name="listing-email" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold" for="listing-contact">Contact No.</label>
                            <input class="form-control" type="tel" name="listing-contact" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold" for="listing-location">Location</label>
                        <input class="form-control" type="text" name="listing-location" required>
                    </div>

                    <div class="accordion mb-4" id="accordion-services">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#list-services" aria-expanded="false" aria-controls="list-services">Services</button>
                            </h2>

                            <div class="accordion-collapse collapse" id="list-services" data-bs-parent="#accordion-services">
                                <div class="accordion-body">
                                    <div class="row">
                                        @forelse ($services as $service)
                                        <div class="col-md-4 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $service->id }}" name="service[]" id="service{{ $service->id }}">
                                                <label class="form-check-label" for="service{{ $service->id }}">{{ $service->name }}</label>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="col-12">
                                            <div class="alert alert-info mb-0">No services available yet.</div>
                                        </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion mb-4" id="accordion-dentist">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#list-dentist" aria-expanded="false" aria-controls="list-dentist">Dentists</button>
                            </h2>

                            <div class="accordion-collapse collapse" id="list-dentist" data-bs-parent="#accordion-dentist">
                                <div class="accordion-body">
                                    <div class="row">
                                        @forelse ($dentist as $dent)
                                        <div class="col-md-4 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $dent->id }}" name="dent[]" id="dent{{ $dent->id }}">
                                                <label class="form-check-label" for="dent{{ $dent->id }}">Dr. {{ $dent->fname . ' ' . $dent->mname . ' ' . $dent->lname }}</label>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="col-12">
                                            <div class="alert alert-info mb-0">No dentists available yet.</div>
                                        </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                    @endphp

                    <div class="mb-4">
                        <label for="listing-schedule" class="form-label fw-bold">Schedule</label>

                        @foreach (array_chunk($days, 2) as $dayPair)
                        <div class="row mb-3">
                            @foreach ($dayPair as $day)
                            <div class="col-md-6">
                                <div class="card border p-3">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="listing-{{ strtolower($day) }}" id="listing-{{ strtolower($day) }}">
                                        <label class="form-check-label fw-bold" for="listing-{{ strtolower($day) }}">{{ $day }}</label>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-text">Starting Time</span>
                                        <input class="form-control" type="time" name="{{ strtolower($day) }}-time-start">
                                        <span class="input-group-text">Ending Time</span>
                                        <input class="form-control" type="time" name="{{ strtolower($day) }}-time-end">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold" for="listing-about">About Us</label>
                        <textarea class="form-control" name="listing-about" rows="5" style="resize: none;"></textarea>
                    </div>
                </form>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-default" type="button" onclick="document.getElementById('create-listing').submit()">
                        <i class="bi bi-plus-circle me-2"></i>Create Clinic
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- View / Edit Listing Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="view-listing" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="view-listing-name">Edit Clinic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form class="modal-body" method="post" enctype="multipart/form-data" id="view-listing-form">
                    @csrf

                    <div class="d-flex gap-3 mb-4">
                        <img class="border rounded" style="height: 150px; width: 150px; object-fit: cover;" id="vlisting-thumbnail-img">
                        <div class="d-flex flex-column justify-content-center">
                            <h5 class="mb-3 fw-bold">Clinic Image</h5>
                            <div class="d-flex gap-2">
                                <input class="visually-hidden" type="file" name="vlisting-thumbnail" onchange="previewListing(this, 2)" accept="image/*" id="vlisting-thumbnail">
                                <button class="btn btn-outline-primary" type="button" onclick="document.getElementById('vlisting-thumbnail').click()">
                                    <i class="bi bi-upload me-2"></i>Update Image
                                </button>
                                <button class="btn btn-outline-danger" type="button">
                                    <i class="bi bi-x-circle me-2"></i>Remove
                                </button>
                            </div>
                        </div>
                    </div>

                    <hr class="mb-4">

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="vlisting-name">Clinic Name</label>
                        <input class="form-control" type="text" name="vlisting-name" id="vlisting-name" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold" for="vlisting-email">Email Address</label>
                            <input class="form-control" type="email" name="vlisting-email" id="vlisting-email" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold" for="vlisting-contact">Contact No.</label>
                            <input class="form-control" type="tel" name="vlisting-contact" id="vlisting-contact" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold" for="vlisting-location">Location</label>
                        <input class="form-control" type="text" name="vlisting-location" id="vlisting-location" required>
                    </div>

                    <div class="accordion mb-4" id="vaccordion-services">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#vlist-services" aria-expanded="true" aria-controls="vlist-services">Services</button>
                            </h2>

                            <div class="accordion-collapse collapse show" id="vlist-services" data-bs-parent="#vaccordion-services">
                                <div class="accordion-body">
                                    <div class="row">
                                        @foreach ($services as $service)
                                        <div class="col-md-4 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input"
                                                    type="checkbox"
                                                    value="{{ $service->id }}"
                                                    id="vservice{{ $service->id }}"
                                                    name="vservice[]"
                                                    @if($service->is_selected) checked @endif>
                                                <label class="form-check-label" for="vservice{{ $service->id }}">{{ $service->name }}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion mb-4" id="vaccordion-dentist">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#vlist-dentist" aria-expanded="true" aria-controls="vlist-dentist">Dentists</button>
                            </h2>

                            <div class="accordion-collapse collapse show" id="vlist-dentist" data-bs-parent="#vaccordion-dentist">
                                <div class="accordion-body">
                                    <div class="row">
                                        @foreach ($dentist as $dent)
                                        <div class="col-md-4 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $dent->id }}" id="vdent{{ $dent->id }}" name="vdent[]">
                                                <label class="form-check-label" for="vdent{{ $dent->id }}">Dr. {{ $dent->fname . ' ' . $dent->mname . ' ' . $dent->lname }}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                    @endphp

                    <div class="mb-4">
                        <label for="listing-schedule" class="form-label fw-bold">Schedule</label>

                        @foreach (array_chunk($days, 2) as $dayPair)
                        <div class="row mb-3">
                            @foreach ($dayPair as $day)
                            <div class="col-md-6">
                                <div class="card border p-3">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="vlisting-{{ strtolower($day) }}" id="vlisting-{{ strtolower($day) }}">
                                        <label class="form-check-label fw-bold" for="vlisting-{{ strtolower($day) }}">{{ $day }}</label>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-text">Starting Time</span>
                                        <input class="form-control" type="time" name="v{{ strtolower($day) }}-time-start">
                                        <span class="input-group-text">Ending Time</span>
                                        <input class="form-control" type="time" name="v{{ strtolower($day) }}-time-end">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold" for="vlisting-about">About Us</label>
                        <textarea class="form-control" name="vlisting-about" id="vlisting-about" rows="5" style="resize: none;"></textarea>
                    </div>
                </form>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="button" onclick="document.getElementById('view-listing-form').submit()">
                        <i class="bi bi-save me-2"></i>Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Listing Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="delete-listing" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Clinic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to delete this clinic? This action cannot be undone.</p>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="button" onclick="document.getElementById('delete-listing-form').submit()">
                        <i class="bi bi-trash me-2"></i>Delete Clinic
                    </button>
                    <form id="delete-listing-form" action="{{ route('destroy.listing', $listing->id ?? 0) }}" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
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
                                        <p class="mb-2 text-danger"><strong>Total Discount Given:</strong> ₱{{ number_format($totalDiscountGiven, 2) }}</p>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                let successAlert = document.getElementById("success-alert");
                let errorAlert = document.getElementById("error-alert");
                let errorMessage = document.getElementById("error-message");

                if (successAlert) {
                    successAlert.classList.remove("show");
                    successAlert.classList.add("fade");
                }

                if (errorAlert) {
                    errorAlert.classList.remove("show");
                    errorAlert.classList.add("fade");
                }

                if (errorMessage) {
                    errorMessage.classList.remove("show");
                    errorMessage.classList.add("fade");
                }
            }, 5000);

            // Sort appointments by nearest time
            sortAppointmentsByNearestTime();

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
                default:
                    break;
            }

            // Setup table search and filtering
            const searchInput = document.getElementById("tableSearch");
            const statusFilter = document.getElementById("statusFilter");
            const tableRows = document.querySelectorAll("#appointmentTable tbody tr");

            if (searchInput && statusFilter && tableRows) {
                function filterTable() {
                    const searchText = searchInput.value.toLowerCase();
                    const selectedStatus = statusFilter.value;

                    tableRows.forEach(row => {
                        // Extract text from specific columns
                        const dentist = row.querySelector("td.dentist")?.textContent.toLowerCase() || '';
                        const patient = row.querySelector("td.patient")?.textContent.toLowerCase() || '';
                        const clinic = row.querySelector("td.clinic")?.textContent.toLowerCase() || '';
                        const service = row.querySelector("td.service")?.textContent.toLowerCase() || '';
                        const status = row.querySelector("td:nth-child(6)")?.textContent.toLowerCase() || '';

                        // Combine text from the desired fields
                        const searchableText = [dentist, patient, clinic, service, status].join(" ");
                        const rowStatus = row.getAttribute("data-status");

                        // Check if the search text matches and status filter applies
                        const matchesSearch = searchText === "" || searchableText.includes(searchText);
                        const matchesStatus = selectedStatus === "All" || rowStatus === selectedStatus;

                        // Show or hide the row
                        row.style.display = (matchesSearch && matchesStatus) ? "" : "none";
                    });
                }

                searchInput.addEventListener("input", filterTable);
                statusFilter.addEventListener("change", filterTable);
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
        function printTable() {
            var content = document.getElementById("printTable").innerHTML;
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

        function printTableDentists() {
            var content = document.getElementById("printDentists").innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = content;
            window.print();
            document.body.innerHTML = originalContent;
        }

        function printTableSecretaries() {
            var content = document.getElementById("printSecretaries").innerHTML;
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

        // Image preview function
        function previewListing(input, type) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    let previewer;

                    if (type == 1) {
                        previewer = document.getElementById('listing-thumbnail-img');
                    } else if (type == 2) {
                        previewer = document.getElementById('vlisting-thumbnail-img');
                    } else if (type == 3) {
                        previewer = document.getElementById('profile-img');
                    } else if (type == 4) {
                        previewer = document.getElementById('service_thumbnail');
                    } else if (type == 5) {
                        previewer = document.getElementById('eservice_thumbnail');
                    }

                    previewer.src = e.target.result;
                }

                reader.readAsDataURL(file);
            }
        }

        // AJAX functions for fetching data
        function get_service(id) {
            fetch(`/get-service/${parseInt(id, 10)}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(response => {
                return response.json();
            }).then(data => {
                $('#edit-service-form').attr('action', `/edit-service/${data.service.id}`);
                $('#eservice_thumbnail').attr('src', '/' + data.service.image_path);
                $('#eservice-name').val(data.service.name);
                $('#eservice-description').text(data.service.description);

                let hours = Math.floor(data.service.duration / 60);
                let minutes = data.service.duration % 60;

                $('#eservice-hours').val(hours);
                $('#eservice-minutes').val(minutes);
                $('#eservice-price-start').val(data.service.price_start);
                $('#eservice-price-end').val(data.service.price_end);
            });
        }

        function get_dentist(id) {
            fetch(`/get-dentist/${parseInt(id, 10)}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(response => {
                return response.json();
            }).then(data => {
                console.log("Fetched Data:", data);
                $('#dentist-id').val(data.user.id);
                $('#fnamee').val(data.user.fname);
                $('#mnamee').val(data.user.mname);
                $('#lnamee').val(data.user.lname);

                const birthdate = new Date(data.user.birthdate).toISOString().split('T')[0];
                $('#birthdatee').val(birthdate);

                $('#sexe').val(data.user.gender);
                $('#phonee').val(data.user.phone);
                $('#emaile').val(data.user.email);
                $('#street_namee').val(data.user.street_name);
                $('#provincee').val(data.user.province);
                $('#citye').val(data.user.city);
                $('#postal_codee').val(data.user.postal_code);
            });
        }

        function get_secretary(id) {
            fetch(`/get-secretary/${parseInt(id, 10)}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(response => {
                return response.json();
            }).then(data => {
                console.log("Fetched Data:", data);
                $('#secretary-id').val(data.user.id);
                $('#fnamesec').val(data.user.fname);
                $('#mnamesec').val(data.user.mname);
                $('#lnamesec').val(data.user.lname);

                const birthdate = new Date(data.user.birthdate).toISOString().split('T')[0];
                $('#birthdatesec').val(birthdate);

                $('#sexsec').val(data.user.gender);
                $('#phonesec').val(data.user.phone);
                $('#emailsec').val(data.user.email);
                $('#street_namesec').val(data.user.street_name);
                $('#provincesec').val(data.user.province);
                $('#citysec').val(data.user.city);
                $('#postal_codesec').val(data.user.postal_code);
            });
        }

        function get_patient(id) {
            fetch(`/get-patient/${parseInt(id, 10)}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(response => {
                return response.json();
            }).then(data => {
                console.log("Fetched Data:", data);
                $('#patient-id').val(data.user.id);
                $('#fnamep').val(data.user.fname);
                $('#mnamep').val(data.user.mname);
                $('#lnamep').val(data.user.lname);

                const birthdate = new Date(data.user.birthdate).toISOString().split('T')[0];
                $('#birthdatep').val(birthdate);

                $('#sexp').val(data.user.gender);
                $('#phonep').val(data.user.phone);
                $('#emailp').val(data.user.email);
                $('#street_namep').val(data.user.street_name);
                $('#provincep').val(data.user.province);
                $('#cityp').val(data.user.city);
                $('#postal_codep').val(data.user.postal_code);
            });
        }

        function get_listing(id) {
            fetch(`/get-listing/${parseInt(id, 10)}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(response => {
                return response.json();
            }).then(data => {
                $('#view-listing-form').attr('action', `/edit-listing/${data.listing.id}`);

                $('#vlisting-thumbnail-img').attr('src', '/' + data.listing.image_path);
                $('#vlisting-name').val(data.listing.name);
                $('#vlisting-email').val(data.listing.email);
                $('#vlisting-contact').val(data.listing.contact);
                $('#vlisting-location').val(data.listing.location);

                data.services.forEach(service => {
                    $(`#vservice${service.id}`).prop('checked', true);
                });

                data.assign.forEach(assign => {
                    console.log('Checking dentist ID:', assign.id);
                    $(`#vdent${assign.id}`).prop('checked', true);
                });

                data.schedules.forEach(schedule => {
                    const day = schedule.day.toLowerCase();

                    $(`input[name="vlisting-${day}"]`).prop('checked', true);
                    $(`input[name="v${day}-time-start"]`).val(schedule.start);
                    $(`input[name="v${day}-time-end"]`).val(schedule.end);
                });

                $('#vlisting-about').val(data.listing.description);
            });
        }

        function setDeleteFormAction(action) {
            document.getElementById('delete-service-form').setAttribute('action', action);
        }

        // Setup delete user modal
        $('#delete-user').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var userId = button.data('user-id');

            var form = $(this).find('#delete-user-form');
            form.attr('action', '/users/' + userId);
        });

        $('#delete-dentist').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var userId = button.data('user-id');

            var form = $(this).find('#delete-dentist-form');
            form.attr('action', '/dentist/' + userId);
        });

        $('#delete-secretary').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var userId = button.data('user-id');

            var form = $(this).find('#delete-secretary-form');
            form.attr('action', '/secretary/' + userId);
        });


        // DENTSIT
        document.addEventListener("DOMContentLoaded", function() {
            const provinceSelect = document.getElementById("provincee");
            const citySelect = document.getElementById("citye");

            // Get existing province and city from database (could be name or code)
            const existingProvinceDB = $('#provincee').attr("data-selected"); // Name or Code
            const existingCityName = $('#citye').attr("data-selected"); // City Name

            let provinceMap = {}; // Map to store province code -> name

            fetch("https://psgc.gitlab.io/api/provinces/")
                .then(response => response.json())
                .then(provinces => {
                    let selectedProvinceName = null;

                    provinces.sort((a, b) => a.name.localeCompare(b.name));

                    provinces.forEach(province => {
                        provinceMap[province.code] = province.name; // Store mapping
                        let option = document.createElement("option");
                        option.value = province.name; // Store name in <option> value
                        option.textContent = province.name; // Display name
                        option.setAttribute("data-code", province.code); // Store code for fetching cities

                        // Match by code or name
                        if (province.code === existingProvinceDB || province.name === existingProvinceDB) {
                            selectedProvinceName = province.name;
                        }

                        provinceSelect.appendChild(option);
                    });

                    // If we found a matching province, set it as selected
                    if (selectedProvinceName) {
                        provinceSelect.value = selectedProvinceName;
                        let provinceCode = Object.keys(provinceMap).find(code => provinceMap[code] === selectedProvinceName);
                        loadCities(provinceCode, existingCityName);
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
                let selectedProvinceName = this.value;
                let selectedProvinceCode = Object.keys(provinceMap).find(code => provinceMap[code] === selectedProvinceName);
                loadCities(selectedProvinceCode);
            });

            document.querySelector("form").addEventListener("submit", function(event) {
                let selectedProvince = provinceSelect.value; // Get the province name

                let provinceInput = document.createElement("input");
                provinceInput.type = "hidden";
                provinceInput.name = "province";
                provinceInput.value = selectedProvince; // Save NAME, not CODE

                this.appendChild(provinceInput);
            });
        });

        // SECRETARY
        document.addEventListener("DOMContentLoaded", function() {
            const provinceSelect = document.getElementById("provincesec");
            const citySelect = document.getElementById("citysec");

            // Get existing province and city from database (could be name or code)
            const existingProvinceDB = $('#provincesec').attr("data-selected"); // Name or Code
            const existingCityName = $('#citysec').attr("data-selected"); // City Name

            let provinceMap = {}; // Map to store province code -> name

            fetch("https://psgc.gitlab.io/api/provinces/")
                .then(response => response.json())
                .then(provinces => {
                    let selectedProvinceName = null;

                    provinces.sort((a, b) => a.name.localeCompare(b.name));

                    provinces.forEach(province => {
                        provinceMap[province.code] = province.name; // Store mapping
                        let option = document.createElement("option");
                        option.value = province.name; // Store name in <option> value
                        option.textContent = province.name; // Display name
                        option.setAttribute("data-code", province.code); // Store code for fetching cities

                        // Match by code or name
                        if (province.code === existingProvinceDB || province.name === existingProvinceDB) {
                            selectedProvinceName = province.name;
                        }

                        provinceSelect.appendChild(option);
                    });

                    // If we found a matching province, set it as selected
                    if (selectedProvinceName) {
                        provinceSelect.value = selectedProvinceName;
                        let provinceCode = Object.keys(provinceMap).find(code => provinceMap[code] === selectedProvinceName);
                        loadCities(provinceCode, existingCityName);
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
                let selectedProvinceName = this.value;
                let selectedProvinceCode = Object.keys(provinceMap).find(code => provinceMap[code] === selectedProvinceName);
                loadCities(selectedProvinceCode);
            });

            document.querySelector("form").addEventListener("submit", function(event) {
                let selectedProvince = provinceSelect.value; // Get the province name

                let provinceInput = document.createElement("input");
                provinceInput.type = "hidden";
                provinceInput.name = "province";
                provinceInput.value = selectedProvince; // Save NAME, not CODE

                this.appendChild(provinceInput);
            });
        });


        // PATIENT 
        document.addEventListener("DOMContentLoaded", function() {
            const provinceSelect = document.getElementById("provincep");
            const citySelect = document.getElementById("cityp");

            // Get existing province and city from database (could be name or code)
            const existingProvinceDB = $('#provincep').attr("data-selected"); // Name or Code
            const existingCityName = $('#cityp').attr("data-selected"); // City Name

            let provinceMap = {}; // Map to store province code -> name

            fetch("https://psgc.gitlab.io/api/provinces/")
                .then(response => response.json())
                .then(provinces => {
                    let selectedProvinceName = null;

                    provinces.sort((a, b) => a.name.localeCompare(b.name)); // Sort provinces alphabetically

                    provinces.forEach(province => {
                        provinceMap[province.code] = province.name; // Store mapping
                        let option = document.createElement("option");
                        option.value = province.name; // Store name in <option> value
                        option.textContent = province.name; // Display name
                        option.setAttribute("data-code", province.code); // Store code for fetching cities

                        // Match by code or name
                        if (province.code === existingProvinceDB || province.name === existingProvinceDB) {
                            selectedProvinceName = province.name;
                        }

                        provinceSelect.appendChild(option);
                    });

                    // If we found a matching province, set it as selected
                    if (selectedProvinceName) {
                        provinceSelect.value = selectedProvinceName;
                        let provinceCode = Object.keys(provinceMap).find(code => provinceMap[code] === selectedProvinceName);
                        loadCities(provinceCode, existingCityName);
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

                            cities.sort((a, b) => a.name.localeCompare(b.name)); // Sort cities alphabetically

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
                let selectedProvinceName = this.value;
                let selectedProvinceCode = Object.keys(provinceMap).find(code => provinceMap[code] === selectedProvinceName);
                loadCities(selectedProvinceCode);
            });

            document.querySelector("form").addEventListener("submit", function(event) {
                let selectedProvince = provinceSelect.value; // Get the province name

                let provinceInput = document.createElement("input");
                provinceInput.type = "hidden";
                provinceInput.name = "province";
                provinceInput.value = selectedProvince; // Save NAME, not CODE

                this.appendChild(provinceInput);
            });
        });

        // CREATE DENTIST
        document.addEventListener("DOMContentLoaded", function() {
            const provinceSelect = document.getElementById("province");
            const citySelect = document.getElementById("city");

            // Get existing province and city from database (could be name or code)
            const existingProvinceDB = $('#province').attr("data-selected"); // Name or Code
            const existingCityName = $('#city').attr("data-selected"); // City Name

            let provinceMap = {}; // Map to store province code -> name

            fetch("https://psgc.gitlab.io/api/provinces/")
                .then(response => response.json())
                .then(provinces => {
                    let selectedProvinceName = null;

                    provinces.sort((a, b) => a.name.localeCompare(b.name)); // Sort provinces alphabetically

                    provinces.forEach(province => {
                        provinceMap[province.code] = province.name; // Store mapping
                        let option = document.createElement("option");
                        option.value = province.name; // Store name in <option> value
                        option.textContent = province.name; // Display name
                        option.setAttribute("data-code", province.code); // Store code for fetching cities

                        // Match by code or name
                        if (province.code === existingProvinceDB || province.name === existingProvinceDB) {
                            selectedProvinceName = province.name;
                        }

                        provinceSelect.appendChild(option);
                    });

                    // If we found a matching province, set it as selected
                    if (selectedProvinceName) {
                        provinceSelect.value = selectedProvinceName;
                        let provinceCode = Object.keys(provinceMap).find(code => provinceMap[code] === selectedProvinceName);
                        loadCities(provinceCode, existingCityName);
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

                            cities.sort((a, b) => a.name.localeCompare(b.name)); // Sort cities alphabetically

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
                let selectedProvinceName = this.value;
                let selectedProvinceCode = Object.keys(provinceMap).find(code => provinceMap[code] === selectedProvinceName);
                loadCities(selectedProvinceCode);
            });

            document.querySelector("form").addEventListener("submit", function(event) {
                let selectedProvince = provinceSelect.value; // Get the province name

                let provinceInput = document.createElement("input");
                provinceInput.type = "hidden";
                provinceInput.name = "province";
                provinceInput.value = selectedProvince; // Save NAME, not CODE

                this.appendChild(provinceInput);
            });
        });

        // CREATE SECRETARY
        document.addEventListener("DOMContentLoaded", function() {
            const provinceSelect = document.getElementById("provincesecre");
            const citySelect = document.getElementById("citypsecre");

            // Get existing province and city from database (could be name or code)
            const existingProvinceDB = $('#provincesecre').attr("data-selected"); // Name or Code
            const existingCityName = $('#citysecre').attr("data-selected"); // City Name

            let provinceMap = {}; // Map to store province code -> name

            fetch("https://psgc.gitlab.io/api/provinces/")
                .then(response => response.json())
                .then(provinces => {
                    let selectedProvinceName = null;

                    provinces.sort((a, b) => a.name.localeCompare(b.name)); // Sort provinces alphabetically

                    provinces.forEach(province => {
                        provinceMap[province.code] = province.name; // Store mapping
                        let option = document.createElement("option");
                        option.value = province.name; // Store name in <option> value
                        option.textContent = province.name; // Display name
                        option.setAttribute("data-code", province.code); // Store code for fetching cities

                        // Match by code or name
                        if (province.code === existingProvinceDB || province.name === existingProvinceDB) {
                            selectedProvinceName = province.name;
                        }

                        provinceSelect.appendChild(option);
                    });

                    // If we found a matching province, set it as selected
                    if (selectedProvinceName) {
                        provinceSelect.value = selectedProvinceName;
                        let provinceCode = Object.keys(provinceMap).find(code => provinceMap[code] === selectedProvinceName);
                        loadCities(provinceCode, existingCityName);
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

                            cities.sort((a, b) => a.name.localeCompare(b.name)); // Sort cities alphabetically

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
                let selectedProvinceName = this.value;
                let selectedProvinceCode = Object.keys(provinceMap).find(code => provinceMap[code] === selectedProvinceName);
                loadCities(selectedProvinceCode);
            });

            document.querySelector("form").addEventListener("submit", function(event) {
                let selectedProvince = provinceSelect.value; // Get the province name

                let provinceInput = document.createElement("input");
                provinceInput.type = "hidden";
                provinceInput.name = "province";
                provinceInput.value = selectedProvince; // Save NAME, not CODE

                this.appendChild(provinceInput);
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Chart.js global defaults
            Chart.defaults.font.family = "'Poppins', 'Helvetica', 'Arial', sans-serif";
            Chart.defaults.font.size = 12;
            Chart.defaults.plugins.tooltip.backgroundColor = 'rgba(0, 0, 0, 0.8)';
            Chart.defaults.plugins.tooltip.padding = 10;
            Chart.defaults.plugins.tooltip.cornerRadius = 6;
            Chart.defaults.plugins.tooltip.titleFont.size = 14;
            Chart.defaults.plugins.tooltip.titleFont.weight = 'bold';

            // Get primary color from CSS variable
            const primaryColor = getComputedStyle(document.documentElement).getPropertyValue('--primary-color').trim();
            let primaryColorRgb = getComputedStyle(document.documentElement).getPropertyValue('--primary-color-rgb').trim();
            if (!primaryColorRgb) {
                primaryColorRgb = '0, 123, 255'; // Default to a blue shade (Bootstrap primary color)
            }

            // Create color palette based on primary color
            const colorPalette = [
                primaryColor,
                `rgba(${primaryColorRgb}, 0.8)`,
                `rgba(${primaryColorRgb}, 0.6)`,
                `rgba(${primaryColorRgb}, 0.4)`,
                `rgba(${primaryColorRgb}, 0.2)`
            ];

            // Format currency function
            const formatCurrency = (value) => {
                return new Intl.NumberFormat('en-PH', {
                    style: 'currency',
                    currency: 'PHP',
                    minimumFractionDigits: 0
                }).format(value);
            };

            // Show loading state
            const showLoading = () => {
                document.querySelectorAll('.loading-overlay').forEach(overlay => {
                    overlay.style.display = 'flex';
                });
            };

            // Hide loading state
            const hideLoading = () => {
                document.querySelectorAll('.loading-overlay').forEach(overlay => {
                    setTimeout(() => {
                        overlay.style.display = 'none';
                    }, 500); // Add a small delay for better UX
                });
            };

            // Initialize charts with animations
            let revenueChart, servicesPieChart, serviceComparisonChart;

            document.getElementById('nav-statistics').addEventListener('click', function() {
                console.log("Statistics button clicked!");

                // Show loading state
                showLoading();

                // Destroy existing charts to prevent duplicates
                if (revenueChart) revenueChart.destroy();
                if (servicesPieChart) servicesPieChart.destroy();
                if (serviceComparisonChart) serviceComparisonChart.destroy();

                fetch("{{ route('statistics.data') }}")
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log("Data fetched:", data);

                        // Hide loading state
                        hideLoading();

                        // Most Profitable Procedure
                        const mostProfitableProcedureEl = document.getElementById('mostProfitableProcedure');
                        if (mostProfitableProcedureEl && data.mostProfitableProcedure) {
                            mostProfitableProcedureEl.innerHTML = `
                        ${formatCurrency(data.mostProfitableProcedure.total_revenue)}
                        <div class="stats-label">${data.mostProfitableProcedure.name}</div>
                    `;
                            mostProfitableProcedureEl.classList.add('fade-in');
                        }

                        // Most Profitable This Month
                        const mostProfitableMonthEl = document.getElementById('mostProfitableMonth');
                        if (mostProfitableMonthEl && data.mostProfitableThisMonth) {
                            mostProfitableMonthEl.innerHTML = `
                        ${formatCurrency(data.mostProfitableThisMonth.total_revenue)}
                        <div class="stats-label">${data.mostProfitableThisMonth.name}</div>
                    `;
                            mostProfitableMonthEl.classList.add('fade-in');
                        }

                        // Revenue per Procedure (Bar Chart)
                        const revenueChartEl = document.getElementById('revenueChart');
                        if (revenueChartEl && data.revenuePerProcedure.length > 0) {
                            const ctx = revenueChartEl.getContext('2d');

                            // Create gradient for bars
                            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
                            gradient.addColorStop(0, `rgba(${primaryColorRgb}, 0.8)`);
                            gradient.addColorStop(1, `rgba(${primaryColorRgb}, 0.2)`);

                            revenueChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: data.revenuePerProcedure.map(proc => proc.name),
                                    datasets: [{
                                        label: 'Revenue',
                                        data: data.revenuePerProcedure.map(proc => parseFloat(proc.total_revenue)),
                                        backgroundColor: gradient,
                                        borderColor: primaryColor,
                                        borderWidth: 1,
                                        borderRadius: 6,
                                        barPercentage: 0.7,
                                        categoryPercentage: 0.8
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    animation: {
                                        duration: 1000,
                                        easing: 'easeOutQuart'
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            grid: {
                                                color: `rgba(${primaryColorRgb}, 0.1)`,
                                                drawBorder: false
                                            },
                                            ticks: {
                                                color: `rgba(${primaryColorRgb}, 0.8)`,
                                                callback: function(value) {
                                                    return formatCurrency(value);
                                                }
                                            }
                                        },
                                        x: {
                                            grid: {
                                                display: false
                                            },
                                            ticks: {
                                                color: `rgba(${primaryColorRgb}, 0.8)`,
                                                maxRotation: 45,
                                                minRotation: 45
                                            }
                                        }
                                    },
                                    plugins: {
                                        legend: {
                                            display: false
                                        },
                                        tooltip: {
                                            callbacks: {
                                                label: function(context) {
                                                    return formatCurrency(context.raw);
                                                }
                                            }
                                        }
                                    }
                                }
                            });
                        }

                        // Most Booked Services (Pie Chart)
                        const servicesPieChartEl = document.getElementById('servicesPieChart');
                        if (servicesPieChartEl && data.mostBookedServices.length > 0) {
                            servicesPieChart = new Chart(servicesPieChartEl.getContext('2d'), {
                                type: 'doughnut',
                                data: {
                                    labels: data.mostBookedServices.map(service => service.name),
                                    datasets: [{
                                        data: data.mostBookedServices.map(service => service.total_bookings),
                                        backgroundColor: colorPalette,
                                        borderColor: '#ffffff',
                                        borderWidth: 2,
                                        hoverOffset: 10
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    cutout: '60%',
                                    animation: {
                                        animateRotate: true,
                                        animateScale: true
                                    },
                                    plugins: {
                                        legend: {
                                            position: 'bottom',
                                            labels: {
                                                padding: 20,
                                                usePointStyle: true,
                                                pointStyle: 'circle',
                                                color: `rgba(${primaryColorRgb}, 0.8)`
                                            }
                                        },
                                        tooltip: {
                                            callbacks: {
                                                label: function(context) {
                                                    const label = context.label || '';
                                                    const value = context.raw;
                                                    const total = context.dataset.data.reduce((acc, data) => acc + data, 0);
                                                    const percentage = Math.round((value / total) * 100);
                                                    return `${label}: ${value} bookings (${percentage}%)`;
                                                }
                                            }
                                        }
                                    }
                                }
                            });
                        }

                        // Service Comparison (Bar Chart)
                        const serviceComparisonChartEl = document.getElementById('serviceComparisonChart');
                        if (serviceComparisonChartEl) {
                            const services = [...new Set([
                                ...data.revenuePerProcedure.map(proc => proc.name),
                                ...data.mostBookedServices.map(service => service.name)
                            ])];

                            const revenueData = services.map(service => {
                                const proc = data.revenuePerProcedure.find(p => p.name === service);
                                return proc ? parseFloat(proc.total_revenue) : 0;
                            });

                            const bookingsData = services.map(service => {
                                const booked = data.mostBookedServices.find(s => s.name === service);
                                return booked ? booked.total_bookings : 0;
                            });

                            // Create gradients
                            const ctx = serviceComparisonChartEl.getContext('2d');
                            const revenueGradient = ctx.createLinearGradient(0, 0, 0, 400);
                            revenueGradient.addColorStop(0, `rgba(${primaryColorRgb}, 0.8)`);
                            revenueGradient.addColorStop(1, `rgba(${primaryColorRgb}, 0.2)`);

                            const bookingsGradient = ctx.createLinearGradient(0, 0, 0, 400);
                            bookingsGradient.addColorStop(0, `rgba(${primaryColorRgb}, 0.5)`);
                            bookingsGradient.addColorStop(1, `rgba(${primaryColorRgb}, 0.1)`);

                            serviceComparisonChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: services,
                                    datasets: [{
                                            label: 'Revenue',
                                            data: revenueData,
                                            backgroundColor: revenueGradient,
                                            borderColor: primaryColor,
                                            borderWidth: 1,
                                            borderRadius: 6,
                                            yAxisID: 'y',
                                            order: 1
                                        },
                                        {
                                            label: 'Bookings',
                                            data: bookingsData,
                                            backgroundColor: bookingsGradient,
                                            borderColor: primaryColor,
                                            borderWidth: 1,
                                            borderRadius: 6,
                                            yAxisID: 'y1',
                                            order: 2
                                        }
                                    ]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    animation: {
                                        duration: 1000,
                                        easing: 'easeOutQuart'
                                    },
                                    scales: {
                                        y: {
                                            type: 'linear',
                                            position: 'left',
                                            beginAtZero: true,
                                            title: {
                                                display: true,
                                                text: 'Revenue (₱)',
                                                color: `rgba(${primaryColorRgb}, 0.8)`,
                                                font: {
                                                    weight: 'bold'
                                                }
                                            },
                                            grid: {
                                                color: `rgba(${primaryColorRgb}, 0.1)`,
                                                drawBorder: false
                                            },
                                            ticks: {
                                                color: `rgba(${primaryColorRgb}, 0.8)`,
                                                callback: function(value) {
                                                    return formatCurrency(value);
                                                }
                                            }
                                        },
                                        y1: {
                                            type: 'linear',
                                            position: 'right',
                                            beginAtZero: true,
                                            title: {
                                                display: true,
                                                text: 'Bookings',
                                                color: `rgba(${primaryColorRgb}, 0.8)`,
                                                font: {
                                                    weight: 'bold'
                                                }
                                            },
                                            grid: {
                                                display: false
                                            },
                                            ticks: {
                                                color: `rgba(${primaryColorRgb}, 0.8)`
                                            }
                                        },
                                        x: {
                                            grid: {
                                                display: false
                                            },
                                            ticks: {
                                                color: `rgba(${primaryColorRgb}, 0.8)`,
                                                maxRotation: 45,
                                                minRotation: 45
                                            }
                                        }
                                    },
                                    plugins: {
                                        legend: {
                                            position: 'top',
                                            align: 'end',
                                            labels: {
                                                usePointStyle: true,
                                                pointStyle: 'rectRounded',
                                                padding: 20,
                                                color: `rgba(${primaryColorRgb}, 0.8)`
                                            }
                                        },
                                        tooltip: {
                                            callbacks: {
                                                label: function(context) {
                                                    const label = context.dataset.label || '';
                                                    if (label === 'Revenue') {
                                                        return `${label}: ${formatCurrency(context.raw)}`;
                                                    } else {
                                                        return `${label}: ${context.raw}`;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            });
                        }
                    })
                    .catch(error => {
                        console.error("Error loading statistics:", error);
                        hideLoading();

                        // Show error message
                        document.querySelectorAll('.card-body').forEach(body => {
                            body.innerHTML = `
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            Failed to load data. Please try again later.
                        </div>
                    `;
                        });
                    });
            });
        });

        document.getElementById('download-pdf').addEventListener('click', function() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF('p', 'mm', 'a4');

            // Select the element to capture
            const element = document.getElementById('tab-statistics');

            html2canvas(element, {
                scale: 2
            }).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const imgWidth = 210; // A4 width in mm
                const pageHeight = 297; // A4 height in mm
                const imgHeight = (canvas.height * imgWidth) / canvas.width;
                let heightLeft = imgHeight;
                let position = 0;

                doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;

                while (heightLeft > 0) {
                    position = heightLeft - imgHeight;
                    doc.addPage();
                    doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;
                }

                doc.save('statistics_dashboard.pdf');
            });
        });
    </script>
</body>

</html>