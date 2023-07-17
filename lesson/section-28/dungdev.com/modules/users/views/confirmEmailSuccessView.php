<?php 
// global $error;
// show_array($error);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/login.css">
    <title>Set Password</title>
</head>

<body>
    <div id="wp-page-login">
        <form action="" method="post">
        <h2>Set Password</h2>
            <input type="password" name="password" id="password" placeholder="New Password">
            <?php echo form_error('password'); ?>
            <input type="submit" value="Set password new" name="btn_set_pass_new" id="btn-login">
        </form>
    </div>

</body>

</html>