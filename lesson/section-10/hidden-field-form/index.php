<?php
function show_array($data){
    if(is_array($data)){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

if(isset($_POST['btn_login'])){
    $info_user = array(
        'username' => 'dungken2112',
        'password' => 'dungken@!!@'
    );

    $error = array();

    //Kiểm tra và gán dữ liệu username
    if(empty($_POST['username']))
        $error['username'] = 'Bạn không được để trống username';
    else 
        $username = $_POST['username'];

    //Kiểm tra và gán dữ liệu password
    if(empty($_POST['password']))
        $error['password'] = 'Bạn không được để trống password';
    else 
        $password = $_POST['password'];

    $username = $_POST['username']; 
    $password = $_POST['password'];

    if(empty($error)){
        if($username == $info_user['username'] && $password == $info_user['password']){
            $redirect_to = $_POST['redirect_to'];
            header("location: {$redirect_to}");
        }else
            $error['login'] = 'Username hoặc password không chính xác';
    }
    if(!empty($error))
        show_array($error);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Truyền dữ liệu hidden field</title>
</head>
<body>
    <h2>Form Login</h2>
    <form action="" method="POST">
        <label for="username">Username</label><br>
        <input type="text" name="username" id="username"><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password"><br>
        <input type="hidden" name="redirect_to" value="cart.php"><br>
        <input type="submit" value="Login" name="btn_login">
    </form>
</body>
</html>