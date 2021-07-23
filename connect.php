<?php

$host = 'localhost';
$user = 'root';
$pass = 'root';
$db_name = 'blog';

$conn = new MySQLi($host, $user, $pass, $db_name);

if($conn->connect_error){
    die('Database connection errorrrrrrrrrrrrrrrrrrr: '. $conn->connect_error);
}