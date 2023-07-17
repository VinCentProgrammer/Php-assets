<?php

function construct()
{
    load_model('index');
}

function add_productAction()
{
    global $error, $name_product, $code, $price_current, $desc_product, $upload_file, $cat_id, $status, $alert, $arr_multi_upload_file, $detail, $id_product;
    if (!empty($_POST['btn-add-product'])) {
        // show_array($_FILES['file_relate']);
        $error = array();
        //validation name product
        if (empty($_POST['name_product'])) {
            $error['name_product'] = 'Không được để trống tên sản phẩm!';
        } else {
            $name_product = $_POST['name_product'];
        }
        //validation code product
        if (empty($_POST['code'])) {
            $error['code'] = 'Không được để trống mã sản phẩm!';
        } else {
            $code = $_POST['code'];
        }
        //validation price product
        if (empty($_POST['price_current'])) {
            $error['price_current'] = 'Không được để trống giá sản phẩm!';
        } else {
            if (!is_price($_POST['price_current']))
                $error['price_current'] = 'Nhập giá không đúng định dạng!';
            else
                $price_current = $_POST['price_current'];
        }
        //validation desc short product
        $desc_product = $_POST['desc_product'];
        //validation detail
        if (empty($_POST['detail'])) {
            $error['detail'] = 'Không được để trống chi tiết sản phẩm!';
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
        }

        // validation file product relate
        $files = array_filter($_FILES['file_relate']['name']);
        $total_count = count($_FILES['file_relate']['name']);
        for ($i = 0; $i < $total_count; $i++) {
            $upload_dir = "public/upload/";
            $upload_file_relate = $upload_dir . "{$_FILES['file_relate']['name'][$i]}";
            $type_allow = array('png', 'jpg', 'gif', 'jpeg');
            $type = strtolower(pathinfo($_FILES['file_relate']['name'][$i], PATHINFO_EXTENSION));
            #Kiểm tra đúng định dạng
            if (!in_array($type, $type_allow)) {
                $error['multi_file_type'] = 'Chỉ được upload file ảnh có định dạng png, jpg, gif, jpeg';
            } else {
                #Kiểm tra kích thước phù hợp
                $file_size = $_FILES['file_relate']['size'][$i];
                if ($file_size > 29000000) {
                    $error['multi_file_size'] = 'Chỉ được upload file ảnh có kích thướt < 20 MB';
                }
                #Kiểm tra file tồn tại hệ thống
                if (file_exists($upload_file_relate)) {
                    //Thuật toán đổi tên khi bị trùng
                    $file_name_current = basename($_FILES['file_relate']['name'][$i], ".$type");
                    $file_name_new =  "$file_name_current - Copy.$type";
                    $upload_file_new = "$upload_dir" . $file_name_new;
                    $cnt = 1;
                    while (file_exists($upload_file_new)) {
                        $file_name_new =  "$file_name_current - Copy ($cnt).$type";
                        ++$cnt;
                        $upload_file_new = "$upload_dir" . $file_name_new;
                    }
                    $upload_file_relate = $upload_file_new;
                } else {
                    $upload_file_relate = $upload_dir . "{$_FILES['file_relate']['name'][$i]}";
                }
                $arr_multi_upload_file[$i] = $upload_file_relate;
            }
        }

        // id cat product
        if (empty($_POST['cat_product'])) {
            $error['cat_product'] = 'Không được để trống danh mục!';
        } else {
            $cat_id = $_POST['cat_product'];
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
                'name' => $name_product,
                'code' => $code,
                'price_current' => $price_current,
                'desc_product' => $desc_product,
                'detail' => $detail,
                'thumb' => $upload_file,
                'cat_id' => $cat_id,
                'status' => $status,
            );
            $id_product = add_product($data);

            if (isset($id_product)) {
                if (isset($_FILES['file_relate'])) {
                    foreach ($arr_multi_upload_file as $key => $upload_file_relate) {
                        move_uploaded_file($_FILES['file_relate']['tmp_name'][$key], $upload_file_relate);
                        add_file_relate_product($id_product, $upload_file_relate);
                    }
                }
            }

            $alert = "<p id = 'update-info' class = 'alert'>Thêm sản phẩm mới thành công, <a href='?mod=products&action=show_products'>xem</a>!</p>";
        }
    }
    $list_cat = get_list_cat();
    $data['list_cat'] = $list_cat;
    $data['upload_file'] = $upload_file;
    $list_path_img_relate = get_path_img_relate_by_img_id($id_product);
    $data['list_path_img_relate'] = $list_path_img_relate;
    load_view('add_product', $data);
}


