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
                <a class="navbar-brand text-default fw-bold" href="{{ route('landing') }}">DentalCare <span class="fw-normal" style="font-size: small;">Superadmin</span></a>

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

                <button class="nav-link text-white d-flex gap-4" id="nav-listing" data-bs-toggle="pill" data-bs-target="#tab-listing" type="button" role="tab" aria-controls="tab-listing" aria-selected="false">
                    <i class="bi-building-fill"></i>
                    Listing
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
                </div>

                <div class="tab-pane gap-5 p-3" id="tab-services" role="tabpanel" aria-labelledby="tab-services" tabindex="0">
                    <h1 class="mb-5">Services</h1>
                </div>

                <div class="tab-pane gap-5 p-3" id="tab-patients" role="tabpanel" aria-labelledby="tab-patients" tabindex="0">
                    <h1 class="mb-5">Patients</h1>

                    <h5>Patient Lists</h5>
                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-center" scope="col">ID</th>
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
                                    <th class="text-center" scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->fname . ' ' . $user->mname . ' ' . $user->lname }}</td>
                                    <td class="text-center">{{ Carbon\Carbon::parse($user->birthdate)->age }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit-service">
                                            <i class="bi-pencil-square"></i>
                                        </button>

                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-service">
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
                        <h5 class="m-0">List of Services</h5>

                        <div class="d-flex gap-2 w-25">
                            <input class="form-control w-50" type="search">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-service">
                                <i class="bi-plus-lg"></i>
                                Add
                            </button>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-center" scope="col">ID</th>
                                <th scope="col">Dentist Name</th>
                                <th scope="col">Specialization</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Appointments</th>
                                <th class="text-center" scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($dentist as $dent)
                                <tr>
                                    <th class="text-center" scope="row">{{ $dent->id }}</th>
                                    <td>{{ $dent->fname . ' ' . $dent->mname . ' ' . $dent->lname }}</td>
                                    <td></td>
                                    <td>{{ $dent->email }}</td>
                                    <td>{{ $dent->phone }}</td>
                                    <td>{{ $dent->address }}</td>
                                    <td></td>
                                    <td class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit-service">
                                            <i class="bi-pencil-square"></i>
                                        </button>

                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-service">
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
                </div>

                <div class="tab-pane gap-5 p-3" id="tab-profile" role="tabpanel" aria-labelledby="tab-profile" tabindex="0">
                    <h1 class="mb-5">Profile</h1>
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
    </body>
</html>