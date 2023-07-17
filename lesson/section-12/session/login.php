<?php
session_start();

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
            $pattern = "/^[A-Za-z0-9_\.]{6,32}$/";
            if(!preg_match($pattern, $_POST['username'], $matchs)){
                $error['username'] = 'Username bao gồm kí tự chữ cái, chữ số, dấu chấm, dấu gạch dưới, từ 6 - 32 kí tự!'; 
            }else{
                $username = $_POST['username'];
            }
        }
    }

    if(empty($_POST['password'])){
        $error['password'] = 'Không được để trống password!';
    }else{
        $pattern = "/^([A-Z]{1}([\w_\.!@#$%^&*()]+){5,31})$/";
        if(!preg_match($pattern, $_POST['password'], $matchs)){
            $error['password'] = 'Password bao gồm kí tự chữ cái, chữ số, kí tự đặc biệt, bắt đầu chữ cái hoa và có 6 đến 32 kí tự!'; 
        }else{
            $password = $_POST['password'];
        }
    }
    
    //Kết luận
    if(empty($error)){
        $data = array(
            'username' => 'dungken2112',
            'password' => 'Dungken@!!@'
        );
        if($data['username'] == $username && $data['password'] == $password){
            $_SESSION['is_login'] = true;
            $_SESSION['user_login'] = $username;
            header('location: index.php');
        }else echo "Tai khoan khong ton tai";   
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuyen huong file trong PHP</title>
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