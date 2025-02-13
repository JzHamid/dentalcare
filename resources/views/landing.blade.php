<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <title>DentalCare</title>

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

    <nav class="navbar bg-body-secondary top-0 sticky-top">
        <div class="container-fluid px-4">
            <a class="navbar-brand text-default fw-bold" href="{{ route('landing') }}">DentalCare</a>

            @auth
            <div class="d-flex gap-4" style="margin-right: 100px;">
                <div class="dropdown">
                    <!--remove notif button -->

                    <ul class="dropdown-menu dropdown-end">

                    </ul>
                </div>

                <div class="dropdown d-flex">
                    <button class="btn dropdown-toggle fs-4 p-0 px-2 shadow-none border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi-person-circle"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-end shadow-sm border-0">
                        <li><a class="dropdown-item" href="{{ route('user' ) }}">My Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
            @endauth

            @guest
            <a class="text-default text-decoration-none fw-bold" style="margin-right: 100px;" href="{{ route('login') }}">Login / Signup</a>
            @endguest
        </div>
    </nav>

    <div class="row" id="home">
        <div class="col p-5 m-5">
            <h1 class="display-4 text-default">SHINE YOUR SMILE<br>WITH US<br>YOUR REASON TO<br>SMILE</h1>
            <p class="lead mb-5">Schedule your next dental visit with ease<br>using our online appointment system.</p>

            <a class="btn btn-default mb-4 w-25" href="{{ route('listing') }}">Book Now!</a>

            <form class="input-group">
                @csrf

                <input class="form-control rounded-start" type="search" placeholder="Search Doctors, Clinic, and Services">
                <button class="btn btn-default">Search</button>
                </for>
        </div>

        <div class="col mt-5 p-4">
            <img src="{{ asset('images/okok.png') }}" style="box-sizing: cover; height: 500px;" alt="Responsive image">
        </div>
    </div>

    <div class="container-fluid bg-light p-5 mb-5" id="services">
        <h1 class="text-default text-center mb-5 fw-bold">SERVICES</h1>

        @foreach ($services->chunk(3) as $serviceRow)
        <div class="row d-flex px-5 mb-5 justify-content-center gap-5">
            @foreach ($serviceRow as $service)
            <div class="col-md-3 rounded shadow-sm p-4 gap-3 d-flex flex-column">
                <img style="height: 200px; width: 300px; border-radius: 5px;" class="img-fluid d-block mx-auto" src="{{ asset('/' . $service->image_path) }}">
                <h5 class="text-center fw-bold text-default">{{ $service->name }} <br><span class="fs-6 fw-semibold text-muted">Starting at ₱{{ $service->price_start }}.00</span></h5>
                <p style="text-align: justify;">{{ $service->description }}</p>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>

    <div class="container-fluid mb-5">
        <h1 class="text-default text-center mb-5 fw-bold">WHY WE ARE DIFFERENT</h1>

        <div class="row d-flex px-5 gap-3">
            <div class="col rounded shadow-sm p-4">
                @if(isset($service) && $service->image_path && file_exists(public_path('storage/' . $service->image_path)))
                <img style="height: 200px;" class="img-fluid d-block mx-auto" src="{{ asset('storage/' . $service->image_path) }}">
                @else
                <img style="height: 200px;" class="img-fluid d-block mx-auto" src="{{ asset('services_image/accessability.png') }}">
                @endif
                <h5 class="text-center">Comprehensive Access</h5>
                <p style="text-align: justify;">We connect you to a wide range of trusted dental clinics in downtown Zamboanga City. Whether you're looking for routine cleaning, orthodontics, or specialized treatments, you'll find the right clinic with just a few clicks</p>
            </div>

            <div class="col rounded shadow-sm p-4">
                @if(isset($service) && $service->image_path && file_exists(public_path('storage/' . $service->image_path)))
                <img style="height: 200px;" class="img-fluid d-block mx-auto" src="{{ asset('storage/' . $service->image_path) }}">
                @else
                <img style="height: 200px;" class="img-fluid d-block mx-auto" src="{{ asset('services_image/data.png') }}">
                @endif <h5 class="text-center">Realtime Availability</h5>
                <p style="text-align: justify;">With our seamless booking system, you can see real-time appointment availability for each clinic. No need to call multiple places—schedule an appointment whenever it’s convenient for you, instantly.</p>
            </div>

            <div class="col rounded shadow-sm p-4">
                @if(isset($service) && $service->image_path && file_exists(public_path('storage/' . $service->image_path)))
                <img style="height: 200px;" class="img-fluid d-block mx-auto" src="{{ asset('storage/' . $service->image_path) }}">
                @else
                <img style="height: 200px;" class="img-fluid d-block mx-auto" src="{{ asset('services_image/price-tag.png') }}">
                @endif <h5 class="text-center">Price Transparency</h5>
                <p style="text-align: justify;">Compare prices across clinics before making a decision. We provide upfront information on costs for services like cleaning, fillings, crowns, and more, so there are no surprises when it comes time to pay.</p>
            </div>

            <div class="col rounded shadow-sm p-4">
                @if(isset($service) && $service->image_path && file_exists(public_path('storage/' . $service->image_path)))
                <img style="height: 200px;" class="img-fluid d-block mx-auto" src="{{ asset('storage/' . $service->image_path) }}">
                @else
                <img style="height: 200px;" class="img-fluid d-block mx-auto" src="{{ asset('services_image/personalization.png') }}">
                @endif <h5 class="text-center">Tailored For You</h5>
                <p style="text-align: justify;">Whether you're booking for yourself, a family member, or even multiple people at once, our platform makes it easy to manage all your appointments in one place.</p>
            </div>
        </div>
    </div>

    <div class="row p-5" id="faqp">
        <div class="col">

        </div>

        <div class="col">
            <div class="accordion accordion-flush shadow-sm" id="faq">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="false" aria-controls="faqOne">
                            How do I book appointment with the dentist?
                        </button>
                    </h2>

                    <div class="accordion-collapse collapse " id="faqOne" data-bs-parent="#faq">
                        <div class="accordion-body">
                        To book an appointment, first you need to log in or create an account if you don't have one. After that, click the "book now" button, and then it will show you the available clinic. Choose a clinic, then fill out the form, and it's done.                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false" aria-controls="faqTwo">
                            Can I request a specific dentist when booking an appointment?
                        </button>
                    </h2>

                    <div class="accordion-collapse collapse" id="faqTwo" data-bs-parent="#faq">
                        <div class="accordion-body">
                            Yes, you can request a specific dentist when booking your appointment. Simply select the name of the dentist you prefer when filling out the form. 
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree" aria-expanded="false" aria-controls="faqThree">
                            What should I do if I need to cancel or reschedule my appointment?
                        </button>
                    </h2>

                    <div class="accordion-collapse collapse" id="faqThree" data-bs-parent="#faq">
                        <div class="accordion-body">
                            If you need to cancel or reschedule your appointment, please contact us as soon as possible. You can call our office or reschedule through our website or mobile app. We kindly ask for at least 24 hours' notice to avoid cancellation fees.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="row bg-body-secondary bottom-0 p-4">
        <div class="col">
            <h5 class="text-default fw-bold">DentalCare</h5>
            <p style="text-align: justify;">Your health is our mission partner with us for exceptional healthcare, Schedule your appointment today and experience the difference of exceptional healthcare.</p>
        </div>

        <div class="col">
            <h5 class="text-center fw-bold">Quick Links</h5>
            <div class="d-flex flex-column align-items-center">
                <a href="#home" class="text-decoration-none fw-bold">Home</a>
                <a href="#services" class="text-decoration-none fw-bold">Services</a>
                <a href="#faqp" class="text-decoration-none fw-bold">FAQ</a>
            </div>
        </div>

        <div class="col">
            <h5 class="fw-bold mb-3">Contact Us</h5>
            <ul class="list-unstyled">
                <li class="mb-1">
                    <i class="bi bi-telephone me-2"></i>
                    <span class="fw-bold">Phone:</span> +63 123 456 7890
                </li>
                <li>
                    <i class="bi bi-envelope me-2"></i>
                    <span class="fw-bold">Email:</span> dentalcare@gmail.com
                </li>
            </ul>
        </div>


        <div class="col">
            <h5 class="text-center fw-bold">Follow Us</h5>
        </div>
    </footer>
</body>

</html>