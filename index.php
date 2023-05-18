<?php

session_start();

    $completed = [];
    $tasks=[];
    $database = new PDO(
        'mysql:host=devkinsta_db;
        dbname=todolist_01',
        'root',
        'WaoDc0cvoNR1eUiM'
    );
    
    $sql = "SELECT * FROM todo";
$query = $database->prepare($sql);
$query->execute();
$tasks = $query->fetchAll();

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
          <?php if ( isset( $_SESSION["user"] ) ) { ?>
          <ul class="list-group">
              <?php foreach ($tasks as $task) { ?>
                <li
                class="list-group-item d-flex justify-content-between align-items-center"
            >
            <div class="d-flex justify-content-center align-
            items-center">
            <form method="POST" action="update_todo.php">
                <input 
                    type="hidden"
                    name="completed_id"
                    value="<?=$task["completed"];?>"
                />
                <input 
                    type="hidden"
                    name="task_id"
                    value="<?= $task["id"]; ?>"
                />
                
                <?php if ($task["completed"] == 1 ){
                    echo"
                    <button class='btn btn-sm btn-success'>
                        <i class='bi bi-check-square'></i>
                    </button>";
                } else{
                    echo "<button class='btn btn-sm btn-light'>
                            <i class='bi bi-square'></i>
                    </button>";
                }?>

                 <?php if ($task["completed"] == 1 ){
                    echo"
                    <span class='ms-2 text-decoration-line-through'>" . $task['task'] ."</span>";
                   
                } else{
                    echo"
                    <span class='ms-2'>" . $task['task'] ."</span>";

                }
                ?>

            </form>
            </div>
            <div>
            <form method="POST" action="delete_todo.php">
                    <input 
                    type="hidden"
                    name="task_id"
                    value="<?= $task["id"]; ?>"
                            />
                    <button class="btn btn-sm btn-danger">
                        <i class="bi bi-trash"></i>
                    </button>
            </form>
            </div>
        </li>
          <?php } ?>
        </ul>
        <div class="mt-4">
            <form class="d-flex justify-content-between align-items-center" 
            method="POST" 
            action="add.php"
            >
            <input
            type="text"
            class="form-control"
            placeholder="Add new item..."
            name="task_name"
            />
            <button class="btn btn-primary btn-sm rounded ms-2">Add</button>
        </form>
        <?php } ?>
        <div> 
            <?php if ( isset( $_SESSION["user"] ) ) { ?>
            <button class="btn btn-primary mt-3"><a href="logout.php" class="text-white">Logout</a></button>
            <?php } else { ?>
            <button class="btn btn-primary mt-3"><a href="signup.php" class="text-white">Sign up</a></button>
            <button class="btn btn-primary mt-3"><a href="login.php" class="text-white">Login</a></button>
            <?php } ?>
        </div>
        </div>
      </div>
    </div>

    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"
    ></script>
</body>

</html>