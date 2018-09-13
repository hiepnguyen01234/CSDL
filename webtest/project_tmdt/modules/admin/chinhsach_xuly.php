<?php
	$idCS = $_GET['idCS'];
	$act = $_GET['act'];
	if($act==1){
		$sql = "SELECT * FROM `cms_chinhsach_giaohang` where `idCS` = $idCS";
		$q = mysql_query($sql);
		$data = mysql_fetch_assoc($q);
		
		if(isset($_POST['TenCS'])){
			$TenCL = mysql_escape_string($_POST['TenCS']);
			$ThuTu = mysql_escape_string($_POST['NoiDung']);
			$AnHien = mysql_escape_string($_POST['AnHien']);
			$sql = "update `cms_chinhsach_giaohang` set `TenCS` = '$TenCS', `NoiDung` = '$NoiDung', `AnHien` = '$AnHien' where `idCS`= $idCS";
			//echo $sql;
			$q = mysql_query($sql);
			if($q){
				echo '<script>alert("Cập nhật chính sách thành công");window.location="?m=chinhsach"</script>';
			}else{
				echo '<script>alert("Thất bại."); </script>';
			}
		}
?>
<div id="table" style="height:600px; width:100%;">
	<h3 class="heading title">Cập nhật chinh sach</h3>
	<form action="" method="post" enctype="multipart/form-data" id="newCL">
		<ul class="forms">
			<li class="txt">Tên chính sách <span class="req"></span></li>
			<li class="inputfield"><input type="text" value="<?php echo $data['TenCS']?>" name="TenCS" id="TenCS" /></li>
		</ul><div class="clear"></div>
		<ul class="forms">
			<li class="txt">Nội dung chính sách <span class="req"></span></li>
			<li class="inputfield">
				<textarea name="NoiDung" cols="90" rows="10" id="NoiDung"><?php echo $data['NoiDung']?></textarea>
				<script type="text/javascript">
					var ckEditor = CKEDITOR.replace('NoiDung',{language: 'vi', width:798, });
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
<?php
	}
?>
<?php
	if($act==2){
		$sql = "DELETE from `cms_chinhsach_giaohang` where `idCS` = $idCS";
		mysql_query($sql);
		header('location: ?m=chinhsach');
		exit();
	}
?>