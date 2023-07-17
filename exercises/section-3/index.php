<?php

/*CHECKLIST:
B1: Xay dung giao dien html
B2: Chuan bi du lieu
B3: Do du lieu len HTML
*/

$fullname = 'Ha Van Dung';
$username = 'dungken2112';
$email = 'dungken2112@gmail.com';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai tap phan 3</title>
</head>
<body>
    <div id="wrapper">
        <p>Ho va Ten: <strong><?php echo $fullname; ?></strong></p>
        <p>Username: <strong><?php echo $username; ?></strong></p>
        <p>Email: <strong><?php echo $email; ?></strong></p>
    </div>
</body>
</html>