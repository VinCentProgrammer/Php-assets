<?php
/*
3. Tạo link và lấy thông tin từ url
*/
$mod = $_GET['mod'];
$act = $_GET['act'];
echo "{$mod} -- {$act}";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo link và lấy thông tin từ URL</title>
</head>
<body>
    <a href="?mod=product&act=main">Sản phẩm</a>
</body>
</html>