<?php

if(isset($_POST['btn_add'])){
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    if(!empty($_POST['post_detail'])){
        $detail = $_POST['post_detail'];
        echo $detail;
    }else
        echo "Bạn cần nhập chi tiết bài viết!";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhận dữ liệu từ textarea</title>
</head>
<body>
    <h2>Thêm bài viết</h2>
    <form action="" method="POST">
        <label for="post_detal">Chi tiết</label>
        <br>
        <textarea name="post_detail" id="post_detail" cols="30" rows="10">Nhập chi tiết bài viết</textarea><br>
        <input type="submit" value="Thêm bài viết" name="btn_add">
    </form>
</body>
</html>