<?php
	//print_r($_POST);
	if(isset($_POST['check'])){
		$check = $_POST['check'];
		$sql = "UPDATE `cms_binhchon_luachon` SET `vote`=`vote`+1 WHERE `id`=".$check;
		mysql_query($sql);		
	}
	header("location:?m=binhchon_ketqua");
	exit();
?>