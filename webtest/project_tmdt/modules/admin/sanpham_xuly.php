<?php
	$idSP = round($_GET['idSP']);
	if($_GET['act']=1){		
?>
<div id="table" style="height:1260px; width:100%;">
	<h3 class="heading title">Thêm mới sản phẩm</h3>
  <?php
  	$sqlSP = "select * from `cms_sanpham` where `idSP` = $idSP";
	$qSP = mysql_query($sqlSP);
	$dataSP = mysql_fetch_assoc($qSP);	
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
				$file = $_FILES['UrlHinh'];
			 	$UrlHinh = $dataSP['UrlHinh'];
			  if($file['name']!=''){				  
				  $UrlHinh = time().'_'.$file['name'];
				  $dangFile = array("gif", "jpeg", "jpg", "png");
				  $demFile = explode(".", $file["name"]);//tách tên hình thành 2 phần tử mảng cách nhau bởi dấu "."
				  $duoiFile = end($demFile);//Lấy phần tử cuối cùng sau dấu chấm (current:Lay phan tu dau tien)
				  if((($file['type']=='image/jpeg')
					  || ($file['type']=='image/gif')
					  || ($file['type']=='image/jpg')
					  || ($file['type']=='image/pjpeg')
					  || ($file['type']=='image/png')
					  || ($file['type']=='image/x-png'))
					  && ($file['size']<=2000000)
					  && (in_array($duoiFile,$dangFile))){
					  //move_uploaded_file($UrlHinh['tmp_name'],'images/sanpham/'.time().'_'.$UrlHinh['name']);//Di chuyen file đệm toi thu muc upload
					  
					  $Hinh = copy($file['tmp_name'],'images/sanpham/'.$UrlHinh);//Copy file đệm tới thu muc upload
					  if($Hinh){
						  if(is_file('images/sanpham/'.$dataSP['UrlHinh']))unlink('images/sanpham/'.$dataSP['UrlHinh']);
					  }else $UrlHinh=$dataSP['UrlHinh'];
				  }
			  }//Kiem tra file urlHinh neu == NULL
			  $sql = "UPDATE `cms_sanpham` SET 
							`idLoai` = '$idLoai',
							`TenSP` = '$TenSP',
							`Gia` = '$Gia',
							`MoTa` = '$MoTa',
							`ChiTiet` = '$ChiTiet',
							`UrlHinh` = '$UrlHinh',
							`TonKho` = '$TonKho',
							`GhiChu` = '$GhiChu',
							`AnHien` = '$AnHien',
							`idHSX` = '$idHSX'
							WHERE `idSP` = $idSP";
			  //echo $sql;
			  $q = mysql_query($sql);
			  if($q){
				  echo '<script>alert("Cập nhật sản phẩm mới thành công");window.location="?m=sanpham&idLoai='.$dataSP['idLoai'].'";</script>';
			  }//kiem tra query cap nhat thanh cong
		  }else{
				  echo '<script>alert("Bạn nên nhập tên sản phẩm mới!");</script>';
		  }//end kiem tra TenSP != ''
	  }//end if else idLoai
  }//end if isset TenSP	
  ?>
  <form action="" method="post" enctype="multipart/form-data" id="newCL">
		<div id="imgSP"><img src="images/sanpham/<?php echo $dataSP['UrlHinh']?>" alt="HinhSP" /></div>
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
						<option <?php if($data2['idLoai']==$dataSP['idLoai']) echo 'selected'  ?> value="<?php echo $data2['idLoai'] ?>"><?php echo $data2['TenLoai'] ?></option>
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
			<li class="inputfield"><input type="text" value="<?php echo $dataSP['TenSP']?>" name="TenSP" id="TenSP" /></li>
		</ul><div class="clear"></div>
        <ul class="forms">
			<li class="txt">Giá sản phẩm <span class="req"></span></li>
			<li class="inputfield"><input type="text" value="<?php echo $dataSP['Gia']?>" name="Gia" id="Gia" /></li>
            <li class="txt" style="width:450px; padding-top:10px; font-style:italic;"><p>VNĐ</p></li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Mô tả <span class="req"></span></li>
			<li class="inputfield">
				<textarea name="MoTa" cols="90" rows="10" id="MoTa"><?php echo $dataSP['MoTa']?></textarea>
			  <script type="text/javascript">
					var ckEditor = CKEDITOR.replace('MoTa',{language: 'vi', width:798, });
				</script>
			</li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Chi tiết <span class="req"></span></li>
			<li class="inputfield">
				<textarea name="ChiTiet" cols="90" rows="10" id="ChiTiet"><?php echo $dataSP['ChiTiet']?></textarea>
			  <script type="text/javascript">
					var ckEditor = CKEDITOR.replace('ChiTiet',{language: 'vi', width:798, });
				</script>
			</li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Số lượng <span class="req"></span></li>
			<li class="inputfield"><input type="text" value="<?php echo $dataSP['TonKho']?>" name="TonKho" id="TonKho" /></li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Ghi chú <span class="req"></span></li>
			<li class="inputfield"><textarea name="GhiChu" cols="90" rows="3" id="GhiChu"><?php echo $dataSP['GhiChu']?></textarea></li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Hãng sản xuất <span class="req"></span></li>
			<li class="inputfield">
				<select id="idHSX" name="idHSX">
                	<option value="0">--Chọn hãng sản xuất--</option>
                    <?php
                    	$sqlHSX = "SELECT `idHSX`, `TenHang` FROM `cms_sanpham_hangsanxuat` WHERE `idCL` IN (			
									SELECT `idCL` 
									FROM `cms_sanpham_loai` 
									WHERE `idLoai` in (select `idLoai` from `cms_sanpham` where `idSP` = ".$dataSP['idSP']."))";
					?>
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
			<li class="inputfield"><input type="text" value="<?php echo $dataSP['ThuTu']?>" name="ThuTu" id="ThuTu" /></li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Ẩn hiện <span class="req"></span></li>
			<li class="inputfield">
				<select name="AnHien" id="AnHien">
					<option <?php if($dataSP['AnHien']==0) echo 'selected'?> value="0">Ẩn</option>
					<option <?php if($dataSP['AnHien']==1) echo 'selected'?> value="1">Hiện</option>
				</select>
			</li>
		</ul><div class="clear"></div>
		<ul class="forms">
		  <li class="txt">&nbsp;<input type="submit" id="submitDK" class="none" /></li>
			<li>
				<label class="button bold right">
					<a href="javascript: void(1)" onclick="document.getElementById('submitDK').click()" style="">&nbsp;&nbsp;Cập nhật&nbsp;&nbsp;</a>
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
   <?php
   }
   ?>