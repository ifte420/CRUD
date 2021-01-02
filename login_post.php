<?php
    session_start();
        if(!isset($_SESSION['login_status'])){
        header('location: login.php');
    }
    require_once 'includes/db.php';

    $email_address = $_POST['email_address'];
    $password = md5($_POST['password']);

    $count_query = "SELECT COUNT(*) AS total FROM registration WHERE email_address= '$email_address' AND password = '$password'";
    $from_data = mysqli_query($db_connect, $count_query);
    $after_assoc = mysqli_fetch_assoc($from_data);

    if($after_assoc['total'] == 1){
        $_SESSION['login_status'] = "yes";
        $_SESSION['email_address_for_login_page'] = $email_address;
        // name er jnno
        $name_query = "SELECT full_name FROM registration WHERE email_address='$email_address'";
        $name_connect = mysqli_query($db_connect, $name_query);
        $_SESSION['loger_name'] = mysqli_fetch_assoc($name_connect)['full_name'];
        header('location: dashboard.php');
    }
    else{
        $_SESSION['email_password_error'] = "Your email or password is wrong";
        header('location: login.php');
    }


?>