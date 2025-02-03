<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Appointment Rescheduled</h2>
    <p><strong>Patient Name:</strong> {{ $patient->fname }} {{ $patient->mname }} {{ $patient->lname }}</p>
    <p><strong>Birthdate:</strong> {{ $patient->birthdate }}</p>
    <p><strong>Address:</strong> {{ $patient->address }}</p>
    <p><strong>Email:</strong> {{ $patient->email }}</p>
    <p><strong>Contact Number:</strong> {{ $patient->phone }}</p>
    <p><strong>Original Appointment:</strong> {{ $appointment->appointment_time }}</p>
    <p><strong>Rescheduled Appointment:</strong> {{ $appointment->rescheduled_time }}</p>
    <p><strong>Reschedule Reason:</strong> {{ $appointment->reschedule_reason }}</p>
    <p><strong>Dentist:</strong> {{ $dentist->fname }} {{ $dentist->lname }}</p>
    <p><strong>Service:</strong> {{ $service->name }}</p>
    <p><strong>Clinic:</strong> {{ $clinic->name }}</p>

    <p>Please check the system for more details.</p>
</body>

</html>