
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/login.css">
    <title>Page Login</title>
</head>

<body>
    <div id="wp-page-login">
        <form action="" method="post">
        <h2>Login</h2>
            <input type="text" name="username" id="username" placeholder="Username" value="<?php if(is_cookie_login()) echo $_COOKIE['user_login']; else echo set_value('username');?>">
            <?php echo form_error('username'); ?>
            <input type="password" name="password" id="password" placeholder="Password">
            <?php echo form_error('password'); ?>
            <div class="remember-me">
                <input type="checkbox" name="remember_me" id="remember_me"><label for="remember_me">Remember me</label>
            </div>
            <?php echo form_error('account'); ?>
            <input type="submit" value="Login" name="btn_login" id="btn-login">
            <a id="lost-pass" href="?mod=users&action=resetPass">Lost password | </a>
            <a id="link-reg" href="?mod=users&action=reg">Register</a>
        </form>
    </div>

</body>

</html>