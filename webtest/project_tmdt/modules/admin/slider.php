<title>Slider</title>
<div class="col_min">
  <h1 class="title heading">Danh sách Slider</h1>
    <div class="clear">&nbsp;</div>
  <table border="0" cellspacing="1" cellpadding="0" width="940px">
      <tr>
        <td width="36">&nbsp;</td>
        <td width="150">&nbsp;</td>
        <td width="387">&nbsp;</td>
        <td width="200">&nbsp;</td>
        <td width="80">&nbsp;</td>
        <td width="80">&nbsp;</td>
      </tr>
      <tr style="background-color:#0CF; font-weight:bold; text-align:center;">
        <td>STT</td>
        <td>Tiêu đề</td>
        <td>Mô tả</td>
        <td>Hình ảnh</td>
        <td>Ẩn Hiện </td>
        <td>Công cụ </td>
      </tr>      
        <?php
            $sql = "SELECT * FROM `cms_slider` ORDER BY `id` DESC limit 0,5";
            $q = mysql_query($sql);
            $stt = 1;
            while($data=mysql_fetch_assoc($q)){
        ?>
       <tr class="<?php if($stt%2!=1) echo 'gray1';?> center hover">
        <td>&nbsp;<?php echo $stt++?></td>
        <td align="left">&nbsp;<?php echo $data['TieuDe'];?></td>
        <td align="left">&nbsp;<?php echo $data['MoTa'];?></td>
        <td align="center">&nbsp;<img src="images/slider/<?php echo $data['UrlHinh'];?>" width="180px" alt="Hình sản phẩm" /></td>
        <td>&nbsp;<?php if($data['AnHien']==1) echo 'Hiện'; else echo 'Ẩn';?></td>
        <td>&nbsp;
          <a href="?m=slider_xuly&act=1&id=<?php echo $data['id'];?>" ><img src="images/Edit_16x16.png" alt="edit" /></a>&nbsp;
          <a href="?m=slider_xuly&act=2&id=<?php echo $data['id'];?>" onclick="return confirm('<?php echo $_SESSION['HoTenQT']?>\nBạn chắc là có muốn xóa slider này không?');"><img src="images/Delete_16x16.png" alt="edit" /></a>
        </td>
       </tr>
        <?php
            }
        ?>
      
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
  </table>
    <?php
    	//print_r($_POST);//Array ( [TieuDe] => [MoTa] => [UrlHinh] => [AnHien] => 0 ) 
		//print_r($_FILES['UrlHinh']);
		if(isset($_POST['TieuDe'])){
			$TieuDe = mysql_escape_string($_POST['TieuDe']);
			$MoTa = mysql_escape_string($_POST['MoTa']);
			$AnHien = mysql_escape_string($_POST['AnHien']);
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
					copy($UrlHinh['tmp_name'],'images/slider/'.time().'_'.$UrlHinh['name']);//Copy file đệm tới thu muc upload
				}else{//Kiem tra dinh dang url
				  echo '<script>alert("Dạng hình chưa đúng, hoặc kích cở quá lớn. Bạn hãy kiểm tra lại.");</script>';
				}
			}//Kiem tra file urlHinh neu == NULL
			$sql = "insert into `cms_slider` values ('','$TieuDe','$MoTa','','".time()."_".$UrlHinh['name']."','$AnHien')";
			//echo $sql;
			$q = mysql_query($sql);
			if($q){
				echo '<script>alert("Thêm mới thành công");window.location="?m=slider"</script>';
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
            <li class="inputfield"><input type="text" name="TieuDe" id="TieuDe" /></li>
        </ul>
        <ul class="forms">
            <li class="txt">Mô tả:  <span class="req"></span></li>
            <li class="inputfield">
              <textarea name="MoTa" cols="26" rows="3" id="MoTa"></textarea>
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
              <option value="0">Ẩn</option>
              <option value="1">Hiện</option>
            </select>
          </li>
      </ul>
	  <ul class="forms">
        <li class="txt">&nbsp;<input type="submit" id="submitDK" class="none" /></li>
            <li><label class="button bold right"><a href="javascript: void(1)" onclick="document.getElementById('submitDK').click()" style="">&nbsp;&nbsp;Thêm mới&nbsp;&nbsp;</a></label></li>
            <li><label class="button bold right"><a href="javascript: void(1)" onclick="document.getElementById('newCL').reset();" style="">&nbsp;&nbsp;Nhập lại&nbsp;&nbsp;</a></label></li>
    </ul></form>
        
    </div>
</div>