<?php

// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';
$result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // $cmd_list = 'echo , assoc,netstat, tracert, PathPing, getmac, netsh, arp, arp -a, ipconfig, time /t, ';
    $command = $_POST['command'];

    if ($command) {
        $split_command = explode(" ", $command);
        $permited_commands = ['echo', 'getmac', 'arp'];
        $result = exec($command);
        // $result = execve($command);
        $not_permitted = ['|', '||', '&', '&&'];
        $exist = false;
        foreach ($not_permitted as $sign) {
            // echo $sign;
            if (in_array($sign, $split_command)) {
                $exist = true;
            }
            // echo '<br>';
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

    // $a = array("red", "green", "blue", "yellow", "brown", "hello", "one");
    // print_r(array_slice($a, 1, 2));

    // $a = array("red", "green", "blue", "yellow", "brown");
    // print_r(array_slice($a, 0, 3)); // (array, start num, indexoflastelement+1)
    // echo "" | more /user/admins 
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
        /* border-bottom: 1px solid black; */
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