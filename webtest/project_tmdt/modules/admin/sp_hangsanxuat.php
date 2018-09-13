<?php
	if(isset($_GET['idHSX'])){
		$q = mysql_query('select `idCL` from `cms_sanpham_hangsanxuat` where `idHSX` = '.$_GET['idHSX']);
		$data = mysql_fetch_assoc($q);
		$idCL = $data['idCL'];
		echo "<script>callAjaxLoai('modules/admin/ajaxhangsanxuat.php?idCL=".$idCL."','#HSX')</script>";
	}
?>
<title>Loại sản phẩm</title>
<div class="col_min">
	<h1 class="title heading">Danh sách hãng sản xuất</h1>
    <div class="clear">&nbsp;</div>
    <table border="0" cellspacing="1" cellpadding="0" width="940px">
      <tr>
        <td colspan="5">
        	Chủng loại sản phẩm: 
            <select onchange="callAjaxLoai('modules/admin/ajaxhangsanxuat.php?idCL='+this.value,'#HSX')">
            	<option value="0">--Chọn loại sản phẩm--</option>
                <?php
                	$sql = "select `idCL`, `TenCL` from `cms_sanpham_chungloai`";
					$q = mysql_query($sql);
					while($data = mysql_fetch_assoc($q)){
				?>
                <option value="<?php echo $data['idCL']?>"><?php echo $data['TenCL']?></option>
                <?php
					}
				?>
            </select>
        </td>
      </tr>
    </table>
  <table id="HSX" border="0" cellspacing="1" cellpadding="0" width="940px" style="border-top:none;">
      
    </table>
    <?php
    	//print_r($_POST);//Array ( [idCL] => 1 [TenLoai] => acb [ThuTu] => 1 [AnHien] => 1 ) 
		if(isset($_POST['TenHang']) and $_POST['idCL']!=0){
			$idCL = mysql_escape_string($_POST['idCL']);
			$TenHang = mysql_escape_string($_POST['TenHang']);
			$ThuTu = mysql_escape_string($_POST['ThuTu']);
			$AnHien = mysql_escape_string($_POST['AnHien']);
			$sql = "insert into `cms_sanpham_hangsanxuat` values ('','$idCL','$TenHang','$ThuTu','$AnHien')";
			//echo $sql;
			$q = mysql_query($sql);
			if($q){
				echo '<script>alert("Thêm mới Hãng sản xuất thành công."); callAjaxLoai("modules/admin/ajaxhangsanxuat.php?idCL='.$idCL.'","#HSX")</script>';
			}else{
				echo '<script>alert("Thất bại."); </script>';
			}
		}
	?>
  <div id="table" style="height:200px;">
   	<h3 class="heading title">Thêm mới hãng sản xuất</h3>
        <form action="" method="post" id="newCL">
            <ul class="forms">
            	<li class="txt">Chủng loại <span class="req"></span></li>
            	<li class="inputfield">
                    <select name="idCL">
                        <option value="0">--Chọn loại sản phẩm--</option>
                        <?php
                            $sql = "select `idCL`, `TenCL` from `cms_sanpham_chungloai`";
                            $q = mysql_query($sql);
                            while($data = mysql_fetch_assoc($q)){
                        ?>
                        <option value="<?php echo $data['idCL']?>"><?php echo $data['TenCL']?></option>
                        <?php
                            }
                        ?>
            		</select>
                </li>
            </ul>
            <ul class="forms">
            	<li class="txt">Tên hãng <span class="req"></span></li>
            	<li class="inputfield"><input type="text" name="TenHang" id="TenHang"/></li>
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
                <li>
                    <label class="button bold right">
	                    <a href="javascript: void(1)" onclick="document.getElementById('submitDK').click()" style="">&nbsp;&nbsp;Thêm mới&nbsp;&nbsp;</a>
                    </label>
                </li>
                <li>
                    <label class="button bold right">
	                    <a href="javascript: void(1)" onclick="document.getElementById('newL').reset();" style="">&nbsp;&nbsp;Nhập lại&nbsp;&nbsp;</a>
                    </label>
                </li>
    </ul> </form>
           
  </div>
</div>
<?php
if($act==2){
		
		$sqlidCL = "select `idCL` from `cms_sanpham_hangsanxuat` where `idHSX` = $idHSX";
		$dataidCL = mysql_fetch_assoc(mysql_query($sqlidCL));
		$idCL = $dataidCL['idCL'];
		
		$sql = "DELETE FROM `cms_sanpham_hangsanxuat` WHERE `idHSX` = $idHSX"; 
		$qL=mysql_query($sql);//Xoa co so du lieu trong loai san pham

		echo '<script>callAjaxLoai("modules/admin/ajaxhangsanxuat.php?idCL='.$idCL.'","#HSX");</script>';
		//header("location: ?m=sp_loai&idCL=$idCL");
		//exit();
	}
?>