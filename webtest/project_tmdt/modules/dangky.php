<title>Đăng ký</title>
  <?php
  	//print_r($_POST);
  	if(isset($_POST['Email'])){
		$HoTen = mysql_escape_string($_POST['HoTen']);
		$Email = mysql_escape_string($_POST['Email']);
		$Pass = $_POST['Pass'];
		$rePass = mysql_escape_string($_POST['rePass']);
		$DienThoai = mysql_escape_string($_POST['DienThoai']);
		//$DiaChi = mysql_escape_string($_POST['DiaChi']);
		$SoNha = $_POST['SoNha'];
		
		$PhuongXa = $_POST['PhuongXa'];
		$q = mysql_query("SELECT `TenPX` FROM `cms_diadiem_phuongxa` where `idPX` = $PhuongXa");
		$data = mysql_fetch_assoc($q);
		$PhuongXa = $data['TenPX'];
		
		$QuanHuyen = $_POST['QuanHuyen'];
		$q = mysql_query("SELECT `TenHuyen` FROM `cms_diadiem_quanhuyen` where `idH` = $QuanHuyen");
		$data = mysql_fetch_assoc($q);
		$QuanHuyen = $data['TenHuyen'];		
		
		$TinhThanh = $_POST['TinhThanh'];
		$q = mysql_query("SELECT `TenTinh` FROM `cms_diadiem_tinhthanh` where `idT` = $TinhThanh");
		$data = mysql_fetch_assoc($q);
		$TinhThanh = $data['TenTinh'];
		
		$DiaChi = mysql_escape_string($SoNha.' '.$PhuongXa.' '.$QuanHuyen.' '.$TinhThanh);
		$MatMa = mysql_escape_string($_POST['MatMa']);

		$flag = 0;
		if($Pass == $rePass){
			if($MatMa == $_SESSION['MatMa']){
				$sql = "INSERT INTO `cms_quantri_nguoidung` values (NULL, sha1('$rePass'), '$Email', 
																	'$HoTen', '$DienThoai','$DiaChi', '', '', now(), '', '','')";
				$q = mysql_query($sql);
				if($q){
					$flag = 1;
				}else{
					echo '<script>alert("Đăng ký không thành công. Email này đã được sử dụng!");</script>';
					$msg = '<div class="req" style="text-align:center; margin-bottom:10px;">Đăng ký không thành công. Email này đã được sử dụng!</div>';
				}//end if else dang ky
			}else{
				echo '<script>alert("Mật mã không dúng. Xin hãy nhập lại!");</script>';
				$msg = '<div class="req" style="text-align:center; margin-bottom:10px;">Mật mã không dúng. Xin hãy nhập lại!</div>';
			}//end if else mật mã
		}else{//Mật khẩu chưa khắp
			echo '<script>alert("Mật khẩu nhắc lại chưa khớp. Xin hãy kiểm tra lại!");</script>';
			$msg = '<div class="req" style="text-align:center; margin-bottom:10px;">Mật khẩu nhắc lại chưa khớp. Xin hãy kiểm tra lại!</div>';
		}//end if else pass
	}
  ?>
  <div class="clear"></div>
  <?php
  if($flag!=1){
  ?>
    <div class="col_min">
        <h1 class="heading title">Đăng ký</h1>
      <form action="" method="post" id="DangKy" onsubmit="return checkData()">
      <div id="table">
            <h3 class="heading">Thông tin Đăng ký tài khoản</h3>
            <?php echo $msg;?>
            <ul class="forms">
                <li class="txt">Họ và tên <span class="req">*</span></li>
                <li class="inputfield"><input type="text" value="<?php echo $HoTen;?>" name="HoTen" id="HoTen" autofocus /></li>
            </ul>
            <ul class="forms">
                <li class="txt">Email <span class="req">*</span></li>
                <li class="inputfield">
                	<input type="text" value="<?php echo $Email;?>" onblur="callAjaxEmail();" name="Email" id="Email" />
                	<span id="msg"></span>
                    <!---->
                </li>
            </ul>
            <ul class="forms">
              <li class="txt">Mật khẩu <span class="req">*</span></li>
                <li class="inputfield"><input type="password" name="Pass" id="Pass" /></li>
            </ul>
            <ul class="forms">
                <li class="txt">Nhắc lại MK <span class="req">*</span></li>
                <li class="inputfield"><input type="password" name="rePass" id="rePass" /></li>
            </ul>
            <ul class="forms">
                <li class="txt">Điện thoại <span class="req">*</span></li>
                <li class="inputfield"><input type="number" value="<?php echo $DienThoai?>" name="DienThoai" id="DienThoai" /></li>
            </ul>
            <ul class="forms">
                <li class="txt">Thành phố <span class="req">*</span></li>
                <li class="inputfield">
                  <select name="TinhThanh" id="TinhThanh" onchange="callAjaxTT('modules/ajaxQuanHuyen.php','#QuanHuyen')">
                  	<option value="0">&nbsp;-- Chọn tỉnh thành bạn đang ở --</option>
                    <?php
                    	$sql = "select `idT`, `TenTinh` from `cms_diadiem_tinhthanh`";
						$q = mysql_query($sql);
						while($data = mysql_fetch_assoc($q)){
					?>
                    <option value="<?php echo $data['idT'];?>"><?php echo $data['TenTinh'];?></option>
                    <?php
						}
					?>
                  </select>
                </li>
            </ul>
            <ul class="forms">
                <li class="txt">Quận, huyện <span class="req"> *</span></li>
                <li class="inputfield">
                  <select name="QuanHuyen" id="QuanHuyen" onchange="callAjaxPX('modules/ajaxPhuongXa.php','#PhuongXa')">
                  	<option value="0">&nbsp;-- Chọn quận huyện bạn đang ở --</option>
                  </select>
                </li>
            </ul>
            <ul class="forms">
                <li class="txt">Phường xã <span class="req"> *</span></li>
                <li class="inputfield">
                  <select name="PhuongXa" id="PhuongXa">
                  	<option value="0">&nbsp;-- Chọn phường xã bạn đang ở --</option>
                  </select>
                </li>
            </ul>
            <ul class="forms">
                <li class="txt">Số nhà <span class="req"> *</span></li>
                <li class="inputfield">
                  <input type="text" id="SoNha" name="SoNha" />
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
                <li><label class="button bold right"><a href="javascript: void(1)" onclick="document.getElementById('submitDK').click()" style="">&nbsp;&nbsp;Đăng ký&nbsp;&nbsp;</a></label></li>
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
