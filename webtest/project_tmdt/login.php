<?php
	session_start();
	ob_start();
	include("libs/config.php");
	if(isset($_POST['Email'])){
		$Email   = mysql_escape_string($_POST['Email']);
		$MatKhau = mysql_escape_string($_POST['Pass']);
		$save    = $_POST['save'];
		$sql     = "SELECT `idNguoiDung`, `Quyen`, `HoTen`, `Email` FROM `cms_quantri_admin` WHERE `Email` = '$Email' AND `MatKhau` = sha1('$MatKhau')";
		$q       = mysql_query($sql);
		$num     = mysql_num_rows($q);
		if($num>0){
			if($save == 1) setcookie('Email',$Email,time()+3600);
			else setcookie('Email',$Email,time()-3600);
			$data = mysql_fetch_assoc($q);
			
			$_SESSION['idNguoiDungQT'] = $data['idNguoiDung'];
			$_SESSION['HoTenQT'] = $data['HoTen'];
			$_SESSION['EmailQT'] = $data['Email'];
			$_SESSION['QuyenHan'] = $data['Quyen'];
			//echo 'ok';
			header("location: ./admin.php");
			//exit();
		}else{
			echo "<script>alert('Đăng nhập không thành công.');</script>";	
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/s_icon.png" />
<link rel="stylesheet" type="text/css" href="css/resset.css"/>
<link rel="stylesheet" type="text/css" href="css/style_admin.css"/>
<title>Đăng nhập</title>
</head>
<body>
    <div id="wrapper" class="clear">
    	<form action="" id="dangnhap" method="post" onsubmit="">
    	<div id="table" style="height:190px; background:none; margin-top:100px;">
            <h3 class="heading">Quản trị website</h3>
            <p>Hãy đăng nhập vào quyền quản trị của bạn.</p>
            <ul class="forms">
                <li class="txt">Email  <span class="req">*</span></li>
                <li class="inputfield"><input type="text" name="Email" id="Email" autofocus style="background:none;" /></li>
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
                <li class="txt">&nbsp;<input type="submit" id="submitLH" class="none" /></li>
                <li><label class="button bold right"><a href="javascript:void(1);" onclick="document.getElementById('dangnhap').submit()">&nbsp;&nbsp;Đăng nhập&nbsp;&nbsp;</a></label></li>
	        </ul>
        </div>
        </form>
    </div><!-- end wrapper -->
    
</body>
</html>