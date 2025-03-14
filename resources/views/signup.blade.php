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
            <a class="navbar-brand text-default fw-bold" href="{{ route('login') }}">DentalCare</a>
        </div>
    </nav>

    <div class="container-fluid p-0 vh-100">
        <img class="w-100" style="object-fit: cover; height: 100vh;" src="{{ asset('images/dentist_office.jpg') }}">

        @if (session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3 w-50 text-center shadow-lg" role="alert" style="z-index: 1050;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if ($errors->any())
        <div id="error-alert" class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3 w-50 text-center shadow-lg" role="alert" style="z-index: 1050;">
            <ul class="m-0 p-0" style="list-style: none;">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form class="d-flex flex-column position-absolute w-50 gap-2" style="top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 10; padding: 20px;" action="{{ route('create.account') }}" method="post">
            @csrf

            <h2 class="text-default text-center m-0 mt-5">SIGNUP</h2>
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
                    <label class="form-label m-0" for="sexuality">Sex</label>
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
                <label class="form-label" for="street_name">Street Name</label>
                <input class="form-control" type="text" name="street_name" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="province">Province</label>
                <select class="form-select" id="province" name="province" required>
                    <option value="">Select Province</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="city">City</label>
                <select class="form-select" id="city" name="city" required disabled>
                    <option value="">Select City</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="postal_code">Postal Code</label>
                <input class="form-control" type="text" name="postal_code" required>
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

        document.addEventListener("DOMContentLoaded", function() {
            const provinceSelect = document.getElementById("province");
            const citySelect = document.getElementById("city");

            // Fetch provinces from API
            fetch("https://psgc.gitlab.io/api/provinces/")
                .then(response => response.json())
                .then(provinces => {
                    // Sort provinces alphabetically by name
                    provinces.sort((a, b) => a.name.localeCompare(b.name));

                    provinces.forEach(province => {
                        let option = document.createElement("option");
                        option.value = province.code; // Keep province code as value for fetching cities
                        option.textContent = province.name;
                        option.setAttribute("data-name", province.name); // Store province name in data attribute
                        provinceSelect.appendChild(option);
                    });
                });

            // Fetch cities when a province is selected
            provinceSelect.addEventListener("change", function() {
                let selectedProvinceCode = this.value;
                citySelect.innerHTML = '<option value="">Select City</option>';
                citySelect.disabled = true;

                if (selectedProvinceCode) {
                    fetch(`https://psgc.gitlab.io/api/provinces/${selectedProvinceCode}/cities/`)
                        .then(response => response.json())
                        .then(cities => {
                            if (cities.length > 0) {
                                // Sort cities alphabetically by name
                                cities.sort((a, b) => a.name.localeCompare(b.name));

                                cities.forEach(city => {
                                    let option = document.createElement("option");
                                    option.value = city.name; // Store city name as value
                                    option.textContent = city.name;
                                    citySelect.appendChild(option);
                                });
                                citySelect.disabled = false;
                            } else {
                                let option = document.createElement("option");
                                option.value = "";
                                option.textContent = "No cities found";
                                citySelect.appendChild(option);
                                citySelect.disabled = true;
                            }
                        })
                        .catch(error => {
                            console.error("Error fetching cities:", error);
                            citySelect.disabled = true;
                        });
                }
            });

            // Ensure the correct province name is stored instead of the code
            document.querySelector("form").addEventListener("submit", function(event) {
                let selectedProvince = provinceSelect.options[provinceSelect.selectedIndex];
                let provinceName = selectedProvince.getAttribute("data-name"); // Retrieve province name

                let provinceInput = document.createElement("input");
                provinceInput.type = "hidden";
                provinceInput.name = "province"; // Ensure it matches form field
                provinceInput.value = provinceName; // Store province name instead of code

                this.appendChild(provinceInput);
            });
        });

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
</body>

</html>