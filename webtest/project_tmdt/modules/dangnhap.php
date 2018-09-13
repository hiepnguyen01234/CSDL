<?php
	//print_r($_POST);
	//[Email] => admin@gmail.com [Pass] => 123  [save] => 1
	if(isset($_POST['Email'])){
		$Email = mysql_escape_string($_POST['Email']);
		$MatKhau = mysql_escape_string($_POST['Pass']);
		$save = $_POST['save'];
		$sql = "SELECT `idNguoiDung`, `HoTen`, `Email` FROM `cms_quantri_nguoidung` WHERE `Email` = '$Email' AND `MatKhau` = sha1('$MatKhau')";
		//echo $sql;
		$q = mysql_query($sql);
		$num = mysql_num_rows($q);
		if($num>0){
			if($save == 1) setcookie('Email',$Email,time()+3600);
			else setcookie('Email',$Email,time()-3600);
			$data = mysql_fetch_assoc($q);
			
			$_SESSION['idNguoiDung'] = $data['idNguoiDung'];
			$_SESSION['HoTen'] = $data['HoTen'];
			$_SESSION['Email'] = $data['Email'];
			
			$mod = $_GET['chuyenhuong'];
			header("location: ?m=$mod");
			exit();
		}else{
			echo "<script>alert('Đăng nhập không thành công.');</script>";	
		}
	}
	if(!isset($_SESSION['Email'])){
?>
<title>Đăng nhập</title>

<form action="" method="post" id="dangnhap" onsubmit="">
  <div class="clear"></div>
    <div class="col_min">
        <h1 class="heading title">Đăng nhập</h1>
      <div id="table" style="height:190px; background:none;">
            <h3 class="heading">Thông tin Đăng nhập</h3>
            <p>Nếu bạn có một tài khoản ở Website của chúng tôi, vui lòng đăng nhập!</p>
            <ul class="forms">
                <li class="txt">Email  <span class="req">*</span></li>
                <li class="inputfield"><input type="email" value="" name="Email" id="Email" autofocus style="background:none;" placeholder="email@gmail.com" /></li>
            </ul>
            <ul class="forms">
              <li class="txt">Mật Khẩu <span class="req">*</span></li>
                <li class="inputfield"><input type="password" name="Pass" id="Pass" style="background:none;" /></li>
            </ul>
            <ul class="forms">
                <li class="txt">&nbsp;</li>
                <li class=""><label><input type="checkbox" name="save" value="1" /> Ghi nhớ</label></li>
            </ul>
          <ul class="forms clear">
            <li class="txt">&nbsp;<input type="submit" id="submitDN" class="none" /></li>
                <li><label class="button bold right"><a href="javascript:void(1);" onclick="document.getElementById('submitDN').click()">&nbsp;&nbsp;Đăng nhập&nbsp;&nbsp;</a></label></li>
            </ul>
        </div>
</form>
        <div id="table" style="height:100px; background:none;">
            <h3 class="heading">Đăng ký</h3>
            <p>Nếu bạn chưa có tài khoản ở Website của chúng tôi, xin hãy đăng ký!<br/>
                Việc đăng ký sẽ giúp bạn di chuyển sang các trang dễ dàng hơn.
            </p>
          <ul class="forms">
            <li class="txt">&nbsp;<input type="submit" id="submitLH" class="none" /></li>
                <li><label class="button bold right"><a href="?m=dangky">&nbsp;&nbsp;Đăng ký thành viên&nbsp;&nbsp;</a></label></li>
            </ul>
        </div>
  </div><!-- end col_min -->
  <div class="clear"></div>
<?php
	}else{
?>
		<div id="table" style="height:100px; background:none;">
            <h3 class="heading">Đăng nhập</h3>
          <p>
            	Bạn đã đăng nhập thành công. 
            Bấm vào <a href="?m=trangchu" class="colr">đây</a> để trở lại trang chủ. </p>
          
        </div>
<?php
	}
?>