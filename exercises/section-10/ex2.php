<?php
/*
2. Lấy dữ liệu form đăng kí bao gồm: Họ và Tên, Tên đăng nhập, Mật khẩu,Email, Số điện thoại, Giới tính
CHECKLSIT: 
B1: Tạo form đăng kí
B2: Kiểm tra submit form
B3: Kiểm tra dữ liệu và gán dữ liệu
B4: Xuất dữ liệu

*/

function show_array($data){
    if(is_array($data)){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}


if(isset($_POST['btn_reg'])){
    $error = array();
    //fullname
    if(!empty($_POST['fullname'])){
        $fullname = $_POST['fullname'];
    }else{
        $error['fullname'] = "Bạn không được để trống họ và tên";
    }
    //username
    if(!empty($_POST['username'])){
        $username = $_POST['username'];
    }else{
        $error['username'] = "Bạn không được để trống tên đăng nhập";
    }
    //password
    if(!empty($_POST['password'])){
        $password = $_POST['password'];
    }else{
        $error['password'] = "Bạn không được để trống mật khẩu";
    }
    //email
    if(!empty($_POST['email'])){
        $email = $_POST['email'];
    }else{
        $error['email'] = "Bạn không được để trống email";
    }
    //phone
    if(!empty($_POST['phone'])){
        $phone = $_POST['phone'];
    }else{
        $error['phone'] = "Bạn không được để trống số điện thoại";
    }
    //gender
    $show_gender = array(
        'male' => 'Nam',
        'female' => 'Nữ'
    );

    if(isset($_POST['gender'])){
        $gender = $_POST['gender'];
    }else{
        $error['gender'] = "Bạn cần chọn giới tính";
    }


    if(empty($error)){
        echo "{$fullname} -- {$username} -- {$password} -- {$email} -- {$phone} -- {$show_gender[$gender]}";
    }else
        show_array($error);
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
    <h2>Form Register</h2>
    <form action="" method="post">
        <label for="fullname">Họ và Tên</label><br>
        <input type="text" name="fullname" id="fullname"><br>
        <label for="username">Tên đăng nhập</label><br>
        <input type="text" name="username" id="username"><br>
        <label for="password">Mật khẩu</label><br>
        <input type="password" name="password" id="password"><br>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email"><br>
        <label for="phone">Số điện thoại</label><br>
        <input type="text" name="phone" id="phone"><br>
        <label for="gender">Chọn giới tính</label><br>
        <input type="radio" name="gender" id="male" value="male">
        <label for="male">Nam</label>
        <input type="radio" name="gender" id="female" value="female">
        <label for="female">Nữ</label><br><br>
        <input type="submit" value="Register" name="btn_reg">
    </form>
</body>
</html>