<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>DentalCare | Appointment</title>
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

        .dropdown-toggle::after {
            content: none;
        }
    </style>
</head>

<body class="overflow-x-hidden">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <nav class="navbar bg-body-secondary">
        <div class="container-fluid px-4">
            <a class="navbar-brand text-default fw-bold" href="{{ route('landing') }}">DentalCare</a>
            <div class="d-flex gap-4" style="margin-right: 100px;">
                <div class="dropdown">
                    <!-- Notifications removed -->
                    <ul class="dropdown-menu"></ul>
                </div>
                <div class="dropdown">
                    <button class="btn dropdown-toggle fs-4 p-0 px-2 shadow-none border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi-person-circle"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid p-4">
        @if (Auth::user()->status == 3)
        <a class="btn btn-secondary" href="{{ '/superadmin' }}">Return</a>
        @else
        <a class="btn btn-secondary" href="{{ '/admin?page=2' }}">Return</a>
        @endif

        <div class="d-flex flex-column mx-auto w-75 gap-3">
            <div class="d-flex justify-content-between">
                <h3>Patient Info</h3>
                <div class="d-flex gap-3">
                    @if ($appointment->status == 'Pending' || $appointment->status == 'Rescheduled')
                    <button class="btn btn-primary" onclick="change_status('Upcoming')">Confirm</button>
                    <button class="btn btn-danger" onclick="change_status('Deny')">Deny</button>
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
                    <span class="text-danger fw-bold">Denied</span>
                    @endif
                </div>

            </div>

            <div class="d-flex rounded shadow p-4 gap-4 shadow-sm">
                <div class="d-flex flex-column gap-1">
                    @if ($appointment->guest)
                    {{-- Display guest details --}}
                    <p class="fw-light m-0">
                        <span class="fw-bold">Patient Name: </span>
                        {{ $appointment->guest->name . ' ' . $appointment->guest->middlename . ' ' . $appointment->guest->lastname }}
                    </p>
                    <p class="fw-light m-0">
                        <span class="fw-bold">Email Address: </span>
                        {{ $appointment->guest->email }}
                    </p>
                    <p class="fw-light m-0">
                        <span class="fw-bold">Contact No.: </span>
                        {{ $appointment->guest->contact }}
                    </p>
                    <p class="fw-light m-0">
                        <span class="fw-bold">Sex: </span>
                        {{ $appointment->guest->sex == 0 ? 'Male' : 'Female' }}
                    </p>
                    <p class="fw-light m-0">
                        <span class="fw-bold">Set By: </span>
                        {{ $appointment->user->fname . ' ' . $appointment->user->mname . ' ' . $appointment->user->lname }}
                    </p>
                    @elseif ($appointment->temporary)
                    {{-- Display temporary details (old logic) --}}
                    @php
                    $temp = json_decode($appointment->temporary, true);
                    @endphp
                    <p class="fw-light m-0">
                        <span class="fw-bold">Patient Name: </span>
                        {{ ($temp['fname'] ?? '') . ' ' . ($temp['mname'] ?? '') . ' ' . ($temp['lname'] ?? '') }}
                    </p>
                    <p class="fw-light m-0">
                        <span class="fw-bold">Birthday: </span>
                        {{ Carbon\Carbon::parse($temp['birth'])->format('F j, Y') }}
                    </p>
                    <p class="fw-light m-0">
                        <span class="fw-bold">Email Address: </span>
                        {{ $temp['email'] }}
                    </p>
                    <p class="fw-light m-0">
                        <span class="fw-bold">Contact No.: </span>
                        {{ $temp['phone'] }}
                    </p>
                    <p class="fw-light m-0">
                        <span class="fw-bold">Set By: </span>
                        {{ $appointment->user->fname . ' ' . $appointment->user->mname . ' ' . $appointment->user->lname }}
                    </p>
                    @else
                    {{-- Display user details --}}
                    <p class="fw-light m-0">
                        <span class="fw-bold">Patient Name: </span>
                        {{ $appointment->user->fname . ' ' . $appointment->user->mname . ' ' . $appointment->user->lname }}
                    </p>
                    <p class="fw-light m-0">
                        <span class="fw-bold">Birthday: </span>
                        {{ Carbon\Carbon::parse($appointment->user->birthdate)->format('F j, Y') }}
                    </p>
                    <p class="fw-light m-0">
                        <span class="fw-bold">Address: </span>
                        {{ $appointment->user->street_name }}, {{ $appointment->user->city }}, {{ $appointment->user->province }}
                    </p>
                    <p class="fw-light m-0">
                        <span class="fw-bold">Email Address: </span>
                        {{ $appointment->user->email }}
                    </p>
                    <p class="fw-light m-0">
                        <span class="fw-bold">Contact No.: </span>
                        {{ $appointment->user->phone }}
                    </p>
                    <p class="fw-light m-0">
                        <span class="fw-bold">Medical Records: </span>
                        {{ $appointment->user->notes }}
                    </p>
                    @endif
                </div>

                <div class="d-flex align-items-center mx-auto">
                    <img class="d-flex align-self-center" src="{{ asset($appointment->user->image_path ?: 'profile_images/blank_profile_default.png') }}" style="height: 100px; width: 100px;">
                </div>
            </div>

            <!-- Procedures Section -->
            <div class="container mt-5">
                <h2 class="mb-4">Procedures</h2>

                <div class="card shadow-sm">
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
                                                Reschedule
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

                                    <div class="mb-3">
                                        <p><strong>Service Price:</strong> ₱<span id="servicePrice">{{ $appointment->service->price_start }}</span></p>
                                        <p><strong>Discounted Service Price:</strong> ₱<span id="servicePriceDiscounted">{{ $appointment->service->price_start }}</span></p>
                                    </div>

                                    <div id="fee-container">
                                        <h6 class="mb-3">Additional Fees</h6>
                                        <!-- Additional fee inputs will be added dynamically here -->
                                    </div>

                                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addFeeModal">
                                        <i class="fas fa-plus"></i> Add Fee
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

                                    <div class="mt-3">
                                        <p><strong>Grand Total:</strong> <span id="grandTotal">₱0.00</span></p>
                                        <p><strong>Total After Discounts:</strong> <span id="grandTotalDiscounted">₱0.00</span></p>
                                    </div>
                                    @endif
                                    <button class="btn btn-primary mt-3" type="submit">Save Procedure</button>

                                </form>
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
            </script>

            @if(session('success'))
            <script>
                alert('{{ session("success") }}');
            </script>
            @endif

            @if($errors->any())
            <script>
                alert('{{ $errors->first() }}');
            </script>
            @endif


            <!-- Appointment History Section -->
            <div class="container-fluid p-4 mt-4">
                <h3 class="mb-4">Appointment History</h3>
                @if($appointmentHistory->isEmpty())
                <div class="alert alert-info" role="alert">
                    No past appointments found.
                </div>
                @else
                @foreach($appointmentHistory as $history)
                @php
                // Get the service discount record (if any)
                $serviceFee = $history->fees->whereNotNull('service_name')->first();
                // Get additional fees (rows without service data)
                $additionalFees = $history->fees->whereNull('service_name');
                @endphp

                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <!-- Appointment Header -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title mb-0">
                                {{ \Carbon\Carbon::parse($history->appointment_time)->format('F j, Y, g:i a') }}
                            </h5>
                            <span class="badge bg-primary">
                                {{ $history->status ?? 'Completed' }}
                            </span>
                        </div>

                        <!-- Dentist and Service Details -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p class="card-text mb-1">
                                    <strong>Dentist:</strong> Dr. {{ $history->dentist->fname ?? 'N/A' }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text mb-1">
                                    <strong>Service:</strong> {{ $history->service->name ?? 'N/A' }}
                                </p>
                            </div>
                        </div>

                        <!-- Service Amount and Discount -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p class="card-text mb-1">
                                    <strong>Service Amount:</strong> ₱{{ number_format(($serviceFee && $serviceFee->service_amount !== null) ? $serviceFee->service_amount : $appointment->service->price_start, 2) }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text mb-1">
                                    <strong>Service Discount:</strong> {{ $serviceFee->service_discount ?? '0' }}%
                                </p>
                            </div>
                        </div>

                        <!-- Procedure Notes -->
                        <div class="mb-3">
                            <p class="card-text">
                                <strong>Procedure Notes:</strong>
                            </p>
                            <div class="bg-light p-3 rounded">
                                {{ $history->procedure_notes ?? 'No notes available.' }}
                            </div>
                        </div>

                        <!-- View Details Button -->
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#appointmentModal-{{ $history->id }}">
                            <i class="fas fa-eye me-2"></i>View Details
                        </button>
                    </div>
                </div>

                <!-- Modal for Appointment Details -->
                <div class="modal fade" id="appointmentModal-{{ $history->id }}" tabindex="-1" aria-labelledby="appointmentModalLabel-{{ $history->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="appointmentModalLabel-{{ $history->id }}">
                                    <i class="fas fa-calendar-check me-2"></i>Appointment Details
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
    </div>

    <script>
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

            // Initialize the totals on page load
            updateTotal();
        });


        document.addEventListener("DOMContentLoaded", function() {
            const servicePriceElement = document.getElementById("servicePrice");
            const servicePriceDiscountedElement = document.getElementById("servicePriceDiscounted");
            const serviceDiscountInput = document.getElementById("serviceDiscount");
            const mainForm = document.querySelector("form[action='{{ route('save.record', $appointment->id) }}']");

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
        });

        function addHiddenInputsToForm(feeType, amount, discount) {
            // Create a container div to hold the inputs
            const container = document.createElement("div");
            container.classList.add("fee-hidden-inputs");

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

            container.appendChild(feeTypeInput);
            container.appendChild(feeAmountInput);
            container.appendChild(feeDiscountInput);

            mainForm.appendChild(container);

            return container; // Return the container so you can reference it later
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

            // Attach event listener for remove button
            newRow.querySelector(".remove-fee").addEventListener("click", function() {
                // Remove the associated hidden inputs:
                if (newRow.hiddenInputsContainer) {
                    newRow.hiddenInputsContainer.remove();
                }
                newRow.remove();
                updateTotal();
            });

            // Add hidden inputs and store reference on the row
            newRow.hiddenInputsContainer = addHiddenInputsToForm(feeType, amount, discount);
        }
    </script>
</body>

</html>