<?php 

session_start();

if (isset($_REQUEST['dangnhap'])) 
        {
            $username = $_POST['txtUsername'];
			$password = $_POST['txtPassword'];
 
            if (empty($username)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                $query = "select * from tb_user where username like '$username'";
 
                $conn= mysqli_connect("localhost", "root", "", "qluser");
 
                $sql = mysqli_query($conn,$query);
				
				$num = mysqli_num_rows($sql);
				
				$row = mysqli_fetch_assoc($sql);
				
				if ($num == 0) {
					echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
					exit;
				}
				
				if ($password != $row['password']) {
					echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
					exit;
				}
				
				$_SESSION['username'] = $username;
				
				echo "Xin chào " . $username . ". Bạn đã đăng nhập thành công. ";
				
				if ($row['level'] == '1') {
					echo "<a href='user-edit.php'>quan ly nguoi dung</a>";
				    die();
					mysqli_close($conn);
				}
				else{
				echo "<a href='index.php'>Về trang chủ</a>";
				die();

                mysqli_close($conn);
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
		</div>
		</div>
		<div style="background-color:green;">
        <img src="webbanhang/image/1.jpg" height="300px" width="1285px" />
		</div>
		
        <form action="dangnhap.php?do=login" method="POST">
            <table cellpadding="0" cellspacing="0" border="1">
                <tr>
                    <td>
                        Tên đăng nhập :
                    </td>
                    <td>
                        <input type="text" name="txtUsername" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Mật khẩu :
                    </td>
                    <td>
                        <input type="password" name="txtPassword" />
                    </td>
                </tr>
            </table>
            <input type="submit" name="dangnhap" value="Đăng nhập" />
            <a href="dangky.php" title="Đăng ký">Đăng ký</a>
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