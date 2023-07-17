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
        $username = $_POST['username'];
    }

    if(empty($_POST['password'])){
        $error['password'] = 'Không được để trống password!';
    }else{
        $password = $_POST['password'];
    }

    if(empty($_POST['gender'])){
        $error['gender'] = 'Bạn cần chọn giới tính!';
    }else{
        $gender = $_POST['gender'];
    }


    //Kết luận
    // if(empty($error)){
    //     echo "Username: {$username} <br> Password: {$password} <br> Gender: {$gender}";
    // }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sử dụng lại dữ liệu validation</title>
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
        <input type="text" name="username" id="username" value="<?php echo set_value('username') ?>"><br>
        <?php echo form_error('username'); ?>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password"><br>
        <?php echo form_error('password'); ?>
        <label for="gender">Giới tính</label><br>
        <select name="gender" id="gender">
            <option value="">--Chọn--</option>
            <option <?php if(!empty($gender) && $gender == 'male') echo "selected = 'selected'"; ?> value="male">Nam</option>
            <option <?php if(!empty($gender) && $gender == 'female') echo "selected = 'selected'"; ?> value="female">Nữ</option>
        </select><br>
        <?php echo form_error('gender'); ?>
        <br>
        <input type="submit" value="Login" name="btn_login">
    </form>
</body>
</html>