<?php
// 1. Lấy dữ liệu form đăng nhập bao gồm: Tên đăng nhập, mật khẩu
/*
CHECKLIST:
B1: Tạo form login
B2: Kiểm tra submit
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

if(isset($_POST['btn_login'])){
    $error = array();

    //username  
    if(!empty($_POST['username']))
        $username = $_POST['username'];
    else
        $error['username'] = "Bạn không được để trống username";

    //password  
    if(!empty($_POST['password']))
        $password = $_POST['password'];
    else
        $error['password'] = "Bạn không được để trống password";

    if(empty($error))
        echo "{$username} - {$password}";
    else   
        show_array($error);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
</head>
<body>
    <h2>Form Login</h2>
    <form action="" method="POST">
        <label for="username">Username</label><br>
        <input type="text" name="username" id="username"><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password"><br><br>
        <input type="submit" value="Login" name="btn_login">
    </form>
</body>
</html>