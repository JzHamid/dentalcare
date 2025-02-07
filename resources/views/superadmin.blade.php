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
    </style>
</head>

<body class="overflow-hidden vh-100">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <nav class="navbar bg-body-secondary">
        <div class="container-fluid px-4">
            <a class="navbar-brand text-default fw-bold">DentalCare <span class="fw-normal" style="font-size: small;">Superadmin</span></a>

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

    <div class="row m-0" style="height: 93%;">
        <div class="col-md-2 bg-default nav flex-column p-3 gap-1" role="tablist" aria-orientation="vertical" id="navbar">
            <button class="nav-link text-white d-flex active gap-4" id="nav-dashboard" data-bs-toggle="pill" data-bs-target="#tab-dashboard" type="button" role="tab" aria-controls="tab-dashboard" aria-selected="true">
                <i class="bi-speedometer"></i>
                Dashboard
            </button>

            <button class="nav-link text-white d-flex gap-4" id="nav-appointments" data-bs-toggle="pill" data-bs-target="#tab-appointments" type="button" role="tab" aria-controls="tab-appointments" aria-selected="false">
                <i class="bi-calendar-event-fill"></i>
                Appointments
            </button>

            <button class="nav-link text-white d-flex gap-4" id="nav-services" data-bs-toggle="pill" data-bs-target="#tab-services" type="button" role="tab" aria-controls="tab-services" aria-selected="false">
                <i class="bi-clipboard-plus-fill"></i>
                Services
            </button>

            <button class="nav-link text-white d-flex gap-4" id="nav-patients" data-bs-toggle="pill" data-bs-target="#tab-patients" type="button" role="tab" aria-controls="tab-patients" aria-selected="false">
                <i class="bi-people-fill"></i>
                Patients
            </button>

            <button class="nav-link text-white d-flex gap-4" id="nav-dentist" data-bs-toggle="pill" data-bs-target="#tab-dentist" type="button" role="tab" aria-controls="tab-dentist" aria-selected="false">
                <i class="bi-person-fill-add"></i>
                Dentists
            </button>

            <button class="nav-link text-white d-flex gap-4" id="nav-dentist" data-bs-toggle="pill" data-bs-target="#tab-secretary" type="button" role="tab" aria-controls="tab-secretary" aria-selected="false">
                <i class="bi-person-fill-add"></i>
                Secretary
            </button>

            <button class="nav-link text-white d-flex gap-4" id="nav-listing" data-bs-toggle="pill" data-bs-target="#tab-listing" type="button" role="tab" aria-controls="tab-listing" aria-selected="false">
                <i class="bi-building-fill"></i>
                Listing
            </button>

            <a class="nav-link text-white d-flex gap-4 mt-auto" href="{{ route('logout') }}">
                <i class="bi-box-arrow-right"></i>
                Logout
            </a>
        </div>

        <div class="col-md-10 bg-light tab-content p-0 overflow-y-scroll h-100">
            <div class="tab-pane show active gap-5 p-3" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard" tabindex="0">
                <h1 class="mb-5">Welcome Admin!</h1>

                <div class="row m-0 d-flex gap-5">
                    <div class="col bg-white rounded shadow p-4">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <img src="{{ asset('images/dentist_icon.png') }}" class="mb-2" style="height: 100px; width: 100px;">
                                <p class="lead text-center m-0">Dentist</p>
                            </div>

                            <p class="display-5">{{ $dentist->count() }}</p>
                        </div>
                    </div>

                    <div class="col bg-white rounded shadow p-4">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <img src="{{ asset('images/patient_icon.png') }}" class="mb-2" style="height: 100px; width: 100px;">
                                <p class="lead text-center m-0">End-Users</p>
                            </div>

                            <p class="display-5">{{ $users->count() }}</p>
                        </div>
                    </div>

                    <div class="col bg-white rounded shadow p-4">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <img src="{{ asset('images/event_icon.png') }}" class="mb-2" style="height: 100px; width: 100px;">
                                <p class="lead text-center m-0">Appointments</p>
                            </div>

                            <p class="display-5">{{ $appointments->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane gap-5 p-3" id="tab-appointments" role="tabpanel" aria-labelledby="tab-appointments" tabindex="0">
                <h1 class="mb-5">Appointments</h1>

                <div class="d-flex justify-content-between align-items-center mb-2 gap-2">
                    <h5 class="m-0">Appointment History</h5>

                    <div class="d-flex gap-2">
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

                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <!-- <th class="text-center" scope="col">ID</th> -->
                            <th scope="col">Patient Name</th>
                            <th scope="col">Services</th>
                            <th scope="col">Set By</th>
                            <th scope="col">Appointment Time</th>
                            <th scope="col">Status</th>
                            <th class="text-center" scope="col">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($appointments as $appointment)
                        <tr>
                            <!-- <th class="text-center" scope="row">1</th> -->
                            <td>{{ $appointment->user->fname . ' ' . $appointment->user->mname . ' ' . $appointment->user->lname }}</td>
                            <td>{{ $appointment->service->name }}</td>
                            <td>{{ $appointment->user->fname . ' ' . $appointment->user->mname . ' ' . $appointment->user->lname }}</td>
                            <td>
                                {{ Carbon\Carbon::parse($appointment->rescheduled_time ?? $appointment->appointment_time)->format('F j, Y') }}
                            </td>
                            <td>
                                @switch ( $appointment->status )
                                @case ('Pending')
                                <span class="badge text-bg-primary">Pending</span>
                                @break
                                @case ('Upcoming')
                                <span class="badge text-bg-success">Upcoming</span>
                                @break
                                @case ('Rescheduled')
                                <span class="badge text-bg-info">Rescheduled</span>
                                @break
                                @case ('Cancelled')
                                <span class="badge text-bg-danger">Cancelled</span>
                                @break
                                @endswitch
                            </td>
                            <td class="d-flex justify-content-center">
                                <a class="btn btn-primary btn-sm" href="{{ route('record.appointment', $appointment->id) }}">
                                    <i class="bi-calendar-event-fill"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="tab-pane gap-5 p-3" id="tab-services" role="tabpanel" aria-labelledby="tab-services" tabindex="0">
                <h1 class="mb-5">Services</h1>

                <div class="d-flex justify-content-between align-items-center mb-2 gap-2">
                    <h5 class="m-0">List of Services</h5>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-service">
                        <i class="bi-plus-lg"></i>
                        Add
                    </button>
                </div>

                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <!-- <th class="text-center" scope="col">ID</th> -->
                            <th scope="col">Name of Service</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Price Range</th>
                            <th class="text-center" scope="col">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($services as $service)
                        <tr>
                            <!-- <th class="text-center" scope="row">{{ $service->id }}</th> -->
                            <td>{{ $service->name }}</td>
                            <td>{{ floor($service->duration / 60) . 'hr ' . ($service->duration % 60) . 'm' }}</td>
                            <td>{{ $service->price_start }} - {{ $service->price_end }}</td>
                            <td class="d-flex justify-content-center gap-2">
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

            <div class="tab-pane gap-5 p-3" id="tab-patients" role="tabpanel" aria-labelledby="tab-patients" tabindex="0">
                <h1 class="mb-5">Patients</h1>

                <h5>Patient Lists</h5>
                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <!-- <th class="text-center" scope="col">ID</th> -->
                            <th scope="col">Patient Name</th>
                            <th class="text-center" scope="col">Age</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Address</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <!-- <th class="text-center" scope="row">{{ $user->id }}</th> -->
                            <td>{{ $user->fname . ' ' . $user->mname . ' ' . $user->lname }}</td>
                            <td class="text-center">{{ Carbon\Carbon::parse($user->birthdate)->age }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ trim("{$user->street_name}, {$user->city}, {$user->province}", ', ') }}</td>
                            <td class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-primary edit-button" data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#edit-patient">
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

            <div class="tab-pane gap-5 p-3" id="tab-dentist" role="tabpanel" aria-labelledby="tab-dentist" tabindex="0">
                <h1 class="mb-5">Dentist</h1>

                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="m-0">List of Dentist</h5>

                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-dentist">
                        <i class="bi-plus-lg"></i>
                        Add
                    </button>
                </div>

                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <!-- <th class="text-center" scope="col">ID</th> -->
                            <th scope="col">Dentist Name</th>
                            <th scope="col">Specialization</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($dentist as $dent)
                        <tr>
                            <!-- <th class="text-center" scope="row">{{ $dent->id }}</th> -->
                            <td>{{ $dent->fname . ' ' . $dent->mname . ' ' . $dent->lname }}</td>
                            <td></td>
                            <td>{{ $dent->email }}</td>
                            <td>{{ $dent->phone }}</td>
                            <td>{{ trim("{$dent->street_name}, {$dent->city}, {$dent->province}", ', ') }}</td>
                            <td class="d-flex justify-content-center gap-2">
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

            <div class="tab-pane gap-5 p-3" id="tab-secretary" role="tabpanel" aria-labelledby="tab-secretary" tabindex="0">
                <h1 class="mb-5">Secretary</h1>

                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="m-0">List of Secretaries</h5>

                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-secretary">
                        <i class="bi-plus-lg"></i>
                        Add
                    </button>
                </div>

                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <!-- <th class="text-center" scope="col">ID</th> -->
                            <th scope="col">Secretary Name</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th class="text-center" scope="col">Action</th>
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
                            <td class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit-secretary" onclick="get_dentist('{{ $sec->id }}')">
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

            <div class="tab-pane gap-5 p-3" id="tab-listing" role="tabpanel" aria-labelledby="tab-listing" tabindex="0">
                <h1 class="mb-5">Listings</h1>

                <div class="d-flex justify-content-between align-items-center mb-2 gap-2">
                    <h5 class="m-0">Listings</h5>

                    <div class="d-flex">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-listing">
                            <i class="bi-plus-lg"></i>
                            Add
                        </button>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <!-- <th class="text-center" scope="col">ID</th> -->
                            <th scope="col">Clinic Name</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Contact No.</th>
                            <th scope="col">Location</th>
                            <th class="text-center" scope="col">Actions</th>
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
                            <td class="d-flex justify-content-center gap-2">
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
    </div>

    <!-- Create Service Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="add-service" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Service</h5>
                </div>

                <form class="modal-body d-flex flex-column gap-2" action="{{ route('create.service') }}" method="post" id="create-service" enctype="multipart/form-data">
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
                    <h5 class="modal-title">Delete User</h5>
                </div>

                <div class="modal-body">
                    Are you sure you want to delete this user?
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary w-25" type="button" data-bs-dismiss="modal">No</button>
                    <!-- Form for Deleting User -->
                    <form id="delete-dentist-form" action="" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger w-25" type="submit">Yes</button>
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
                        <label class="form-label" for="streetName">Street Name</label>
                        <input class="form-control" type="text" id="streetName" name="street_named" placeholder="Enter street name">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="city">City</label>
                        <input class="form-control" type="text" id="city" name="cityd" placeholder="Enter city">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="province">Province</label>
                        <input class="form-control" type="text" id="province" name="provinced" placeholder="Enter province">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="postalCode">Postal Code</label>
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
                    <div class="form-group">
                        <label class="form-label" for="city">City</label>
                        <input class="form-control" type="text" id="city" name="citys" placeholder="Enter city">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="province">Province</label>
                        <input class="form-control" type="text" id="province" name="provinces" placeholder="Enter province">
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

                    <div class="form-group">
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

                    <div class="form-group">
                        <label class="form-label m-0" for="edit-street">Street Name</label>
                        <input class="form-control" name="street_namesec" id="street_namesec" type="text" placeholder="Street Name" required>
                    </div>

                    <div class="form-group container-fluid p-0">
                        <label class="form-label m-0" for="edit-province">Province</label>
                        <input class="form-control" name="provincesec" id="provincesec" type="text" placeholder="Province" required>
                    </div>

                    <div class="form-group container-fluid p-0">
                        <label class="form-label m-0" for="edit-city">City</label>
                        <input class="form-control" name="citysec" id="citysec" type="text" placeholder="City" required>
                    </div>

                    <div class="form-group container-fluid p-0">
                        <div class="form-group">
                            <label class="form-label m-0" for="edit-postal-code">Postal Code</label>
                            <input class="form-control" name="postal_codesec" id="postal_codesec" type="text" placeholder="Postal Code" required>
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
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#list-dentist" aria-expanded="false" aria-controls="list-dentist">Dentist</button>
                            </h2>

                            <div class="accordion-collapse collapse" id="list-dentist" data-bs-parent="#accordion-dentist">
                                <div class="accordion-body">
                                    @forelse ($dentist as $dent)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $dent->id }}" name="dent[]">
                                        <label class="form-check-label" for="dent{{ $dent->id }}">{{ $dent->fname . ' ' . $dent->mname . ' ' . $dent->lname }}</label>
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

                    <div class="form-group mb-4">
                        <label class="form-label" for="listing-about">About Us</label>
                        <textarea class="form-control" name="listing-about" rows="10" style="resize: none;"></textarea>
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

    <!-- Patient Edit Modal -->
    <div class="container-fluid p-0">
        <div class="modal fade" id="edit-patient" tabindex="-1" aria-labelledby="edit-service-label" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="d-flex flex-column p-4 gap-3" id="edit-form" enctype="multipart/form-data" action="{{ route('update_patient.account') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="modal-header">
                            <h5 class="modal-title text-center w-100" id="edit-service-label">Edit Patient</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{ $user->id }}" id="edit-id">

                            <!-- Profile Picture -->
                            <div class="text-center">
                                <img id="profile-preview"
                                    alt="Profile Picture" class="rounded-circle mb-3" width="120" height="120">
                                <input type="file" id="edit-profile-picture" name="profile" class="form-control">
                            </div>

                            <!-- First Name - Middle Name - Last Name -->
                            <div class="d-flex gap-2">
                                <div class="form-group container-fluid p-0">
                                    <label class="form-label m-0" for="edit-fname">First Name</label>
                                    <input class="form-control" name="fname" id="edit-fname" type="text" placeholder="First Name" value="{{ old('fname', $user->fname) }}" required>
                                </div>
                                <div class="form-group container-fluid p-0">
                                    <label class="form-label m-0" for="edit-mname">Middle Name</label>
                                    <input class="form-control" name="mname" id="edit-mname" type="text" placeholder="Middle Name" value="{{ old('mname', $user->mname) }}">
                                </div>
                                <div class="form-group container-fluid p-0">
                                    <label class="form-label m-0" for="edit-lname">Last Name</label>
                                    <input class="form-control" name="lname" id="edit-lname" type="text" placeholder="Last Name" value="{{ old('lname', $user->lname) }}" required>
                                </div>
                            </div>

                            <!-- Date of Birth - Sexuality -->
                            <div class="d-flex gap-2">
                                <div class="form-group container-fluid p-0">
                                    <label for="edit-birthdate" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="edit-birthdate" name="birth" value="{{ old('birth', $user->birthdate) }}">
                                </div>
                                <div class="form-group container-fluid p-0">
                                    <label class="form-label m-0" for="edit-sexuality">Sexuality</label>
                                    <select class="form-select" name="gender" id="edit-sexuality" required>
                                        <option value="0" {{ $user->gender == 0 ? 'selected' : '' }}>Male</option>
                                        <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>Female</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Contact No. - Email Address -->
                            <div class="d-flex gap-2">
                                <div class="form-group container-fluid p-0">
                                    <label class="form-label m-0" for="edit-number">Contact No.</label>
                                    <input class="form-control" name="phone" id="edit-number" type="tel" placeholder="Contact No." value="{{ old('phone', $user->phone) }}" required>
                                </div>
                                <div class="form-group container-fluid p-0">
                                    <label class="form-label m-0" for="edit-email">Email Address</label>
                                    <input class="form-control" name="email" id="edit-email" type="email" placeholder="Email Address" value="{{ old('email', $user->email) }}" required>
                                </div>
                            </div>

                            <!-- Street Name -->
                            <div class="form-group">
                                <label class="form-label m-0" for="edit-street">Street Name</label>
                                <input class="form-control" name="street_name" id="edit-street" type="text" placeholder="Street Name" value="{{ old('street_name', $user->street_name) }}" required>
                            </div>

                            <!-- Province - City -->
                            <div class="d-flex gap-2">
                                <div class="form-group container-fluid p-0">
                                    <label class="form-label m-0" for="edit-province">Province</label>
                                    <select class="form-control" name="province" id="edit-province" required>
                                        <option value="">Select Province</option>
                                    </select>
                                </div>
                                <div class="form-group container-fluid p-0">
                                    <label class="form-label m-0" for="edit-city">City</label>
                                    <select class="form-control" name="city" id="edit-city" disabled>
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Postal Code -->
                            <div class="form-group">
                                <label class="form-label m-0" for="edit-postal-code">Postal Code</label>
                                <input class="form-control" name="postal_code" id="edit-postal-code" type="text" placeholder="Postal Code" value="{{ old('postal_code', $user->postal_code) }}" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
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

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.edit-button').forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-id');

                    fetch(`/users/${userId}`)
                        .then(response => response.json())
                        .then(data => {
                            const birthdate = new Date(data.birthdate);
                            const today = new Date();
                            const age = today.getFullYear() - birthdate.getFullYear();
                            const defaultImage = "..\\profile_images\\blank_profile_default.png";

                            document.getElementById('edit-id').value = data.id;
                            document.getElementById('profile-preview').src = data.image_path ? data.image_path : defaultImage;
                            document.getElementById('edit-fname').value = data.fname;
                            document.getElementById('edit-mname').value = data.mname;
                            document.getElementById('edit-lname').value = data.lname;
                            document.getElementById('edit-birthdate').value = data.birthdate ? data.birthdate.split(' ')[0] : '';
                            document.getElementById('edit-sexuality').value = data.gender;
                            document.getElementById('edit-email').value = data.email;
                            document.getElementById('edit-number').value = data.phone;
                            document.getElementById('edit-street').value = data.street_name;
                            document.getElementById('edit-province').value = data.province;
                            document.getElementById('edit-city').value = data.city;
                            document.getElementById('edit-postal-code').value = data.postal_code;
                        })
                        .catch(error => console.error('Error fetching user data:', error));
                });
            });
        });

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



        document.addEventListener("DOMContentLoaded", function() {
            const provinceSelect = document.getElementById("edit-province");
            const citySelect = document.getElementById("edit-city");
            const existingProvince = "{{ $user->province }}".trim();
            const existingCity = "{{ $user->city }}".trim();

            fetch("https://psgc.gitlab.io/api/provinces/")
                .then(response => response.json())
                .then(provinces => {
                    provinces.forEach(province => {
                        let option = document.createElement("option");
                        option.value = province.code;
                        option.textContent = province.name;
                        option.setAttribute("data-name", province.name);

                        if (province.name === existingProvince) {
                            option.selected = true;
                        }

                        provinceSelect.appendChild(option);
                    });

                    if (existingProvince) {
                        let selectedProvince = provinces.find(p => p.name === existingProvince);
                        if (selectedProvince) {
                            loadCities(selectedProvince.code, existingCity);
                        }
                    }
                })
                .catch(error => console.error("Error fetching provinces:", error));

            function loadCities(provinceCode, selectedCity = "") {
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
                let selectedProvinceCode = this.value;
                citySelect.innerHTML = '<option value="">Select City</option>';
                citySelect.disabled = true;
                loadCities(selectedProvinceCode);
            });

            document.getElementById("edit-form").addEventListener("submit", function(event) {
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