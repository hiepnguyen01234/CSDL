<div class="widget">
      <h2 class="heading">Bình chọn</h2>
      <form action="?m=binhchon_xuly" method="post" name="binhchon" id="binhchon">
          <table width="196" border="0" cellspacing="2" cellpadding="0">
          	<?php
            	$sqlCH="SELECT `id` , `content` FROM `cms_binhchon_cauhoi`
						WHERE `active` = '1'
						AND `start_date` <= NOW( )
						AND `end_date` >= NOW( )";
				$qCH = mysql_query($sqlCH);
				$dataCH = mysql_fetch_assoc($qCH);
				$idCH = $dataCH['id'];
			?>
            <tr><td colspan="2"><h5><?php echo $dataCH['content'];?></h5></td></tr>
            <?php
				$sqlTT = "SELECT `id` , `content` FROM `cms_binhchon_luachon` WHERE `id_poll` = $idCH";
				$qTT = mysql_query($sqlTT);
            	while($dataTT = mysql_fetch_assoc($qTT)){
			?>
            <tr><td colspan="2"><label><input type="radio" name="check" id="check" value="<?php echo $dataTT['id']?>" />&nbsp;<?php echo $dataTT['content']?></label></td></tr> 
            <?php
				}
			?>
          </table>
          <label class="label bold right"><a href="javascript:void(0);" onclick="document.getElementById('binhchon').submit()">Biểu quyết</a></label>
          <label class="label bold right"><a href="?m=binhchon_ketqua">Kết quả</a></label>
    </form>
</div><!-- end div widget -->