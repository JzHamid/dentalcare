<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

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
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <nav class="navbar bg-body-secondary">
        <div class="container-fluid px-4">
            <a class="navbar-brand text-default fw-bold" href="{{ route('landing') }}">DentalCare</a>

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
            <a class="text-default text-decoration-none" style="margin-right: 100px;" href="{{ route('login') }}">Login / Signup</a>
            @endguest
        </div>
    </nav>

    <div class="container-fluid p-4">
        <a class="btn btn-secondary" href="{{ URL::previous() }}">Return</a>

        <form class="d-flex flex-column mx-auto w-50" action="{{ route('create.appointment', $shop->id) }}" method="post" id="app-form">
            @csrf

            <h1 class="display-5 text-center mb-4">Appointment Form</h1>

            <div class="form-group mb-4">
                <label class="form-label" for="whofor">Who is this appointment for?</label>
                <select class="form-select" name="whofor" id="whofor" onchange="show_button()" required>
                    <option value="0">For Myself</option>
                    <option value="1">For Others</option>
                    <option value="2" disabled>For Multiple People</option>
                </select>
            </div>

            <div class="d-flex flex-column gap-2" id="patient-list">
                <div class="d-flex flex-column rounded shadow p-4 mb-4 gap-3 box" id="patient-box">
                    <button class="btn btn-close align-self-end visually-hidden" onclick="delete_patient(this)" id="btn-close"></button>

                    <div class="d-flex gap-2 mb-2">
                        <div class="form-group w-100">
                            <label class="form-label" for="appointments[0][fname]">First Name</label>
                            <input class="form-control" type="text" name="appointments[0][fname]" value="{{ $user->fname }}" id="fname" required>
                        </div>

                        <div class="form-group w-100">
                            <label class="form-label" for="appointments[0][mname]">Middle Name</label>
                            <input class="form-control" type="text" name="appointments[0][mname]" value="{{ $user->mname ?? '' }}" id="mname">
                        </div>

                        <div class="form-group w-100">
                            <label class="form-label" for="appointments[0][lname]">Last Name</label>
                            <input class="form-control" type="text" name="appointments[0][lname]" value="{{ $user->lname }}" required id="lname">
                        </div>
                    </div>

                    <div class="d-flex gap-2 mb-2">
                        <div class="form-group w-100">
                            <label class="form-label" for="appointments[0][email]">Email Address</label>
                            <input class="form-control" type="email" name="appointments[0][email]" value="{{ $user->email }}" required id="email">
                        </div>

                        <div class="form-group w-100">
                            <label class="form-label" for="appointments[0][contact]">Contact No.</label>
                            <input class="form-control" type="tel" name="appointments[0][contact]" value="{{ $user->phone }}" required id="phone">
                        </div>

                        <div class="form-group w-50">
                            <label class="form-label" for="appointments[0][sex]">Sexuality</label>
                            <select class="form-select" name="appointments[0][sex]" id="sex">
                                <option selected disabled>-- Select --</option>
                                <option value="0" @selected($user->gender == 0)>Male</option>
                                <option value="1" @selected($user->gender == 1)>Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group visually-hidden" id="birthdate">
                        <label class="form-label" for="birthdate">Birthdate</label>
                        <input class="form-control" type="date" name="appointments[0][birthdate]">
                    </div>

                    <div class="form-group mb-2">
                        <label class="form-label" for="appointments[0][service]">Type of Service</label>
                        <div class="input-group">
                            <div class="dropdown w-100">
                                <button class="btn btn-outline-secondary dropdown-toggle w-100"
                                    type="button" id="serviceDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    -- Select Services --
                                </button>
                                <ul class="dropdown-menu w-100" aria-labelledby="serviceDropdown">
                                    @foreach ($availables as $available)
                                    <li>
                                        <label class="dropdown-item">
                                            <input type="checkbox" class="form-check-input me-2 service-checkbox" name="appointments[0][services][]"
                                                value="{{ $available->service->id }}" data-service="{{ $available->service->name }}">
                                            {{ $available->service->name }}
                                        </label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div id="services-date-container" class="d-flex flex-column"></div>

                        @php
                        $availableDays = $schedules->pluck('day')->map(function ($day) {
                        return strtolower($day);
                        })->toArray();
                        @endphp

                        <script>
                            const availableDays = @json($availableDays);

                            function initializeDatePickers() {
                                document.querySelectorAll('.service-date').forEach((dateInput) => {
                                    flatpickr(dateInput, {
                                        dateFormat: 'Y-m-d H:i',
                                        enableTime: true,
                                        enable: [
                                            function(date) {
                                                const dayNames = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
                                                const dayName = dayNames[date.getDay()];
                                                return availableDays.includes(dayName);
                                            }
                                        ],
                                        minDate: 'today',
                                        maxDate: new Date(new Date().getFullYear(), 11, 31),
                                    });
                                });
                            }

                            document.querySelectorAll('.service-checkbox').forEach((checkbox) => {
                                checkbox.addEventListener('change', (e) => {
                                    const serviceName = e.target.getAttribute('data-service');
                                    const servicesDateContainer = document.getElementById('services-date-container');
                                    const serviceId = e.target.value;

                                    if (e.target.checked) {
                                        // Add date picker for the selected service
                                        const serviceDateDiv = document.createElement('div');
                                        serviceDateDiv.classList.add('mb-3');
                                        serviceDateDiv.innerHTML = `
                <label class="form-label" for="appointments[0][time][${serviceId}]">Select date for ${serviceName}</label>
                <input class="form-control service-date" type="text" name="appointments[0][time][${serviceId}]" placeholder="Select a date for ${serviceName}">
            `;
                                        servicesDateContainer.appendChild(serviceDateDiv);

                                        initializeDatePickers();
                                    } else {
                                        const serviceDateDiv = servicesDateContainer.querySelector(`input[name="appointments[0][time][${serviceId}]"]`).parentElement;
                                        if (serviceDateDiv) {
                                            serviceDateDiv.remove();
                                        }
                                    }
                                });
                            });
                        </script>

                        @if ($errors->any())
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                alert('{{ $errors->first() }}');
                            });
                        </script>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="appointments[0][dentist]">Dentist</label>
                        <select class="form-select" name="appointments[0][dentist]" required>
                            <option selected disabled>-- Select Dentist --</option>
                            <option value="0">Any</option>
                            @foreach ($assign as $assi)
                            <option value="{{ $assi->user->id }}">{{ $assi->user->fname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="justify-content-center mb-4 w-100" style="display: none;" id="btn-add">
                <button class="btn btn-success w-50" type="button" onclick="add_patient()">
                    <i class="bi-plus-lg"></i>
                    Add Person
                </button>
            </div>

            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" name="terms" required>
                <label class="form-check-label" for="terms">By checking this box you agree to share your medical history with all clinic branches</label>
            </div>

            <button class="btn btn-primary mb-5" type="submit">Book</button>
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
        function show_button() {
            const select = document.getElementById('whofor');
            const buttonDiv = document.getElementById('btn-add');
            const xButton = document.getElementById('btn-close');

            if (select.value === '2') {
                buttonDiv.style.display = 'flex';
                xButton.classList.remove('visually-hidden');
            } else {
                buttonDiv.style.display = 'none';
                xButton.classList.add('visually-hidden');

                if (select.value == 1) {
                    document.getElementById('fname').value = '';
                    document.getElementById('mname').value = '';
                    document.getElementById('lname').value = '';
                    document.getElementById('email').value = '';
                    document.getElementById('phone').value = '';
                    document.getElementById('sex').value = '';

                    document.getElementById('birthdate').classList.remove('visually-hidden');
                } else {
                    document.getElementById('birthdate').classList.add('visually-hidden');
                }
            }
        }

        function add_patient() {
            const box = document.getElementById('patient-box');
            const clone = box.cloneNode(true);
            const patientCount = document.querySelectorAll('.box').length;

            clone.id = 'patient-box' + patientCount;
            const inputs = clone.querySelectorAll('input, select');
            inputs.forEach(input => {
                const name = input.name.replace(/\[0\]/, `[${patientCount}]`);
                input.name = name;
                input.id = name;
            });

            document.getElementById('patient-list').appendChild(clone);
            document.getElementById('btn-add').style.display = 'flex';
        }

        function delete_patient(button) {
            const box = button.closest('.box');
            box.remove();
        }

        document.addEventListener('DOMContentLoaded', function() {
            const serviceCheckboxes = document.querySelectorAll('.service-checkbox');
            const dateInputsContainer = document.getElementById('dateInputs');

            serviceCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    updateDateInputs();
                });
            });

            function updateDateInputs() {
                dateInputsContainer.innerHTML = '';
                serviceCheckboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        const serviceName = checkbox.dataset.serviceName;
                        const serviceId = checkbox.value;
                        const dateInput = createDateInput(serviceName, serviceId);
                        dateInputsContainer.appendChild(dateInput);
                    }
                });
            }

            function createDateInput(serviceName, serviceId) {
                const div = document.createElement('div');
                div.className = 'form-group mb-2';
                div.innerHTML = `
            <label class="form-label" for="appointments[0][time][${serviceId}]">${serviceName} Date</label>
            <input class="form-control" type="text" id="schedule_${serviceId}" name="appointments[0][time][${serviceId}]" placeholder="Select a date for ${serviceName}">
        `;
                return div;
            }
        });
    </script>
</body>

</html>