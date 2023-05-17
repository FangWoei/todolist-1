<?php

$database = new PDO(
    'mysql:host=devkinsta_db;
    dbname=todolist_01',
   'root',
   'WaoDc0cvoNR1eUiM'
);

$task_name = $_POST['task_name'];

if (empty($task_name)){
    echo "Please insert";
} else {
    $sql = 'INSERT INTO todo (`task`, `completed`) VALUES (:task,:completed)';
    $query = $database->prepare( $sql );
    $query->execute([
        'task' => $task_name,
        'completed' => 0
    ]);       
    
    header("Location: index.php");
    exit;
}

?>