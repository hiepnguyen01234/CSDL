<?php
	$idDH = round($_GET['idDH']);
	$act = round($_GET['act']);
	
	if($act==1) $tt = 2;
	elseif($act==2) $tt = 3;
	elseif($act==3) $tt = 4;
	elseif($act==4) $tt = 5;

	$sql = "update `cms_donhang` set `TinhTrang` = $tt where `idDH` = $idDH";
	echo $sql;
	mysql_query($sql);
	header('location: ?m=donhang');
	exit();
?>