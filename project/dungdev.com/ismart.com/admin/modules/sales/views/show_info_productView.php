<?php
get_header();
// show_array($products_ordered);
// show_array($client);
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="detail-exhibition fl-right">
            <div class="section" id="info">
                <div class="section-head">
                    <h3 class="section-title">Thông tin đơn hàng</h3>
                </div>
                <ul class="list-item">
                    <li>
                        <h3 class="title">Mã đơn hàng</h3>
                        <span class="detail"><?php echo $products_ordered[0]['code']; ?></span>
                    </li>
                    <li>
                        <h3 class="title">Địa chỉ nhận hàng</h3>
                        <span class="detail"><?php echo $client['address']; ?> / <?php echo $client['phone_numbers']; ?></span>
                    </li>
                    <li>
                        <h3 class="title">Thông tin vận chuyển</h3>
                        <span class="detail"><?php echo $client['pay_method']; ?></span>
                    </li>
                    <form method="POST" action="">
                        <li>
                            <h3 class="title">Tình trạng đơn hàng</h3>
                            <select name="status">
                                <option value='0'>Chờ duyệt</option>
                                <option selected='selected' value='1'>Đang vận chuyển</option>
                                <option value='2'>Thành công</option>
                            </select>
                            <input type="submit" name="sm_status" value="Cập nhật đơn hàng">
                        </li>
                    </form>
                </ul>
            </div>
            <div class="section">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm đơn hàng</h3>
                </div>
                <div class="table-responsive">
                    <table class="table info-exhibition">
                        <thead>
                            <tr>
                                <td class="thead-text">STT</td>
                                <td class="thead-text">Ảnh sản phẩm</td>
                                <td class="thead-text">Tên sản phẩm</td>
                                <td class="thead-text">Đơn giá</td>
                                <td class="thead-text">Số lượng</td>
                                <td class="thead-text">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tmp = 0;
                            $num_order = 0;
                            foreach ($products_ordered as $e) {
                                $num_order += $e['qty'];
                                $tmp++;
                            ?>
                                <tr>
                                    <td class="thead-text"><?php echo $tmp; ?></td>
                                    <td class="thead-text">
                                        <div class="thumb">
                                            <img src="<?php echo $e['thumb_product'] ?>" alt="">
                                        </div>
                                    </td>
                                    <td class="thead-text"><?php echo $e['name_product'] ?></td>
                                    <td class="thead-text"><?php echo currency_format($e['price']) ?></td>
                                    <td class="thead-text"><?php echo $e['qty'] ?></td>
                                    <td class="thead-text"><?php echo currency_format($e['sub_total']) ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section">
                <h3 class="section-title">Giá trị đơn hàng</h3>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <span class="total-fee">Tổng số lượng</span>
                            <span class="total">Tổng đơn hàng</span>
                        </li>
                        <li>
                            <span class="total-fee"><?php echo $num_order; ?> sản phẩm</span>
                            <span class="total"><?php echo currency_format($client['total_pay']); ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
        //} else echo "Không có dữ liệu!!!";
        ?>
    </div>
</div>
</div>
</div>
<?php
get_footer();
?>