<?php
session_start();
// ($_SESSION['list_post']);
?>

<div id="content">
    <h2>Tin tức</h2>
    <?php
    if (!empty($_SESSION['list_post'])) {
    ?>
        <ul id="list-post">
            <?php
            foreach ($_SESSION['list_post'] as $item) {
            ?>
                <li class="post-item">
                    <a href="detail" class="post-thumb"><img src="<?php echo $item['post_thumb'] ?>" alt=""></a>
                    <div class="post-info">
                        <a href="#" class="post-title"><?php echo $item['post_title'] ?></a>
                        <!-- <p><span class="post-day"><?php //echo $item['post_day'] ?></span> <span class="post-time"><?php //echo $item['post_time'] ?></span></p> -->
                        <div class="post-desc"><?php echo $item['post_desc'] ?></div>
                    </div>
                </li>
            <?php
            }
            ?>
        </ul>
    <?php
    } else echo "Dữ liệu bài viết không tồn tại!!!";
    ?>
</div>