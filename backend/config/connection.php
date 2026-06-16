<?php
$servername = getenv('DB_HOST') ?: "localhost";
$username   = getenv('DB_USER') ?: "dbadmin";
$password   = getenv('DB_PASSWORD') ?: "";
$dbname     = getenv('DB_NAME') ?: "filrouge";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$connection->set_charset("utf8mb4");