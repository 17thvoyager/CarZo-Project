<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("DataBase/user-config.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <title>Reserved Cars</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <?php
    include("header.php");
    ?>

    <style>
         body {
        background-color: #f8f9fa;
        padding-bottom: 100px;
    }

    .container2, .container3 {
        max-width: 800px;
        margin-top: 100px;
        margin-left: auto;
        margin-right: auto;
    }

    .reserved-car {
        background-color: #ffffff;
        border-radius: 10px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .reserved-car img {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        max-width: 100%;
        height: auto;
    }

    .car-details {
        padding: 20px;
    }

    h2, h3 {
        color: #ed563b;
        text-align: center;
        margin-bottom: 40px;
    }

    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #f8f9fa;
        text-align: center;
        padding: 10px;
    }

    @media (max-width: 768px) {
        .container2, .container3 {
            max-width: 100%;
            padding: 10px;
        }
    }
    </style>
</head>

<body>
    <?php
    $client_id = $_SESSION['user_id'];
    $query1 = "SELECT * FROM `car_collection` WHERE `client_id`='$client_id'";
    $result1 = mysqli_query($con, $query1);
    
    $query2 = "SELECT * FROM `client_collection` WHERE `client_id`='$client_id'";
    $result2 = mysqli_query($con, $query2);

    if($result1 && $result2) {
        $car_row = mysqli_fetch_array($result1);
        $client_row = mysqli_fetch_array($result2);

        if($car_row && $client_row) {
    ?>

<div class="container2"> 
    <h2>Your Reserved Car</h2>
    <div class="card reserved-car">
        <img src="assets/images/<?php echo $car_row['car_image']; ?>" class="card-img-top" alt="Car Image">
        <div class="card-body car-details">
            <h5 class="card-title"><?php echo $car_row['car_model']; ?></h5>
            <p class="card-text">Details: <strong><?php echo $car_row['car_description'];?></strong></p>
            <p class="card-text">Package:  <strong><?php  echo $client_row['client_package'];?></strong></p>
            <p class="card-text">Payed Price:  <strong><?php  echo $client_row['client_leaseprice'];?></strong></p>
            <p class="card-text">Reserved Location:  <strong><?php  echo $client_row['client_location'];?></strong></p>
            <p class="card-text">Pick-up Date:  <strong><?php  echo $client_row['client_pickup'];?></strong></p>
            <p class="card-text">Drop-off Date:  <strong><?php echo $client_row['client_dropoff'];?></strong></p>

            <div class="buttons-container d-flex justify-content-end">
                <a href="./DataBase/cancelOrder.php"><button class="btn btn-danger" onclick="confirmCancellation()">Cancel Order</button></a>
            </div>
        </div>
    </div>
</div>
<!-- <script>
function confirmCancellation() {
    var isConfirmed = confirm("Are you sure you want to cancel the order?");

    if (isConfirmed) {
        window.location.href = "./DataBase/cancelOrder.php";
    }
}
</script> -->

    <?php
    } else {
    ?>
     <div class="container3">
        <h3>You don't have any reservations</h3>

        <p class="no-reservation">
            <a href="fleet.php" class="reserve-link">Click here to reserve a car</a>
        </p>
    </div>
        

    <?php
       }
    }   
    ?>
    <footer>
        <p>&copy; 2023 CarZo Car Rental | <a href="mailto:support@carzo.in">support@carzo.in</a></p>
    </footer>

        <!-- jQuery -->
        <script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script>
<script src="assets/js/mixitup.js"></script>
<script src="assets/js/accordions.js"></script>

<!-- Global Init -->
<script src="assets/js/custom.js"></script>
</body>

</html>
