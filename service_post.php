<?php
    session_start();
    require_once "includes/db-oop.php";
    $service_icon = $_POST['icon'];
    $service_name = $_POST['name'];
    $service_description = $_POST['description'];

    if(empty($service_icon) || empty($service_name) || empty($service_description)){
        $_SESSION['service_empty_status'] = "Please fill up all field";
        header('location: service.php');
        die();
    }
    $db->insert("services", "service_icon, service_name, service_description", "'$service_icon', '$service_name', '$service_description'");
    $_SESSION['service_success_status'] = "Your Service Insert Successfully";
    header('location: service.php');
?>