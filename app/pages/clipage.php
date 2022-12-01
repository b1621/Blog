<?php


$result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $command = $_POST['command'];

    if ($command) {
        $split_command = explode(" ", $command);
        $permited_commands = ['echo', 'getmac', 'arp'];
        $result = exec($command);
        $not_permitted = ['|', '||', '&', '&&'];
        $exist = false;
        foreach ($not_permitted as $sign) {
            if (in_array($sign, $split_command)) {
                $exist = true;
            }
        }

        if ($exist) {
            $result = 'unauthorized code !! ' . '<br>' . "you cannot use ' | ' in your command";
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
<style>
    span {
        position: relative;
        left: 30px;
    }

    input {
        outline: none;
        padding: 5px;
        padding-left: 30px;
        border: none;
        font-size: large;
   
    }

    div {
        border-top: solid 1px black;
    }
</style>
<form action="" method="POST">
    <span>>></span>
    <input type="text" name='command' required>
    <button type="submit">run</button>
</form>
<div>
    <p><?php echo '<pre>';
        print_r($result);
        echo '</pre>'; ?></p>
</div>