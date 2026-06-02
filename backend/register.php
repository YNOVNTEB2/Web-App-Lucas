<?php

include "connection.php";

if ($_SERVER["REQUEST_METHOD"]=="POST") {

    $firstName = mysqli_real_escape_string($connection, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($connection, $_POST['lastName']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $connection->query($checkEmail);

    if ($result->num_rows > 0) {
        echo "<script>alert('Email already exists!!!');
            window.location.href = 'index.html';
            </script>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users(first_name, last_name	, password, email) VALUES ('$firstName', '$lastName', '$hashed_password', '$email')";

        if ($connection->query($sql)===TRUE) {
           echo "<script>alert('Account created');
                window.location.href = 'index.html';
                </script>";
        }
        else {
            echo "<script>alert('Error: " . $connection->error . " ');
            window.history.back()';
            </script>";
        }
    }
}
?>