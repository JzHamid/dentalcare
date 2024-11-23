<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <title>DentalCare | Signup</title>

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
    
        <nav class="navbar bg-body-secondary">
            <div class="container-fluid px-4">
                <a class="navbar-brand text-default fw-bold" href="">DentalCare</a>
            </div>
        </nav>

        <div class="container-fluid p-0">
            <img class="w-100" style="object-fit: cover; height: 700px;" src="{{ asset('images/dentist_office.jpg') }}">

            <form class="d-flex flex-column position-absolute w-50 gap-2" style="top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 10; padding: 20px;" action="{{ route('create.account') }}" method="post">
                @csrf

                <h2 class="text-default text-center m-0">SIGNUP</h2>
                <h5 class="lead text-center mb-3">CREATE YOUR PERSONAL ACCOUNT</h5>

                <div class="d-flex gap-2">
                    <div class="form-group container-fluid p-0">
                        <label class="form-label m-0" for="fname">First Name</label>
                        <input class="form-control" name="fname" type="text" placeholder="First Name" required>
                    </div>

                    <div class="form-group container-fluid p-0">
                        <label class="form-label m-0" for="mname">Middle Name</label>
                        <input class="form-control" name="mname" type="text" placeholder="Middle Name">
                    </div>
    
                    <div class="form-group container-fluid p-0">
                        <label class="form-label m-0" for="lname">Last Name</label>
                        <input class="form-control" name="lname" type="text" placeholder="Last Name" required>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <div class="form-group container-fluid p-0">
                        <label class="form-label m-0" for="birth">Date of Birth</label>
                        <input class="form-control" name="birth" type="date" required>
                    </div>

                    <div class="form-group container-fluid p-0">
                        <label class="form-label m-0" for="sexuality">Sexuality</label>
                        <select class="form-select" name="sexuality" required>
                            <option selected disabled>-- Select --</option>
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex gap-2 w-100">
                    <div class="form-group container-fluid p-0">
                        <label class="form-label m-0" for="phone">Contact No.</label>
                        <input class="form-control" type="tel" name="phone" placeholder="Contact No." required>
                    </div>

                    <div class="form-group container-fluid p-0">
                        <label class="form-label m-0" for="email">Email Address</label>
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label m-0" for="address">Address</label>
                    <input class="form-control" type="text" name="address" placeholder="Address" required>
                </div>

                <div class="form-group">
                    <label class="form-label m-0" for="password">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>

                <div class="form-group">
                    <label class="form-label m-0" for="password_confirmation">Confirm Password</label>
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                </div>

                <div class="d-flex gap-2 mb-3">
                    <input type="checkbox" name="terms" id="terms" required>
                    <label for="terms">I agree to the terms and condition and privacy policy</label>
                </div>

                <button class="btn btn-default align-self-center w-50" id="btn-create" disabled>Create Account</button>

                @if ($errors->any())
                    <h1>{{ $errors }}</h1>
                @endif
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

        <script>
            const terms = document.getElementById('terms');

            terms.addEventListener('change', function() {
                document.getElementById('btn-create').disabled = !terms.checked;
            });
        </script>
    </body>
</html>