<?php
get_header();
// show_array($list_cat_post);
foreach ($list_cat_post as $cat_post) {
    $list_cats[$cat_post['id']] = $cat_post['name'];
}
// show_array($list_cats);
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách bài viết</h3>
                    <a href="<?php echo base_url('?mod=posts&action=add_post') ?>" title="" id="add-new" class="fl-left">Thêm mới bài viết</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <?php
                if (!empty($posts)) {
                ?>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Mô tả</span></td>
                                    <td><span class="thead-text">Nội dung chi tiết</span></td>
                                    <td><span class="thead-text">Slug (Url Friendly)</span></td>
                                    <td><span class="thead-text">Ảnh đại diện</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text">Tác vụ</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $tmp = 0;
                                foreach ($posts as $post) {
                                    $tmp++;
                                ?>
                                    <tr>
                                        <td><span class="tbody-text"><?php echo $tmp; ?></span></span>
                                        <td><span class="tbody-text"><?php echo $post['title']; ?></span></span>
                                        <td><span class="tbody-text"><?php echo $post['desc_post']; ?></span></span>
                                        <td><span class="tbody-text"><?php echo $post['detail']; ?></span></span>
                                        <td><span class="tbody-text"><?php echo $post['slug']; ?></span></span>
                                        <td><span class="tbody-text"><img style="width: 100px; height: auto; " src="<?php echo $post['path_thumb']; ?>" alt=""></span></span>
                                        <td><span class="tbody-text"><?php echo $list_cats[$post['cat_id']] ?></span></span>
                                        <td><span class="tbody-text">Admin</span></span>
                                        <td><span class="tbody-text">Hoạt động</span></span>
                                        <td><span class="tbody-text"><?php echo $post['created_at']; ?></span></td>
                                        <td><span class="tbody-text">
                                                <a href="?mod=posts&action=edit&id=<?php echo $post['id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> | <a href="?mod=posts&action=delete&id=<?php echo $post['id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </span>
                                        </td>

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
                    echo get_pagging($num_page, $page, "?mod=posts&action=show_list_post");
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