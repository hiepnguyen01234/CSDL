<?php
	session_start();
	ob_start();
	include("../../libs/config.php");
	for($i=1;$i<3000000;$i++)sqrt(1);
	$idLoai = round($_GET['idLoai']);
	
?>

<tr style="background-color:#0CF; font-weight:bold; text-align:center;">
        <td width="31">STT</td>
        <td width="132">Tên sản phẩm</td>
        <td width="50">Giá /VNĐ</td>
        <td width="344">Mô tả</td>
        <td width="40">Số lượng</td>
        <td width="80">Hình ảnh</td>
        <td width="50">Ẩn / Hiện</td>
        <td width="100">Hãng</td>
        <td width="50">Công cụ </td>
      </tr>
      
        <?php
            $sql = "SELECT * FROM  `cms_sanpham` where `idLoai`= '".$idLoai."' ORDER BY  `idSP` DESC LIMIT 0 , 10";
            $q = mysql_query($sql);
            $stt = 1;
            while($data=mysql_fetch_assoc($q)){
        ?>
       <tr class="<?php if($stt%2!=1) echo 'gray1';?> center hover">
        <td><?php echo $stt++?></td>
        <td align="left"><a href=""><?php echo $data['TenSP'];?></a></td>
        <td align="right"><?php echo number_format($data['Gia'],0,',','.');?></td>
        <td align="left";>
        	<div style="height:150px; overflow:auto;">
            	<?php echo $data['MoTa'];?>
            </div>
        </td>
        <td><?php echo $data['TonKho'];?></td>
        <td align="center">&nbsp;<img src="images/sanpham/<?php echo $data['UrlHinh'];?>" width="80px" alt="Hình sản phẩm" /></td>
        <td><?php if($data['AnHien']==1) echo 'Hiện'; else echo 'Ẩn';?></td>
        <td>
        	<?php
            	$sqlHSX = "select `TenHang` from `cms_sanpham_hangsanxuat` where `idHSX` = ".$data['idHSX'];
				$qHSX = mysql_query($sqlHSX);
				$dataHSX = mysql_fetch_assoc($qHSX);
				echo $dataHSX['TenHang'];
			?>
        </td>
        <td>
        	<a href="?m=sanpham_xuly&act=1&idSP=<?php echo $data['idSP']?>" ><img src="images/Edit_16x16.png" alt="edit" /></a>&nbsp;
         	<a href="?m=sanpham&act=2&idLoai=<?php echo $idLoai?>&idSP=<?php echo $data['idSP']?>" onclick="return confirm('<?php echo $_SESSION['HoTenQT']?>\nBạn chắc là có muốn xóa sản phẩm này không?');"><img src="images/Delete_16x16.png" alt="xoa" /></a>
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