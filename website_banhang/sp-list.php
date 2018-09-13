<?php
require './libs/sp.php';
$sp = get_all_sp();
disconnect_db();
?>
<?php session_start(); ?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Danh sách sản phẩm</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="webbanhang/style/style1.css" />
        <script language="javascript" src="webbanhang/script/script.js"></script>
    </head>
    <body>
		<div class="topav">
        <a href="index.php">trang chu</a>
        <a href="webbanhang/page1.html">ve chung toi</a>
		<a href="user-list.php">nguoi dung</a> 
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

        <h1>Danh sách sản phẩm</h1>
        <a href="sp-add.php">Thêm sản phẩm</a> <br/> <br/>
        <table width="100%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>id</td>
                <td>ten</td>
                <td>hang</td>
                <td>soluong</td>
                <td>damua</td>
				<td>daban</td>
				<td>img</td>
				<td>gia</td>
            </tr>
            <?php foreach ($sp as $item){ ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['ten']; ?></td>
                <td><?php echo $item['hang']; ?></td>
                <td><?php echo $item['soluong']; ?></td>
				<td><?php echo $item['damua']; ?></td>
				<td><?php echo $item['daban']; ?></td>
				<td><?php echo $item['img']; ?></td>
				<td><?php echo $item['gia']; ?></td>
                <td>
                    <form method="post" action="sp-delete.php">
                        <input onclick="window.location = 'sp-edit.php?id=<?php echo $item['id']; ?>'" type="button" value="Sửa"/>
                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>"/>
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa"/>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table><br /><br /><br />
		
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