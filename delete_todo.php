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
    // recipe
    $sql = "DELETE FROM todo WHERE id = :id";

    // prepare
    $query = $database->prepare($sql);

    // execute (cook)
    $query->execute([
        'id' => $task_id
    ]);

    // redirect to the index.php
    header("Location: index.php");
    exit;

}
?>