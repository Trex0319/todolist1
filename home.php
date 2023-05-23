<?php

    $todos = [];

    $database = new PDO('mysql:host=devkinsta_db;dbname=Todo_List', 'root', 'r9wz9RSYYaTbjS7v');

    $sql = "SELECT * FROM todos";
    $query = $database->prepare($sql);
    $query->execute();
    $todos = $query->fetchAll();

        // get students data from database (recipe)
        $sql = 'SELECT * FROM users';
        // prepare SQL query (prepare your materials)
        $query = $database->prepare($sql);
        // execute SQL squery (to cook)
        $query->execute();
        // fetch all results (eat)
        $students = $query->fetchAll();
    ?>

<!DOCTYPE html>
<html>
  <head>
    <title>TODO App</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    />
    <style type="text/css">
      body {
        background: #f1f1f1;
      }
    </style>
  </head>
  <body>

  <div class="card rounded shadow-sm mx-auto my-4" style="max-width: 500px;">
        <div class="card-body">
            <h3 class="card-title mb-3">My Todo List</h3>
            <div class="d-flex gap-3">
                <?php if ( isset( $_SESSION["users"] ) ) { ?>
                    <!-- <a href="logout.php">Logout</a> -->
                <?php } else { ?>
                    <a href="/login">Login</a>
                    <a href="/signup">Sign Up</a>
                <?php } ?>
            </div>

  <?php if ( isset( $_SESSION["users"] ) ) { ?>
    <div
      class="card rounded shadow-sm"
      style="max-width: 500px; margin: 60px auto;"
    >
      <div class="card-body">
        <h3 class="card-title mb-3">My Todo List</h3>
        <ul class="list-group">
          <?php foreach ($todos as $student) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <div>
                <form method="POST" action="update_student.php">
                  <input 
                      type="hidden"
                      name="update_complete"
                      value="<?= $student["complete"]; ?>"
                      />
                      <input 
                        type="hidden"
                        name="update_id"
                        value="<?= $student["id"]; ?>"
                      />

                  <?php if($student['complete'] == 1) {
                      echo '<button class="btn btn-sm btn-success">'.'<i class="bi bi-check-square"></i>'.'</button>'.'<span class="ms-2 text-decoration-line-through">' . $student['name'] . '</span>';
                    } else {
                      echo '<button class="btn btn-sm btn-light">'.'<i class="bi bi-square"></i>'.'</button>'.'<span class="ms-2">' . $student['name'] . '</span>';                    
                      }
                    ?>
                </form>
                    </div>
                <div>
              <form method="POST" action="delete_student.php">
                    <input 
                        type="hidden"
                        name="student_id"
                        value="<?= $student["id"]; ?>"
                        />
                      <button class="btn btn-sm btn-danger">
                  <i class="bi bi-trash"></i>
                </button>  
                </form>
              </div>
          </li>
            <?php endforeach ?>       
        </ul>

        <div class="mt-4">
        <?php 
                // 1. check if there is a err
                if ( isset( $_SESSION['error'] ) ) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['error']; ?>
                    <?php
                        // once it's printed, you delete the session
                        unset( $_SESSION['error'] );
                    ?>
                </div>
            <?php endif; ?>
          <form method="POST" action="add_student.php">
          <div class="d-flex justify-content-between align-items-center">
            <input
              type="text"
              class="form-control"
              placeholder="Add new item..."
              name="item_name"
            />
            <button class="btn btn-primary btn-sm rounded ms-2">Add</button>
          </div>
          </form>
        </div>
      </div>
    </div>    
    <div
          class="d-flex justify-content-center align-items-center gap-3 mx-auto pt-3"
          style="max-width: 500px;"
        >
          <a href="logout.php" class="text-decoration-none small"
            ><i class="bi bi-arrow-left-circle"></i> Log Out</a
          >
        </div>
      </div>
    <?php } ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
