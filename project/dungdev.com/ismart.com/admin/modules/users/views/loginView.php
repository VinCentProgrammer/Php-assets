<?php
global $alert;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/reset.css">
    <link rel="stylesheet" href="public/style.css">
    <title>Page Login</title>
</head>
<body>
    <div id="wp-page-login">
        <form action="" method="post" id="wp-page-login">
            <h2>Login</h2>
            <input type="text" name="username" placeholder="Enter your username" value="<?php echo set_value('username') ?>">
            <?php echo form_error('username') ?>
            <input type="password" name="password"  placeholder="Enter your password">
            <?php echo form_error('password') ?>
            <?php if(!empty($alert)) echo $alert; ?>
            <input type="submit" value="Login" name="btn_login">
        </form> 
        <a href="<?php echo base_url('?mod=users&controller=index&action=reset_pass') ?>">Forgot password?</a>
    </div>
</body>
</html>