<?php

function construct()
{
    load_model('index');
}

function indexAction()
{
    $num_rows = get_num_rows_pages();
    //Số lượng bản ghi trên mỗi trang 
    $num_per_page = 3;
    $total_row = $num_rows;
    $num_page = ceil($total_row / $num_per_page);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //Điểm xuất phát
    $start = ($page - 1) * $num_per_page;
    $pages = get_pages($start, $num_per_page, "");
    
    $data['pages'] = $pages;
    $data['num_page'] = $num_page;
    $data['page'] = $page;
    load_view('index', $data);
}

function addAction()
{
    global $error, $title, $slug, $content, $upload_file, $alert;
    if (!empty($_POST['btn-add'])) {
        $error = array();
        //validation title
        if (empty($_POST['title'])) {
            $error['title'] = 'Không được để trống tiêu đề!';
        } else {
            $title = $_POST['title'];
        }
        //validation slug
        if (empty($_POST['slug'])) {
            $error['slug'] = 'Không được để trống slug (url friendly)!';
        } else {
            $slug = $_POST['slug'];
        }
        //validation content
        if (empty($_POST['content'])) {
            $error['content'] = 'Không được để trống nội dung!';
        } else {
            $content = $_POST['content'];
        }
        //validation upload file
        if (isset($_FILES['file'])) {
            $upload_dir = "public/upload/";
            $upload_file = $upload_dir . "{$_FILES['file']['name']}";
            $type_allow = array('png', 'jpg', 'gif', 'jpeg');
            $type = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
            #Kiểm tra đúng định dạng
            if (!in_array($type, $type_allow)) {
                $error['file_type'] = 'Chỉ được upload file ảnh có định dạng png, jpg, gif, jpeg';
            } else {
                #Kiểm tra kích thước phù hợp
                $file_size = $_FILES['file']['size'];
                if ($file_size > 29000000) {
                    $error['file_size'] = 'Chỉ được upload file ảnh có kích thướt < 20 MB';
                }
                #Kiểm tra file tồn tại hệ thống
                if (file_exists($upload_file)) {
                    //Thuật toán đổi tên khi bị trùng
                    $file_name_current = basename($_FILES['file']['name'], ".$type");
                    $file_name_new =  "$file_name_current - Copy.$type";
                    $upload_file_new = "$upload_dir" . $file_name_new;
                    $cnt = 1;
                    while (file_exists($upload_file_new)) {
                        $file_name_new =  "$file_name_current - Copy ($cnt).$type";
                        ++$cnt;
                        $upload_file_new = "$upload_dir" . $file_name_new;
                    }
                    $upload_file = $upload_file_new;
                } else {
                    $upload_file = $upload_dir . "{$_FILES['file']['name']}";
                }
            }
        } else {
            $error['file_empty'] = "Không được để trống file!";
        }
        //Result
        if (empty($error)) {
            //add -> database
            if (isset($_FILES['file'])) {
                move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);
            }
            $data = array(
                'name' => $title,
                'slug' => $slug,
                'content' => $content,
                'path_img' => $upload_file
            );
            add_page($data);
            $alert = "<p id = 'update-info' class = 'alert'>Thêm trang mới thành công, <a href='?mod=pages'>xem</a>!</p>";
        }
    }

    $data['upload_file'] = $upload_file;
    load_view('add', $data);
}
