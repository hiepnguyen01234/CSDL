<div class="widget" style="background-color:white;">
    <h2 class="heading">Sản phẩm nổi bật</h2>
    <marquee direction="up" onMouseOver="this.stop()" onMouseOut="this,start()" scrollamount="4">
    <div style="margin:0 auto; text-align:center;">
	<?php
    	$sql = "SELECT `idSP` , `TenSP` , `UrlHinh` FROM `cms_sanpham`
				WHERE `AnHien` =1
				ORDER BY `SoLanMua` DESC
				LIMIT 0 , 10 ";
		$q = mysql_query($sql);
		while($data=mysql_fetch_assoc($q)){
	?>
        <a href="?m=sanpham_chitiet&idSP=<?php echo $data['idSP']; ?>">
            <img src="images/sanpham/<?php echo $data['UrlHinh']?>" title="<?php echo $data['TenSP']?>" height="140px" alt="tensan" />
        </a> <br/>
    <?php
		}
	?>
    </div>
    </marquee>
</div><!-- end div widget -->