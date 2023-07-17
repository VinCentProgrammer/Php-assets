<?php

function construct()
{
    load_model('index');
}

function indexAction()
{
    $num_rows = get_num_rows_users();
    //Số lượng bản ghi trên mỗi trang 
    $num_per_page = 4;
    $total_row = $num_rows;
    $num_page = ceil($total_row / $num_per_page);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //Điểm xuất phát
    $start = ($page - 1) * $num_per_page;

    $users = get_users($start, $num_per_page, "");
    $data['users'] = $users;
    $data['num_page'] = $num_page;
    $data['page'] = $page;
    load_view('index', $data);
}

function addAction()
{
    global $error, $username, $password, $email, $tel, $alert;
    if (!empty($_POST['btn-add'])) {
        $error = array();
        //validation username
        if (empty($_POST['username'])) {
            $error['username'] = 'Không được để trống tên đăng nhập!';
        } else {
            if (!is_username($_POST['username'])) {
                $error['username'] = 'Tên đăng nhập chứa chữ cái, chữ số, gạch dưới, dấu chấm, 6 -> 32 ký tự!';
            } else {
                $username = $_POST['username'];
            }
        }
        //validation email
        if (empty($_POST['email'])) {
            $error['email'] = 'Không được để trống email!';
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = 'Email không đúng định dạng!';
            } else {
                $email = $_POST['email'];
            }
        }
        //validation password
        if (empty($_POST['password'])) {
            $error['password'] = 'Không được để trống mật khẩu!';
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = 'Mật khẩu chứa ký tự đầu in hoa, chữ cái, chữ số, ký tự đặc biệt, 6->32 ký tự!';
            } else {
                $password = md5($_POST['password']);
            }
        }
        //validation phone number
        if (empty($_POST['tel'])) {
            $tel = $_POST['tel'];
        } else {
            if (!is_phone_number($_POST['tel'])) {
                $error['tel'] = 'Số điện thoại không đúng định dạng!';
            } else {
                $tel = $_POST['tel'];
            }
        }

        //
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $role = $_POST['roles'];

        //Result
        if (empty($error)) {
            //check account exists ?
            if (!user_exist($username, $email)) {
                // add new user -> database
                $data = array(
                    'username' => $username,
                    'email' => $email,
                    'fullname' => $fullname,
                    'password' => $password,
                    'address' => $address,
                    'phone_numbers' => $tel,
                    'gender' => $gender,
                    'role' => $role
                );
                add_user($data);
                redirect_to(base_url('?mod=users&controller=team&action=index'));
            } else {
                //noti user exists
                $alert = "<p id = 'add-user' class = 'alert'>Username hoặc email đã tồn tại!</p>";
            }
        }
    }
    load_view('add');
}

function updateAction()
{
    global $error, $email, $tel, $alert;
    if (!empty($_POST['btn-update'])) {
        $error = array();
        //validation email
        if (empty($_POST['email'])) {
            $error['email'] = 'Không được để trống email!';
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = 'Email không đúng định dạng!';
            } else {
                $email = $_POST['email'];
            }
        }
        //validation phone number
        if (empty($_POST['tel'])) {
            $tel = $_POST['tel'];
        } else {
            if (!is_phone_number($_POST['tel'])) {
                $error['tel'] = 'Số điện thoại không đúng định dạng!';
            } else {
                $tel = $_POST['tel'];
            }
        }
        //
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $age = $_POST['date-of-birth'];
        //Result
        if (empty($error)) {
            // add new info admin -> database
            $data = array(
                'email' => $email,
                'fullname' => $fullname,
                'address' => $address,
                'phone_numbers' => $tel,
                'gender' => $gender,
                'age' => $age
            );
            update_info($data);
            $alert = "<p id = 'update-info' class = 'alert'>Cập nhật thông tin thành công!</p>";
        }
    }
    $info_admin = get_info_admin();
    $data['info_admin'] = $info_admin;
    load_view('update', $data);
}

