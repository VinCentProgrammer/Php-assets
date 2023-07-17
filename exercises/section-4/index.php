<?php
// ====================
// Bai Tap Phan 4
// ====================
/*CHECKLIST:
1. Tạo biến lưu trữ danh sách thành viên
2. Tạo biến lưu trữ danh sách sản phẩm
3. Hiển thị thông tin cá nhân
    3.1. Tạo giao diện HTML
    3.2. Tạo biến lưu trữ dữ liệu
    3.3. Đổ dữ liệu lên HTML
*/

$list_users = array();
$listUsers = array();
$users = array();

$list_product = array();
$listProduct = array();
$products = array();


$lastname = "Dũng";
$day_of_birth = "21/12/2004";
$my_weight = "50Kg";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập phần 4</title>
</head>
<body>
    <p>Tôi là <strong><?php echo $lastname; ?></strong>, sinh năm <strong><?php echo $day_of_birth; ?></strong>, cân nặng <strong><?php echo $my_weight; ?></strong></p>
</body>
</html>