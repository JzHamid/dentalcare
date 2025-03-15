<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0;">
    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color: #f4f4f4; padding: 20px;">
        <tr>
            <td align="center">
                <table cellpadding="0" cellspacing="0" border="0" width="600" style="background-color: white; border-radius: 5px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                    <tr>
                        <td style="background-color: #345D95; padding: 20px; text-align: center;">
                            <h1 style="color: white; margin: 0; font-weight: bold;">OTP Verification</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px; text-align: center;">
                            <h2 style="color: #345D95; margin-top: 0;">Hello!</h2>
                            <p>Your OTP code is:</p>
                            <p style="font-size: 24px; font-weight: bold; color: #345D95; background-color: #f4f4f4; display: inline-block; padding: 10px 20px; border-radius: 5px;">
                                {{ $otp }}
                            </p>
                            <p>Please enter this code to verify your email.</p>
                            <p style="margin-top: 20px; color: #345D95;">If you did not request this code, please ignore this message.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #345D95; color: white; text-align: center; padding: 10px;">
                            <p style="margin: 0;">&copy; 2025 DentalCare WMSU. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
