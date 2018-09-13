<title>Cập nhật chủng loại sản phẩm</title>
<?php
	$act = $_GET['act'];
	$idCL = $_GET['idCL'];
	if($act==1){
		if(count($_POST)>0){
			$TenCL = $_POST['TenCL'];
			$ThuTu = $_POST['ThuTu'];
			$AnHien = $_POST['AnHien'];
			//Cap nhat chung loai
			$sql = "UPDATE `cms_sanpham_chungloai` SET 
					`TenCL` = '$TenCL',
					`ThuTu` = '$ThuTu',
					`AnHien`= '$AnHien'
					WHERE `idCL` = $idCL";
			$q = mysql_query($sql);
			if($q){
				echo "<script>alert('Cập nhật chủng loại thành công.');window.location='?m=sp_chungloai'</script>";
			}
		}
		//Lay thong tin chung loai
		$sql = "SELECT * FROM `cms_sanpham_chungloai` WHERE `idCL`= $idCL";
		$q = mysql_query($sql);
		$data = mysql_fetch_assoc($q);
?>
	<div id="table" style="height:180px;">
    	<h3 class="heading title">Cập nhật chủng loại sản phẩm</h3>
      <form action="" method="post" id="editCL">
        <ul class="forms">
            <li class="txt">Tên chủng loại <span class="req"></span></li>
            <li class="inputfield"><input type="text" value="<?php echo $data['TenCL'];?>" name="TenCL" id="TenCL" autofocus /></li>
        </ul>
        <ul class="forms">
            <li class="txt">Sắp xếp thứ tự <span class="req"></span></li>
            <li class="inputfield">
              <input type="text" value="<?php echo $data['ThuTu'];?>" name="ThuTu" id="ThuTu" autofocus />
            </li>
        </ul>
	  <ul class="forms">
          <li class="txt">Ẩn hiện <span class="req"></span></li>
          <li class="inputfield">
            <select name="AnHien" id="AnHien">
              <option <?php if($data['AnHien']==0) echo 'selected';?> value="0">Ẩn</option>
              <option <?php if($data['AnHien']==1) echo 'selected';?> value="1">Hiện</option>
            </select>
          </li>
      </ul>
	  <ul class="forms">
        <li class="txt">&nbsp;<input type="submit" id="submitDK" class="none" /></li>
            <li><label class="button bold right"><a href="javascript: void(1)" onclick="document.getElementById('submitDK').click()" style="">&nbsp;&nbsp;Cập nhật&nbsp;&nbsp;</a></label></li>
            <li><label class="button bold right"><a href="javascript: void(1)" onclick="document.getElementById('editCL').reset();" style="">&nbsp;&nbsp;Nhập lại&nbsp;&nbsp;</a></label></li>
           </ul> </form>
        
    </div>
<?php
	}
	if($act==2){		
		$sql = "DELETE from `cms_sanpham` WHERE `idLoai` 
				IN ( SELECT `idLoai` FROM `cms_sanpham_loai` 
					WHERE `idCL` = $idCL )";
		mysql_query($sql);//Xoa co CSDL trong san pham
		
		$sql = "DELETE FROM `cms_sanpham_loai` WHERE `idCL` = $idCL"; 
		mysql_query($sql);//Xoa co so du lieu trong loai san pham
		
		$sql = "DELETE FROM `cms_sanpham_hangsanxuat` WHERE `idCL` = $idCL"; 
		$qL=mysql_query($sql);//Xoa co so du lieu trong loai san pham
		
		$sql = "DELETE FROM `cms_sanpham_chungloai` WHERE `idCL` = $idCL"; 
		mysql_query($sql);//Xoa CSDL trong chung loai	
		
		header("location: ?m=sp_chungloai");
		exit();
	}
?>