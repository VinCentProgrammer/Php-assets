<?php
require "db/database.php";
require "db/config.php";

setcookie('user_login', 'dungken', time() + 3600);
setcookie('is_login', true, time() + 3600);

db_connect($config);


if(isset($_POST['btn_comment'])){
    $username = $_POST['username'];
    $content = htmlentities($_POST['content']);

    echo $content;
    
    $sql = "INSERT INTO `tbl_comment` (`username`, `content`) VALUES ( '{$username}', '{$content}');";
    $res = mysqli_query($conn, $sql);
    if($res){
        echo "Them binh luan thanh cong";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lỗ hổng XSS</title>
</head>
<body>
    <style>
        form label, form input{
            display: block;
        }
    </style>
    <h2>Bình luận</h2>
    <form action="" method="post">
        <label for="username">Tên đăng nhập</label>
        <input type="text" name="username" id="username">
        <label for="content">Nội dung</label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <input type="submit" value="Thêm bình luận" name="btn_comment">
    </form><br><br>
    <?php 
        $list_comment = db_fetch_array("SELECT * FROM `tbl_comment`");
        foreach($list_comment as $comment){
            echo "{$comment['username']}: "."{$comment['content']} <br>";
        }    
    ?>
</body>
</html>