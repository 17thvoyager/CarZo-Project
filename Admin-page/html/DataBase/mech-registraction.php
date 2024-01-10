<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('config.php');

if (isset($_POST['submit'])) {
    $mech_name = $_POST['mech-name'];
    $mech_phno = $_POST['mech-phno'];
    $mech_address = $_POST['mech-address'];

    $checkQuery = "SELECT * FROM `mech_collection` WHERE `mech_name` = '$mech_name'";
    $checkResult = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo '<script>alert("Mechanic with the same name already exists in the database.");</script>';
        header("location: ../index.php");
        exit();
    }

    $insertQuery = "INSERT INTO `mech_collection`(`mech_name`, `mech_phno`, `mech_address`) 
                    VALUES ('$mech_name', '$mech_phno', '$mech_address')";
    
    $result = mysqli_query($con, $insertQuery);

    if ($result) {
        header("location: ../mech-list.php");
        exit();
    } else {
        echo '<script>alert("Failed to insert data. Please try again.");</script>';
        header("location: ../index.php");
        exit();
    }
}
?>
