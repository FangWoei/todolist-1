<?php

class Auth
{
    public function isUserLoggedIn() {
        return isset( $_SESSION['user'] ) ? true : false;
    }

    public function login()
    {
        $db = new DB();

        $email = $_POST["email"];
        $password = $_POST["password"];
    
        
        if ( empty($email) || empty($password) ) {
            $error = 'All fields are required';
        } else {
            $user = $db->fetch(
                "SELECT * FROM users where email = :email",
                [
                    'email' => $email
                ]
            );
            if ( empty( $user ) ) {
                $error = "The email provided does not exists";
            } else {
                if ( password_verify( $password, $user["password"] ) ) {
                    $_SESSION["user"] = $user;
    
                    header("Location: /");
                    exit;
                } else {
                    $error = "The password provided is not match";
                }
            }
    
        }
        if ( isset( $error ) ) {
            $_SESSION['error'] = $error;
            header("Location: /login");
            exit;
        }
    }

    public function signup()
    {
        $db = new DB();

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        
        $user = $db->fetch(
            "SELECT * FROM users where email = :email",
            [
                'email' => $email
            ]
        );
        
        if( empty($name) || empty($email) || empty($password) ||empty($confirm_password)){
            $error = 'All fields are required';
        } else if ($password !== $confirm_password ) {
            $error = 'not match !!!!!!!!!!!!!!!!!!!!!!!!';
        }else if ( strlen($password) <8 ) {
            $error = 'must 8 characters';
        } else if ( $user ){
            $error = "The email you inserted has already been used by another user. Please insert another email.";
        
        } else {
            $sql = "INSERT INTO users ( `name`, `email`, `password` )
                VALUES(:name, :email, :password)";
               $db->insert( $sql, [
                    'name' => $name,
                    'email' => $email,
                    'password' => password_hash( $password, PASSWORD_DEFAULT)
                ] );
        
                header("Location: /login");
                exit;
        }
        
        
        if (isset( $error ) ) {
            $_SESSION['error'] = $error;
            header("Location:/signup");
            exit;
        }
    }

    public function logout()
    {
        unset( $_SESSION['user'] );

        header("Location: /");
        exit;
    }



}