<?php

    // Credentials
    $mysql_host = 'localhost';
    $mysql_username = 'root';
    $mysql_password = '';

    // Database
    $mysql_db = 'mymap';

    // Connecting to DB
    $connection = @mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_db);
    // Checking connection
    if(mysqli_connect_errno()) {
        echo 'Failed to connect to database'.mysqli_connect_errno();
        die();
    }

    //On successfull connection
    // echo "Connected to database successfully";

    ob_start();
    // to start saving session varibles
    session_start();

?>