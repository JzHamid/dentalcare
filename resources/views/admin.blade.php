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

                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name of Service</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Price Range</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="tab-pane gap-5 p-3" id="tab-patients" role="tabpanel" aria-labelledby="tab-patients" tabindex="0">
                    <h1 class="mb-5">Patients</h1>
                </div>

                <div class="tab-pane gap-5 p-3" id="tab-listings" role="tabpanel" aria-labelledby="tab-listings" tabindex="0">
                    <h1 class="mb-5">Listings</h1>

                    <table class="table">
                        <thead class="table-primary">
                            <tr>

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

        <div class="modal fade" id="add-service" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Service</h5>
                    </div>

                    <form class="modal-body">
                        @csrf

                        <div class="form-group">
                            <label class="form-label" for="">Service Name</label>
                            <input class="form-control" type="text">
                        </div>
                    </form>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>