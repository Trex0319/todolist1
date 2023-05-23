<?php

    // enable session in /
    session_start();

    require "includes/function.php";

    // parse_url will remove all the query string starting from the ?
    $path = parse_url( $_SERVER["REQUEST_URI"], PHP_URL_PATH );
    // remove / using trim()
    $path = trim( $path, '/' );

    switch ($path) {
        case 'auth/login':
            require 'includes/auth/login.php';
            break;
        case 'auth/signup':
            require 'includes/auth/signup.php';
            break;
        case 'task/add':
            require 'includes/task/add.php';
            break;  
        case 'task/update':
            require 'includes/task/update.php';
            break;  
        case 'task/delete':
            require 'includes/task/delete.php';
            break;  
        case 'login': // condition
            require "pages/login.php";
            break;
        case 'signup': // condition
            require "pages/signup.php";
            break;
        case 'logout': // condition
            require "pages/logout.php";
            break;
        default:
            require "pages/home.php";
            break;
    }