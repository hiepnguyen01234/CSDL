<title>Cập nhật thông tin</title>
  <?php
  	$act=round($_GET['act']);
  	//print_r($_POST);
  	if(isset($_POST['HoTen'])){
		if($_POST['MatMa']==$_SESSION['MatMa']){
			$HoTen = mysql_escape_string($_POST['HoTen']);
			$NgaySinh = convertDate(mysql_escape_string($_POST['NgaySinh']));
			$GioiTinh = mysql_escape_string($_POST['GioiTinh']);
			$CMND = mysql_escape_string($_POST['CMND']);
			$DiaChi = mysql_escape_string($_POST['DiaChi']);
			$DienThoai = mysql_escape_string($_POST['DienThoai']);
			if(is_numeric($DienThoai)){
				$sql = "update `cms_quantri_nguoidung` set
						`HoTen` = '$HoTen',
						`DienThoai` = '$DienThoai',
						`DiaChi` = '$DiaChi',
						`NgaySinh` = '$NgaySinh',
						`GioiTinh` = '$GioiTinh',
						`CMND` = '$CMND'
						WHERE `Email` = '".$_SESSION['Email']."'";
				//echo $sql;
				$q = mysql_query($sql);
				if($q){
					echo '<script>alert("Cập nhật thành công.");</script>';
					header('location: ?m=capnhat');
					exit();
				}
			}else{
				echo "<script>alert('Số điện thoại phải là số');</script>";
			}
		}else{
			echo "<script>alert('Thất bại.\n Bạn vui lòng kiểm tra lại mật khẩu góc.');</script>";
		}
	}	
	
	if(isset($_POST['MatKhau'])){
		if($_POST['MatMa']==$_SESSION['MatMa']){
			$MatKhau = sha1(mysql_escape_string($_POST['MatKhau']));
			$Pass = mysql_escape_string($_POST['Pass']);
			$rePass = mysql_escape_string($_POST['rePass']);		
			$sql = "update `cms_quantri_nguoidung` SET `MatKhau` = SHA1( '$rePass' ) WHERE `MatKhau` = '$MatKhau' AND `Email` = '".$_SESSION['Email']."'";
			$q = mysql_query($sql);
			if($q){
				echo "<script>alert('Thay đổi mật khẩu thành công.\nVui lòng đăng nhập lại để xác nhận!!');</script>";
				unset($_SESSION['idNguoiDung']);
				unset($_SESSION['HoTen']);
				unset($_SESSION['Email']);
				header('location: ?m=dangnhap');
				exit();
			}else{
				echo "<script>alert('Thất bại.\n Bạn vui lòng kiểm tra lại mật khẩu góc.');</script>";
			}
		}else{
			echo '<script>alert("Mã bảo mật không đúng. Hãy nhập lại!")</script>';
		}//end if else mat ma
	}//end if else ton tai mat khau
	
  ?>
  <div class="clear"></div>
