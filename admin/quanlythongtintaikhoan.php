<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-quanlyTK.css">
    <title>Quản Lý Thông Tin Tài Khoản</title>
</head>
<body>
		
		<?php include "header.php" ;
		if (!empty($_SESSION['username'])) {		
		?>

        <div class="content" >
            <div align="center"><h2>Quản lý thông tin tài khoản</h2></div>
            <table class="customer-table">
                <thead>
                    <tr>
                        <th>Tên đăng nhập</th>
                        <th>Mật khẩu</th>
                        <th>Email</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Keết nối đến cơ sở dữ liệu và truy vấn dữ liệu ở đây
                        include '../connect_db.php';
                        $result = mysqli_query($kn, "SELECT * FROM `taikhoan` WHERE 1");
                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                            <td> <?= $row['tendangnhap']?> </td>
                            <td> <?= $row['matkhau'] ?></td>
                            <td> <?= $row['email']?> </td>
                            <td><a href="http://localhost/bansach/THLVN/admin/suataikhoan.php?id=<?$row['id']?>" >Sửa</a></td>
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