<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('./user-config.php');
session_start();
echo "<script>console.log('this is dfghjka Variable' );</script>";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['otp'])) {
    $user_entered_otp = $_POST["otp"];
    $session_name = $_SESSION['name'];
    $session_phno =  $_SESSION['phno'];
    $session_pass = $_SESSION['password'];
    $session_email = $_SESSION['email'];
    $session_photo = $_SESSION['photo'];
    $session_otp = $_SESSION["verification_code"];

    if ($user_entered_otp == $session_otp) {
        echo "<script>alert('You have been entered the correct OTP number. You have been processed " . $session_email . " ');</script>";

        $client_input = "INSERT INTO `client_collection`(`client_name`, `client_phno`, `client_email`, `client_password`, `clinet_license`) 
        VALUES ('$session_name','$session_phno','$session_email','$session_pass','$session_photo')";

        if (mysqli_query($con, $client_input)) {
        echo "<script>alert('You have been signed up. Please login.'); 
        window.location = '../index.php#login-form'</script>";
        session_destroy();
    }
    } else {
        echo "<script>alert('Invalid OTP. Please try again. " . $session_email . " '); 
                    window.location = '../index.php#sign-form'</script>";
    }
}
?>