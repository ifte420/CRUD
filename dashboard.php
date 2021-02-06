<?php
    $title = "Dashbroad";
    session_start();
    if(!isset($_SESSION['login_status'])){
        header('location: login.php');
    }
    require_once 'includes/header-adminto.php';
    require_once 'includes/nav-adminto.php';
?>
        <div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Email: <?=$_SESSION['email_address_for_login_page']?></h2>
                        <h2>Name: <?=$_SESSION['loger_name']?></h2>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
<?php
    require_once 'includes/footer-adminto.php';
?>