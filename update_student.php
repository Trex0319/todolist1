<?php

    // $todos = []; 

    $database = new PDO("mysql:host=devkinsta_db;dbname=Todo_List", "root", "r9wz9RSYYaTbjS7v");

    // $sql = "SELECT  * FROM todos";

    $update_complete = $_POST["update_complete"];
    $update_id = $_POST["update_id"];

    if($update_complete == 1){
        $update_complete = 0;
    } else if ($update_complete == 0){
        $update_complete = 1;
    }


    if (empty($update_id)){
        echo "error";
    } else {
        $sql = 'UPDATE todos set complete = :complete WHERE id  = :id';
        
        $query = $database -> prepare( $sql );
    
        $query->execute([ 
            'id' => $update_id,
            'complete' => $update_complete
        ]);
    
        // 3. redirect the user back to index.php
        header("Location: /");
        exit;
    }