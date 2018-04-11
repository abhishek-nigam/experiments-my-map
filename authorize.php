<?php

    require ('connect.include.php');

    $error = false;
    $error_message = "";

    if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $clean_username = mysqli_real_escape_string($connection, $username);
        $clean_password = mysqli_real_escape_string($connection, $password);

        $password_hash = md5($clean_password);

        $query = "SELECT `id` FROM `users` WHERE `username`='$clean_username' AND `password`='$password_hash'";

        if($result = mysqli_query($connection, $query)) {

            $row_count = mysqli_num_rows($result);

            if($row_count) {

                // can handle cases here when more than one rows are retured ?

                $row = mysqli_fetch_assoc($result);
                $user_id = $row['id'];

                // Setting session
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;

                // redirect to showplaces.php
                header("Location: showplaces.php");                

            } else {
                // username and password combination cannot be found
                $error = true;
                $error_message = "Incorrect username or password";                    
            }

        } else {
            // query cannot be executed
            $error = true;
            $error_message = "Server error. Query cannot be executed";
        }

    } else {
        // password or username not set or empty
        $error = true;
        $error_message = "Password or username not set or empty";
    }

    require ('authorize.view.php');

?>