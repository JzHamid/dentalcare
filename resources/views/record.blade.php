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

            <div class="d-flex gap-4" style="margin-right: 100px;">
                <div class="dropdown">
                    <!--remove notif button -->

                    <ul class="dropdown-menu">

                    </ul>
                </div>

                <div class="dropdown">
                    <button class="btn dropdown-toggle fs-4 p-0 px-2 shadow-none border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi-person-circle"></i>
                    </button>

                    <ul class="dropdown-menu shadow-sm border-0">
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
                <h3 class = "fw-bold">Patient Info</h3>

                <div class="d-flex gap-3">
                    @if ($appointment->status == 'Pending')
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
                    @endif
                </div>
            </div>

            <div class="d-flex rounded shadow p-4 gap-4">
                <div class="d-flex flex-column gap-1">
                    <p class="fw-light m-0"><span class="fw-bold">Patient Name: </span>{{ $appointment->user->fname . ' ' . $appointment->user->mname . ' ' . $appointment->user->lname }}</p>
                    <p class="fw-light m-0"><span class="fw-bold">Birthday: </span>{{ Carbon\Carbon::parse($appointment->user->birthdate)->format('F j, Y') }}</p>
                    <p class="fw-light m-0">
                        <span class="fw-bold">Address: </span>
                        {{ $appointment->user->street_name }}, {{ $appointment->user->city }}, {{ $appointment->user->province }}
                    </p>
                    <p class="fw-light m-0"><span class="fw-bold">Email Address: </span>{{ $appointment->user->email }}</p>
                    <p class="fw-light m-0"><span class="fw-bold">Contact No.: </span>{{ $appointment->user->phone }}</p>
                    <p class="fw-light m-0"><span class="fw-bold">Medical Records: </span>{{ $appointment->user->notes }}</p>
                </div>

                <div class="d-flex align-items-center mx-auto">
                    <img class="d-flex align-self-center" src="{{ asset('/storage/' . $appointment->user->image_path) }}" style="height: 100px; width: 100px;">
                </div>
            </div>

            <div class="mt-3">
                <h3 class = "fw-bold">Procedures</h3>
            </div>

            <div class="d-flex rounded shadow p-4 gap-4">
                <img style="height: 500px; min-width: 500px;">

                <div class="container-fluid d-flex flex-column">
                    <h5>Appointment Details</h5>

                    <div class="container-fluid d-flex flex-column p-0 gap-2 h-100">
                        <div class="form-group">
                            <label class="form-label" for="schedule">Schedule</label>
                            <form class="input-group" id="rescheduleForm" action="{{ route('reschedule.appointment.admin', $appointment->id) }}" method="post">
                                @csrf

                                <input
                                    class="form-control"
                                    type="datetime-local"
                                    name="schedule"
                                    id="schedule"
                                    value="{{ Carbon\Carbon::parse($appointment->rescheduled_time ?? $appointment->appointment_time)->format('Y-m-d\TH:i') }}">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rescheduleModal">Reschedule</button>
                            </form>
                        </div>

                        @php
                        $availableDays = $schedules->pluck('day')->map(function ($day) {
                        return strtolower($day);
                        })->toArray();
                        @endphp

                        <script>
                            flatpickr('#schedule', {
                                dateFormat: 'Y-m-d H:i',
                                enableTime: true,
                                enable: [
                                    function(date) {
                                        const allowedDays = @json($availableDays);
                                        const dayNames = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
                                        const dayName = dayNames[date.getDay()];

                                        return allowedDays.includes(dayName);
                                    }
                                ],
                                minDate: 'today',
                                maxDate: new Date(new Date().getFullYear(), 11, 31),
                            });
                        </script>

                        <div class="form-group">
                            <label class="form-label" for="dentist">Dentist</label>
                            <input class="form-control" type="text" name="dentist" value="Dr. {{ $dentist->fname ?? 'Any' }}" disabled>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="service">Service</label>
                            <input class="form-control" type="text" name="service" value="{{ $appointment->service->name }}" disabled>
                        </div>

                        <button class="btn btn-primary mt-auto" type="submit">Save Record</button>
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

            <button class="btn btn-secondary">Add Procedure</button>
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