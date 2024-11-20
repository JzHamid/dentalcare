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
                <a class="navbar-brand text-default fw-bold" href="">DentalCare</a>

                @auth
                    <div class="d-flex gap-4">
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
                                <li>
                                    Test
                                </li>
                            </ul>
                        </div>
                    </div>
                @endauth

                @guest
                    <a class="text-default text-decoration-none" href="{{ route('login') }}">Login / Signup</a>
                @endguest
            </div>
        </nav>

        <div class="row m-0" style="height: 93%;">
            <div class="col-md-2 bg-default nav flex-column p-3 gap-1" role="tablist" aria-orientation="vertical" id="navbar">
                <div class="container-fluid d-flex flex-column align-items-center py-2">
                    <div class="position-relative d-flex justify-content-center">
                        <img class="" style="height: 100px; width: 100px;">

                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                        </span>
                    </div>
                    
                    <p class="fs-5 fw-medium text-white m-0">Dentist Name</p>
                    <p class="fw-light text-white mb-2">Title</p>

                    <select class="form-select form-select-sm w-75" style="font-size: x-small;">
                        <option value="0">Available</option>
                        <option value="1">Not Available</option>
                    </select>
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

                <button class="nav-link text-white d-flex gap-4" id="nav-services" data-bs-toggle="pill" data-bs-target="#tab-services" type="button" role="tab" aria-controls="tab-services" aria-selected="false">
                    <i class="bi-clipboard-plus-fill"></i>
                    Services
                </button>

                <button class="nav-link text-white d-flex gap-4" id="nav-patients" data-bs-toggle="pill" data-bs-target="#tab-patients" type="button" role="tab" aria-controls="tab-patients" aria-selected="false">
                    <i class="bi-people-fill"></i>
                    Patients
                </button>

                <button class="nav-link text-white d-flex gap-4" id="nav-listings" data-bs-toggle="pill" data-bs-target="#tab-listings" type="button" role="tab" aria-controls="tab-listings" aria-selected="false">
                    <i class="bi-building-fill"></i>
                    Listings
                </button>

                <button class="nav-link text-white d-flex gap-4" id="nav-history" data-bs-toggle="pill" data-bs-target="#tab-history" type="button" role="tab" aria-controls="tab-history" aria-selected="false">
                    <i class="bi-clock-history"></i>
                    History
                </button>

                <hr class="m-2">

                <button class="nav-link text-white d-flex gap-4" id="nav-collab" data-bs-toggle="pill" data-bs-target="#tab-collab" type="button" role="tab" aria-controls="tab-collab" aria-selected="false">
                    <i class="bi-person-fill-add"></i>
                    Collaborators
                </button>

                <button class="nav-link text-white d-flex gap-4" id="nav-profile" data-bs-toggle="pill" data-bs-target="#tab-profile" type="button" role="tab" aria-controls="tab-profile" aria-selected="false">
                    <i class="bi-gear-fill"></i>
                    Profile
                </button>

                <button class="nav-link text-white d-flex gap-4 mt-auto" id="nav-transactions" type="button">
                    <i class="bi-box-arrow-right"></i>
                    Logout
                </button>
            </div>

            <div class="col-md-10 bg-light tab-content p-0 overflow-y-scroll h-100">
                <div class="tab-pane show active gap-5 p-3" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard" tabindex="0">
                    <h1>Dashboard</h1>

                    <div class="d-flex flex-column p-5 gap-5">
                        <div class="rounded bg-white shadow p-3">
                            <h4>Health Record</h4>
                            <hr>
                        </div>

                        <div class="container-fluid d-flex p-0 gap-5">
                            <div class="container-fluid rounded bg-white shadow p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="m-0">Appointments</h4>
                                    <button class="btn btn-primary d-flex gap-2">New</button>
                                </div>
                                <hr>
                            </div>

                            <div class="container-fluid rounded bg-white shadow p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="m-0">Notifications</h4>
                                    <button class="btn btn-primary d-flex gap-2">View All</button>
                                </div>
                                <hr>
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

                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Dentist Name</th>
                                <th scope="col">Patient Name</th>
                                <th scope="col">Location</th>
                                <th scope="col">Services</th>
                                <th scope="col">Time</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Juan Dela Cruz</td>
                                <td>Juan Dela Cruz</td>
                                <td>Zamboanga City</td>
                                <td>Cleaning</td>
                                <td>10:00-11:30</td>
                                <td>View</td>
                            </tr>

                            <tr>
                                <th scope="row">2</th>
                                <td>Juan Dela Cruz</td>
                                <td>Juan Dela Cruz</td>
                                <td>Zamboanga City</td>
                                <td>Cleaning</td>
                                <td>10:00-11:30</td>
                                <td>View</td>
                            </tr>
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
                                <th scope="col">ID</th>
                                <th scope="col">Name of Service</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Price Range</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <th scope="row">{{ $service->id }}</th>
                                    <td>{{ $service->name }}</td>
                                    <td>{{ floor($service->duration / 60) . 'hr ' . ($service->duration % 60) . 'm' }}</td>
                                    <td>{{ $service->price_start }} - {{ $service->price_end }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit-service" onclick="get_service('{{ $service->id }}')">Edit</button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-service">Delete</button>

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
                                <th scope="col">ID</th>
                                <th scope="col">Patient Name</th>
                                <th scope="col">Age</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Address</th>
                                <th scope="col">Action</th>
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

                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Clinic Name</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Contact No.</th>
                                <th scope="col">Location</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="tab-pane gap-5 p-3" id="tab-history" role="tabpanel" aria-labelledby="tab-history" tabindex="0">
                    <h1 class="mb-5">History</h1>
                </div>

                <div class="tab-pane gap-5 p-3" id="tab-collab" role="tabpanel" aria-labelledby="tab-collab" tabindex="0">
                    <h1 class="mb-5">Collaborators</h1>
                </div>

                <div class="tab-pane gap-5 p-3" id="tab-profile" role="tabpanel" aria-labelledby="tab-profile" tabindex="0">
                    <h1 class="mb-5">Profile</h1>

                    <form class="rounded shadow p-5" action="">
                        @csrf

                        <div class="border border-tertiary rounded d-flex gap-3 p-4 mb-4">
                            <img style="height: 150px; width: 150px;">

                            <div class="d-flex flex-column p-0">
                                <h5>Profile Image</h5>
                                <div class="d-flex gap-3">
                                    <input class="visually-hidden" type="file" name="profile" id="profile">
                                    <button class="btn btn-primary btn-sm" type="button" onclick="document.getElementById('profile').click()">Upload</button>
                                    <button class="btn btn-danger btn-sm" type="button">Remove</button>
                                </div>
                                <p class="mt-auto mb-0">Your image should be below 4MB</p>
                            </div>
                        </div>

                        <div class="d-flex gap-3 w-100 mb-2">
                            <div class="form-group d-flex flex-column flex-fill">
                                <label class="form-label" for="fname">First Name</label>
                                <input class="form-control" type="text" name="fname">
                            </div>

                            <div class="form-group d-flex flex-column flex-fill">
                                <label class="form-label" for="mname">Middle Name</label>
                                <input class="form-control" type="text" name="mname">
                            </div>

                            <div class="form-group d-flex flex-column flex-fill">
                                <label class="form-label" for="lname">Last Name</label>
                                <input class="form-control" type="text" name="lname">
                            </div>
                        </div>

                        <label class="form-label" for="birth">Birthdate</label>
                        <input class="form-control mb-2" type="date" name="birth">

                        <div class="d-flex gap-3 w-100 mb-2">
                            <div class="form-group d-flex flex-column flex-fill">
                                <label class="form-label" for="phone">Contact No.</label>
                                <input class="form-control" type="tel" name="phone">
                            </div>

                            <div class="form-group d-flex flex-column flex-fill">
                                <label class="form-label" for="email">Email Address</label>
                                <input class="form-control" type="email" name="email">
                            </div>
                        </div>

                        <label class="form-label" for="location">Location</label>
                        <input class="form-control mb-4" type="text" name="location">

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

                    <form class="modal-body d-flex flex-column gap-2" action="{{ route('create.listing') }}" method="post" id="create-listing">
                        @csrf

                        <div class="d-flex gap-3">
                            <img style="height: 100px; width: 100px;">
                            <div class="d-flex flex-column gap-2">
                                <h5 class="m-0">Listing Thumbnail</h5>
                                <div class="d-flex gap-2">
                                    <input class="visually-hidden" type="file" id="listing-thumbnail">
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
                                                <input class="form-check-input" type="checkbox" value="" name="service{{ $service->id }}">
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

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                switch (parseInt("{{ session('page') }}", 10)) {
                    case 3:
                        document.getElementById('nav-services').click();
                        break;
                
                    default:
                        break;
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
        </script>
    </body>
</html>