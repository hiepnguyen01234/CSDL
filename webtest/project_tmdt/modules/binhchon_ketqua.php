<title>Kết quả bình chọn</title>
<div class="col_min" style="background-color:white; padding-left:10px; padding-right:10px; line-height:23px;">
    <h1 class="heading title">Kết quả bình chọn</h1>
    <?php
	$sqlT = "SELECT `id` , `content`
			FROM `cms_binhchon_cauhoi`
			WHERE `active` = '1'
			AND `start_date` <= NOW()
			AND `end_date` >= NOW()
			ORDER BY `n_order` ASC";
	$qT = mysql_query($sqlT);
	$dataT = mysql_fetch_assoc($qT);
	$id = $dataT['id'];

  	$sql = "SELECT `vote` , `content` FROM `cms_binhchon_luachon`
			WHERE `id_poll` = $id
			ORDER BY `n_order` ASC";
	$q = mysql_query($sql);
?>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
       google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
		  <?php
		  while($data=mysql_fetch_assoc($q)){
		  ?>
          ['<?php echo $data['content'];?>',     <?php echo $data['vote'];?>],
		  <?php
		  }
		  ?>
        ]);

        var options = {
		  title:'<?php echo $dataT['content'];?> ?',
		  legend:{position:'bottom'}
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>

	<div id="piechart" style="width: 700px; height: 500px;"></div>
</div><!-- end col_min -->
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