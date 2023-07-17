

<?php

function construct()
{
    load_model('index');
    load('lib', 'sendmail');
}




function regAction()
{
    global $error, $fullname, $username, $password, $email, $alert;
    if (isset($_POST['btn_reg'])) {
        $error = array();
        $alert = array();
        #Validation fullname
        if (empty($_POST['fullname'])) {
            $error['fullname'] = "Không được để trống họ và tên!";
        } else {
            $fullname = $_POST['fullname'];
        }
        #Validation username
        if (empty($_POST['username'])) {
            $error['username'] = "Không được để trống tên đăng nhập!";
        } else {
            if (!is_username($_POST['username'])) {
                $error['username'] = "Tên đăng nhập không đúng định dạng!";
            } else {
                $username = $_POST['username'];
            }
        }
        #Validation email
        if (empty($_POST['email'])) {
            $error['email'] = "Không được để trống email!";
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = "Email không đúng định dạng!";
            } else {
                $email = $_POST['email'];
            }
        }
        #Validation password
        if (empty($_POST['password'])) {
            $error['password'] = "Không được để trống mật khẩu!";
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = "Mật khẩu không đúng định dạng!";
            } else {
                $password = md5($_POST['password']);
            }
        }
        #Kết luận
        if (empty($error)) {
            //xử lí đăng kí thành công
            if (!user_exist($username, $email)) {
                $active_token = md5($username . time());
                $data = array(
                    'fullname' => $fullname,
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'active_token' => $active_token
                );
                $link = base_url("?mod=users&action=active&active_token={$active_token}");
                $content = "<p>Xin chào {$fullname}, thông báo xác thực đăng kí</p>
                <p>Bạn vui lòng, click vào <a href='{$link}'>đây</a> để xác thực đăng kí</p><p>Nếu không phải bạn đăng kí thì bỏ qua tin này.</p><p>Team Support <strong>Dungdev.com</strong></p>";
                send_mail($email, $fullname, "XÁC THỰC ĐĂNG KÝ TÀI KHOẢN", $content);
                add_user($data);
                $alert['reg_success'] = "Đăng kí thành công, kiểm tra email để xác thực!";
            } else {
                //Thong bao user ton tai
                $error['account'] = "Tên đăng nhập hoặc email đã tồn tại!";
            }
        }
    }
    load_view('reg');
}


function activeAction()
{
    $active_token = $_GET['active_token'];
    if (is_active($active_token)) {
        $_SESSION['confirm_email'] = "Xác thực thành công, bấm vào đăng nhập!";
    } else {
        $_SESSION['confirm_email'] = "Xác thực không thành công, hoặc đã xác thực trước đó!";
    }
    show_array($_SESSION);
    redirect_to("?mod=users&action=reg");
}

function loginAction()
{
    global $error, $username, $password;

    if (isset($_POST['btn_login'])) {
        $error = array();
        #Validation username
        if (empty($_POST['username'])) {
            $error['username'] = 'Không được để trống tên đăng nhập!';
        } else {
            if (!is_username($_POST['username'])) {
                $error['username'] = 'Tên đăng nhập không đúng định dạng!';
            } else {
                $username = $_POST['username'];
            }
        }
        #Validation password
        if (empty($_POST['password'])) {
            $error['password'] = "Không được để trống mật khẩu!";
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = "Mật khẩu không đúng định dạng!";
            } else {
                $password = md5($_POST['password']);
            }
        }
        #Result
        if (empty($error)) {
            #check login
            if (check_login($username, $password)) {
                #set session
                // echo "Login success!";
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;
                // show_array($_SESSION);
                #problem solving cookie
                if (!empty($_POST['remember_me'])) {
                    setcookie('is_login', true, time() + 3600, '/');
                    setcookie('user_login', $username, time() + 3600, '/');
                }

                #redirect to home
                redirect_to();
            } else {
                $error['account'] = 'Tên đăng nhập hoặc mật khẩu không chính xác hoặc tài khoản không tồn tại!';
            }
        }
        // else show_array($error);

    }
    load_view('login');
}


function logoutAction()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    redirect_to("?mod=users&action=login");
}


function resetPassAction()
{
    if (!empty($_GET['reset_token'])) {
        if (check_reset_token($_GET['reset_token'])) {
            if (!empty('btn_set_pass_new')) {
                global $error;
                $error = array();
                #Validation password
                if (empty($_POST['password'])) {
                    $error['password'] = "Không được để trống mật khẩu!";
                } else {
                    if (!is_password($_POST['password'])) {
                        $error['password'] = "Mật khẩu không đúng định dạng!";
                    } else {
                        $password = md5($_POST['password']);
                    }
                }
                if (empty($error)) {
                    $data = array(
                        'password' => $password
                    );
                    update_pass_new($data, $_GET['reset_token']);
                    redirect_to(base_url("?mod=users&action=resetPassNewSuccess"));
                } else {
                    // show_array($error);
                }
            }
            load_view('confirmEmailSuccess');
        } else {
            load_view('confirmEmailFailure');
        }
    } else {
        global $error, $email, $alert;
        $alert = array();
        if (isset($_POST['btn_reset_pass'])) {
            $error = array();
            #Validation email
            if (empty($_POST['email'])) {
                $error['email'] = "Không được để trống email!";
            } else {
                if (!is_email($_POST['email'])) {
                    $error['email'] = "Email không đúng định dạng!";
                } else {
                    $email = $_POST['email'];
                }
            }
        }
        
        if (empty($error)) {
            if (check_email($email)) {
                $reset_token = md5($email . time());
                $data = array(
                    'reset_token' => $reset_token
                );
                add_reset_token($data, $email);
                $link = base_url("?mod=users&action=resetPass&reset_token={$reset_token}");
                $content = "<p>Chào bạn! Tin nhắn lấy lại mật khẩu</p>
            <p>Bạn vui lòng click vào <a href='{$link}'> đây</a>để xác thực lấy lại mật khẩu</p><p>Nếu không phải bạn, vui lòng bỏ qua email này</p><p>Team Support DungDev.com</p>";
                send_mail($email, "DunnDev.com", "Reset Password", $content);
                $alert['check_email'] = 'Vui lòng kiểm tra email để xác thực';
            } else {
                $alert['check_email_invalid'] = 'Email không tồn tại trên hệ thống';
            }
        }
        load_view('resetPass');
    }
}


function resetPassNewSuccessAction(){
    load_view('resetPassNewSuccess');
}

function confirmEmailFailureAction(){
    load_view('confirmEmailFailure');
}