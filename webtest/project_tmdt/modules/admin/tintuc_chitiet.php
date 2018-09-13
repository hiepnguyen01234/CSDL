<title>Tin tức</title>
<?php
	$idTin = round($_GET['idTin']);
	$sql = "SELECT `UrlHinh` , `TieuDe` , `TomTat` , `NoiDung` , `NgayDang` , `idNguoiDung` , `SoLanXem`
			FROM `cms_tin`
			WHERE `idTin` =$idTin";
	$q = mysql_query($sql);
	$data = mysql_fetch_assoc($q);
?>

  <div class="clear"></div>
    <div class="col_min">
        <h2 class="tieudett"><?php echo $data['TieuDe'];?></h2>
        <h4 class="thongtintt">
        	<span>(<?php echo date('d / m / Y',strtotime($data['NgayDang']));?>)&nbsp;&nbsp;-&nbsp;&nbsp;
            	<?php
                	$idTG = $data['idNguoiDung'];
					$sqlTG = "SELECT `HoTen` FROM `cms_quantri_admin` WHERE `idNguoiDung` = $idTG";
					$qTG = mysql_query($sqlTG);
					$dataTG = mysql_fetch_row($qTG);
					echo $dataTG[0];
				?>
            </span>
        </h4>
        <p class="motatt"><?php echo $data['TomTat'];?></p>
        <p class="noidungtt"><?php echo $data['NoiDung'];?></p>
        <p class="tacgiatt">
			<?php
            	//$dataTG = mysql_fetch_row($qTG);
				echo $dataTG[0];
			?>
        </p>
        <div class="tinmoi">
            <h4>Các tin tức mới nhất</h4>
            <ul>
            	<?php
					$sql = "SELECT `idTin`,`TieuDe`, `NgayDang` FROM `cms_tin` WHERE `idTin` != $idTin ORDER BY `idTin` DESC LIMIT 0,9";
					//echo $sql;
					$q = mysql_query($sql);
					while($data = mysql_fetch_assoc($q)){
				?>
                <li><a href="?m=tintuc_chitiet&idTin=<?php echo $data['idTin'];?>"><?php echo $data['TieuDe'];?> - (<?php echo date('d/m/y',strtotime($data['NgayDang']))?>)</a></li>
                <?php
					}
				?>
            </ul>
        </div>
    </div><!-- end col_min -->
    <div class="col_min" style="margin-top:10px;">
        <div class="fb-comments" data-href="http://localhost/HocVien_NguyenXuanSon/chitiettin.php" data-width="740"></div>
    </div><!-- end col_min -->
  <div class="clear"></div><!-- end col_min -->
  <div class="clear"></div>
