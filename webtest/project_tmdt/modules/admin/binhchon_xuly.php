<title>Cập nhật bình chọn</title>
<?php
	$act = $_GET['act'];
	$id = $_GET['id'];
?>
<div class="col_min">
    
  <?php
  	if($act==1){
    	//print_r($_POST);//Array ( [content] => [start_date] => 11/10/2013 [end_date] => 11/10/2013 [n_order] => [active] => 0 ) 
		$sql = "select * from `cms_binhchon_cauhoi` where `id` = $id";
		$q = mysql_query($sql);
		$data = mysql_fetch_assoc($q);
		if(isset($_POST['content'])){
			$content = mysql_escape_string($_POST['content']);
			$start_date = mysql_escape_string(convertDate($_POST['start_date']));
			$end_date = mysql_escape_string(convertDate($_POST['end_date']));
			$n_order = mysql_escape_string($_POST['n_order']);
			$active = mysql_escape_string($_POST['active']);
			$sql = "update `cms_binhchon_cauhoi` set
					`content`='$content',
					`active`='$active',
					`start_date`='$start_date',
					`end_date`='$end_date',
					`n_order`='$n_order'
					where `id` = $id";
			//echo $sql;
			$q = mysql_query($sql);
			if($q){
				echo '<script>alert("Cập nhật câu hỏi bình chọn thành công");window.location="?m=binhchon"</script>';
			}else{
				echo '<script>alert("Thất bại."); </script>';
			}
		}
	?>
  <div id="table" style="height:240px;">
   	<h3 class="heading title">Thêm mới câu hỏi bình chọn</h3>
        <form action="" method="post" id="newCL">
        <ul class="forms">
            <li class="txt">Câu hỏi <span class="req"></span></li>
            <li class="inputfield"><input type="text" value="<?php echo $data['content'];?>" name="content" id="contentCauHoi" /></li>
        </ul>
        <ul class="forms">
            <li class="txt">Ngày bắt đầu <span class="req">*</span></li>
            <li class="inputfield"><input type="text" value="<?php echo date('d/m/Y', strtotime($data['start_date']))?>" readonly name="start_date" id="start_date" onfocus="scwShow(this,event);" onclick="scwShow(this,event);" /></li>
            <script>
              var scwBaseYear        = scwDateNow.getFullYear();
              // How many years do want to be valid and to show in the drop-down list?
              var scwDropDownYears   = 2;
            </script>
        </ul>
        <ul class="forms">
            <li class="txt">Ngày kết thúc <span class="req">*</span></li>
            <li class="inputfield"><input type="text" value="<?php echo date('d/m/Y', strtotime($data['end_date']))?>" readonly name="end_date" id="end_date" onfocus="scwShow(this,event);" onclick="scwShow(this,event);" /></li>
            <script>
              var scwBaseYear        = scwDateNow.getFullYear();
              // How many years do want to be valid and to show in the drop-down list?
              var scwDropDownYears   = 2;
            </script>
        </ul>
        <ul class="forms">
            <li class="txt">Sắp xếp thứ tự <span class="req"></span></li>
            <li class="inputfield">
              <input type="text" value="<?php echo $data['n_order']?>" name="n_order" id="n_order" />
            </li>
        </ul>
	  <ul class="forms">
          <li class="txt">Ẩn hiện <span class="req"></span></li>
          <li class="inputfield">
            <select name="active" id="active">
              <option <?php if($data['active'] == 0) echo 'selected';?> value="0">Ẩn</option>
              <option <?php if($data['active'] == 1) echo 'selected';?> value="1">Hiện</option>
            </select>
          </li>
      </ul>
	  <ul class="forms">
        <li class="txt">&nbsp;<input type="submit" id="submitDK" class="none" /></li>
            <li><label class="button bold right"><a href="javascript: void(1)" onclick="document.getElementById('submitDK').click()" style="">&nbsp;&nbsp;Cập nhật&nbsp;&nbsp;</a></label></li>
            <li><label class="button bold right"><a href="javascript: void(1)" onclick="document.getElementById('newCL').reset();" style="">&nbsp;&nbsp;Nhập lại&nbsp;&nbsp;</a></label></li>
    </ul></form>
        
    </div>
</div>
<?php
	}
	if($act==2){
		$sql = "DELETE from `cms_binhchon_cauhoi` where `id` = $id";
		mysql_query($sql);
		header('location: ?m=binhchon');
		exit();
	}
?>