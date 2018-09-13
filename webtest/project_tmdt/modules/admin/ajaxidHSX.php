<?php
	include("../../libs/config.php");
	for($i=1;$i<3000000;$i++)sqrt(1);
	$idLoai = round($_GET['idLoai']);
	$sql = "SELECT `idHSX`, `TenHang` FROM `cms_sanpham_hangsanxuat` WHERE `idCL` IN (			
			SELECT `idCL` 
			FROM `cms_sanpham_loai` 
			WHERE `idLoai` = $idLoai )";
	$q = mysql_query($sql);
	echo '<option value="0">--Chọn hãng sản xuất--</option>';
	while($data = mysql_fetch_assoc($q)){
?>
	<option value="<?php echo $data['idHSX']?>"><?php echo $data['TenHang'];?></option>
<?php
	}
?>