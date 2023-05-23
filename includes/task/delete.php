<?php

    $database = connectToDB();

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