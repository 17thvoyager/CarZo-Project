<?php 
include("config.php");

if(isset($_GET['car_id'])){
    $id = $_GET['car_id'];

    echo '<script>
            var confirmDelete = confirm("Are you sure you want to delete this car?");
            if (confirmDelete) {
                window.location.href = "delete-arr.php?confirmed=true&car_id=' . $id . '";
            } else {
                window.location.href = "../index.php";
            }
          </script>';
}

if (isset($_GET['confirmed']) && $_GET['confirmed'] == 'true') {
    $id = $_GET['car_id'];

    $sql = "DELETE FROM `car_collection` WHERE `car_id` = '$id' ";

    if(mysqli_query($con, $sql)) {
        header("location: ../index.php");
    } else {
        echo '<script>window.location="../error-403.html"</script>';
    }
}
?>
