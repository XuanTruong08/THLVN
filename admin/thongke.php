<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/thongke.css">

    <title>Date Range Picker Example</title>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Thống Kê</title>
</head>
<body>
                
		<?php include "header.php" ; ?>

        <div class="content" >

            <div align="center"><h2 style="font-size:40px;">Thống Kê</h2></div>
            
            <label for="picker1">Từ ngày:</label>
<input type="date" id="picker1" name="picker1">

<label for="picker2">Đến ngày:</label>
<input type="date" id="picker2" name="picker2">
            

            </script>
            <div class="search-container" style="text-align:left; margin-top:10px; " >
                <input style="font-size:14px; border-radius: 40px;" 
                    type="text" id="searchInput" class="search-box" placeholder="Tìm kiếm...">
                <button style="font-size:14px;" 
                    onclick="performSearch()" class="search-btn">Mã sản phẩm</button>
            </div>

            <table class="customer-table" style="border: 4px solid #dddddd;">
                <thead>
                    <tr>
                        <th>Mã sách</th>   
                        <th>Tên sách</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng tiền</th>
                        <th>Hành động</th>   
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                        // Keết nối đến cơ sở dữ liệu và truy vấn dữ liệu ở đây
                        include '../connect_db.php';
						$sql = "SELECT id_sanpham,sanpham.ten_sp,chitiet_giohang.gia, SUM(chitiet_giohang.soluong) AS tong_soluong, SUM(chitiet_giohang.gia * chitiet_giohang.soluong) AS tong_giatien 
								FROM chitiet_giohang inner join giohang on chitiet_giohang.id_giohang = giohang.id_gh 
                                					INNER JOIN sanpham on chitiet_giohang.id_sanpham = sanpham.id_sp								
								WHERE 1 
								GROUP BY id_sanpham,sanpham.ten_sp";
						$result = mysqli_query($kn, $sql);
						//var_dump($row = $result->fetch_assoc());exit;
                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                            <td> <?= $row['id_sanpham']?> </td>
                            <td> <?= $row['ten_sp'] ?></td>
                            <td> <?= $row['tong_soluong']?> </td>
                            <td><?= $row['gia'] ?></td>
                            <td> <?= $row['tong_giatien']?>    
                            <td><a href="http://localhost/bansach/THLVN/admin/thongke.php?id=<?$row['id']?>" >Sửa</a></td>
                            </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        
        
    </div>

</body>
</html>