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

    $blogs = [];
    foreach ($blogids as $id) {
        $stm = $pdo->prepare("SELECT * FROM blog WHERE Blog_id = :id");
        $stm->bindValue(':id', $id);
        $stm->execute();
        $res = $stm->fetchAll(PDO::FETCH_ASSOC);
        $blogs[] = $res;
    }
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

    <div class="container pt-4">

        <?php if (empty($blogids)) : ?>
            <div class="mt-4">
                <h3>No Favorite blog yet!!!</h3>
            </div>
        <?php else : ?>
            <?php foreach ($blogs as $blog) : ?>

                <div class="card mb-3 shadow-sm rounded" style="width :60%; margin:0 auto;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $blog[0]['Title'];  ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $blog[0]['Author'];  ?></h6>
                        <p class="card-text"><small class="text-muted"><?php echo $blog[0]['Date'];  ?></small></p>
                        <p class="card-text"><?php echo $blog[0]['Article'];  ?></p>
                        <form action="./view.php" method="post" style="display: inline;">
                            <input type="hidden" name="blogid" value="<?php echo $blog[0]['Blog_id'] ?>">
                            <button type="submit" class="btn">View Article</button>
                        </form>
                        <form action="../process/remove_fav.php" method="post" style="display: inline;">
                            <input type="hidden" name="blogid" value="<?php echo $blog[0]['Blog_id'] ?>">
                            <button type="submit" class="btn" style="color: red;">Remove</button>
                        </form>

                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>

</body>

</html>