<?php
	require('../libs/config.php');
	$idT = $_GET['idT'];
	$sql = "select `idH`, `TenHuyen` from `cms_diadiem_quanhuyen` where `idT` = ".$idT." ORDER BY `TenHuyen` ASC";
	$q = mysql_query($sql);
	echo '<select name="QuanHuyen" id="QuanHuyen" onchange="callAjaxPX("modules/ajaxPhuongXa.php","#PhuongXa")">';
	while($data = mysql_fetch_assoc($q)){
		echo '<option value="'.$data['idH'].'">'.$data['TenHuyen'].'</option>';
	}
	echo '</select>';
?>
