<?php
	$idLoai = round($_GET['idLoai']);
	$idHSX = max(80,round($_GET['idHSX']));
?>
<title>Sản phẩm</title>

  <div class="clear"></div>
    <div class="col_min">
    	<?php
        	$sql = "SELECT `TenLoai` FROM `cms_sanpham_loai` WHERE `idLoai` = $idLoai";
			$q = mysql_query($sql);
			$data = mysql_fetch_row($q);
		?>
        <h1 class="heading title"><?php echo $data['0'];?></h1>
        <div class="main">
      		<?php
				if(isset($idHSX)) $hsx = ' AND `idHSX` = '.$idHSX;
            	$sql = "SELECT `idSP` , `TenSP` , `Gia` , `UrlHinh` FROM `cms_sanpham`
						WHERE `idLoai` =".$idLoai." $hsx ORDER BY `idSP` asc limit 0,28";
				//echo $sql;
				$q = mysql_query($sql);
				while($data = mysql_fetch_assoc($q)){
			?>
            <!-- THIRD EXAMPLE -->
       	  <div class="view view-third" style="height:auto; background:none;"> 
              <label><img src="images/sanpham/<?php echo $data['UrlHinh'];?>"/></label>
                  <div class="mask" title="<?php echo $data['TenSP'];?>" onclick="window.location='?m=sanpham_chitiet&idSP=<?php echo $data['idSP']?>'">
                    <h2><?php echo $data['TenSP'];?></h2>
                      <p><?php echo number_format($data['Gia'],0,'.',',');?> VNĐ</p>
                      <a href="#&idSP=<?php echo $data['idSP']?>" class="info">Mua hàng</a>
                </div>
                <span class="bold colr" style="display:block; padding:4px 0 2px 0;">
                    <span class="req"><?php echo number_format($data['Gia'],0,'.',',');?> VNĐ</span>
                	<a href="?m=sanpham_chitiet&idSP=<?php echo $data['idSP']?>" class="buttonM" style="">Xem Chi tiết</a>
                </span>
          </div>
              <?PHP
				}
			  ?>
          </div>
	</div>