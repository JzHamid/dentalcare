<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <title>DentalCare | Browse</title>

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

    <nav class="navbar bg-body-secondary">
        <div class="container-fluid px-4">
            <a class="navbar-brand text-default fw-bold" href="{{ route('landing') }}">DentalCare</a>

            @auth
            <div class="d-flex gap-4">
                <div class="dropdown">
                    <!--remove notif button -->

                    <ul class="dropdown-menu">

                    </ul>
                </div>

                <div class="dropdown d-flex" style="margin-right: 100px;">
                    <button class="btn dropdown-toggle fs-4 p-0 px-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi-person-circle"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-end">
                        @if (Auth::user()->status == 0)
                        <li><a class="dropdown-item" href="{{ route('user' ) }}">My Profile</a></li>
                        @else
                        <li><a class="dropdown-item" href="{{ route('admin' ) }}">My Profile</a></li>
                        @endif

                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
            @endauth

            @guest
            <a class="text-default text-decoration-none" href="{{ route('login') }}">Login / Signup</a>
            @endguest
        </div>
    </nav>

    <form class="container-fluid bg-body-tertiary align-items-center d-flex flex-column shadow-sm p-5 gap-3">
        @csrf

        <div class="input-group w-50">
            <span class="input-group-text">
                <i class="bi-person-fill"></i>
            </span>
            <input class="form-control" type="search" name="doctor" placeholder="Practitioner">

            <span class="input-group-text">
                <i class="bi-geo-alt-fill"></i>
            </span>
            <input class="form-control" type="search" name="place" placeholder="Location">
            <button class="btn btn-secondary" type="submit">Search</button>
        </div>

        <div class="d-flex w-50 gap-3">
            <select class="form-select form-select-sm rounded-pill">
                <option selected disabled>Type of Service</option>
            </select>

            <select class="form-select form-select-sm rounded-pill">
                <option selected disabled>Gender of Practitioner</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <select class="form-select form-select-sm rounded-pill">
                <option selected disabled>Specialty</option>
            </select>
        </div>
    </form>

    <div class="d-flex flex-column align-items-center p-5 gap-4">
        @foreach ($listings as $listing)
        <a class="text-decoration-none text-black d-flex rounded shadow-sm p-4 gap-4 w-75 bg-white align-items-center"
            href="{{ route('shop', $listing->id) }}"
            style="border-radius: 12px; transition: 0.3s ease-in-out;">

            <!-- Clinic Image -->
            <img src="{{ asset('/' . $listing->image_path) }}"
                class="rounded"
                style="height: 180px; width: 180px; object-fit: cover; border-radius: 12px;">

            <!-- Clinic Details -->
            <div class="d-flex flex-column flex-grow-1">
                <h3 class="fw-bold mb-2">{{ $listing->name }}</h3>

                <!-- Offered Services -->
                <p class="fw-bold m-0 text-primary">Offered Services</p>
                <div class="text-muted">
                    @foreach ($listing->availabilities as $available)
                    <span class="badge bg-secondary me-1">{{ $available->service->name }}</span>
                    @endforeach
                </div>

                <!-- Location -->
                <p class="fw-bold m-0 mt-3 text-primary">Location</p>
                <div class="text-muted">{{ $listing->location }}</div>

                <!-- Availability (Schedule) -->
                <p class="fw-bold m-0 mt-3 text-primary">Clinic Hours</p>
                @if ($listing->schedules->isNotEmpty())
                <ul class="list-unstyled text-muted mb-0">
                    @foreach ($listing->schedules as $schedule)
                    <li>{{ ucfirst($schedule->day) }}:
                        <span class="fw-semibold text-dark">
                            {{ date('h:i A', strtotime($schedule->start)) }} - {{ date('h:i A', strtotime($schedule->end)) }}
                        </span>
                    </li>
                    @endforeach
                </ul>
                @else
                <span class="text-danger">No schedule available</span>
                @endif
            </div>
        </a>
        @endforeach
    </div>


    <footer class="row bg-body-secondary bottom-0 p-4 ">
        <div class="col">
            <h5 class="text-default">DentalCare</h5>
            <p style="text-align: justify;">Your health is our mission partner with us for exceptional healthcare, Schedule your appointment today and experience the difference of exceptional healthcare.</p>
        </div>

        <div class="col">
            <h5 class="text-center fw-bold">Quick Links</h5>
            <div class="d-flex flex-column align-items-center">
                <a href="#home" class="text-decoration-none">Home</a>
                <a href="#services" class="text-decoration-none">Services</a>
                <a href="#faqp" class="text-decoration-none">FAQ</a>
            </div>
        </div>

        <div class="col">
            <h5 class="fw-bold">Contact Us</h5>
            <div class="d-flex flex-column">
                <p class="m-0"><span class="fw-medium">Phone: </span>+63 123 456 7890</p>
                <p><span class="fw-medium">Email: </span>dentalcare@gmail.com</p>
            </div>
        </div>

        <div class="col">
            <h5 class="text-center fw-bold">Follow Us</h5>
        </div>
    </footer>
</body>

</html>