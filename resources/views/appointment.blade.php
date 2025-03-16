<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <title>DentalCare | Book Appointment</title>
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

        /* Form styling */
        .form-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin: 30px auto;
            max-width: 800px;
        }

        .form-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-label {
            font-weight: 500;
            color: var(--text-color);
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            padding: 10px 15px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            transition: all 0.3s;
            font-size: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 93, 149, 0.2);
        }

        /* Patient box styling */
        .patient-box {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
            transition: all 0.3s;
        }

        .patient-box:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Button styling */
        .btn {
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 93, 149, 0.2);
        }

        .btn-success {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }

        .btn-success:hover {
            background-color: #3d8b40;
            border-color: #3d8b40;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.2);
        }

        .btn-secondary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(108, 117, 125, 0.2);
        }

        /* Service selection styling */
        .service-date-display {
            background-color: white;
            cursor: pointer;
        }

        .service-checkbox:checked+label {
            background-color: var(--primary-light);
            color: var(--primary-color);
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

        /* SweetAlert customization */
        .blue-swal {
            background-color: #f0f8ff !important;
            border: 2px solid var(--primary-color) !important;
        }

        .blue-swal .swal2-title {
            color: var(--primary-color) !important;
            font-family: 'Poppins', sans-serif;
        }

        .blue-swal .swal2-content {
            color: var(--text-color) !important;
            font-family: 'Poppins', sans-serif;
        }

        .blue-swal .btn-primary {
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
            color: white !important;
            font-family: 'Poppins', sans-serif;
            border-radius: 8px;
        }

        .blue-swal .btn-primary:hover {
            background-color: var(--primary-dark) !important;
            border-color: var(--primary-dark) !important;
        }

        .slot {
            padding: 10px;
            margin: 5px;
            display: inline-block;
            border: 1px solid #ccc;
            text-align: center;
            border-radius: 5px;
            width: 150px;
            height: 50px;
            line-height: 1.2;
            font-size: 14px;
        }

        .slot.available {
            background-color: #d4edda;
            cursor: pointer;
        }

        .slot.booked {
            background-color: #f8d7da;
            cursor: not-allowed;
        }

        .slot.selected {
            border-color: #28a745;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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
            <a class="btn btn-outline-primary" href="{{ route('login') }}">
                <i class="bi bi-box-arrow-in-right me-2"></i>Login / Signup
            </a>
            @endguest
        </div>
    </nav>

    <div class="container mt-4">
        <a class="btn btn-secondary" href="{{ URL::previous() }}">
            <i class="bi bi-arrow-left me-2"></i>Return
        </a>
    </div>

    <div class="container form-container">
        <form class="d-flex flex-column" action="{{ route('create.appointment', $shop->id) }}" method="post" id="app-form">
            @csrf

            <h1 class="form-title"><span class="fw-bold">{{ $shop->name }}</span> Appointment Form</h1>

            <div class="form-group mb-4">
                <label class="form-label" for="whofor">Who is this appointment for?</label>
                <select class="form-select" name="whofor" id="whofor" onchange="show_button()" required>
                    <option value="0">For Myself</option>
                    <option value="1">For Others</option>
                    <option value="2">For Multiple People</option>
                </select>
            </div>

            <div class="d-flex flex-column gap-2" id="patient-list">
                <div class="d-flex flex-column patient-box gap-3 box" id="patient-box">
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
                            <label class="form-label" for="appointments[0][sex]">Sex</label>
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
                                <button class="btn btn-outline-primary dropdown-toggle w-100"
                                    type="button" id="serviceDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    -- Select Services --
                                </button>
                                <ul class="dropdown-menu w-100" aria-labelledby="serviceDropdown">
                                    @foreach ($availables as $available)
                                    <li>
                                        <label class="dropdown-item">
                                            <input type="checkbox" class="form-check-input me-2 service-checkbox"
                                                name="appointments[0][services][]"
                                                value="{{ $available->service->id }}"
                                                data-service="{{ $available->service->name }}"
                                                data-duration="{{ $available->service->duration }}">
                                            {{ $available->service->name }}
                                        </label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div id="services-date-container" class="d-flex flex-column mt-3"></div>

                        @php
                        $availableDays = $schedules->pluck('day')->map(fn($day) => strtolower($day))->toArray();
                        @endphp

                        <script>
                            const availableDays = @json($availableDays);
                            const clinicSchedules = @json($schedules);
                            // Global variable containing all booked appointments (retrieved from your appointments table)
                            const bookedAppointments = @json($bookedAppointments);

                            // Returns the schedule for a given day name (in lowercase, e.g., "monday")
                            function getScheduleForDay(day) {
                                return clinicSchedules.find(schedule => schedule.day.toLowerCase() === day);
                            }

                            // Generate time slots between startTime and endTime using the given duration (in minutes).
                            // Each slot includes a raw time (24‑hour format) and display times (12‑hour format).
                            function generateTimeSlots(startTime, endTime, duration) {
                                let slots = [];
                                let current = moment(startTime, 'HH:mm:ss');
                                const end = moment(endTime, 'HH:mm:ss');
                                while (true) {
                                    let rawStart = current.format('HH:mm');
                                    let rawEnd = current.clone().add(duration, 'minutes').format('HH:mm');
                                    let displayStart = current.format('hh:mm A');
                                    let displayEnd = current.clone().add(duration, 'minutes').format('hh:mm A');
                                    if (current.clone().add(duration, 'minutes').isAfter(end)) break;
                                    slots.push({
                                        start: rawStart,
                                        end: rawEnd,
                                        displayStart: displayStart,
                                        displayEnd: displayEnd
                                    });
                                    current.add(duration, 'minutes');
                                }
                                return slots;
                            }

                            // This function updates the time slots container for the given service on the selected date.
                            // It now checks the bookedAppointments variable (populated from the database) for any existing appointments.
                            async function updateTimeSlots(serviceId, date, duration) {
                                let dayName = moment(date).format('dddd').toLowerCase();
                                let schedule = getScheduleForDay(dayName);
                                const container = document.getElementById(`time-slots-${serviceId}`);
                                if (!schedule) {
                                    container.innerHTML = '<p>No schedule available for this day.</p>';
                                    return;
                                }
                                let slots = generateTimeSlots(schedule.start, schedule.end, duration);
                                let bookedTimes = await fetchBookedTimes(serviceId, date);
                                container.innerHTML = '';
                                slots.forEach(slot => {
                                    let isBooked = bookedTimes.includes(slot.start);
                                    let slotDiv = document.createElement('div');
                                    slotDiv.classList.add('slot');
                                    slotDiv.style.padding = '5px';
                                    slotDiv.style.margin = '2px';
                                    slotDiv.style.display = 'inline-block';
                                    slotDiv.style.border = '1px solid #ccc';
                                    slotDiv.style.cursor = isBooked ? 'not-allowed' : 'pointer';
                                    slotDiv.style.backgroundColor = isBooked ? '#f8d7da' : '#d4edda';
                                    // Display the nicely formatted time slot using 12-hour time.
                                    slotDiv.textContent = `${slot.displayStart} - ${slot.displayEnd}` + (isBooked ? ' (Booked)' : ' (Available)');
                                    if (!isBooked) {
                                        slotDiv.addEventListener('click', function() {
                                            // When an available slot is clicked, set the corresponding hidden input value using raw time.
                                            let hiddenInput = document.querySelector(`input[name="appointments[0][time][${serviceId}]"]`);
                                            hiddenInput.value = date + 'T' + slot.start;
                                            // Optionally, visually highlight the selected slot.
                                            container.querySelectorAll('.slot').forEach(el => el.style.borderColor = '#ccc');
                                            slotDiv.style.borderColor = '#28a745';
                                        });
                                    }
                                    container.appendChild(slotDiv);
                                });
                            }

                            // Updated: Use rescheduled_time if available and explicitly parse using the correct format.
                            function fetchBookedTimes(serviceId, date) {
                                const appointmentsForService = bookedAppointments.filter(appt => {
                                    let effectiveTime = appt.rescheduled_time ? appt.rescheduled_time : appt.appointment_time;
                                    return appt.service_id == serviceId && moment(effectiveTime, "YYYY-MM-DD HH:mm:ss").format('YYYY-MM-DD') === date;
                                });
                                const bookedTimes = appointmentsForService.map(appt => {
                                    let effectiveTime = appt.rescheduled_time ? appt.rescheduled_time : appt.appointment_time;
                                    return moment(effectiveTime, "YYYY-MM-DD HH:mm:ss").format('HH:mm');
                                });
                                return Promise.resolve(bookedTimes);
                            }

                            // Initialize flatpickr date pickers for all inputs with class "service-date-display"
                            function initializeDatePickers() {
                                document.querySelectorAll('.service-date-display').forEach((displayInput) => {
                                    flatpickr(displayInput, {
                                        dateFormat: 'l, F j',
                                        enableTime: false,
                                        enable: [
                                            function(date) {
                                                const dayNames = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
                                                return availableDays.includes(dayNames[date.getDay()]);
                                            }
                                        ],
                                        minDate: 'today',
                                        maxDate: new Date(new Date().getFullYear(), 11, 31),
                                        onChange: function(selectedDates, dateStr, instance) {
                                            let hiddenInput = instance.input.nextElementSibling; // Get the hidden input
                                            if (hiddenInput) {
                                                let formattedDate = moment(selectedDates[0]).format('YYYY-MM-DD');
                                                hiddenInput.value = formattedDate;
                                                // Get the service id and duration from data attributes on the input.
                                                let serviceId = instance.input.getAttribute('data-service-id');
                                                let duration = parseInt(instance.input.getAttribute('data-duration'));
                                                // Ensure a time slots container exists.
                                                let containerId = `time-slots-${serviceId}`;
                                                let container = document.getElementById(containerId);
                                                if (!container) {
                                                    container = document.createElement('div');
                                                    container.id = containerId;
                                                    instance.input.parentElement.appendChild(container);
                                                }
                                                updateTimeSlots(serviceId, formattedDate, duration);
                                            }
                                        }
                                    });
                                });
                            }

                            // When a service checkbox is checked or unchecked, add or remove its date picker block.
                            document.querySelectorAll('.service-checkbox').forEach((checkbox) => {
                                checkbox.addEventListener('change', (e) => {
                                    const serviceName = e.target.getAttribute('data-service');
                                    const serviceDuration = e.target.getAttribute('data-duration');
                                    const servicesDateContainer = document.getElementById('services-date-container');
                                    const serviceId = e.target.value;

                                    if (e.target.checked) {
                                        // Append a block for date selection and time slots for the chosen service.
                                        const serviceDateDiv = document.createElement('div');
                                        serviceDateDiv.classList.add('mb-3');
                                        serviceDateDiv.innerHTML = `
                        <label class="form-label" for="appointments[0][time][${serviceId}]">
                            Select date for ${serviceName}
                        </label>
                        <input class="form-control service-date-display" type="text" placeholder="Select a date for ${serviceName}" data-service-id="${serviceId}" data-duration="${serviceDuration}">
                        <input class="service-date-hidden" type="hidden" name="appointments[0][time][${serviceId}]">
                        <div class="time-slots" id="time-slots-${serviceId}" style="margin-top:10px;"></div>
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

                            document.getElementById('app-form').addEventListener('submit', function(e) {
                                e.preventDefault();

                                const form = this;
                                const formData = new FormData(form);

                                fetch(form.action, {
                                        method: 'POST',
                                        body: formData,
                                        headers: {
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                            'Accept': 'application/json'
                                        }
                                    })
                                    .then(response => {
                                        console.log('Raw response:', response); // Log the response object
                                        return response.json(); // Parse it to JSON
                                    })
                                    .then(data => {
                                        console.log('Parsed data:', data); // Log the parsed JSON
                                        const swalConfig = {
                                            customClass: {
                                                popup: 'blue-swal',
                                                confirmButton: 'btn btn-primary'
                                            },
                                            buttonsStyling: false
                                        };

                                        if (data.status === 'success') {
                                            Swal.fire({
                                                ...swalConfig,
                                                icon: 'success',
                                                title: 'Success!',
                                                text: data.message,
                                                confirmButtonText: 'OK'
                                            }).then(() => {
                                                if (data.redirect) {
                                                    window.location.href = data.redirect;
                                                }
                                            });
                                        } else {
                                            Swal.fire({
                                                ...swalConfig,
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: data.message,
                                                confirmButtonText: 'Try Again'
                                            });
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Fetch error:', error); // Log any fetch errors
                                        Swal.fire({
                                            ...swalConfig,
                                            icon: 'error',
                                            title: 'Error',
                                            text: 'Something went wrong. Please try again.',
                                            confirmButtonText: 'OK'
                                        });
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
                            <!-- <option value="0">Any</option> -->
                            @foreach ($assign as $assi)
                            <option value="{{ $assi->user->id }}">Dr. {{ $assi->user->fname }}</option>
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

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="terms" required>
                <label class="form-check-label" for="terms">By checking this box you agree to share your medical history with all clinic branches</label>
            </div>

            <button class="btn btn-default w-100" type="submit">
                <i class="bi bi-calendar-check me-2"></i>Book Appointment
            </button>
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h4 class="footer-title">DentalCare</h4>
                    <p>Your health is our mission. Partner with us for exceptional dental healthcare. Schedule your appointment today and experience the difference of exceptional care.</p>
                    <div class="d-flex gap-3 mt-3">
                        <a href="#" class="text-primary fs-4"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-primary fs-4"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="text-primary fs-4"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-primary fs-4"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-md-3 offset-md-1">
                    <h4 class="footer-title text-center">Quick Links</h4>
                    <div class="footer-links">
                        <a href="#home">Home</a>
                        <a href="#services">Services</a>
                        <a href="#faqp">FAQ</a>
                        <a href="#about">About Us</a>
                        <a href="#contact">Contact</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <h4 class="footer-title">Contact Us</h4>
                    <ul class="list-unstyled footer-contact">
                        <li>
                            <i class="bi bi-geo-alt-fill"></i>
                            <span class="fw-bold">Address:</span> 123 Dental Street, Manila, Philippines
                        </li>
                        <li>
                            <i class="bi bi-telephone-fill"></i>
                            <span class="fw-bold">Phone:</span> +63 123 456 7890
                        </li>
                        <li>
                            <i class="bi bi-envelope-fill"></i>
                            <span class="fw-bold">Email:</span> dentalcare@gmail.com
                        </li>
                        <li>
                            <i class="bi bi-clock-fill"></i>
                            <span class="fw-bold">Hours:</span> Monday - Friday: 8:00 AM - 6:00 PM
                        </li>
                    </ul>
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