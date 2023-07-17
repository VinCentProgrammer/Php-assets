<?php

if(isset($_POST['btn_reg'])){
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
    $show_gender = array(
        'male' => 'Nam',
        'female' => 'Nữ'
    );

    if(empty($_POST['gender'])){
        echo "Bạn chưa chọn giới tính!";
    }else {
        $gender = $_POST['gender'];
        echo $show_gender[$gender];
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhận dữ liệu từ radio button</title>
</head>
<body>
    <h2>Form Register</h2>
    <form action="" method="POST">
        <input type="radio" name="gender" value="male" id="male">
        <label for="male">Nam</label><br>
        <input type="radio" name="gender" value="female" id="female">
        <label for="female">Nữ</label><br><br>
        <input type="submit" value="Regiter" name="btn_reg">
    </form>
</body>
</html>