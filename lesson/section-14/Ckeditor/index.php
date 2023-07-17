
<?php
if(isset($_POST['btn_add'])){
    echo $_POST['post_content'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="ckeditor/ckeditor.js"></script>
    <title>Tích hợp trình soạn thảo văn bản - Ckeditor vào website</title>
</head>
<body>
    <style>
        #content{
            width: 960px;
            margin: 0 auto;
        }
    </style>
    
    <div id="content">
    <h1>Tích hợp trình soạn thảo văn bản</h1>
        <form action="" method="post">
            <textarea class="ckeditor" name="post_content" id="post_content" cols="30" rows="10"></textarea><br>
            <input type="submit" value="Thêm bài viết" name="btn_add">
        </form>
    </div>
    
</body>
</html>