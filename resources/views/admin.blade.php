<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <title>DentalCare | Dentist</title>

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

        nav .dropdown-toggle::after {
            content: none;
        }

        #navbar button.active {
            background-color: #30568A !important;
            filter: brightness(100%) !important;
        }

        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body class="overflow-hidden vh-100">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

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

    <nav class="navbar bg-body-secondary">
        <div class="container-fluid px-4">
            <a class="navbar-brand text-default fw-bold">DentalCare</a>

            <div class="d-flex gap-4" style="margin-right: 100px;">
                <div class="dropdown">
                    <!--remove notif button -->

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

    <div class="row m-0" style="height: 93%;">
        <div class="col-md-2 bg-default nav flex-column p-3 gap-1" role="tablist" aria-orientation="vertical" id="navbar">
            <div class="container-fluid d-flex flex-column align-items-center py-1">
                <div class="position-relative d-flex justify-content-center">
                    <img src="{{ asset($user->image_path ?: 'profile_images/blank_profile_default.png') }}" class="mb-2" style="height: 130px; width: 130px; border: solid white 3px; border-radius: 50%;">

                    @if ($is_online)
                    <span class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                    @else
                    <span class="position-absolute top-0 start-100 translate-middle p-2 bg-secondary border border-light rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                    @endif
                </div>

                <h6 class="text-center text-white m-0 fw-bold fs-6">{{ $log->fname . ' ' . $log->mname . ' ' . $log->lname }}</h6>
                <p class="fw-light text-white mb-2 fs-6">Dental Specialist</p>

                <form class="w-100 d-flex justify-content-center" action="{{ route('availability') }}" method="post" id="availability">
                    @csrf

                    <select class="form-select form-select-sm w-75 fw-bold" style="font-size: x-small;" name="online" onchange="document.getElementById('availability').submit()">
                        <option class="fw-bold" value="1" @selected($is_online==1)>Available</option>
                        <option class="fw-bold" value="0" @selected($is_online==0)>Not Available</option>
                    </select>
                </form>
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

            @if ($log->status > 1)
            <button class="nav-link text-white d-flex gap-4" id="nav-services" data-bs-toggle="pill" data-bs-target="#tab-services" type="button" role="tab" aria-controls="tab-services" aria-selected="false">
                <i class="bi-clipboard-plus-fill"></i>
                Service
            </button>
            @endif

            <button class="nav-link text-white d-flex gap-4" id="nav-patients" data-bs-toggle="pill" data-bs-target="#tab-patients" type="button" role="tab" aria-controls="tab-patients" aria-selected="false">
                <i class="bi-people-fill"></i>
                Patient
            </button>

            @if ($log->status > 1)
            <button class="nav-link text-white d-flex gap-4" id="nav-listings" data-bs-toggle="pill" data-bs-target="#tab-listings" type="button" role="tab" aria-controls="tab-listings" aria-selected="false">
                <i class="bi-building-fill"></i>
                Clinic
            </button>
            @endif

            <button class="nav-link text-white d-flex gap-4" id="nav-transactions" data-bs-toggle="pill" data-bs-target="#tab-transactions" type="button" role="tab" aria-controls="tab-transactions" aria-selected="false">
                <i class="bi-cash-stack"></i>
                Transactions
            </button>

            <button class="nav-link text-white d-flex gap-4" id="nav-collab" data-bs-toggle="pill" data-bs-target="#tab-collab" type="button" role="tab" aria-controls="tab-collab" aria-selected="false">
                <i class="bi-person-fill-add"></i>
                Staff
            </button>

            <button class="nav-link text-white d-flex gap-4" id="nav-profile" data-bs-toggle="pill" data-bs-target="#tab-profile" type="button" role="tab" aria-controls="tab-profile" aria-selected="false">
                <i class="bi-gear-fill"></i>
                Profile
            </button>

            <a class="nav-link text-white d-flex gap-4 mt-auto" href="{{ route('logout') }}">
                <i class="bi-box-arrow-right"></i>
                Logout
            </a>
        </div>

        <div class="col-md-10 bg-light tab-content p-0 overflow-y-scroll h-100">
            <div class="tab-pane show active gap-5 p-3" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard" tabindex="0">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column">
                        <h1 class="m-0">
                            @switch ($log->status)
                            @case (1)
                            Welcome Secretary!
                            @break
                            @case (2)
                            Welcome Dentist!
                            @break
                            @endswitch
                        </h1>
                        <p class="text-secondary m-0">Dashboard</p>
                    </div>

                    @if ($log->status > 1)
                    <button class="btn btn-default" style="height: fit-content;" data-bs-toggle="modal" data-bs-target="#add-collab">
                        <i class="bi-plus-lg"></i>
                        Add Secretary
                    </button>
                    @endif
                </div>

                <hr>

                <div class="row m-0 d-flex gap-5">
                    <div class="col bg-white rounded shadow p-4">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <img src="{{ asset('images/patient_icon.png') }}" class="mb-2" style="height: 100px; width: 100px;">
                                <p class="lead text-center m-0 fw-bold text-default">Patient</p>
                            </div>

                            <p class="display-5 fw-bold text-default">{{ $users->count() }}</p>
                        </div>
                    </div>

                    <div class="col bg-white rounded shadow p-4">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <img src="{{ asset('images/event_icon.png') }}" class="mb-2" style="height: 100px; width: 100px;">
                                <p class="lead text-center m-0 fw-bold text-default">Appointments</p>
                            </div>

                            <p class="display-5 fw-bold text-default">{{ $appointments->count() }}</p>
                        </div>
                    </div>

                    <div class="col bg-white rounded shadow p-4">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <img src="{{ asset('images/images.png') }}" class="mb-2" style="height: 100px; width: 100px;">
                                <p class="lead text-center m-0 fw-bold text-default">Services</p>
                            </div>

                            <p class="display-5 fw-bold text-default">{{ $services->count() }}</p>
                        </div>
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
                <div id="printAppointments">

                    <h1 class="mb-5">Appointments</h1>

                    <div class="d-flex justify-content-between align-items-center mb-2 gap-2">
                        <h5 class="m-0">Appointment History</h5>

                        <div class="d-flex gap-2 no-print">
                            <select class="form-select" name="filter" style="width: 200px;">
                                <option value="0">All</option>
                                <option value="2">Pending</option>
                                <option value="3">Rescheduled</option>
                                <option value="4">Cancelled</option>
                            </select>

                            <div class="input-group">
                                <input class="form-control" type="search">
                                <button class="btn btn-secondary">Search</button>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success mb-3 no-print" onclick="printTableAppointments()">Print Table</button>

                    <table class="table table-bordered" id="appointmentTable">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Dentist Name</th>
                                <th scope="col">Patient Name</th>
                                <th scope="col">Clinic</th>
                                <th scope="col">Services</th>
                                <th scope="col">Appointment Time</th>
                                <th scope="col">Status</th>
                                <th class="text-center no-print" scope="col">Actions</th>
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
                                <td class="d-flex justify-content-center text-center no-print">
                                    <a class="btn btn-primary btn-sm" href="{{ route('record.appointment', $appointment->id) }}">
                                        <i class="bi-calendar-event-fill"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <script>
                function printTableAppointments() {
                    var content = document.getElementById("printAppointments").innerHTML;
                    var originalContent = document.body.innerHTML;

                    document.body.innerHTML = content;
                    window.print();
                    document.body.innerHTML = originalContent;
                }

                document.addEventListener("DOMContentLoaded", function() {
                    sortAppointmentsByNearestTime();
                });

                function sortAppointmentsByNearestTime() {
                    const table = document.querySelector("#printAppointments .table-bordered"); // Select the table inside printAppointments
                    const tbody = table.querySelector("tbody");
                    const rows = Array.from(tbody.querySelectorAll("tr"));

                    rows.sort((rowA, rowB) => {
                        const timeA = extractDateTime(rowA.cells[3].textContent); // 4th column = Appointment Time
                        const timeB = extractDateTime(rowB.cells[3].textContent);
                        return timeA - timeB;
                    });

                    // Append sorted rows back to the table
                    rows.forEach(row => tbody.appendChild(row));
                }

                function extractDateTime(dateTimeStr) {
                    return new Date(Date.parse(dateTimeStr.replace("-", "")));
                }
            </script>

            <div class="tab-pane gap-5 p-3" id="tab-services" role="tabpanel" aria-labelledby="tab-services" tabindex="0">
                <div id="printServices">
                    <h1 class="mb-5">Services</h1>

                    <div class="d-flex justify-content-between align-items-center mb-2 gap-2">
                        <h5 class="m-0">List of Services</h5>
                        <!-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-service">
                            <i class="bi-plus-lg"></i>
                            Add
                        </button> -->
                    </div>

                    <button class="btn btn-success mb-3 no-print" onclick="printTableServices()">Print Table</button>

                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <!-- <th class="text-center" scope="col">ID</th> -->
                                <th scope="col">Name of Service</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Price Start</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($services as $service)
                            <tr>
                                <!-- <th class="text-center" scope="row">{{ $service->id }}</th> -->
                                <td>{{ $service->name }}</td>
                                <td>{{ floor($service->duration / 60) . 'hr ' . ($service->duration % 60) . 'm' }}</td>
                                <td>₱ {{ number_format($service->price_start) }} - ₱ {{ number_format($service->price_end) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <script>
                function printTableServices() {
                    var content = document.getElementById("printServices").innerHTML;
                    var originalContent = document.body.innerHTML;

                    document.body.innerHTML = content;
                    window.print();
                    document.body.innerHTML = originalContent;
                }
            </script>

            <div class="tab-pane gap-5 p-3" id="tab-patients" role="tabpanel" aria-labelledby="tab-patients" tabindex="0">
                <div id="printPatients">
                    <h1 class="mb-5">Patients</h1>

                    <div class="d-flex justify-content-between align-items-center mb-2 gap-2">
                        <h5 class="m-0">List of Patients</h5>

                        <div class="d-flex">

                        </div>
                    </div>

                    <button class="btn btn-success mb-3 no-print" onclick="printTablePatients()">Print Table</button>

                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <!-- <th class="text-center" scope="col">ID</th> -->
                                <th scope="col">Patient Name</th>
                                <th scope="col">Age</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Address</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <!-- <th class="text-center" scope="row">{{ $user->id }}</th> -->
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

            <script>
                function printTablePatients() {
                    var content = document.getElementById("printPatients").innerHTML;
                    var originalContent = document.body.innerHTML;

                    document.body.innerHTML = content;
                    window.print();
                    document.body.innerHTML = originalContent;
                }
            </script>

            <div class="tab-pane gap-5 p-3" id="tab-listings" role="tabpanel" aria-labelledby="tab-listings" tabindex="0">
                <div id="printClinics">
                    <h1 class="mb-5">Clinics</h1>

                    <div class="d-flex justify-content-between align-items-center mb-2 gap-2">
                        <h5 class="m-0">Dental Clinics</h5>

                        <!-- <div class="d-flex">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-listing">
                                <i class="bi-plus-lg"></i>
                                Add
                            </button>
                        </div> -->
                    </div>

                    <button class="btn btn-success mb-3 no-print" onclick="printTableClinics()">Print Table</button>

                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <!-- <th class="text-center" scope="col">ID</th> -->
                                <th scope="col">Clinic Name</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Contact No.</th>
                                <th scope="col">Location</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($listings as $listing)
                            <tr>
                                <!-- <th class="text-center" scope="row">{{ $listing->id }}</th> -->
                                <td>{{ $listing->clinic->name }}</td>
                                <td>{{ $listing->clinic->email }}</td>
                                <td>{{ $listing->clinic->contact }}</td>
                                <td>{{ $listing->clinic->location }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <script>
                function printTableClinics() {
                    var content = document.getElementById("printClinics").innerHTML;
                    var originalContent = document.body.innerHTML;

                    document.body.innerHTML = content;
                    window.print();
                    document.body.innerHTML = originalContent;
                }
            </script>

            <div class="tab-pane gap-5 p-3" id="tab-history" role="tabpanel" aria-labelledby="tab-history" tabindex="0">
                <h1 class="mb-5">History</h1>
            </div>

            <div class="tab-pane gap-5 p-3" id="tab-collab" role="tabpanel" aria-labelledby="tab-collab" tabindex="0">
                <h1 class="mb-5">Staffs</h1>

                <div class="d-flex justify-content-between align-items-center mb-2 gap-2">
                    <h5 class="m-0">List of Staffs</h5>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-collab">
                        <i class="bi-plus-lg"></i>
                        Add
                    </button>
                </div>

                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <!-- <th class="text-center" scope="col">ID</th> -->
                            <th scope="col">Name</th>
                            <th scope="col">Contact No.</th>
                            <th scope="col">Date Added</th>
                            <th scope="col">Position</th>
                            <th scope="col">Status</th>
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
                                Secretary
                                @elseif ($collab->status == 2)
                                Dentist
                                @endif
                            </td>
                            <td>
                                @if ($collab->is_online)
                                <span class="text-success fw-bold">Online</span>
                                @else
                                <span class="text-danger fw-bold">Offline</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="tab-pane gap-5 p-3" id="tab-transactions" role="tabpanel" aria-labelledby="tab-transactions" tabindex="0">
                <div id="printTransactions">
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

                        <button class="btn btn-success mb-3 no-print" onclick="printTableTransactions()">Print Table</button>

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

                                <button type="button" class="btn btn-outline-primary no-print" data-bs-toggle="modal" data-bs-target="#appointmentModal-{{ $appointment->id }}">
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

                                            <!-- Payment Form -->
                                            <div class="card border-0 shadow-sm">
                                                <div class="card-body">
                                                    <h6 class="text-muted mb-3"><i class="fas fa-credit-card me-2"></i>Payment</h6>
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
                                                            <select class="form-control" name="payment_type">
                                                                <option value="full">Full</option>
                                                                <option value="installment">Installment</option>
                                                            </select>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary w-100"><i class="fas fa-plus-circle me-2"></i>Add Payment</button>
                                                    </form>
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
            </div>

            <script>
                function printTableTransactions() {
                    var content = document.getElementById("printTransactions").innerHTML;
                    var originalContent = document.body.innerHTML;

                    document.body.innerHTML = content;
                    window.print();
                    document.body.innerHTML = originalContent;
                }
            </script>

            <div class="tab-pane gap-5 p-3" id="tab-profile" role="tabpanel" aria-labelledby="tab-profile" tabindex="0">
                <h1 class="mb-5">Profile</h1>

                <form class="rounded shadow p-5" action="{{ route('update.account') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="border border-tertiary rounded d-flex gap-3 p-4 mb-4">
                        <img class="border border-2 border-tertiary" src="{{ asset($log->image_path ?: 'profile_images/blank_profile_default.png') }}" style="height: 150px; width: 150px; border-radius: 50%;" id="profile-thumbnail-img">

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
                            <input class="form-control" type="text" name="fname" value="{{ $log->fname }}">
                        </div>

                        <div class="form-group d-flex flex-column flex-fill">
                            <label class="form-label" for="mname">Middle Name</label>
                            <input class="form-control" type="text" name="mname" value="{{ $log->mname }}">
                        </div>

                        <div class="form-group d-flex flex-column flex-fill">
                            <label class="form-label" for="lname">Last Name</label>
                            <input class="form-control" type="text" name="lname" value="{{ $log->lname }}">
                        </div>
                    </div>

                    <div class="d-flex container-fluid p-0 gap-3">
                        <div class="form-group w-100">
                            <label class="form-label" for="birth">Birthdate</label>
                            <input class="form-control mb-2" type="date" name="birth" value="{{ Carbon\Carbon::parse($log->birthdate)->format('Y-m-d') }}">
                        </div>

                        <div class="form-group w-100">
                            <label class="form-label" for="gender">Sex</label>
                            <select class="form-select" name="gender">
                                <option value="0" @selected($log->gender == 0)>Male</option>
                                <option value="1" @selected($log->gender == 1)>Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex gap-3 w-100 mb-2">
                        <div class="form-group d-flex flex-column flex-fill">
                            <label class="form-label" for="phone">Contact No.</label>
                            <input class="form-control" type="tel" name="phone" value="{{ $log->phone }}">
                        </div>

                        <div class="form-group d-flex flex-column flex-fill">
                            <label class="form-label" for="email">Email Address</label>
                            <input class="form-control" type="email" name="email" value="{{ $log->email }}">
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
                    </div>

                    <div class="d-flex w-100 justify-content-end">
                        <button class="btn btn-default w-25" type="submit" style="margin-top: 20px;">Save Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Create Service Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="add-service" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Service</h5>
                </div>

                <form class="modal-body d-flex flex-column gap-2" action="{{ route('create.service') }}" method="post" id="create-service">
                    @csrf

                    <div class="form-group">
                        <img style="height: 100px; width: 100px;" name="service_thumbnail" id="service_thumbnail">
                        <input class="visually-hidden" type="file" name="service_file" id="service_file" onchange="previewListing(this, 4)">
                        <button type="button" class="btn btn-primary" onclick="document.getElementById('service_file').click()">Upload</button>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="service_name">Service Name</label>
                        <input class="form-control" type="text" name="service_name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="service_description">Description</label>
                        <textarea class="form-control" name="service_description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="duration">Duration</label>

                        <div class="input-group" id="duration">
                            <span class="input-group-text">Hours</span>
                            <input class="form-control" type="number" min="0" name="service_hours" required>
                            <span class="input-group-text">Minutes</span>
                            <input class="form-control" type="number" max="60" min="0" name="service_minutes" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="">Price Range</label>

                        <div class="input-group">
                            <span class="input-group-text">₱</span>
                            <input class="form-control" type="number" min="0" name="service_price_start" required>
                            <span class="input-group-text">To</span>
                            <input class="form-control" type="number" min="0" name="service_price_end" required>
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <button class="btn btn-secondary w-25" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-success w-25" type="button" onclick="document.getElementById('create-service').submit()">Create</button>
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
                </div>

                <form class="modal-body d-flex flex-column gap-2" method="post" id="edit-service-form">
                    @csrf

                    <div class="form-group">
                        <img style="height: 100px; width: 100px;" name="eservice_thumbnail" id="eservice_thumbnail">
                        <input class="visually-hidden" type="file" name="eservice_file" id="eservice_file" onchange="previewListing(this, 5)">
                        <button type="button" class="btn btn-primary" onclick="document.getElementById('service_file').click()">Upload</button>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="eservice_name">Service Name</label>
                        <input class="form-control" type="text" name="eservice_name" id="eservice-name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="eservice_description">Description</label>
                        <textarea class="form-control" name="eservice_description" id="eservice-description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="duration">Duration</label>

                        <div class="input-group" id="duration">
                            <span class="input-group-text">Hours</span>
                            <input class="form-control" type="number" min="0" name="eservice_hours" id="eservice-hours" required>
                            <span class="input-group-text">Minutes</span>
                            <input class="form-control" type="number" max="60" min="0" name="eservice_minutes" id="eservice-minutes" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="">Price Range</label>

                        <div class="input-group">
                            <span class="input-group-text">₱</span>
                            <input class="form-control" type="number" min="0" name="eservice_price_start" id="eservice-price-start" required>
                            <span class="input-group-text">To</span>
                            <input class="form-control" type="number" min="0" name="eservice_price_end" id="eservice-price-end" required>
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <button class="btn btn-secondary w-25" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary w-25" type="button" onclick="document.getElementById('edit-service-form').submit()">Save</button>
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
                </div>

                <div class="modal-body">
                    Do you want to delete this service?
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary w-25" type="button" data-bs-dismiss="modal">No</button>
                    <button class="btn btn-danger w-25" type="button" onclick="document.getElementById('delete-service-form').submit()">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Patient Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="add-patient" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Patient</h5>
                </div>

                <form class="modal-body d-flex flex-column gap-2" action="{{ route('create.service') }}" method="post" id="create-patient">
                    @csrf


                </form>

                <div class="modal-footer">
                    <button class="btn btn-secondary w-25" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-success w-25" type="button" onclick="document.getElementById('create-service').submit()">Create</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Listing Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="add-listing" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Listing</h5>
                </div>

                <form class="modal-body d-flex flex-column gap-2" action="{{ route('create.listing') }}" method="post" enctype="multipart/form-data" id="create-listing">
                    @csrf

                    <div class="d-flex gap-3">
                        <img class="border border-2" style="height: 150px; width: 150px;" id="listing-thumbnail-img">
                        <div class="d-flex flex-column gap-2">
                            <h5 class="m-0">Listing Thumbnail</h5>
                            <div class="d-flex gap-2">
                                <input class="visually-hidden" type="file" name="listing-thumbnail" onchange="previewListing(this, 1)" accept="image/*" id="listing-thumbnail">
                                <button class="btn btn-primary btn-sm" type="button" onclick="document.getElementById('listing-thumbnail').click()">Upload</button>
                                <button class="btn btn-danger btn-sm">Remove</button>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label class="form-label" for="listing-name">Clinic Name</label>
                        <input class="form-control" type="text" name="listing-name" required>
                    </div>

                    <div class="d-flex gap-2">
                        <div class="form-group w-50">
                            <label class="form-label" for="listing-email">Email Address</label>
                            <input class="form-control" type="email" name="listing-email" required>
                        </div>

                        <div class="form-group w-50">
                            <label class="form-label" for="listing-contact">Contact No.</label>
                            <input class="form-control" type="tel" name="listing-contact" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="listing-location">Location</label>
                        <input class="form-control" type="text" name="listing-location" required>
                    </div>

                    <div class="accordion" id="accordion-services">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#list-services" aria-expanded="false" aria-controls="list-services">Services</button>
                            </h2>

                            <div class="accordion-collapse collapse" id="list-services" data-bs-parent="#accordion-services">
                                <div class="accordion-body">
                                    @foreach ($services as $service)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $service->id }}" name="service[]">
                                        <label class="form-check-label" for="service{{ $service->id }}">{{ $service->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                    @endphp

                    <div class="form-group d-flex flex-column gap-2">
                        <label for="listing-schedule">Schedule</label>

                        @foreach (array_chunk($days, 2) as $dayPair)
                        <div class="d-flex gap-2">
                            @foreach ($dayPair as $day)
                            <div class="container-fluid rounded border border-tertiary p-3 w-50 ms-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="listing-{{ strtolower($day) }}">
                                    <label class="form-check-label" for="listing-{{ strtolower($day) }}">{{ $day }}</label>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-text">Starting Time</span>
                                    <input class="form-control" type="time" name="{{ strtolower($day) }}-time-start">
                                    <span class="input-group-text">Ending Time</span>
                                    <input class="form-control" type="time" name="{{ strtolower($day) }}-time-end">
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="listing-about">About Us</label>
                        <textarea class="form-control" name="listing-about"></textarea>
                    </div>
                </form>

                <div class="modal-footer">
                    <button class="btn btn-secondary w-25" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-success w-25" type="button" onclick="document.getElementById('create-listing').submit()">Create</button>
                </div>
            </div>
        </div>
    </div>

    <!-- View / Edit Listing Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="view-listing" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="view-listing-name">View Listing</h5>
                </div>

                <form class="modal-body d-flex flex-column gap-2" method="post" enctype="multipart/form-data" id="view-listing-form">
                    @csrf

                    <div class="d-flex gap-3">
                        <img class="border border-2" style="height: 150px; width: 150px;" id="vlisting-thumbnail-img">
                        <div class="d-flex flex-column gap-2">
                            <h5 class="m-0">Listing Thumbnail</h5>
                            <div class="d-flex gap-2">
                                <input class="visually-hidden" type="file" name="vlisting-thumbnail" onchange="previewListing(this, 2)" accept="image/*" id="vlisting-thumbnail">
                                <button class="btn btn-primary btn-sm" type="button" onclick="document.getElementById('vlisting-thumbnail').click()">Upload</button>
                                <button class="btn btn-danger btn-sm">Remove</button>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label class="form-label" for="vlisting-name">Clinic Name</label>
                        <input class="form-control" type="text" name="vlisting-name" id="vlisting-name" required>
                    </div>

                    <div class="d-flex gap-2">
                        <div class="form-group w-50">
                            <label class="form-label" for="vlisting-email">Email Address</label>
                            <input class="form-control" type="email" name="vlisting-email" id="vlisting-email" required>
                        </div>

                        <div class="form-group w-50">
                            <label class="form-label" for="vlisting-contact">Contact No.</label>
                            <input class="form-control" type="tel" name="vlisting-contact" id="vlisting-contact" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="vlisting-location">Location</label>
                        <input class="form-control" type="text" name="vlisting-location" id="vlisting-location" required>
                    </div>

                    <div class="accordion" id="vaccordion-services">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#vlist-services" aria-expanded="false" aria-controls="vlist-services">Services</button>
                            </h2>

                            <div class="accordion-collapse collapse show" id="vlist-services" data-bs-parent="#vaccordion-services">
                                <div class="accordion-body">
                                    @foreach ($services as $service)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $service->id }}" id="vservice{{ $service->id }}" name="vservice[]">
                                        <label class="form-check-label" for="vservice{{ $service->id }}">{{ $service->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                    @endphp

                    <div class="form-group d-flex flex-column gap-2">
                        <label for="listing-schedule">Schedule</label>

                        @foreach (array_chunk($days, 2) as $dayPair)
                        <div class="d-flex gap-2">
                            @foreach ($dayPair as $day)
                            <div class="container-fluid rounded border border-tertiary p-3 w-50 ms-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="vlisting-{{ strtolower($day) }}">
                                    <label class="form-check-label" for="vlisting-{{ strtolower($day) }}">{{ $day }}</label>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-text">Starting Time</span>
                                    <input class="form-control" type="time" name="v{{ strtolower($day) }}-time-start">
                                    <span class="input-group-text">Ending Time</span>
                                    <input class="form-control" type="time" name="v{{ strtolower($day) }}-time-end">
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="vlisting-about">About Us</label>
                        <textarea class="form-control" name="vlisting-about" id="vlisting-about"></textarea>
                    </div>
                </form>

                <div class="modal-footer">
                    <button class="btn btn-secondary w-25" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary w-25" type="button" onclick="document.getElementById('view-listing-form').submit()">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Listing Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="delete-listing" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Listing</h5>
                </div>

                <div class="modal-body">
                    Do you want to delete this listing?
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary w-25" type="button" data-bs-dismiss="modal">No</button>
                    <button class="btn btn-danger w-25" type="button" onclick="document.getElementById('delete-listing-form').submit()">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Collaborator Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="add-collab" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Secretary</h5>
                </div>

                <form class="modal-body d-flex flex-column gap-2" action="{{ route('save.collaboration') }}" method="post" id="create-collab">
                    @csrf

                    <div class="form-group w-100">
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
                    <button class="btn btn-secondary w-25" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-success w-25" type="button" onclick="document.getElementById('create-collab').submit()">Add</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Collaborator Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="edit-collab" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Collaborator</h5>
                </div>

                <form class="modal-body d-flex flex-column gap-2" method="post" id="edit-collab-form">
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="ecollab-position">Position</label>
                        <select class="form-select" name="ecollab-position" id="ecollab-position">
                            <option selected disabled>-- Select --</option>
                            <option value="1">Secretary</option>
                            <!-- <option value="2">Dentist</option> -->
                        </select>
                    </div>
                </form>

                <div class="modal-footer">
                    <button class="btn btn-secondary w-25" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary w-25" type="button" onclick="document.getElementById('edit-collab-form').submit()">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Remove Collaborator -->
    <div class="modal fade" data-bs-backdrop="static" id="delete-collab" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Remove Collaborator</h5>
                </div>

                <div class="modal-body">
                    Do you want to remove this collaborator?
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary w-25" type="button" data-bs-dismiss="modal">No</button>
                    <button class="btn btn-danger w-25" type="button" onclick="document.getElementById('delete-collab-form').submit()">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const provinceSelect = document.getElementById("province");
            const citySelect = document.getElementById("city");
            const existingProvince = "{{ $log->province }}";
            const existingCity = "{{ $log->city }}";

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

        document.addEventListener('DOMContentLoaded', function() {
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


            const url = new URL(window.location.href);
            const page = url.searchParams.get('page');

            if (page === '2') {
                document.getElementById('nav-appointments').click();
            }
        });

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
                $('#eservice_file').attr('src', '/storage/' + data.service.image_path)
                $('#edit-service-form').attr('action', `/edit-service/${data.service.id}`);
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

                $('#vlisting-thumbnail-img').attr('src', '/storage/' + data.listing.image_path);
                $('#vlisting-name').val(data.listing.name);
                $('#vlisting-email').val(data.listing.email);
                $('#vlisting-contact').val(data.listing.contact);
                $('#vlisting-location').val(data.listing.location);

                data.services.forEach(service => {
                    $(`#vservice${service.id}`).prop('checked', true);
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

        function get_collab(id) {
            fetch(`/get-collab/${parseInt(id, 10)}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(response => {
                return response.json();
            }).then(data => {
                $('#ecollab-position').val(data.user.status);
            });
        }

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
                    }

                    previewer.src = e.target.result;
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>