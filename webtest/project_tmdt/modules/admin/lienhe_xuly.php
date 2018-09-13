<?php
	$act = $_GET['act'];
	$idLH = $_GET['idLH'];
	if($act==1){
		$sql = "update `cms_lienhe` set `XacNhan` = 1 where `idLienHe` = $idLH";
		mysql_query($sql);
		header("location: ?m=lienhe");
		exit();
	}
	if($act==2){
	 	$sql = "DELETE FROM `cms_lienhe` where `idLienHe` = $idLH";
		mysql_query($sql);
		header("location: ?m=lienhe");
		exit();
	}
?>