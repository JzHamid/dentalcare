<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --success-color: #4caf50;
            --error-color: #f44336;
            --text-color: #333;
            --light-gray: #f8f9fa;
            --border-color: #e0e0e0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--light-gray);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            padding: 40px 30px;
            text-align: center;
        }

        .logo {
            margin-bottom: 20px;
        }

        h1 {
            color: var(--primary-color);
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        p {
            margin-bottom: 25px;
            color: #666;
        }

        .success-message {
            color: var(--success-color);
            font-weight: 500;
            background-color: rgba(76, 175, 80, 0.1);
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error-message {
            color: var(--error-color);
            font-weight: 500;
            background-color: rgba(244, 67, 54, 0.1);
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        form {
            margin-top: 30px;
        }

        .otp-container {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-bottom: 30px;
        }

        .otp-input {
            width: 50px;
            height: 60px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            text-align: center;
            font-size: 24px;
            font-weight: 600;
            color: var(--primary-color);
            transition: all 0.3s;
        }

        .otp-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
            outline: none;
        }

        .hidden-input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .submit-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 14px 30px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s;
            width: 100%;
            margin-top: 10px;
        }

        .submit-btn:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.2);
        }

        .resend-link {
            display: inline-block;
            margin-top: 20px;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
        }

        .resend-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
            }

            .otp-input {
                width: 40px;
                height: 50px;
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Optional: Add your logo here -->
        <!-- <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" width="120">
        </div> -->

        <h1>Verification Code</h1>
        <p>Please enter the 6-digit code sent to your email</p>

        @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="error-message">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="{{ route('otp.verify.submit') }}">
            @csrf
            <input type="hidden" name="email" value="{{ session('email') }}">

            <!-- Hidden input to store the complete OTP -->
            <input type="text" name="otp" id="otpComplete" class="hidden-input" required>

            <div class="otp-container">
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric" autocomplete="one-time-code">
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric">
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric">
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric">
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric">
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric">
            </div>

            <button type="submit" class="submit-btn">Verify Code</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const otpInputs = document.querySelectorAll('.otp-input');
            const otpComplete = document.getElementById('otpComplete');

            // Focus the first input on page load
            otpInputs[0].focus();

            // Handle input in OTP fields
            otpInputs.forEach((input, index) => {
                input.addEventListener('input', function(e) {
                    // Allow only numbers
                    this.value = this.value.replace(/[^0-9]/g, '');

                    // Auto focus next input
                    if (this.value && index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }

                    // Update the hidden input with complete OTP
                    updateCompleteOtp();
                });

                // Handle backspace
                input.addEventListener('keydown', function(e) {
                    if (e.key === 'Backspace' && !this.value && index > 0) {
                        otpInputs[index - 1].focus();
                    }
                });

                // Handle paste event
                input.addEventListener('paste', function(e) {
                    e.preventDefault();
                    const pastedData = e.clipboardData.getData('text').trim();

                    // If pasted data is a number and has the expected length
                    if (/^\d+$/.test(pastedData) && pastedData.length <= otpInputs.length) {
                        // Distribute the pasted digits across the inputs
                        for (let i = 0; i < pastedData.length; i++) {
                            if (index + i < otpInputs.length) {
                                otpInputs[index + i].value = pastedData[i];
                            }
                        }

                        // Focus the next empty input or the last one
                        const nextIndex = Math.min(index + pastedData.length, otpInputs.length - 1);
                        otpInputs[nextIndex].focus();

                        // Update the hidden input
                        updateCompleteOtp();
                    }
                });
            });

            // Function to update the hidden input with the complete OTP
            function updateCompleteOtp() {
                let otp = '';
                otpInputs.forEach(input => {
                    otp += input.value;
                });
                otpComplete.value = otp;
            }
        });
    </script>
</body>

</html>