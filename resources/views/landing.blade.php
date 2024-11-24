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

        <nav class="navbar bg-body-secondary">
            <div class="container-fluid px-4">
                <a class="navbar-brand text-default fw-bold" href="">DentalCare</a>

                @auth
                    <div class="d-flex gap-4" style="margin-right: 100px;">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle fs-4 p-0 px-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi-bell-fill"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-end">

                            </ul>
                        </div>

                        <div class="dropdown d-flex">
                            <button class="btn dropdown-toggle fs-4 p-0 px-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi-person-circle"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-end">
                                <li><a class="dropdown-item" href="{{ route('user') }}">My Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                @endauth

                @guest
                    <a class="text-default text-decoration-none" style="margin-right: 100px;" href="{{ route('login') }}">Login / Signup</a>
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

            <div class="col">

            </div>
        </div>

        <div class="container-fluid" id="services">
            <h1 class="text-default text-center mb-5">SERVICES</h1>
        </div>

        <div class="container-fluid mb-5">
            <h1 class="text-default text-center mb-5">WHY WE ARE DIFFERENT</h1>

            <div class="row d-flex px-5 gap-3">
                <div class="col rounded shadow-sm p-4">
                    <img style="height: 200px;">
                    <h5 class="text-center">Comprehensive Access</h5>
                    <p style="text-align: justify;">We connect you to a wide range of trusted dental clinics in downtown Zamboanga City. Whether you're looking for routine cleaning, orthodontics, or specialized treatments, you'll find the right clinic with just a few clicks</p>
                </div>

                <div class="col rounded shadow-sm p-4">
                    <img style="height: 200px;">
                    <h5 class="text-center">Realtime Availability</h5>
                    <p style="text-align: justify;">With our seamless booking system, you can see real-time appointment availability for each clinic. No need to call multiple places—schedule an appointment whenever it’s convenient for you, instantly.</p>
                </div>

                <div class="col rounded shadow-sm p-4">
                    <img style="height: 200px;">
                    <h5 class="text-center">Price Transparency</h5>
                    <p style="text-align: justify;">Compare prices across clinics before making a decision. We provide upfront information on costs for services like cleaning, fillings, crowns, and more, so there are no surprises when it comes time to pay.</p>
                </div>

                <div class="col rounded shadow-sm p-4">
                    <img style="height: 200px;">
                    <h5 class="text-center">Tailored For You</h5>
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
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="false" aria-controls="faqOne">
                                How do I book appointment with the dentist?
                            </button>
                        </h2>

                        <div class="accordion-collapse collapse" id="faqOne" data-bs-parent="#faq">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false" aria-controls="faqTwo">
                                Can I request a specific dentist when booking an appointment?
                            </button>
                        </h2>

                        <div class="accordion-collapse collapse" id="faqTwo" data-bs-parent="#faq">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree" aria-expanded="false" aria-controls="faqThree">
                                What should I do if I need to cancel or reschedule my appointment?
                            </button>
                        </h2>

                        <div class="accordion-collapse collapse" id="faqThree" data-bs-parent="#faq">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="row bg-body-secondary bottom-0 p-4">
            <div class="col">
                <h5 class="text-default">DentalCare</h5>
                <p style="text-align: justify;">Your health is our mission partner with us for exceptional healthcare, Schedule your appointment today and experience the difference of exceptional healthcare.</p>
            </div>

            <div class="col">
                <h5 class="text-center fw-bold">Quick Links</h5>
                <div class="d-flex flex-column align-items-center">
                    <a href="#home">Home</a>
                    <a href="#services">Services</a>
                    <a href="#faqp">FAQ</a>
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