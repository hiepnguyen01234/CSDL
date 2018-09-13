<title>Trang chủ</title>
  <div id="content-slider">
      <div id="slider">
          <div id="mask">
              <ul>
              	  <?php
                  	$sql = " SELECT `TieuDe` , `MoTa` ,`Url`, `UrlHinh` FROM `cms_slider` WHERE `AnHien` =1 order by `id` desc LIMIT 0 , 5 ";
					$q = mysql_query($sql);
					$dem=1;
					while($data= mysql_fetch_assoc($q)){						
				  ?>
                  <li id="<?php if($dem==1) echo'first'; elseif($dem==2) echo 'second';elseif($dem==3) echo 'third'; elseif($dem==4) echo 'fourth'; else echo 'fifth'; ?>" class="<?php if($dem==1) echo'firstanimation'; elseif($dem==2) echo 'secondanimation';elseif($dem==3) echo 'thirdanimation'; elseif($dem==4) echo 'fourthanimation'; else echo 'fifthanimation'; ?>">
                      <a href="index.php" target="_blank"><img src="images/slider/<?php echo $data['UrlHinh'];?>" alt="<?php echo $data['TieuDe'];?>"/></a>
                      <div class="tooltip">
                      	<h2><?php echo $data['TieuDe'];?></h2>
                      	<p><?php echo $data['MoTa'];?></p>
                      </div>
                  </li>
                  <?php
				  	$dem++;
					}
				  ?>
                  
              </ul>
          </div>
          <div class="progress-bar"></div>
      </div>
  </div><!-- end content slider -->
  <div class="col_min">
      <h1 class="heading title" style="border-top:none;">Sản phẩm mới nhất</h1>
      	<div class="main">
      		<?php
            	$sql = 'SELECT `idSP` , `idLoai` , `TenSP` , `Gia` , `UrlHinh` FROM `cms_sanpham`
						ORDER BY `idSP` DESC
						LIMIT 0 , 8  ';
				$q = mysql_query($sql);
				while($data = mysql_fetch_assoc($q)){
			?>
            <!-- THIRD EXAMPLE -->
       	  <div class="view view-third" style="height:auto; background:none;"> 
              <label><img src="images/sanpham/<?php echo $data['UrlHinh'];?>"/></label>
                  <div class="mask" title="<?php echo $data['TenSP'];?>" onclick="window.location='?m=sanpham_chitiet&idSP=<?php echo $data['idSP']?>'">
                    <h2><?php echo $data['TenSP'];?></h2>
                      <p><?php echo number_format($data['Gia'],0,'.',',');?> VNĐ</p>
                      <a href="?m=giohang_xuly&act=1&idSP=<?php echo $data['idSP']?>" class="info">Mua hàng</a>
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
  </div><!-- end col_min -->
  <div class="clear"></div>
  <div class="col_min">
      <h1 class="heading title">Sản phẩm siêu cấp</h1>
      <div class="main">
      		<?php
            	$sql = 'SELECT `idSP` , `idLoai` , `TenSP` , `Gia` , `UrlHinh` FROM `cms_sanpham`
						WHERE `Gia` >= 30000000 
						ORDER BY `idSP` DESC
						LIMIT 0 , 8  ';
				$q = mysql_query($sql);
				while($data = mysql_fetch_assoc($q)){
			?>
            <!-- THIRD EXAMPLE -->
       	  <div class="view view-third" style="height:auto; background:none;"> 
              <label><img src="images/sanpham/<?php echo $data['UrlHinh'];?>"/></label>
                  <div class="mask" title="<?php echo $data['TenSP'];?>" onclick="window.location='?m=sanpham_chitiet&idSP=<?php echo $data['idSP']?>'">
                    <h2><?php echo $data['TenSP'];?></h2>
                      <p><?php echo number_format($data['Gia'],0,'.',',');?> VNĐ</p>
                      <a href="?m=giohang_xuly&act=1&idSP=<?php echo $data['idSP']?>" class="info">Mua hàng</a>
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
  </div><!-- end col_min -->
  <div class="clear"></div>
  <div class="col_min">
      <h1 class="heading title">Sản phẩm cao cấp</h1>
      <div class="main">
      		<?php
            	$sql = 'SELECT `idSP` , `idLoai` , `TenSP` , `Gia` , `UrlHinh` FROM `cms_sanpham`
						WHERE `Gia` between 15000000 and 30000000 
						ORDER BY `idSP` DESC
						LIMIT 0 , 8  ';
				$q = mysql_query($sql);
				while($data = mysql_fetch_assoc($q)){
			?>
            <!-- THIRD EXAMPLE -->
       	  <div class="view view-third" style="height:auto; background:none;"> 
              <label><img src="images/sanpham/<?php echo $data['UrlHinh'];?>"/></label>
                  <div class="mask" title="<?php echo $data['TenSP'];?>" onclick="window.location='?m=sanpham_chitiet&idSP=<?php echo $data['idSP']?>'">
                    <h2><?php echo $data['TenSP'];?></h2>
                      <p><?php echo number_format($data['Gia'],0,'.',',');?> VNĐ</p>
                      <a href="?m=giohang_xuly&act=1&idSP=<?php echo $data['idSP']?>" class="info">Mua hàng</a>
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
  </div><!-- end col_min -->
  <div class="clear"></div>
  <div class="col_min">
      <h1 class="heading title">Sản phẩm Trung Cấp</h1>
      <div class="main">
      		<?php
            	$sql = 'SELECT `idSP` , `idLoai` , `TenSP` , `Gia` , `UrlHinh` FROM `cms_sanpham`
						WHERE `Gia` between 5000000 and 15000000
						ORDER BY `idSP` DESC
						LIMIT 0 , 8  ';
				$q = mysql_query($sql);
				while($data = mysql_fetch_assoc($q)){
			?>
            <!-- THIRD EXAMPLE -->
       	  <div class="view view-third" style="height:auto; background:none;"> 
              <label><img src="images/sanpham/<?php echo $data['UrlHinh'];?>"/></label>
                  <div class="mask" title="<?php echo $data['TenSP'];?>" onclick="window.location='?m=sanpham_chitiet&idSP=<?php echo $data['idSP']?>'">
                    <h2><?php echo $data['TenSP'];?></h2>
                      <p><?php echo number_format($data['Gia'],0,'.',',');?> VNĐ</p>
                      <a href="?m=giohang_xuly&act=1&idSP=<?php echo $data['idSP']?>" class="info">Mua hàng</a>
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
  </div><!-- end col_min -->
  <div class="clear"></div>
  <div class="col_min">
      <h1 class="heading title">Sản phẩm phổ thông</h1>
      <div class="main">
      		<?php
            	$sql = 'SELECT `idSP` , `idLoai` , `TenSP` , `Gia` , `UrlHinh` FROM `cms_sanpham`
						WHERE `Gia` <= 5000000 
						ORDER BY `idSP` DESC
						LIMIT 0 , 8  ';
				$q = mysql_query($sql);
				while($data = mysql_fetch_assoc($q)){
			?>
            <!-- THIRD EXAMPLE -->
       	  <div class="view view-third" style="height:auto; background:none;"> 
              <label><img src="images/sanpham/<?php echo $data['UrlHinh'];?>"/></label>
                  <div class="mask" title="<?php echo $data['TenSP'];?>" onclick="window.location='?m=sanpham_chitiet&idSP=<?php echo $data['idSP']?>'">
                    <h2><?php echo $data['TenSP'];?></h2>
                      <p><?php echo number_format($data['Gia'],0,'.',',');?> VNĐ</p>
                      <a href="?m=giohang_xuly&act=1&idSP=<?php echo $data['idSP']?>" class="info">Mua hàng</a>
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
  </div><!-- end col_min -->
  <div class="clear"></div><!-- end col_min -->
<div class="clear"></div>