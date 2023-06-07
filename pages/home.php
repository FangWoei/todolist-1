<?php
    $todos = [];

    $auth = new Auth(); 
    $db = new DB();
    $todos = $db->fetchAll('SELECT * FROM todo');

    require "parts/header.php";
?>


      <div
      class="card rounded shadow-sm"
      style="max-width: 500px; margin: 60px auto;"
      >
      <div class="card-body">
          <h3 class="card-title mb-3">My Todo List</h3>
          <?php if ( $auth->isUserLoggedIn() ) { ?>
          <ul class="list-group">
              <?php foreach ($todos as $todo) { ?>
                <li
                class="list-group-item d-flex justify-content-between align-items-center"
            >
            <div class="d-flex justify-content-center align-
            items-center">
            <form method="POST" action="/task/update">
                <input 
                    type="hidden"
                    name="completed_id"
                    value="<?=$todo["completed"];?>"
                />
                <input 
                    type="hidden"
                    name="todo_id"
                    value="<?= $todo["id"]; ?>"
                />
                
                <?php if ($todo["completed"] == 1 ){
                    echo"
                    <button class='btn btn-sm btn-success'>
                        <i class='bi bi-check-square'></i>
                    </button>";
                } else{
                    echo "<button class='btn btn-sm btn-light'>
                            <i class='bi bi-square'></i>
                    </button>";
                }?>

                 <?php if ($todo["completed"] == 1 ){
                    echo"
                    <span class='ms-2 text-decoration-line-through'>" . $todo['task'] ."</span>";
                   
                } else{
                    echo"
                    <span class='ms-2'>" . $todo['task'] ."</span>";

                }
                ?>

            </form>
            </div>
            <div>
            <form method="POST" action="/task/delete">
                    <input 
                    type="hidden"
                    name="todo_id"
                    value="<?= $todo["id"]; ?>"
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
        <?php require "parts/message_error.php"; ?>
        
            <form class="d-flex justify-content-between align-items-center" 
            method="POST" 
            action="/task/add"
            >
            <input
            type="text"
            class="form-control"
            placeholder="Add new item..."
            name="todo_name"
            />
            <button class="btn btn-primary btn-sm rounded ms-2">Add</button>
        </form>
        <?php } ?>
        <div> 
            <?php if ( $auth->isUserLoggedIn() ) { ?>
            <button class="btn btn-primary mt-3"><a href="/logout" class="text-white">Logout</a></button>
            <?php } else { ?>
            <button class="btn btn-primary mt-3"><a href="/signup" class="text-white">Sign up</a></button>
            <button class="btn btn-primary mt-3"><a href="/login" class="text-white">Login</a></button>
            <?php } ?>
        </div>
        </div>
      </div>
    </div>

    <?php
    require "parts/footer.php";
