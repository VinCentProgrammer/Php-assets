<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Hệ thống điều hướng cơ bản</title>
</head>

<body>
    <div id="wrapper">
        <div id="wp-logo">
            <h2>DUNG DEV</h2>
            <p>Xin chào <strong><?php if(is_login()) echo get_info_user_login('fullname'); else echo "error"; ?></strong> (<a href="?mod=users&action=logout">Thoát</a>)</p>
        </div>
        <div id="header">
            <a href="?">Trang chủ</a>
            <a href="?mod=page&action=detail&id=1">Giới thiệu</a>
            <a href="?mod=product">Sản phẩm</a>
            <a href="?mod=post">Tin tức</a>
            <a href="?mod=page&action=detail&id=2">Liên hệ</a>
        </div>