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
            
            <p>Xin chào <strong><?php if(is_login()) echo get_info('fullname', $_SESSION['user_login']); ?></strong> (<a href="?mod=user&act=logout">Thoát</a>)</p>
        </div>
        <div id="header" class="mod-home">
            <a href="?">Home</a>
            <a href="?mod=user&act=main">List user</a>
            <a href="?mod=page&act=detail&id=1">About</a>
            <a href="?mod=page&act=detail&id=2">Contact</a>
        </div>