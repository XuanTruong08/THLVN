<?php session_start(); ?>

<html>
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta ten="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin_style.css">
    <title>Chi tiết đơn hàng</title>
	</head>
	<body>
	<?php 
	if (!empty($_SESSION['username'])) {
		include '../connect_db.php';
		$giohang = mysqli_query($kn, "SELECT giohang.tennguoidat, giohang.diachi, giohang.sodienthoai, giohang.ghichu, chitiet_giohang.*, sanpham.ten_sp as product_name 
	FROM giohang
	INNER JOIN chitiet_giohang ON giohang.id_gh = chitiet_giohang.id_giohang
	INNER JOIN sanpham ON sanpham.id_sp = chitiet_giohang.id_sanpham
	WHERE giohang.id_gh"); //=  . $_GET['id']);
	//var_dump($giohang); exit;
	//mysqli_fetch_all lấy hết ra hiển thị dưới dạng array có thể xem  được
		$giohangs = mysqli_fetch_all($giohang, MYSQLI_ASSOC);
	}
		?>
		
		<div id="order-detail-wrapper">
            <div id="order-detail">
                <h1>Chi tiết đơn hàng</h1>
				<!--lấy ra mảng $orders[0]['?'] thông tin đầu tiên(0)-->
                <label>Người nhận: </label><span> <?= $giohangs[0]['tennguoidat'] ?></span><br/>
                <label>Điện thoại: </label><span><?= $giohangs[0]['sodienthoai'] ?> </span><br/>
                <label>Địa chỉ: </label><span> <?= $giohangs[0]['diachi'] ?></span><br/>
                <hr/>
                <h3>Danh sách sản phẩm</h3>
                <ul>
                    <?php
                    $totalQuantity = 0;
                    $totalMoney = 0;
                    foreach ($giohang as $row) {
                        ?>
                        <li>
                            <span class="item-name"><?= $row['product_name'] ?></span>
                            <span class="item-quantity"> - Số Lượng: <?= $row['soluong'] ?> sản phẩm</span>
                        </li>
                        <?php
                        $totalMoney += ($row['gia'] * $row['soluong']);
                        $totalQuantity += $row['soluong'];
                    }
                    ?>
                </ul>
                <hr/>
                <label>Tổng SL:</label> <?= $totalQuantity ?> - <label>Tổng tiền:</label> <?= number_format($totalMoney, 0, ",", ".") ?> đ
                <p><label>Ghi chú: </label><?= $giohangs[0]['ghichu'] ?></p>
            </div>
        </div>

	</body>
</html>