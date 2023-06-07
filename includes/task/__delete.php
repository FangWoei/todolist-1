<?php

$db = new DB();

$todo_id = $_POST["todo_id"];

if ( empty( $todo_id ) ) {
    $_SESSION['error'] = "Missing todo ID";
    header("Location: /");
    exit;
}

$db->delete(
    "DELETE FROM todo WHERE id = :id",
    [
        'id' => $todo_id
    ]);

    header("Location: /");
    exit;