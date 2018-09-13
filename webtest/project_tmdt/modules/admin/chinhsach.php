<title>Chính sách giao hàng</title>
<div class="col_min">
  <h1 class="title heading">Danh sách chủng loại sản phẩm</h1>
    <div class="clear">&nbsp;</div>
  <table border="0" cellspacing="1" cellpadding="0" width="940px">
      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr style="background-color:#0CF; font-weight:bold; text-align:center;">
        <td width="40">STT</td>
        <td width="150">Tên chính sách</td>
        <td width="593">Nội dung</td>
        <td width="50">Ẩn Hiện</td>
        <td width="80">Công cụ </td>
      </tr>
      
        <?php
            $sql = "SELECT * FROM `cms_chinhsach_giaohang` ORDER BY `idCS` DESC";
            $q = mysql_query($sql);
            $stt = 1;
            while($data=mysql_fetch_assoc($q)){
        ?>
       <tr class="<?php if($stt%2!=1) echo 'gray1';?> center hover">
        <td>&nbsp;<?php echo $stt++?></td>
        <td align="left"><?php echo $data['TenCS'];?></td>
        <td align="left"><div style="height:200px; overflow:auto">&nbsp;<?php echo $data['NoiDung'];?></div></td>
        <td>&nbsp;<?php if($data['AnHien']==1) echo 'Hiện'; else echo 'Ẩn';?></td>
        <td>&nbsp;
          <a href="?m=chinhsach_xuly&act=1&idCS=<?php echo $data['idCS'];?>" ><img src="images/Edit_16x16.png" alt="edit" /></a>&nbsp;
          <a href="?m=chinhsach_xuly&act=2&idCS=<?php echo $data['idCS'];?>" onclick="return confirm('<?php echo $_SESSION['HoTenQT']?>\nBạn chắc là có muốn xóa chinh sach này không?');"><img src="images/Delete_16x16.png" alt="edit" /></a>
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
      </tr>
  </table>
    <?php
    	//print_r($_POST);//Array ( [TenCS] => [NoiDung] => [AnHien] => 0 ) 
		if(isset($_POST['TenCS'])){
			$TenCL = mysql_escape_string($_POST['TenCS']);
			$ThuTu = mysql_escape_string($_POST['NoiDung']);
			$AnHien = mysql_escape_string($_POST['AnHien']);
			$sql = "insert into `cms_chinhsach_giaohang` values ('','$TenCS','$NoiDung','$AnHien')";
			//echo $sql;
			$q = mysql_query($sql);
			if($q){
				echo '<script>alert("Thêm mới chính sách thành công");window.location="?m=chinhsach"</script>';
			}else{
				echo '<script>alert("Thất bại."); </script>';
			}
		}
	?>
  <div id="table" style="height:600px; width:100%;">
	<h3 class="heading title">Thêm mới chính sách</h3>
	<form action="" method="post" enctype="multipart/form-data" id="newCL">
		
		<ul class="forms">
			<li class="txt">Tên chính sách <span class="req"></span></li>
			<li class="inputfield"><input type="text" name="TenCS" id="TenCS" /></li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Nội dung chính sách <span class="req"></span></li>
			<li class="inputfield">
				<textarea name="NoiDung" cols="90" rows="10" id="NoiDung"></textarea>
				<script type="text/javascript">
					var ckEditor = CKEDITOR.replace('NoiDung',{language: 'vi', width:798, });
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
</div>