function add_catAction()
{
    global $error, $slug, $desc, $name_cat, $alert, $cat_id;
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
        // id cat product
        $cat_id = $_POST['cat_product'];
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

            $alert = "<p id = 'update-info' class = 'alert'>Thêm danh mục mới thành công, <a href='?mod=products&action=show_cat_product'>xem</a>!</p>";
        }
    }
    $list_cat = get_list_cat();
    $data['list_cat'] = $list_cat;
    load_view('add_cat', $data);
}

function show_productsAction()
{
    $num_rows = get_num_rows_product();
    //Số lượng bản ghi trên mỗi trang 
    $num_per_page = 4;
    $total_row = $num_rows;
    $num_page = ceil($total_row / $num_per_page);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //Điểm xuất phát
    $start = ($page - 1) * $num_per_page;

    $list_product = get_list_product($start, $num_per_page, "");
    $data['list_product'] = $list_product;
    $data['num_page'] = $num_page;
    $data['page'] = $page;

    load_view('show_products', $data);
}

function editAction()
{
    $id = (int) $_GET['id'];
    $list_path_img_relate = get_path_img_relate_by_img_id($id);
    $product = get_product_by_id($id);
    global $error, $name_product, $code, $price_current, $desc_product, $upload_file, $cat_id, $status, $alert, $arr_multi_upload_file, $detail, $id_product;
    if (!empty($_POST['btn-edit-product'])) {
        // show_array($_FILES['file_relate']);
        $error = array();
        //validation name product
        if (empty($_POST['name_product'])) {
            $error['name_product'] = 'Không được để trống tên sản phẩm!';
        } else {
            $name_product = $_POST['name_product'];
        }
        //validation code product
        if (empty($_POST['code'])) {
            $error['code'] = 'Không được để trống mã sản phẩm!';
        } else {
            $code = $_POST['code'];
        }
        //validation price product
        if (empty($_POST['price_current'])) {
            $error['price_current'] = 'Không được để trống giá sản phẩm!';
        } else {
            if (!is_price($_POST['price_current']))
                $error['price_current'] = 'Nhập giá không đúng định dạng!';
            else
                $price_current = $_POST['price_current'];
        }
        //validation desc short product
        $desc_product = $_POST['desc_product'];
        //validation detail
        if (empty($_POST['detail'])) {
            $error['detail'] = 'Không được để trống chi tiết sản phẩm!';
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
        }

        // validation file product relate
        $files = array_filter($_FILES['file_relate']['name']);
        $total_count = count($_FILES['file_relate']['name']);
        for ($i = 0; $i < $total_count; $i++) {
            $upload_dir = "public/upload/";
            $upload_file_relate = $upload_dir . "{$_FILES['file_relate']['name'][$i]}";
            $type_allow = array('png', 'jpg', 'gif', 'jpeg');
            $type = strtolower(pathinfo($_FILES['file_relate']['name'][$i], PATHINFO_EXTENSION));
            #Kiểm tra đúng định dạng
            if (!in_array($type, $type_allow)) {
                $error['multi_file_type'] = 'Chỉ được upload file ảnh có định dạng png, jpg, gif, jpeg';
            } else {
                #Kiểm tra kích thước phù hợp
                $file_size = $_FILES['file_relate']['size'][$i];
                if ($file_size > 29000000) {
                    $error['multi_file_size'] = 'Chỉ được upload file ảnh có kích thướt < 20 MB';
                }
                #Kiểm tra file tồn tại hệ thống
                if (file_exists($upload_file_relate)) {
                    //Thuật toán đổi tên khi bị trùng
                    $file_name_current = basename($_FILES['file_relate']['name'][$i], ".$type");
                    $file_name_new =  "$file_name_current - Copy.$type";
                    $upload_file_new = "$upload_dir" . $file_name_new;
                    $cnt = 1;
                    while (file_exists($upload_file_new)) {
                        $file_name_new =  "$file_name_current - Copy ($cnt).$type";
                        ++$cnt;
                        $upload_file_new = "$upload_dir" . $file_name_new;
                    }
                    $upload_file_relate = $upload_file_new;
                } else {
                    $upload_file_relate = $upload_dir . "{$_FILES['file_relate']['name'][$i]}";
                }
                $arr_multi_upload_file[$i] = $upload_file_relate;
            }
        }
        // show_array($arr_multi_upload_file);

        // id cat product
        if (empty($_POST['cat_product'])) {
            $error['cat_product'] = 'Không được để trống danh mục!';
        } else {
            $cat_id = $_POST['cat_product'];
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
                'name' => $name_product,
                'code' => $code,
                'price_current' => $price_current,
                'desc_product' => $desc_product,
                'detail' => $detail,
                'thumb' => $upload_file,
                'cat_id' => $cat_id,
                'status' => $status,
            );

            if (file_exists($product['thumb'])) {
                unlink($product['thumb']);
            }
            edit_product($data, $id);

            delete_list_img_relate_by_id($id);

            foreach ($list_path_img_relate as $item) {
                if (file_exists($item['path_img_relate']))
                    unlink($item['path_img_relate']);
            }

            if (isset($_FILES['file_relate'])) {
                foreach ($arr_multi_upload_file as $key => $upload_file_relate_new) {
                    move_uploaded_file($_FILES['file_relate']['tmp_name'][$key], $upload_file_relate_new);
                    add_file_relate_product($id, $upload_file_relate_new);
                }
            }

            $alert = "<p id = 'update-info' class = 'alert'>Cập nhật sản phẩm thành công, <a href='?mod=products&action=show_products'>xem</a>!</p>";
        }
    }
    $product = get_product_by_id($id);
    $list_path_img_relate = get_path_img_relate_by_img_id($id);
    $list_cat = get_list_cat();
    $data['list_cat'] = $list_cat;
    $data['list_path_img_relate'] = $list_path_img_relate;
    $data['product'] = $product;
    load_view('edit', $data);
}

