<?php
require "lib/data.php";
require "lib/validation.php";





if(isset($_POST['btn_reg'])){
    $error = array();
    //fullname
    if(empty($_POST['fullname'])){
        $error['fullname'] = 'Bạn cần nhập họ và tên!';
    }else{
        //validation
        if(!is_fullname($_POST['fullname'])){
            $error['fullname'] = 'Họ và tên bao gồm kí tự chữ cái, dấu cách và từ 6 - 32 kí tự!';
        }else{
            $fullname = $_POST['fullname'];
        }
    }
    //username
    if(empty($_POST['username'])){
        $error['username'] = 'Bạn cần nhập tên đăng nhập!';
    }else{
        //validation
        if(!is_username($_POST['username'])){
            $error['username'] = 'Tên đăng nhập bao gồm kí tự chữ cái, chữ số, dấu chấm, dấu gạch dưới và từ 6 đến 32 kí tự!';
        }else{
            $username = $_POST['username'];
        }
    }
    //password
    if(empty($_POST['password'])){
        $error['password'] = 'Bạn cần nhập mật khẩu!';
    }else{
        //validation
        if(!is_password($_POST['password'])){
            $error['password'] = 'Mật khẩu yêu cầu bắt đầu bằng chữ cái hoa, sau đó là chữ cái thường, chữ số, kí tự đặc biệt và từ 6 đến 32 kí tự!';
        }else{
            $password = md5($_POST['password']);
        }
    }
    //phone
    if(empty($_POST['phone'])){
        $error['phone'] = 'Bạn cần nhập số điện thoại!';
    }else{
        //validation
        if(!is_phone($_POST['phone'])){
            $error['phone'] = 'Số điện thoại yêu cầu bắt đầu là 84 hoặc 03, 05, 07, 09 và tất cả có 10 chữ số!';
        }else{
            $phone = $_POST['phone'];
        }
    }

    if(empty($error)){
        $info = array(
            'fullname' => $fullname,
            'username' => $username,
            'password' => $password,
            'phone' => $phone
        );
        show_array($info);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Register</title>
</head>
<body>
    <style>
        label, input{
            display: block;
            margin: 5px 0px;
        }
        .error{
            color: red;
            margin: 0;
        }

    </style>
    <h2>Đăng ký</h2>
    <form action="" method="post">
        <label for="fullname">Họ và Tên</label>
        <input type="text" name="fullname" id="fullname" value="<?php echo set_value('fullname') ?>">
        <?php echo form_error('fullname'); ?>
        <label for="username">Tên đăng nhập</label>
        <input type="text" name="username" id="username" value="<?php echo set_value('username') ?>">
        <?php echo form_error('username'); ?>
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" id="password">
        <?php echo form_error('password'); ?>
        <label for="phone">Số điện thoại</label>
        <input type="text" name="phone" id="phone" value="<?php echo set_value('phone') ?>">
        <?php echo form_error('phone'); ?>
        <input type="submit" value="Đăng ký" name="btn_reg">
    </form>
</body>
</html>