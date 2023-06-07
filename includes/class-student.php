<?php

class Student
{
    public function add()
    {
        // init DB class
        $db = new DB();

        $item_name = $_POST['item_name'];

        // 1. check whether the $_POST['student_name'] is not empty. If is empty, show display error
        if (empty($item_name)){
            // store the error message in session
            $_SESSION['error'] = "Please insert a name";
            header("Location: /");
            exit;
        }
        
        // 2. add $_POST['student_name'] to database
        // recipe
         $sql = 'INSERT INTO todos (`name`, `complete`) VALUES (:name,:complete)';
        // OOP method
        $db->insert( $sql, [
            'name' => $item_name,
            'complete' => 0
        ] );
        
        // 3. redirect the user back to /
        header("Location: /");
        exit;
    }

    public function update()
    {
        // init DB class
        $db = new DB();

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
            
            $db->update(
                $sql,
                [ 
                'id' => $update_id,
                'complete' => $update_complete
            ]);
        
            // 3. redirect the user back to index.php
            header("Location: /");
            exit;
        }
    }

    public function delete()
    {
        // init DB class
        $db = new DB();

        $student_id = $_POST["student_id"];

        if ( empty( $student_id ) ) {
            echo "Missing student ID";
        } else {
            // recipe
            $sql = "DELETE FROM todos WHERE id = :id";
            $db->delete( $sql,[
                'id' => $student_id
            ]);
    
        // redirect to the /
        header("Location: /");
        exit;
    }
}
}