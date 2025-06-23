<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nexora Login OTP</title>
    <style>
        body {
            background-color: #f8fafc;
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
            color: #1e293b;
        }

        .otp-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 24px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .logo {
            text-align: center;
            margin-bottom: 24px;
        }

        .hr {
            margin-bottom: 24px;
            display: block;
            height: 1px;
            border: 0;
            border-top: 1px solid #eee;
            margin: 1em 0;
            padding: 0;
        }

        .logo img {
            height: 50px;
            width: auto;
        }

        h2 {
            font-size: 20px;
            font-weight: 600;
            color: #111827;
            margin-bottom: 12px;
            text-align: center;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 16px;
            text-align: center;
        }

        .otp-code {
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 2px;
            color: #7c3aed;
            margin: 20px 0;
            width: min;
            border: 1px solid #E0D0FB;
            background-color: #EEEEFF;
            padding: 1rem;
            text-align: center;
        }

        .note {
            color: #475569;
            font-size: 14px;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="otp-container">
        <div class="logo">
            <img src="{{ asset('asset/images/logo/NEXORA.png') }}" alt="Nexora logo" width="150" height="50" />
        </div>

        <hr class="hr" />

        <h2>Your Nexora login code</h2>

        <p>Use the code below to securely complete your login:</p>

        <div class="otp-code">{{ $otp }}</div>

        <p>This code is valid for 5 minutes. Keep it private — never share it.</p>

        <hr class="hr" />

        <p class="note">If you didn’t request this code, feel free to ignore this email.</p>
    </div>
</body>

</html>
