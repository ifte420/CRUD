<?php
    session_start();
    require_once 'includes/db.php';
    $id = $_GET['id'];
    $delete_user = "DELETE FROM registration WHERE id = $id";
    $delete_query = mysqli_query($db_connect, $delete_user);

    if($delete_query){
        $_SESSION['status'] = "Deleted $id User Successfully";
        header('location: user_list.php');
    }
    else {
        echo "Your delete query wrong";
    }
?>