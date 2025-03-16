<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>DentalCare | Appointment</title>
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
            background-color: #f5f7fa;
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

        .card-header.bg-primary {
            background-color: var(--primary-color) !important;
        }

        .card-body {
            padding: 20px;
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

        .modal-header.bg-primary {
            background-color: var(--primary-color) !important;
        }

        .modal-title {
            color: var(--primary-color);
            font-weight: 600;
        }

        .modal-header.bg-primary .modal-title {
            color: white;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            border-top: 1px solid var(--border-color);
            padding: 15px 20px;
        }

        /* Patient info card */
        .patient-info-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 20px;
            transition: all 0.3s;
        }

        .patient-info-card:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .patient-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary-color);
        }

        /* List group styling */
        .list-group-item {
            border-radius: 8px;
            margin-bottom: 5px;
            border: 1px solid var(--border-color);
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

        .btn-danger {
            background-color: var(--error-color);
            border-color: var(--error-color);
        }

        .btn-danger:hover {
            background-color: #d32f2f;
            border-color: #d32f2f;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(244, 67, 54, 0.2);
        }

        .btn-secondary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(108, 117, 125, 0.2);
        }

        /* Badge styling */
        .badge {
            font-weight: 600;
            padding: 6px 10px;
            border-radius: 6px;
        }

        .badge.bg-primary {
            background-color: var(--primary-color) !important;
        }

        /* Alert styling */
        .alert {
            border-radius: 10px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        /* Appointment history styling */
        .appointment-history .card {
            transition: all 0.2s ease;
            border-color: var(--border-color);
        }

        .appointment-history .card:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-color);
        }

        .status-badge.status-done {
            background-color: rgba(76, 175, 80, 0.2);
            color: #4caf50;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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
                        <li><a class="dropdown-item" href="">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <div class="mb-4">
            @if (Auth::user()->status == 3)
            <a class="btn btn-secondary" href="{{ '/superadmin' }}">
                <i class="bi bi-arrow-left me-2"></i>Return to Dashboard
            </a>
            @else
            <a class="btn btn-secondary" href="{{ '/admin?page=2' }}">
                <i class="bi bi-arrow-left me-2"></i>Return to Dashboard
            </a>
            @endif
        </div>

        <div class="row">
            <div class="col-lg-10 mx-auto">
                <!-- Patient Info Section -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Patient Information</h5>
                        <div>
                            @if ($appointment->status == 'Pending' || $appointment->status == 'Rescheduled')
                            <button class="btn btn-primary" onclick="change_status('Upcoming')">
                                <i class="bi bi-check-circle me-2"></i>Confirm
                            </button>
                            <button class="btn btn-danger" onclick="change_status('Deny')">
                                <i class="bi bi-x-circle me-2"></i>Deny
                            </button>
                            <form action="{{ route('update.status', $appointment->id) }}" method="post" id="status-form">
                                @csrf
                                <input type="hidden" name="status" id="status">
                            </form>
                            @elseif ($appointment->status == 'Upcoming')
                            <form class="input-group" action="{{ route('update.status', $appointment->id) }}" method="post" id="status-form">
                                @csrf
                                <select class="form-select" name="status">
                                    <option value="Pending">Pending</option>
                                    <option value="Done">Done</option>
                                </select>
                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>
                            @elseif ($appointment->status == 'Deny')
                            <span class="status-badge status-cancelled">Denied</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                @if ($appointment->guest)
                                {{-- Display guest details --}}
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Patient Name:</div>
                                    <div class="col-md-8">{{ $appointment->guest->name . ' ' . $appointment->guest->middlename . ' ' . $appointment->guest->lastname }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Email Address:</div>
                                    <div class="col-md-8">{{ $appointment->guest->email }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Contact No.:</div>
                                    <div class="col-md-8">{{ $appointment->guest->contact }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Sex:</div>
                                    <div class="col-md-8">{{ $appointment->guest->sex == 0 ? 'Male' : 'Female' }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Set By:</div>
                                    <div class="col-md-8">{{ $appointment->user->fname . ' ' . $appointment->user->mname . ' ' . $appointment->user->lname }}</div>
                                </div>
                                @elseif ($appointment->temporary)
                                {{-- Display temporary details (old logic) --}}
                                @php
                                $temp = json_decode($appointment->temporary, true);
                                @endphp
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Patient Name:</div>
                                    <div class="col-md-8">{{ ($temp['fname'] ?? '') . ' ' . ($temp['mname'] ?? '') . ' ' . ($temp['lname'] ?? '') }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Birthday:</div>
                                    <div class="col-md-8">{{ Carbon\Carbon::parse($temp['birth'])->format('F j, Y') }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Email Address:</div>
                                    <div class="col-md-8">{{ $temp['email'] }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Contact No.:</div>
                                    <div class="col-md-8">{{ $temp['phone'] }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Set By:</div>
                                    <div class="col-md-8">{{ $appointment->user->fname . ' ' . $appointment->user->mname . ' ' . $appointment->user->lname }}</div>
                                </div>
                                @else
                                {{-- Display user details --}}
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Patient Name:</div>
                                    <div class="col-md-8">{{ $appointment->user->fname . ' ' . $appointment->user->mname . ' ' . $appointment->user->lname }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Birthday:</div>
                                    <div class="col-md-8">{{ Carbon\Carbon::parse($appointment->user->birthdate)->format('F j, Y') }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Address:</div>
                                    <div class="col-md-8">{{ $appointment->user->street_name }}, {{ $appointment->user->city }}, {{ $appointment->user->province }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Email Address:</div>
                                    <div class="col-md-8">{{ $appointment->user->email }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Contact No.:</div>
                                    <div class="col-md-8">{{ $appointment->user->phone }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold">Medical Records:</div>
                                    <div class="col-md-8">{{ $appointment->user->notes }}</div>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-3 text-center">
                                <img class="patient-image" src="{{ asset($appointment->user->image_path ?: 'profile_images/blank_profile_default.png') }}" alt="Patient Profile">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Procedures Section -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Appointment and Procedure Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Left Column: Appointment Details with Reschedule Functionality -->
                            <div class="col-md-6">
                                <form id="rescheduleForm" action="{{ route('reschedule.appointment.dentist', $appointment->id) }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="schedule">Schedule</label>
                                        <div class="input-group">
                                            <input
                                                class="form-control"
                                                type="text"
                                                name="schedule"
                                                id="schedule"
                                                value="{{ \Carbon\Carbon::parse($appointment->rescheduled_time ?? $appointment->appointment_time)->format('l, F j - H:i') }}">

                                            <button
                                                type="button"
                                                class="btn btn-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#rescheduleModal"
                                                @if(in_array($appointment->status, ['Done', 'Deny', 'Upcoming'])) disabled @endif>
                                                <i class="bi bi-calendar-plus me-1"></i> Reschedule
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="dentist">Dentist</label>
                                        <input class="form-control" type="text" name="dentist" value="Dr. {{ $dentist->fname ?? 'Any' }}" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="service">Service</label>
                                        <input class="form-control" type="text" name="service" value="{{ $appointment->service->name }}" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="price">Price</label>
                                        <div class="input-group">
                                            <span class="input-group-text">₱</span>
                                            <input class="form-control" type="text" name="price" value="{{ $appointment->service->price_start }}" disabled>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Right Column: Procedure Notes & Additional Fee Inputs -->
                            <div class="col-md-6">
                                <form action="{{ route('save.record', $appointment->id) }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="procedure_notes" class="form-label">Procedure Notes</label>
                                        <textarea class="form-control" name="procedure_notes" id="procedure_notes" rows="5">{{ old('procedure_notes', $appointment->procedure_notes) }}</textarea>
                                    </div>
                                    @if($appointment->status == 'Done')

                                    <div class="mb-3">
                                        <label for="serviceDiscount" class="form-label">Service Discount (%)</label>
                                        <input type="number" class="form-control" name="service_discount" id="serviceDiscount" step="0.01" value="{{ old('service_discount') }}">
                                    </div>

                                    <div class="mb-3 p-3 bg-light rounded">
                                        <p class="mb-1"><strong>Service Price:</strong> ₱<span id="servicePrice">{{ $appointment->service->price_start }}</span></p>
                                        <p class="mb-0"><strong>Discounted Service Price:</strong> ₱<span id="servicePriceDiscounted">{{ $appointment->service->price_start }}</span></p>
                                    </div>

                                    <div id="fee-container">
                                        <h6 class="mb-3">Additional Fees</h6>
                                        <!-- Additional fee inputs will be added dynamically here -->
                                    </div>

                                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addFeeModal">
                                        <i class="bi bi-plus-circle me-2"></i>Add Fee
                                    </button>

                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Fee Type</th>
                                                    <th>Original Amount</th>
                                                    <th>Discount (%)</th>
                                                    <th>Discounted Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="feesTableBody">
                                                <!-- Fees will be added dynamically here -->
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="mt-3 p-3 bg-light rounded">
                                        <p class="mb-1"><strong>Grand Total:</strong> <span id="grandTotal">₱0.00</span></p>
                                        <p class="mb-0"><strong>Total After Discounts:</strong> <span id="grandTotalDiscounted">₱0.00</span></p>
                                    </div>
                                    @endif
                                    <button class="btn btn-default mt-3" type="submit">
                                        <i class="bi bi-save me-2"></i>Save Procedure
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Appointment History Section -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Appointment History</h5>
                    </div>
                    <div class="card-body">
                        @if($appointmentHistory->isEmpty())
                        <div class="alert alert-info" role="alert">
                            <i class="bi bi-info-circle me-2"></i>No past appointments found.
                        </div>
                        @else
                        <div class="appointment-history">
                            @foreach($appointmentHistory as $history)
                            @php
                            // Get the service discount record (if any)
                            $serviceFee = $history->fees->whereNotNull('service_name')->first();
                            // Get additional fees (rows without service data)
                            $additionalFees = $history->fees->whereNull('service_name');
                            @endphp

                            <div class="card mb-3 border">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="mb-0">{{ \Carbon\Carbon::parse($history->appointment_time)->format('F j, Y, g:i a') }}</h5>
                                        <span class="status-badge status-done">DONE</span>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <p class="mb-0"><strong>Dentist:</strong> Dr. {{ $history->dentist->fname ?? 'N/A' }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-0"><strong>Service:</strong> {{ $history->service->name ?? 'N/A' }}</p>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <p class="mb-0"><strong>Service Amount:</strong> ₱{{ number_format(($serviceFee && $serviceFee->service_amount !== null) ? $serviceFee->service_amount : $appointment->service->price_start, 2) }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-0"><strong>Service Discount:</strong> {{ $serviceFee->service_discount ?? '0.00' }}%</p>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <p class="mb-2"><strong>Procedure Notes:</strong></p>
                                        <div class="p-3 bg-light rounded">
                                            {{ $history->procedure_notes ?? 'No notes available.' }}
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#appointmentModal-{{ $history->id }}">
                                        <i class="bi bi-eye me-2"></i>View Details
                                    </button>
                                </div>
                            </div>

                            <!-- Modal for Appointment Details -->
                            <div class="modal fade" id="appointmentModal-{{ $history->id }}" tabindex="-1" aria-labelledby="appointmentModalLabel-{{ $history->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="appointmentModalLabel-{{ $history->id }}">
                                                <i class="bi bi-calendar-check me-2"></i>Appointment Details
                                            </h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <h6 class="text-muted">Appointment Date</h6>
                                                    <p class="lead">{{ \Carbon\Carbon::parse($history->appointment_time)->format('F j, Y, g:i a') }}</p>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <h6 class="text-muted">Dentist</h6>
                                                    <p class="lead">Dr. {{ $history->dentist->fname ?? 'N/A' }}</p>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <h6 class="text-muted">Service Name</h6>
                                                <p class="lead">{{ $history->service->name ?? 'N/A' }}</p>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <h6 class="text-muted">Service Price</h6>
                                                    <p class="lead">
                                                        ₱{{ number_format(($serviceFee && $serviceFee->service_amount !== null) ? $serviceFee->service_amount : $appointment->service->price_start, 2) }}
                                                    </p>
                                                </div>
                                                @if($serviceFee)
                                                <div class="col-md-6 mb-3">
                                                    <h6 class="text-muted">Service Discount</h6>
                                                    <p class="lead">{{ $serviceFee->service_discount ?? '0' }}%</p>
                                                </div>
                                                @endif
                                            </div>

                                            <div class="mb-3">
                                                <h6 class="text-muted">Procedure Notes</h6>
                                                <p class="lead">{{ $history->procedure_notes ?? 'N/A' }}</p>
                                            </div>

                                            @if($additionalFees->isNotEmpty())
                                            <div class="mb-3">
                                                <h6 class="text-muted">Additional Fees</h6>
                                                <ul class="list-group">
                                                    @foreach($additionalFees as $fee)
                                                    <li class="list-group-item">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span>{{ $fee->fee_type ?? 'N/A' }}</span>
                                                            <span class="badge bg-primary rounded-pill">₱{{ number_format($fee->fee_amount, 2) ?? 'N/A' }}</span>
                                                        </div>
                                                        <small class="text-muted">Discount: {{ $fee->discount_percentage ?? '0' }}%</small>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @else
                                            <div class="mb-3">
                                                <h6 class="text-muted">Additional Fees</h6>
                                                <p class="lead">N/A</p>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                <i class="bi bi-x-circle me-2"></i>Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reschedule Modal -->
    <div class="modal fade" id="rescheduleModal" tabindex="-1" aria-labelledby="rescheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rescheduleModalLabel">Reason for Reschedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="rescheduleReasonForm">
                        <div class="mb-3">
                            <label for="reschedule_reason" class="form-label">Reason</label>
                            <textarea class="form-control" id="reschedule_reason" name="reschedule_reason" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmReschedule">Reschedule</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Fee Modal -->
    <div class="modal fade" id="addFeeModal" tabindex="-1" aria-labelledby="addFeeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFeeModalLabel">Add Fee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="feeForm">
                        <div class="mb-3">
                            <label for="feeType" class="form-label">Fee Type</label>
                            <input type="text" class="form-control" name="fee_type[]" id="feeType" required>
                        </div>
                        <div class="mb-3">
                            <label for="feeAmount" class="form-label">Fee Amount (₱)</label>
                            <input type="number" class="form-control" name="fee_amount[]" id="feeAmount" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="feeDiscount" class="form-label">Discount (%)</label>
                            <input type="number" class="form-control" name="discount_percentage[]" id="feeDiscount" step="0.01">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Fee</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @php
    $availableDays = $schedules->pluck('day')->map(function ($day) {
    return strtolower($day);
    })->toArray();
    @endphp

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            flatpickr('#schedule', {
                dateFormat: 'Y-m-d H:i',
                enableTime: true,
                enable: [
                    function(date) {
                        const availableDays = @json($availableDays);
                        const dayNames = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
                        const dayName = dayNames[date.getDay()];

                        return availableDays.includes(dayName);
                    }
                ],
                minDate: 'today',
                maxDate: new Date(new Date().getFullYear(), 11, 31),
            });
        });

        function change_status(value) {
            const status = document.getElementById('status');
            const form = document.getElementById('status-form');
            status.value = value;
            form.submit();
        }

        // Reschedule Modal Script
        document.getElementById('confirmReschedule').addEventListener('click', function() {
            const reason = document.getElementById('reschedule_reason').value;
            const form = document.getElementById('rescheduleForm');
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'reschedule_reason';
            input.value = reason;
            form.appendChild(input);
            form.submit();
        });

        document.addEventListener("DOMContentLoaded", function() {
            const feesTableBody = document.getElementById("feesTableBody");
            const feeForm = document.getElementById("feeForm");
            const mainForm = document.querySelector("form[action='{{ route('save.record', $appointment->id) }}']");

            let totalAmount = 0;
            let totalDiscounted = 0;

            function updateTotal() {
                totalAmount = 0;
                totalDiscounted = 0;

                // Sum the additional fees
                document.querySelectorAll(".fee-row").forEach(row => {
                    let amount = parseFloat(row.getAttribute("data-amount")) || 0;
                    let discount = parseFloat(row.getAttribute("data-discount")) || 0;
                    let discountedAmount = amount - (amount * (discount / 100));
                    totalAmount += amount;
                    totalDiscounted += discountedAmount;
                });

                // Include the service price and its discount if available
                const servicePriceElem = document.getElementById("servicePrice");
                const serviceDiscountInput = document.getElementById("serviceDiscount");
                if (servicePriceElem && serviceDiscountInput) {
                    let servicePrice = parseFloat(servicePriceElem.innerText) || 0;
                    let serviceDiscount = parseFloat(serviceDiscountInput.value) || 0;
                    let discountedServicePrice = servicePrice - (servicePrice * (serviceDiscount / 100));

                    totalAmount += servicePrice;
                    totalDiscounted += discountedServicePrice;

                    // Update the displayed discounted service price
                    const servicePriceDiscountedElem = document.getElementById("servicePriceDiscounted");
                    if (servicePriceDiscountedElem) {
                        servicePriceDiscountedElem.innerText = discountedServicePrice.toFixed(2);
                    }
                }

                document.getElementById("grandTotal").innerText = `₱${totalAmount.toFixed(2)}`;
                document.getElementById("grandTotalDiscounted").innerText = `₱${totalDiscounted.toFixed(2)}`;
            }

            // Listen for changes in the service discount input to recalc totals on the fly
            const serviceDiscountInput = document.getElementById("serviceDiscount");
            if (serviceDiscountInput) {
                serviceDiscountInput.addEventListener("input", updateTotal);
            }

            function addFeeToTable(feeType, amount, discount) {
                let discountedAmount = amount - (amount * (discount / 100));

                let newRow = document.createElement("tr");
                newRow.classList.add("fee-row");
                newRow.setAttribute("data-amount", amount);
                newRow.setAttribute("data-discount", discount);

                newRow.innerHTML = `
                    <td>${feeType}</td>
                    <td>₱${amount.toFixed(2)}</td>
                    <td>${discount.toFixed(2)}%</td>
                    <td>₱${discountedAmount.toFixed(2)}</td>
                    <td><button class="btn btn-danger btn-sm remove-fee">X</button></td>
                `;

                feesTableBody.appendChild(newRow);
                updateTotal();

                newRow.querySelector(".remove-fee").addEventListener("click", function() {
                    newRow.remove();
                    updateTotal();
                });

                addHiddenInputsToForm(feeType, amount, discount);
            }

            function addHiddenInputsToForm(feeType, amount, discount) {
                const feeTypeInput = document.createElement("input");
                feeTypeInput.type = "hidden";
                feeTypeInput.name = "fee_type[]";
                feeTypeInput.value = feeType;

                const feeAmountInput = document.createElement("input");
                feeAmountInput.type = "hidden";
                feeAmountInput.name = "fee_amount[]";
                feeAmountInput.value = amount;

                const feeDiscountInput = document.createElement("input");
                feeDiscountInput.type = "hidden";
                feeDiscountInput.name = "discount_percentage[]";
                feeDiscountInput.value = discount;

                mainForm.appendChild(feeTypeInput);
                mainForm.appendChild(feeAmountInput);
                mainForm.appendChild(feeDiscountInput);
            }

            if (feeForm) {
                feeForm.addEventListener("submit", function(event) {
                    event.preventDefault();

                    let feeType = document.getElementById("feeType").value;
                    let amount = parseFloat(document.getElementById("feeAmount").value) || 0;
                    let discount = parseFloat(document.getElementById("feeDiscount").value) || 0;

                    addFeeToTable(feeType, amount, discount);

                    feeForm.reset();

                    let modalElement = document.getElementById("addFeeModal");
                    let modal = bootstrap.Modal.getInstance(modalElement);
                    modal.hide();
                });
            }

            // Initialize the totals on page load
            updateTotal();
        });

        document.addEventListener("DOMContentLoaded", function() {
            const servicePriceElement = document.getElementById("servicePrice");
            const servicePriceDiscountedElement = document.getElementById("servicePriceDiscounted");
            const serviceDiscountInput = document.getElementById("serviceDiscount");
            const mainForm = document.querySelector("form[action='{{ route('save.record', $appointment->id) }}']");

            if (servicePriceElement && servicePriceDiscountedElement && serviceDiscountInput && mainForm) {
                let originalServicePrice = parseFloat(servicePriceElement.innerText) || 0;

                // Option 1: Update an existing hidden input (create once)
                let hiddenServiceDiscount = mainForm.querySelector("input[name='service_discount_hidden']");
                if (!hiddenServiceDiscount) {
                    hiddenServiceDiscount = document.createElement("input");
                    hiddenServiceDiscount.type = "hidden";
                    hiddenServiceDiscount.name = "service_discount_hidden";
                    mainForm.appendChild(hiddenServiceDiscount);
                }

                function updateServiceDiscount() {
                    let discount = parseFloat(serviceDiscountInput.value) || 0;
                    let discountedPrice = originalServicePrice - (originalServicePrice * (discount / 100));

                    servicePriceDiscountedElement.innerText = `${discountedPrice.toFixed(2)}`;
                    // Update the hidden input's value if needed (or you can simply use the visible input)
                    hiddenServiceDiscount.value = discount;
                }

                serviceDiscountInput.addEventListener("input", updateServiceDiscount);
            }
        });
    </script>
    @if(session('success'))
    alert('{{ session("success") }}');
    @endif

    @if($errors->any())
    alert('{{ $errors->first() }}');
    @endif
</body>

</html>