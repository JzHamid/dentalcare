<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <title>DentalCare | Login</title>

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
    </style>
</head>

<body class="overflow-x-hidden">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <div class="navbar bg-body-secondary">
        <div class="container-fluid px-4">
            <a class="navbar-brand text-default fw-bold" href="{{ route('landing') }}">DentalCare</a>
        </div>
    </div>

    <div class="container-fluid p-0">
        <img class="w-100" style="object-fit: cover; height: 700px;" src="{{ asset('images/dentist_office.jpg') }}">

        @if (session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3 w-50 text-center shadow-lg" role="alert" style="z-index: 1050;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                setTimeout(function() {
                    let successAlert = document.getElementById("success-alert");
                    if (successAlert) {
                        successAlert.classList.remove("show");
                        successAlert.classList.add("fade");
                    }
                }, 5000); // Auto-hide after 5 seconds
            });
        </script>

        @if (session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3 w-50 text-center shadow-lg" role="alert" style="z-index: 1050;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if ($errors->has('invalid'))
        <div id="error-alert" class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3 w-50 text-center shadow-lg" role="alert" style="z-index: 1050;">
            {{ $errors->first('invalid') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                setTimeout(function() {
                    let successAlert = document.getElementById("success-alert");
                    let errorAlert = document.getElementById("error-alert");

                    if (successAlert) {
                        successAlert.classList.remove("show");
                        successAlert.classList.add("fade");
                    }

                    if (errorAlert) {
                        errorAlert.classList.remove("show");
                        errorAlert.classList.add("fade");
                    }
                }, 5000); // Auto-hide after 5 seconds
            });
        </script>

        <form class="position-absolute w-25" style="top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 10; padding: 20px;" action="{{ route('login.account') }}" method="get">
            @csrf

            <h3 class="text-default text-center fw-bold" style="text-shadow: 1px 2px 3px rgba(255, 255, 255, 0.5)">DentalCare</h3>

            <div class="d-flex flex-column gap-2">
                <input class="form-control" type="text" placeholder="Email" name="email">
                <input class="form-control" type="password" placeholder="Password" name="password">
            </div>

            <div class="d-flex flex-column gap-2">
                <a class="text-end text-decoration-none mb-3 fw-bold" style="font-size: small; color: red;" href="">Forgot Password?</a>
                <button class="btn btn-default fw-bold" type="submit">Login</button>
            </div>

            <hr class="btn-default w-100">

            <div class="d-flex flex-column gap-2">
                <a class="btn btn-default w-100 fw-bold" href="{{ route('signup') }}">Create Account</a>
            </div>
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