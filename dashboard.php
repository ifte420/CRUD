<title>Dashboard Page</title>
<?php
    session_start();
    if(!isset($_SESSION['login_status'])){
        header('location: login.php');
    }
    require_once 'includes/header.php';
    require_once 'includes/nav.php';
?>
<h2>Email: <?=$_SESSION['email_address_for_login_page']?></h2>
<h2>Name: <?=$_SESSION['loger_name']?></h2>

<?php
    require_once 'includes/footer.php';
?>