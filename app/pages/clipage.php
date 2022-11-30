<?php

$result = '';
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $command = $_POST['command'];
    if (empty($command)){

    }

    $split_command = explode(" ", $command);
    $permited_commands = ['echo', 'getmac'];
    $result = exec($command);
    // $result = execve($command);

    if (in_array($split_command[0], $permited_commands)) {
        $result = exec($command);
    } else {
        $result = 'command not found';
    }
 }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLI</title>
</head>
<body>
   <form action="">

   <span>$</span>
   <input type="text" name ="command" Required>
   <button type="submit">RUN</button>
   </form>
   <div>
    <p>
     <?php echo '<pre>';
     print_r('hello');
     echo '</pre>' ;?>
    </p>
   </div> 
</body>
</html>