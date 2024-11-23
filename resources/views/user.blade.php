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
            <div class="col-md-2 bg-default nav flex-column p-3 gap-2" role="tablist" aria-orientation="vertical" id="navbar">
                <div class="container-fluid d-flex flex-column align-items-center py-4">
                    <img src="{{ asset('storage/images/profile_empty.jpg') }}" class="mb-2" style="height: 100px; width: 100px;">
                    <p class="fs-5 text-center fw-medium text-white m-0 mb-2">{{ $user->fname . ' ' . $user->mname . ' ' . $user->lname }}</p>
                    <p class="fw-light text-white mb-1">Patient ID: {{ $user->id }}</p>

                    <div class="text-white d-flex align-items-center p-0 gap-2">
                        <p class="fw-light text-white">{{ $user->gender ? 'Male' : 'Female' }}</p>
                        <p class="fw-light text-white">{{ Carbon\Carbon::parse($user->birthdate)->age }}</p>
                    </div>
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

                <button class="nav-link text-white d-flex gap-4" id="nav-transactions" data-bs-toggle="pill" data-bs-target="#tab-transactions" type="button" role="tab" aria-controls="tab-transactions" aria-selected="false">
                    <i class="bi-receipt"></i>
                    Transactions
                </button>

                <button class="nav-link text-white d-flex gap-4" id="nav-profile" data-bs-toggle="pill" data-bs-target="#tab-profile" type="button" role="tab" aria-controls="tab-profile" aria-selected="false">
                    <i class="bi-person-fill"></i>
                    Profile
                </button>

                <a class="nav-link text-white d-flex gap-4 mt-auto" href="{{ route('logout') }}">
                    <i class="bi-box-arrow-right"></i>
                    Logout
                </a>
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
                                    <button class="btn btn-primary d-flex gap-2" onclick="document.getElementById('nav-notifications').click()">View All</button>
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

                <div class="tab-pane gap-5 p-3" id="tab-transactions" role="tabpanel" aria-labelledby="tab-transactions" tabindex="0">
                    <h1 class="mb-5">Transactions</h1>

                    <div class="nav nav-pills gap-2" role="tablist">
                        <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#transac-upcoming" type="button" aria-controls="transac-upcoming" aria-selected="true">Upcoming</button>
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#transac-history" type="button" aria-controls="transac-history" aria-selected="false">History</button>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="transac-upcoming" data-bs-toggle="tab" role="tabpanel" aria-labelledby="transac-upcoming" tabindex="0">
                            <hr>
                            Upcoming
                        </div>

                        <div class="tab-pane" id="transac-history" data-bs-toggle="tab" role="tabpanel" aria-labelledby="transac-history" tabindex="0">
                            <hr>
                            History
                        </div>
                    </div>
                </div>

                <div class="tab-pane gap-5 p-3" id="tab-profile" role="tabpanel" aria-labelledby="tab-profile" tabindex="0">
                    <h1 class="mb-5">Profile</h1>

                    <form class="rounded shadow p-5" action="" method="post">
                        @csrf

                        <div class="border border-tertiary rounded d-flex gap-3 p-4 mb-4">
                            <img class="border border-2 border-tertiary" src="{{ $user->image_path ?? asset('images/profile_empty.jpg') }}" style="height: 150px; width: 150px;" id="profile-thumbnail-img">

                            <div class="d-flex flex-column p-0">
                                <h5>Profile Image</h5>
                                <div class="d-flex gap-3">
                                    <input class="visually-hidden" type="file" name="profile" onchange="previewThumbnail(this)" id="profile">
                                    <button class="btn btn-primary btn-sm" type="button" onclick="document.getElementById('profile').click()">Upload</button>
                                    <button class="btn btn-danger btn-sm" type="button">Remove</button>
                                </div>
                                <p class="mt-auto mb-0">Your image should be below 4MB</p>
                            </div>
                        </div>

                        <div class="d-flex gap-3 w-100 mb-2">
                            <div class="form-group d-flex flex-column flex-fill">
                                <label class="form-label" for="fname">First Name</label>
                                <input class="form-control" type="text" name="fname" value="{{ $user->fname }}">
                            </div>

                            <div class="form-group d-flex flex-column flex-fill">
                                <label class="form-label" for="mname">Middle Name</label>
                                <input class="form-control" type="text" name="mname" value="{{ $user->mname }}">
                            </div>

                            <div class="form-group d-flex flex-column flex-fill">
                                <label class="form-label" for="lname">Last Name</label>
                                <input class="form-control" type="text" name="lname" value="{{ $user->lname }}">
                            </div>
                        </div>

                        <label class="form-label" for="birth">Birthdate</label>
                        <input class="form-control mb-2" type="date" name="birth" value="{{ Carbon\Carbon::parse($user->birthdate)->format('Y-m-d') }}">

                        <div class="d-flex gap-3 w-100 mb-2">
                            <div class="form-group d-flex flex-column flex-fill">
                                <label class="form-label" for="phone">Contact No.</label>
                                <input class="form-control" type="tel" name="phone" value="{{ $user->phone }}">
                            </div>

                            <div class="form-group d-flex flex-column flex-fill">
                                <label class="form-label" for="email">Email Address</label>
                                <input class="form-control" type="email" name="email" value="{{ $user->email }}">
                            </div>
                        </div>

                        <label class="form-label" for="location">Address</label>
                        <input class="form-control mb-4" type="text" name="location" value="{{ $user->address }}">

                        <div class="d-flex w-100 justify-content-end">
                            <button class="btn btn-primary w-25" type="submit">Save Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function previewThumbnail (input) {
                if (input.files && input.files[0]) {
                    const file = input.files[0];
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        const previewer = document.getElementById('profile-thumbnail-img');
                        previewer.src = e.target.result;
                    }

                    reader.readAsDataURL(file);
                }
            }
        </script>
    </body>
</html>