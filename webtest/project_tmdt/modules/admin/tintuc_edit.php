<?php
	$sql = "select * from `cms_tin` where `idTin` = $idTin";
		$q = mysql_query($sql);
		$data = mysql_fetch_assoc($q);
		if(isset($_POST['TieuDe'])){	  
		  if($_POST['TieuDe']!=''){
			  //echo '<pre>';print_r($_POST);echo '</pre>';
				$TieuDe = mysql_escape_string($_POST['TieuDe']);
				$TomTat = mysql_escape_string($_POST['TomTat']);
				$NoiDung = mysql_escape_string($_POST['NoiDung']);
				$AnHien = $_POST['AnHien'];
				$idNguoiDung = $_SESSION['idNguoiDungQT'];
				$file = $_FILES['UrlHinh'];
				$UrlHinh = $data['UrlHinh'] ;
				if($file['name'] != ''){
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
						$kq=copy($file['tmp_name'],'images/'.$UrlHinh);//Copy file đệm tới thu muc upload
						if($kq){
							if(is_file('images/'.$data['UrlHinh']))unlink('images/'.$data['UrlHinh']);
						}else $UrlHinh = $data['UrlHinh'];
					}//Kiem tra dinh dang url hinh
				}//Kiem tra file urlHinh neu == NULL
			  $sql = "UPDATE `cms_tin` set 
			  			`UrlHinh` = '$UrlHinh',
						`TieuDe` = '$TieuDe',
						`TomTat` = '$TomTat',
						`NoiDung` = '$NoiDung',
						`AnHien` = '$AnHien'
						WHERE `idTin` = $idTin";
			  //echo $sql;
			  //echo '<br/>'.$UrlHinh;
			  $q = mysql_query($sql);
			  if($q){
				  echo '<script>alert("Cập nhật tin mới thành công");window.location="?m=tintuc"</script>';
			  }//kiem tra query cap nhat thanh cong
		  }else{
				  echo '<script>alert("Bạn nên nhập tiêu đề mới!");</script>';
		  }//end kiem tra TenSP != ''
  		}//end if isset TenSP	
?>
<div id="table" style="height:840px; width:100%;">
	<h3 class="heading title">Cập nhật tin tức </h3>
	<form action="" method="post" enctype="multipart/form-data" id="newCL"><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Tiêu đề: <span class="req"></span></li>
			<li class="inputfield"><input type="text" value="<?php echo $data['TieuDe']?>" name="TieuDe" id="TieuDe" /></li>
		</ul><div class="clear"></div>
        <ul class="forms">
			<li class="txt">Hình ảnh <span class="req"></span></li>
			<li class="inputfield"><input type="file" name="UrlHinh" id="UrlHinh" /></li>
            <li class="txt" style="width:450px; padding-top:10px; font-style:italic;"><p>Hình ảnh phải có dạng(.png, .gif, .jpg, .jpeg) >= 2MB</p></li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Tóm tắt<span class="req"></span></li>
			<li class="inputfield">
				<textarea name="TomTat" cols="97" rows="7" id="TomTat"><?php echo $data['TomTat']?></textarea>
				
			</li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Nội dung chi tiết<span class="req"></span></li>
			<li class="inputfield">
				<textarea name="NoiDung" cols="90" rows="10" id="NoiDung"><?php echo $data['NoiDung']?></textarea>
				<script type="text/javascript">
					var ckEditor = CKEDITOR.replace('NoiDung',{language: 'vi', width:798, height:300});
				</script>
			</li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Ẩn hiện <span class="req"></span></li>
			<li class="inputfield">
				<select name="AnHien" id="AnHien">
					<option <?php if($data['AnHien']==0) echo 'selected';?> value="0">Ẩn</option>
					<option <?php if($data['AnHien']==1) echo 'selected';?> value="1">Hiện</option>
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