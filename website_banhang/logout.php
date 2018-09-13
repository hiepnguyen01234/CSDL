<?php session_start(); 
 
if (isset($_SESSION['username'])){
    unset($_SESSION['username']); 
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>logout</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="webbanhang/style/style1.css" />
        <script language="javascript" src="webbanhang/script/script.js"></script>
    </head>
	<body>
<div class="topav">
        <a href="index.php">trang chu</a>
</div>
</div>
		<div style="background-color:green;">
        <img src="webbanhang/image/1.jpg" height="300px" width="1285px" />
		</div>
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
<!-- <a href="index.php">HOME</a> -->