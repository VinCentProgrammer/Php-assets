<?php
#File xử lí hiện tại
echo "<pre>";
print_r($_SERVER);
echo "</pre>";

#Kiểm tra submit form
if($SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo $username . '-' . $password;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phương thức truyền dữ liệu POST</title>
</head>
<body>
    <h2>Form Login</h2>
    <form action="" method="post">
        <label for="username">Username</label><br>
        <input type="text" name="username" id="username"><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password"><br><br>
        <input type="submit" value="Login" name="btn_login">
    </form>
</body>
</html>