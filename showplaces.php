<?php

    require ('connect.include.php');

    $error = false;
    $error_message = "";

    if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {

        $user_id = $_SESSION['user_id'];

        $query = "SELECT * FROM `places` WHERE `user_id`='$user_id'";

        if($result = mysqli_query($connection, $query)) {

            // fetched places successfully

        } else {
            // query cannot be executed
            $error = true;
            $error_message = "Server error. Query cannot be executed";
        }

    } else {
        // user isn't logged in, redirect to authorize.php
        header("Location: authorize.php");
    }

    require ('showplaces.view.php');

?>