<?php
session_start();

include_once '../process/db_connection.php';

$blogid =  $_POST['blogid'];

$statment = $pdo->prepare('SELECT * FROM blog WHERE Blog_id = :blogid');
$statment->bindValue(':blogid', $blogid);
$statment->execute();

$result = $statment->fetch(PDO::FETCH_ASSOC);

$date = $result['Date'];
$changed_date = date("j F, Y, g:i a", strtotime($date));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Article</title>
</head>

<body style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.9) 75%, #000 100%),url('../assets/img/wh.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  background-position: center; color: white">

    <?php
    include_once './components/adminnav.php';
    ?>

    <div class="container ">
        <div class="mt-5" style="margin-top: 20px ;">
            <h1><?php echo $result['Title'] ?></h1>

            <p class="text-muted">written by <?php echo $result['Author'], ' | ', $changed_date ?> </p>

            <p style="width: 75%;"><?php echo $result['Article'] ?></p>

        </div>

    </div>
</body>

</html>