<?php

require "lib/validation.php";

function show_array($data){
    if(is_array($data)){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}


if(isset($_POST['btn_login'])){
    // show_array($_POST);
    $error = array(); // Phất cờ
    if(empty($_POST['username'])){
        //Hạ cờ
        $error['username'] = 'Không được để trống username!'; 
    }else{
        if((strlen($_POST['username']) < 6) || (strlen($_POST['username']) > 32)){
            $error['username'] = 'Username có từ 6 đến 32 kí tự!'; 
        }else{
            if(!is_username($_POST['username'])){
                $error['username'] = 'Username bao gồm kí tự chữ cái, chữ số, dấu chấm, dấu gạch dưới, từ 6 - 32 kí tự!'; 
            }else{
                $username = $_POST['username'];
                echo $username;
            }
        }
    }

    if(empty($_POST['password'])){
        $error['password'] = 'Không được để trống password!';
    }else{
        $password = $_POST['password'];
    }
    //Kết luận
    if(empty($error)){
        echo "Username: {$username} <br> Password: {$password}";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm tra dữ liệu đúng định dạng</title>
</head>
<body>
    <style>
        p.error{
            color: tomato;
        }
    </style>
    <h2>Form Login</h2>
    <form action="" method="POST">
        <label for="username">Username</label><br>
        <input type="text" name="username" id="username"><br>
        <p class="error"><?php if(!empty($error['username'])) echo $error['username']; ?></p>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password"><br>
        <p class="error"><?php if(!empty($error['password'])) echo $error['password']; ?></p>
        <br>
        <input type="submit" value="Login" name="btn_login">
    </form>
</body>
</html>