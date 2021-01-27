<?php
    session_start();
    require_once 'includes/db.php';
    $picture_name = $_GET['picture_name'];
    unlink("img/profile image/" . $picture_name);
    $update_query = "UPDATE registration SET profile_image = 'default.png' WHERE profile_image='$picture_name'";
    mysqli_query($db_connect, $update_query);
    $_SESSION['delete_succes'] = "Your Profile Image Delete";
    header('location: profile.php');
?>