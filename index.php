<?php

    session_start();

    $path = parse_url( $_SERVER["REQUEST_URI"], PHP_URL_PATH );

    $path = trim( $path, '/' );

    if ( $path == 'login' ) {
        require "login.php";

    } else if ( $path == 'signup' ) {
        require "signup.php";

    } else if ( $path == 'logout' ) {
        require "logout.php";

    } else {
        require "home.php";
    }