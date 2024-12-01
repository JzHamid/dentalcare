<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

        <title>DentalCare | Admin</title>

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
                <a class="navbar-brand text-default fw-bold">DentalCare</a>

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
                <div class="container-fluid d-flex flex-column align-items-center py-1">
                    <div class="position-relative d-flex justify-content-center">
                        <img src="{{ '/storage/' . $log->image_path }}" class="mb-1" style="height: 100px; width: 100px;">

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
                    
                    <h6 class="text-center text-white m-0">{{ $log->fname . ' ' . $log->mname . ' ' . $log->lname }}</h6>
                    <p class="fw-light text-white mb-2">Title</p>

                    <form class="w-100 d-flex justify-content-center" action="{{ route('availability') }}" method="post" id="availability">
                        @csrf

                        <select class="form-select form-select-sm w-75" style="font-size: x-small;" name="online" onchange="document.getElementById('availability').submit()">
                            <option value="1" @selected($is_online == 1)>Available</option>
                            <option value="0" @selected($is_online == 0)>Not Available</option>
                        </select>
                    </form>
                </div>

                <button class="nav-link text-white d-flex active gap-4" id="nav-dashboard" data-bs-toggle="pill" data-bs-target="#tab-dashboard" type="button" role="tab" aria-controls="tab-dashboard" aria-selected="true">
                    <i class="bi-speedometer"></i>
                    Dashboard
                </button>

                <button class="nav-link text-white d-flex gap-4" id="nav-notifications" data-bs-toggle="pill" data-bs-target="#tab-notifications" type="button" role="tab" aria-controls="tab-notifications" aria-selected="false">
                    <i class="bi-bell-fill"></i>
                    Notifications
                </button>

                <button class="nav-link text-white d-flex gap-4" id="nav-appointments" data-bs-toggle="pill" data-bs-target="#tab-appointments" type="button" role="tab" aria-controls="tab-appointments" aria-selected="false">
                    <i class="bi-calendar-event-fill"></i>
                    Appointments
                </button>

                @if ($log->status > 1)
                    <button class="nav-link text-white d-flex gap-4" id="nav-services" data-bs-toggle="pill" data-bs-target="#tab-services" type="button" role="tab" aria-controls="tab-services" aria-selected="false">
                        <i class="bi-clipboard-plus-fill"></i>
                        Services
                    </button>
                @endif

                <button class="nav-link text-white d-flex gap-4" id="nav-patients" data-bs-toggle="pill" data-bs-target="#tab-patients" type="button" role="tab" aria-controls="tab-patients" aria-selected="false">
                    <i class="bi-people-fill"></i>
                    Patients
                </button>

                @if ($log->status > 1)
                    <button class="nav-link text-white d-flex gap-4" id="nav-listings" data-bs-toggle="pill" data-bs-target="#tab-listings" type="button" role="tab" aria-controls="tab-listings" aria-selected="false">
                        <i class="bi-building-fill"></i>
                        Listings
                    </button>
                @endif

                <button class="nav-link text-white d-flex gap-4" id="nav-history" data-bs-toggle="pill" data-bs-target="#tab-history" type="button" role="tab" aria-controls="tab-history" aria-selected="false">
                    <i class="bi-clock-history"></i>
                    History
                </button>

                <button class="nav-link text-white d-flex gap-4" id="nav-collab" data-bs-toggle="pill" data-bs-target="#tab-collab" type="button" role="tab" aria-controls="tab-collab" aria-selected="false">
                    <i class="bi-person-fill-add"></i>
                    Collaborators
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
                                    <p class="lead text-center m-0">Patients</p>
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

                        <div class="col bg-white rounded shadow p-4">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column">
                                    <img src="{{ asset('images/procedure_icon.png') }}" class="mb-2" style="height: 100px; width: 100px;">
                                    <p class="lead text-center m-0">Procedures</p>
                                </div>

                                <p class="display-5">0</p>
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
                                <th class="text-center" scope="col">ID</th>
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
                                    <th class="text-center" scope="row">1</th>
                                    <td>{{ $appointment->user->fname . ' ' . $appointment->user->mname . ' ' . $appointment->user->lname }}</td>
                                    <td>{{ $appointment->service->name }}</td>
                                    <td>{{ $appointment->user->fname . ' ' . $appointment->user->mname . ' ' . $appointment->user->lname }}</td>
                                    <td>{{ Carbon\Carbon::parse($appointment->appointment_time)->format('F j, Y') }}</td>
                                    <td>
                                        @switch ( $appointment->status )
                                            @case ('Pending')
                                                <span class="badge text-bg-primary">Pending</span>
                                                @break
                                            @case ('Upcoming')
                                                <span class="badge text-bg-success">Upcoming</span>
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
                                <th class="text-center" scope="col">ID</th>
                                <th scope="col">Name of Service</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Price Range</th>
                                <th class="text-center" scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <th class="text-center" scope="row">{{ $service->id }}</th>
                                    <td>{{ $service->name }}</td>
                                    <td>{{ floor($service->duration / 60) . 'hr ' . ($service->duration % 60) . 'm' }}</td>
                                    <td>{{ $service->price_start }} - {{ $service->price_end }}</td>
                                    <td class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit-service" onclick="get_service('{{ $service->id }}')">
                                            <i class="bi-pencil-square"></i>
                                        </button>

                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-service">
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

                    <div class="d-flex justify-content-between align-items-center mb-2 gap-2">
                        <h5 class="m-0">List of Patients</h5>

                        <div class="d-flex">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-patient">
                                <i class="bi-plus-lg"></i>
                                Add
                            </button>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-center" scope="col">ID</th>
                                <th scope="col">Patient Name</th>
                                <th scope="col">Age</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Address</th>
                                <th class="text-center" scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane gap-5 p-3" id="tab-listings" role="tabpanel" aria-labelledby="tab-listings" tabindex="0">
                    <h1 class="mb-5">Listings</h1>

                    <div class="d-flex justify-content-between align-items-center mb-2 gap-2">
                        <h5 class="m-0">Current Listings</h5>

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
                                <th class="text-center" scope="col">ID</th>
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
                                    <th class="text-center" scope="row">{{ $listing->id }}</th>
                                    <td>{{ $listing->name }}</td>
                                    <td>{{ $listing->email }}</td>
                                    <td>{{ $listing->contact }}</td>
                                    <td>{{ $listing->location }}</td>
                                    <td class="d-flex justify-content-center gap-2" >
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

                <div class="tab-pane gap-5 p-3" id="tab-history" role="tabpanel" aria-labelledby="tab-history" tabindex="0">
                    <h1 class="mb-5">History</h1>
                </div>

                <div class="tab-pane gap-5 p-3" id="tab-collab" role="tabpanel" aria-labelledby="tab-collab" tabindex="0">
                    <h1 class="mb-5">Collaborators</h1>

                    <div class="d-flex justify-content-between align-items-center mb-2 gap-2">
                        <h5 class="m-0">List of Collaborators</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-collab">
                            <i class="bi-plus-lg"></i>
                            Add
                        </button>
                    </div>

                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-center" scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Contact No.</th>
                                <th scope="col">Date Added</th>
                                <th scope="col">Position</th>
                                <th scope="col">Status</th>
                                <th class="text-center" scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                @if ($user->status > 0)
                                    <tr>
                                        <th class="text-center" scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->fname . ' ' . $user->mname . ' ' . $user->lname }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ Carbon\Carbon::parse($user->date_collab)->format('F j, Y') }}</td>
                                        <td>
                                            @if ($user->status == 1)
                                                Secretary
                                            @elseif ($user->status == 2)
                                                Dentist
                                            @endif
                                        </td>
                                        <td>
                                            {{ $user->is_online ? 'Online' : 'Offline' }}
                                        </td>
                                        <td class="d-flex justify-content-center gap-2">
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit-collab" onclick="get_collab('{{ $user->id }}')">
                                                <i class="bi-pencil-square"></i>
                                            </button>

                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-collab">
                                                <i class="bi-trash-fill"></i>
                                            </button>

                                            <form id="delete-collab-form" action="{{ route('destroy.collab', $user->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane gap-5 p-3" id="tab-profile" role="tabpanel" aria-labelledby="tab-profile" tabindex="0">
                    <h1 class="mb-5">Profile</h1>

                    <form class="rounded shadow p-5" action="{{ route('update.account') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="border border-tertiary rounded d-flex gap-3 p-4 mb-4">
                            <img src="{{ '/storage/' . $log->image_path }}" style="height: 150px; width: 150px;" id="profile-img">

                            <div class="d-flex flex-column p-0">
                                <h5>Profile Image</h5>
                                <div class="d-flex gap-3">
                                    <input class="visually-hidden" type="file" name="profile" id="profile" onchange="previewListing(this, 3)">
                                    <button class="btn btn-primary btn-sm" type="button" onclick="document.getElementById('profile').click()">Upload</button>
                                    <button class="btn btn-danger btn-sm" type="button">Remove</button>
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
                                <label class="form-label" for="gender">Sexuality</label>
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

                        <div class="form-group mb-4">
                            <label class="form-label" for="location">Location</label>
                            <input class="form-control" type="text" name="location" value="{{ $log->address }}">
                        </div>

                        <div class="d-flex w-100 justify-content-end">
                            <button class="btn btn-primary w-25" type="submit">Save Profile</button>
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
                        <h5 class="modal-title">Add Collaborator</h5>
                    </div>

                    <form class="modal-body d-flex flex-column gap-2" action="{{ route('create.collab') }}" method="post" id="create-collab">
                        @csrf
                        
                        <div class="form-group w-100">
                            <label class="form-label" for="collab-email">Email Address</label>
                            <input class="form-control" type="email" name="collab-email" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="collab-position">Position</label>
                            <select class="form-select" name="collab-position" required>
                                <option value="0" selected disabled>-- Select --</option>
                                <option value="1">Secretary</option>
                                <option value="2">Dentist</option>
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
                                <option value="2">Dentist</option>
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
            document.addEventListener('DOMContentLoaded', function () {
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
                    default:
                        break;
                }

                const url = new URL(window.location.href);
                const page = url.searchParams.get('page');

                if (page === '2') {
                    document.getElementById('nav-appointments').click();
                }
            });

            function get_service (id) {
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

            function get_listing (id) {
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

            function get_collab (id) {
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

            function previewListing (input, type) {
                if (input.files && input.files[0]) {
                    const file = input.files[0];
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        let previewer;

                        if (type == 1) {
                            previewer = document.getElementById('listing-thumbnail-img');
                        } else if (type == 2) {
                            previewer = document.getElementById('vlisting-thumbnail-img');
                        } else if (type == 3) {
                            previewer = document.getElementById('profile-img');
                        }

                        previewer.src = e.target.result;
                    }

                    reader.readAsDataURL(file);
                }
            }
        </script>
    </body>
</html>