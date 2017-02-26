<?php

require_once 'PDO.php';

function attemptLogin($username, $password) {
    //create query
    $query = "SELECT id, username, password FROM user WHERE username = :username;";

    $statement = connect()->prepare($query);

    //Encrypt password
    //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //Prepare the variables
    $statement->bindParam(':username', $username);

    //Execute
    $statement->execute();

    //Voer de query uit.
    $user = $statement->fetchObject();

    //If the password is correct, the user information will be returned. Otherwise the user will be informed the entered information was incorrect.
    if(password_verify($password, $user->password)) {

        session_start();

        $_SESSION['id'] = $user->id;
        $_SESSION['username'] = $user->username;
        header("Location: ../index.php");
    }
    else {
        echo "Wrong username or password";
    }
}
