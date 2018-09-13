<?php
 
require './libs/sp.php';
 
if (!empty($_POST['add_sp']))
{
	$data['id']         = isset($_POST['id']) ? $_POST['id'] : '';
    $data['ten']        = isset($_POST['ten']) ? $_POST['ten'] : '';
    $data['hang']       = isset($_POST['hang']) ? $_POST['hang'] : '';
    $data['soluong']    = isset($_POST['soluong']) ? $_POST['soluong'] : '';
	$data['damua']      = isset($_POST['damua']) ? $_POST['damua'] : '';
	$data['daban']      = isset($_POST['daban']) ? $_POST['daban'] : '';
    $data['img']        = isset($_POST['img']) ? $_POST['img'] : '';
	$data['gia']        = isset($_POST['gia']) ? $_POST['gia'] : '';
     
    $errors = array();
    if (empty($data['ten'])){
        $errors['ten'] = 'Chưa nhập tên ';
    }
     
    if (empty($data['hang'])){
        $errors['hang'] = 'Chưa nhập hang';
    }
     
    if (!$errors){
        add_sp($data['id'], $data['ten'], $data['hang'], $data['soluong'], $data['damua'], $data['daban'], $data['img'], $data['gia']);
        header("location: sp-list.php");
    }
}
 
disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Thêm san pham</title>
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
		
        <h1>Thêm san pham</h1>
        <a href="sp-list.php">Trở về</a> <br/> <br/>
        <form method="post" action="sp-add.php">
            <table width="50%" border="1" cellspacing="0" cellpadding="10">
			    <tr>
                    <td>id</td>
                    <td>
                        <input type="text" name="id" value="<?php echo !empty($data['id']) ? $data['id'] : ''; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>ten</td>
                    <td>
                        <input type="text" name="ten" value="<?php echo !empty($data['ten']) ? $data['ten'] : ''; ?>"/>
                        <?php if (!empty($errors['ten'])) echo $errors['ten']; ?>
                    </td>
                </tr>
                <tr>
                    <td>hang</td>
                    <td>
                        <input type="text" name="hang" value="<?php echo !empty($data['hang']) ? $data['hang'] : ''; ?>"/>
                        <?php if (!empty($errors['hang'])) echo $errors['hang']; ?>
                    </td>
                </tr>
                <tr>
                    <td>so luong</td>
                    <td>
                        <input type="text" name="soluong" value="<?php echo !empty($data['soluong']) ? $data['soluong'] : ''; ?>"/>
                    </td>
                </tr>
				<tr>
                    <td>da mua</td>
                    <td>
                        <input type="text" name="damua" value="<?php echo !empty($data['damua']) ? $data['damua'] : ''; ?>"/>
						<?php if (!empty($errors['damua'])) echo $errors['damua']; ?>
                    </td>
                </tr>
				<tr>
                    <td>da ban</td>
                    <td>
                        <input type="text" name="daban" value="<?php echo !empty($data['daban']) ? $data['daban'] : ''; ?>"/>
                    </td>
                </tr>
				<tr>
                    <td>img</td>
                    <td>
                        <input type="text" name="img" value="<?php echo !empty($data['img']) ? $data['img'] : ''; ?>"/>
                    </td>
                </tr>
				<tr>
                    <td>gia</td>
                    <td>
                        <input type="text" name="gia" value="<?php echo !empty($data['gia']) ? $data['gia'] : ''; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="add_sp" value="Lưu"/>
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