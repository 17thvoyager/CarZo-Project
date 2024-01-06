<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include('./user-config.php');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$car_id = $_GET['carID'];
$user_id = $_SESSION['user_id'];

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_SESSION['client_ordered'] = true;

    $client_mileage_option = $_POST['userMileageOption'];
    $client_pickup = $_POST['pickupDateTime'];
    $client_drop = $_POST['dropoffDateTime'];
    $client_location = $_POST['pickupLocation'];
    $client_lease_price = $_POST['paymentAmount'];
    $rented_date = date("Y-m-d");


    $query = "UPDATE `client_collection` SET 
    `car_id`='$car_id',`client_pickup`='$client_pickup',
    `client_dropoff`='$client_drop',`client_package`='$client_mileage_option',`client_leaseprice`='$client_lease_price',
    `client_location`='$client_location' WHERE `client_id`='$user_id'";

    $query2 = "UPDATE `car_collection` SET `client_id`='$user_id', `car_status`='Running',`rented_date`='$rented_date' WHERE `car_id`='$car_id'";

    $query3 = "INSERT INTO `cart_collection`(`client_id`, `client_package`, `client_leaseprice`, `client_pickup`, `client_dropoff`,`client_location`) 
    VALUES ('$user_id','$client_mileage_option','$client_lease_price','$client_pickup','$client_drop','$client_location')";

    $cart_query_insert = mysqli_query($con, $query3);
    $client_query_update = mysqli_query($con, $query);
    $car_query_update = mysqli_query($con, $query2);

    if($cart_query_insert && $client_query_update && $car_query_update){
        echo "<script>console.log('the query is set');</script>";
        echo "<script>alert('You have booked you car order in CarZo');window.location = '../fleet.php'</script>";
    }
    else{
        echo "<script>console.log('Update failed: " . mysqli_error($con) . "');</script>";
    }

}
else{
    echo "please check the path";
}
?>