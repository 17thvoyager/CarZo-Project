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
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <title>CarZo.com</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <?php
    include("header.php");
    ?>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action"
        style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Our <em>Fleet</em></h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    `
    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>
            <div class="row">
                <?php
                $sql = "SELECT * FROM `car_collection`";
                $res = mysqli_query($con, $sql);

                if ($res) {
                    while ($row = mysqli_fetch_array($res)) {
                        if('Garaged' == $row['car_status']) {
                        $carID = $row['car_id'];
                        $carModel = $row['car_model'];
                        $leasePrice = $row['lease_price'];
                        $carImage = $row['car_image'];
                        $carPassenger = $row['car_passengers'];
                        $carLagauge = $row['car_luggage'];
                        $carDoors = $row['car_doors'];
                        $carTransmission = $row['car_transmission'];

                        ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="trainer-item">
                                <div class="image-thumb">
                                    <img src="assets/images/<?php echo $carImage; ?>" alt="Car Image">
                                </div>
                                <div class="down-content">
                                    <span>from  <sup> INR</sup>
                                        <?php echo $leasePrice; ?> per km
                                    </span>
                                    <h4>
                                        <?php echo $carModel; ?>
                                    </h4>
                                    <p>
                                        <i class="fa fa-user" title="passengers" >
                                            <?php echo $carPassenger ?>
                                        </i> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-briefcase" title="luggages">
                                            <?php echo $carLagauge ?>
                                        </i> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-sign-out" title="doors">
                                            <?php echo $carDoors ?>
                                        </i> &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-cog" title="transmission">
                                            <?php echo $carTransmission ?>
                                        </i>
                                    </p>
                                    <ul class="social-icons">
                                    
                                    <a  href='carPage.php?carID=<?php echo $carID;?>'>+ Book Now</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php }
                    }
                } else {
                    echo "<script>alert('problem in the query');</script>";
                }
                ?>

            </div>
            <br>

            <nav>
                <ul class="pagination pagination-lg justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->


    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        © 2023 CarZo Car Rental
                        - : <a href="https://www.CarZo.com/">CarZo.com</a>
                    </p>
                </div>
            </div>
        </div>
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