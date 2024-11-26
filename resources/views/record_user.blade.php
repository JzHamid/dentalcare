<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

        <title>DentalCare | Appointment</title>

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

                <div class="d-flex gap-4" style="margin-right: 100px;">
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
            </div>
        </nav>

        <div class="container-fluid p-4">
            <a class="btn btn-secondary" href="{{ '/user-profile' }}">Return</a>
            
            
        </div>

        <script>
            function change_status (value) {
                const status = document.getElementById('status');
                const form = document.getElementById('status-form');

                status.value = value;
                form.submit();
            }
        </script>
    </body>
</html>