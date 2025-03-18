<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <title>DentalCare | Listing</title>
    <style>
        :root {
            --primary-color: #345D95;
            --primary-light: #e8f0fe;
            --primary-dark: #264573;
            --secondary-color: #6c757d;
            --success-color: #4caf50;
            --error-color: #f44336;
            --warning-color: #ff9800;
            --text-color: #333;
            --light-gray: #f8f9fa;
            --border-color: #e0e0e0;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f5f7fa;
        }
        
        .text-default,
        .text-default:hover,
        .text-default:focus,
        .text-default:active {
            color: var(--primary-color);
        }
        
        .btn-default,
        .btn-default:hover,
        .btn-default:focus,
        .btn-default:active {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-default:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 93, 149, 0.2);
        }
        
        .bg-default {
            background-color: var(--primary-color);
        }
        
        /* Navbar styling */
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
            background-color: white !important;
            z-index: 1030;
        }
        
        .navbar-brand {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .dropdown-toggle::after {
            content: none;
        }
        
        .dropdown-menu {
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--border-color);
            padding: 10px;
        }
        
        .dropdown-item {
            border-radius: 6px;
            padding: 8px 15px;
            transition: all 0.2s;
        }
        
        .dropdown-item:hover {
            background-color: var(--primary-light);
            color: var(--primary-color);
        }
        
        /* Content styling */
        .content-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-bottom: 30px;
        }
        
        .shop-header {
            margin-bottom: 20px;
        }
        
        .shop-title {
            color: var(--primary-color);
            font-weight: 800;
            text-transform: uppercase;
        }
        
        .shop-location {
            color: var(--primary-dark);
            font-weight: 600;
        }
        
        .nav-btn {
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
            margin-right: 10px;
        }
        
        .nav-btn:hover {
            background-color: var(--primary-light);
            color: var(--primary-color);
        }
        
        /* Section styling */
        .section-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.3s;
            border: 1px solid var(--border-color);
        }
        
        .section-container:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .section-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 15px;
            text-align: center;
        }
        
        /* Shop image */
        .shop-image {
            height: 250px;
            width: 250px;
            border-radius: 10px;
            object-fit: cover;
            border: 3px solid var(--primary-light);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* Contact info */
        .contact-item {
            margin-bottom: 10px;
        }
        
        .contact-item i {
            color: var(--primary-color);
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        /* Schedule styling */
        .schedule-list {
            list-style: none;
            padding-left: 0;
        }
        
        .schedule-day {
            font-weight: 600;
            color: var(--primary-color);
        }
        
        /* Map styling */
        #map {
            height: 400px;
            width: 100%;
            border-radius: 12px;
            margin: 20px 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        /* Services styling */
        .service-item {
            padding: 15px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .service-item:hover {
            background-color: var(--primary-light);
        }
        
        .service-name {
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 5px;
        }
        
        .service-price {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .service-duration {
            color: var(--secondary-color);
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
        
        /* Dentist styling */
        .dentist-card {
            display: flex;
            gap: 20px;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            transition: all 0.3s;
            border: 1px solid var(--border-color);
        }
        
        .dentist-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-color);
        }
        
        .dentist-image {
            height: 200px;
            width: 200px;
            border-radius: 10px;
            object-fit: cover;
            border: 3px solid var(--primary-light);
        }
        
        .dentist-name {
            color: var(--primary-color);
            font-weight: 700;
        }
        
        .dentist-specialty {
            color: var(--secondary-color);
            font-weight: 500;
        }
        
        /* Footer styling */
        footer {
            background-color: var(--primary-light);
            color: var(--text-color);
            padding: 40px 0;
            margin-top: auto;
        }
        
        .footer-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .footer-links {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .footer-links a {
            color: var(--text-color);
            font-weight: 600;
            text-decoration: none;
            margin-bottom: 10px;
            transition: all 0.2s;
        }
        
        .footer-links a:hover {
            color: var(--primary-color);
        }
        
        .footer-contact li {
            margin-bottom: 10px;
        }
        
        .footer-contact i {
            color: var(--primary-color);
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
    <script src="/js/mapInput.js"></script>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container-fluid px-4">
            <a class="navbar-brand text-default" href="{{ route('landing') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                    <path d="M19 4H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Z"></path>
                    <path d="M16 2v4"></path>
                    <path d="M8 2v4"></path>
                    <path d="M3 10h18"></path>
                    <path d="M8 14h.01"></path>
                    <path d="M12 14h.01"></path>
                    <path d="M16 14h.01"></path>
                    <path d="M8 18h.01"></path>
                    <path d="M12 18h.01"></path>
                    <path d="M16 18h.01"></path>
                </svg>
                DentalCare
            </a>

            @auth
            <div class="d-flex align-items-center gap-3">
                <div class="dropdown">
                    <button class="btn dropdown-toggle fs-5 p-0 px-2 shadow-none border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        @if (Auth::user()->status == 0)
                        <li><a class="dropdown-item" href="{{ route('user') }}">My Profile</a></li>
                        @else
                        <li><a class="dropdown-item" href="{{ route('admin') }}">My Profile</a></li>
                        @endif
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
            @endauth

            @guest
            <div class="d-flex align-items-center gap-2">
                <a class="btn btn-outline-primary" href="{{ route('login') }}">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Signin
                </a>
                <a class="btn btn-outline-primary" href="{{ route('signup') }}">
                    <i class="bi bi-person-plus me-2"></i> Signup
                </a>
            </div>
            @endguest
        </div>
    </nav>

    <div class="container mt-4 mb-4">
        <a class="btn btn-secondary" href="{{ route('listing') }}">
            <i class="bi bi-arrow-left me-2"></i>Return
        </a>
    </div>

    <div class="container content-container">
        <div class="shop-header d-flex justify-content-between align-items-center w-100">
            <div>
                <h1 class="shop-title display-4 fw-bold">{{ $shop->name }}</h1>
                <p class="shop-location lead fw-bold">{{ $shop->location }}</p>
            </div>
            <a class="btn btn-default" href="{{ route('appointment', $shop->id) }}">
                <i class="bi bi-calendar-plus me-2"></i>Book Appointment
            </a>
        </div>

        <div class="d-flex gap-2 mb-4">
            <a class="btn btn-light nav-btn" href="#about">
                <i class="bi bi-info-circle me-2"></i>About
            </a>
            <a class="btn btn-light nav-btn" href="#services">
                <i class="bi bi-clipboard2-pulse me-2"></i>Services
            </a>
            <a class="btn btn-light nav-btn" href="#dentist">
                <i class="bi bi-people me-2"></i>Dentist
            </a>
        </div>

        <hr>

        <div class="d-flex flex-column gap-5" id="about">
            <div class="section-container d-flex mx-auto p-4 gap-3 w-75">
                <img src="{{ asset('/' . $shop->image_path) }}" class="shop-image">

                <div class="d-flex flex-column">
                    <h3 class="m-0 fw-bold text-primary">About Us:</h3>
                    <div class="container-fluid p-0 mb-3">{{ $shop->description }}</div>

                    <h3 class="mb-2 fw-bold text-primary">Contact Information:</h3>
                    <div class="container-fluid d-flex flex-column p-0 ms-2 gap-2">
                        <p class="m-0 contact-item">
                            <i class="bi bi-telephone-fill"></i>
                            {{ $shop->contact }}
                        </p>

                        <p class="m-0 contact-item">
                            <i class="bi bi-envelope-fill"></i>
                            {{ $shop->email }}
                        </p>
                        
                        <!-- Availability (Schedule) -->
                        <p class="fw-bold m-0 mt-3 text-primary">Clinic Hours</p>
                        @if ($shop->schedules->isNotEmpty())
                        <ul class="schedule-list text-muted mb-0">
                            @foreach ($shop->schedules as $schedule)
                            <li>
                                <span class="schedule-day">{{ ucfirst($schedule->day) }}:</span>
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
                </div>
            </div>
            <div class="section-container d-flex flex-column mx-auto p-4 gap-3 w-75" id="services">
                <h4 class="section-title">Services Offered</h4>
                <hr>

                <p class="lead m-0 fw-bold">Discover all that the clinic offers</p>

                <div class="container">
                    @foreach ($availables->chunk(2) as $chunk)
                    <div class="row mb-3">
                        @foreach ($chunk as $available)
                        <div class="col-md-6 p-0">
                            <div class="service-item d-flex flex-column margin-right-2 p-4">
                                <p class="service-name m-0 mb-1">{{ $available->service->name }} </p>
                                <p class="service-price m-0 mb-1">Price starts at ₱{{ number_format($available->service->price_start, 2) }} | 
                                    <span class="service-duration">Duration: {{ floor($available->service->duration / 60) . 'hr ' . ($available->service->duration % 60) . 'm' }}</span>
                                </p>
                                <p>{{ $available->service->description }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="section-container d-flex flex-column mx-auto p-4 gap-3 w-75" id="dentist">
                <h4 class="section-title">Meet our Dentists</h4>
                <hr>

                @foreach ($assigns as $assign)
                <div class="dentist-card">
                    <img src="{{ asset('/' . $assign->user->image_path) }}" class="dentist-image">

                    <div class="d-flex flex-column">
                        <h1 class="dentist-name">Dr. {{ $assign->user->lname . ' ' . $assign->user->fname }}</h1>
                        <p class="dentist-specialty lead">Dental Specialist</p>
                    </div>
                </div>
                @endforeach
                
                @if($assigns->isEmpty())
                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i>No dentists are currently assigned to this clinic.
                </div>
                @endif
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5 class="footer-title">DentalCare</h5>
                    <p style="text-align: justify;">Your health is our mission. Partner with us for exceptional healthcare. Schedule your appointment today and experience the difference of exceptional healthcare.</p>
                </div>

                <div class="col">
                    <h5 class="footer-title text-center">Quick Links</h5>
                    <div class="footer-links">
                        <a href="#home">Home</a>
                        <a href="#services">Services</a>
                        <a href="#faqp">FAQ</a>
                    </div>
                </div>

                <div class="col">
                    <h5 class="footer-title">Contact Us</h5>
                    <ul class="list-unstyled footer-contact">
                        <li>
                            <i class="bi bi-telephone"></i>
                            <span class="fw-bold">Phone:</span> +63 123 456 7890
                        </li>
                        <li>
                            <i class="bi bi-envelope"></i>
                            <span class="fw-bold">Email:</span> dentalcare@gmail.com
                        </li>
                    </ul>
                </div>

                <div class="col">
                    <h5 class="footer-title text-center">Follow Us</h5>
                    <div class="d-flex justify-content-center gap-3 mt-3">
                        <a href="#" class="text-primary fs-4"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-primary fs-4"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="text-primary fs-4"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-primary fs-4"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <hr>
                    <p class="mb-0">&copy; {{ date('Y') }} DentalCare. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script type="text/javascript">

    </script>

</body>

</html>
