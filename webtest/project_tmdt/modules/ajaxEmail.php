<?php
	require('../libs/config.php');
	$Email=mysql_escape_string($_POST['Email']);
	$sql="select 1 from `cms_quantri_nguoidung` where `Email`='$Email'";
	//echo $sql;
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)>0)echo '<img src="images/Cancel_16x16.png" align="absmiddle" width="16" title="Địa chỉ email này đã được dùng. Hãy sử dụng email khác !">';
	else echo '<img align="absmiddle" src="images/Check_16x16.png" width="16" title="Bạn được dùng email này để đăng ký">';
?>