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

        .status-denied {
            background-color: rgba(244, 67, 54, 0.2);
            color: #f44336;
            padding: 8px 15px;
            border-radius: 8px;
            font-weight: 600;
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

        /* Appointment history styling */
        .appointment-history .card {
            transition: all 0.2s ease;
            border-color: var(--border-color);
        }

        .appointment-history .card:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-color);
        }

        .slot {
            padding: 10px;
            margin: 5px;
            display: inline-block;
            border: 1px solid #ccc;
            text-align: center;
            border-radius: 5px;
            width: 150px;
            height: 50px;
            line-height: 1.2;
            font-size: 14px;
        }

        .slot.available {
            background-color: #d4edda;
            cursor: pointer;
        }

        .slot.booked {
            background-color: #f8d7da;
            cursor: not-allowed;
        }

        .slot.selected {
            border-color: #28a745;
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

            @auth
            <div class="d-flex align-items-center gap-3">
                <div class="dropdown">
                    <button class="btn dropdown-toggle fs-5 p-0 px-2 shadow-none border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        @if (Auth::user()->status == 0)
                        <li><a class="dropdown-item" href="{{ route('user' ) }}">My Profile</a></li>
                        @else
                        <li><a class="dropdown-item" href="{{ route('admin' ) }}">My Profile</a></li>
                        @endif

                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
            @endauth

            @guest
            <a class="text-default text-decoration-none" href="{{ route('login') }}">Login / Signup</a>
            @endguest
        </div>
    </nav>

    <div class="container py-4">
        <div class="mb-4">
            <a class="btn btn-secondary" href="{{ '/user-profile' }}">
                <i class="bi bi-arrow-left me-2"></i>Return to Dashboard
            </a>
        </div>

        <div class="row">
            <div class="col-lg-10 mx-auto">
                <!-- Patient Info Section -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Patient Information</h5>
                        <div>
                            @if ($appointment->status != 'Cancelled' && $appointment->status != 'Done' && $appointment->status != 'Upcoming' && $appointment->status != 'Deny')
                            <form action="{{ route('update.status', $appointment->id) }}" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="status" value="Cancelled">
                                <button class="btn btn-danger" type="submit">
                                    <i class="bi bi-x-circle me-2"></i>Cancel Appointment
                                </button>
                            </form>
                            @endif

                            @if ($appointment->status == 'Deny')
                            <span class="status-badge status-cancelled">Denied</span>
                            @endif
                            @if ($appointment->status == 'Cancelled')
                            <span class="status-badge status-cancelled">Cancelled</span>
                            @endif
                            @if ($appointment->status == 'Done')
                            <span class="status-badge status-done">Done</span>
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
                                @php
                                // Fetch booked appointments for the clinic using the appointment's listing_id.
                                $bookedAppointments = \App\Models\Appointments::where('listing_id', $appointment->listing_id)->get();
                                // Compute available days from the schedules
                                $availableDays = $schedules->pluck('day')->map(fn($day) => strtolower($day))->toArray();
                                @endphp
                                <form id="rescheduleForm" action="{{ route('reschedule.appointment', $appointment->id) }}" method="post">
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
                                                @if(in_array($appointment->status, ['Done', 'Upcoming'])) disabled @endif>
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

                            <!-- Right Column: Procedure Notes -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="procedure_notes" class="form-label">Procedure Notes</label>
                                    <textarea class="form-control" name="procedure_notes" id="procedure_notes" rows="5" disabled>{{ old('procedure_notes', $appointment->procedure_notes) }}</textarea>
                                </div>

                                @if ($appointment->status == 'Done')
                                <div class="mt-4">
                                    <h6 class="mb-3">Payment Summary</h6>
                                    <div class="p-3 bg-light rounded">
                                        @php
                                        // Get the service discount record (if any)
                                        $serviceFee = $appointment->fees->whereNotNull('service_name')->first();
                                        // Get additional fees (rows without service data)
                                        $additionalFees = $appointment->fees->whereNull('service_name');

                                        // Service price and discount calculation
                                        $servicePrice = $serviceFee->service_amount ?? $appointment->service->price_start;
                                        $serviceDiscount = $serviceFee->service_discount ?? 0;
                                        $serviceDiscountAmount = ($serviceDiscount / 100) * $servicePrice;
                                        $discountedServicePrice = $servicePrice - $serviceDiscountAmount;

                                        // Additional fees calculation
                                        $totalAdditionalFees = 0;
                                        $totalFeeDiscounts = 0;

                                        if ($additionalFees->isNotEmpty()) {
                                        foreach ($additionalFees as $fee) {
                                        $feeAmount = $fee->fee_amount ?? 0;
                                        $feeDiscount = $fee->discount_percentage ?? 0;
                                        $feeDiscountAmount = ($feeDiscount / 100) * $feeAmount;

                                        $totalAdditionalFees += $feeAmount;
                                        $totalFeeDiscounts += $feeDiscountAmount;
                                        }
                                        }

                                        // Grand total before discount
                                        $grandTotal = $servicePrice + $totalAdditionalFees;
                                        // Total discount given
                                        $totalDiscountGiven = $serviceDiscountAmount + $totalFeeDiscounts;
                                        // Total after applying all discounts
                                        $totalAfterDiscount = $grandTotal - $totalDiscountGiven;
                                        @endphp

                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <p class="mb-1"><strong>Service Price:</strong> ₱{{ number_format($servicePrice, 2) }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="mb-1"><strong>Service Discount:</strong> {{ $serviceDiscount }}%</p>
                                            </div>
                                        </div>

                                        @if($additionalFees->isNotEmpty())
                                        <div class="mt-3 mb-2">
                                            <p class="mb-1"><strong>Additional Fees:</strong></p>
                                            <ul class="list-group list-group-flush">
                                                @foreach($additionalFees as $fee)
                                                <li class="list-group-item px-0 py-1 border-0">
                                                    <div class="d-flex justify-content-between">
                                                        <span>{{ $fee->fee_type }}</span>
                                                        <span>₱{{ number_format($fee->fee_amount, 2) }}</span>
                                                    </div>
                                                    <small class="text-muted">Discount: {{ $fee->discount_percentage }}%</small>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        <hr>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="mb-1"><strong>Grand Total:</strong> ₱{{ number_format($grandTotal, 2) }}</p>
                                                <p class="mb-1 text-danger"><strong>Total Discount:</strong> ₱{{ number_format($totalDiscountGiven, 2) }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="mb-1 text-success"><strong>Final Amount:</strong> ₱{{ number_format($totalAfterDiscount, 2) }}</p>
                                                <p class="mb-1"><strong>Amount Paid:</strong> ₱{{ number_format($appointment->total_paid ?? 0, 2) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Appointment History Section -->
                @if(isset($appointmentHistory) && $appointmentHistory->isNotEmpty())
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Appointment History</h5>
                    </div>
                    <div class="card-body">
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
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Reschedule Modal -->
    <div class="modal fade" id="rescheduleModal" tabindex="-1" aria-labelledby="rescheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rescheduleModalLabel">Select New Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="reschedule_date" class="form-label">Select Date</label>
                        <input type="text" id="reschedule_date" class="form-control">
                    </div>
                    <div id="reschedule_time_slots" class="d-flex flex-wrap">
                        <!-- Time slots will be generated here -->
                    </div>
                    <div class="mb-3">
                        <label for="reschedule_reason" class="form-label">Reason for Reschedule</label>
                        <textarea id="reschedule_reason" class="form-control" placeholder="Enter reason"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmReschedule">Confirm Reschedule</button>
                </div>
            </div>
        </div>
    </div>

    @php
    $availableDays = $schedules->pluck('day')->map(function ($day) {
    return strtolower($day);
    })->toArray();
    @endphp
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
   // Initialize flatpickr for the schedule input in the form.
   document.addEventListener("DOMContentLoaded", function() {
            flatpickr('#schedule', {
                dateFormat: 'Y-m-d H:i',
                enableTime: true,
                enable: [
                    function(date) {
                        const availableDays = @json($availableDays);
                        const dayNames = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
                        return availableDays.includes(dayNames[date.getDay()]);
                    }
                ],
                minDate: 'today',
                maxDate: new Date(new Date().getFullYear(), 11, 31),
            });

            // Initialize flatpickr for the reschedule modal's date picker.
            flatpickr('#reschedule_date', {
                dateFormat: 'l, F j',
                enableTime: false,
                enable: [
                    function(date) {
                        const availableDays = @json($availableDays);
                        const dayNames = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
                        return availableDays.includes(dayNames[date.getDay()]);
                    }
                ],
                minDate: 'today',
                maxDate: new Date(new Date().getFullYear(), 11, 31),
                onChange: function(selectedDates, dateStr, instance) {
                    let formattedDate = moment(selectedDates[0]).format('YYYY-MM-DD');
                    updateRescheduleTimeSlots(formattedDate);
                }
            });
        });

        // Global variables for rescheduling.
        const clinicSchedules = @json($schedules);
        const bookedAppointments = @json($bookedAppointments);
        const serviceId = {{ $appointment->service->id }};
        const serviceDuration = {{ $appointment->service->duration }};

        // Generate time slots between startTime and endTime using the service duration.
        // Each slot includes raw (24-hour) values and display values (12-hour with AM/PM).
        function generateTimeSlots(startTime, endTime, duration) {
            let slots = [];
            let current = moment(startTime, 'HH:mm:ss');
            const end = moment(endTime, 'HH:mm:ss');
            while (true) {
                let rawStart = current.format('HH:mm');
                let rawEnd = current.clone().add(duration, 'minutes').format('HH:mm');
                let displayStart = current.format('hh:mm A');
                let displayEnd = current.clone().add(duration, 'minutes').format('hh:mm A');
                if (current.clone().add(duration, 'minutes').isAfter(end)) break;
                slots.push({
                    start: rawStart,
                    end: rawEnd,
                    displayStart: displayStart,
                    displayEnd: displayEnd
                });
                current.add(duration, 'minutes');
            }
            return slots;
        }

        // Fetch booked times for the given service and date.
        // Checks rescheduled_time if available; otherwise uses appointment_time.
        function fetchBookedTimes(serviceId, date) {
            const appointmentsForService = bookedAppointments.filter(appt => {
                let effectiveTime = appt.rescheduled_time ? appt.rescheduled_time : appt.appointment_time;
                return appt.service_id == serviceId && moment(effectiveTime, "YYYY-MM-DD HH:mm:ss").format('YYYY-MM-DD') === date;
            });
            const bookedTimes = appointmentsForService.map(appt => {
                let effectiveTime = appt.rescheduled_time ? appt.rescheduled_time : appt.appointment_time;
                return moment(effectiveTime, "YYYY-MM-DD HH:mm:ss").format('HH:mm');
            });
            return bookedTimes;
        }

        // Update the reschedule modal's time slots based on the selected date.
        function updateRescheduleTimeSlots(date) {
            let dayName = moment(date).format('dddd').toLowerCase();
            let schedule = clinicSchedules.find(sch => sch.day.toLowerCase() === dayName);
            const container = document.getElementById('reschedule_time_slots');
            if (!schedule) {
                container.innerHTML = '<p>No schedule available for this day.</p>';
                return;
            }
            let slots = generateTimeSlots(schedule.start, schedule.end, serviceDuration);
            let bookedTimes = fetchBookedTimes(serviceId, date);
            container.innerHTML = '';
            slots.forEach(slot => {
                let isBooked = bookedTimes.includes(slot.start);
                let slotDiv = document.createElement('div');
                slotDiv.classList.add('slot');
                if (isBooked) {
                    slotDiv.classList.add('booked');
                } else {
                    slotDiv.classList.add('available');
                }
                slotDiv.textContent = `${slot.displayStart} - ${slot.displayEnd}` + (isBooked ? ' (Booked)' : ' (Available)');
                if (!isBooked) {
                    slotDiv.addEventListener('click', function() {
                        // Update the schedule input (using the raw 24-hour format) with the selected time.
                        document.getElementById('schedule').value = date + 'T' + slot.start;
                        // Mark the selected slot visually.
                        container.querySelectorAll('.slot').forEach(el => el.classList.remove('selected'));
                        slotDiv.classList.add('selected');
                    });
                }
                container.appendChild(slotDiv);
            });
        }

        // Confirm reschedule: append the reschedule reason to the form and submit.
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
    </script>
</body>

</html>