<title>Cập nhật Slider</title>
<?php
	$act = $_GET['act'];
	$idSlider = $_GET['id'];
?>
<div class="col_min">
  <h1 class="title heading">Cập nhật Slider</h1>
    <div class="clear">&nbsp;</div>
    <?php
    	//print_r($_POST);//Array ( [TieuDe] => [MoTa] => [UrlHinh] => [AnHien] => 0 ) 
		//print_r($_FILES['UrlHinh']);
		if($act==1){
			$sqlS = "select * from `cms_slider` where `id` = $idSlider";
			$qS = mysql_query($sqlS);
			$data = mysql_fetch_assoc($qS);
			if(isset($_POST['TieuDe'])){
				$TieuDe = mysql_escape_string($_POST['TieuDe']);
				$MoTa = mysql_escape_string($_POST['MoTa']);
				$AnHien = mysql_escape_string($_POST['AnHien']);
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
						$Hinh = copy($file['tmp_name'],'images/slider/'.$UrlHinh);//Copy file đệm tới thu muc upload
						if($Hinh){
							if(is_file('images/slider/'.$dataSP['UrlHinh']))unlink('images/slider/'.$dataSP['UrlHinh']);
						}else $UrlHinh=$dataSP['UrlHinh'];
					}
				}//Kiem tra file urlHinh neu == NULL
				$sql = "UPDATE `cms_slider` SET 
						`TieuDe` = '$TieuDe',
						`MoTa` = '$MoTa',
						`UrlHinh` = '$UrlHinh',
						`AnHien` = '$AnHien'
						WHERE `id` = $idSlider";
				//echo $sql;
				$q = mysql_query($sql);
				if($q){
					echo '<script>alert("Cập nhật thành công");window.location="?m=slider"</script>';
				}else{
					echo '<script>alert("Thất bại."); </script>';
				}
			}
	?>
  <div id="table" style="height:270px;">
   	<h3 class="heading title">Thêm mới Slider</h3>
        <form action="" method="post" id="newCL" enctype="multipart/form-data">
        <ul class="forms">
            <li class="txt">Tiêu đề Slider: <span class="req"></span></li>
            <li class="inputfield"><input value="<?php echo $data['TieuDe']?>" type="text" name="TieuDe" id="TieuDe" /></li>
        </ul>
        <ul class="forms">
            <li class="txt">Mô tả:  <span class="req"></span></li>
            <li class="inputfield">
              <textarea name="MoTa" cols="26" rows="3" id="MoTa"><?php echo $data['MoTa'];?></textarea>
            </li>
        </ul>
        <ul class="forms">
            <li class="txt">Hình ảnh <span class="req"></span></li>
            <li class="inputfield">
              <input type="file" name="UrlHinh" id="UrlHinh" />
            </li>
            <li class="inputfield" style="padding-top:10px; font-style:italic; font-size:11px; margin-left:100px;">Hình ảnh phải có dạng(.png, .gif, .jpg, .jpeg) <= 2MB (680x320)</li>
        </ul>
	  <ul class="forms">
          <li class="txt">Ẩn hiện <span class="req"></span></li>
          <li class="inputfield">
            <select name="AnHien" id="AnHien">
              <option <?php if($data['AnHien']==0) echo 'selected'; ?> value="0">Ẩn</option>
              <option <?php if($data['AnHien']==1) echo 'selected'; ?> value="1">Hiện</option>
            </select>
          </li>
      </ul>
	  <ul class="forms">
        <li class="txt">&nbsp;<input type="submit" id="submitDK" class="none" /></li>
            <li><label class="button bold right"><a href="javascript: void(1)" onclick="document.getElementById('submitDK').click()" style="">&nbsp;&nbsp;Thêm mới&nbsp;&nbsp;</a></label></li>
            <li><label class="button bold right"><a href="javascript: void(1)" onclick="document.getElementById('newCL').reset();" style="">&nbsp;&nbsp;Nhập lại&nbsp;&nbsp;</a></label></li>
    </ul></form>
    <div class="clear">&nbsp;</div>
    
</div>
<img src="images/slider/1.png" width="680" height="320" alt="slider" style="margin:0 auto; display:block;" /> </div>
<?php
		}
	if($act==2){
		$sql = "DELETE FROM `cms_slider` where `id` = $idSlider";
		mysql_query($sql);
		header("location: ?m=slider");
		exit();
	}
?>