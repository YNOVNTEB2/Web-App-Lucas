<?php

include "connection.php";

if ($_SERVER["REQUEST_METHOD"]=="POST") {

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        echo "login successful!, Welcome" . $user['lastName']; 

        $_SESSION['user'] = $user['email'];

        header("location: index.html");
    }
     else {
        echo "Wrong password";
     }
    }
}
?>