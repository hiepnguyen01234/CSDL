<?php
	//print_r($_FILES['UrlHinh']);
	//Array ( [name] => blog-img2.jpg [type] => image/jpeg [tmp_name] => C:\Windows\Temp\php92B7.tmp [error] => 0 [size] => 23430 ) 		
	if(isset($_POST['TenSP'])){			
	  if($_POST['idLoai']=='' or $_POST['idLoai']==0){
		  $msg = '<div align="center" class="colr bold">Bạn chưa chọn Loại Sản Phẩm!</div>';
		  echo '<script>alert("Bạn chưa chọn Loại Sản Phẩm!");</script>';
	  }else{
		  if($_POST['TenSP']!=''){
			  //echo '<pre>';print_r($_POST);echo '</pre>';
				$idLoai = $_POST['idLoai'];
				$TenSP = $_POST['TenSP'];
				$Gia = $_POST['Gia'];
				$MoTa = $_POST['MoTa'];
				$ChiTiet = $_POST['ChiTiet'];
				$TonKho = $_POST['TonKho'];
				$GhiChu = $_POST['GhiChu'];
				$ThuTu = $_POST['ThuTu'];
				$AnHien = $_POST['AnHien'];
				$idHSX = $_POST['idHSX'];
			  if($_FILES['UrlHinh']!=''){
				  $UrlHinh = $_FILES['UrlHinh'];
				  $dangFile = array("gif", "jpeg", "jpg", "png");
				  $demFile = explode(".", $UrlHinh["name"]);//tách tên hình thành 2 phần tử mảng cách nhau bởi dấu "."
				  $duoiFile = end($demFile);//Lấy phần tử cuối cùng sau dấu chấm (current)
				  if((($UrlHinh['type']=='image/jpeg')
					  || ($UrlHinh['type']=='image/gif')
					  || ($UrlHinh['type']=='image/jpg')
					  || ($UrlHinh['type']=='image/pjpeg')
					  || ($UrlHinh['type']=='image/png')
					  || ($UrlHinh['type']=='image/x-png'))
					  && ($UrlHinh['size']<=2000000)
					  && (in_array($duoiFile,$dangFile))){
					  //move_uploaded_file($UrlHinh['tmp_name'],'images/sanpham/'.time().'_'.$UrlHinh['name']);//Di chuyen file đệm toi thu muc upload
					  copy($UrlHinh['tmp_name'],'images/sanpham/'.time().'_'.$UrlHinh['name']);//Copy file đệm tới thu muc upload
				  }else{//Kiem tra dinh dang url
				  	echo '<script>alert("Dạng hình chưa đúng, hoặc kích cở quá lớn. Bạn hãy kiểm tra lại.");</script>';
				  }
			  }//Kiem tra file urlHinh neu == NULL
			  $sql = "INSERT INTO `cms_sanpham` 
					  value (NULL,'$idLoai','$TenSP','$Gia','$MoTa','$ChiTiet','".time()."_".$UrlHinh['name']."',
					  now(),'$TonKho','$GhiChu','0','0','$AnHien','$idHSX')";
			  //echo $sql;
			  $q = mysql_query($sql);
			  if($q){
				  echo '<script>alert("Thêm sản phẩm mới thành công");</script>';
				  $idLoai='0'; $TenSP=''; $Gia=''; $MoTa=''; $ChiTiet=''; $TonKho=''; $GhiChu=''; $UrlHinh['name']=''; $AnHien=''; $idHSX='0';
			  }//kiem tra query cap nhat thanh cong
		  }else{
				  echo '<script>alert("Bạn nên nhập tên sản phẩm mới!");</script>';
		  }//end kiem tra TenSP != ''
	  }//end if else idLoai
  }//end if isset TenSP	
?>
<title>Thêm sảm phẩm</title>


