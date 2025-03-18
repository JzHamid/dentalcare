<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <title>DentalCare | User Dashboard</title>
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

        .dropdown-toggle::after {
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

        /* Card styling */
        .card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
        }

        .card:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-bottom: 1px solid var(--border-color);
            padding: 15px 20px;
            background-color: var(--primary-light);
            border-top-left-radius: 12px !important;
            border-top-right-radius: 12px !important;
        }

        .card-body {
            padding: 20px;
        }

        /* Sidebar styling */
        .sidebar {
            background-color: var(--primary-color);
            min-height: calc(100vh - 70px);
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1020;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.85);
            border-radius: 8px;
            margin: 5px 0;
            padding: 10px 15px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .sidebar .nav-link.active {
            background-color: var(--primary-dark);
            color: white;
            font-weight: 500;
        }

        .sidebar .nav-link i {
            font-size: 1.2rem;
            width: 24px;
            text-align: center;
        }

        /* Profile image */
        .profile-image {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
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

        /* Table styling */
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

        /* Button styling */
        .btn {
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 93, 149, 0.2);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 93, 149, 0.2);
        }

        /* Alert styling */
        .alert {
            border-radius: 10px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        /* Modal styling */
        .modal-content {
            border-radius: 12px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            border-bottom: 1px solid var(--border-color);
            padding: 15px 20px;
            background-color: var(--primary-light);
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
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

        /* Appointment card styling */
        .appointment-card {
            border-radius: 12px;
            transition: all 0.3s;
            border: 1px solid var(--border-color);
        }

        .appointment-card:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-color);
        }

        .appointment-image {
            height: 100px;
            width: 100px;
            border-radius: 8px;
            object-fit: cover;
            border: 2px solid var(--primary-color);
        }

        /* Transaction card styling */
        .transaction-card {
            border-radius: 12px;
            transition: all 0.3s;
        }

        .transaction-card:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container-fluid px-4">
            <a class="navbar-brand text-default" href="{{ route('landing') }}">
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
            </a>

            <div class="d-flex align-items-center gap-3">
                <div class="dropdown">
                    <button class="btn dropdown-toggle fs-5 p-0 px-2 shadow-none border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        <li><a class="dropdown-item" href="{{ route('user') }}">My Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

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

    <!-- Alerts -->
    @if (session('success'))
    <div id="success-alert" class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3 w-50 text-center shadow-lg" role="alert" style="z-index: 1050;">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($errors->has('invalid'))
    <div id="error-alert" class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3 w-50 text-center shadow-lg" role="alert" style="z-index: 1050;">
        {{ $errors->first('invalid') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar py-3" id="navbar">
                <div class="d-flex flex-column align-items-center py-4">
                    <img src="{{ asset($user->image_path ?: 'profile_images/blank_profile_default.png') }}" class="profile-image mb-3">
                    <h5 class="text-white text-center mb-2">{{ $user->fname . ' ' . $user->mname . ' ' . $user->lname }}</h5>
                    <div class="d-flex align-items-center gap-3">
                        <span class="badge bg-light text-dark">{{ $user->gender ? 'Female' : 'Male' }}</span>
                        <span class="badge bg-light text-dark">{{ Carbon\Carbon::parse($user->birthdate)->age }} yrs</span>
                    </div>
                </div>

                <div class="nav flex-column px-3 mt-3" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active d-flex align-items-center" id="nav-dashboard" data-bs-toggle="pill" data-bs-target="#tab-dashboard" type="button" role="tab" aria-controls="tab-dashboard" aria-selected="true">
                        <i class="bi bi-speedometer me-2"></i>
                        Dashboard
                    </button>

                    <button class="nav-link d-flex align-items-center" id="nav-appointments" data-bs-toggle="pill" data-bs-target="#tab-appointments" type="button" role="tab" aria-controls="tab-appointments" aria-selected="false">
                        <i class="bi bi-calendar-event-fill me-2"></i>
                        Appointments
                    </button>

                    <button class="nav-link d-flex align-items-center" id="nav-transactions" data-bs-toggle="pill" data-bs-target="#tab-transactions" type="button" role="tab" aria-controls="tab-transactions" aria-selected="false">
                        <i class="bi bi-receipt me-2"></i>
                        Transactions
                    </button>

                    <button class="nav-link d-flex align-items-center" id="nav-profile" data-bs-toggle="pill" data-bs-target="#tab-profile" type="button" role="tab" aria-controls="tab-profile" aria-selected="false">
                        <i class="bi bi-person-fill me-2"></i>
                        Profile
                    </button>
                </div>

                <div class="mt-auto px-3 pb-3">
                    <a class="nav-link text-white d-flex align-items-center" href="{{ route('logout') }}">
                        <i class="bi bi-box-arrow-right me-2"></i>
                        Logout
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 bg-light tab-content p-0 min-vh-100">
                <!-- Dashboard Tab -->
                <div class="tab-pane fade show active p-4" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard" tabindex="0">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="fw-bold mb-0">Dashboard</h2>
                        <span class="badge bg-primary fs-6">Welcome, {{ $user->fname }}!</span>
                    </div>

                    <div class="row g-4">
                        <!-- Health Record Section -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0"><i class="bi bi-heart-pulse me-2"></i>Health Record</h5>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-record">
                                        <i class="bi bi-plus-circle me-2"></i>Add Record
                                    </button>
                                </div>
                                <div class="card-body">
                                    @if($user->healthRecords->isEmpty())
                                    <div class="alert alert-info mb-0">
                                        <i class="bi bi-info-circle me-2"></i>No health records found. Click "Add Record" to create your first health record.
                                    </div>
                                    @else
                                    <h3>Health Records</h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Details</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user->healthRecords as $record)
                                            <tr>
                                                <td>{{ ucfirst($record->record_type) }}</td>
                                                <td>{{ $record->record_name }}</td>
                                                <td>{{ $record->record_details ?? 'N/A' }}</td>
                                                <td>{{ $record->record_date ?? 'N/A' }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Appointments Section -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0"><i class="bi bi-calendar-heart me-2"></i>Upcoming Appointments</h5>
                                    <a class="btn btn-primary" href="{{ route('listing') }}">
                                        <i class="bi bi-plus-circle me-2"></i>Book New Appointment
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        @php
                                        $upcomingAppointments = $appointments->where('status', '!=', '')
                                        ->whereNotIn('status', ['Done', 'Deny', 'Cancelled', 'Rescheduled', 'Pending']);
                                        @endphp

                                        @if($upcomingAppointments->count() > 0)
                                        @foreach ($upcomingAppointments as $appointment)

                                        <div class="col-md-6">
                                            <div class="card appointment-card h-100">
                                                <div class="card-body">
                                                    <div class="d-flex gap-3">
                                                        <img class="appointment-image" src="{{ asset('/' . $appointment->service->image_path) }}" alt="Service Image">
                                                        <div class="d-flex flex-column w-100">
                                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                                <h6 class="fw-bold mb-0">{{ $appointment->service->name }}</h6>
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
                                                            </div>
                                                            <p class="mb-1"><i class="bi bi-calendar3 me-2"></i>{{ Carbon\Carbon::parse($appointment->rescheduled_time ?? $appointment->appointment_time)->format('F j, Y') }}</p>
                                                            <p class="mb-1"><i class="bi bi-clock me-2"></i>{{ Carbon\Carbon::parse($appointment->rescheduled_time ?? $appointment->appointment_time)->format('h:i A') }}</p>
                                                            <p class="mb-1"><i class="bi bi-geo-alt me-2"></i>{{ $appointment->clinic->location }}</p>
                                                            <div class="mt-auto text-end">
                                                                <a href="{{ route('user.record', $appointment->id) }}" class="btn btn-sm btn-outline-primary">
                                                                    <i class="bi bi-eye me-1"></i>View Details
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else

                                        <div class="col-12">
                                            <div class="alert alert-info mb-0">
                                                <i class="bi bi-info-circle me-2"></i>No upcoming appointments. Click "Book New Appointment" to schedule your visit.
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Appointments Tab -->
                <div class="tab-pane fade p-4" id="tab-appointments" role="tabpanel" aria-labelledby="tab-appointments" tabindex="0">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="fw-bold mb-0">Appointments</h2>
                        <a class="btn btn-primary" href="{{ route('listing') }}">
                            <i class="bi bi-plus-circle me-2"></i>Book New Appointment
                        </a>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Dentist</th>
                                            <th>Patient</th>
                                            <th>Location</th>
                                            <th>Service</th>
                                            <th>Appointment Time</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($appointments->count() > 0)
                                        @foreach ($appointments as $appointment)
                                        <tr>
                                            <td>Dr. {{ ($appointment->dentist->fname ?? '') . ' ' . ($appointment->dentist->mname ?? '') . ' ' . ($appointment->dentist->lname ?? '') }}</td>

                                            @if ($appointment->guest)
                                            <td>{{ $appointment->guest->name . ' ' . $appointment->guest->middlename . ' ' . $appointment->guest->lastname }}</td>
                                            @elseif ($appointment->temporary)
                                            @php
                                            $temp = json_decode($appointment->temporary, true);
                                            @endphp
                                            <td>{{ ($temp['fname'] ?? 'N/A') . ' ' . ($temp['mname'] ?? '') . ' ' . ($temp['lname'] ?? '') }}</td>
                                            @else
                                            <td>{{ $appointment->user->fname . ' ' . $appointment->user->mname . ' ' . $appointment->user->lname }}</td>
                                            @endif

                                            <td>{{ $appointment->clinic->barangay }}, {{ $appointment->clinic->street_address }}</td>
                                            <td>{{ $appointment->service->name }}</td>
                                            <td>{{ Carbon\Carbon::parse($appointment->rescheduled_time ?? $appointment->appointment_time)->format('F j, Y - h:i A') }}</td>
                                            <td>
                                                @switch($appointment->status)
                                                @case('Pending')
                                                <span class="status-badge status-pending">Pending</span>
                                                @break
                                                @case('Done')
                                                <span class="status-badge status-done">Done</span>
                                                @break
                                                @case('Upcoming')
                                                <span class="status-badge status-upcoming">Upcoming</span>
                                                @break
                                                @case('Rescheduled')
                                                <span class="status-badge status-rescheduled">Rescheduled</span>
                                                @break
                                                @case('Cancelled')
                                                <span class="status-badge status-cancelled">Cancelled</span>
                                                @break
                                                @case('Deny')
                                                <span class="status-badge status-cancelled">Denied</span>
                                                @break
                                                @endswitch
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('user.record', $appointment->id) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye me-1"></i>View
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="7" class="text-center">No appointments found</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Transactions Tab -->
                <div class="tab-pane fade p-4" id="tab-transactions" role="tabpanel" aria-labelledby="tab-transactions" tabindex="0">
                    <h2 class="fw-bold mb-4">Transactions</h2>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Payment History</h5>
                        </div>
                        <div class="card-body">
                            @if($appointments->isEmpty() || !$appointments->whereNotNull('fees')->count())
                            <div class="alert alert-info" role="alert">
                                <i class="bi bi-info-circle me-2"></i>No transaction history found.
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
                                    <div class="card transaction-card h-100">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h5 class="card-title mb-0">
                                                    {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('F j, Y') }}
                                                </h5>
                                                <span class="badge bg-success">Completed</span>
                                            </div>

                                            <div class="mb-3">
                                                <p class="card-text mb-1"><strong>Service:</strong> {{ $serviceFee->service_name }}</p>
                                                <p class="card-text mb-1"><strong>Dentist:</strong> Dr. {{ $appointment->dentist->fname ?? 'N/A' }} {{ $appointment->dentist->lname ?? '' }}</p>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <p class="card-text mb-1"><strong>Amount:</strong> ₱{{ number_format($serviceFee->service_amount ?? 0, 2) }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="card-text mb-1"><strong>Discount:</strong> {{ $serviceFee->service_discount ?? '0' }}%</p>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#appointmentModal-{{ $appointment->id }}">
                                                <i class="bi bi-eye me-2"></i>View Details
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                @php
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

                                <!-- Transaction Details Modal -->
                                <div class="modal fade" id="appointmentModal-{{ $appointment->id }}" tabindex="-1" aria-labelledby="appointmentModalLabel-{{ $appointment->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title" id="appointmentModalLabel-{{ $appointment->id }}">
                                                    <i class="bi bi-receipt me-2"></i>Transaction Details
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                                    <p class="lead mb-0">Dr. {{ $appointment->dentist->fname ?? 'N/A' }} {{ $appointment->dentist->lname ?? '' }}</p>
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
                                                                <li class="list-group-item">
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
                                                            <h6 class="text-muted mb-3"><i class="bi bi-credit-card me-2"></i>Payment History</h6>
                                                            @if($appointment->payments && $appointment->payments->count() > 0)
                                                            <ul class="list-group list-group-flush">
                                                                @foreach($appointment->payments as $payment)
                                                                <li class="list-group-item">
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <span>
                                                                            <strong>Amount:</strong> ₱{{ number_format($payment->amount_paid, 2) }}<br>
                                                                            <small class="text-muted">Date: {{ \Carbon\Carbon::parse($payment->created_at)->format('F j, Y, g:i a') }}</small>
                                                                        </span>
                                                                        <span class="badge bg-secondary rounded-pill">{{ ucfirst($payment->payment_type) }}</span>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                            @else
                                                            <p class="lead mb-0">No payments recorded</p>
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
                                                                    <p class="mb-0"><strong>Remaining Balance:</strong> ₱{{ number_format($totalAfterDiscount - ($appointment->total_paid ?? 0), 2) }}</p>
                                                                </div>
                                                            </div>
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
                                @endif <!-- End of serviceFee check -->
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Profile Tab -->
                <div class="tab-pane fade p-4" id="tab-profile" role="tabpanel" aria-labelledby="tab-profile" tabindex="0">
                    <h2 class="fw-bold mb-4">Profile Information</h2>

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('update.account') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('POST')

                                <div class="mb-4 p-4 border rounded bg-light">
                                    <div class="d-flex align-items-center gap-4">
                                        <img src="{{ asset($user->image_path ?: 'profile_images/blank_profile_default.png') }}"
                                            class="rounded-circle border border-primary"
                                            style="height: 150px; width: 150px; object-fit: cover;"
                                            id="profile-thumbnail-img">

                                        <div class="d-flex flex-column">
                                            <h5 class="mb-3">Profile Image</h5>
                                            <div class="d-flex gap-2">
                                                <input class="visually-hidden" type="file" name="profile" onchange="previewThumbnail(this)" id="profile">
                                                <button class="btn btn-primary btn-sm" type="button" onclick="document.getElementById('profile').click()">
                                                    <i class="bi bi-upload me-2"></i>Upload
                                                </button>
                                                <button class="btn btn-outline-danger btn-sm" type="button" onclick="clearThumbnail()">
                                                    <i class="bi bi-trash me-2"></i>Remove
                                                </button>
                                            </div>
                                            <small class="text-muted mt-2">Your image should be below 4MB</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="fname">First Name</label>
                                        <input class="form-control" type="text" name="fname" id="fname" value="{{ $user->fname }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="mname">Middle Name</label>
                                        <input class="form-control" type="text" name="mname" id="mname" value="{{ $user->mname }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="lname">Last Name</label>
                                        <input class="form-control" type="text" name="lname" id="lname" value="{{ $user->lname }}">
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="birth">Birthdate</label>
                                        <input class="form-control" type="date" name="birth" id="birth" value="{{ Carbon\Carbon::parse($user->birthdate)->format('Y-m-d') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="gender">Sex</label>
                                        <select class="form-select" name="gender" id="gender">
                                            <option value="0" @selected($user->gender == 0)>Male</option>
                                            <option value="1" @selected($user->gender == 1)>Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="phone">Contact No.</label>
                                        <input class="form-control" type="tel" name="phone" id="phone" value="{{ $user->phone }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="email">Email Address</label>
                                        <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h5 class="mb-3">Address Information</h5>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="street_name" class="form-label">Street Name</label>
                                            <input
                                                class="form-control"
                                                type="text"
                                                name="street_name"
                                                id="street_name"
                                                value="{{ $user->street_name }}"
                                                placeholder="Street Name">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="province" class="form-label">Province</label>
                                            <select class="form-select" id="province" name="province">
                                                <option value="">Select Province</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="city" class="form-label">City</label>
                                            <select class="form-select" id="city" name="city" disabled>
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
                                                value="{{ $user->postal_code }}"
                                                placeholder="Postal Code">
                                        </div>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button class="btn btn-default" type="submit">
                                        <i class="bi bi-save me-2"></i>Save Profile
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Health Record Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="create-record" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-heart-pulse me-2"></i>Add Health Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form class="modal-body" id="add-record-form" method="post" action="{{ route('health-records.store') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="mb-3">
                        <label for="record_type" class="form-label">Record Type</label>
                        <select class="form-select" id="record_type" name="record_type" required>
                            <option value="">Select Record Type</option>
                            <option value="allergy">Allergy</option>
                            <option value="medication">Medication</option>
                            <option value="condition">Medical Condition</option>
                            <option value="surgery">Surgery</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="record_name" class="form-label">Record Name/Title</label>
                        <input type="text" class="form-control" id="record_name" name="record_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="record_details" class="form-label">Details</label>
                        <textarea class="form-control" id="record_details" name="record_details" rows="4"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="record_date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="record_date" name="record_date">
                    </div>
                </form>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="button" onclick="document.getElementById('add-record-form').submit()">
                        <i class="bi bi-plus-circle me-2"></i>Add Record
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set active tab based on session
            switch (parseInt("{{ session('page') }}", 10)) {
                case 4:
                    document.getElementById('nav-profile').click();
                    break;
                default:
                    break;
            }

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
        });

        function sortAppointmentsByNearestTime() {
            const tables = document.querySelectorAll(".table");
            tables.forEach(table => {
                const tbody = table.querySelector("tbody");
                if (tbody) {
                    const rows = Array.from(tbody.querySelectorAll("tr"));

                    rows.sort((rowA, rowB) => {
                        const timeA = extractDateTime(rowA.cells[4]?.textContent || "");
                        const timeB = extractDateTime(rowB.cells[4]?.textContent || "");
                        return timeA - timeB;
                    });

                    // Append sorted rows back to the table
                    rows.forEach(row => tbody.appendChild(row));
                }
            });
        }

        function extractDateTime(dateTimeStr) {
            return new Date(Date.parse(dateTimeStr.replace("-", "")));
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

        function clearThumbnail() {
            const previewer = document.getElementById('profile-thumbnail-img');
            previewer.src = "{{ asset('profile_images/blank_profile_default.png') }}";
            document.getElementById('profile').value = '';
        }

        document.addEventListener("DOMContentLoaded", function() {
            const provinceSelect = document.getElementById("province");
            const citySelect = document.getElementById("city");
            const existingProvince = "{{ $user->province }}";
            const existingCity = "{{ $user->city }}";

            fetch("https://psgc.gitlab.io/api/provinces/")
                .then(response => response.json())
                .then(provinces => {
                    provinces.forEach(province => {
                        let option = document.createElement("option");
                        option.value = province.name;
                        option.textContent = province.name;
                        option.setAttribute("data-code", province.code);

                        if (province.name === existingProvince) {
                            option.selected = true;
                        }

                        provinceSelect.appendChild(option);
                    });

                    if (existingProvince) {
                        const selectedOption = provinceSelect.querySelector(`option[value="${existingProvince}"]`);
                        const provinceCode = selectedOption ? selectedOption.getAttribute("data-code") : null;
                        loadCities(provinceCode);
                    }
                })
                .catch(error => console.error("Error fetching provinces:", error));

            function loadCities(provinceCode) {
                citySelect.innerHTML = '<option value="">Select City</option>';
                citySelect.disabled = true;

                if (provinceCode) {
                    fetch(`https://psgc.gitlab.io/api/provinces/${provinceCode}/cities/`)
                        .then(response => response.json())
                        .then(cities => {
                            cities.forEach(city => {
                                let option = document.createElement("option");
                                option.value = city.name;
                                option.textContent = city.name;

                                if (city.name === existingCity) {
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
                const selectedOption = this.options[this.selectedIndex];
                const provinceCode = selectedOption.getAttribute("data-code");
                loadCities(provinceCode);
            });
        });
    </script>
</body>

</html>