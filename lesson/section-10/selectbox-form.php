<?php
if(isset($_POST['btn_choice'])){
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    $show_pay = array(
        'cod' => 'Thanh toán tại nhà',
        'banking' => 'Thanh toán online'
    );

    if(empty($_POST['pay'])){
        echo "Bạn cần lựa chọn hình thức thanh toán!";
    }else{
        $pay = $_POST['pay'];
        echo $show_pay[$pay];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhận dữ liệu từ select box</title>
</head>
<body>
    <h2>Chọn hình thức thanh toán</h2>
    <form action="" method="POST">
        <label for="pay">Lựa chọn hình thức thanh toán</label><br><br>
        <select name="pay" id="pay">
            <option value="">--Chọn hình thức--</option>
            <option value="cod" selected = "selected">Thanh toán tại nhà</option>
            <option value="banking">Thanh toán online</option>
        </select>
        <input type="submit" value="Lựa chọn" name="btn_choice">
    </form>
</body>
</html>