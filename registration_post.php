<?php
    session_start();
    require_once 'includes/db.php';

    $full_name = $_POST['full_name'];
    $email_address = $_POST['email_address'];
    $password = md5($_POST['password']);
    $confirm_password = md5($_POST['confirm_password']);
    $gender = $_POST['gender'];


    if($full_name && $email_address && $password && $confirm_password && $gender){
        if($password ==  $confirm_password){
            //Counting email unique
            $count_query = "SELECT COUNT(*) AS total FROM registration WHERE email_address='$email_address'";
            $form_db = mysqli_query($db_connect, $count_query);
            $after_assoc = mysqli_fetch_assoc($form_db);
            if($after_assoc['total'] == 0){
                // Insset database
                $insert_query = "INSERT INTO registration(full_name,email_address,password,gender) VALUES ('$full_name', '$email_address', '$password', '$gender')";
                mysqli_query($db_connect, $insert_query);
                header("location: user_list.php");
            }
            else{
                $_SESSION['uniq_email'] = "this email is already use";
                header('location: registration page.php');
            }
        }
        else{
            $_SESSION['cnf_err'] = "Your password & confirm password not same!";
            header('location: registration page.php');
        }
    }
    else {
        $_SESSION['fill up'] =  "Your Registration Form not full  fill up:( ! Plz try again..";
        header('location: registration page.php');
    }
?>