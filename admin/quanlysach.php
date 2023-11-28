<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-quanlyTK.css">
    <title>Quản Lý Thông Tin Sách</title>
</head>
<body>
		<?php include "header.php" ; 
		if (!empty($_SESSION['username'])) {?>
		
        <div class="content" >
            <div align="center"><h2>Quản lý thông tin Sách</h2></div>
            <table class="customer-table">
                <thead>
                    <tr>
                        <th>Mã Sách</th>
                        <th>Tên Sách </th>
                        <th>Tên Tác Giả </th>
                        <th>Số Lượng </th>
                        <th>Giá</th>
                        <th>Thể Loại </th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Keết nối đến cơ sở dữ liệu và truy vấn dữ liệu ở đây
                        include '../connect_db.php';
                        $result = mysqli_query($kn, "SELECT * FROM `sanpham` WHERE 1");
                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                            <td> <?= $row['id_sp']?> </td>
                            <td> <?= $row['ten_sp'] ?></td>
                            <td> <?= $row['tentacgia']?> </td>
                            <td><?= $row['soluong'] ?></td>
                            <td> <?= $row['gia']?> </td>
                            <td> <?= $row['theloai']?> </td>
                            <td><a href="http://localhost/bansach/THLVN/admin/suataikhoan.php?id=<?$row['id']?>&& submit='delete'">Xóa</a></td>
                            <td><a href="http://localhost/bansach/THLVN/admin/suasach.php?id=<?$row['id_sp']?>" >Sửa</a></td>
                            </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        
    </div>
<?php	 
}
?>
</body>
</html>