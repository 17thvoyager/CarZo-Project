<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("config.php");

if(isset($_GET['mech_id'])){
    $id = $_GET['mech_id'];

    echo '<script>
            var confirmDelete = confirm("Are you sure you want to delete this car?");
            if (confirmDelete) {
                window.location.href = "./delete-mech.php?confirmed=true&mech_id=' . $id . '";
            } else {
                window.location.href = "../mech-list.php";
            }
          </script>';
}

if (isset($_GET['confirmed']) && $_GET['confirmed'] == 'true') {
    $id = $_GET['mech_id'];

    $sql = "DELETE FROM `mech_collection` WHERE `mech_id` = '$id' ";

    if(mysqli_query($con, $sql)) {
        header("location: ../mech-list.php");
    } else {
        echo '<script>window.location="../error-403.html"</script>';
    }
}
?>
