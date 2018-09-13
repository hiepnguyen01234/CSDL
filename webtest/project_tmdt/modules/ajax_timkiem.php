<?php
	require('../libs/config.php');
	$kw = mysql_escape_string($_GET['kwSearch']);
	$idLoai = round($_GET['idLoai']);
	$gia = round($_GET['Gia']);
	$giaDK = array(1=> ' AND `Gia` < 1000000 ',
					  ' AND `Gia` between 1000000 and 5000000 ',
					  ' AND `Gia` between 5000000 and 10000000 ',
					  ' AND `Gia` between 10000000 and 20000000 ',
					  ' AND `Gia` between 20000000 and 30000000 ',
					  ' AND `Gia` > 30000000 ');
?>
<h1 class="heading title">Kết quả tìm kiếm <?php echo $kw;?></h1>
        <div class="main">
      		<?php
				$where = ' `TenSP` LIKE "%'.$kw.'%" ';
				if($idLoai>0)
					$where .= 'AND `idLoai`='. $idLoai;
				if($gia>0){
					foreach($giaDK as $key => $value){
						if($gia == $key ){
							$where .= $value;
						}
					}
				}
            	$sql = "SELECT `idSP` , `TenSP` , `Gia` , `UrlHinh` FROM `cms_sanpham`
						WHERE ".$where." ORDER BY `idSP` asc limit 0,28";
				//echo $sql;
				$q = mysql_query($sql);
				while($data = mysql_fetch_assoc($q)){
			?>
            <!-- THIRD EXAMPLE -->
       	  <div class="view view-third" style="height:auto; background:none;"> 
              <label><img src="images/sanpham/<?php echo $data['UrlHinh'];?>"/></label>
                  <div class="mask" title="<?php echo $data['TenSP'];?>">
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
          