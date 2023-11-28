<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta ten="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-quanlyTK.css">
    <link rel="stylesheet" href="javascript.js">
    </head>
    <body>
        <?php
        session_start();
        include '../connect_db.php';
        // if (!empty($_SESSION['username'])) { //Kiểm tra xem đã đăng nhập chưa?
            // ?>
            <div class="container" class="sidebar">
            <div class="sidebar" style="    border-radius: 20px;">
                <ul>
                        <h2>Chào mừng </h2>
                        <li><a href="quanlysach.php">Quản lý sách</a></li>
                        <li><a href="quanlythongtintaikhoan.php">Quản lý Thông Tin Tài Khoản</a></li>
                        <li><a href="quanlyhoadon.php">Quản lý Đơn Hàng</a></li>
                        <li><a href="thongke.php">Quản lý Thống kê</a></li>
                        <li><a href="dangxuat.php">Đăng Xuất</a></li>    
                </ul>
            </div>
			
                 