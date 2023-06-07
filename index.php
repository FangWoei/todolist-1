<?php

    session_start();

     // require all the functions files
     require "includes/class-auth.php";
     require "includes/class-db.php";
     require "includes/class-todo.php";

    $path = parse_url( $_SERVER["REQUEST_URI"], PHP_URL_PATH );

    $path = trim( $path, '/' );
    $auth = new Auth();
    $todo = new Todo();


    switch ($path) {
        case 'auth/login':
            $auth->login();
            break;
        case 'auth/signup':
            $auth->signup();
            break;
        case 'task/add':
            $todo->add();
            break;  
        case 'task/update':
            $todo->update();
            break;  
        case 'task/delete':
            $todo->delete();
            break;  
        case 'login': 
            require "pages/login.php";
            break;
        case 'signup': 
            require "pages/signup.php";
            break;
        case 'logout': 
            $auth->logout();
            break;
        default:
            require "pages/home.php";
            break;
    }