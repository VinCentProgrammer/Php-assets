<?php
get_header();
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách slide</h3>
                    <a href="<?php echo base_url('?mod=slides&action=add') ?>" title="" id="add-new" class="fl-left">Thêm slide mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <?php
                if (!empty($list_slide)) {
                ?>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Ảnh</span></td>
                                    <td><span class="thead-text">Link</span></td>
                                    <td><span class="thead-text">Thứ tự</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Tác vụ</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $tmp = 0;
                                $status = array(
                                    'waiting' => 'Chờ duyệt',
                                    'posted' => 'Đã đăng'
                                );
                                foreach ($list_slide as $slide) {
                                    $tmp++;
                                ?>
                                    <tr>
                                        <td><span class="tbody-text"><?php echo $tmp; ?></span></span> </td>
                                        <td><span class="tbody-text"><img style="width: 80px; height: 80px;" src="<?php echo $slide['path_img']; ?>" alt=""></span></span> </td>
                                        <td><span class="tbody-text"><a target="_blank" href="http://<?php echo $slide['link']; ?>"><?php echo $slide['link']; ?></a></span></span> </td>
                                        <td><span class="tbody-text"><?php echo $slide['order_slide']; ?></span></span> </td>
                                        <td><span class="tbody-text"><?php echo $status[$slide['status']]; ?></span></span> </td>
                                        <td><span class="tbody-text">
                                                <a href="?mod=slides&action=edit&id=<?php echo $slide['id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> | <a href="?mod=slides&action=delete&id=<?php echo $slide['id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                    echo get_pagging($num_page, $page, "?mod=slides");
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