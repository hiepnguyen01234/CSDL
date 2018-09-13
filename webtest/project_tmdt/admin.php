<?php
	session_start();
	ob_start();
	include("libs/config.php");
	include("libs/function.php");
	$mod = $_GET['m'];
	if(!isset($_SESSION['EmailQT'])){
		header('location: ./login.php');
		exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/s_icon.png" />
<link rel="stylesheet" type="text/css" href="css/resset.css"/>
<link rel="stylesheet" type="text/css" href="css/style_admin.css"/>
<link rel="stylesheet" type="text/css" href="css/style_slider.css"/>
<link rel="stylesheet" type="text/css" href="css/layout_sp.css"/>
<link rel="stylesheet" type="text/css" href="css/style_common_sp.css"/>
<link rel="stylesheet" type="text/css" href="css/style_sp.css"/>
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/theClock.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" src="js/cufon.js"></script>
<script type="text/javascript" src="js/Times_New_Roman_400.font.js"></script>
<script type="text/javascript" src="js/lazyload.js"></script>
<script type="text/javascript" src="js/function.js"></script>
<script type="text/javascript" src="js/tab-nav.js"></script>
<script type="text/javascript" src="js/scw.js"></script>
<script type="text/javascript" src="js/ckeditorFull/ckeditor.js"></script>
<!--[if lte IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript" language="javascript">
	$(function(){$("div#col1 img").lazyload({ placeholder: "images/loader.gif", effect: "fadeIn" });});//lazyload
	Cufon.set('fontSize', '16px').replace('h2.heading');
	Cufon.set('fontSize', '25px').replace('h1.heading');
</script>

</head>
<body>
	<div id="menu_top">
    	<div class="menu_top">
        	<div id="theClock" class="left"><script>startclock();</script></div>
			<ul>
                <li class="right"><a href="?m=dangxuat" style="border-right:none">&nbsp;&nbsp;Đăng xuất </a></li>
                <?php if($_SESSION['QuyenHan'] == 1){?>
                	<li class="right"><a href="#">Quản trị tối cao </a></li>
                <?php }else echo 'Quản trị viên <span class="colr">'.$_SESSION['HoTenQT'].'</span> |';?>
			</ul>
        </div>
    </div>
    <div id="wrapper" class="clear">
    	<div id="header">&nbsp;</div>
        <div id="menu">            
            <ul class="menu-page-menu" >
                <li><a href="#">Sản phẩm &raquo;</a>
                    <ul>
                        <li><a href="?m=sp_chungloai">Chủng loại sản phẩm</a></li>
                        <li><a href="?m=sp_loai">Loại sản phẩm</a></li>
                        <li><a href="?m=sp_hangsanxuat">Hãng sản xuất</a></li>
                        <li><a href="?m=sanpham">Quản lý sản phẩm</a></li>
                    </ul>
                </li>
                <li><a href="?m=donhang">&nbsp; Đơn hàng &nbsp;</a></li>
                <li><a href="">Bình chọn &raquo;</a>
                    <ul>
                        <li><a href="?m=binhchon">Câu hỏi bình chọn</a></li>
                        <li><a href="?m=binhchon_traloi">Trả lời câu hỏi</a></li>
                    </ul>
                </li>
                <li><a href="?m=tintuc">Tin tức </a></li>
                <li><a href="?m=chinhsach">Chính sách giao hàng </a></li>
                <li><a href="?m=slider">Slider </a></li>
                <li><a href="?m=lienhe" style="border-right:none !important;">Liên hệ </a></li>                
            </ul><!-- end searchBox -->
        </div><!--End div menu-->
        <div class="clear">&nbsp;</div>
        
        <div id="content">
            <div class="crumb clear">
                <ul>
                    <li class="left">
                    	<span class="bold"><a class="req" href="admin.php">Administrator:</a></span> Xin chào quản trị viên 
                      <span class="colr"><?php echo $_SESSION['HoTenQT']?>. </span>Chúc bạn có một ngày làm việc thật vui vẻ.
                    </li>
                </ul>
            </div>
            <div id="col1">
            	<?php
					if($mod == '')$mod='home';
                	include("modules/admin/$mod.php");
				?>
            </div>
        </div><!-- end content -->
        
    </div><!-- end wrapper -->
    <div id="footer" class="clear">
    	<div class="footer">
        	<div id="fb-root"></div>
			<div class="fb-like left"></div>
        <div class="left">
        	<ul>
            	<li><a href="index.php">Trang chủ</a></li>
                <li><a href="index.php?m=lienhe">Liên hệ</a></li>
                <li class="last"><a href="index.php?m=gioithieu">Giới thiệu</a></li>
            </ul>
            <p>© 2013 by <a href="mailto:xuansonitvn@gmail.com">xuansonitvn@gmail.com</a></p>
        </div>
        <div class="right nd_footer">
        	<p><span class="heading">Trung Tâm Đào Tạo CNTT Nhất Nghệ</span></p>
            <p><span>Khóa học: HTML5, CSS3, PHP & MySQL</span></p>
          	<p><span>Địa chỉ: 105 Bà Huyện Thanh Quan, Quận 3, TP. HCM</span></p>
            <p><span>Điện thoại: (08) 3 9322 735 - (08) 3 9322734</span></p>            
            <p><span>Giảng Viên: Trần Đức Doanh - Email: <a href="mailto:tddoanh@gmail.com">tddoanh@gmail.com</a></span></p>
            <p><span>Học Viên: Nguyễn Xuân Sơn - Email: <a href="mailto:xuansonitvn@gmail.com">xuansonitvn@gmail.com</a></span></p>
            <p><span>Thiết kế giao diện website by Nguyễn Xuân Sơn</span></p>
        </div>
        </div>
    </div><!-- end Footer -->
</body>
</html>