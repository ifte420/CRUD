<?php
    require_once 'includes/db-oop.php';
    session_start();
    $email_address = $_SESSION['email_address_for_login_page'];
    unset($_SESSION['login_status']);
    unset($_SESSION['email_address_for_login_page']);
    unset($_SESSION['loger_name']);
    $db->update("registration", "status = 'inactive'", "email_address= '$email_address'");
    // $inactive_assoc = $db->select_assoc("status", "registration", "email_address='$email_address'");
    // $_SESSION['inactive'] = $inactive_assoc['status'];
    header('location: login.php');
?>