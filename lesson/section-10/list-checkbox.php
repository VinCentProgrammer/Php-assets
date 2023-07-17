<?php

if(isset($_POST['btn_add'])){
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    if(isset($_POST['cat'])){
        #1. Cách xử lí thứ 1
        foreach($_POST['cat'] as $value){
            echo $value . "<br>";
        }
        #2. Cách xử lí thứ 2
        $list_cat = implode(', ', $_POST['cat']);
        echo $list_cat;
    }else 
        echo "Bạn cần chọn danh mục!";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhận dữ liệu từ list checkbox</title>
</head>
<body>
    <h2>Chọn danh mục</h2>
    <form action="" method="POST">
        <input type="checkbox" name="cat[]" id="cat_1" value="1">
        <label for="cat_1">Thể thao</label><br>
        <input type="checkbox" name="cat[]" id="cat_2" value="2">
        <label for="cat_2">Xã hội</label><br><br>
        <input type="submit" value="Lựa chọn" name="btn_add">
    </form>
</body>
</html>