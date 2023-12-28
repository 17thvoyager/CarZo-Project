<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com'; // Specify SMTP server
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'maxpbav@gmail.com'; // SMTP username
        $mail->Password = 'zxkxqjxpxpaplfhq'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, 'ssl' also accepted
        $mail->Port = 587; // TCP port to connect to

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('maxpbav@gmail.com'); // Add a recipient

        //Content
        $mail->isHTML(false); // Set email format to plain text
        $mail->Subject = ("$email ($subject)");
        $mail->Body = $message;

        $mail->send();
        echo "<script>alert('Message is been Sended to CarZo customer care');window.location = '../contact.php'</script>";
    } catch (Exception $e) {
      echo "<script>alert('Message could not be sent. Please try again some other time or check your internet connection.');widow.location = '../contact.php'</script>";
    }
}

?>