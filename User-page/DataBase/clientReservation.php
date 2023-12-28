<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include('./user-config.php');



$car_id = $_GET['carID'];
echo "<script>console.log('carID:', $car_id);</script>";

$userName = $_SESSION['user_id'];
echo "<script>console.log('userID:', $userName);</script>";





if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $client_mileage_option = $_POST['mileageOption'];
    $client_pickup = $_POST['pickupDateTime'];
    $client_drop = $_POST['dropoffDateTime'];
    $client_location = $_POST['pickupLocation'];
    $client_lease_price = $_POST['paymentAmount'];

    $query = "UPDATE `client_collection` SET 
    `car_id`='[value-7]',`client_pickup`='[value-8]',
    `client_dropoff`='[value-9]',`client_package`='[value-10]',`client_leaseprice`='[value-11]',
    `client_location`='[value-12]' WHERE 1";

}
else{
    echo "please check the path";
}
?>