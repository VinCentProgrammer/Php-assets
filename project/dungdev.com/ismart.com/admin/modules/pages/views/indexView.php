<?php
get_header();
$p = $page;
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách trang</h3>
                    <a href="<?php echo base_url('?mod=pages&action=add') ?>" title="" id="add-new" class="fl-left">Thêm trang mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <?php
                if (!empty($pages)) {
                ?>
                    <div class="section-detail">
                        <div class="table-responsive">
                            <table class="table list-table-wp">
                                <thead>
                                    <tr>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Tên trang</span></td>
                                        <td><span class="thead-text">Slug</span></td>
                                        <td><span class="thead-text">Đường dẫn file</span></td>
                                        <td><span class="thead-text">Images</span></td>
                                        <td><span class="thead-text">Ngày tạo</span></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tmp = 0;
                                    foreach ($pages as $page) {
                                        $tmp++;
                                    ?>
                                        <tr>
                                            <td><span class="tbody-text"><?php echo $tmp; ?></h3></span>
                                            <td><span class="tbody-text"><?php echo $page['name'];  ?></h3></span></td>
                                            <td><span class="tbody-text"><?php echo $page['slug'];  ?></span></td>
                                            <td><span class="tbody-text"><?php echo $page['path_img'];  ?></span></td>
                                            <td><span class="tbody-text"><img style="max-width: 100px; height: auto;" src="<?php echo $page['path_img'];  ?>" alt=""></span></td>
                                            <td><span class="tbody-text"><?php echo $page['created_at'];  ?></span></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="section-detail clearfix">
                        <?php
                        echo get_pagging($num_page, $p, "?mod=pages");
                        ?>
                    </div>
                <?php
                } else echo "Không có dữ liệu!!!";
                ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>