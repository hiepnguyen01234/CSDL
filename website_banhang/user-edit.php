<?php
 
require './libs/users.php';
 
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($id){
    $data = get_user($id);
}
 
if (!$data){
   header("location: user-list.php");
}
 
if (!empty($_POST['edit_user']))
{
    $data['username']        = isset($_POST['name']) ? $_POST['name'] : '';
    $data['password']         = isset($_POST['password']) ? $_POST['password'] : '';
    $data['email']    = isset($_POST['email']) ? $_POST['email'] : '';
	$data['address']    = isset($_POST['address']) ? $_POST['address'] : '';
	$data['phone']    = isset($_POST['phone']) ? $_POST['phone'] : '';
    $data['level']    = isset($_POST['level']) ? $_POST['level'] : '';
    $data['id']          = isset($_POST['id']) ? $_POST['id'] : '';
     
    $errors = array();
    if (empty($data['username'])){
        $errors['username'] = 'Chưa nhập tên';
    }
     
    if (empty($data['password'])){
        $errors['password'] = 'Chưa nhập mật khẩu';
    }
     
    if (!$errors){
        edit_user($data['id'], $data['username'], $data['password'], $data['email'], $data['address'], $data['phone'], $data['level']);
        header("location: user-list.php");
    }
}
 
disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Thêm user</title>
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
	   
	   
        <h1>Thêm user </h1>
        <a href="user-list.php">Trở về</a> <br/> <br/>
        <form method="post" action="user-edit.php?id=<?php echo $data['id']; ?>">
            <table width="50%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="name" value="<?php echo $data['username']; ?>"/>
                        <?php if (!empty($errors['sv_name'])) echo $errors['sv_name']; ?>
                    </td>
                </tr>
                <tr>
                    <td>level</td>
                    <td>
                        <select name="level">
                            <option value="1">1</option>
                            <option value="0" <?php if ($data['id'] == '0') echo 'selected'; ?>>0</option>
                        </select>
                        <?php if (!empty($errors['level'])) echo $errors['level']; ?>
                    </td>
                </tr>
                <tr>
                    <td>password</td>
                    <td>
                        <input type="text" name="password" value="<?php echo $data['password']; ?>"/>
                    </td>
                </tr>
				<tr>
                    <td>email</td>
                    <td>
                        <input type="email" name="email" value="<?php echo $data['email']; ?>"/>
						<?php if (!empty($errors['email'])) echo $errors['email']; ?>
                    </td>
                </tr>
				<tr>
                    <td>address</td>
                    <td>
                        <input type="text" name="address" value="<?php echo $data['address']; ?>"/>
                    </td>
                </tr>
				<tr>
                    <td>phone</td>
                    <td>
                        <input type="text" name="phone" value="<?php echo $data['phone']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>
                        <input type="submit" name="edit_user" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
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