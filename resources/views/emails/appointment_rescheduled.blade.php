<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Rescheduled</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0;">
    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color: #f4f4f4; padding: 20px;">
        <tr>
            <td align="center">
                <table cellpadding="0" cellspacing="0" border="0" width="600" style="background-color: white; border-radius: 5px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                    <tr>
                        <td style="background-color: #345D95; padding: 20px; text-align: center;">
                            <h1 style="color: white; margin: 0; font-weight: bold;">Appointment Rescheduled</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px;">
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tr>
                                    <td width="60%" style="vertical-align: top; padding-right: 20px;">
                                        <h2 style="color: #345D95; margin-top: 0; font-weight: bold;">Patient Information</h2>
                                        <p><strong>Name:</strong> {{ $patient->fname }} {{ $patient->mname }} {{ $patient->lname }}</p>
                                        <p><strong>Birthdate:</strong> {{ $patient->birthdate }}</p>
                                        <p>
                                            <strong>Address:</strong>
                                            {{ $patient->street_name }}, {{ $patient->city }}, {{ $patient->province }}
                                        </p>
                                        <p><strong>Email:</strong> {{ $patient->email }}</p>
                                        <p><strong>Contact Number:</strong> {{ $patient->phone }}</p>

                                        <h2 style="color: #345D95; margin-top: 20px;">Appointment Details</h2>
                                        <p><strong>Original Appointment:</strong> {{ $appointment->appointment_time }}</p>
                                        <p><strong>Rescheduled Appointment:</strong> {{ $appointment->rescheduled_time }}</p>
                                        <p><strong>Reschedule Reason:</strong> {{ $appointment->reschedule_reason }}</p>
                                        <p><strong>Dentist:</strong>Dr. {{ $dentist->fname }} {{ $dentist->lname }}</p>
                                        <p><strong>Service:</strong> {{ $service->name }}</p>
                                        <p><strong>Clinic:</strong> {{ $clinic->name }}</p>
                                    </td>
                                    <td width="40%" style="vertical-align: top;">
                                        <img src="{{ $message->embed(public_path('images/side_pic_landing.jpg')) }}" alt="Dental Care" style="max-width: 100%; height: auto; border-radius: 5px;">
                                    </td>
                                </tr>
                            </table>
                            <p style="margin-top: 20px; text-align: center; color: #345D95;">Please check the system for more details.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #345D95; color: white; text-align: center; padding: 10px;">
                            <p style="margin: 0;">&copy; 2025 Dental Care. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>