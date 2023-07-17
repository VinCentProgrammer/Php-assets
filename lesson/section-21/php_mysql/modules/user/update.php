<?php
get_header();
$id = (int)$_GET['id'];
?>


<?php

if (isset($_POST['btn_update'])) {
    $error = array();
    $alert = array();

    #Validation fullname
    if (empty($_POST['fullname'])) {
        $error['fullname'] = 'Fullname cannot be left blank!';
    } else {
        $fullname = $_POST['fullname'];
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
        $sql = "UPDATE `tbl_users` SET `fullname` = '{$fullname}', `gender` = '{$gender}' WHERE `user_id` = {$id}";
        if (mysqli_query($conn, $sql)) {
            $alert['update_user'] = 'Update user success!';
            redirect_to("?mod=user&act=main");
        } else
            echo "Error" . mysqli_error($conn);
        */
        $data = array(
            'fullname' => $fullname,
            'gender' => $gender
        );
        db_update("tbl_users", $data, "`user_id` = {$id}");
        redirect_to("?mod=user&act=main");
    }
}
?>

<?php

// $sql = "SELECT * FROM `tbl_users` WHERE `user_id` = $id";
// $result = mysqli_query($conn, $sql);
// $item = mysqli_fetch_assoc($result);

$item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = $id");

?>


<div id="content">
    <?php if (!empty($alert['update_user'])) echo "<p class = 'success'> {$alert['update_user']} </p>"; ?>
    <h2>Update user</h2><br>

    <form action="" method="post">
        <label for="fullname">Fullname</label><br>
        <input type="text" name="fullname" id="fullname" value="<?php if (!empty($item)) echo $item['fullname'] ?>"><br>
        <?php echo form_error('fullname') ?>
        <label for="gender">Gender</label><br>
        <select name="gender" id="gender">
            <option value="">Choice</option>
            <option <?php if (!empty($item) && $item['gender'] == 'male') echo "selected = 'selected'"; ?> value="male">Nam</option>
            <option <?php if (!empty($item) && $item['gender'] == 'female') echo "selected = 'selected'"; ?> value="female">Nữ</option>
        </select><br>
        <?php echo form_error('gender') ?>
        <input type="submit" value="UPDATE" name="btn_update" id="btn-add-new">
    </form>

</div>

<?php
get_footer();
?>