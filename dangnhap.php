<!doctype html>
<?php session_start(); ?>
<html lang="vn">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập</title>
    <link rel="stylesheet" type="text/css" href="css/dangnhap.css">
    <style>
        
    </style>
</head>
<?php
		//1.ket noi
		include 'connect_db.php';
		if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = ($_POST['password']);
		$sql_khach="select * from taikhoan where tendangnhap='".$username."' and matkhau='".$password."'";
		$result_khach=mysqli_query($kn,$sql_khach);
		$sql_admin="select * from admin where Username='".$username."' and Password='".$password."'";
		$result_admin=mysqli_query($kn,$sql_admin);
		
		if (mysqli_num_rows($result_khach) > 0) {
			// Đăng nhập thành công với tài khoản người dùng
			$row = mysqli_fetch_array($result_khach);
			$_SESSION['username'] = $row['tendangnhap'];
			header("location: TrangChu.php");
		} elseif (mysqli_num_rows($result_admin) > 0) {
			// Đăng nhập thành công với tài khoản quản trị
			$row = mysqli_fetch_array($result_admin);
			$_SESSION['username'] = $row['Username'];
			header("location: admin/quanlysach.php");
		} else {
			echo "<script>
				alert('Vui lòng nhập lại thông tin');
				window.history.back();
				</script>";
				//header('location: dangnhap.php');
		}		
		mysqli_close($kn);
    }
	?>
<body>
    
    <div class="container">
        <h2>Đăng nhập</h2>
       <form method ="POST" action ="<?php echo ($_SERVER['PHP_SELF']);?>" align ="center" >
            <input type="text" placeholder="Tên đăng nhập" name="username">
            <input type="password" placeholder="Mật khẩu" name="password">
            <div>
                <input type="checkbox" id="rememberMe" name="rememberMe">
                <label for="rememberMe">Lưu đăng nhập</label>
            </div>
            <button type="submit" name="dn">Đăng nhập</button>
        </form>
        <p>Bạn chưa có tài khoản? <a href="http://localhost/bansach/THLVN/dangki.php">Đăng ký ngay</a></p>
		<script src="script.js"></script>
    </div>
</body>
</html>