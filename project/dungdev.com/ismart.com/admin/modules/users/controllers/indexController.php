<?php
function construct()
{
    load_model('index');
    load('lib', 'sendmail');
}

function loginAction()
{
    global $error, $username, $password, $alert;
    //Check submit form
    if (!empty($_POST['btn_login'])) {
        $error = array();
        //validation username
        if (empty($_POST['username'])) {
            $error['username'] = 'Không được để trống username!';
        } else {
            if (!is_username($_POST['username'])) {
                $error['username'] = 'Username chứa chữ cái, chữ số, gạch dưới, dấu chấm, 6 -> 32 ký tự!';
            } else {
                $username = $_POST['username'];
            }
        }
        //validation password
        if (empty($_POST['password'])) {
            $error['password'] = 'Không được để trống password!';
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = 'Password chứa ký tự đầu in hoa, chữ cái, chữ số, ký tự đặc biệt, 6->32 ký tự!';
            } else {
                $password = md5($_POST['password']);
            }
        }
        //Result
        if (empty($error)) {
            //kiểm tra tồn tại
            if (check_login($username, $password)) {
                //thiết lập session
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;
                //chuyển hướng đến trang chủ
                redirect_to(base_url('?mod=users&controller=team&action=index'));
            } else {
                //Thông báo không tồn tại tài khoản
                $alert = "<p class = 'alert'>Username hoặc password không chính xác hoặc tài khoản không tồn tại!</p>";
            }
        }
    }
    load_view('login');
}


function reset_passAction()
{
    if (!empty($_GET['reset_token'])) {
        //kiểm tra mã token
        $reset_token = $_GET['reset_token'];
        if (check_reset_token($reset_token)) {
            redirect_to(base_url("?mod=users&controller=index&action=reset_pass_new&reset_token={$reset_token}"));
        } else {
            //thông báo xác nhận không thành công
            $alert = "<p class = 'alert'>Xác nhận không thành công, vui lòng thử lại!";
        }
    } else {
        global $error, $username, $password, $alert;
        //Check submit form
        if (!empty($_POST['btn_reset_pass'])) {
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

            //Result
            if (empty($error)) {
                // kiểm tra email tồn tại trong hệ thống
                if (check_email($_POST['email'])) {
                    // thực hiện gửi mã reset_token vào db và người dùng
                    $reset_token = md5($email . time());
                    $data = array(
                        'reset_token' => $reset_token
                    );
                    add_reset_token($data, $email);
                    $link = base_url("?mod=users&controller=index&action=reset_pass&reset_token={$reset_token}");
                    $content = "<h1>Thông báo xác nhận lấy lại mật khẩu</h1>
                    <p>Bạn vui lòng click vào <a href='{$link}'>đây</a> để thực hiện xác nhận và lấy lại mật khẩu.</p>
                    <p>Nếu không phải bạn, vui lòng bỏ qua email này!</p>
                    <p><strong>Team support <a href='http://dungdev.com'>dungdev.com</a></strong></p>";
                    send_mail($email, "TEAM SUPPORT", "XÁC NHẬN EMAIL!", $content);
                    $alert = "<p class = 'alert'>Kiểm tra email để xác nhận! </p>";
                } else {
                    $alert = "<p class = 'alert'>Không tồn tại email trong hệ thống";
                }
            }
        }
    }
    load_view('reset_pass');
}

function reset_pass_newAction()
{
    global $error, $password, $alert;
    if (!empty($_POST['btn_reset_pass_new'])) {
        $error = array();
        //validation password
        if (empty($_POST['password'])) {
            $error['password'] = 'Không được để trống password!';
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = 'Password chứa ký tự đầu in hoa, chữ cái, chữ số, ký tự đặc biệt, 6->32 ký tự!';
            } else {
                $password = md5($_POST['password']);
            }
        }
        if (empty($error)) {
            $data = array(
                'password' => $password
            );
            update_pass_new($data, $_GET['reset_token']);
            $alert = "<p class = 'alert'>Cập nhật mật khẩu ok, quay lại <a href='?mod=users&controller=index&action=login'>Login</a>";
        }
    }
    load_view('reset_pass_new');
}


function logoutAction()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    redirect_to("?mod=users&controller=index&action=login");
}
