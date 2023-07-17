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
            <input type="email" name="email" placeholder="Enter your email" value="<?php echo set_value('email') ?>">
            <?php echo form_error('email') ?>
            <?php if(!empty($alert)) echo $alert; ?>
            <input type="submit" value="Send" name="btn_reset_pass">
        </form>
    </div>
</body>
</html>