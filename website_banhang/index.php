<?php
require './libs/sp.php';
$sp = get_all_sp();
disconnect_db();
?>
 
 <?php session_start(); ?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Danh sách san pham</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="webbanhang/style/style1.css" />
        <script language="javascript" src="webbanhang/script/script.js"></script>
    </head>
    <body>
		<div class="topav">
        <a href="index.php">trang chu</a>
        <a href="webbanhang/page1.html">ve chung toi</a>
        <!-- <a href="webbanhang/page2.html">san pham thong dung</a> -->
		<?php 
       if (isset($_SESSION['username']) && $_SESSION['username']){
		echo '<a href="logout.php">Logout</a>';
	   }
	   else{
        echo '<a href="dangnhap.php">dang nhap</a>';
	   }
	   ?>
        </div>
		<div style="background-color:green;">
        <img src="webbanhang/image/1.jpg" height="300px" width="1285px" />
		</div>
		
		
		<?php 
       if (isset($_SESSION['username']) && $_SESSION['username']){
           echo 'Bạn đã đăng nhập với tên là '.$_SESSION['username']."<br/>";
           // echo 'Click vào đây để <a href="logout.php">Logout</a>';
       }
       else{
           echo 'Bạn chưa đăng nhập';
       }
       ?>
	   

        <h1>danh sách sản phẩm</h1>
		
		<div class="box1">
		<?php foreach($sp as $item) { ?>
		
		<div class="box2">
		<div class="class1">		
	    <img src="image/1.jpg" style="height:200px; width:300px;" />
		</div>
		
		<p>tên sản phẩm : <?php echo $item['ten'] ;?> </p>
		<P>hãng sản phẩm: <?php echo $item['hang'] ; ?> </p>
		<p>giá sản phẩm: <?php echo $item['gia'] ; ?> vnd</p>
		<form method="post" action="sp-dat.php">		
		    <input onclick="window.location = 'sp-dat.php?id=<?php echo $item['id']; ?>'" type="button" value="dat mua"/>
		
            <!-- <input type="hidden" name="id" value="<?php echo $item['id']; ?>"/>
            <input onclick="return confirm('Bạn có chắc muốn mua không?');" type="submit" name="dat" value="đặt mua"/> -->
        </form><br /><hr />
		</div>
		
		<?php } ?>
		</div><br /><br /><br />
		
		<div style="background-color:black; color:white;">
		<strong > hello world </strong>
		<div style="background-color:#ddd; color:#333; font-size:25;">
		<p>copyright by nhom thuc hanh co so du lieu<br />
		san pham cua website ban hang gi do ma lai<br />
		so dien thoai lien he:03892347819<br />
		<p>
		</div>
		</div>
    </body>
</html>