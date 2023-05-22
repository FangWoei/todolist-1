<?php
$database = new PDO(
    'mysql:host=devkinsta_db;
    dbname=todolist_01',
   'root',
   'WaoDc0cvoNR1eUiM'
);

$task_id = $_POST["task_id"];

if ( empty( $task_id ) ) {
    echo "Missing task ID";
} else {
    $sql = "DELETE FROM todo WHERE id = :id";

    $query = $database->prepare($sql);

    $query->execute([
        'id' => $task_id
    ]);

    header("Location: /");
    exit;

}
?>