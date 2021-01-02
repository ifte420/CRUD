<?php
    session_start();
    if(!isset($_SESSION['login_status'])){
        header('location: login.php');
    }
    require_once 'includes/db.php';
    $id = $_GET['id'];
    $delete_all_use = "DELETE FROM registration"; 

    if(mysqli_query($db_connect, $delete_all_use)){
        $_SESSION['status'] = "Deleted all users Successfully";
        header('location: user_list.php');
    }
    else {
        echo "Your delete query wrong";
    }
?>