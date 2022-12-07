<?php

$username = 'crud';
$password = 'password';
$host = "db";
$dbname = 'crud';

// $username = 'root';
// $password = '';
// $host = "localhost";
// $dbname = 'crud';

$pdo = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//  // get data from the SQL file
//  $query = file_get_contents("../db/crud.sql");
//  // prepare the SQL statements
//  $stmt = $pdo->prepare($query);
//  // execute the SQL
//  if ($stmt->execute()){
//      echo "Success";
//  }
//  else {
//      echo "Fail";
//  }

 $con = mysqli_connect($host, $username, $password, $dbname);
if (!$con) {
    echo 'please check your database connection';
    
}
// echo "Connected";