<?php
	if($act==1){
      if($flag!=1){
?>
        <div class="col_min">
            <h1 class="heading title">Cập nhật</h1>
          <?php
          	$sql = "select `HoTen`,`MatKhau`,`DiaChi`,`DienThoai`,`NgaySinh`,`GioiTinh`,`CMND` from `cms_quantri_nguoidung`
					where `Email`='".$_SESSION['Email']."'";
			$q = mysql_query($sql);
			$data = mysql_fetch_assoc($q);
		  ?>
          <form action="" method="post" id="DangKy" onsubmit="return checkData()">
          <div id="table" style="height:300px;">
                <h3 class="heading">Cập nhật thông tin cá nhân</h3>
                <?php echo $msg;?>
            <ul class="forms">
                    <li class="txt">Họ và tên <span class="req">*</span></li>
                    <li class="inputfield"><input type="text" value="<?php echo $data['HoTen'];?>" name="HoTen" id="HoTen" autofocus /></li>
                </ul>
                <ul class="forms">
                  <li class="txt">Điện thoại <span class="req">*</span></li>
                    <li class="inputfield"><input type="number" value="<?php echo $data['DienThoai'];?>" name="DienThoai" id="DienThoai" /></li>
            </ul>
            <ul class="forms">
              <li class="txt">Ngày sinh <span class="req">*</span></li>
                    <li class="inputfield"><input type="date" value="<?php echo date('d/m/Y',strtotime($data['NgaySinh']))?>" name="NgaySinh" id="NgaySinh" onfocus="scwShow(this,event);" onclick="scwShow(this,event);" readonly /></li>&nbsp;
              <img src="images/calendar.png" onclick="document.getElementById('NgaySinh').click(scwShow(this,event))" style="cursor:pointer; width:16px; margin-top:3px;" />
            </ul>
            <ul class="forms">
                  <li class="txt">Giới tính <span class="req">*</span></li>
                    <li class="inputfield">
                      <select name="GioiTinh" id="GioiTinh">
                        <option <?php if($data['GioiTinh']==2) echo 'selected';?> value="2">Cập nhật</option>
                        <option <?php if($data['GioiTinh']==1) echo 'selected';?> value="1">Nam</option>
                        <option <?php if($data['GioiTinh']==0) echo 'selected';?> value="0">Nữ</option>
                      </select>
                    </li>
            </ul>
            <ul class="forms">
              <li class="txt">CMND <span class="req">*</span></li>
                    <li class="inputfield"><input type="number" <?php if($data['CMND']==0) echo 'placeholder="Cập nhật ..."'; else echo 'value="'.$data['CMND'].'"';?> name="CMND" id="CMND" /></li>
            </ul>
                <ul class="forms">
                    <li class="txt">Địa chỉ <span class="req"> *</span></li>
                    <li class="inputfield">
                      <input type="text" value="<?php echo $data['DiaChi']?>" id="DiaChi" name="DiaChi" />
                    </li>
                </ul>
              <ul class="forms">
                  <li class="txt">Mật mã <span class="req">*</span></li>
                  <li class="inputfield"><input name="MatMa" type="text" id="MatMa" style="width:120px;" /></li>
                  <li>&nbsp;
                    <img src="libs/CaptchaSecurityImages.php" id="capcha" alt="Mật mã" height="25"/>&nbsp;
                    <a href="javascript:void(1)"><img src="images/Refresh_16x16.png" height="16" alt="refCode" onclick="document.getElementById('capcha').src='libs/CaptchaSecurityImages.php?ran='+Math.random()" /></a>
                  </li>
              </ul>
              <ul class="forms">
                    <li class="txt">&nbsp;<input type="submit" id="submitDK" class="none" /></li>
                    <li><label class="button bold right"><a href="javascript: void(1)" onclick="document.getElementById('submitDK').click()" style="">&nbsp;&nbsp;Cập nhật&nbsp;&nbsp;</a></label></li>
                    <li><label class="button bold right"><a href="javascript: void(1)" onclick="document.getElementById('DangKy').reset();" style="">&nbsp;&nbsp;Nhập lại&nbsp;&nbsp;</a></label></li>
            </ul>
            </div>
            </form>
      </div><!-- end col_min -->
      <div class="clear"></div>
      <?php
      }elseif($flag==1){
      ?>
      <div id="table" style="height:100px; background:none;">
          <h3 class="heading">Đăng ký thành công</h3>
        <p>
              Xin chào <span><?php echo $HoTen;?></span>Bạn đã đăng ký thành công. 
          Bấm vào <a href="?m=dangnhap" class="colr">đây</a> để đến trang đăng nhập. </p>
      </div>
      <?php
      }
	}else{
	?>
    	<div class="col_min">
            <h1 class="heading title">Cập nhật</h1>
          <form action="" method="post" id="doiMK" onsubmit="return checkData()">
          <div id="table" style="height:210px;">
                <h3 class="heading">Cập nhật mật khẩu</h3>
                <?php echo $msg;?>
            <ul class="forms">
                    <li class="txt">Mật khẩu <span class="req">*</span></li>
                    <li class="inputfield"><input type="password" name="MatKhau" id="MatKhau" autofocus /></li>
            </ul>
                <ul class="forms">
                  <li class="txt">Mật khẩu mới <span class="req">*</span></li>
                    <li class="inputfield"><input type="password" name="Pass" id="Pass" /></li>
            </ul>
            
            
            <ul class="forms">
              <li class="txt">Nhắc lại MK <span class="req">*</span></li>
                    <li class="inputfield">
                      <input name="rePass" type="password" id="rePass" />
                    </li>
            </ul>
              <ul class="forms">
                  <li class="txt">Mật mã <span class="req">*</span></li>
                  <li class="inputfield"><input name="MatMa" type="text" id="MatMa" style="width:120px;" /></li>
                  <li>&nbsp;
                    <img src="libs/CaptchaSecurityImages.php" id="capcha" alt="Mật mã" height="25"/>&nbsp;
                    <a href="javascript:void(1)"><img src="images/Refresh_16x16.png" height="16" alt="refCode" onclick="document.getElementById('capcha').src='libs/CaptchaSecurityImages.php?ran='+Math.random()" /></a>
                  </li>
              </ul>
              <ul class="forms">
                    <li class="txt">&nbsp;<input type="submit" id="submitdoiMK" class="none" /></li>
                    <li><label class="button bold right"><a href="javascript: void(1)" onclick="document.getElementById('submitdoiMK').click()" >&nbsp;&nbsp;Đổi mới&nbsp;&nbsp;</a></label></li>
                    <li><label class="button bold right"><a href="javascript: void(1)" onclick="document.getElementById('doiMK').reset();">&nbsp;&nbsp;Nhập lại&nbsp;&nbsp;</a></label></li>
            </ul>
            </div>
            </form>
            </div>
	<?php
	}
      ?>
      <div class="clear"></div>
      <div class="col_min">
            <h1 class="heading title" style="border-top:none;">Sản phẩm nổi bật</h1>
            <div class="main">
                    <?php
                        $sql = "SELECT `idSP` , `idLoai` , `TenSP` , `Gia` , `UrlHinh` FROM `cms_sanpham`
                                WHERE `AnHien` =1
                                ORDER BY `SoLanMua` DESC
                                LIMIT 0 , 8 ";
                        $q = mysql_query($sql);
                        while($data=mysql_fetch_assoc($q)){
                    ?>
                  <!-- THIRD EXAMPLE -->
                  <div class="view view-third" style="height:auto; background:none;"> 
                  <label><img src="images/sanpham/<?php echo $data['UrlHinh'];?>"/></label>
                      <div class="mask" title="<?php echo $data['TenSP'];?>" onclick="window.location='?m=sanpham_chitiet&idSP=<?php echo $data['idSP']?>'">
                        <h2><?php echo $data['TenSP'];?></h2>
                          <p><?php echo number_format($data['Gia'],0,'.',',');?> VNĐ</p>
                          <a href="?m=giohang_xuly&act=1&idSP=<?php echo $data['idSP']?>" class="info">Mua hàng</a>
                    </div>
                    <span class="bold colr" style="display:block; padding:4px 0 2px 0;">
                        <span class="req"><?php echo number_format($data['Gia'],0,'.',',');?> VNĐ</span>
                        <a href="?m=sanpham_chitiet&idSP=<?php echo $data['idSP']?>" class="buttonM" style="">Xem Chi tiết</a>
                    </span>
              </div>
                    <?php
                        }
                    ?>
                </div>
        </div>
      <div class="clear"></div>
