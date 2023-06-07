<?php

    // enable session in /
    session_start();

    // require all the classes file
    require "includes/class-db.php";
    require "includes/class-auth.php";
    require "includes/class-student.php";

    // your website path
    // parse_url will remove all the query string starting from the ?
    $path = parse_url( $_SERVER["REQUEST_URI"], PHP_URL_PATH );
    // remove / using trim()
    $path = trim( $path, '/' );

    // init the auth class once
    $auth = new Auth();
    $task = new Student();

    switch( $path ) {
        case 'auth/login':
            $auth->login();
            break;
        case 'auth/signup':
            $auth->signup();
            break;
        case 'task/add':
            $task->add();
            break;
        case 'task/update':
            $task->update();
            break;
        case 'task/delete':
            $task->delete();
            break;
        case 'login':
            require 'pages/login.php';
            break;
        case 'signup':
            require 'pages/signup.php';
            break;
        case 'logout':
            $auth->logout();
            break;
        default:
            require 'pages/home.php';
            break;
    }