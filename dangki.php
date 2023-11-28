<!doctype html>
<?php session_start(); ?>
<html lang="vn">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập</title>
    <link rel="stylesheet" type="text/css" href="css/dangnhap.css">
</head>
<?php
	include './connect_db.php';
	if(isset($_POST['dk']))
	{//Lay du lieu tu form
		$tendn= $_POST['user'];		
		$matKhau=($_POST['password']);
		$repass = ($_POST['repass']);
		$diaChiMail= $_POST['email'];
				
		mysqli_query($kn, "'SET NAME', 'utf8'");
		//4.Xay dung cau lenh truy van
		$cauLenh="insert into taikhoan(tendangnhap,matkhau,email) values('".$tendn."','".$matKhau."','".$diaChiMail."')";
		$cauLenhKt="select * from taikhoan where tendangnhap='".$tendn."'";
		//5.Thuc hien cau lenh
		if (!filter_var($diaChiMail, FILTER_VALIDATE_EMAIL)) {
			echo "<script>
			alert('không đúng định dạng email');
			window.history.back();
			</script>";
			exit;
		}
			//Kiem tra mat khau
		if($matKhau==$repass){
			//Kiem tra ten dang nhap co trung hay khong.
			$kqkt=mysqli_query($kn, $cauLenhKt);
			if($dong=mysqli_fetch_array($kqkt)){
				
				echo "<script>
				alert('Tai khoan da ton tai!');
				window.history.back();
				</script>";
				}else{
					($kq=mysqli_query($kn, $cauLenh));
					echo "<script>
					alert('Dang ki thanh cong');
					</script>";
					header('location: TrangChu.php');
				}
				
		}else{
			echo "<script>
			alert('Mật khẩu ban đầu không trùng khớp');
			window.history.back();
			</script>";
		}
		//6.Lay ket qua tra ve
		//7.8. Dong
		//mysqli_close($kn);
	}
		
	?>
<body>
    <div class="container">
        <h2>Đăng ký tài khoản</h2>
  <form action = "<?php echo ($_SERVER['PHP_SELF']);?>" method="POST">
		<input type="text" placeholder="Tên đăng nhập" name="user" >
        <input type="password" placeholder="Mật khẩu" name="password" required oninvalid="this.setCustomValidity('Thông tin bắt buộc')">
		<input type="password" placeholder="Nhập lại mật khẩu" name="repass" >
		<input type="text" placeholder="Nhập email..." name ="email" required oninvalid="this.setCustomValidity('Thông tin bắt buộc')">
    <button type="submit" name ="dk" class="btn btn-primary">Đăng kí</button>
  </form>
  <script src="script.js"></script>
       </div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>




