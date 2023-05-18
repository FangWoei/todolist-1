<?php
$database = new PDO(
    'mysql:host=devkinsta_db;
    dbname=todolist_01',
   'root',
   'WaoDc0cvoNR1eUiM'
);

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];


if( empty($name) || empty($email) || empty($password) ||empty($confirm_password)){
    echo 'All fields are required';
} else if ($password !== $confirm_password ) {
    echo 'not match !!!!!!!!!!!!!!!!!!!!!!!!';
}else if ( strlen($password) <8 ) {
    echo 'must 8 characters';
} else {
    $sql = "INSERT INTO users ( `name`, `email`, `password` )
        VALUES(:name, :email, :password)";
        $query = $database->prepare( $sql );
        $query->execute([
            'name' => $name,
            'email' => $email,
            'password' => password_hash( $password, PASSWORD_DEFAULT)
        ]);

        header("Location: login.php");
        exit;
}