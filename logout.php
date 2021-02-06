<?php
    session_start();
    unset($_SESSION['login_status']);
    unset($_SESSION['email_address_for_login_page']);
    unset($_SESSION['loger_name']);
    header('location: login.php');
?>