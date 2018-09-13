<?php
	if(isset($_GET['idLoai'])){
		$q = mysql_query('select `idCL` from `cms_sanpham_loai` where `idLoai` = '.$_GET['idLoai']);
		$data = mysql_fetch_assoc($q);
		$idCL = $data['idCL'];
		echo "<script>callAjaxLoai('modules/admin/ajaxLoai.php?idCL=".$idCL."','#Loai')</script>";
	}
?>
<title>Loại sản phẩm</title>
<div class="col_min">
	<h1 class="title heading">Danh sách loại sản phẩm</h1>
    <div class="clear">&nbsp;</div>
    <table border="0" cellspacing="1" cellpadding="0" width="940px">
      <tr>
        <td colspan="5">
        	Chủng loại sản phẩm: 
            <select onchange="callAjaxLoai('modules/admin/ajaxLoai.php?idCL='+this.value,'#Loai')">
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
  <table id="Loai" border="0" cellspacing="1" cellpadding="0" width="940px" style="border-top:none;">
      
    </table>
    <?php
    	//print_r($_POST);//Array ( [idCL] => 1 [TenLoai] => acb [ThuTu] => 1 [AnHien] => 1 ) 
		if(isset($_POST['TenLoai']) and $_POST['idCL']!=0){
			$idCL = mysql_escape_string($_POST['idCL']);
			$TenLoai = mysql_escape_string($_POST['TenLoai']);
			$ThuTu = mysql_escape_string($_POST['ThuTu']);
			$AnHien = mysql_escape_string($_POST['AnHien']);
			$sql = "insert into `cms_sanpham_loai` values ('','$idCL','$TenLoai','$ThuTu','$AnHien')";
			//echo $sql;
			$q = mysql_query($sql);
			if($q){
				echo '<script>alert("Thêm Loại sản phẩm thành công."); callAjaxLoai("modules/admin/ajaxLoai.php?idCL='.$idCL.'","#Loai")</script>';
			}else{
				echo '<script>alert("Thất bại."); </script>';
			}
		}
	?>
  <div id="table" style="height:200px;">
   	<h3 class="heading title">Thêm mới loại sản phẩm</h3>
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
            	<li class="txt">Tên loại <span class="req"></span></li>
            	<li class="inputfield"><input type="text" name="TenLoai" id="TenLoai"/></li>
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
           	</ul>
    </form>
  </div>
</div>
<?php
if($act==2){
		$sql = "DELETE from `cms_sanpham` WHERE `idLoai` 
				IN ( SELECT `idLoai` FROM `cms_sanpham_loai` 
					WHERE `idLoai` = $idLoai )";
		//echo $sql;
		mysql_query($sql);//Xoa co CSDL trong san pham
		
		$sqlidCL = "select `idCL` from `cms_sanpham_loai` where `idLoai` = $idLoai";
		$dataidCL = mysql_fetch_assoc(mysql_query($sqlidCL));
		$idCL = $dataidCL['idCL'];
		
		$sql = "DELETE FROM `cms_sanpham_loai` WHERE `idLoai` = $idLoai"; 
		//echo '<br/>'.$sql;
		$qL=mysql_query($sql);//Xoa co so du lieu trong loai san pham
		//header("location: ?m=sp_loai");
		echo '<script>callAjaxLoai("modules/admin/ajaxLoai.php?idCL='.$idCL.'","#Loai");</script>';
		//header("location: ?m=sp_loai&idCL=$idCL");
		//exit();
	}
?>