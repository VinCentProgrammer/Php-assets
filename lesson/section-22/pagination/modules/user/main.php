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


$num_rows = db_num_rows("SELECT * FROM `tbl_users`");

// show_array($list_data);

//Số lượng bản ghi trên mỗi trang 
$num_per_page = 5;
$total_row = $num_rows;
$num_page = ceil($total_row / $num_per_page);
$page = isset($_GET['page']) ? $_GET['page'] : 1;
//Điểm xuất phát
$start = ($page - 1) * $num_per_page;

$list_data = get_users($start, $num_per_page, "");


?>

<div id="content">
    <h2>List users</h2>
    <a href="?mod=user&act=add">Add new</a>

    <style>
        table {
            width: 100%;
        }

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

        #pagging {
            display: flex;
            justify-content: flex-end;
        }

        #pagging li {
            display: inline-block;
            padding: 0px 2px;
        }

        #pagging li a {
            color: #7d6464;
            padding: 2px 10px;
            border-radius: 2px;
            border: 1px solid #c6b2b2;
            text-decoration: none;
        }

        .active {
            background-color: tomato;
            color: #fff !important;
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
                $temp = $start;
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

    <?php
    echo get_pagging($num_page, $page, "?mod=user&act=main");
    ?>
</div>
</div>


<?php
get_footer();
?>