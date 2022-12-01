<?php


$result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $command = $_POST['command'];

    if ($command) {
        $split_command = explode(" ", $command);
        $permited_commands = ['echo', 'getmac', 'arp'];
        // $result = exec($command);
        $not_permitted = ['|', '||', '&', '&&'];
        $exist = false;
        foreach ($not_permitted as $sign) {
            if (in_array($sign, $split_command)) {
                $exist = true;
            }
        }

        if ($exist) {
            $result = 'unauthorized code !! ';
        } else {

            if (in_array($split_command[0], $permited_commands)) {
                $result = exec($command);
            } else {
                $result = 'command not found';
            }
        }
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

<body style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.9) 75%, #000 100%),url('../assets/img/wh.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  background-position: center;">

    <div class="container  pt-5">
        <!-- <div class="row">
            <form action="" method="POST" class="">
                <span>>></span>
                <input type="text" name='command' class="form-control" required>
                <button type="submit">run</button>
            </form>
        </div> -->
        <div class=" p-2">
            <form action="" method="post" class="mt-5">
                <div class="input-group mb-3 w-75">
                    <input type="text" class="form-control " name="command" required placeholder="$">
                    <button class="btn btn-secondary" type="submit" id="button-addon2">Run</button>
                </div>
            </form>
            <div class="fs-4 text-light">
                <p><?php echo '<pre>';
                    print_r($result);
                    echo '</pre>'; ?></p>
            </div>
        </div>
    </div>
</body>

</html>