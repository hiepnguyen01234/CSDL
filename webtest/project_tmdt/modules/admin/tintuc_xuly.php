<?php
	$idTin = round($_GET['idTin']);
	$act = $_GET['act'];
	if($act==1){
?>
	<?php
	//print_r($_FILES['UrlHinh']);
	//print_r($_POST);
	//Array ( [TieuDe] => [TomTat] => [NoiDung] => [AnHien] => 0 ) 		
	if(isset($_POST['TieuDe'])){	  
		  if($_POST['TieuDe']!=''){
			  //echo '<pre>';print_r($_POST);echo '</pre>';
				$TieuDe = $_POST['TieuDe'];
				$TomTat = $_POST['TomTat'];
				$NoiDung = $_POST['NoiDung'];
				$AnHien = $_POST['AnHien'];
				$idNguoiDung = $_SESSION['idNguoiDungQT'];
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
					  copy($UrlHinh['tmp_name'],'images/'.time().'_'.$UrlHinh['name']);//Copy file đệm tới thu muc upload
				  }else{//Kiem tra dinh dang url
				  	echo '<script>alert("Dạng hình chưa đúng, hoặc kích cở quá lớn. Bạn hãy kiểm tra lại.");</script>';
				  }
			  }//Kiem tra file urlHinh neu == NULL
			  $sql = "INSERT INTO `cms_tin` 
					  value ('','".time()."_".$UrlHinh['name']."','$TieuDe','$TomTat','$NoiDung','$AnHien',now(),'$idNguoiDung','0')";
			  //echo $sql;
			  $q = mysql_query($sql);
			  if($q){
				  echo '<script>alert("Thêm tin tức mới thành công");</script>';
			  }//kiem tra query cap nhat thanh cong
		  }else{
				  echo '<script>alert("Bạn nên nhập tiêu để cho tin!");</script>';
		  }//end kiem tra TenSP != ''
  }//end if isset TenSP	
?>
	<title>Cập nhật tin tức</title>
	

<div id="table" style="height:840px; width:100%;">
	<h3 class="heading title">Thêm tin tức mới</h3>
	<form action="" method="post" enctype="multipart/form-data" id="newCL"><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Tiêu đề: <span class="req"></span></li>
			<li class="inputfield"><input type="text" name="TieuDe" id="TieuDe" /></li>
		</ul><div class="clear"></div>
        <ul class="forms">
			<li class="txt">Hình ảnh <span class="req"></span></li>
			<li class="inputfield"><input type="file" name="UrlHinh" id="UrlHinh" /></li>
            <li class="txt" style="width:450px; padding-top:10px; font-style:italic;"><p>Hình ảnh phải có dạng(.png, .gif, .jpg, .jpeg) >= 2MB</p></li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Tóm tắt<span class="req"></span></li>
			<li class="inputfield">
				<textarea name="TomTat" cols="97" rows="7" id="TomTat"></textarea>
				
			</li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Nội dung chi tiết<span class="req"></span></li>
			<li class="inputfield">
				<textarea name="NoiDung" cols="90" rows="10" id="NoiDung"></textarea>
				<script type="text/javascript">
					var ckEditor = CKEDITOR.replace('NoiDung',{language: 'vi', width:798, height:300});
				</script>
			</li>
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
<?php
	}	

	if($act==3){
		$flag = $_GET['flag'];
		if($flag==1) $AnHien = 0;
		if($flag==0) $AnHien = 1;
		$sql = "update `cms_tin` set `AnHien` = '$AnHien' where `idTin` = $idTin";
		mysql_query($sql);
		echo '<script>alert("OK"); window.location="?m=tintuc"</script>';
	}
	if($act==4){
		$sql = "DELETE from `cms_tin` where `idTin` = $idTin ";
		mysql_query($sql);
		header('location: ?m=tintuc');
		exit();
	}
?>