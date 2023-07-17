<?php
get_header();
?>

<div id="content">
    <h2>Danh sach thanh vien</h2>
    <?php
    if (!empty($list_user)) {
    ?>
        <table border="1">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>User_id</th>
                    <th>Ho va Ten</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Earn</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $tmp = 0;
                $show_gender = array(
                    'male' => 'Nam',
                    'female' => 'Nu'
                );
                foreach ($list_user as $user) {
                    $tmp++;
                ?>
                    <tr>
                        <td><?php echo $tmp; ?></td>
                        <td><?php echo $user['user_id']; ?></td>
                        <td><?php echo $user['fullname']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $show_gender[$user['gender']]; ?></td>
                        <td><?php echo $user['age']; ?></td>
                        <td><?php echo currency_format($user['earn'], '$'); ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    } else echo "<p> Hien tai khong co thanh vien trong he thong!</p>";
    ?>
</div>

<?php
get_footer();
?>