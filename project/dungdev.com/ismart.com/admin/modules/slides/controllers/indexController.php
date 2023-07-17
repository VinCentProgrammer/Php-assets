<?php

function construct()
{
    load_model('index');
}

function indexAction()
{
    $num_rows = get_num_rows_slide();
    //Số lượng bản ghi trên mỗi trang 
    $num_per_page = 4;
    $total_row = $num_rows;
    $num_page = ceil($total_row / $num_per_page);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //Điểm xuất phát
    $start = ($page - 1) * $num_per_page;

    $list_slide = get_list_slide($start, $num_per_page, "");
    $data['list_slide'] = $list_slide;
    $data['num_page'] = $num_page;
    $data['page'] = $page;

    load_view('index', $data);
}

function editAction()
{
    $id = (int) $_GET['id'];
    $slide = get_slide_by_id($id);
    global $error, $status, $alert, $link, $name_slide, $order_slide, $desc_slide, $upload_file;
    if (!empty($_POST['btn-edit-slide'])) {
        $error = array();
        //validation name slide
        if (empty($_POST['name_slide'])) {
            $error['name_slide'] = 'Không được để trống tên slide!';
        } else {
            $name_slide = $_POST['name_slide'];
        }
        //validation link
        if (empty($_POST['link'])) {
            $error['link'] = 'Không được để trống link slide!';
        } else {
            $link = $_POST['link'];
        }
        //validation order slide
        if (empty($_POST['order_slide'])) {
            $error['order_slide'] = 'Không được để trống thứ tự!';
        } else {
            if (!is_order($_POST['order_slide']))
                $error['order_slide'] = 'Nhập thứ tự không đúng định dạng!';
            else
                $order_slide = $_POST['order_slide'];
        }
        //validation desc slide
        $desc_slide = $_POST['desc_slide'];
        //validation slide images
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
        }

        // status
        if (empty($_POST['status'])) {
            $error['status'] = 'Không được để trống trạng thái!';
        } else {
            $status = $_POST['status'];
        }

        //Result
        if (empty($error)) {
            //add -> database
            if (isset($_FILES['file'])) {
                move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);
            }

            $data = array(
                'name_slide' => $name_slide,
                'link' => $link,
                'order_slide' => $order_slide,
                'desc_slide' => $desc_slide,
                'path_img' => $upload_file,
                'status' => $status,
            );
            if (file_exists($slide['path_img'])) {
                unlink($slide['path_img']);
            }

            edit_slide($data, $id);

            $alert = "<p id = 'update-info' class = 'alert'>Chỉnh sửa slide thành công, <a href='?mod=slides'>xem</a>!</p>";
        }
    }

    $slide = get_slide_by_id($id);
    $data['slide'] = $slide;
    load_view('edit', $data);
}

function deleteAction()
{
    $id = (int)$_GET['id'];
    $slide = get_slide_by_id($id);
    if (file_exists($slide['path_img'])) {
        unlink($slide['path_img']);
    }
    delete_slide($id);
    redirect_to(base_url('?mod=slides'));
}

function addAction()
{
    global $error, $status, $alert, $link, $name_slide, $order_slide, $desc_slide, $upload_file;
    if (!empty($_POST['btn-add-slide'])) {
        $error = array();
        //validation name slide
        if (empty($_POST['name_slide'])) {
            $error['name_slide'] = 'Không được để trống tên slide!';
        } else {
            $name_slide = $_POST['name_slide'];
        }
        //validation link
        if (empty($_POST['link'])) {
            $error['link'] = 'Không được để trống link slide!';
        } else {
            $link = $_POST['link'];
        }
        //validation order slide
        if (empty($_POST['order_slide'])) {
            $error['order_slide'] = 'Không được để trống thứ tự!';
        } else {
            if (!is_order($_POST['order_slide']))
                $error['order_slide'] = 'Nhập thứ tự không đúng định dạng!';
            else
                $order_slide = $_POST['order_slide'];
        }
        //validation desc slide
        $desc_slide = $_POST['desc_slide'];
        //validation slide images
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
        }

        // status
        if (empty($_POST['status'])) {
            $error['status'] = 'Không được để trống trạng thái!';
        } else {
            $status = $_POST['status'];
        }

        //Result
        if (empty($error)) {
            //add -> database
            if (isset($_FILES['file'])) {
                move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);
            }

            $data = array(
                'name_slide' => $name_slide,
                'link' => $link,
                'order_slide' => $order_slide,
                'desc_slide' => $desc_slide,
                'path_img' => $upload_file,
                'status' => $status,
            );

            add_slide($data);

            $alert = "<p id = 'update-info' class = 'alert'>Thêm slide mới thành công, <a href='?mod=slides'>xem</a>!</p>";
        }
    }
    $data['upload_file'] = $upload_file;
    load_view('add', $data);
}
