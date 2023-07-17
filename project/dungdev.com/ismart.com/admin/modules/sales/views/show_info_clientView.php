<?php
get_header();
// show_array($info_client);
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thông tin khách hàng</h3>
                </div>
            </div>
            <?php
            if (!empty($info_client)) {
            ?>
                <div class="table-responsive">
                    <table class="table list-table-wp">
                        <thead>
                            <tr>
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

                            <tr>
                                <td><span class="tbody-text"><?php echo $info_client['name_client']; ?></span></span> </td>
                                <td><span class="tbody-text"><?php echo $info_client['email']; ?></span></span> </td>
                                <td><span class="tbody-text"><?php echo $info_client['address']; ?></span></span> </td>
                                <td><span class="tbody-text"><?php echo $info_client['phone_numbers']; ?></span></span> </td>
                                <td><span class="tbody-text"><?php echo $info_client['note']; ?></span></span> </td>
                                <td><span class="tbody-text"><?php echo $info_client['pay_method']; ?></span></span> </td>
                                <td><span class="tbody-text"><?php echo $info_client['total_pay']; ?></span></span> </td>
                            </tr>

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