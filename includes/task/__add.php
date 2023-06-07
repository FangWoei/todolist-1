<?php

$db = new DB();

$todo_name = $_POST['todo_name'];

if (empty($todo_name)){
        $_SESSION['error'] = "Please insert a name";
        header("Location: /");
        exit;

}
    $sql = 'INSERT INTO todo (`task`, `completed`) VALUES (:task,:completed)';
    $db->insert( $sql, [
        'task' => $todo_name,
        'completed' => 0
    ]);

    header("Location: /");
    exit;
