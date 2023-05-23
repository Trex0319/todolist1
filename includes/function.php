<?php

    function connectToDB() {
        $database = new PDO(
            'mysql:host=devkinsta_db;dbname=Todo_List', 
            'root', 
            'r9wz9RSYYaTbjS7v'
        );
        return $database;
    }