function change_passAction()
{
    global $error, $pass_old, $pass_new, $pass_confirm, $alert;
    if (!empty($_POST['btn-change-pass'])) {
        $error = array();
        //validation password old
        if (empty($_POST['pass-old'])) {
            $error['pass-old'] = 'Không được để trống mật khẩu cũ!';
        } else {
            if (!is_password($_POST['pass-old'])) {
                $error['pass-old'] = 'Mật khẩu chứa ký tự đầu in hoa, chữ cái, chữ số, ký tự đặc biệt, 6->32 ký tự!';
            } else {
                $pass_old = md5($_POST['pass-old']);
            }
        }
        //validation password new
        if (empty($_POST['pass-new'])) {
            $error['pass-new'] = 'Không được để trống mật khẩu mới!';
        } else {
            if (!is_password($_POST['pass-new'])) {
                $error['pass-new'] = 'Mật khẩu chứa ký tự đầu in hoa, chữ cái, chữ số, ký tự đặc biệt, 6->32 ký tự!';
            } else {
                $pass_new = md5($_POST['pass-new']);
            }
        }
        //validation password confirm
        if (empty($_POST['pass-confirm'])) {
            $error['pass-confirm'] = 'Không được để trống mật khẩu xác nhận!';
        } else {
            if (!is_password($_POST['pass-confirm'])) {
                $error['pass-confirm'] = 'Mật khẩu chứa ký tự đầu in hoa, chữ cái, chữ số, ký tự đặc biệt, 6->32 ký tự!';
            } else {
                $pass_confirm = md5($_POST['pass-confirm']);
            }
        }
        //Result
        if (empty($error)) {
            // check pass old exists?
            if (pass_old_exists($pass_old)) {
                // check pass new == pass confirm ?
                if ($pass_new == $pass_confirm) {
                    // change pass new & add -> database
                    $data = array(
                        'password' => $pass_new
                    );
                    update_info($data, "`password` = '{$pass_old}'");
                    $alert = "<p id = 'update-info' class = 'alert'>Cập nhật mật khẩu mới thành công!</p>";
                } else {
                    $alert = "<p id = 'add-user' class = 'alert'>Nhập mật khẩu xác nhận không chính xác!</p>";
                }
            } else {
                $alert = "<p id = 'add-user' class = 'alert'>Mật khẩu cũ không tồn tại!</p>";
            }
        }
    }
    load_view('change_pass');
}

function deleteAction()
{
    $id = (int)$_GET['id'];
    db_delete("tbl_users", "`id` = {$id}");
    redirect_to(base_url('?mod=users&controller=team&action=index'));
}

function editAction()
{
    global $error, $email, $tel, $alert;
    $id = (int)$_GET['id'];
    // check submit form
    if (!empty($_POST['btn-update'])) {
        $error = array();
        //validation email
        if (empty($_POST['email'])) {
            $error['email'] = 'Không được để trống email!';
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = 'Email không đúng định dạng!';
            } else {
                $email = $_POST['email'];
            }
        }
        //validation phone number
        if (empty($_POST['tel'])) {
            $tel = $_POST['tel'];
        } else {
            if (!is_phone_number($_POST['tel'])) {
                $error['tel'] = 'Số điện thoại không đúng định dạng!';
            } else {
                $tel = $_POST['tel'];
            }
        }
        //
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $age = $_POST['date-of-birth'];
        //Result
        if (empty($error)) {
            // add new info admin -> database
            $data = array(
                'email' => $email,
                'fullname' => $fullname,
                'address' => $address,
                'phone_numbers' => $tel,
                'gender' => $gender,
                'age' => $age
            );
            update_info($data, "`id` = {$id}");
            $alert = "<p id = 'update-info' class = 'alert'>Cập nhật thông tin thành công, <a href='?mod=users&controller=team&action=index'>xem</a>!</p>";
        }
    }
    $info_user = get_info_user_by_id($id);
    $data['info_user'] = $info_user;
    load_view('edit', $data);
}
