<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "ordering-tablet";

$con = new mysqli($server, $user, $password, $db);

if($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$table = "CREATE TABLE IF NOT EXISTS Users(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(128) NOT NULL,
    password VARCHAR(128) NULL,
    created_at DATE NOT NULL DEFAULT NOW()
)";

if($con->query($table) === false) {
    die($con->error);
}

