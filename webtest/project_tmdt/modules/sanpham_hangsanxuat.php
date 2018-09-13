<?php
if($mod=='sanpham'){
?>
<div class="widget">
	<h2 class="heading">Hãng sản xuất</h2>
	<ul id="menu-categories-menu">
		<?php
			$sql = 'SELECT `idHSX` , `idCL` , `TenHang` FROM `cms_sanpham_hangsanxuat`
					WHERE `AnHien` =1
					AND `idCL`
					IN (SELECT `idCL` FROM `cms_sanpham_loai`
					WHERE `idLoai` ='.$_GET['idLoai'].'
					)
					ORDER BY  `TenHang` ASC
					LIMIT 0 , 30 ';
			$q = mysql_query($sql);
			while($data = mysql_fetch_assoc($q)){
		?>
		<li><a href="?m=sanpham&idLoai=<?php echo $_GET['idLoai']?>&idHSX=<?php echo $data['idHSX']?>" title="<?php echo $data['TenHang'];?>"><?php echo $data['TenHang'];?></a></li>
		<?php
			}
		?>
	</ul>
</div><!-- end div widget -->
<?php
}
?>