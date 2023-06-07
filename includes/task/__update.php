<?php

$db = new DB();

$completed = $_POST['completed_id'];
$todo_id = $_POST["todo_id"];

if ( $completed == 1) {
    $completed= 0;
} else if ( $completed == 0){
    $completed= 1;
}

if (empty( $todo_id )){
    $_SESSION['error'] = "Error";
    header("Location: /");
    exit;
}

$db->update(
    'UPDATE todo set completed = :completed WHERE id = :id',
    [
        'completed' => $completed,
        'id' => $todo_id
    ]
);        
    
    header("Location: /");
    exit;
