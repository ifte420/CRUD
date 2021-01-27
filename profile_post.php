<?php
    session_start();
    require_once 'includes/db.php';
    if(!isset($_SESSION['login_status'])){
        header('location: login.php');
    }
    $email_address =  $_SESSION['email_address_for_login_page'];
    if (empty($_POST['old_password']) || empty($_POST['new_password']) ||empty($_POST['confirm_password'])) {
        $_SESSION['fill_err']="Please fill all required fields!";
        header("location: profile.php");
        die();
    }

    $old_password = md5($_POST['old_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    $check_query = "SELECT COUNT(*) AS total FROM registration WHERE email_address='$email_address' AND password = '$old_password'";

    if(mysqli_fetch_assoc(mysqli_query($db_connect, $check_query))['total'] == 1){
        if($new_password == $confirm_password){ 
            $password_update_query = "UPDATE registration SET password = '$confirm_password' WHERE email_address = '$email_address'";
            mysqli_query($db_connect, $password_update_query);
            $_SESSION['chng_pass'] = "Your Passowrd Change successfully";
            header('location: profile.php');
        }
        else{
            $_SESSION['cnfm_err'] = "Your new password and confirm password Not Same";
            header('location: profile.php');
        }
    }
    else {
        $_SESSION['old_err'] = "Your Old Password Wrong";
        header('location: profile.php');
    }

?>