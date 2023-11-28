<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/giaodien.css">
    <link rel="stylesheet" href="css/theloai.css">
	<title>BOOKSTORE</title>
<style>
    .products {
    padding: 0 80px;
}

.products-content {
    margin-top: 10px;
    width: 100%;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    grid-gap: 3rem 2rem;
    padding: 1rem;
    min-height: 400px;
}

.product {
    text-align: center;
    border: 2px solid rgb(123, 63, 63);
    border-radius: 20px;
}
#product-search{
            padding-bottom: 20px;
            float: left;
        }

.product__avatar {
    cursor: pointer;
}

.product>div+div {
    margin-top: 2%;
}

.product__avatar>img {
    width: 100%;
    object-fit: cover;
    border-radius:20px;
    object-position: center;
}
.product:hover img{
    transform: translate(0,-20px);
}
.product__name:hover{
    color:#81d512;
}
.product__avatar--back {
    display: none;
}

.product__avatar:hover .product__avatar--back {
    display: inline-block;
}

.product__avatar:hover .product__avatar--front {
    display: none;
}
.product__avatar--front, .product__avatar--back {
    width: 240px;
    height: 300px;
	border-radius:15px;
}

.product__name {
    font-weight: bold;
    overflow: hidden;
    text-overflow: ellipsis;
    padding:10px 0;
}

.product__price {
	font-weight:bold;
    white-space: nowrap;
    overflow: hidden;
    padding-bottom:10px;
}
.price{
	font-weight:bold;
}
.product__price>span+span {
    margin-left: 2%;
	font-weight:bold;
}
.buy-button{
    text-align: right;
    margin-top: 10px;
}
.buy-button a{
    background: #444;
    padding: 5px;
    color: #fff;
}
</style>
</head>
<body>
<?php include 'header.php'; ?>
<?php
include '../THLVN/connect_db.php'; // Đường dẫn tới file kết nối cơ sở dữ liệu
// Kiểm tra nếu có tham số truyền vào (id_theloai)
if (isset($_GET['id_theloai'])) {
    $category_id = $_GET['id_theloai'];

    // Truy vấn để lấy thông tin về thể loại
    $categoryQuery = mysqli_query($kn, "SELECT * FROM `theloai` WHERE `id_theloai` = $category_id");

    // Kiểm tra xem thể loại có tồn tại không
    if (mysqli_num_rows($categoryQuery) > 0) {
        $category = mysqli_fetch_assoc($categoryQuery);
        $category_name = $category['ten'];
        $booksQuery = mysqli_query($kn, "SELECT * FROM `sanpham` WHERE `theloai` = $category_id");
    }
}

// Đóng kết nối cơ sở dữ liệu
mysqli_close($kn);
?>
<section class="products">
            <div class="products-content">
                <?php                                   
                    while($row = mysqli_fetch_array($booksQuery)) { 
                        if($row['soluong']>0){
                ?>
                        <ul>
                            <div class="product">
                                <div class="product__avatar">
                                    <a href="chitietsanpham.php?id=<?=$row['id_sp'] ?>"><img src="<?=$row['hinh_sp'] ?>" title="<?= $row['ten_sp']?>" class="product__avatar--front"/></a>
                                    <a href="chitietsanpham.php?id=<?=$row['id_sp'] ?>"><img src="<?=$row['hinh_sp'] ?>" title="<?= $row['ten_sp']?>" class="product__avatar--back"/></a>
                                </div>
                                <div class="product__name"><a href="chitietsanpham.php?id=<?=$row['id_sp'] ?>"><?= $row['ten_sp']?></div>    
                                <div class="product__price">
                                    <span><a href="chitietsanpham.php?id=<?=$row['id_sp'] ?>">Giá: <?= number_format($row['gia'], 0, ",", ".") ?></a><span>đ</span></span>
                                </div>
                                    <p><a href="chitietsanpham.php?id=<?=$row['id_sp'] ?>"><?= $row['chitiet'] ?></p>
                                    <br>
                                        <div class="buy-button">
                                            <form id="add-to-cart-form" action="giohang.php?action=add" method="POST" >
                                                <input type="text" value="1" name="quantity[<?= $row['id_sp']?>]">
                                                <input type="submit" value="Mua sản phẩm" />
                                            </form>
                                        </div>
                            </div>  
                        </ul>
                <?php } else {
                    ?>
                        <ul>
                            <div class="product">
                                <div class="product__avatar">
                                    <a href="chitietsanpham.php?id=<?=$row['id_sp'] ?>"><img src="<?=$row['hinh_sp'] ?>" title="<?= $row['ten_sp']?>" class="product__avatar--front"/></a>
                                    <a href="chitietsanpham.php?id=<?=$row['id_sp'] ?>"><img src="<?=$row['hinh_sp'] ?>" title="<?= $row['ten_sp']?>" class="product__avatar--back"/></a>
                                </div>
                                <div class="product__name"><a href="http://localhost/bansach/THLVN/chitietsanpham.php?id=<?=$row['id_sp'] ?>"><?= $row['ten_sp']?></div>    
                                <div class="product__price">
                                    <span><a href="http://localhost/bansach/THLVN/chitietsanpham.php?id=<?=$row['id_sp'] ?>">Giá: <?= number_format($row['gia'], 0, ",", ".") ?></a><span>đ</span></span>
                                </div>
                                    <p><?= $row['chitiet'] ?></p>
                                    <br>
                                        <h4>Hết Hàng</h4>
                            </div>  
                        </ul>
                    <?php } 
                    }
                    ?>
        </div>
    </section>
	</body>
	</html>