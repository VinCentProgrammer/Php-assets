<?php
get_header();
// show_array($list_cat);
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách danh mục</h3>
                    <a href="<?php echo base_url('?mod=posts&action=add_cat') ?>" title="" id="add-new" class="fl-left">Thêm danh mục</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <?php
                if (!empty($list_cat)) {
                ?>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tên danh mục</span></td>
                                    <td><span class="thead-text">Mô tả</span></td>
                                    <td><span class="thead-text">Slug (Url Friendly)</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $tmp = 0;
                                foreach ($list_cat as $cat) {
                                    $tmp++;
                                ?>
                                    <tr>
                                        <td><span class="tbody-text"><?php echo $tmp; ?></span></td>
                                        <td><span class="tbody-text"><?php echo str_repeat('|---', $cat['level']) . $cat['name'] ?></span></td>
                                        <td><span class="tbody-text"><?php echo $cat['desc_cat'] ?></span></td>
                                        <td><span class="tbody-text"><?php echo $cat['slug'] ?></span></td>
                                        <td><span class="tbody-text"><?php echo $cat['created_at'] ?></span></td>

                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
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