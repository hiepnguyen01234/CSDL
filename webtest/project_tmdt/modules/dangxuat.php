<?php
	unset($_SESSION['idNguoiDung']);
	unset($_SESSION['HoTen']);
	unset($_SESSION['Email']);
	header('location: ?m=dangnhap');
	exit();
?>