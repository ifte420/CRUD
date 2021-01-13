<?php
    require_once 'includes/db.php';
    session_start();
    if(!isset($_SESSION['login_status'])){
        header('location: login.php');
    }
    // Image Extention with user id 
    $email_address = $_SESSION['email_address_for_login_page'];
    $get_id_query = "SELECT id, profile_image FROM registration WHERE email_address='$email_address'";
    $user_id = mysqli_fetch_assoc(mysqli_query($db_connect, $get_id_query))['id'];
    $db_profile_image_name = mysqli_fetch_assoc(mysqli_query($db_connect, $get_id_query))['profile_image'];
    if($db_profile_image_name != 'default.png'){
        echo "delete korte hobe";
    }
    die();
    $image_name = $_FILES['new_profile_image']['name'];
    $image_after_explode = explode("." , $image_name);
    $extetion = end($image_after_explode);
    $img_new_name = $user_id . "." . $extetion;
    // Image Extention with user id 

    // Image upload start
    $temp_location = $_FILES['new_profile_image']['tmp_name'];
    $new_location = "img/profile image/" . $img_new_name;
    move_uploaded_file($temp_location, $new_location);
    // Image upload end

    // database upload image start
    $update_query = "UPDATE registration SET profile_image = '$img_new_name' WHERE email_address = '$email_address'";
    mysqli_query($db_connect, $update_query);
    header('location: profile.php');
    // database upload image end

?>