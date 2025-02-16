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
        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
        <script src="/js/mapInput.js"></script>


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
                                <li><a class="dropdown-item" href="{{ route('user' ) }}">My Profile</a></li>
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

        <a class="btn btn-secondary ms-4 mt-4" href="{{ route('listing') }}">Return</a>

        <div class="d-flex flex-column bg-white p-5">
            <div class="d-flex justify-content-between align-items-center w-100">
                <h1 class="display-4 fw-bold text-uppercase">{{ $shop->name }}</h1>
                <a class="btn btn-default" style="height: fit-content;" href="{{ route('appointment', $shop->id) }}">Book Apppointment</a>
            </div>

            <p class="lead fw-bold">{{ $shop->location }}</p>

            <div class="d-flex gap-2">
                <a class="btn btn-light fw-bold" href="#about">About</a>
                <a class="btn btn-light fw-bold" href="#services">Services</a>
                <a class="btn btn-light fw-bold" href="#dentist">Dentist</a>
            </div>

            <hr>

            <div class="d-flex flex-column gap-5" id="about">  
                <div class="d-flex mx-auto rounded shadow-sm p-4 gap-3 w-75">
                    <img src="{{ asset('/' . $shop->image_path) }}" style="height: 250px; width: 250px; border-radius: 10px">
                    
                    <div class="d-flex flex-column">
                        <h3></h3>

                        <h3 class="m-0 fw-bold">About Us:</h3>
                        <div class="container-fluid p-0 mb-3">{{ $shop->description }}</div>

                        <h3 class="mb-2 fw-bold">Contact Information:</h3>
                        <div class="container-fluid d-flex flex-column p-0 ms-2 gap-2">
                            <p class="m-0">
                                <i class="bi-telephone-fill"></i>
                                {{ $shop->contact }}
                            </p>

                            <p class="m-0">
                                <i class="bi-envelope-fill"></i>
                                {{ $shop->email }}
                            </p>
                        </div>
                    </div>
                </div>

                <div id="map"></div>

                <div class="d-flex flex-column mx-auto rounded shadow-sm p-4 gap-3 w-75" id="services">
                    <h4 class="text-center w-100 fw-bold">Services Offered</h4>
                    <hr>

                    <p class="lead m-0 fw-bold">Discover all that the clinic offers</p>
                    
                    <div class="container">
                        @foreach ($availables->chunk(2) as $chunk)
                            <div class="row mb-3">
                                @foreach ($chunk as $available)
                                    <div class="col-md-6 p-0">
                                        <div class="d-flex flex-column margin-right-2 p-4">
                                            <p class="fw-bold m-0 mb-1">{{ $available->service->name }} </p>
                                            <p class="fw-bold m-0 mb-1">Price starts at ₱ {{ $available->service->price_start}} | Duration: {{ floor($available->service->duration / 60) . 'hr ' . ($available->service->duration % 60) . 'm' }} </p>
                                            <p>{{ $available->service->description }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="d-flex flex-column mx-auto rounded shadow-sm p-4 gap-3 w-75" id="dentist">
                    <h4 class="text-center w-100 fw-bold">Meet our Dentists</h4>
                    <hr>
                    
                    @foreach ($assigns as $assign)
                        <div class="d-flex shadow-sm rounded gap-4 p-4">
                            <img src="{{ asset('/' . $assign->user->image_path) }}" style="height: 200px; width: 200px; border-radius: 10px;" >

                            <div class="d-flex flex-column">
                                <h1>Dr. {{ $assign->user->lname . ' ' . $assign->user->fname }}</h1>
                                <p class="lead">Dental Specialist</p>
                            </div>
                        </div>
                    @endforeach
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

        <script type="text/javascript">
            function initMap() {
            const myLatLng = { lat: 22.2734719, lng: 70.7512559 };

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 5,
                center: myLatLng,
            });

            new google.maps.Marker({
                position: myLatLng,
                map,
            });
            }

            window.initMap = initMap;
        </script>
    </body>
</html>