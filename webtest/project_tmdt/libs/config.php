<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	$conn = mysql_connect('localhost','root','working') or die ('Không thể kết nối Cơ sở dữ liệu');
	mysql_select_db('shoplt',$conn) or die ('Lỗi chọn Cơ Sở Dữ Liệu');
	mysql_query('SET NAMES UTF8');
?>