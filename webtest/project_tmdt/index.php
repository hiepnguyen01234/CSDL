<?php
	session_start();
	ob_start();
	include("libs/config.php");
	include("libs/function.php");
	$mod = $_GET['m'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/s_icon.png" />
<link rel="stylesheet" type="text/css" href="css/resset.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/style_slider.css"/>
<link rel="stylesheet" type="text/css" href="css/layout_sp.css"/>
<link rel="stylesheet" type="text/css" href="css/style_common_sp.css"/>
<link rel="stylesheet" type="text/css" href="css/style_sp.css"/>

<script type="text/javascript" src="js/scw.js"></script>
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/theClock.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" src="js/cufon.js"></script>
<script type="text/javascript" src="js/Times_New_Roman_400.font.js"></script>
<script type="text/javascript" src="js/function.js"></script>
<!--[if lte IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript" src="js/lazyload.js"></script>
<script type="text/javascript" language="javascript">
	//$('div.col_min img').show(placeholder: "images/loading.gif");
	//$(document).ready(function(){$("div.col_min img").html("<img src='images/loading.gif' align='absmiddle' />").hide(2000)});
	$(function(){$("div.col_min img").lazyload({ placeholder: "images/loading.gif", event : "sporty", effect: "fadeIn" });});//lazyload
	$(window).bind("load", function() {var timeout = setTimeout(function() { $("div.col_min img").trigger("sporty") }, 300);});   
	
	Cufon.set('fontSize', '16px').replace('h2.heading');
	Cufon.set('fontSize', '25px').replace('h1.heading');
	Cufon.set('fontSize', '15px').replace('div.nd_footer p');
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
		fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));
</script>

</head>
<body>
	<div id="menu_top">
    	<div class="menu_top">
        	<ul>
            	
                <?php
                	if(isset($_SESSION['Email'])){
				?>
                <li class="right">&nbsp;Xin chào <span class="colr"><?php echo $_SESSION['HoTen']?></span></li>
                <li class="right"><a href="?m=dangxuat">&nbsp; Đăng xuất </a></li>				
                <li class="right"><a href="?m=capnhat">&nbsp; Cập nhật </a></li>
                <li class="right"><a href="?m=giohang">&nbsp; Giỏ hàng </a></li>
                <?php
					}else{
				?>
                <li class="right"><a href="?m=dangnhap" style="border-right:none;">&nbsp; Đăng nhập </a></li>
                <li class="right"><a href="?m=dangky">&nbsp; Đăng ký </a></li>
                <?php
					}
				?>
                <li class="right"><a href="?m=chinhsach_giaohang">&nbsp; Chính sách giao hàng </a></li>
            </ul>
        </div>
    </div>
    <div id="wrapper" class="clear">
    	<div id="header">&nbsp;</div>
        <div id="menu">
            <div id="theClock" class="left"><script>startclock();</script></div>
            <ul class="menu-page-menu" >
                <li><a href="index.php" title="Trang chủ">Trang Chủ</a></li>
                <li><a href="?m=tintuc" title="Tin tức công nghệ">Tin tức</a></li>
                <li><a href="#">Sản phẩm &raquo;</a>
                    <ul>
                    	<?php
                        	$sqlCL = 'SELECT `TenCL`, `idCL` FROM `cms_sanpham_chungloai` WHERE `AnHien` = 1 ORDER BY  `ThuTu` ASC';
							$qCL = mysql_query($sqlCL);
							while($dataCL = mysql_fetch_assoc($qCL)){
						?>
                        <li><a href="#"><?php echo $dataCL['TenCL'];?></a>
                        	<ul class="menu-page-menu-1" >
                            	<?php
                                	$sqlL = 'SELECT `TenLoai`, `idLoai` FROM `cms_sanpham_loai` 
											WHERE `AnHien` = 1 AND `idCL` = '.$dataCL['idCL'].' ORDER BY  `ThuTu` ASC';
									$qL = mysql_query($sqlL);
									while($dataL = mysql_fetch_assoc($qL)){
								?>
                            	<li><a href="?m=sanpham&idLoai=<?php echo $dataL['idLoai']?>"><?php echo $dataL['TenLoai'];?></a></li>
                                <?php
									}
								?>
                            </ul>
                        </li>
                        <?php
							}
						?>
                    </ul>
                </li>
                <li><a href="?m=lienhe" title="Liên hệ công ty">Liên hệ</a></li>
                <li><a href="?m=gioithieu" class="last" title="Giới thiêu công ty">Giới thiệu</a></li>
            </ul>
            <div id="searchBox">
                <!-- google search goes here-->
                
                    <input type="text" onkeypress="if(event.keyCode==13) window.location='?m=sanpham_timkiem&kwSearch='+this.value" name="kwSearch" id="kwSearch" value="<?php echo $_REQUEST['kwSearch'];?>" placeholder="Tên sản phẩm tìm kiếm" />
                    <label class="label bold">
                    	<a onclick="window.location='?m=sanpham_timkiem&kwSearch='+document.getElementById('kwSearch').value" href="javascript:void(1);" title="Tìm kiếm kết quả">Tìm kiếm</a>
                    </label>
                
            </div><!-- end searchBox -->
        </div><!--End div menu-->
        <div class="clear">&nbsp;</div>
        <div id="left" class="left">
            <?php
				include('modules/sanpham_hangsanxuat.php');
				include('modules/sanpham_timkiem_menu.php');
				include('modules/giohang_menu.php');
				include('modules/sanpham_noibat.php');
				include('modules/hotrotructuyen.php');
            	include('modules/thongkeluottruy.php');
				include('modules/binhchon.php');
			?>
        </div><!-- end left -->
        <div id="content" class="left">
        	<div class="crumb clear">
                <ul>
                    <li class="left"><a href="#" class="last_left">Trang chu</a></li>
                    <li class="left"><a href="#">Trang chu</a></li>
                    <li class="left"><a href="#">Trang chu</a></li>
                </ul>
            </div>
            <div id="col1">
            	<?php
					if($mod == '')$mod='trangchu';
                	include("modules/$mod.php");
				?>
            </div><!-- end col1 -->
        </div><!-- end content -->
        
    </div><!-- end wrapper -->
    <div class="clear"></div>
    <div id="footer" class="clear">
    	<div class="footer">
        	<div id="fb-root"></div>
			<div class="fb-like left" data-href="https://www.facebook.com/idevietnam" data-width="200" data-show-faces="true" data-send="true"></div>
        <div class="left">
        	<ul>
            	<li><a href="?m=trangchu">Trang chủ</a></li>
                <li><a href="?m=lienhe">Liên hệ</a></li>
                <li class="last"><a href="?m=gioithieu">Giới thiệu</a></li>
            </ul>
        </div>
        <div class="right nd_footer">
        	<p><span class="heading">Content footer</span></p>
        </div>
        </div>
    </div><!-- end Footer -->
</body>
</html>