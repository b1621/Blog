<?php

// session_start();


// if(isset($_SESSION['ID'])){
    // echo 'welcome' . $_SESSION['ID'].'<br/>';
    // echo ' <a href = "../process/logout.php?logout">Logout</a>';
// }
// else{
    // header("location:signin.php");
// }
?>
<?php
include_once "../process/db_connection.php";
$statement = $pdo->prepare('SELECT * from blog');
$statement->execute();
$result = $statement->fetchall(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container border pt-4" style="">

<div class="card mb-3" style="width :60%; margin:0 auto;">
    <div class="card-body">
        <h5 class="card-title">Title</h5>
        <h6 class="card-subtitle mb-2 text-muted">Author</h6>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
    </div>
</div>
</div>
</body>
</html>