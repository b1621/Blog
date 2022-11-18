<?php

session_start();

include_once "../process/db_connection.php";

if (isset($_SESSION['ID'])) {


    $statement = $pdo->prepare('SELECT * from blog');
    $statement->execute();
    $result = $statement->fetchall(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // echo $_POST['blogid'];
        // $blogid = $_POST['blogid'];
        // echo $blogid;
    }
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

    <body style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.9) 75%, #000 100%),url('../assets/img/wh.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  background-position: center;">
        <?php include_once './components/adminnav.php' ?>
        <div class="container border pt-4">

            <?php if (empty($result)) : ?>
                <div>
                    <h3>No blog yet!!!</h3>
                </div>
            <?php else : ?>
                <?php foreach ($result as $i => $blog) : ?>
                    <div class="card mb-3" style="width :60%; margin:0 auto; background-color: rgb(0,0,0,0.5);">
                        <div class="card-body">
                            <h5 class="card-title" style="color:white; font-size:1.5rem;"><?php echo $blog['Title'];  ?></h5>
                            <h6 class="card-subtitle mb-2 " style="color:rgb(255,255,255,0.5);"><?php echo $blog['Author'];  ?></h6>
                            <p class="card-text"><small  style="color:grey;"><?php echo $blog['Date'];  ?></small></p>
                            <p class="card-text" style="color:white;"><?php echo $blog['Article'];  ?></p>

                            <form action="" method="post" style="display: inline;">
                                <input type="hidden" name="blogid" value="<?php echo $blog['Blog_id'] ?>">
                                <button type="submit" class="btn" style="background-color: #04AA6D;
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  height:50;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px ;">View</button>
                            </form>
                            <form action="../process/delete_blog.php" method="post" style="display: inline;">
                                <input type="hidden" name="blogid" value="<?php echo $blog['Blog_id'] ?>">
                                <button type="submit" class="btn" style="background-color: #0415aa;
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  height:50;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px ;">Edit</button>
                            </form>
                            <form action="../process/delete_blog.php" method="post" style="display: inline;">
                                <input type="hidden" name="blogid" value="<?php echo $blog['Blog_id'] ?>">
                                <button type="submit" class="btn" style="background-color: #aa0404;
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  height:50;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px ;">Delete</button>
                            </form>

                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </body>

    </html>
<?php

} else {
    header("location:signin.php");
}
?>