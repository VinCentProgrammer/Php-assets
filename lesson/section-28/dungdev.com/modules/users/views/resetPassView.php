<?php 
global $alert, $error, $email;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/login.css">
    <title>Page Reset Password</title>
</head>

<body>
    <div id="wp-page-login">

        <form action="" method="post">
            <h2>Reset Password</h2>
            <input type="email" name="email" id="email" placeholder="Enter email" value="<?php echo set_value('email'); ?>">
            <?php echo form_error('email'); ?>
            <?php if(!empty($alert['check_email'])) echo "<p class = 'error'>{$alert['check_email']}</p>";?>
            <?php if(!empty($alert['check_email_invalid'])) echo "<p class = 'error'>{$alert['check_email_invalid']}</p>";?>
            <input type="submit" value="Send request" name="btn_reset_pass" id="btn-login">
        </form>
    </div>

</body>

</html>