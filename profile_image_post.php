<?php
    require_once 'includes/db.php';
    session_start();
    if(!isset($_SESSION['login_status'])){
        header('location: login.php');
    }
    // Image upload start
    $image_name = $_FILES['new_profile_image']['name'];
    $temp_location = $_FILES['new_profile_image']['tmp_name'];
    $new_location = "img/profile image/" . $image_name;
    move_uploaded_file($temp_location, $new_location);
    // Image upload end

    // database upload image start
    $email_address = $_SESSION['email_address_for_login_page'];
    $update_query = "UPDATE registration SET profile_image='$image_name' WHERE email_address = '$email_address'";
    mysqli_query($db_connect, $update_query);
    header('location: profile.php');
    // database upload image end

?>