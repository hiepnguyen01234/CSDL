<title>Chủng loại sản phẩm</title>
<div class="col_min">
  <h1 class="title heading">Danh sách chủng loại sản phẩm</h1>
    <div class="clear">&nbsp;</div>
  <table border="0" cellspacing="1" cellpadding="0" width="940px">
      <tr>
        <td width="40">&nbsp;</td>
        <td width="369">&nbsp;</td>
        <td width="150">&nbsp;</td>
        <td width="179">&nbsp;</td>
        <td width="202">&nbsp;</td>
      </tr>
      <tr style="background-color:#0CF; font-weight:bold; text-align:center;">
        <td>STT</td>
        <td>Tên chủng loại</td>
        <td>Thứ tự</td>
        <td>Ẩn Hiện</td>
        <td>Công cụ </td>
      </tr>
      
        <?php
            $sql = "SELECT * FROM `cms_sanpham_chungloai` ORDER BY `idCL` DESC";
            $q = mysql_query($sql);
            $stt = 1;
            while($data=mysql_fetch_assoc($q)){
        ?>
       <tr class="<?php if($stt%2!=1) echo 'gray1';?> center hover">
        <td>&nbsp;<?php echo $stt++?></td>
        <td align="left">&nbsp;<a href="?m=sanpham_loai&idCL=<?php echo $data['idCL'];?>"><?php echo $data['TenCL'];?></a></td>
        <td>&nbsp;<?php echo $data['ThuTu'];?></td>
        <td>&nbsp;<?php if($data['AnHien']==1) echo 'Hiện'; else echo 'Ẩn';?></td>
        <td>&nbsp;
          <a href="?m=sp_chungloai_xuly&act=1&idCL=<?php echo $data['idCL'];?>" ><img src="images/Edit_16x16.png" alt="edit" /></a>&nbsp;
          <a href="?m=sp_chungloai_xuly&act=2&idCL=<?php echo $data['idCL'];?>" onclick="return confirm('<?php echo $_SESSION['HoTenQT']?>\nBạn chắc là có muốn xóa chủng loại này không? \nThao tác này sẽ xóa đi tất cả các loại và sản phẩm kèm thêm hãng sản xuất thuộc chủng loại này. \nBạn chắc chứ????');"><img src="images/Delete_16x16.png" alt="edit" /></a>
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
      </tr>
  </table>
    <?php
    	//print_r($_POST);//Array ( [TenCL] => a [ThuTu] => a [AnHien] => 0 ) 
		if(isset($_POST['TenCL'])){
			$TenCL = mysql_escape_string($_POST['TenCL']);
			$ThuTu = mysql_escape_string($_POST['ThuTu']);
			$AnHien = mysql_escape_string($_POST['AnHien']);
			$sql = "insert into `cms_sanpham_chungloai` values ('','$TenCL','$ThuTu','$AnHien')";
			//echo $sql;
			$q = mysql_query($sql);
			if($q){
				echo '<script>alert("Thêm mới chủng loại sản phẩm thành công");window.location="?m=sp_chungloai"</script>';
			}else{
				echo '<script>alert("Thất bại."); </script>';
			}
		}
	?>
  <div id="table" style="height:180px;">
   	<h3 class="heading title">Thêm mới chủng loại sản phẩm</h3>
        <form action="" method="post" id="newCL">
        <ul class="forms">
            <li class="txt">Tên chủng loại <span class="req"></span></li>
            <li class="inputfield"><input type="text" name="TenCL" id="TenCL" /></li>
        </ul>
        <ul class="forms">
            <li class="txt">Sắp xếp thứ tự <span class="req"></span></li>
            <li class="inputfield">
              <input type="text" name="ThuTu" id="ThuTu" />
            </li>
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