<?php
require "db/database.php";
require "db/config.php";
require "lib/validation.php";

db_connect($config);

// require "lib/users.php";/

if (isset($_POST['btn_login'])) {
    $error = array();

    #Validation username
    if (empty($_POST['username'])) {
        //Hạ cờ
        $error['username'] = 'Username cannot be left blank!';
    } else {
        if ((strlen($_POST['username']) < 6) || (strlen($_POST['username']) > 32)) {
            $error['username'] = 'Username is between 6 and 32 characters!';
        } else {
            if (!is_username($_POST['username'])) {
                $error['username'] = 'Username includes letters, numbers, periods, underscores, from 6 - 32 characters!';
            } else {
                $username = $_POST['username'];
            }
        }
    }
    #Validation password
    if (empty($_POST['password'])) {
        $error['password'] = 'Password cannot be left blank!';
    } else {
        if (!is_password($_POST['password'])) {
            $error['password'] = 'Passwords include letters, numbers, special characters, start with an uppercase letter and have 6 to 32 characters!';
        } else {
            $password = md5($_POST['password']);
            // $password = $_POST['password'];
        }
    }


    #Kết luận
    if (empty($error)) {
        // $sql = "SELECT * FROM `tbl_users` WHERE `username` = '{$username}' AND `password` = '{$password}' ";
        // $sql = "SELECT * FROM `tbl_users` WHERE `username` = '". $username ."' AND `password` = '".$password."' ";
        $sql = "SELECT * FROM `tbl_users` WHERE `username` = '". mysqli_escape_string($conn, $username) ."' AND `password` = '".mysqli_escape_string($conn, $password)."' ";
        
        $res = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res) > 0){
            echo "Duoc phep dang nhap";
        }else
            echo "Khong duoc phep dang nhap";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/login.css">
    <title>Page Login</title>
</head>

<body>
    <div id="wp-page-login">
        <h2>Login</h2>
        <form action="" method="post">
            <input type="text" name="username" id="username" placeholder="Username" value="">
            <?php echo form_error('username'); ?>
            <input type="password" name="password" id="password" placeholder="Password">
            <?php echo form_error('password'); ?>
            <div class="remember-me">
                <input type="checkbox" name="remember_me" id="remember_me"><label for="remember_me">Remember me</label>
            </div>
            <?php echo form_error('login'); ?>
            <input type="submit" value="Login" name="btn_login" id="btn-login">
            <a id="lost-pass" href="">Lost Password</a>
        </form>
    </div>

</body>

</html>