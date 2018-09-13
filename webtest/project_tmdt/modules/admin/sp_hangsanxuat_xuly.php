<title>Cập nhật loại sản phẩm</title>
<?php
	$act = $_GET['act'];
	$idHSX = $_GET['idHSX'];
	$idCL = $_GET['idCL'];
	//print_r($_POST);
	if($act==1){
		if(count($_POST)>0){
			//Array ( [idCLC] => 1 [TenLoai] => Thiết bị tin học [ThuTu] => 12 [AnHien] => 1 ) 
			$TenHang = $_POST['TenHang'];
			$idCLC = $_POST['idCLC'];
			$ThuTu = $_POST['ThuTu'];
			$AnHien = $_POST['AnHien'];
			//Cap nhat chung loai
			$sql = "UPDATE `cms_sanpham_hangsanxuat` SET 
					`idCL` = '$idCLC',
					`TenHang` = '$TenHang',
					`ThuTu` = '$ThuTu',
					`AnHien`= '$AnHien'
					WHERE `idHSX` = $idHSX";
			//echo $sql;
			$q = mysql_query($sql);
			if($q){
				echo "<script>alert('Cập nhật loại thành công.'); window.location='?m=sp_hangsanxuat&idHSX=".$idHSX."';</script>";				
			}
		}
		//Lay thong tin 
		$sql = "SELECT * FROM `cms_sanpham_hangsanxuat` WHERE `idHSX`= $idHSX";
		$q = mysql_query($sql);
		$data = mysql_fetch_assoc($q);
?>
<div id="table" style="height:200px;">
   	<h3 class="heading title">Cập nhật hãng sản xuất</h3>
        <form action="" method="post" id="newCL">
            <ul class="forms">
            	<li class="txt">Chủng loại <span class="req"></span></li>
            	<li class="inputfield">
                    <select name="idCLC">
                        <option value="0">--Chọn loại sản phẩm--</option>
                        <?php
                            $sqlCL = "select `idCL`, `TenCL` from `cms_sanpham_chungloai`";
                            $qCL = mysql_query($sqlCL);
                            while($dataCL = mysql_fetch_assoc($qCL)){
                        ?>
                        <option <?php if($data['idCL'] == $dataCL['idCL']) echo 'selected';?> value="<?php echo $dataCL['idCL']?>"><?php echo $dataCL['TenCL']?></option>
                        <?php
                            }
                        ?>
            		</select>
                </li>
            </ul>
            <ul class="forms">
            	<li class="txt">Tên hãng <span class="req"></span></li>
            	<li class="inputfield"><input type="text" value="<?php echo $data['TenHang']?>" name="TenHang" id="TenHang"/></li>
            </ul>
            <ul class="forms">
                <li class="txt">Sắp xếp thứ tự <span class="req"></span></li>
                <li class="inputfield">
	    	        <input type="text" value="<?php echo $data['ThuTu']?>" name="ThuTu" id="ThuTu" />
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
                <li>
                    <label class="button bold right">
	                    <a href="javascript: void(1)" onclick="document.getElementById('submitDK').click()" style="">&nbsp;&nbsp;Cập nhật&nbsp;&nbsp;</a>
                    </label>
                </li>
                <li>
                    <label class="button bold right">
	                    <a href="javascript: void(1)" onclick="document.getElementById('newL').reset();" style="">&nbsp;&nbsp;Nhập lại&nbsp;&nbsp;</a>
                    </label>
                </li>
     </ul></form>
           
  </div>
<?php
	}
?>