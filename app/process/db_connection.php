<?php

$username = 'crud';
$password = 'password';
$host = "db";
$dbname = 'crud';

$pdo = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$con = mysqli_connect($host, $username, $password, $dbname);
if (!$con) {
    echo 'please check your database connection';
}
// echo "Connected";
