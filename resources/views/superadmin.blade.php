<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <title>DentalCare | Superadmin</title>

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

    @if(session('error'))
    <div class="alert alert-danger position-fixed top-0 start-50 translate-middle-x w-50 text-center" style="z-index: 1050;">
        {{ session('error') }}
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
            <a class="navbar-brand text-default fw-bold">DentalCare <span class="fw-normal" style="font-size: small;">Superadmin</span></a>

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

    <div class="row m-0" style="height: 93%;">
        <div class="col-md-2 bg-default nav flex-column p-3 gap-1" role="tablist" aria-orientation="vertical" id="navbar">
            <button class="nav-link text-white d-flex active gap-4" id="nav-dashboard" data-bs-toggle="pill" data-bs-target="#tab-dashboard" type="button" role="tab" aria-controls="tab-dashboard" aria-selected="true">
                <i class="bi-speedometer"></i>
                Dashboard
            </button>

            <button class="nav-link text-white d-flex gap-4" id="nav-appointments" data-bs-toggle="pill" data-bs-target="#tab-appointments" type="button" role="tab" aria-controls="tab-appointments" aria-selected="false">
                <i class="bi-calendar-event-fill"></i>
                Appointment
            </button>

            <button class="nav-link text-white d-flex gap-4" id="nav-services" data-bs-toggle="pill" data-bs-target="#tab-services" type="button" role="tab" aria-controls="tab-services" aria-selected="false">
                <i class="bi-clipboard-plus-fill"></i>
                Service
            </button>

            <button class="nav-link text-white d-flex gap-4" id="nav-patient" data-bs-toggle="pill" data-bs-target="#tab-patients" type="button" role="tab" aria-controls="tab-patients" aria-selected="false">
                <i class="bi-people-fill"></i>
                Patient
            </button>

            <button class="nav-link text-white d-flex gap-4" id="nav-dentist" data-bs-toggle="pill" data-bs-target="#tab-dentist" type="button" role="tab" aria-controls="tab-dentist" aria-selected="false">
                <i class="bi-person-fill-add"></i>
                Dentist
            </button>

            <button class="nav-link text-white d-flex gap-4" id="nav-secretary" data-bs-toggle="pill" data-bs-target="#tab-secretary" type="button" role="tab" aria-controls="tab-secretary" aria-selected="false">
                <i class="bi-person-lines-fill"></i>
                Secretary
            </button>

            <button class="nav-link text-white d-flex gap-4" id="nav-listing" data-bs-toggle="pill" data-bs-target="#tab-listing" type="button" role="tab" aria-controls="tab-listing" aria-selected="false">
                <i class="bi-building-fill"></i>
                Clinic
            </button>

            <button class="nav-link text-white d-flex gap-4" id="nav-transactions" data-bs-toggle="pill" data-bs-target="#tab-transactions" type="button" role="tab" aria-controls="tab-transactions" aria-selected="false">
                <i class="bi-cash-stack"></i>
                Transactions
            </button>

            <a class="nav-link text-white d-flex gap-4 mt-auto" href="{{ route('logout') }}">
                <i class="bi-box-arrow-right"></i>
                Logout
            </a>
        </div>

        <div class="col-md-10 bg-white tab-content p-0 overflow-y-scroll h-100">
            <div class="tab-pane show active gap-5 p-3" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard" tabindex="0">
                <h1 class="mb-3">Welcome Admin!</h1>
                <hr>
                <div class="container">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="bg-transparent rounded shadow-sm p-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-column">
                                        <img src="{{ asset('images/dentist_icon.png') }}" class="mb-2" style="height: 100px; width: 100px;">
                                        <p class="lead text-center m-0 fw-bold text-default">Dentist</p>
                                    </div>
                                    <p class="display-5 fw-bold text-default">{{ $dentist->count() }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="bg-transparent rounded shadow-sm p-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-column">
                                        <img src="{{ asset('images/dentist_icon.png') }}" class="mb-2" style="height: 100px; width: 100px;">
                                        <p class="lead text-center m-0 fw-bold text-default">Secretary</p>
                                    </div>
                                    <p class="display-5 fw-bold text-default">{{ $secretary->count() }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="bg-white rounded shadow-sm p-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-column">
                                        <img src="{{ asset('images/patient_icon.png') }}" class="mb-2" style="height: 100px; width: 100px;">
                                        <p class="lead text-center m-0 fw-bold text-default">Patient</p>
                                    </div>
                                    <p class="display-5 fw-bold text-default">{{ $users->count() }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="bg-white rounded shadow-sm p-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-column">
                                        <img src="{{ asset('images/event_icon.png') }}" class="mb-2" style="height: 100px; width: 100px;">
                                        <p class="lead text-center m-0 fw-bold text-default">Appointments</p>
                                    </div>
                                    <p class="display-5 fw-bold text-default">{{ $appointments->count() }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Second Row -->
                        <div class="col-md-4">
                            <div class="bg-white rounded shadow-sm p-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-column">
                                        <img src="{{ asset('images/images.png') }}" class="mb-2" style="height: 100px; width: 100px;">
                                        <p class="lead text-center m-0 fw-bold text-default">Services</p>
                                    </div>
                                    <p class="display-5 fw-bold text-default">{{ $services->count() }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="bg-white rounded shadow-sm p-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-column">
                                        <img src="{{ asset('images/download.png') }}" class="mb-2" style="height: 100px; width: 100px;">
                                        <p class="lead text-center m-0 fw-bold text-default">Clinics</p>
                                    </div>
                                    <p class="display-5 fw-bold text-default">{{ $listings->count() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="tab-pane gap-5 p-3" id="tab-appointments" role="tabpanel" aria-labelledby="tab-appointments" tabindex="0">
                <div id="printTable">
                    <h1 class="mb-5">Appointments</h1>

                    <div class="d-flex justify-content-between align-items-center mb-2 gap-2">
                        <h5 class="m-0">Appointment History</h5>

                        <div class="d-flex gap-2">
                            <!-- Status Filter Dropdown -->
                            <select class="form-select fw-bold no-print" id="statusFilter" style="width: 200px;">
                                <option class="fw-bold" value="All">All</option>
                                <option class="fw-bold" value="Done">Done</option>
                                <option class="fw-bold" value="Pending">Pending</option>
                                <option class="fw-bold" value="Rescheduled">Rescheduled</option>
                                <option class="fw-bold" value="Cancelled">Cancelled</option>
                                <option class="fw-bold" value="Upcoming">Upcoming</option>
                            </select>

                            <!-- Single Search Bar -->
                            <div class="input-group no-print">
                                <input class="form-control" type="search" id="tableSearch" placeholder="Search anything...">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success mb-3 no-print" onclick="printTable()">Print Table</button>

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
                document.addEventListener("DOMContentLoaded", function() {
                    sortAppointmentsByNearestTime();
                });

                function sortAppointmentsByNearestTime() {
                    const table = document.getElementById("appointmentTable");
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

                document.addEventListener("DOMContentLoaded", function() {
                    const searchInput = document.getElementById("searchInput");
                    const statusFilter = document.getElementById("statusFilter");
                    const tableRows = document.querySelectorAll("#appointmentTable tbody tr");

                    function filterTable() {
                        const searchText = searchInput.value.toLowerCase();
                        const selectedStatus = statusFilter.value;

                        tableRows.forEach(row => {
                            const rowText = row.textContent.toLowerCase();
                            const rowStatus = row.getAttribute("data-status");

                            const matchesSearch = searchText === "" || rowText.includes(searchText);
                            const matchesStatus = selectedStatus === "All" || rowStatus === selectedStatus;

                            row.style.display = matchesSearch && matchesStatus ? "" : "none";
                        });
                    }

                    searchInput.addEventListener("input", filterTable);
                    statusFilter.addEventListener("change", filterTable);
                });

                document.addEventListener("DOMContentLoaded", function() {
                    const searchInput = document.getElementById("tableSearch");
                    const statusFilter = document.getElementById("statusFilter");
                    const tableRows = document.querySelectorAll("#appointmentTable tbody tr");

                    function filterTable() {
                        const searchText = searchInput.value.toLowerCase();
                        const selectedStatus = statusFilter.value;

                        tableRows.forEach(row => {
                            const rowText = row.textContent.toLowerCase();
                            const rowStatus = row.getAttribute("data-status");

                            const matchesSearch = searchText === "" || rowText.includes(searchText);
                            const matchesStatus = selectedStatus === "All" || rowStatus === selectedStatus;

                            row.style.display = (matchesSearch && matchesStatus) ? "" : "none";
                        });
                    }

                    searchInput.addEventListener("input", filterTable);
                    statusFilter.addEventListener("change", filterTable);
                });
            </script>




            <script>
                function printTable() {
                    var content = document.getElementById("printTable").innerHTML;
                    var originalContent = document.body.innerHTML;

                    document.body.innerHTML = content;
                    window.print();
                    document.body.innerHTML = originalContent;
                }
            </script>

            <div class="tab-pane gap-5 p-3" id="tab-services" role="tabpanel" aria-labelledby="tab-services" tabindex="0">
                <div id="printServices">
                    <h1 class="mb-5">Services</h1>
                    <div class="d-flex justify-content-between align-items-center mb-2 gap-2">
                        <h5 class="m-0">List of Services</h5>
                        <button class="btn btn-primary no-print" data-bs-toggle="modal" data-bs-target="#add-service">
                            <i class="bi-plus-lg"></i>
                            Add
                        </button>
                    </div>

                    <!-- Print Button -->
                    <button class="btn btn-success mb-3 no-print" onclick="printTableServices()">Print Table</button>

                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Name of Service</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Price Start</th>
                                <th class="text-center no-print" scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->name }}</td>
                                <td>{{ floor($service->duration / 60) . 'hr ' . ($service->duration % 60) . 'm' }}</td>
                                <td>₱ {{ number_format($service->price_start) }} - ₱ {{ number_format($service->price_end) }}</td>
                                <td class="d-flex justify-content-center gap-2 text-center no-print">
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit-service" onclick="get_service('{{ $service->id }}')">
                                        <i class="bi-pencil-square"></i>
                                    </button>

                                    <button class="btn btn-sm btn-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#delete-service"
                                        onclick="setDeleteFormAction(`{{ route('destroy.service', $service->id) }}`)">
                                        <i class="bi-trash-fill"></i>
                                    </button>

                                    <form id="delete-service-form" action="{{ route('destroy.service', $service->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
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
                    <h5>List of Patients</h5>
                    <button class="btn btn-success mb-3 no-print" onclick="printTablePatients()">Print Table</button>
                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Patient Name</th>
                                <th class="text-center" scope="col">Age</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Address</th>
                                <th class="text-center no-print" scope="col">Action</th>
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
                                <td class="d-flex justify-content-center gap-2 text-center no-print">
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit-patient" onclick="get_patient('{{ $user->id }}')">
                                        <i class="bi-pencil-square"></i>
                                    </button>

                                    <!-- Delete Button -->
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-user" data-user-id="{{ $user->id }}">
                                        <i class="bi-trash-fill"></i>
                                    </button>

                                </td>
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

            <div class="tab-pane gap-5 p-3" id="tab-dentist" role="tabpanel" aria-labelledby="tab-dentist" tabindex="0">
                <div id="printDentists">
                    <h1 class="mb-5">Dentists</h1>

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="m-0">List of Dentists</h5>
                        <button class="btn btn-primary no-print" data-bs-toggle="modal" data-bs-target="#add-dentist">
                            <i class="bi-plus-lg"></i>
                            Add
                        </button>
                    </div>

                    <button class="btn btn-success mb-3 no-print" onclick="printTableDentists()">Print Table</button>
                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <!-- <th class="text-center" scope="col">ID</th> -->
                                <th scope="col">Dentist Name</th>
                                <th scope="col">Specialization</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th class="text-center no-print" scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($dentist as $dent)
                            <tr>
                                <!-- <th class="text-center" scope="row">{{ $dent->id }}</th> -->
                                <td>Dr. {{ $dent->fname . ' ' . $dent->mname . ' ' . $dent->lname }}</td>
                                <td></td>
                                <td>{{ $dent->email }}</td>
                                <td>{{ $dent->phone }}</td>
                                <td>{{ trim("{$dent->street_name}, {$dent->city}, {$dent->province}", ', ') }}</td>
                                <td class="d-flex justify-content-center gap-2 text-center no-print">
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit-dentist" onclick="get_dentist('{{ $dent->id }}')">
                                        <i class="bi-pencil-square"></i>
                                    </button>

                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-dentist" data-user-id="{{ $dent->id }}">
                                        <i class="bi-trash-fill"></i>
                                    </button>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <script>
                function printTableDentists() {
                    var content = document.getElementById("printDentists").innerHTML;
                    var originalContent = document.body.innerHTML;

                    document.body.innerHTML = content;
                    window.print();
                    document.body.innerHTML = originalContent;
                }
            </script>

            <div class="tab-pane gap-5 p-3" id="tab-transactions" role="tabpanel" aria-labelledby="tab-transactions" tabindex="0">
                <div id="printTransactions">
                    <h1 class="mb-5">Transactions</h1>

                    <div class="container-fluid p-4 mt-4">
                        <h3 class="mb-4">Appointment History</h3>
                        <button class="btn btn-success mb-3 no-print" onclick="printTableDentists()">Print Table</button>
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
                                                    <ul class="list-group list-group    
                                                    @foreach($feesWithDiscounts as $fee)
                                                    <li class=" list-group-item">
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
                function printTableDentists() {
                    var content = document.getElementById("printTransactions").innerHTML;
                    var originalContent = document.body.innerHTML;

                    document.body.innerHTML = content;
                    window.print();
                    document.body.innerHTML = originalContent;
                }
            </script>

            <div class="tab-pane gap-5 p-3" id="tab-secretary" role="tabpanel" aria-labelledby="tab-secretary" tabindex="0">
                <div id="printSecretaries">
                    <h1 class="mb-5">Secretary</h1>

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="m-0">List of Secretaries</h5>

                        <button class="btn btn-primary no-print" data-bs-toggle="modal" data-bs-target="#add-secretary">
                            <i class="bi-plus-lg"></i>
                            Add
                        </button>
                    </div>

                    <button class="btn btn-success mb-3 no-print" onclick="printTableSecretaries()">Print Table</button>
                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <!-- <th class="text-center" scope="col">ID</th> -->
                                <th scope="col">Secretary Name</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th class="text-center no-print" scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($secretary as $sec)
                            <tr>
                                <!-- <th class="text-center" scope="row">{{ $sec->id }}</th> -->
                                <td>{{ $sec->fname . ' ' . $sec->mname . ' ' . $sec->lname }}</td>
                                <td>{{ $sec->email }}</td>
                                <td>{{ $sec->phone }}</td>
                                <td>{{ trim("{$sec->street_name}, {$sec->city}, {$sec->province}", ', ') }}</td>
                                <td class="d-flex justify-content-center gap-2 text-center no-print">
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit-secretary" onclick="get_secretary('{{ $sec->id }}')">
                                        <i class="bi-pencil-square"></i>
                                    </button>

                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-secretary" data-user-id="{{ $sec->id }}">
                                        <i class="bi-trash-fill"></i>
                                    </button>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <script>
                function printTableSecretaries() {
                    var content = document.getElementById("printSecretaries").innerHTML;
                    var originalContent = document.body.innerHTML;

                    document.body.innerHTML = content;
                    window.print();
                    document.body.innerHTML = originalContent;
                }
            </script>

            <div class="tab-pane gap-5 p-3" id="tab-listing" role="tabpanel" aria-labelledby="tab-listing" tabindex="0">
                <div id="printClinics">
                    <h1 class="mb-5">Clinics</h1>

                    <div class="d-flex justify-content-between align-items-center mb-2 gap-2">
                        <h5 class="m-0">Dental Clinics</h5>

                        <div class="d-flex">
                            <button class="btn btn-primary no-print" data-bs-toggle="modal" data-bs-target="#add-listing">
                                <i class="bi-plus-lg"></i>
                                Add
                            </button>
                        </div>
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
                                <th class="text-center no-print" scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($listings as $listing)
                            <tr>
                                <!-- <th class="text-center" scope="row">{{ $listing->id }}</th> -->
                                <td>{{ $listing->name }}</td>
                                <td>{{ $listing->email }}</td>
                                <td>{{ $listing->contact }}</td>
                                <td>{{ $listing->location }}</td>
                                <td class="d-flex justify-content-center gap-2 text-center no-print">
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#view-listing" onclick="get_listing('{{ $listing->id }}')">
                                        <i class="bi-pencil-square"></i>
                                    </button>

                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-listing">
                                        <i class="bi-trash-fill"></i>
                                    </button>

                                    <form id="delete-listing-form" action="{{ route('destroy.listing', $listing->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
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
        </div>
    </div>



    <!-- Create Service Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="add-service" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Service</h5>
                </div>

                @if(session('success'))
                <div class="alert alert-success position-fixed top-0 start-50 translate-middle-x w-50 text-center" style="z-index: 1050;">
                    {{ session('success') }}
                </div>
                @endif

                <form class="modal-body d-flex flex-column gap-2" action="{{ route('create.service') }}" method="post" id="create-service" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <img style="height: 100px; width: 100px;" name="service_thumbnail" id="service_thumbnail">
                        <input class="visually-hidden" type="file" name="service_file" id="service_file" onchange="previewListing(this, 4)">
                        <button type="button" class="btn btn-primary" onclick="document.getElementById('service_file').click()">Upload</button>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="service_name">Service Name</label>
                        <input class="form-control" type="text" name="service_name" require>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="service_description">Description</label>
                        <textarea class="form-control" name="service_description" require></textarea>
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
                        <label class="form-label" for="">Price Start</label>

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

                @if(session('success'))
                <div class="alert alert-success position-fixed top-0 start-50 translate-middle-x w-50 text-center" style="z-index: 1050;">
                    {{ session('success') }}
                </div>
                @endif

                <form class="modal-body d-flex flex-column gap-2" method="post" id="edit-service-form" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <img src="{{ isset($service) && $service->image_path ? asset($service->image_path) : asset('images/default.png') }}" alt="Service Image" style="height: 100px; width: 100px;" name="eservice_thumbnail" id="eservice_thumbnail">
                        <input class="visually-hidden" type="file" name="eservice_file" id="eservice_file" onchange="previewListing(this, 5)">
                        <button type="button" class="btn btn-primary" onclick="document.getElementById('eservice_file').click()">Upload</button>
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

    <!-- Delete User Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="delete-user" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete User</h5>
                </div>

                <div class="modal-body">
                    Are you sure you want to delete this user?
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary w-25" type="button" data-bs-dismiss="modal">No</button>
                    <!-- Form for Deleting User -->
                    <form id="delete-user-form" action="" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger w-25" type="submit">Yes</button>
                    </form>
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
                </div>

                <div class="modal-body">
                    Are you sure you want to delete this dentist?
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary w-15" type="button" data-bs-dismiss="modal">No</button>
                    <!-- Form for Deleting User -->
                    <form id="delete-dentist-form" action="" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger w-15" type="submit">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Dentist -->
    <div class="modal fade" data-bs-backdrop="static" id="add-dentist" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Dentist</h5>
                </div>

                @if(session('success'))
                <div class="alert alert-success position-fixed top-0 start-50 translate-middle-x w-50 text-center" style="z-index: 1050;">
                    {{ session('success') }}
                </div>
                @endif

                <form class="modal-body d-flex flex-column gap-2" action="{{ route('create.dentist') }}" method="post" id="add-dentist-form">
                    @csrf

                    <div class="d-flex gap-2">
                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="fnamed">First Name</label>
                            <input class="form-control" type="text" name="fnamed">
                        </div>

                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="mnamed">Middle Name</label>
                            <input class="form-control" type="text" name="mnamed">
                        </div>

                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="lnamed">Last Name</label>
                            <input class="form-control" type="text" name="lnamed">
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="birthdated">Date of Birth</label>
                            <input class="form-control" type="date" name="birthdated">
                        </div>

                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="sexd">Sexuality</label>
                            <select class="form-select" name="sexd">
                                <option selected disabled>-- Select --</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="phoned">Contact No.</label>
                            <input class="form-control" type="tel" name="phoned">
                        </div>

                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="emaild">Email Address</label>
                            <input class="form-control" type="email" name="emaild">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="street_named">Street Name</label>
                        <input class="form-control" type="text" id="streetName" name="street_named" placeholder="Enter street name">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="provinced">Province</label>
                        <select class="form-select" id="province" name="provinced" required>
                            <option value="">Select Province</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="cityd">City</label>
                        <select class="form-select" id="city" name="cityd" required disabled>
                            <option value="">Select City</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="postal_coded">Postal Code</label>
                        <input class="form-control" type="text" id="postalCode" name="postal_coded" placeholder="Enter postal code">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="passwordd">Default Password</label>
                        <input class="form-control" type="password" name="passwordd">
                    </div>
                </form>

                <div class="modal-footer">
                    <button class="btn btn-secondary w-25" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger w-25" type="button" onclick="document.getElementById('add-dentist-form').submit()">Add</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Secretary -->
    <div class="modal fade" data-bs-backdrop="static" id="add-secretary" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Secretary</h5>
                </div>

                @if(session('success'))
                <div class="alert alert-success position-fixed top-0 start-50 translate-middle-x w-50 text-center" style="z-index: 1050;">
                    {{ session('success') }}
                </div>
                @endif

                <form class="modal-body d-flex flex-column gap-2" action="{{ route('create.secretary') }}" method="post" id="add-secretary-form">
                    @csrf

                    <div class="d-flex gap-2">
                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="fnames">First Name</label>
                            <input class="form-control" type="text" name="fnames">
                        </div>

                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="mnames">Middle Name</label>
                            <input class="form-control" type="text" name="mnames">
                        </div>

                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="lnames">Last Name</label>
                            <input class="form-control" type="text" name="lnames">
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="birthdates">Date of Birth</label>
                            <input class="form-control" type="date" name="birthdates">
                        </div>

                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="sexs">Sexuality</label>
                            <select class="form-select" name="sexs">
                                <option selected disabled>-- Select --</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="phones">Contact No.</label>
                            <input class="form-control" type="tel" name="phones">
                        </div>

                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="emails">Email Address</label>
                            <input class="form-control" type="email" name="emails">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="streetName">Street Name</label>
                        <input class="form-control" type="text" id="streetName" name="street_names" placeholder="Enter street name">
                    </div>

                    <!-- <div class="form-group">
                        <label class="form-label" for="city">City</label>
                        <input class="form-control" type="text" id="city" name="citys" placeholder="Enter city">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="province">Province</label>
                        <input class="form-control" type="text" id="province" name="provinces" placeholder="Enter province">
                    </div> -->

                    <div class="form-group">
                        <label class="form-label" for="province">Province</label>
                        <select class="form-select" id="provincesecre" name="provinces" required>
                            <option value="">Select Province</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="city">City</label>
                        <select class="form-select" id="citypsecre" name="citys" required disabled>
                            <option value="">Select City</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="postalCode">Postal Code</label>
                        <input class="form-control" type="text" id="postalCode" name="postal_codes" placeholder="Enter postal code">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="passwordd">Default Password</label>
                        <input class="form-control" type="password" name="passwords">
                    </div>
                </form>

                <div class="modal-footer">
                    <button class="btn btn-secondary w-25" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger w-25" type="button" onclick="document.getElementById('add-secretary-form').submit()">Add</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Dentist -->
    <div class="modal fade" data-bs-backdrop="static" id="edit-dentist" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Dentist</h5>
                </div>

                @if(session('success'))
                <div class="alert alert-success position-fixed top-0 start-50 translate-middle-x w-50 text-center" style="z-index: 1050;">
                    {{ session('success') }}
                </div>
                @endif

                <form class="modal-body d-flex flex-column gap-2" action="{{ route('update.dentist') }}" method="post" id="edit-dentist-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="dentist-id">
                    <div class="d-flex gap-2">
                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="fnamed">First Name</label>
                            <input class="form-control" type="text" name="fnamee" id="fnamee">
                        </div>

                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="mnamed">Middle Name</label>
                            <input class="form-control" type="text" name="mnamee" id="mnamee">
                        </div>

                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="lnamed">Last Name</label>
                            <input class="form-control" type="text" name="lnamee" id="lnamee">
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="birthdated">Date of Birth</label>
                            <input class="form-control" type="date" name="birthdatee" id="birthdatee">
                        </div>

                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="sexd">Sexuality</label>
                            <select class="form-select" name="sexe" id="sexe">
                                <option selected disabled>-- Select --</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="phoned">Contact No.</label>
                            <input class="form-control" type="tel" name="phonee" id="phonee">
                        </div>

                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="emaild">Email Address</label>
                            <input class="form-control" type="email" name="emaile" id="emaile">
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label class="form-label m-0" for="edit-street">Street Name</label>
                        <input class="form-control" name="street_namee" id="street_namee" type="text" placeholder="Street Name" required>
                    </div>

                    <div class="form-group container-fluid p-0">
                        <label class="form-label m-0" for="edit-province">Province</label>
                        <input class="form-control" name="provincee" id="provincee" type="text" placeholder="Province" required>
                    </div>

                    <div class="form-group container-fluid p-0">
                        <label class="form-label m-0" for="edit-city">City</label>
                        <input class="form-control" name="citye" id="citye" type="text" placeholder="City" required>
                    </div>

                    <div class="form-group container-fluid p-0">
                        <div class="form-group">
                            <label class="form-label m-0" for="edit-postal-code">Postal Code</label>
                            <input class="form-control" name="postal_codee" id="postal_codee" type="text" placeholder="Postal Code" required>
                        </div>
                    </div> -->

                    <div class="mb-4">
                        <label class="form-label fw-bold" for="location">Address</label>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label for="edit-street" class="form-label">Street Name</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    name="street_namee"
                                    id="street_namee"
                                    placeholder="Street Name">
                            </div>
                            <div class="col-md-6">
                                <label for="edit-province" class="form-label">Province</label>
                                <select class="form-control" id="provincee" name="provincee">
                                    <option value="">Select Province</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="edit-city" class="form-label">City</label>
                                <select class="form-control" id="citye" name="citye" disabled>
                                    <option value="">Select City</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="edit-postal-code" class="form-label">Postal Code</label>
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
                    <button class="btn btn-secondary w-25" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary w-25" type="button" onclick="document.getElementById('edit-dentist-form').submit()">Update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Secretary -->
    <div class="modal fade" data-bs-backdrop="static" id="edit-secretary" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Secretary</h5>
                </div>

                <form class="modal-body d-flex flex-column gap-2" action="{{ route('update.secretary') }}" method="post" id="edit-secretary-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="secretary-id">
                    <div class="d-flex gap-2">
                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="fnamesec">First Name</label>
                            <input class="form-control" type="text" name="fnamesec" id="fnamesec">
                        </div>

                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="mnamesec">Middle Name</label>
                            <input class="form-control" type="text" name="mnamesec" id="mnamesec">
                        </div>

                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="lnamesec">Last Name</label>
                            <input class="form-control" type="text" name="lnamesec" id="lnamesec">
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="birthdatesec">Date of Birth</label>
                            <input class="form-control" type="date" name="birthdatesec" id="birthdatesec">
                        </div>

                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="sexsec">Sexuality</label>
                            <select class="form-select" name="sexsec" id="sexsec">
                                <option selected disabled>-- Select --</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="phonesec">Contact No.</label>
                            <input class="form-control" type="tel" name="phonesec" id="phonesec">
                        </div>

                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="emailsec">Email Address</label>
                            <input class="form-control" type="email" name="emailsec" id="emailsec">
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label class="form-label m-0" for="edit-street">Street Name</label>
                        <input class="form-control" name="street_namee" id="street_namee" type="text" placeholder="Street Name" required>
                    </div>

                    <div class="form-group container-fluid p-0">
                        <label class="form-label m-0" for="edit-province">Province</label>
                        <input class="form-control" name="provincee" id="provincee" type="text" placeholder="Province" required>
                    </div>

                    <div class="form-group container-fluid p-0">
                        <label class="form-label m-0" for="edit-city">City</label>
                        <input class="form-control" name="citye" id="citye" type="text" placeholder="City" required>
                    </div>

                    <div class="form-group container-fluid p-0">
                        <div class="form-group">
                            <label class="form-label m-0" for="edit-postal-code">Postal Code</label>
                            <input class="form-control" name="postal_codesec" id="postal_codee" type="text" placeholder="Postal Code" required>
                        </div>
                    </div> -->

                    <div class="mb-4">
                        <label class="form-label fw-bold" for="location">Address</label>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label for="edit-street" class="form-label">Street Name</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    name="street_namesec"
                                    id="street_namesec"
                                    placeholder="Street Name">
                            </div>
                            <div class="col-md-6">
                                <label for="edit-province" class="form-label">Province</label>
                                <select class="form-control" id="provincesec" name="provincesec">
                                    <option value="">Select Province</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="edit-city" class="form-label">City</label>
                                <select class="form-control" id="citysec" name="citysec" disabled>
                                    <option value="">Select City</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="edit-postal-code" class="form-label">Postal Code</label>
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
                    <button class="btn btn-secondary w-25" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary w-25" type="button" onclick="document.getElementById('edit-secretary-form').submit()">Update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Listing -->
    <div class="modal fade" data-bs-backdrop="static" id="add-listing" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Create Clinic</h5>
                </div>

                <form class="modal-body d-flex flex-column gap-2" action="{{ route('create.listing') }}" method="post" enctype="multipart/form-data" id="create-listing">
                    @csrf

                    <div class="d-flex gap-3">
                        <img class="border border-2" style="height: 150px; width: 150px;" id="listing-thumbnail-img">
                        <div class="d-flex flex-column gap-2">
                            <h5 class="m-0 fw-bold">Clinic</h5>
                            <div class="d-flex gap-2">
                                <input class="visually-hidden" type="file" name="listing-thumbnail" onchange="previewListing(this, 1)" accept="image/*" id="listing-thumbnail">
                                <button class="btn btn-primary btn-sm" type="button" onclick="document.getElementById('listing-thumbnail').click()">Upload</button>
                                <button class="btn btn-danger btn-sm">Remove</button>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label class="form-label fw-bold" for="listing-name">Clinic Name</label>
                        <input class="form-control" type="text" name="listing-name" required>
                    </div>

                    <div class="d-flex gap-2">
                        <div class="form-group w-50">
                            <label class="form-label fw-bold" for="listing-email">Email Address</label>
                            <input class="form-control" type="email" name="listing-email" required>
                        </div>

                        <div class="form-group w-50">
                            <label class="form-label fw-bold" for="listing-contact">Contact No.</label>
                            <input class="form-control" type="tel" name="listing-contact" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label fw-bold" for="listing-location">Location</label>
                        <input class="form-control" type="text" name="listing-location" required>
                    </div>

                    <div class="accordion" id="accordion-services">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#list-services" aria-expanded="false" aria-controls="list-services">Services</button>
                            </h2>

                            <div class="accordion-collapse collapse" id="list-services" data-bs-parent="#accordion-services">
                                <div class="accordion-body">
                                    @forelse ($services as $service)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $service->id }}" name="service[]">
                                        <label class="form-check-label" for="service{{ $service->id }}">{{ $service->name }}</label>
                                    </div>
                                    @empty
                                    <h6 class="m-0">No services yet</h6>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion" id="accordion-dentist">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#list-dentist" aria-expanded="false" aria-controls="list-dentist">Dentist</button>
                            </h2>

                            <div class="accordion-collapse collapse" id="list-dentist" data-bs-parent="#accordion-dentist">
                                <div class="accordion-body">
                                    @forelse ($dentist as $dent)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $dent->id }}" name="dent[]">
                                        <label class="form-check-label" for="dent{{ $dent->id }}">Dr. {{ $dent->fname . ' ' . $dent->mname . ' ' . $dent->lname }}</label>
                                    </div>
                                    @empty
                                    <h6 class="m-0">No dentists yet</h6>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                    @endphp

                    <div class="form-group d-flex flex-column gap-2">
                        <label for="listing-schedule" class="fw-bold">Schedule</label>

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

                    <div class="form-group mb-4">
                        <label class="form-label fw-bold" for="listing-about">About Us</label>
                        <textarea class="form-control" name="listing-about" rows="5" style="resize: none;"></textarea>
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
                                        <input class="form-check-input"
                                            type="checkbox"
                                            value="{{ $service->id }}"
                                            id="vservice{{ $service->id }}"
                                            name="vservice[]"
                                            @if($service->is_selected) checked @endif>
                                        <label class="form-check-label" for="vservice{{ $service->id }}">{{ $service->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion" id="vaccordion-dentist">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#vlist-dentist" aria-expanded="false" aria-controls="vlist-dentist">Dentist</button>
                            </h2>

                            <div class="accordion-collapse collapse show" id="vlist-dentist" data-bs-parent="#vaccordion-dentist">
                                <div class="accordion-body">
                                    @foreach ($dentist as $dent)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $dent->id }}" id="vdent{{ $dent->id }}" name="vdent[]">
                                        <label class="form-check-label" for="vdent{{ $dent->id }}">{{ $dent->fname . ' ' . $dent->mname . ' ' . $dent->lname }}</label>
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

    <!-- Delete Listing -->
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

    <!-- Edit Patient -->
    <div class="modal fade" data-bs-backdrop="static" id="edit-patient" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Patient</h5>
                </div>

                <form class="modal-body d-flex flex-column gap-2" action="{{ route('update.patient') }}" method="post" id="edit-patient-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="patient-id">
                    <div class="d-flex gap-2">
                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="fnamed">First Name</label>
                            <input class="form-control" type="text" name="fnamep" id="fnamep">
                        </div>

                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="mnamed">Middle Name</label>
                            <input class="form-control" type="text" name="mnamep" id="mnamep">
                        </div>

                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="lnamed">Last Name</label>
                            <input class="form-control" type="text" name="lnamep" id="lnamep">
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="birthdated">Date of Birth</label>
                            <input class="form-control" type="date" name="birthdatep" id="birthdatep">
                        </div>

                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="sexd">Sexuality</label>
                            <select class="form-select" name="sexp" id="sexp">
                                <option selected disabled>-- Select --</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="phoned">Contact No.</label>
                            <input class="form-control" type="tel" name="phonep" id="phonep">
                        </div>

                        <div class="form-group container-fluid p-0">
                            <label class="form-label" for="emaild">Email Address</label>
                            <input class="form-control" type="email" name="emailp" id="emailp">
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label class="form-label m-0" for="edit-street">Street Name</label>
                        <input class="form-control" name="street_namee" id="street_namee" type="text" placeholder="Street Name" required>
                    </div>

                    <div class="form-group container-fluid p-0">
                        <label class="form-label m-0" for="edit-province">Province</label>
                        <input class="form-control" name="provincee" id="provincee" type="text" placeholder="Province" required>
                    </div>

                    <div class="form-group container-fluid p-0">
                        <label class="form-label m-0" for="edit-city">City</label>
                        <input class="form-control" name="citye" id="citye" type="text" placeholder="City" required>
                    </div>

                    <div class="form-group container-fluid p-0">
                        <div class="form-group">
                            <label class="form-label m-0" for="edit-postal-code">Postal Code</label>
                            <input class="form-control" name="postal_codee" id="postal_codee" type="text" placeholder="Postal Code" required>
                        </div>
                    </div> -->

                    <div class="mb-4">
                        <label class="form-label fw-bold" for="location">Address</label>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label for="edit-street" class="form-label">Street Name</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    name="street_namep"
                                    id="street_namep"
                                    placeholder="Street Name">
                            </div>
                            <div class="col-md-6">
                                <label for="edit-province" class="form-label">Province</label>
                                <select class="form-control" id="provincep" name="provincep">
                                    <option value="">Select Province</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="edit-city" class="form-label">City</label>
                                <select class="form-control" id="cityp" name="cityp" disabled>
                                    <option value="">Select City</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="edit-postal-code" class="form-label">Postal Code</label>
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
                    <button class="btn btn-secondary w-25" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary w-25" type="button" onclick="document.getElementById('edit-patient-form').submit()">Update</button>
                </div>
            </div>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                    document.getElementById('nav-transaction').click();
                    break;
                default:
                    break;
            }
        });

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

        // document.addEventListener('DOMContentLoaded', function() {
        //     document.querySelectorAll('.edit-button').forEach(button => {
        //         button.addEventListener('click', function() {
        //             const userId = this.getAttribute('data-id');

        //             fetch(`/users/${userId}`)
        //                 .then(response => response.json())
        //                 .then(data => {
        //                     const birthdate = new Date(data.birthdate);
        //                     const today = new Date();
        //                     const age = today.getFullYear() - birthdate.getFullYear();
        //                     const defaultImage = "..\\profile_images\\blank_profile_default.png";

        //                     document.getElementById('edit-id').value = data.id;
        //                     document.getElementById('profile-preview').src = data.image_path ? data.image_path : defaultImage;
        //                     document.getElementById('edit-fname').value = data.fname;
        //                     document.getElementById('edit-mname').value = data.mname;
        //                     document.getElementById('edit-lname').value = data.lname;
        //                     document.getElementById('edit-birthdate').value = data.birthdate ? data.birthdate.split(' ')[0] : '';
        //                     document.getElementById('edit-sexuality').value = data.gender;
        //                     document.getElementById('edit-email').value = data.email;
        //                     document.getElementById('edit-number').value = data.phone;
        //                     document.getElementById('edit-street').value = data.street_name;
        //                     document.getElementById('edit-province').value = data.province;
        //                     document.getElementById('edit-city').value = data.city;
        //                     document.getElementById('edit-postal-code').value = data.postal_code;
        //                 })
        //                 .catch(error => console.error('Error fetching user data:', error));
        //         });
        //     });
        // });

        function setDeleteFormAction(action) {
            document.getElementById('delete-service-form').setAttribute('action', action);
        }

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
    </script>
</body>

</html>