<?php
get_header();
// show_array($list_product_ordered);
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách đơn hàng</h3>
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
                if (!empty($list_product_ordered)) {
                ?>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tên khách hàng</span></td>
                                    <td><span class="thead-text">Mã đơn hàng</span></td>
                                    <td><span class="thead-text">Ảnh</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Giá</span></td>
                                    <td><span class="thead-text">Số lượng</span></td>
                                    <td><span class="thead-text">Tổng số tiền mặt hàng</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text">Chi tiết</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $tmp = 0;
                                $status = array(
                                    'waiting' => 'Chờ duyệt',
                                    'posted' => 'Đã đăng'
                                );
                                foreach ($list_product_ordered as $item) {
                                    $tmp++;
                                    $client = get_client_by_id($item['id_client']);
                                    // show_array($client);
                                ?>
                                    <tr>
                                        <td><span class="tbody-text"><?php echo $tmp; ?></span></span> </td>
                                        <td><span class="tbody-text"><a href="?mod=sales&action=show_info_client&id=<?php echo $client['id']; ?>"><?php echo $client['name_client']; ?></a></span></span> </td>
                                        <td><span class="tbody-text"><?php echo $item['code']; ?></span></span> </td>
                                        <td><span class="tbody-text"><img style="width: 80px; height: 80px;" src="<?php echo $item['thumb_product']; ?>" alt=""></span></span> </td>
                                        <td><span class="tbody-text"><?php echo $item['name_product']; ?></span></span> </td>
                                        <td><span class="tbody-text"><?php echo currency_format($item['price']); ?></span></span> </td>
                                        <td><span class="tbody-text"><?php echo $item['qty']; ?></span></span> </td>
                                        <td><span class="tbody-text"><?php echo currency_format($item['sub_total']); ?></span></span> </td>
                                        <td><span class="tbody-text"><?php echo $item['created_at']; ?></span></span> </td>
                                        <td><span class="tbody-text"><a href="?mod=sales&action=show_info_product&id_client=<?php echo $item['id_client']; ?>">Chi tiết</a></span></span> </td>

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
                    echo get_pagging($num_page, $page, "?mod=sales&action=show_info_sale");
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