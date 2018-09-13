<?php
	$idSP = round($_GET['idSP']);
	$sql = "SELECT `idLoai` , `TenSP` , `Gia` , `MoTa` , `ChiTiet` , `UrlHinh` , `TonKho` , `SoLanMua` , `SoLanXem`
			FROM `cms_sanpham`
			WHERE `idSP` = $idSP";
	$q = mysql_query($sql);
	$data = mysql_fetch_assoc($q);
?>
<title>Thông tin sản phẩm</title>

  <div class="col_min">
    <h1 class="heading title" style="border:none; padding-top:30px; margin-bottom:10px;"><?php echo $data['TenSP']?></h1>
      <div class="imgSP left" > <span><img src="images/sanpham/<?php echo $data['UrlHinh'];?>" alt="Hình sản phẩm" /></span>
      </div>
    <div class="tinhnang left">
          <h4 class="" style="">Tính năng nổi bật:</h4>
          <?php echo $data['MoTa']?>
          
          <p class="bold gia"><?php echo number_format($data['Gia'])?> VNĐ&nbsp;&nbsp;</p><br />
          <label class="button bold"><a href="?m=giohang_xuly&act=1&idSP=<?php echo $idSP?>" title="Tìm kiếm kết quả">Mua hàng</a></label>
          <label class="button bold"><a href="?m=giohang" title="Tìm kiếm kết quả">Xem giỏ hàng</a></label>
      </div>
    <div class="clear">&nbsp;</div>
    <div class="chitietSP" style="background-color:white;">
          <h4>Mô tả chi tiết: </h4>
          <?php echo $data['ChiTiet'];?>
    </div>
  </div><!-- end col_min -->
  <div class="clear"></div>                	
  <div class="col_min" style="margin-top:10px;">
      <div class="fb-comments" data-href="http://localhost/HocVien_NguyenXuanSon/chitiet.php" data-width="740"></div>
  </div><!-- end col_min -->
<div class="clear"></div>
<div class="col_min">
      <h1 class="heading title" style="border-top:none; padding-top:">Sản phẩm cùng loại</h1>
      	<div class="main">
      		<?php
				$sqlL = "SELECT `idSP` , `TenSP` , `Gia` , `UrlHinh` FROM `cms_sanpham`
						WHERE `idLoai` =".$data['idLoai']." AND `idSP` != $idSP ORDER BY `idSP` DESC limit 0,8";
				//echo $sql;
				$qL = mysql_query($sqlL);
				while($dataL = mysql_fetch_assoc($qL)){
			?>
            <!-- THIRD EXAMPLE -->
       	  <div class="view view-third" style="height:auto; background:none;"> 
              <label><img src="images/sanpham/<?php echo $dataL['UrlHinh'];?>"/></label>
                  <div class="mask" title="<?php echo $dataL['TenSP'];?>" onclick="window.location='?m=sanpham_chitiet&idSP=<?php echo $dataL['idSP']?>'">
                    <h2><?php echo $dataL['TenSP'];?></h2>
                      <p><?php echo number_format($dataL['Gia'],0,'.',',');?> VNĐ</p>
                      <a href="?m=giohang_xuly&act=1&idSP=<?php echo $dataL['idSP']?>" class="info">Mua hàng</a>
                </div>
                <span class="bold colr" style="display:block; padding:4px 0 2px 0;">
                    <span class="req"><?php echo number_format($dataL['Gia'],0,'.',',');?> VNĐ</span>
                	<a href="?m=sanpham_chitiet&idSP=<?php echo $dataL['idSP']?>" class="buttonM" style="">Xem Chi tiết</a>
                </span>
          </div>
              <?PHP
				}
			  ?>
          </div>
  </div>
