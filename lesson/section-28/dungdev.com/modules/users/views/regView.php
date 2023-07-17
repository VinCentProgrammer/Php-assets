<?php
global $alert;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/reg.css">
    <title>Page Register Account</title>
</head>

<body>
    <div id="wp-page-reg">
        <form action="" method="post">
            <h2>Register</h2>
            <input type="text" name="fullname" id="fullname" placeholder="Fullname" value="<?php echo set_value('fullname'); ?>">
            <?php echo form_error('fullname'); ?>
            <input type="text" name="username" id="username" placeholder="Username" value="<?php echo set_value('username'); ?>">
            <?php echo form_error('username'); ?>
            <input type="email" name="email" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
            <?php echo form_error('email'); ?>
            <input type="password" name="password" id="password" placeholder="Password">
            <?php echo form_error('password'); ?>
            <?php echo form_error('account'); ?>
            <input type="submit" value="Register" name="btn_reg" id="btn-reg">
            <?php if (!empty($alert['reg_success'])) echo "<p class = 'success_reg'>{$alert['reg_success']} </p>"; ?>
            <?php if(!empty($_SESSION['confirm_email'])) echo "<p class = 'success_confirm'>{$_SESSION['confirm_email']} </p>";  ?>
            <a href="?mod=users&action=login">Login</a>
        </form>
    </div>

</body>

</html>