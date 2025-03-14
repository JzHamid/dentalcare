<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <title>DentalCare | User</title>

    <style>
        .text-default,
        .text-default:hover,
        .text-default:focus,
        .text-default:active {
            color: #345D95;
        }

        .btn-default,
        .btn-default:hover,
        .btn-default:focus,
        .btn-default:active {
            background-color: #345D95;
            color: white;
        }

        .bg-default {
            background-color: #345D95;
        }

        .dropdown-toggle::after {
            content: none;
        }

        #navbar button.active {
            background-color: #30568A !important;
            filter: brightness(100%) !important;
        }
    </style>
</head>

<body class="overflow-hidden vh-100">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <nav class="navbar bg-body-secondary">
        <div class="container-fluid px-4">
            <a class="navbar-brand text-default fw-bold" href="{{ route('landing') }}">DentalCare</a>

            <div class="d-flex gap-4" style="margin-right: 100px;">
                <div class="dropdown">
                    <!--remove notif button -->

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="">Notification</a></li>
                    </ul>
                </div>

                <div class="dropdown">
                    <button class="btn dropdown-toggle fs-4 p-0 px-2 shadow-none border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi-person-circle"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-end shadow-sm border-0">
                        <li><a class="dropdown-item" href="{{ route('user') }}">My Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
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
            }, 5000); // Auto-hide after 5 seconds
        });
    </script>

    <div class="row m-0" style="height: 93%;">
        <div class="col-md-2 bg-default nav flex-column p-3 gap-2" role="tablist" aria-orientation="vertical" id="navbar">
            <div class="container-fluid d-flex flex-column align-items-center py-4">
                <img src="{{ asset($user->image_path ?: 'profile_images/blank_profile_default.png') }}" class="mb-2" style="height: 130px; width: 130px; border: solid white 3px; border-radius: 50%;">
                <p class="fs-5 text-center fw-medium text-white m-0 mb-2">{{ $user->fname . ' ' . $user->mname . ' ' . $user->lname }}</p>

                <div class="text-white d-flex align-items-center p-0 gap-2">
                    <p class="fw-light text-white">{{ $user->gender ? 'Female' : 'Male' }}</p>
                    <p class="fw-light text-white">{{ Carbon\Carbon::parse($user->birthdate)->age }}</p>
                </div>
            </div>

            <button class="nav-link text-white d-flex active gap-4" id="nav-dashboard" data-bs-toggle="pill" data-bs-target="#tab-dashboard" type="button" role="tab" aria-controls="tab-dashboard" aria-selected="true">
                <i class="bi-speedometer"></i>
                Dashboard
            </button>

            <!-- <button class="nav-link text-white d-flex gap-4" id="nav-notifications" data-bs-toggle="pill" data-bs-target="#tab-notifications" type="button" role="tab" aria-controls="tab-notifications" aria-selected="false">
                <i class="bi-bell-fill"></i>
                Notifications
            </button> -->

            <button class="nav-link text-white d-flex gap-4" id="nav-appointments" data-bs-toggle="pill" data-bs-target="#tab-appointments" type="button" role="tab" aria-controls="tab-appointments" aria-selected="false">
                <i class="bi-calendar-event-fill"></i>
                Appointment
            </button>

            <button class="nav-link text-white d-flex gap-4" id="nav-transactions" data-bs-toggle="pill" data-bs-target="#tab-transactions" type="button" role="tab" aria-controls="tab-transactions" aria-selected="false">
                <i class="bi-receipt"></i>
                Transactions
            </button>

            <button class="nav-link text-white d-flex gap-4" id="nav-profile" data-bs-toggle="pill" data-bs-target="#tab-profile" type="button" role="tab" aria-controls="tab-profile" aria-selected="false">
                <i class="bi-person-fill"></i>
                Profile
            </button>

            <a class="nav-link text-white d-flex gap-4 mt-auto" href="{{ route('logout') }}">
                <i class="bi-box-arrow-right"></i>
                Logout
            </a>
        </div>

        <div class="col-md-10 bg-light tab-content p-0 overflow-y-scroll h-100">
            <div class="tab-pane show active gap-5 p-3" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard" tabindex="0">
                <h1 class="fw-bold">Dashboard</h1>

                <div class="d-flex flex-column p-5 gap-5">
                    <div class="rounded bg-white shadow-sm p-3">
                        <div class="d-flex justify-content-between">
                            <h4 class="fw-bold"><i class="bi bi-heart-pulse me-2"></i>Health Record</h4>
                            <button class="btn btn-default" data-bs-toggle="modal" data-bs-target="#create-record">Add</button>
                        </div>
                        <hr>

                    </div>

                    <div class="container-fluid d-flex p-0 gap-5">
                        <div class="container-fluid rounded bg-white shadow-sm p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="m-0 fw-bold"><i class="bi bi-calendar-heart me-2"></i>Appointments</h4>
                                <a class="btn btn-default d-flex gap-2 shadow-sm" href="{{ route('listing') }}">Book a new appointment</a>
                            </div>
                            <hr>

                            <div class="d-flex flex-column gap-2 overflow-y-scroll p-4" style="max-height: 300px;">
                                @foreach ($appointments->where('status', '!=', '' && 'status', '!=', '') as $appointment)
                                <div class="container-fluid d-flex shadow-sm rounded p-4 gap-3">
                                    <img style="height: 100px; width: 100px; border-radius: 5px; border: solid black 2px;" src="{{ asset('/' . $appointment->service->image_path) }}">

                                    <div class="d-flex flex-column gap-2 w-100">
                                        <p class="fw-bold m-0">Service: <span class="fw-light">{{ $appointment->service->name }}</span></p>
                                        <p class="fw-bold m-0">Appointment Time: <span class="fw-light">{{ Carbon\Carbon::parse($appointment->rescheduled_time ?? $appointment->appointment_time)->format('F j, Y') }}</span></p>
                                        <p class="fw-bold m-0">Status:
                                            @switch ( $appointment->status )
                                            @case ('Pending')
                                            <span class="text-primary fw-bold text-uppercase">Pending</span>
                                            @break
                                            @case ('Done')
                                            <span class="text-success fw-bold text-uppercase">Done</span>
                                            @break
                                            @case ('Upcoming')
                                            <span class="text-warning fw-bold text-uppercase">Upcoming</span>
                                            @break
                                            @case ('Rescheduled')
                                            <span class="text-info fw-bold text-uppercase">Rescheduled</span>
                                            @break
                                            @case ('Cancelled')
                                            <span class="text-danger fw-bold text-uppercase">Cancelled</span>
                                            @break
                                            @case ('Deny')
                                            <span class="text-danger fw-bold text-uppercase">Denied</span>
                                            @break
                                            @endswitch
                                        </p>
                                        <a class="btn btn-link btn-sm text-center align-self-end text-decoration-none fw-bold" href="{{ route('user.record', $appointment->id) }}">View Appointment</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- <div class="container-fluid rounded bg-white shadow p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="m-0">Notifications</h4>
                                <button class="btn btn-primary d-flex gap-2" onclick="document.getElementById('nav-notifications').click()">View All</button>
                            </div>
                            <hr>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="tab-pane gap-5 p-3" id="tab-notifications" role="tabpanel" aria-labelledby="tab-notifications" tabindex="0">
                <h1 class="mb-5">Notifications</h1>

                <div class="nav nav-pills gap-2" role="tablist">
                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#notif-all" type="button" aria-controls="notif-all" aria-selected="true">All</button>
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#notif-unread" type="button" aria-controls="notif-unread" aria-selected="false">Unread</button>
                </div>

                <div class="tab-content">
                    <div class="tab-pane show active" id="notif-all" data-bs-toggle="tab" role="tabpanel" aria-labelledby="notif-all" tabindex="0">
                        <hr>
                        All
                    </div>

                    <div class="tab-pane" id="notif-unread" data-bs-toggle="tab" role="tabpanel" aria-labelledby="notif-unread" tabindex="0">
                        <hr>
                        Unread
                    </div>
                </div>
            </div>

            <div class="tab-pane gap-5 p-3" id="tab-appointments" role="tabpanel" aria-labelledby="tab-appointments" tabindex="0">
                <h1 class="mb-5">Appointments</h1>

                <table class="table table-bordered shadow-sm">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Dentist Name</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Location</th>
                            <th scope="col">Services</th>
                            <th scope="col">Appointment Time</th>
                            <th scope="col">Status</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($appointments as $appointment)
                        <tr>
                            <td>Dr. {{ ($appointment->dentist->fname ?? '') . ' ' . ($appointment->dentist->mname ?? '') . ' ' . ($appointment->dentist->lname ?? '') }}</td>

                            @if ($appointment->guest)
                            <td>{{ $appointment->guest->name . ' ' . $appointment->guest->middlename . ' ' . $appointment->guest->lastname }}</td>
                            @elseif ($appointment->temporary)
                            @php
                            $temp = json_decode($appointment->temporary, true);
                            @endphp
                            <td>{{ ($temp['fname'] ?? 'N/A') . ' ' . ($temp['mname'] ?? 'N/A') . ' ' . ($temp['lname'] ?? 'N/A') }}</td>
                            @else
                            <td>{{ $appointment->user->fname . ' ' . $appointment->user->mname . ' ' . $appointment->user->lname }}</td>
                            @endif

                            <td>{{ $appointment->clinic->location }}</td>
                            <td>{{ $appointment->service->name }}</td>
                            <td>
                                {{ Carbon\Carbon::parse($appointment->rescheduled_time ?? $appointment->appointment_time)->format('F j, Y - h:i A') }}
                            </td>
                            <td>
                                @switch ( $appointment->status )
                                @case ('Pending')
                                <span class="text-primary fw-bold text-uppercase">Pending</span>
                                @break
                                @case ('Deny')
                                <span class="text-danger fw-bold text-uppercase">Denied</span>
                                @break
                                @case ('Done')
                                <span class="text-success fw-bold text-uppercase">Done</span>
                                @break
                                @case ('Upcoming')
                                <span class="text-warning fw-bold text-uppercase">Upcoming</span>
                                @break
                                @case ('Rescheduled')
                                <span class="text-info fw-bold text-uppercase">Rescheduled</span>
                                @break
                                @case ('Cancelled')
                                <span class="text-danger fw-bold text-uppercase">Cancelled</span>
                                @break
                                @endswitch
                            </td>
                            <td class="d-flex justify-content-center gap-2">
                                <a class="text-primary fs-4" href="{{ route('user.record', $appointment->id) }}">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    sortAppointmentsByNearestTime();
                });

                function sortAppointmentsByNearestTime() {
                    const table = document.querySelector(".table-bordered.shadow-sm"); // Select the table
                    const tbody = table.querySelector("tbody");
                    const rows = Array.from(tbody.querySelectorAll("tr"));

                    rows.sort((rowA, rowB) => {
                        const timeA = extractDateTime(rowA.cells[4].textContent); // 5th column = Appointment Time
                        const timeB = extractDateTime(rowB.cells[4].textContent);
                        return timeA - timeB;
                    });

                    // Append sorted rows back to the table
                    rows.forEach(row => tbody.appendChild(row));
                }

                function extractDateTime(dateTimeStr) {
                    return new Date(Date.parse(dateTimeStr.replace("-", "")));
                }
            </script>

            <div class="tab-pane gap-5 p-3" id="tab-transactions" role="tabpanel" aria-labelledby="tab-transactions" tabindex="0">
                <h1 class="mb-5">Transactions</h1>

                <div class="container-fluid p-4 mt-4">
                    <h3 class="mb-4">Appointment History</h3>
                    @if($appointments->isEmpty())
                    <div class="alert alert-info" role="alert">
                        No past appointments found.
                    </div>
                    @else
                    @foreach ($appointments as $appointment)
                    @php
                    $serviceFee = $appointment->fees->whereNotNull('service_name')->first();
                    $additionalFees = $appointment->fees->whereNull('service_name');
                    @endphp

                    @if($serviceFee) <!-- Check if serviceFee exists -->
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0">
                                    {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('F j, Y, g:i a') }}
                                </h5>
                                <span class="badge bg-primary">Completed</span>
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

                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#appointmentModal-{{ $appointment->id }}">
                                <i class="fas fa-eye me-2"></i>View Details
                            </button>
                        </div>
                    </div>
                    @endif <!-- End of serviceFee check -->

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

                    <div class="modal fade" id="appointmentModal-{{ $appointment->id }}" tabindex="-1" aria-labelledby="appointmentModalLabel-{{ $appointment->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Wider modal -->
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="appointmentModalLabel-{{ $appointment->id }}">
                                        <i class="fas fa-calendar-check me-2"></i>Appointment Details
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
                                                        <h6 class="text-muted mb-3"><i class="fas fa-calendar-day me-2"></i>Appointment Date</h6>
                                                        <p class="lead mb-0">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('F j, Y, g:i a') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card border-0 shadow-sm">
                                                    <div class="card-body">
                                                        <h6 class="text-muted mb-3"><i class="fas fa-user-md me-2"></i>Dentist</h6>
                                                        <p class="lead mb-0">Dr. {{ $appointment->dentist->fname }} {{ $appointment->dentist->lname }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Service Details -->
                                        <div class="card border-0 shadow-sm mb-4">
                                            <div class="card-body">
                                                <h6 class="text-muted mb-3"><i class="fas fa-teeth me-2"></i>Service Details</h6>
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
                                                <h6 class="text-muted mb-3"><i class="fas fa-receipt me-2"></i>Additional Fees</h6>
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
                                                <h6 class="text-muted mb-3"><i class="fas fa-receipt me-2"></i>Additional Fees</h6>
                                                <p class="lead mb-0">N/A</p>
                                            </div>
                                        </div>
                                        @endif

                                        <!-- Payment History -->
                                        <div class="card border-0 shadow-sm mb-4">
                                            <div class="card-body">
                                                <h6 class="text-muted mb-3"><i class="fas fa-history me-2"></i>Payment History</h6>
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
                                                <p class="lead mb-0">No payments made yet.</p>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Summary -->
                                        <div class="card border-0 shadow-sm mb-4">
                                            <div class="card-body">
                                                <h6 class="text-muted mb-3"><i class="fas fa-file-invoice-dollar me-2"></i>Summary</h6>
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
                                    </div>
                                </div>
                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        <i class="fas fa-times me-2"></i>Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>


            <div class="tab-pane gap-5 p-3" id="tab-profile" role="tabpanel" aria-labelledby="tab-profile" tabindex="0">
                <h1 class="mb-5">Profile</h1>

                <form class="rounded shadow p-5" action="{{ route('update.account') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="border border-tertiary rounded d-flex gap-3 p-4 mb-4">
                        <img class="border border-2 border-tertiary" src="{{ asset($user->image_path ?: 'profile_images/blank_profile_default.png') }}" style="height: 150px; width: 150px; border-radius: 50%;" id="profile-thumbnail-img">

                        <div class="d-flex flex-column p-0">
                            <h5>Profile Image</h5>
                            <div class="d-flex gap-3">
                                <input class="visually-hidden" type="file" name="profile" onchange="previewThumbnail(this)" id="profile">
                                <button class="btn btn-primary btn-sm" type="button" onclick="document.getElementById('profile').click()">Upload</button>
                                <button class="btn btn-danger btn-sm" type="button" onclick="">Remove</button>
                            </div>
                            <p class="mt-auto mb-0">Your image should be below 4MB</p>
                        </div>
                    </div>

                    <div class="d-flex gap-3 w-100 mb-2">
                        <div class="form-group d-flex flex-column flex-fill">
                            <label class="form-label" for="fname">First Name</label>
                            <input class="form-control" type="text" name="fname" value="{{ $user->fname }}">
                        </div>

                        <div class="form-group d-flex flex-column flex-fill">
                            <label class="form-label" for="mname">Middle Name</label>
                            <input class="form-control" type="text" name="mname" value="{{ $user->mname }}">
                        </div>

                        <div class="form-group d-flex flex-column flex-fill">
                            <label class="form-label" for="lname">Last Name</label>
                            <input class="form-control" type="text" name="lname" value="{{ $user->lname }}">
                        </div>
                    </div>

                    <div class="d-flex container-fluid p-0 gap-3">
                        <div class="form-group w-100">
                            <label class="form-label" for="birth">Birthdate</label>
                            <input class="form-control mb-2" type="date" name="birth" value="{{ Carbon\Carbon::parse($user->birthdate)->format('Y-m-d') }}">
                        </div>

                        <div class="form-group w-100">
                            <label class="form-label" for="gender">Sex</label>
                            <select class="form-select" name="gender">
                                <option value="0" @selected($user->gender == 0)>Male</option>
                                <option value="1" @selected($user->gender == 1)>Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex gap-3 w-100 mb-2">
                        <div class="form-group d-flex flex-column flex-fill">
                            <label class="form-label" for="phone">Contact No.</label>
                            <input class="form-control" type="tel" name="phone" value="{{ $user->phone }}">
                        </div>

                        <div class="form-group d-flex flex-column flex-fill">
                            <label class="form-label" for="email">Email Address</label>
                            <input class="form-control" type="email" name="email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <br>
                    <div class="mb-4">
                        <label class="form-label fw-bold" for="location">Address</label>
                        <div class="row g-2">
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
                                    value="{{ $user->postal_code }}"
                                    placeholder="Postal Code">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex w-100 justify-content-end">
                        <button class="btn btn-default w-25" type="submit" style="margin-top: 20px;">Save Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Health Record -->
    <div class="modal fade" data-bs-backdrop="static" id="create-record" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Health Record</h5>
                </div>

                <form class="modal-body" id="add-record-form" method="" action="">
                    @csrf


                    </for>

                    <div class="modal-footer">
                        <button class="btn btn-secondary w-25" type="button" data-bs-dismiss="modal">No</button>
                        <button class="btn btn-danger w-25" type="button" onclick="document.getElementById('add-record-form').submit()">Yes</button>
                    </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            switch (parseInt("{{ session('page') }}", 10)) {
                case 4:
                    document.getElementById('nav-profile').click();
                    break;
                default:
                    break;
            }
        });

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
                        option.setAttribute("data-name", province.name);

                        if (province.name === existingProvince) {
                            option.selected = true;
                        }

                        provinceSelect.appendChild(option);
                    });

                    if (existingProvince) {
                        loadCities(provinces.find(p => p.name === existingProvince)?.code);
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
                let selectedProvinceCode = this.value;
                loadCities(selectedProvinceCode);
            });

            document.querySelector("form").addEventListener("submit", function(event) {
                let selectedProvince = provinceSelect.options[provinceSelect.selectedIndex];
                let provinceName = selectedProvince.getAttribute("data-name");

                let provinceInput = document.createElement("input");
                provinceInput.type = "hidden";
                provinceInput.name = "province";
                provinceInput.value = provinceName;

                this.appendChild(provinceInput);
            });
        });
    </script>
</body>

</html>