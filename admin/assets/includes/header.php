<?php

$sql = "SELECT * FROM admin";
$result = mysqli_query($connection, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!--  Main wrapper -->
<div class="body-wrapper ">
    <!--  Header Start -->
    <header class="app-header bg-light">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= urlOf('admin/assets/images/profile/user-1.jpg') ?>" alt="" width="35" height="35" class="rounded-circle" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                            <div class="message-body">
                                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-user fs-6"></i>&nbsp;
                                    <p class="mb-0 fs-3 font-weight-base"><?= $_SESSION['username']?></p>                                    
                                </a>
                                <a href="<?= urlOf('api/adminLogout.php')?>" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!--  Header End -->