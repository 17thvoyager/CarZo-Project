<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('DataBase/user-config.php');
session_start();
$current_page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
?>
<header class="header-area header-sticky">
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="main-nav">
                <!-- ***** Logo Start ***** -->
                <a href="index.php" class="logo">Car<em> ZO</em></a>
                <!-- ***** Logo End ***** -->
                <!-- ***** Menu Start ***** -->
                <ul class="nav">
                    <?php
                        if(isset($_SESSION['user_name'])){
                        $client_name = $_SESSION['user_name'];
                    ?>
                    <li><a href="userOrders.php">WELCOME <?php echo $client_name ?></a></li>
                    <?php } ?>  
                    <li ><a href="index.php"<?php if($current_page === 'index')
                        echo 'class="active"'; ?>>Home</a></li>
                        
                    <li><a href="fleet.php"<?php if($current_page ==='fleet') echo 'class="active"'; ?>>Fleet</a></li>
                    <li><a href="offers.php"<?php if($current_page ==='offers') echo 'class="active"'; ?>>Offers</a></li>
                    <li><a href="about.php"<?php if($current_page ==='about') echo 'class="active"'; ?>>About Us</a></li>
                    <li><a href="contact.php"<?php if($current_page ==='contact') echo 'class="active"'; ?>>Contact</a></li>
                    <!-- <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">About</a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="about.html">About Us</a>
                            <a class="dropdown-item" href="blog.html">Blog</a>
                            <a class="dropdown-item" href="team.html">Team</a>
                            <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                            <a class="dropdown-item" href="faq.html">FAQ</a>
                            <a class="dropdown-item" href="terms.html">Terms</a>
                        </div>
                    </li> -->
                    

                    <?php
                        if(isset($_SESSION['user_name'])){
                        $client_id = $_SESSION['user_name'];
                    ?>
                    <li><a href="./DataBase/logOutAction.php">Log out</a></li>
                    <?php }else{ ?>
                        <li><a href="./index.php#login-form">Login</a></li>
                    <?php } ?>
                </ul>
                <a class='menu-trigger'>
                    <span>Menu</span>
                </a>
                <!-- ***** Menu End ***** -->
            </nav>
        </div>
    </div>
</div>
</header>


