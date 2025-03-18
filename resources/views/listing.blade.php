<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <title>DentalCare | Browse</title>
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

        /* Search form styling */
        .search-container {
            background-color: var(--primary-light);
            padding: 30px;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .search-form {
            max-width: 800px;
            margin: 0 auto;
        }

        .search-input-group {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .search-input-group .input-group-text {
            background-color: white;
            border: none;
            color: var(--primary-color);
            font-size: 1.2rem;
        }

        .search-input-group .form-control {
            border: none;
            padding: 12px 15px;
            font-size: 16px;
        }

        .search-input-group .form-control:focus {
            box-shadow: none;
        }

        .search-input-group .btn {
            border-radius: 0;
            padding: 12px 25px;
            font-weight: 600;
        }

        /* Filter selects */
        .filter-select {
            border-radius: 30px;
            padding: 8px 20px;
            border: 2px solid var(--border-color);
            font-size: 14px;
            background-color: white;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
        }

        .filter-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 93, 149, 0.2);
        }

        /* Listing card styling */
        .listing-card {
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
            background-color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-decoration: none;
            color: var(--text-color);
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px;
            margin-bottom: 20px;
            width: 100%;
            max-width: 900px;
        }

        .listing-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-color);
            color: var(--text-color);
        }

        .listing-image {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 12px;
            border: 3px solid var(--primary-light);
        }

        .listing-details {
            flex: 1;
        }

        .listing-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 1.5rem;
        }

        .listing-section {
            margin-bottom: 15px;
        }

        .listing-section-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        .service-badge {
            background-color: var(--primary-light);
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
            font-weight: 500;
            margin-right: 5px;
            margin-bottom: 5px;
            display: inline-block;
        }

        .schedule-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .schedule-item {
            background-color: var(--light-gray);
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 0.85rem;
        }

        .schedule-day {
            font-weight: 600;
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
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: var(--text-color);
            text-decoration: none;
            transition: all 0.2s;
        }

        .footer-links a:hover {
            color: var(--primary-color);
            padding-left: 5px;
        }

        .footer-contact {
            margin-bottom: 5px;
        }

        .footer-contact i {
            color: var(--primary-color);
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: all 0.3s;
        }

        .social-icon:hover {
            transform: translateY(-3px);
            background-color: var(--primary-dark);
            box-shadow: 0 5px 15px rgba(52, 93, 149, 0.3);
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

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

    <!-- Search Section -->
    <div class="search-container mb-5">
        <div class="container">
            <form class="search-form">
                @csrf
                <div class="input-group search-input-group mb-3">
                    <span class="input-group-text">
                        <i class="bi bi-search"></i>
                    </span>
                    <input id="searchAnything" class="form-control" type="search" placeholder="Search anything...">
                </div>
            </form>
        </div>
    </div>


    <!-- Listings Section -->
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4 text-center">Available Dental Clinics</h2>

                <div class="d-flex flex-column align-items-center">
                    @if($listings->isEmpty())
                    <div class="alert alert-info w-100 text-center" role="alert">
                        <i class="bi bi-info-circle me-2"></i>No dental clinics found matching your criteria. Try adjusting your search filters.
                    </div>
                    @endif

                    @foreach ($listings as $listing)
                    <a class="listing-card" href="{{ route('shop', $listing->id) }}">
                        <!-- Clinic Image -->
                        <img src="{{ asset('/' . $listing->image_path) }}" class="listing-image" alt="{{ $listing->name }}">

                        <!-- Clinic Details -->
                        <div class="listing-details">
                            <h3 class="listing-title">{{ $listing->name }}</h3>

                            <!-- Offered Services -->
                            <div class="listing-section">
                                <p class="listing-section-title">Offered Services</p>
                                <div>
                                    @foreach ($listing->availabilities as $available)
                                    <span class="badge service-badge">{{ $available->service->name }}</span>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="listing-section">
                                <p class="listing-section-title">Location</p>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-geo-alt-fill me-2 text-primary"></i>
                                    <span>{{ $listing->barangay }}, {{ $listing->street_address }}</span>
                                </div>
                            </div>

                            <!-- Availability (Schedule) -->
                            <div class="listing-section mb-0">
                                <p class="listing-section-title">Clinic Hours</p>
                                @if ($listing->schedules->isNotEmpty())
                                <ul class="schedule-list">
                                    @foreach ($listing->schedules as $schedule)
                                    <li class="schedule-item">
                                        <span class="schedule-day">{{ ucfirst($schedule->day) }}:</span>
                                        {{ date('h:i A', strtotime($schedule->start)) }} - {{ date('h:i A', strtotime($schedule->end)) }}
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                <span class="text-danger">No schedule available</span>
                                @endif
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h4 class="footer-title">DentalCare</h4>
                    <p>Your health is our mission. Partner with us for exceptional dental healthcare. Schedule your appointment today and experience the difference of exceptional care.</p>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-md-3 offset-md-1">
                    <h4 class="footer-title">Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="#home"><i class="bi bi-chevron-right"></i> Home</a></li>
                        <li><a href="#services"><i class="bi bi-chevron-right"></i> Services</a></li>
                        <li><a href="#faqp"><i class="bi bi-chevron-right"></i> FAQ</a></li>
                        <li><a href="#about"><i class="bi bi-chevron-right"></i> About Us</a></li>
                        <li><a href="#contact"><i class="bi bi-chevron-right"></i> Contact</a></li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h4 class="footer-title">Contact Us</h4>
                    <p class="footer-contact"><i class="bi bi-geo-alt-fill"></i> 123 Dental Street, Manila, Philippines</p>
                    <p class="footer-contact"><i class="bi bi-telephone-fill"></i> +63 123 456 7890</p>
                    <p class="footer-contact"><i class="bi bi-envelope-fill"></i> dentalcare@gmail.com</p>
                    <p class="footer-contact"><i class="bi bi-clock-fill"></i> Monday - Friday: 8:00 AM - 6:00 PM</p>
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchAnything = document.getElementById("searchAnything");
            const clinicCards = document.querySelectorAll(".listing-card");

            function filterClinics() {
                const query = searchAnything.value.trim().toLowerCase();

                clinicCards.forEach(card => {
                    const clinicName = card.querySelector(".listing-title")?.textContent.toLowerCase() || "";
                    const clinicLocation = card.querySelector(".bi-geo-alt-fill + span")?.textContent.toLowerCase() || "";
                    const services = Array.from(card.querySelectorAll(".service-badge")).map(el => el.textContent.toLowerCase()).join(" ");
                    const specialty = card.dataset.specialty?.toLowerCase() || "";
                    const gender = card.dataset.gender?.toLowerCase() || "";

                    const matchesQuery =
                        clinicName.includes(query) ||
                        clinicLocation.includes(query) ||
                        services.includes(query) ||
                        specialty.includes(query) ||
                        gender.includes(query);

                    card.style.display = matchesQuery ? "" : "none";
                });
            }

            searchAnything.addEventListener("input", filterClinics);
        });
    </script>
</body>

</html>