
<?php
#Lấy dữ liệu từ textbox
//Kiểm tra submit form
// if(isset($_POST['btn_login'])){
//     $username = $_POST['username'];
//     echo $username;
// }
#Kiểm tra dữ liệu gửi lên server có trống không
if(isset($_POST['btn_login'])){
    $username = $_POST['username'];
    if(empty($username))
        echo "Không được để trống tên đăng nhập!";
    else
        echo $username;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lấy dữ liệu từ textbox</title>
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