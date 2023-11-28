<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/them.css">
    <title>Sửa Sách</title>
</head>

<body>
<?php
        include '../connect_db.php'; 
        if (!empty($_GET['id'])) {
            $result = mysqli_query($kn, "SELECT * FROM `sanpham` WHERE `id_sp` = " . $_GET['id']);
            $sanpham = $result->fetch_assoc();
        }

        if(isset($_GET['id'])){
            $id_sp= $_GET['id'];          
        ?>
            <a href="http://localhost/bansach/THLVN/admin/quanlysach.php" class="back-to-menu">quay lại menu quản lí</a>
        <form action="<?php echo ($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
        <div class ="form-container">
                <div class="form-left">
                    <ul>
                        <li>Tên Sách<input type="text" name ="ten_sp" value="<?= !empty($sanpham) ? $sanpham['ten_sp'] : "" ?>" required oninvalid="this.setCustomValidity('Vui lòng nhập Tên Sách')"> </li>
                        <li>Tên Tác Giả<input type="text" name ="tentacgia" value="<?= !empty($sanpham) ? $sanpham['tentacgia'] : "" ?>" required oninvalid="this.setCustomValidity('Vui lòng nhập Tên Tác Giả')"> </li>
                        <li>Giá Tiền<input type="text" name ="gia" value="<?= !empty($sanpham) ? $sanpham['gia'] : "" ?>" required oninvalid="this.setCustomValidity('Vui lòng nhập Giá Tiền')"> </li>
                        <li> Số Lượng<input type="text" name ="soluong"value="<?= !empty($sanpham) ? $sanpham['soluong'] : "" ?>" required oninvalid="this.setCustomValidity('Vui lòng nhập Số Lượng')"></li> 
                    </ul>  
                </div>
                <div class="form-right">
                    
                        <ul>
                        <label>Thể Loại</label>
                            <li> 
                                <select style=";" >
                                    <?php
                                        include './connect_db.php';
                                        $query = "SELECT * FROM theloai";
                                        $theloai = mysqli_query($kn, $query);
                                        while ($row = mysqli_fetch_assoc($theloai)) {
                                        $categoryId = $row['id_theloai'];
                                        $categoryName = $row['ten'];
                                        echo "<option value='$categoryId'>$categoryName</option>";
                                        }

                                        // Đóng kết nối cơ sở dữ liệu
                                        mysqli_close($kn);
                                    ?>
                                </select>
                                
                            </li>
                            <li>Giới thiệu sách<textarea name="chitiet" id="" <?= !empty($sanpham) ? $sanpham['chitiet'] : "" ?> cols="30" rows="10" required oninvalid="this.setCustomValidity('Vui lòng nhập Giới Thiệu Sách')"></textarea> </li>
                            <!--<li>Chọn Ảnh <input type="file" name="hinh_sp" id="hinh_sp"  required oninvalid="this.setCustomValidity('Vui lòng Chọn hình ảnh sách')"></li>
                            <img src=" $sanpham['hinh_sp'] " alt=""/>
                            <input type="hidden" name="hinh_sp" value="<?= $sanpham['hinh_sp'] ?>"> -->
                          
                         <div>  <?php if (!empty($sanpham['hinh_sp'])) { ?>
                                <img src=".<?= $sanpham['hinh_sp'] ?>" height="200px" /><br/>
								
                                <input type="hidden" name="hinh_sp" value="<?= $sanpham['hinh_sp'] ?>" />
						    <?php }  ?>
                            <input multiple type="file" name="hinh_sp" value="<?= $sanpham['hinh_sp']  ?>" />
                         </div> 

                            <li><input type="submit" value="Sửa "name ="sua"></li>
                        </ul>
                </div>
            </div>
        </form>  
         <?php 
            if (isset($_POST['sua'])){
                
                $ten_sp=$_POST['ten_sp'];
                $soluong=$_POST['soluong'];
                $tentacgia=$_POST['tentacgia'];
                $gia=$_POST['gia'];
                $chitiet=$_POST['chitiet'];
                $theloai=$_POST['theloai'];
                    $image = $_FILES["hinh_sp"];
                    $image_name = $image["name"];
                    // Kiểm tra và di chuyển tệp tin vào thư mục lưu trữ (hoặc thực hiện các xử lý khác tùy ý)
                    $upload_dir = "./images/";
                    $image_path = $upload_dir . basename($image_name);
                       // Lưu đường dẫn vào cơ sở dữ liệu
                       $sql_capnhat = "UPDATE `sanpham`
                       SET `ten_sp` = '".$ten_sp."',
                           `soluong` = '".$soluong."',
                           `hinh_sp` = '".$image_path."',
                           `tentacgia` = '".$tentacgia."',
                           `gia` = '".$gia."',
                           `chitiet` = '".$chitiet."',
                           `theloai` = '".$theloai."'
                       WHERE `id_sp` = '".$id_sp."'";
                      // var_dump($id_sp);exit;
                $result = mysqli_query($kn, $sql_capnhat);
            } 
            } else{
                echo "khong co thong tin sach";
            }  
        ?>
          
        
</body>
</html>