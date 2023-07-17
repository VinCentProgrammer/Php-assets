<?php

function construct()
{
    load_model('index');
}

function add_postAction()
{
    global $error, $title, $detail, $slug, $desc, $upload_file, $alert;
    if (!empty($_POST['btn-add-post'])) {
        $error = array();
        //validation title
        if (empty($_POST['title'])) {
            $error['title'] = 'Không được để trống tiêu đề bài viết!';
        } else {
            $title = $_POST['title'];
        }
        //validation desc
        $desc = $_POST['desc_post'];
        //validation slug
        if (empty($_POST['slug'])) {
            $error['slug'] = 'Không được để trống slug!';
        } else {
            $slug = $_POST['slug'];
        }
        //validation detail
        if (empty($_POST['detail'])) {
            $error['detail'] = 'Không được để trống nội dung bài viết!';
        } else {
            $detail = $_POST['detail'];
        }
        //validation post_thumb
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
        // id cat post
        if (empty($_POST['cat_post'])) {
            $error['cat_post'] = 'Không được để trống danh mục!';
        } else {
            $cat_id = $_POST['cat_post'];
        }
        //Result
        if (empty($error)) {
            //add -> database
            if (isset($_FILES['file'])) {
                move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);
            }
            $data = array(
                'title' => $title,
                'desc_post' => $desc,
                'slug' => $slug,
                'detail' => $detail,
                'path_thumb' => $upload_file,
                'cat_id' => $cat_id,
            );
            add_post($data);
            $alert = "<p id = 'update-info' class = 'alert'>Thêm danh mục mới thành công, <a href='?mod=posts&action=show_list_post'>xem</a>!</p>";
        }
    }
    $list_cat = get_list_cat();
    $data['list_cat'] = $list_cat;
    $data['upload_file'] = $upload_file;
    load_view('add_post', $data);
}

function add_catAction()
{
    global $error, $slug, $desc, $name_cat, $alert;
    if (!empty($_POST['btn-add-cat'])) {
        $error = array();
        //validation name
        if (empty($_POST['name_cat'])) {
            $error['name_cat'] = 'Không được để trống tên danh mục!';
        } else {
            $name_cat = $_POST['name_cat'];
        }
        //validation slug
        if (empty($_POST['slug'])) {
            $error['slug'] = 'Không được để trống slug!';
        } else {
            $slug = $_POST['slug'];
        }
        //desc
        $desc = $_POST['desc'];
        // id cat post
        if (empty($_POST['cat_post'])) {
            $error['cat_post'] = 'Không được để trống danh mục!';
        } else {
            $cat_id = $_POST['cat_post'];
        }
        //Result
        if (empty($error)) {
            //add -> database
            $data = array(
                'name' => $name_cat,
                'slug' => $slug,
                'desc_cat' => $desc,
                'parent_id' => $cat_id
            );
            add_cat($data);
            $alert = "<p id = 'update-info' class = 'alert'>Thêm danh mục mới thành công, <a href='?mod=posts&action=show_list_cat'>xem</a>!</p>";
        }
    }
    $list_cat = get_list_cat();
    $data['list_cat'] = $list_cat;
    load_view('add_cat', $data);
}

function show_list_postAction()
{
    $num_rows = get_num_rows_post();
    //Số lượng bản ghi trên mỗi trang 
    $num_per_page = 4;
    $total_row = $num_rows;
    $num_page = ceil($total_row / $num_per_page);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //Điểm xuất phát
    $start = ($page - 1) * $num_per_page;

    $list_cat_post = get_list_cat();

    $posts = get_posts($start, $num_per_page, "");
    $data['posts'] = $posts;
    $data['list_cat_post'] = $list_cat_post;
    $data['num_page'] = $num_page;
    $data['page'] = $page;
    load_view('show_list_post', $data);
}

function editAction()
{
    $id = (int) $_GET['id'];
    global $error, $title, $detail, $slug, $desc, $upload_file, $alert;
    if (!empty($_POST['btn-edit-post'])) {
        $error = array();
        //validation title
        if (empty($_POST['title'])) {
            $error['title'] = 'Không được để trống tiêu đề bài viết!';
        } else {
            $title = $_POST['title'];
        }
        //validation desc
        $desc = $_POST['desc_post'];
        //validation slug
        if (empty($_POST['slug'])) {
            $error['slug'] = 'Không được để trống slug!';
        } else {
            $slug = $_POST['slug'];
        }
        //validation detail
        if (empty($_POST['detail'])) {
            $error['detail'] = 'Không được để trống nội dung bài viết!';
        } else {
            $detail = $_POST['detail'];
        }
        //validation post_thumb
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
        // id cat post
        if (empty($_POST['cat_post'])) {
            $error['cat_post'] = 'Không được để trống danh mục!';
        } else {
            $cat_id = $_POST['cat_post'];
        }
        //Result
        if (empty($error)) {
            //add -> database
            if (isset($_FILES['file'])) {
                move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);
            }
            $data = array(
                'title' => $title,
                'desc_post' => $desc,
                'slug' => $slug,
                'detail' => $detail,
                'path_thumb' => $upload_file,
                'cat_id' => $cat_id,
            );
            edit_post($data, $id);
            $alert = "<p id = 'update-info' class = 'alert'>Chỉnh sửa bài viết thành công, <a href='?mod=posts&action=show_list_post'>xem</a>!</p>";
        }
    }

    $post = get_post_by_id($id);
    $list_cat = get_list_cat();
    $data['list_cat'] = $list_cat;
    $data['post'] = $post;
    load_view('edit', $data);
}

function deleteAction()
{
    $id = (int)$_GET['id'];
    delete_post($id);
    redirect_to(base_url('?mod=posts&action=show_list_post'));
}

function show_list_catAction()
{
    $list_cat = data_tree(get_list_cat());
    $data['list_cat'] = $list_cat;

    load_view('show_list_cat', $data);
}
