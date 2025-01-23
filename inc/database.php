<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "ordering-tablet";

$con = new mysqli($server, $user, $password, $db);

if($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS Users(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    userType ENUM('Admin', 'Supervisor', 'Employee') NOT NULL DEFAULT 'Employee', 
    lastLogin DATETIME DEFAULT NULL,
    createdAt DATETIME NOT NULL DEFAULT NOW()
)";

if($con->query($sql) === false) {
    die($con->error);
}

// Add test user
if($con->query("SELECT id FROM Users WHERE login='admin'")->num_rows == 0)
{
    $adminhash = hash("sha256", "admin");
    $con->query("INSERT INTO Users (login, password, userType) VALUES ('admin', '$adminhash', 'ADMIN')");
}
