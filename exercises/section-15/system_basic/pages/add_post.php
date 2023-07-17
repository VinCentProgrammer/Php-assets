<?php
session_start();
// show_array($_POST);
// show_array($_FILES);

if (isset($_POST['btn_add_post'])) {

    $error = array();

    #Xử lí validation tiêu đề bài viết
    if (empty($_POST['post_title'])) {
        $error['post_title'] = 'Không được để trống tiêu đề bài viết!';
    } else {
        $post_title = $_POST['post_title'];
    }

    #Xử lí nội dung mô tả ngắn
    $post_desc = $_POST['post_desc'];

    #Xử lí validation chi tiết bài viết
    if (empty($_POST['post_detail'])) {
        $error['post_detail'] = 'Không được để trống chi tiết bài viết!';
    } else {
        $post_detail = $_POST['post_detail'];
    }

    #Xử lí nội dung ảnh đại diện bài viết
    //1. Định dạng ảnh
    $type_allow = array('png', 'jpg', 'jpeg', 'gif');
    $type = strtolower(pathinfo($_FILES['post_thumb']['name'], PATHINFO_EXTENSION));
    $upload_dir = 'public/images/';
    $upload_file = $upload_dir . $_FILES['post_thumb']['name'];
    $ok = 0;

    if (!in_array($type, $type_allow)) {
        $error['post_thumb'] = 'Hình ảnh phù hợp có định dạng đuôi file là png, jpg, gif, jpeg!';
    } else {
        //2. Kích thước ảnh
        $file_size = $_FILES['post_thumb']['size'];
        if ($file_size > 29000000) {
            $error['post_thumb'] = 'Hình ảnh phù hợp có kích thước < 20MB!';
        } else {
            //3. Xử lí trùng hình ảnh

            if (file_exists($upload_file)) {
                //Đổi tên mới
                $file_name_current = pathinfo($_FILES['post_thumb']['name'], PATHINFO_FILENAME);
                $file_name_new = $file_name_current . ' - Copy.';
                $upload_file_new = $upload_dir . $file_name_new . $type;

                $cnt = 1;
                while (file_exists($upload_file_new)) {
                    $file_name_new = $file_name_current . " - Copy - ($cnt).";
                    $upload_file_new = $upload_dir . $file_name_new . $type;
                    $cnt++;
                }

                $upload_file = $upload_file_new;
            }

            if (empty($error)) {
                if (move_uploaded_file($_FILES['post_thumb']['tmp_name'], $upload_file)) {
                    $ok = true;
                };
            }
        }
    }

    if ($ok)
        $post_thumb = $upload_file;
    else
        $post_thumb = '';


    $info_post = array(
        'post_title' => $_POST['post_title'],
        'post_desc' => $_POST['post_desc'],
        'post_detail' => $_POST['post_detail'],
        'post_thumb' => $post_thumb
    );

    if (empty($error)) {
        $_SESSION['list_post'][] = $info_post;
    }
}
// show_array($info_post);


?>


<div id="content">
    <h3>Thêm thông tin bài viết</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="post_title">Tiêu đề bài viết:</label><br>
        <textarea name="post_title" id="post_title" cols="50" rows="2"><?php echo set_value('post_title'); ?></textarea><br>
        <?php echo form_error('post_title'); ?>
        <label for="post_decs">Mô tả ngắn:</label><br>
        <textarea name="post_desc" id="post_desc" cols="50" rows="2"><?php echo set_value('post_desc'); ?></textarea><br>
        <label for="post_detail">Chi tiết bài viết:</label><br>
        <textarea class="ckeditor" name="post_detail" id="post_detail" cols="50" rows="2"><?php echo set_value('post_detail'); ?></textarea><br>
        <?php echo form_error('post_detail'); ?>
        <label for="post_thumb">Ảnh đại điện:</label><br>
        <input type="file" name="post_thumb" id="post_thumb"><br>
        <?php echo form_error('post_thumb'); ?>
        <br>
        <input type="submit" value="Thêm bài viết" name="btn_add_post">
    </form>
</div>