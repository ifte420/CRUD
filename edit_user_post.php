<?php
    session_start();
    require_once 'includes/db.php';

    $id = $_POST['id'];
    $old_full_name = $_POST['old_full_name'];
    $full_name = $_POST['full_name'];
    $email_address = $_POST['email_address'];
    $gender = $_POST['gender'];
    
    $update_query  =  "UPDATE registration SET full_name='$full_name', email_address='$email_address', gender='$gender' WHERE id= $id";
    mysqli_query($db_connect, $update_query);
    $_SESSION['update_name'] =  "$old_full_name Updated successfully $full_name";
    header('location: user_list.php');
?>