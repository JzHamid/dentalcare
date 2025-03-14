<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <nav class="navbar bg-body-secondary">
        <div class="container-fluid px-4">
            <a class="navbar-brand text-default fw-bold" href="{{ route('landing') }}">DentalCare</a>

            @auth
            <div class="d-flex gap-4" style="margin-right: 100px;">
                <div class="dropdown">
                    <!--remove notif button -->

                    <ul class="dropdown-menu dropdown-end">

                    </ul>
                </div>

                <div class="dropdown d-flex">
                    <button class="btn dropdown-toggle fs-4 p-0 px-2 border-0 shadow-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi-person-circle"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-end shadow-sm border">
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
            <a class="text-default text-decoration-none" style="margin-right: 100px;" href="{{ route('login') }}">Login / Signup</a>
            @endguest
        </div>
    </nav>

    <div class="container-fluid p-4">
        <a class="btn btn-secondary" href="{{ '/user-profile' }}">Return</a>

        <div class="d-flex flex-column mx-auto w-75 gap-3">
            <form class="d-flex justify-content-between" action="{{ route('update.status', $appointment->id) }}" method="post">
                @csrf
                <h3 class="fw-bold">Patient Info</h3>

                @if ($appointment->status != 'Cancelled' && $appointment->status != 'Done' && $appointment->status != 'Upcoming' && $appointment->status != 'Deny')
                <button class="btn btn-danger">Cancel Appointment</button>
                @endif

                @if ($appointment->status == 'Deny')
                <span class="text-danger font-weight-bold" style="font-size: 1.2em; background-color: #ffe6e6; padding: 5px 10px; border-radius: 5px; border: 1px solid #ff4d4d;">
                    Denied
                </span>
                @endif


                <input type="hidden" name="status" value="Cancelled">
            </form>

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

            <div class="mt-3">
                <h3 class="fw-bold">Procedures</h3>
            </div>

            <div class="d-flex rounded shadow p-4 gap-4 shadow-sm">
                <div class="container-fluid">
                    <h5>Appointment Details</h5>

                    <div class="row g-3">
                        <!-- Left Side: Schedule, Dentist, and Service -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="schedule">Schedule</label>
                                <form class="input-group" id="rescheduleForm" action="{{ route('reschedule.appointment', $appointment->id) }}" method="post">
                                    @csrf
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="schedule"
                                        id="schedule"
                                        value="{{ Carbon\Carbon::parse($appointment->rescheduled_time ?? $appointment->appointment_time)->format('l, F j - H:i') }}">

                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#rescheduleModal"
                                        @if(in_array($appointment->status, ['Done', 'Deny', 'Upcoming'])) disabled @endif>
                                        Reschedule
                                    </button>
                                </form>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="dentist">Dentist</label>
                                <input class="form-control" type="text" name="dentist" value="Dr. {{ $dentist->fname ?? 'Any' }}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="service">Service</label>
                                <input class="form-control" type="text" name="service" value="{{ $appointment->service->name }}" disabled>
                            </div>
                        </div>

                        <!-- Right Side: Procedure Notes -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="procedure_notes" class="form-label">Procedure Notes</label>
                                <textarea class="form-control" name="procedure_notes" id="procedure_notes" rows="5" disabled>{{ old('procedure_notes', $appointment->procedure_notes) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Save Record Button (Only if User Status > 0) -->
                    @if (Auth::user()->status > 0)
                    <div class="text-end mt-3">
                        <button class="btn btn-primary" type="submit">Save Record</button>
                    </div>
                    @endif
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
                                    <div class="form-group">
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

                <script>
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
    </script>
</body>

</html>