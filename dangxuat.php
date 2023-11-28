<?php
session_start();
require_once "./connect_db.php";
// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['username'])) {
    // Người dùng chưa đăng nhập, không cần xử lý giỏ hàng, chỉ cần đăng xuất
    logout();
} else {
	
    // Người dùng đã đăng nhập, lưu thông tin giỏ hàng vào cơ sở dữ liệu
    $user = $_SESSION['username'];
    
    // Xóa thông tin giỏ hàng cũ của người dùng trong cơ sở dữ liệu
    // $sql_delete = "DELETE FROM giohangtemp WHERE name = '".$user."'";
    // $kn->query($sql_delete);
	$product_query = mysqli_query($kn, "SELECT * FROM sanpham WHERE id_sp IN (".implode(",", array_keys($_SESSION["giohang"])).")");
    // Lưu thông tin giỏ hàng mới vào cơ sở dữ liệu
	$insertString ="";
    foreach ($_SESSION['giohang'] as $id_sanpham => $soluong) {
        if($product_query && mysqli_num_rows($product_query) > 0) {
            $product_row = mysqli_fetch_assoc($product_query);
			//var_dump($product_row);	
            $price = $product_row['gia'];
			$insertString .="('".$user."', '".$id_sanpham."', '".$soluong."', '".$price."')";
			if ($product_query&&(mysqli_num_rows($product_query)-1)>0) {
                    $insertString .= ",";
							}
        }
    }
	$insertString = rtrim($insertString, ',');//bỏ dấu phẩy cuối cùng
	//var_dump($insertString);
	$sql_insert = "INSERT INTO giohangtemp ( name, id_sanpham, soluong, gia) VALUES " . $insertString . "";	   
    $inserTemp = mysqli_query($kn,$sql_insert );
    // Xóa session giỏ hàng
    unset($_SESSION['giohang']);

    // Thực hiện các xử lý khác khi đăng xuất
    logout();
}

// Hàm đăng xuất
function logout()
{
    // Thực hiện các xử lý đăng xuất

    // Hủy session và chuyển hướng người dùng đến trang đăng nhập hoặc trang khác
    session_unset();
    session_destroy();
    header("Location: dangnhap.php");
    exit();
}
?>