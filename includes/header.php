<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>StayCation</title>
    <!-- Favicon  -->
    <link rel="icon" href="<?= urlOf('img/core-img/favicon.ico') ?>">

    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= urlOf('css/style.css') ?>">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="south-load"></div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="southNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="<?= urlOf('index.php') ?>"><img src="<?= urlOf('img/core-img/logo.png') ?>" alt="logo"></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="<?= urlOf('') ?>">Home</a></li>
                                <li><a href="<?= urlof('pages/listings.php') ?>">Listings</a></li>
                                <?php
                                    if (isset($_SESSION['type']) && $_SESSION['type'] == "client") {        
                                ?>
                                <li><a href="#">Manage</a>
                                    <ul class="dropdown">
                                        <li>
                                            <?php
                                            if (isset($_SESSION['type']) && $_SESSION['type'] == "client") {
                                            ?>
                                                <li><a href="<?= urlof('pages/manage-property.php') ?>">Properties</a></li>

                                            <?php
                                            }
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                            if (isset($_SESSION['type']) && $_SESSION['type'] == "client") {
                                            ?>
                                                <li><a href="<?= urlof('pages/manage-profile.php') ?>">Manage Profile</a></li>

                                            <?php
                                            }
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                            if (isset($_SESSION['type']) && $_SESSION['type'] == "client") {
                                            ?>
                                                <li><a href="<?= urlof('pages/manage-request.php') ?>">Manage Request</a></li>

                                            <?php
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                </li>
                                <?php }
                                ?>
                                
                                <?php
                                if (isset($_SESSION['type']) && $_SESSION['type'] == "customer") {
                                ?>
                                        <li><a href="#">Manage</a>
                                            <ul class="dropdown">
                                                <li>
                                                    <a href="<?= urlof('pages/my-property.php') ?>">Manage-Request</a>
                                                </li>
                                                <li>
                                                    <a href="<?= urlof('pages/manage-profile.php') ?>">Manage-Profile</a>
                                                </li>
                                            </ul>
                                        </li>   
 
                                <?php
                                }
                                ?>
                                <li><a href="<?= urlof('pages/about-us.php') ?>">About Us</a></li>
                                <div class="btn-group">
                                    <?php
                                    if (!isset($_SESSION['name']) || $_SESSION['name'] == "") {
                                    ?>
                                        <li><a href="<?= urlof('pages/login.php') ?>">Login</a></li>
                                    <?php
                                    } else {

                                    ?>
                                        <li><a href="<?= urlof('api/logout.php') ?>">Logout</a></li>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->