<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
        }

        .form-container {
            background-color: #ffffff;
            max-width: 500px;
            margin: 50px auto;
            padding: 25px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px 0px grey;
        }

        .otp-input {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            text-align: center;
        }

        .btn-primary {
            background-color: #ed563b;
            /* Updated button color */x
            color: white;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2 class="text-center">OTP Verification</h2>
        <p class="text-center">We have sent a 6-digit OTP to your email address. Please enter the OTP below to verify
            your email.</p>
        <form method="POST" action="./verifyOtp.php"> <!-- Add your verification PHP file here -->
            <div class="input-group mb-3">
                <label for="otp" class="sr-only">Enter OTP:</label>
                <input type="text" id="otp" name="otp" class="otp-input" placeholder="Enter OTP" maxlength="6"
                    pattern="\d{6}" title="Please enter a 6-digit number." required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Verify</button>
            </div>
        </form>
    </div>
</body>

</html>