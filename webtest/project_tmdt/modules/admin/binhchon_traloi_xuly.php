<title>Kết quả bình chọn</title>
<?php
	$act = $_GET['act'];
	$id = $_GET['id'];
?>
<div class="col_min">
  <h1 class="title heading">Danh sách câu trả lời bình chọn</h1>

    <?php
    	//print_r($_POST);//[CauHoi] => =0 [content] => [n_order] => [active] => 0 )
		$sqlC = "select * from `cms_binhchon_luachon` where `id` = $id";
		$qC = mysql_query($sqlC);
		$dataC = mysql_fetch_assoc($qC);
		if(isset($_POST['content'])){
			$content = mysql_escape_string($_POST['content']);
			$CauHoi = mysql_escape_string($_POST['CauHoi']);
			$n_order = mysql_escape_string($_POST['n_order']);
			$active = mysql_escape_string($_POST['active']);
			$sql = "update `cms_binhchon_luachon` set 
					`id_poll` = '$CauHoi',
					`content` = '$content',
					`n_order` = '$n_order',
					`AnHien` = '$active'
					where `id` = $id";
			//echo $sql;
			$q = mysql_query($sql);
			if($q){
				echo '<script>alert("Cập nhật trả lời bình chọn thành công");window.location="?m=binhchon_traloi&idCH='.$CauHoi.'"</script>';
			}else{
				echo '<script>alert("Thất bại."); </script>';
			}
		}
	?>
  <div id="table" style="height:240px;">
   	<h3 class="heading title">Thêm mới câu hỏi bình chọn</h3>
        <form action="" method="post" id="newCL">
        
        <ul class="forms">
            <li class="txt">Chọn câu hỏi: <span class="req"></span></li>
            <li class="inputfield">
            	<select name="CauHoi">
                    <option value="=0">--Chọn câu hỏi--</option>
                    <?php
                        $sql = "select * from `cms_binhchon_cauhoi` ";
                        $q = mysql_query($sql);
                        while($data = mysql_fetch_assoc($q)){
                    ?>
                    <option <?php if($dataC['id_poll'] == $data['id']){ echo 'selected';}?> value="<?php echo $data['id']?>"><?php echo $data['content'];?></option>
                    <?php
                        }
                    ?>
                </select>
            </li>
        </ul>
        
        <ul class="forms">
            <li class="txt">Câu trả lời <span class="req"></span></li>
            <li class="inputfield"><input type="text" value="<?php echo $dataC['content']?>" name="content" id="contentTL" /></li>
        </ul>
        <ul class="forms">
            <li class="txt">Sắp xếp thứ tự <span class="req"></span></li>
            <li class="inputfield">
              <input type="text" value="<?php echo $dataC['n_order'];?>" name="n_order" id="n_order" />
            </li>
        </ul>
	  <ul class="forms">
          <li class="txt">Ẩn hiện <span class="req"></span></li>
          <li class="inputfield">
            <select name="active" id="active">
              <option <?php if($dataC['AnHien']==0) echo 'selected';?> value="0">Ẩn</option>
              <option <?php if($dataC['AnHien']==1) echo 'selected';?> value="1">Hiện</option>
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
	if($act == 2){
		$sql = "DELETE from `cms_binhchon_luachon` where `id` = $id";
		mysql_query($sql);
		header('location: ?m=binhchon_traloi&idCH='.$_GET['idCH']);
		exit();
	}
?>