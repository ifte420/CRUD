<?php
    session_start();
    require_once "includes/db-oop.php";
    $id = $_GET['id'];
    $service_name = $_GET['service_name'];
    $db->delete("services", "id= $id");
    $_SESSION['service_delete_status'] = "Your Service Delete " . "$service_name";
    header('location: service.php');