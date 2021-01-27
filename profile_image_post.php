<?php
    require_once 'includes/db.php';
    session_start();
    if(!isset($_SESSION['login_status'])){
        header('location: login.php');
    }
    $image_name = $_FILES['new_profile_image']['name'];
    if(empty($image_name)){
        $_SESSION['fill_up'] = "Please select a image";
        header('location: profile.php');
        die();
    }
    $image_after_explode = explode("." , $image_name);
    $extetion = end($image_after_explode);
    $accepted_extension = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'];
    if(!in_array($extetion, $accepted_extension)){
        $_SESSION['fill_up'] = "This file format is not accepted";
        header('location: profile.php');
        die();
    }
    if($_FILES['new_profile_image']['size'] > 1000000){
        $_SESSION['fill_up'] = "Your file should be less than 1 MB!";
        header('location: profile.php');
        die();
    }
    // Image Extention with user id 
    $email_address = $_SESSION['email_address_for_login_page'];
    $get_id_query = "SELECT id, profile_image FROM registration WHERE email_address='$email_address'";
    $user_id = mysqli_fetch_assoc(mysqli_query($db_connect, $get_id_query))['id'];
    $db_profile_image_name = mysqli_fetch_assoc(mysqli_query($db_connect, $get_id_query))['profile_image'];
    if($db_profile_image_name != 'default.png'){
        unlink("img/profile image/" . $db_profile_image_name);
    }
    $img_new_name = $user_id . "." . $extetion;
    // Image Extention with user id 

    // Image upload file start
    $temp_location = $_FILES['new_profile_image']['tmp_name'];
    $new_location = "img/profile image/" . $img_new_name;
    move_uploaded_file($temp_location, $new_location);
    // Image upload file end

    // database upload image start
    $update_query = "UPDATE registration SET profile_image = '$img_new_name' WHERE email_address = '$email_address'";
    mysqli_query($db_connect, $update_query);
    header('location: profile.php');
    // database upload image end

?>