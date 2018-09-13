<title>Kết quả bình chọn</title>
<div class="col_min">
  <h1 class="title heading">Danh sách câu trả lời bình chọn</h1>
    <div class="clear">&nbsp;</div>
  <table width="940" border="0" cellspacing="2" cellpadding="1">
  <tr>
    <td colspan="7" align="center">&nbsp;
    	Chọn câu hỏi: 
        <select name="CauHoi" onchange="window.location='?m=binhchon_traloi&idCH='+this.value;">
        	<option value="=0">--Chọn câu hỏi--</option>
            <?php
            	$sql = "select * from `cms_binhchon_cauhoi` ";
				$q = mysql_query($sql);
				while($data = mysql_fetch_assoc($q)){
			?>
            <option <?php if($data['id']==$_GET['idCH']) echo 'selected';?> value="<?php echo $data['id']?>"><?php echo $data['content'];?></option>
            <?php
				}
			?>
        </select>
    </td>
  </tr>
  <tr style="background-color:#0CF; font-weight:bold; text-align:center;">
    <td align="center">STT</td>
    <td align="center">Câu hỏi</td>
    <td align="center">Kết quả</td>
    <td align="center">Thứ tự</td>
    <td align="center">Công cụ</td>
    
  </tr>
  <?php
  	$sql = "SELECT * FROM `cms_binhchon_luachon` where `id_poll` = ".round($_GET['idCH'])." ORDER BY `id` DESC";
	$q = mysql_query($sql);
	$stt=1;
	while($data = mysql_fetch_assoc($q)){
  ?>
  <tr class="<?php if($stt%2!=0) echo 'gray1';?> center hover">
    <td align="center"><?php echo $stt++;?></td>
    <td align="left"><a href="?m=binhchon&act=2&CHLC=<?php echo $data['id']?>"><?php echo $data['content'];?></a></td>
    <td align="center"><?php echo $data['vote']?></td>  
    <td align="center"><?php echo $data['n_order'];?></td>
    <td align="center">
    	<a href="?m=binhchon_traloi_xuly&act=1&id=<?php echo $data['id'];?>"><img src="images/Edit_16x16.png" alt="edit" /></a>&nbsp;
        <a href="?m=binhchon_traloi_xuly&act=2&idCH=<?php echo $_GET['idCH']?>&id=<?php echo $data['id'];?>" onclick="return confirm('<?php echo $_SESSION['HoTenQT']?>\nBạn chắc là có muốn xóa câu hỏi bình chọn này không?');"><img src="images/Delete_16x16.png" alt="delete" /></a>
    </td>
  </tr>
  <?php
	}
  ?>
  <tr>
    <td colspan="7" align="right"><input onclick="window.location='?m=binhchon_cauhoi_xuly&act=3'" type="button" name="thembt" id="thembt" value="Thêm câu hỏi" style="height:25px; font-size:13px; padding-bottom:3px;" /></td>
  </tr>
</table>
    <?php
    	//print_r($_POST);//[CauHoi] => =0 [content] => [n_order] => [active] => 0 ) 
		if(isset($_POST['content'])){
			$content = mysql_escape_string($_POST['content']);
			$CauHoi = mysql_escape_string($_POST['CauHoi']);
			$n_order = mysql_escape_string($_POST['n_order']);
			$active = mysql_escape_string($_POST['active']);
			$sql = "insert into `cms_binhchon_luachon` values ('','$CauHoi','$content','$n_order','0','$active')";
			//echo $sql;
			$q = mysql_query($sql);
			if($q){
				echo '<script>alert("Thêm mới trả lời bình chọn thành công");window.location="?m=binhchon_traloi&idCH='.$CauHoi.'"</script>';
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
                    <option value="<?php echo $data['id']?>"><?php echo $data['content'];?></option>
                    <?php
                        }
                    ?>
                </select>
            </li>
        </ul>
        
        <ul class="forms">
            <li class="txt">Câu trả lời <span class="req"></span></li>
            <li class="inputfield"><input type="text" name="content" id="contentCauHoi" /></li>
        </ul>
        <ul class="forms">
            <li class="txt">Sắp xếp thứ tự <span class="req"></span></li>
            <li class="inputfield">
              <input type="text" name="n_order" id="n_order" />
            </li>
        </ul>
	  <ul class="forms">
          <li class="txt">Ẩn hiện <span class="req"></span></li>
          <li class="inputfield">
            <select name="active" id="active">
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