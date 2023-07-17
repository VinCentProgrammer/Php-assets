<?php
# Phương thức GET xử lí tại File khác
# Phương thức GET xử lí tại File hiện tại
function show_array($data){
    if(is_array($data)){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

// show_array($_SERVER);
//Kiểm tra submit form

if(isset($_GET['btn_search'])){
    $q = $_GET['q'];
    echo $q;
}


# Nhận dữ liệu từ URL

// $mod = $_GET['mod'];
// $act = $_GET['act'];
// $id = $_GET['id'];

// echo "{$mod} -- {$act} -- {$id}";

# Khi nào thì sử dụng phương thức GET


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phương thức truyền dữ liệu GET</title>
</head>
<body>
    <a href="?mod=product&act=detail&id=1268">Sản phẩm</a>
    <h2>Form Search</h2>
    <form action="" method="GET">
        <input type="text" name="q" id="q">
        <input type="submit" value="Search" name="btn_search">
    </form>
</body>
</html>