<?php
get_header();
?>


<?php

if (isset($_POST['btn_add_new'])) {
    $error = array();
    $alert = array();

    #Validation fullname
    if (empty($_POST['fullname'])) {
        $error['fullname'] = 'Fullname cannot be left blank!';
    } else {
        $fullname = $_POST['fullname'];
    }

    #Validation username
    if (empty($_POST['username'])) {
        //Hạ cờ
        $error['username'] = 'Username cannot be left blank!';
    } else {
        if ((strlen($_POST['username']) < 6) || (strlen($_POST['username']) > 32)) {
            $error['username'] = 'Username is between 6 and 32 characters!';
        } else {
            if (!is_username($_POST['username'])) {
                $error['username'] = 'Username invalidate!';
            } else {
                $username = $_POST['username'];
            }
        }
    }
    #Validation password
    if (empty($_POST['password'])) {
        $error['password'] = 'Password cannot be left blank!';
    } else {
        if (!is_password($_POST['password'])) {
            $error['password'] = 'Password invalidate!';
        } else {
            $password = md5($_POST['password']);
        }
    }
    #Validation email
    if (empty($_POST['email'])) {
        $error['email'] = 'Email cannot be left blank!';
    } else {
        $email = $_POST['email'];
    }
    #Validation gender
    if (empty($_POST['gender'])) {
        $error['gender'] = 'Gender cannot be left blank!';
    } else {
        $gender = $_POST['gender'];
    }

    if (empty($error)) {
        //Add data user for database
        /*
        $sql = "INSERT INTO `tbl_users` (`fullname`, `username`, `password`, `email`, `gender`) VALUES ('{$fullname}', '{$username}', '{$password}', '{$email}', '{$gender}')";
        if (mysqli_query($conn, $sql)) {
            $alert['add_new'] = 'Add new user success!';
            redirect_to("?mod=user&act=main");
        } else
            echo "Error" . mysqli_error($conn);
        */
        $data = array(
            'fullname' => $fullname,
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'gender' => $gender
        );

        $id_insert = db_insert("tbl_users", $data);
        // echo $id_insert;

        redirect_to("?mod=user&act=main");
    }
}
?>
<div id="content">
    <?php if (!empty($alert['add_new'])) echo "<p class = 'success'> {$alert['add_new']} </p>"; ?>
    <h2>Add User New</h2><br>

    <form action="" method="post">
        <label for="fullname">Fullname</label><br>
        <input type="text" name="fullname" id="fullname"><br>
        <?php echo form_error('fullname') ?>
        <label for="username">Username</label><br>
        <input type="text" name="username" id="username"><br>
        <?php echo form_error('username') ?>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password"><br>
        <?php echo form_error('password') ?>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email"><br>
        <?php echo form_error('email') ?>
        <label for="gender">Gender</label><br>
        <select name="gender" id="gender">
            <option value="">Choice</option>
            <option value="male">Nam</option>
            <option value="female">Nữ</option>
        </select><br>
        <?php echo form_error('gender') ?>
        <input type="submit" value="ADD NEW" name="btn_add_new" id="btn-add-new">
    </form>

</div>

<?php
get_footer();
?>