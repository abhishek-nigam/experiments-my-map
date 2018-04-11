<?php

    session_destroy();
    
    // Redirect to authorize.php
    header("Location: authorize.php");

?>