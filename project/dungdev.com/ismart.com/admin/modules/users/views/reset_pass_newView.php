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
    <title>Page Reset Password</title>
</head>
<body>
    <div id="wp-page-login">
        <form action="" method="post" id="wp-page-login">
            <h2>Reset Password</h2>
            <input type="password" name="password" placeholder="Enter your password new">
            <?php echo form_error('password') ?>
            <?php if(!empty($alert)) echo $alert; ?>
            <input type="submit" value="Set" name="btn_reset_pass_new">
        </form>
    </div>
</body>
</html>