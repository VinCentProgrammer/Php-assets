<?php
get_header();
// show_array($clients);
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách khách hàng</h3>
                </div>
            </div>
            <?php
            if (!empty($clients)) {
            ?>
                <div class="table-responsive">
                    <table class="table list-table-wp">
                        <thead>
                            <tr>
                                <td><span class="thead-text">STT</span></td>
                                <td><span class="thead-text">Tên khách hàng</span></td>
                                <td><span class="thead-text">Email</span></td>
                                <td><span class="thead-text">Địa chỉ nhận hàng</span></td>
                                <td><span class="thead-text">Số điện thoại</span></td>
                                <td><span class="thead-text">Lưu ý đơn hàng</span></td>
                                <td><span class="thead-text">Phương thức thanh toán</span></td>
                                <td><span class="thead-text">Tổng tiền</span></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tmp = 0;
                            foreach ($clients as $info_client) {
                                $tmp++;
                            ?>
                                <tr>
                                    <td><span class="tbody-text"><?php echo $tmp; ?></span></span> </td>
                                    <td><span class="tbody-text"><?php echo $info_client['name_client']; ?></span></span> </td>
                                    <td><span class="tbody-text"><?php echo $info_client['email']; ?></span></span> </td>
                                    <td><span class="tbody-text"><?php echo $info_client['address']; ?></span></span> </td>
                                    <td><span class="tbody-text"><?php echo $info_client['phone_numbers']; ?></span></span> </td>
                                    <td><span class="tbody-text"><?php echo $info_client['note']; ?></span></span> </td>
                                    <td><span class="tbody-text"><?php echo $info_client['pay_method']; ?></span></span> </td>
                                    <td><span class="tbody-text"><?php echo $info_client['total_pay']; ?></span></span> </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <div class="section-detail clearfix">
                    <?php
                    echo get_pagging($num_page, $page, "?mod=sales&action=show_info_clients");
                    ?>
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