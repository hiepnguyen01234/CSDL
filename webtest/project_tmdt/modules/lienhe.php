<style type="text/css">
.apDiv1 {
	position: absolute;
	right: 220px;
	top: 250px;
	width: 270px;
	height: 325px;
	z-index: 100;
	padding-right:10px;
}
</style>
  <title>Liên hệ</title>
  <?php
  	 $MatMa = mysql_escape_string($_POST['MatMa']);
	 if($MatMa == $_SESSION['MatMa']){	
		  if(isset($_POST['HoTen']) and isset($_POST['DiaChi'])){
        $HoTen     = mysql_escape_string($_POST['HoTen']);
        $CongTy    = mysql_escape_string($_POST['CongTy']);
        $DiaChi    = mysql_escape_string($_POST['DiaChi']);
        $Email     = mysql_escape_string($_POST['Email']);
        $DienThoai = mysql_escape_string($_POST['DienThoai']);
        $NoiDung   = mysql_escape_string($_POST['NoiDung']);
        $sql       = "insert into `cms_lienhe` values ('','$HoTen','$CongTy','$DiaChi','$Email','$DienThoai','$NoiDung',now())";
        $q         = mysql_query($sql);
			  if($q){
				 echo '<script>alert("Cảm ơn quý khách đã gửi thông liên hệ đến với chúng tôi!"); 
				 		window.location="?m=trangchu"
				 </script>';
				 //header("location:?m=trangchu");
				 //exit();
			}	  
		  }
	  }
  ?>
<div class="apDiv1">
      
  </div>
  <div id="col1"><!-- end col_min -->
    <div class="clear"></div>
      <div class="col_min">
          <h1 class="heading title">Liên hệ</h1>
          <form action="" method="post" id="formLH">
        <div id="table" style="width:700px; height:360px;">
              <h3 class="heading">Thông tin liên hệ</h3>
              <ul class="forms">
                  <li class="txt">Họ và tên <span class="req">*</span></li>
                  <li class="inputfield"><input type="text" name="HoTen" id="HoTen" /></li>
              </ul>
              <ul class="forms">
                  <li class="txt">Công ty <span class="req">*</span></li>
                  <li class="inputfield"><input type="text" name="CongTy" id="CongTy" /></li>
              </ul>
              <ul class="forms">
                  <li class="txt">Địa chỉ mail <span class="req">*</span></li>
                  <li class="inputfield"><input type="email" name="Email" id="Email" /></li>
              </ul>
              <ul class="forms">
                  <li class="txt">Số điện thoại <span class="req">*</span></li>
                  <li class="inputfield"><input type="number" name="DienThoai" id="DienThoai" /></li>
              </ul>
              <ul class="forms">
                  <li class="txt">Địa chỉ <span class="req">*</span></li>
                  <li class="inputfield"><input type="text" name="DiaChi" id="DiaChi" /></li>
              </ul>
              <ul class="forms">
                  <li class="txt">Nội dung <span class="req">*</span></li>
                  <li class="inputfield">
                    <textarea name="NoiDung" id="NoiDung" style="height:70px;"></textarea>
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
            <div class="clear"></div>
            <ul class="forms">
              <li class="txt">&nbsp;<input type="submit" id="submitLH" class="none" /></li>
                  <li><label class="button bold right"><a href="javascript:void(1);" onclick="document.getElementById('submitLH').click()" >&nbsp;&nbsp;Gửi liên hệ&nbsp;&nbsp;</a></label></li>
              </ul>
          </div>
          </form>
    </div><!-- end col_min -->
      <div class="col_min">
        <h1 class="heading title" style="text-align:right; padding-right:20px;">bản đồ</h1>
        <div id="mapgoogle">
              
        </div>
      </div><!-- end col_min -->
      <div class="clear"></div><!-- end col_min -->
    <div class="clear"></div>
  </div>