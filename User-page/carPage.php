<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("./DataBase/user-config.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy Agreement</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <!-- <style>
        body {
            background-color: #f8f9fa;
        }

        .white-text {
            color: white;
        }

        .product-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .product-details {
            background-color: #ed563b;
            color: white;
            padding: 20px;
            border-radius: 10px;
        }

        .product-details h2,
        .product-details p,
        .product-details h4,
        .product-details li {
            color: white;
        }

        .product-image {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-add-to-cart {
            background-color: #ed563b;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .btn-add-to-cart:hover {
            background-color: #d44730;
        }

        .price {
            font-size: 24px;
            font-weight: bold;
            color: #ed563b;
        }

        .discount {
            font-size: 16px;
            color: #999;
            text-decoration: line-through;
        }
    </style> -->
    <style>
        /* Custom CSS for the stylish-input-group */
        .stylish-input-group {
            border: 1px solid #ccc;
            border-radius: 4px;
            overflow: hidden;
        }

        .stylish-input-group .form-control {
            border: none;
            box-shadow: none;
        }

        .stylish-input-group .input-group-addon {
            background: #ed563b;
            color: white;
            border: none;
            border-radius: 0 4px 4px 0;
        }

        .stylish-input-group .input-group-addon span {
            padding: 10px;
            display: block;
        }

    </style>
</head>

<body>
    <section>
        <?php
        include("./header.php");
        ?>
    </section>
    <?php
    if (isset($_SESSION['user_name'])) {
        $carID = $_GET['carID'];

        $query = "SELECT * FROM `car_collection` WHERE `car_id` = $carID ";
        if (mysqli_query($con, $query)) {
            $res = mysqli_query($con, $query);
            $car_row = mysqli_fetch_array($res);
            ?>

            <div class="row" style="padding-top: 200px;">
                <div class="col-lg-6 product-image">
                    <!-- Car Image -->
                    <img src="assets/images/<?php echo $car_row['car_image']; ?>" alt="Car Image">
                </div>
                <!-- ... Previous HTML code ... -->

                <div class="col-lg-6 product-details">
                    <!-- Car Details -->
                    <h2>
                        <?php echo $car_row['car_model']; ?>
                    </h2>
                    <div>
                        <p>INR  <?php echo $car_row['lease_price']; ?></p>
                        
                        <p>per km</p>
                    </div>
                    <hr>

                    <div class="form-group">
                        <label for="mileageOption" style="color: #ed563b;">Select Mileage Option:</label>
                        <div class="input-group stylish-input-group">
                            <select class="form-control stylish-select" id="mileageOption" name="mileageOption">
                                <option value="400">400 km</option>
                                <option value="800">800 km</option>
                                <option value="1600">1600 km</option>
                            </select>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-chevron-down"></span>
                            </span>
                        </div>
                    </div>
                    <hr>

                    <!-- Car Description -->
                    <h4>Description:</h4>
                    <p>
                        <?php echo $car_row['car_description']; ?>
                    </p>
                    

                    <!-- Car Features -->
                    <h4>Features:</h4>
                    <ul>
                        <li>Spacious Interior</li>
                        <li>Advanced Safety Systems</li>
                        <li>Fuel Efficiency</li>
                        <li>Entertainment System</li>
                    </ul>

                    <!-- Additional Car Details -->
                    <h4>Additional Details:</h4>
                    <ul>
                        <li><strong>Doors:</strong>
                            <?php echo $car_row['car_doors']; ?>
                        </li>
                        <li><strong>Lagauge:</strong>
                            <?php echo $car_row['car_luggage']; ?>
                        </li>
                        <li><strong>Seats:</strong>
                            <?php echo $car_row['car_passengers']; ?>
                        </li>
                        <li><strong>Transmission:</strong>
                            <?php echo $car_row['car_transmission']; ?>
                        </li>
                    </ul>

                    <!-- Button trigger modal -->
                    <div style="margin-top: 15px;">
                        <button type="button" class="btn btn-danger" data-toggle="modal"  data-target="#exampleModal">
                            Rent Now
                        </button>
                    </div>
                    <!-- Modal -->
                    <!-- ... Previous modal code ... -->

                </div>

                <!-- Modal -->
                <?php
                // if ($_SESSION['client_ordered'] ?? false === false) {
                    if($_SESSION['client_ordered'] == false) {
                ?>

                <form action="./DataBase/clientReservation.php?carID=<?php echo $carID?>" method="post">  
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Car Rental Reservation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="color: black;">
                                <!-- Car Details -->
                                <h4>Car Details</h4>
                                <p>
                                    <strong>Model:</strong>
                                    <?php echo $car_row['car_model']; ?><br>
                                    <strong>Features:</strong> Spacious Interior, Advanced Safety Systems, Fuel Efficiency,
                                    Entertainment System
                                </p>

                                <!-- Pick-up Date and Time Input -->
                                <div class="form-group">
                                    <label for="pickupDateTime">Pick-up Date and Time:</label>
                                    <input type="datetime-local" class="form-control" id="pickupDateTime" name="pickupDateTime" required>
                                </div>

                                <!-- Drop-off Date and Time Input -->
                                <div class="form-group">
                                    <label for="dropoffDateTime">Drop-off Date and Time:</label>
                                    <input type="datetime-local" class="form-control" id="dropoffDateTime" name="dropoffDateTime" required>
                                </div>

                                <!-- Location Selection in Kerala -->
                                <div class="form-group">
                                    <label for="pickupLocation">Pick-up Location in Kerala:</label>
                                    <select class="form-control" id="pickupLocation" name="pickupLocation" required>
                                        <option value="Trivandrum Airport">Trivandrum Airport</option>
                                        <option value="Cochin Airport">Cochin Airport</option>
                                        <option value="Calicut Airport">Calicut Airport</option>
                                        <option value="Kannur Airport">Kannur Airport</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>

                                <!-- Privacy Policy Agreement -->
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="privacyPolicyCheck" required>
                                    <label class="form-check-label" for="privacyPolicyCheck">I agree to the <a
                                            class="text-primary" href="privacyPolicy.php" target="_blank"
                                            style="color: black;">Privacy Policy</a></label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="reserveButton">Reserve Now</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- QR Code Modal -->
                <div class="modal fade" id="qrCodeModal" tabindex="-1" role="dialog" aria-labelledby="qrCodeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="qrCodeModalLabel" style="color: black;">Payment Details and QR Code
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body" style="color: black;">
                                    <h4 class="text-uppercase font-weight-bold" style="font-size: 24px; color: #ed563b;">Payment Details</h4>
                                    <div class="border-top my-3"></div>
                                    <p class="h5">Amount: INR<input type="text" name="paymentAmount" id="paymentAmount" class="text-success font-weight-bold h2 border-0" readonly/></p>

                                <!-- Include Mileage Option -->
                                <!-- <p>Mileage Option: <span id="mileageOptionText"></span id="mileageOptionText"></span></p>     -->
                                <p>Mileage Option:
                                    <input type="text" id="mileageOptionText" name="mileageOptionText" class="border-0" raedonly/>
                                    <input type="hidden" name="userMileageOption" id="userMileageOption" value=""></p>
                                <h4>Car Details</h4>
                                <p>
                                    <strong>Model:</strong> <span id="carModel"></span><br>
                                    <!-- Include other car details here -->
                                    <strong>Doors:</strong> <?php echo $car_row['car_doors']; ?><br>
                                    <strong>Luggage:</strong> <?php echo $car_row['car_luggage']; ?><br>
                                    <strong>Seats:</strong> <?php echo $car_row['car_passengers']; ?><br>
                                    <strong>Transmission:</strong> <?php echo $car_row['car_transmission']; ?><br>
                                    <!-- Add more details as needed -->
                                </p>

                                <img id="qrCodeImage" src="" alt="QR Code">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <!-- <button type="submit" class="btn btn-primary" id="purchaseButton"
                                    style="background-color: #ed563b; color: white;">Purchase</button> -->
                                    <input type="submit" class="btn btn-primary" id="purchaseButton" style="background-color: #ed563b; color: white;" value="Purchase">
                            </div>
                        </div>
                    </div>
                </div>

                </form>
                <?php
                    } else {
                        echo "<script>alert('You are already booked! If you want to book again cancel the current order or complete your reservation.');window.location = './userOrders.php'</script>";
                    }
                ?>
            <script>
                
                // document.addEventListener('DOMContentLoaded', function () {
                //     document.getElementById('purchaseButton').addEventListener('click', function () {
                //         window.location.href = 'clientReservation.html';
                //     });
                // });


                document.addEventListener('DOMContentLoaded', function () {
                    document.getElementById('reserveButton').addEventListener('click', function () {
                        if (document.getElementById('privacyPolicyCheck').checked) {
                            var pickupDateTime = document.getElementById('pickupDateTime').value;
                            var dropoffDateTime = document.getElementById('dropoffDateTime').value;
                            var mileageOption = document.getElementById('mileageOption').value; // Add this line to get the selected mileage option

                            var currentDate = new Date();
                            currentDate.setHours(0, 0, 0, 0);

                            
                            var data = {
                                pickupDateTime: pickupDateTime,
                                dropoffDateTime: dropoffDateTime,
                                // Add other fields as needed
                            };

                            if (new Date(pickupDateTime) >= currentDate.setDate(currentDate.getDate() + 1)) {
                                if (pickupDateTime && dropoffDateTime && new Date(dropoffDateTime) > new Date(pickupDateTime)) {

                                    // Adjust the lease price based on mileage option
                                    var leasePricePerKm = <?php echo $car_row['lease_price']; ?>;
                                    var totalLeasePrice = mileageOption * leasePricePerKm;

                                    document.getElementById('paymentAmount').value =  totalLeasePrice.toFixed(2);

                                    document.getElementById('carModel').textContent = '<?php echo $car_row['car_model']; ?>';

                                    // Dynamically generate the QR code URL based on reservation details
                                    var qrCodeData = "YourReservationDataHere"; // Replace with actual reservation data
                                    var qrCodeSize = "150x150";
                                    var qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?data=" + qrCodeData + "&size=" + qrCodeSize;

                                    document.getElementById('qrCodeImage').src = qrCodeUrl;
                                    var selectedMileageOption = document.getElementById('mileageOption').value;
                                    document.getElementById('userMileageOption').value = selectedMileageOption;
                                    document.getElementById('mileageOptionText').value = selectedMileageOption + ' km';
                                    $('#qrCodeModal').modal('show');
                                } else {
                                    alert('Please select a valid pick-up date and ensure the drop-off date is after the pick-up date.');
                                }
                            } else {
                                alert('You can only pick up the car starting from tomorrow.');
                            }
                        } else {
                            alert('Please agree to the Privacy Policy before reserving.');
                        }
                    });


                document.getElementById('privacyPolicyCheck').addEventListener('change', function () {
                    document.getElementById('reserveButton').disabled = !this.checked;
                });
            });
            </script>

        </div>
    </div>
</div>
            <?php
        } else {
            echo "<script>alert('problem in the query');</script>";
        }
        ?>

        <!-- Bootstrap JS and Popper.js -->
        <footer>
            <p>&copy; 2023 CarZo Car Rental | <a href="mailto:support@carzo.in">support@carzo.in</a></p>
        </footer>
        <!-- Bootstrap JS and Popper.js (if needed) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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

    <?php
    } else {
        echo "<script>alert('Please Login first!');window.location = './index.php#login-form'</script>";
    }
    ?>