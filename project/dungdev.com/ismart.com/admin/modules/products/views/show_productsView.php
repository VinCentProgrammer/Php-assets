<?php
get_header();
// show_array($list_cat_post);
// foreach ($list_cat_post as $cat_post) {
//     $list_cats[$cat_post['id']] = $cat_post['name'];
// }
// show_array($list_cats);
// show_array($list_product);
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                    <a href="<?php echo base_url('?mod=products&action=add_product') ?>" title="" id="add-new" class="fl-left">Thêm sản phẩm</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="filter-wp clearfix">
                    <ul class="post-status fl-left">
                        <li class="all"><a href="">Tất cả <span class="count">(69)</span></a> |</li>
                        <li class="publish"><a href="">Đã đăng <span class="count">(51)</span></a> |</li>
                        <li class="pending"><a href="">Chờ xét duyệt<span class="count">(0)</span> |</a></li>
                        <li class="pending"><a href="">Thùng rác<span class="count">(0)</span></a></li>
                    </ul>
                    <form method="GET" class="form-s fl-right">
                        <input type="text" name="s" id="s">
                        <input type="submit" name="sm_s" value="Tìm kiếm">
                    </form>
                </div>
                <div class="actions">
                    <form method="GET" action="" class="form-actions">
                        <select name="actions">
                            <option value="0">Tác vụ</option>
                            <option value="1">Công khai</option>
                            <option value="1">Chờ duyệt</option>
                            <option value="2">Bỏ vào thủng rác</option>
                        </select>
                        <input type="submit" name="sm_action" value="Áp dụng">
                    </form>
                </div>
                <?php
                if (!empty($list_product)) {
                ?>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã sản phẩm</span></td>
                                    <td><span class="thead-text">Ảnh đại diện</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Giá</span></td>
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
                                $status = array(
                                    'waiting' => 'Chờ duyệt',
                                    'posted' => 'Đã đăng'
                                );
                                foreach ($list_product as $product) {
                                    $tmp++;
                                    $product_cat = get_cat_product_by_cat_id($product['cat_id']);
                                ?>
                                    <tr>
                                        <td><span class="tbody-text"><?php echo $tmp; ?></span></span> </td>
                                        <td><span class="tbody-text "><?php echo $product['code']; ?></span></span> </td>
                                        <td><span class="tbody-text "><img style="width: 100px; height: auto; " src="<?php echo $product['thumb']; ?>" alt=""></span></span> </td>
                                        <td><span class="tbody-text "><?php echo $product['name']; ?></span></span> </td>
                                        <td><span class="tbody-text "><?php echo currency_format($product['price_current']); ?></span></span> </td>
                                        <td><span class="tbody-text "><?php echo $product_cat['name']; ?></span></span> </td>
                                        <td><span class="tbody-text ">Admin</span></span> </td>
                                        <td><span class="tbody-text "><?php echo $status[$product['status']]; ?></span></span> </td>
                                        <td><span class="tbody-text "><?php echo $product['created_at']; ?></span></span> </td>
                                        <td><span class="tbody-text">
                                                <a href="?mod=products&action=edit&id=<?php echo $product['id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> | <a href="?mod=products&action=delete&id=<?php echo $product['id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                    echo get_pagging($num_page, $page, "?mod=products&action=show_products");
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