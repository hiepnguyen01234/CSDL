<title>Chủng loại sản phẩm</title>
<?php
	if(isset($_GET['idLoai'])){
		echo "<script>callAjax('modules/admin/ajaxSanPham.php?idLoai=".$_GET['idLoai']."','#SP')</script>";
	}
?>
<div class="col_min">
  <h1 class="title heading">Danh sách chủng loại sản phẩm</h1>
    <div class="clear">&nbsp;</div>
  <table border="0" cellspacing="1" cellpadding="0" width="940px">
      <tr>
        <td colspan="10">Chọn loại sản phẩm: 
        	<select name="idLoai" id="idLoai" onchange="callAjaxSP('modules/admin/ajaxSanPham.php?idLoai='+this.value,'#SP')">
                  <option  <?php if($idLoai==0)echo 'selected'  ?>  value="0">-- Chọn loại sản phẩm --</option>
                  <?php
                      $sql='SELECT `idCL` , `TenCL` FROM `cms_sanpham_chungloai` WHERE `AnHien` =1 ORDER BY `ThuTu` ASC';
                      $q=mysql_query($sql);
                      while($data=mysql_fetch_assoc($q))
                      {							 
                  ?>
                        <optgroup label="<?php echo $data['TenCL'] ?>">
                            <?php
                                $sql2='SELECT `idLoai` , `TenLoai` FROM `cms_sanpham_loai` WHERE `idCL` ='.$data['idCL'].'
										AND `AnHien` =1 ORDER BY `ThuTu` ASC';
                                $q2=mysql_query($sql2);
                                while($data2=mysql_fetch_assoc($q2))
                                {                                                            
                            ?>
                                 <option <?php if($data2['idLoai']==$idLoai) echo 'selected'  ?> value="<?php echo $data2['idLoai'] ?>"><?php echo $data2['TenLoai'] ?></option>
                            <?php
                                }
                            ?>
                        </optgroup>
                  <?php
                      }
                  ?>
                  </select>
                  
                  	<label class="button bold right">
	                    <a href="?m=sanpham_them">&nbsp;&nbsp;Thêm mới sản phẩm&nbsp;&nbsp;</a>
                    </label>
                  
        </td>
      </tr>
  </table>
  <table id="SP" border="0" cellspacing="1" cellpadding="0" width="940px" style="border-top:none;"></table>  
</div>
<?php
    	if($_GET['act']==2){
			$sqlidSP = 'select `UrlHinh` FROM `cms_sanpham` WHERE `idSP`= '.$idSP;
			//echo $sqlidSP;
			$qidSP = mysql_query($sqlidSP);
			$dataidSP = mysql_fetch_assoc($qidSP);
			$UrlH = 'images/sanpham/'.$dataidSP['UrlHinh'];
			if(is_file($UrlH)) unlink($UrlH);
		
			$sql = "DELETE FROM `cms_sanpham` WHERE `idSP` = $idSP"; 
			mysql_query($sql);//Xoa CSDL trong chung loai
			//
			echo '<script>callAjaxLoai("modules/admin/ajaxSanPham.php?idLoai='.$_GET['idLoai'].'","#SP");</script>';
		}
	?>