<div id="table" style="height:1260px; width:100%;">
	<h3 class="heading title">Thêm mới sản phẩm</h3>
	<form action="" method="post" enctype="multipart/form-data" id="newCL">
		<ul class="forms">
			<li class="txt">Tên loại <span class="req"></span></li>
			<li class="inputfield">
				<select name="idLoai" id="idLoai" onchange="callAjax('modules/admin/ajaxidHSX.php?idLoai='+this.value,'#idHSX')">
					<option  <?php if($idLoai==0)echo 'selected'  ?>  value="0">-- Chọn loại sản phẩm --</option>
					<?php
						$sql='SELECT `idCL` , `TenCL` FROM `cms_sanpham_chungloai` WHERE `AnHien` =1 ORDER BY `ThuTu` ASC';
						$q=mysql_query($sql);
						while($data=mysql_fetch_assoc($q)){							 
					?>
					<optgroup label="<?php echo $data['TenCL'] ?>">
						<?php
							$sql2='SELECT `idLoai` , `TenLoai` FROM `cms_sanpham_loai` WHERE `idCL` ='.$data['idCL'].'
							AND `AnHien` =1 ORDER BY `ThuTu` ASC';
							$q2=mysql_query($sql2);
							while($data2=mysql_fetch_assoc($q2)){                                                            
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
			</li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Tên sản phẩm <span class="req"></span></li>
			<li class="inputfield"><input type="text" name="TenSP" id="TenSP" /></li>
		</ul><div class="clear"></div>
        <ul class="forms">
			<li class="txt">Giá sản phẩm <span class="req"></span></li>
			<li class="inputfield"><input type="text" name="Gia" id="Gia" /></li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Mô tả <span class="req"></span></li>
			<li class="inputfield">
				<textarea name="MoTa" cols="90" rows="10" id="MoTa"></textarea>
				<script type="text/javascript">
					var ckEditor = CKEDITOR.replace('MoTa',{language: 'vi', width:798, });
				</script>
			</li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Chi tiết <span class="req"></span></li>
			<li class="inputfield">
				<textarea name="ChiTiet" cols="90" rows="10" id="ChiTiet"></textarea>
				<script type="text/javascript">
					var ckEditor = CKEDITOR.replace('ChiTiet',{language: 'vi', width:798, });
				</script>
			</li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Số lượng <span class="req"></span></li>
			<li class="inputfield"><input type="text" name="TonKho" id="TonKho" /></li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Ghi chú <span class="req"></span></li>
			<li class="inputfield"><textarea name="GhiChu" cols="90" rows="3" id="GhiChu"></textarea></li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Hãng sản xuất <span class="req"></span></li>
			<li class="inputfield">
				<select id="idHSX" name="idHSX">
                	<option value="0">--Chọn hãng sản xuất--</option>
                </select>
			</li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Hình ảnh <span class="req"></span></li>
			<li class="inputfield"><input type="file" name="UrlHinh" id="UrlHinh" /></li>
            <li class="txt" style="width:450px; padding-top:10px; font-style:italic;"><p>Hình ảnh phải có dạng(.png, .gif, .jpg, .jpeg) <= 2MB</p></li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Sắp xếp thứ tự <span class="req"></span></li>
			<li class="inputfield"><input type="text" name="ThuTu" id="ThuTu" /></li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Ẩn hiện <span class="req"></span></li>
			<li class="inputfield">
				<select name="AnHien" id="AnHien">
					<option value="0">Ẩn</option>
					<option value="1">Hiện</option>
				</select>
			</li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">&nbsp;<input type="submit" id="submitDK" class="none" /></li>
			<li>
				<label class="button bold right">
					<a href="javascript: void(1)" onclick="document.getElementById('submitDK').click()" style="">&nbsp;&nbsp;Thêm mới&nbsp;&nbsp;</a>
				</label>
			</li>
			<li>
				<label class="button bold right">
					<a href="javascript: void(1)" onclick="document.getElementById('newCL').reset();" style="">&nbsp;&nbsp;Nhập lại&nbsp;&nbsp;</a>
				</label>
			</li>
		</ul>
	</form>
</div>