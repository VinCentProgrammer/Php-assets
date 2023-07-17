<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/app.js"></script>
    <title>Làm việc với Ajax</title>
</head>
<body>
    <h2>Tính toán tổng hóa đơn hàng</h2>
    <form action="">
        <p>Giá: <span id="price">10</span></p>
        <label for="num_order">Số lượng:</label>
        <input type="number" name="num_order" id="num_order" min = "0" max = "200" value="0">
        <hr>
        <p>Tổng tiền: <span id="res">0</span></p>
    </form>
    
</body>
</html>