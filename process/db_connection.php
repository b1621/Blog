<?php

$username = 'root'; 
$password = ''; 
$host = "localhost:3306"; 
$dbname = 'crud'; 

$pdo = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);