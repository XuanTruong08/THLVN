<!DOCTYPE html>
<html>
<head>
	<title>ALTTH SHOP</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="giaodien.css">
</head>
<body>
        <header>
	         <nav class="container">
                <div class="logo-main-menu">
                    <a href="" id="logo">
                        <img src="logoTHLVN.jpg" alt="BOOKSTORE" width="200px">
                    </a> 
                </div>
                <footer>
                    <div id ="top-bot">
                        <div style><h1>Thông Tin Liên Hệ </h1></div>
                        <div id ="ngang">
                            <div>
                                <ul>
                                    <li id = "ngang"><img src="vtri.png"><span><h3><b>      170 An Dương Vương , TP.Quy Nhơn , Tỉnh Bình Định</b></h3></span></li>
                                    <li id = "ngang" ><img src ="homthu.jpg"><span><h3><b>   bookstore@gmail.com</b></h3></span></li>
                                    
                                </ul>
                            </div>
                            <div>
                                <ul>
                                    <li id = "ngang"><img src ="web.png"><span><h3><b> WWW.bookstore.com.vn</b></h3></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </footer>
                <div class="main-menu-right">
                    <ul id="main-menu-right2">
                        <li>
                            <div id="top-bot">
                                <a><img src = "tk.jpg" width = "150" ></a>
                                <a href="http://localhost/Web_TLam/admin1/index.php">    Tài Khoản </a>
                            </div>
                        </li>
                        <li>
                            <div id="top-bot">
                                <a><img src = "R.png" width = "100" ></a>
                            <a href="http://localhost/Web_TLam/admin1/index.php">Giỏ Hàng </a>
                            </div>
                        </li>
                    </ul>
                </div>
             </nav>
        </header>
        <div>
            <ul id="main-menu-center">
                <li ><a href=""> TRANG CHỦ</a></li>
                <li><a href=""> GIỚI THIỆU</a></li>
                <li><a href=""> THỂ LOẠI SÁCH</a></li>
                <li><a href=""> HỖ TRỢ</a></li>
                <li><a href=""> TÌM KIẾM</a></li>
                <li><input  type="text" value="" id ="search"></li>
            </ul>
        </div>
        <?php
                /*include './connect_db.php';
                $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:10;
                $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
                $offset = ($current_page - 1) * $item_per_page;// sản phẩm bắt đầu từ offset trong database
                $products = mysqli_query($kn, "SELECT * FROM `sanpham` ORDER BY `id` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
                $totalRecords = mysqli_query($kn, "SELECT * FROM `product`");//tổng số sản phẩm
                $totalRecords = $totalRecords->num_rows;
                //ceil làm tròn
                $totalPages = ceil($totalRecords / $item_per_page);//tổng số trang
                mysqli_close($kn);*/
        ?>

        <section class="products">
            <div class="products-content">

                <?php                                   
                    while($row = mysqli_fetch_array($products)) { 
                ?>
                        <ul>
                            <div class="product">
                                <div class="product__avatar">
                                    <a href="" ><img src="<?=$row['hinh_sp'] ?>" title="<?= $row['ten_sp']?>" class="product__avatar--front"/></a>
                                    <a href=""><img src="<?=$row['hinh_sp'] ?>" title="<?= $row['ten_sp']?>" class="product__avatar--back" /></a>
                                </div>
                                <div class="product__name"><a href=""><?= $row['ten_sp']?></div>    
                                <div class="product__price">
                                    <span><a href="">Giá: <?= number_format($row['gia'], 0, ",", ".") ?></a><span>đ</span></span>
                                </div>
                                    <p><?= $row['chitiet'] ?></p>
                                    <br>
                                        <div class="buy-button">
                                            <form id="add-to-cart-form" action="cart.php?action=add" method="POST" >
                                                <input type="text" value="1" name="quantity[<?= $row['id_sp']?>]">
                                                <input type="submit" value="Mua sản phẩm" />
                                            </form>
                                        </div>
                            </div>  
                        </ul>
                <?php } ?>
        </div>
    </section>               
                    
</body>
</html>