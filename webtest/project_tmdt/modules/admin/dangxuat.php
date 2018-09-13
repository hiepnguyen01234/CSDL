<?php
	unset($_SESSION['idNguoiDungQT']);
	unset($_SESSION['HoTenQR']);
	unset($_SESSION['EmailQR']);
	unset($_SESSION['QuyenHan']);
	header('location: ./login.php');
	exit();
?>