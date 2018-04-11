<?php

    require ('connect.include.php');
    
    $error = false;
    $error_message = "";

    if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    
        if(
            isset($_POST['title']) && !empty($_POST['title']) &&
            isset($_POST['description']) && !empty($_POST['description']) &&
            isset($_POST['latitude']) && !empty($_POST['latitude']) &&
            isset($_POST['longitude']) && !empty($_POST['longitude']) &&
            isset($_POST['public']) && !empty($_POST['public']) &&
            isset($_POST['date']) && !empty($_POST['date']) &&
            isset($_POST['time']) && !empty($_POST['time'])
        ) {

            $title = $_POST['title'];
            $description = $_POST['description'];
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];
            $public = $_POST['public'];
            $date = $_POST['date'];
            $time = $_POST['time'];

            $clean_title = mysqli_escape_string($connection, $title);
            $clean_description = mysqli_escape_string($connection, $description);
            $clean_latitude = mysqli_escape_string($connection, $latitude);
            $clean_longitude = mysqli_escape_string($connection, $longitude);
            $clean_public = mysqli_escape_string($connection, $public);
            $clean_date = mysqli_escape_string($connection, $date);
            $clean_time = mysqli_escape_string($connection, $time);


            $user_id = $_SESSION['user_id'];
            
            // ignoring public currently

            $query = "INSERT INTO `places` VALUES ('','$user_id','$clean_title','$clean_description','$clean_latitude','$clean_longitude',0,'$clean_date','$clean_time')";

            if($result = mysqli_query($connection, $query)) {

                // Redirect to showplaces.php
                header("Location: showplaces.php");

            } else {
                // query cannot be executed
                $error = true;
                $error_message = "Server error. Query cannot be executed";
            }

        } else {
            // one or more fields empty or not set
            $error = true;
            $error_message = "One or more fields empty or not set";
        }
    
    } else {
        // user isn't logged in, redirect to authorize.php
        header("Location: authorize.php");
    }

    require ('addplace.view.php');

?>