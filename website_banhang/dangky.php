<?php

header('Content-Type: text/html; charset=utf-8');
  
if (isset($_POST['do-register']))
{

    $username   = isset($_POST['username']) ? ($_POST['username']) : '';
    $password   = isset($_POST['password']) ? ($_POST['password']) : '';
    $email      = isset($_POST['email'])    ? ($_POST['email']) : '';
	$address    = isset($_POST['address'])  ? ($_POST['address']) : '';
    $phone      = isset($_POST['phone'])    ? ($_POST['phone']) : '';
    $level      = isset($_POST['level'])    ? (int)$_POST['level'] : '';
      

    $conn = mysqli_connect('localhost', 'root', '', 'qluser') or die ('Lỗi kết nối');
    mysqli_set_charset($conn, "utf8");
      

    $sql = "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'";
      
    $result = mysqli_query($conn, $sql);
      
    if (mysqli_num_rows($result) > 0)
    {
        echo '<script language="javascript">alert("Thông tin đăng nhập bị sai"); window.location="dangky.php";</script>';
          
        die ();
    }
    else {
        $sql = "INSERT INTO tb_user (username, password, email,address, phone, level) VALUES ('$username','$password','$email','$address','$phone', '$level')";
          
        if (mysqli_query($conn, $sql)){
            echo '<script language="javascript">alert("Đăng ký thành công"); window.location="dangky.php";</script>';
        }
        else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="dangky.php";</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="webbanhang/style/style1.css" />
        <script language="javascript" src="webbanhang/script/script.js"></script>
    </head>
    <body>
	<div class="topav">
        <a href="index.php">trang chu</a>
        <a href="webbanhang/page1.html">ve chung toi</a>
    </div>
	</div>
		<div style="background-color:green;">
        <img src="webbanhang/image/1.jpg" height="300px" width="1285px" />
		</div>
	
        <form method="post" action="dangky.php">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value=""/></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password" value=""/></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value=""/></td>
                </tr>
				<tr>
                    <td>Adress</td>
                    <td><input type="text" name="address" value=""/></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone" value=""/></td>
                </tr>
                <tr>
                    <td>Level</td>
                    <td>
                        <select name="level">
                            <option value="0">Thành Viên</option>
                            <option value="1">Admin</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="do-register" value="Đăng Ký"/></td>
                </tr>
            </table>
        </form><br /><br /><br />
		
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