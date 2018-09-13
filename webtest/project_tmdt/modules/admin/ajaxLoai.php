<?php
	session_start();
	ob_start();
	include("../../libs/config.php");
	for($i=1;$i<3000000;$i++)sqrt(1);
	$idCL = round($_GET['idCL']);
?>
<tr style="background-color:#0CF; font-weight:bold; text-align:center;">
  <td width="40">STT</td>
  <td width="369">Tên chủng loại</td>
  <td width="150">Thứ tự</td>
  <td width="179">Ẩn Hiện</td>
  <td width="202">Công cụ </td>
</tr>
<?php
	$sql = "SELECT * FROM `cms_sanpham_loai` where `idCL`=".$idCL." ORDER BY `idLoai` DESC";
	$q = mysql_query($sql);
	$stt = 1;
	while($data=mysql_fetch_assoc($q)){
?>
<tr class="<?php if($stt%2!=1) echo 'gray1';?> center hover">
    <td>&nbsp;<?php echo $stt++?></td>
    <td align="left">&nbsp;<a href=""><?php echo $data['TenLoai'];?></a></td>
    <td>&nbsp;<?php echo $data['ThuTu'];?></td>
    <td>&nbsp;<?php if($data['AnHien']==1) echo 'Hiện'; else echo 'Ẩn';?></td>
    <td>&nbsp;
        <a href="?m=sp_loai_xuly&act=1&idLoai=<?php echo $data['idLoai']?>" ><img src="images/Edit_16x16.png" alt="Sửa" /></a>&nbsp;
        <a href="?m=sp_loai&act=2&idLoai=<?php echo $data['idLoai']?>" onclick="return confirm('<?php echo $_SESSION['HoTenQT']?>\nBạn chắc là có muốn xóa loại sản phẩm này không? \nThao tác này sẽ xóa đi tất cả các sản phẩm thuộc loại này. \nBạn chắc chứ????');"><img src="images/Delete_16x16.png" alt="Xóa" /></a>
    </td>
</tr>
<?php
    }
?>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>