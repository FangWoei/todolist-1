<?php
$database = new PDO(
    'mysql:host=devkinsta_db;
    dbname=todolist_01',
   'root',
   'WaoDc0cvoNR1eUiM'
);

$completed = $_POST['completed_id'];
$task_id = $_POST["task_id"];

if ( $completed == 1) {
    $completed= 0;
} else if ( $completed == 0){
    $completed= 1;
}

if (empty( $task_id )){
    echo "Error";
} else {
    // var_dump( $completed );
    $sql = 'UPDATE todo set completed = :completed WHERE id = :id';
    $query = $database->prepare( $sql );
    $query->execute([
        'completed' => $completed,
        'id' => $task_id
    ]);        
    
    header("Location: index.php");
    exit;

}

?>