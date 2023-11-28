<?php
session_start();
require_once "../connect_db.php";
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Đăng Xuất</title>
	</head>
	<body>
		
		<script>
			alert('Đăng xuất thành công');
			window.location.href = "http://localhost/bansach/THLVN/dangnhap.php";
		</script>
	</body>
</html>