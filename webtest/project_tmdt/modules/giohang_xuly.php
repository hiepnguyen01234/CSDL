<?php
	$cart = $_SESSION['cart'];//Lấy giỏ hàng từ session
	$idSP = $_GET['idSP'];//Lấy id làm KEY
	$act = $_GET['act'];
	if($act == 1)
		$cart[$idSP]++;//Them vao gio hang
	if($act == 2)
		unset($cart[$idSP]);//Xoa san pham trong gio hang
	if($act == 3){
		foreach($cart as $k=>$v)
			$cart[$k] = max(1,round($_POST[$k]));//Cap nhat gio hang
	}
	$_SESSION['cart']=$cart;
	//print_r($cart);
	
	header('location: ?m=giohang');
	exit();
?>