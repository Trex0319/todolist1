<?php

    $todos = [];

    $database = new PDO('mysql:host=devkinsta_db;dbname=Todo_List', 'root', 'r9wz9RSYYaTbjS7v');

    $sql = "SELECT * FROM todos";
    $query = $database->prepare($sql);
    $query->execute();
    $todos = $query->fetchAll();
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
          <form method="POST" action="add_student.php">
          <div class="d-flex justify-content-between align-items-center">
            <input
              type="text"
              class="form-control"
              placeholder="Add new item..."
              name="item_name"
              required
            />
            <button class="btn btn-primary btn-sm rounded ms-2">Add</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
