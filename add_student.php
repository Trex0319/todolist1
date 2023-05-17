<?php

$todos = [];

$database = new PDO('mysql:host=devkinsta_db;dbname=Todo_List', 'root', 'r9wz9RSYYaTbjS7v');

$sql = "SELECT  * FROM todos";

$query = $database->prepare($sql);
$query->execute();

$todos = $query->fetchALL();

$item_name = $_POST['item_name'];

if (empty($item_name)){
    echo "error";
} else {
    // 2. add $_POST['student_name'] to students array ( $_SESSION['students'] )
    $sql = 'INSERT INTO todos (`name`, `complete`) VALUES (:name, :complete)';
    
    $query = $database -> prepare( $sql );

    $query->execute([ 
        'name' => $item_name,
        'complete' => 0
    ]);

    // 3. redirect the user back to index.php
    header("Location: index.php");
    exit;
}
