<?php
#1. Lấy giá trị phần tử mảng thông qua key xác định
$user = array(
    'id' => 1,
    'fullname' => 'Hà Văn Dũng',
    'email' => 'dungken2112@gmail.com'
);

//Lấy fullname
// echo $user['fullname'];
$id = $user['id'];
$fullname = $user['fullname'];
$email = $user['email'];
// echo $fullname;


#2. Lấy giá trị phần tử mảng thông qua key mặc định

$list_prime = [2, 3, 5, 7];
//Lấy số nguyên tố bé nhất
echo $list_prime[0];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lấy giá trị của phần tử mảng</title>
</head>
<body>
    <h2>Thông tin cá nhân</h2>
    <p>Id: <strong><?php echo $id; ?></strong></p>
    <p>Họ và Tên: <strong><?php echo $fullname; ?></strong></p>
    <p>Email: <strong><?php echo $email; ?></strong></p>
</body>
</html>