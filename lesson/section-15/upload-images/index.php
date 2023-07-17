<?php
require "lib/data.php";


if(isset($_FILES['file'])){

    $error = array();

    show_array($_FILES);

    $upload_dir = "uploads/";
    $upload_file = $upload_dir . "{$_FILES['file']['name']}";

    $type_allow = array('png', 'jpg', 'gif', 'jpeg');
    $type = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    
    #Kiểm tra đúng định dạng
    if(!in_array($type, $type_allow)){
        $error['file_type'] = 'Chỉ được upload file ảnh có định dạng png, jpg, gif, jpeg';
    }else{
        #Kiểm tra kích thước phù hợp
        $file_size = $_FILES['file']['size'];
        if($file_size > 29000000){
            $error['file_size'] = 'Chỉ được upload file ảnh có kích thướt < 20 MB';
        }
        #Kiểm tra file tồn tại hệ thống
        
        if(file_exists($upload_file)){
            //Thuật toán đổi tên khi bị trùng
            
            $file_name_current = basename($_FILES['file']['name'], ".$type");
            $file_name_new =  "$file_name_current - Copy.$type";
            $upload_file_new = "$upload_dir". $file_name_new;

            $cnt = 1;
            while(file_exists($upload_file_new)){
                $file_name_new =  "$file_name_current - Copy ($cnt).$type";
                ++$cnt;
                $upload_file_new = "$upload_dir". $file_name_new;
            }

            $upload_file = $upload_file_new;

        }else{
            $upload_file = $upload_dir . "{$_FILES['file']['name']}";
        }
    }

    if(!empty($error)){
        show_array($error);
    }else {
        if(move_uploaded_file($_FILES['file']['tmp_name'], $upload_file))
            echo "<img src='{$upload_file}'>";
    };
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File Images Lên Server</title>
</head>
<body>
    <h2>Upload File</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" id="file"><br><br>
        <input type="submit" value="Upload File">
    </form>
</body>
</html>