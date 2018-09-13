<?php
 
require './libs/sp.php';
 
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($id){
    $data = get_sp($id);
}
 
if (!$data){
   header("location: index.php");
}
 
if (!empty($_POST['dat_sp']))
{
	$data['username']   = isset($_POST['username']) ? $_POST['username'] : '';
    $data['address']    = isset($_POST['address']) ? $_POST['address'] : '';
    $data['ten']        = isset($_POST['ten']) ? $_POST['ten'] : '';
    $data['hang']       = isset($_POST['hang']) ? $_POST['hang'] : '';
    $data['id']         = isset($_POST['id']) ? $_POST['id'] : '';
     
    $errors = array();
    if (empty($data['username'])){
        $errors['username'] = 'Chưa nhập tên';
    }
     
    if (empty($data['address'])){
        $errors['address'] = 'Chưa nhập hang';
    }
     
    if (!$errors){
        edit_dat($data['username'], $data['address'], $data['id'], $data['ten'], $data['hang']);
        header("location: index.php");
    }
}
 
disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>dat san pham</title>
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
		
        <h1>dat san pham</h1>
        <form method="post" action="sp-dat.php?id=<?php echo $data['id']; ?>">
            <table width="50%" border="1" cellspacing="0" cellpadding="10">
			    <tr>
                    <td>username</td>
                    <td>
                        <input type="text" name="username" value="<?php echo !empty($data['username']) ? $data['username'] : ''; ?>"/>
                        <?php if (!empty($errors['username'])) echo $errors['username']; ?>
                    </td>
                </tr>
                <tr>
                    <td>address</td>
                    <td>
                        <input type="text" name="address" value="<?php echo !empty($data['address']) ? $data['address'] : ''; ?>"/>
                        <?php if (!empty($errors['address'])) echo $errors['address']; ?>
                    </td>
                </tr>
			    <tr>
                    <td>id</td>
                    <td>
                        <input type="text" name="id" value="<?php echo $data['id']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>ten</td>
                    <td>
                        <input type="text" name="ten" value="<?php echo $data['ten']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>hang</td>
                    <td>
                        <input type="text" name="hang" value="<?php echo $data['hang']; ?>"/>
                    </td>
                </tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>
                        <input type="submit" name="dat_sp" value="dat mua"/>
                    </td>
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






<?php
/*
require './libs/sp.php';

$id=isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($id) {
   dat_sp($id);
}

header("location: index.php");*/
?>