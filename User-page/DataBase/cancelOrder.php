<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include('user-config.php');

// echo "<script>confirm('Are you sure you want to cancel the order?');";
// echo "<script>console.log('the query is set: " . $client_id . "');</script>";

if(isset($_GET['client_id'])) {
    $client_id = $_GET['client_id'];

    $query1 = "UPDATE `car_collection` SET `car_status`='Garaged', `rented_date`=NULL  WHERE `client_id`= '$client_id' ";
    
    $query2 = "UPDATE `client_collection` SET
    `car_id` = NULL,
    `client_pickup` = NULL,
    `client_dropoff` = NULL,
    `client_package` = NULL,
    `client_leaseprice` = NULL,
    `client_location` = NULL
    WHERE `client_id` = $client_id";

    $query3 = "DELETE FROM `cart_collection` WHERE `client_id` = '$client_id'";

    
    $result1 = mysqli_query($con, $query3);
    $result2 = mysqli_multi_query($con, $query1 . ';' . $query2);

    if($result1 && $result2) {
        $_SESSION['client_ordered'] = false;
        echo "<script>alert('You have Canceled your car Reservation with CarZo');window.location = '../userOrders.php'</script>";
    }
    else {
        echo "something is wrong";
    }
}
else {
    echo "somehtig is really wrong";    
}


?>