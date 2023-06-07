<?php

class Todo
{
    public function add()
    {
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
    }

    public function update()
    {
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

    }

    public function delete()
    {
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
    }
}