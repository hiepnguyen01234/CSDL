<title>Chính sách thanh toán</title>
<div class="col_min" style="background-color:white; padding-left:10px; padding-right:10px; line-height:23px;">
    <h1 class="heading title">Chính sách thanh toán</h1>
    <?php
    	 $sql = "SELECT * FROM `cms_chinhsach_giaohang` ORDER BY `idCS` DESC";
            $q = mysql_query($sql);
            $data = mysql_fetch_assoc($q);
			echo $data['NoiDung'];
	?>
</div><!-- end col_min -->
