<?php
require "lib/data.php";

if(isset($_FILES['file'])){
    // show_array($_FILES);
    $upload_dir = "uploads/";
    $upload_file = $upload_dir . "{$_FILES['file']['name']}";
    if(move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)){
        echo "Xem file<a href='$upload_file'> tại đây</a>";
    }else 
        echo "Upload không thành công!";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File Lên Server</title>
</head>
<body>
    <h2>Upload File</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" id="file"><br><br>
        <input type="submit" value="Upload File">
    </form>
</body>
</html>