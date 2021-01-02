<?php
    // Database connect start
    define("HOST_NAME", "localhost");
    define("USER_NAME", "root");
    define("PASSWORD", "");
    define("DATABASE_NAME", "registration pratice");

    $db_connect = mysqli_connect(HOST_NAME, USER_NAME, PASSWORD, DATABASE_NAME); //Connect Database
    if(mysqli_connect_errno()){
        echo "<h1>The database is incorrect</h1>";
    }
    // Database connect End
?>