function deleteAction()
{
    $id = (int)$_GET['id'];
    $list_path_img_relate = get_path_img_relate_by_img_id($id);
    delete_list_img_relate_by_id($id);
    foreach ($list_path_img_relate as $item) {
        if (file_exists($item['path_img_relate']))
            unlink($item['path_img_relate']);
    }
    $product = get_product_by_id($id);
    if (file_exists($product['thumb'])) {
        unlink($product['thumb']);
    }
    delete_product($id);
    redirect_to(base_url('?mod=products&action=show_products'));
}

function show_cat_productAction()
{
    $list_cat = data_tree(get_list_cat());
    $data['list_cat'] = $list_cat;
    load_view('show_cat_product', $data);
}

function show_img_relateAction()
{
    $num_rows = get_num_rows_img_relate();
    //Số lượng bản ghi trên mỗi trang 
    $num_per_page = 8;
    $total_row = $num_rows;
    $num_page = ceil($total_row / $num_per_page);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //Điểm xuất phát
    $start = ($page - 1) * $num_per_page;

    $list_img_relate = get_list_imgs_relate($start, $num_per_page, "");
    $data['list_img_relate'] = $list_img_relate;
    $data['num_page'] = $num_page;
    $data['page'] = $page;

    load_view('show_img_relate', $data);
}
