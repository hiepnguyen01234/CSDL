<?php
	require('../libs/config.php');
	$idH = $_GET['idH'];
	$sql = "select `idPX`, `TenPX` from `cms_diadiem_phuongxa` where `idH` = ".$idH." ORDER BY `TenPX` ASC";
	$q = mysql_query($sql);
	while($data = mysql_fetch_assoc($q)){
		echo '<option value="'.$data['idPX'].'">'.$data['TenPX'].'</option>';
	}
?>