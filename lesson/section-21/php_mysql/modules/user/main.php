<?php
get_header();
?>

<?php
/*
$sql = "SELECT * FROM `tbl_users`";
$result = mysqli_query($conn, $sql);
$list_data = array();
$num_rows = mysqli_num_rows($result);

if ($num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $list_data[] = $row;
    }
}
*/

$list_data = db_fetch_array("SELECT * FROM `tbl_users`");
$num_rows = db_num_rows("SELECT * FROM `tbl_users`");

// show_array($list_data);

?>

<div id="content">
    <h2>List users</h2>
    <a href="?mod=user&act=add">Add new</a>

    <style>
        table th,
        table td {
            padding: 10px;
        }

        p.num_rows {
            color: #333;
            margin-top: 20px;
            font-style: italic;
            font-size: 18px;
        }
    </style>

    <?php
    if (!empty($list_data)) {
    ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Stt</th>
                    <th>Id</th>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $temp = 0;
                // show_array($list_data);
                foreach ($list_data as $key => $user) {
                    $user['url_update'] = "?mod=user&act=update&id={$user['user_id']}";
                    $user['url_delete'] = "?mod=user&act=delete&id={$user['user_id']}";
                    // show_array($user);
                    $temp++;
                ?>
                    <tr>
                        <td><?php echo $temp; ?></td>
                        <td><?php echo $user['user_id'] ?></td>
                        <td><?php echo $user['fullname'] ?></td>
                        <td><?php echo $user['username'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo show_gender($user['gender']); ?></td>
                        <td><a href="<?php echo $user['url_update'] ?>">Edit</a> | <a href="<?php echo $user['url_delete'] ?>">Delete</a></td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    <?php
    }
    ?>

    <p class="num_rows">Have <?php echo $num_rows ?> user in database!</p>

</div>


<?php
get_footer();
?>