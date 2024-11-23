<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

        <title>DentalCare | Listing</title>

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

        <div class="container-fluid p-4">
            <a class="btn btn-secondary" href="{{ URL::previous() }}">Return</a>

            <form class="d-flex flex-column mx-auto w-50" action="" method="post">
                @csrf

                <h1 class="display-5 text-center">Appointment Form</h1>

                <div class="form-group mb-2">
                    <label class="form-label" for="whofor">Who is this appointment for?</label>
                    <select class="form-select" name="whofor" required>
                        <option value="0">For Myself</option>
                        <option value="1">For Others</option>
                    </select>
                </div>

                <div class="d-flex gap-2 mb-2">
                    <div class="form-group w-100">
                        <label class="form-label" for="fname">First Name</label>
                        <input class="form-control" type="text" name="fname" required>
                    </div>

                    <div class="form-group w-100">
                        <label class="form-label" for="mname">Middle Name</label>
                        <input class="form-control" type="text" name="mname">
                    </div>

                    <div class="form-group w-100">
                        <label class="form-label" for="lname">Last Name</label>
                        <input class="form-control" type="text" name="lname" required>
                    </div>
                </div>

                <div class="d-flex gap-2 mb-2">
                    <div class="form-group w-100">
                        <label class="form-label" for="email">Email Address</label>
                        <input class="form-control" type="email" name="email" required>
                    </div>

                    <div class="form-group w-100">
                        <label class="form-label" for="contact">Contact No.</label>
                        <input class="form-control" type="tel" name="contact" required>
                    </div>
                </div>

                <div class="form-group mb-2">
                    <label class="form-label" for="service">Type of Service</label>
                    <select class="form-select" name="service" required>
                        <option selected disabled>-- Select --</option>
                    </select>
                </div>
                
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="terms" required>
                    <label class="form-check-label" for="terms">By checking this box you agree to share your medical history with all clinic branches</label>
                </div>

                <button class="btn btn-primary" type="submit">Book</button>
            </form>
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