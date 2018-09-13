<?php
	//ham chuyen doi ngay dd-mm-yy => yy-mm-dd
	function convertDate($date){
		$d = substr($date,0,2);
		$m = substr($date,3,2);
		$y = substr($date,6);
		$full = "$y/$m/$d";
		return $full;
	}//echo convertDate('15-05-1991');	
	
	$TinhTrang = array(1=>'Mới đặt','Đã xác nhận','Đang giao','Hoàn tất','Đã Hủy');//Thông tin trạng thái của đơn hàng
?>