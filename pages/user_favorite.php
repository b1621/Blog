<?php
session_start();

include_once '../process/db_connection.php';

$user_id =  $_SESSION['ID'];

$statment = $pdo->prepare('SELECT * FROM favorite WHERE User_id = :userid');
$statment->bindValue(':userid', $user_id);
$statment->execute();

$result = $statment->fetchAll(PDO::FETCH_ASSOC);

$blogids = [];

foreach ($result as $x => $val) {
    $blogids[] = $val['Blog_id'];
}
if (isset($blogids)) {
    echo 'there is vlaue';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <?php include_once './usernav.php'; ?>
    favorite
</body>

</html>