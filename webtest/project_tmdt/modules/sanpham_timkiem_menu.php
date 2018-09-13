<?php
	$giaData = array(1=>'Dưới 1tr đồng', 
						'Từ 1tr đến 5tr đồng', 
						'5tr đến 10tr đồng', 
						'Từ 10tr đến 20tr đồng', 
						'Từ 20tr đến 30tr đồng',
						'Trên 30tr đồng');	
?>
<div class="widget">
    <h2 class="heading">Tìm kiếm chi tiết</h2>
    <form action="?m=sanpham_timkiem" method="post" id="timkiem">
    <table class="tkChiTiet" width="200" border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td>Giá sản phẩm:</td>
  </tr>
  <tr>
    <td>
    	<select name="Gia" id="Gia">
            <option value="0">--Chọn giá cần tìm--</option>
            <?php
            	foreach($giaData as $k => $v){
			?>
            <option <?php if($_REQUEST['Gia'] == $k) echo 'selected';?> value="<?php echo $k?>"><?php echo $v;?></option>
            <?php
				}
			?>
        </select>
    </td>
  </tr>
  <tr>
    <td>Loại sản phẩm:</td>
  </tr>
  <tr>
    <td>
    	<select name="idLoai" id="idLoai">
    	  <option value="0">--Chọn loại sản phẩm cần tìm--</option>
          <?php
          	$sql = "select `idCL`, `TenCL` from `cms_sanpham_chungloai`";
			$q = mysql_query($sql);
			while($data = mysql_fetch_assoc($q)){
				$idCl = $data['idCL'];
		  ?>
          <optgroup label="<?php echo $data['TenCL'];?>">
          	<?php
            	$sqlLoai = "select `idLoai`, `TenLoai` from `cms_sanpham_loai` where `idCL`= $idCl";
				$qLoai = mysql_query($sqlLoai);
				while($dataLoai = mysql_fetch_assoc($qLoai)){
			?>
          	<option <?php if($_REQUEST['idLoai'] == $dataLoai['idLoai']) echo 'selected';?> value="<?php echo $dataLoai['idLoai'];?>"><?php echo $dataLoai['TenLoai'];?></option>
            <?php
				}
			?>
          </optgroup>
          <?php
			}
		  ?>
        </select>
    </td>
  </tr>
  <tr>
    <td>Tên sản phẩm:</td>
  </tr>
  <tr>
    <td>
      <input type="text" value="<?php echo $_REQUEST['kwSearch']?>" name="kwSearch" id="kwSearch" placeholder="Tên sản phẩm tìm kiếm" /></td>
  </tr>
  <tr>
  	<td>
    	<label class="label bold">
                    	<a onclick="document.getElementById('timkiem').submit();" href="javascript:void(1);" title="Tìm kiếm kết quả">Tìm kiếm</a>
                    </label>
    </td>
  </tr>
</table>
    </form>
    
</div><!-- end div widget -->
