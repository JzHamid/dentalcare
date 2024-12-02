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
                        <button class="btn dropdown-toggle fs-4 p-0 px-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-bell-fill"></i>
                        </button>

                        <ul class="dropdown-menu">

                        </ul>
                    </div>

                    <div class="dropdown">
                        <button class="btn dropdown-toggle fs-4 p-0 px-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            <a class="btn btn-secondary" href="{{ '/admin?page=2' }}">Return</a>

            <div class="d-flex flex-column mx-auto w-75 gap-3">
                <div class="d-flex justify-content-between">
                    <h3>Patient Info</h3>

                    <div class="d-flex gap-3">
                        @if ($appointment->status == 'Pending')
                            <button class="btn btn-primary" onclick="change_status('Upcoming')">Confirm</button>
                            <button class="btn btn-danger" onclick="change_status('Deny')">Deny</button>

                            <form action="{{ route('update.status', $appointment->id) }}" method="post" id="status-form">
                                @csrf
                                <input type="hidden" name="status" id="status">
                            </form>
                        @elseif ($appointment->status == 'Upcoming')
                            <div class="input-group">
                                <select class="form-select" name="status">
                                    <option value="0">Pending</option>
                                    <option value="1">Done</option>
                                </select>
                                <button class="btn btn-primary">Update</button>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="d-flex rounded shadow p-4 gap-4">
                    <div class="d-flex flex-column gap-1">
                        <p class="fw-light m-0"><span class="fw-bold">Patient Name: </span>{{ $appointment->user->fname . ' ' . $appointment->user->mname . ' ' . $appointment->user->lname }}</p>
                        <p class="fw-light m-0"><span class="fw-bold">Birthday: </span>{{ Carbon\Carbon::parse($appointment->user->birthdate)->format('F j, Y') }}</p>
                        <p class="fw-light m-0"><span class="fw-bold">Address: </span>{{ $appointment->user->address }}</p>
                        <p class="fw-light m-0"><span class="fw-bold">Email Address: </span>{{ $appointment->user->email }}</p>
                        <p class="fw-light m-0"><span class="fw-bold">Contact No.: </span>{{ $appointment->user->phone }}</p>
                        <p class="fw-light m-0"><span class="fw-bold">Medical Records: </span>{{ $appointment->user->notes }}</p>
                    </div>

                    <div class="d-flex align-items-center mx-auto">
                        <img class="d-flex align-self-center" src="{{ asset('/storage/' . $appointment->user->image_path) }}" style="height: 100px; width: 100px;">
                    </div>
                </div>

                <div class="mt-3">
                    <h3>Procedures</h3>
                </div>

                <div class="d-flex rounded shadow p-4 gap-4">
                    <img style="height: 500px; min-width: 500px;">

                    <div class="container-fluid d-flex flex-column">
                        <h5>Appointment Details</h5>

                        <div class="container-fluid d-flex flex-column p-0 gap-2 h-100">
                            <div class="form-group">
                                <label class="form-label" for="schedule">Schedule</label>
                                <input class="form-control" type="date" name="schedule" value="{{ Carbon\Carbon::parse($appointment->appointment_time)->format('Y-m-d') }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="dentist">Dentist</label>
                                <input class="form-control" type="text" name="dentist">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="service">Service</label>
                                <input class="form-control" type="text" name="service">
                            </div>

                            <button class="btn btn-primary mt-auto" type="submit">Save Record</button>
                        </div>
                    </div>
                </div>

                <button class="btn btn-secondary">Add Procedure</button>
            </div>
        </div>

        <script>
            function change_status (value) {
                const status = document.getElementById('status');
                const form = document.getElementById('status-form');

                status.value = value;
                form.submit();
            }
        </script>
    </body>
</html>