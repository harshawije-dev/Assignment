<?php

$host = "localhost";
$username = "root";
$password = NULL;
$database = "users";


$connection = mysqli_connect($host, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
// echo "Connected successfully";