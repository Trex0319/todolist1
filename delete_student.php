<?php

    $todos = [];

    $database = new PDO("mysql:host=devkinsta_db;dbname=Todo_List", "root", "r9wz9RSYYaTbjS7v");

    $sql = "SELECT  * FROM todos";

    $query = $database->prepare($sql);
    $query->execute();
    $todos = $query->fetchALL();

    $student_id = $_POST["student_id"];

    if ( empty( $student_id ) ) {
        echo "Missing student ID";
    } else {
        // recipe
        $sql = "DELETE FROM todos WHERE id = :id";

        // prepare
        $query = $database->prepare($sql);

        // execute (cook)
        $query->execute([
            'id' => $student_id
        ]);

        header("Location: /");
        exit;

    }