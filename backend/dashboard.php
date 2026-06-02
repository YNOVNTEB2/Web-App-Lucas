<?php
session_start();
include("connection.php");

if (!isset($_SESSION['user']))   {
    header("Location: login.html");
}

$email = $_Session['user'];
echo "email";

$sql = "SELECT FROM users WHERE email = '$email'";
$result = $connection->query($sql);
$user = $result->fetch_assoc();

$name = $user['firstName'];
echo "$name";

$connection->close();
?>