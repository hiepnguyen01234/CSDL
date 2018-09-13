<title>Quản trị website</title>
<!----------------------------------------------------------------------------------đơn hàng mới-->
<div id="newCart">
	<ul class="newCartList">
    	<li class="title">Đơn hàng mới</li>
        <li class="stt">STT</li>
        <li class="name" style="text-align:center">Tên người nhận</li>
        <li class="gia" style="text-align:center">Ngày đặt</li>
        <li class="qty">Ngày nhận</li>
        <li class="total" style="text-align:center">Thành tiền</li>        
    </ul>
    <?php
    	$sql = "SELECT `NgayGiaoHang`,`ThoiGianDat`,`TenNguoiNhan`,`idDH` FROM `cms_donhang` as dh
				WHERE `TinhTrang` =1 order by `idDH` DESC";
		$q = mysql_query($sql);
		$dem=0;
		while($data = mysql_fetch_assoc($q)){
			$dem++;
			$idDH = $data['idDH'];
	?>
	<ul class="newCartList">
    	<a href="?m=donhang_thongtin&idDH=<?php echo $data['idDH']?>&act=1" class="<?php if($dem%2!=0) echo 'gray';?>">
            <li class="stt "><?php echo $dem;?></li>
            <li class="name"><?php echo $data['TenNguoiNhan'];?></li>
            <li class="gia" style="text-align:center;"><?php echo date('d-m-y',strtotime($data['ThoiGianDat']))?></li>
            <li class="qty"><?php echo date('d-m-y',strtotime($data['NgayGiaoHang']));?></li>
            <li class="total" style="text-align:right;">
				<?php
					  $sqlTT = "SELECT sum(`SoLuong`*`Gia`) as `tongtien`  FROM `cms_donhang_chitiet` WHERE `idDH` =".$idDH;
					  $qTT = mysql_query($sqlTT);
					  $dataTT = mysql_fetch_assoc($qTT);
					  echo number_format($dataTT['tongtien'],0,'.',',');
				  ?>
            </li>        
        </a>
    </ul>
    <?php
		}
	?>
</div>
<!----------------------------------------------------------------------------------Liên hệ mới-->
<div id="newLH">
	<ul class="newLHList">
    	<li class="title">Liên hệ mới</li>
        <li class="stt">STT</li>
        <li class="nameCT" style="text-align:center">Tên công ty</li>
        <li class="phone" style="text-align:center">Điện thoại</li>    
    </ul>
    <?php
    	$sql = "SELECT `CongTy`,`DienThoai` FROM `cms_lienhe` WHERE `XacNhan` =0 ";
		$q = mysql_query($sql);
		$dem=0;
		while($data = mysql_fetch_assoc($q)){
			$dem++;
	?>
    <ul class="newLHList">
    	<a href="#" class="<?php if($dem%2!=0) echo 'gray';?>">
            <li class="stt"><?php echo $dem?></li>
            <li class="nameCT"><?php echo $data['CongTy']?></li>
            <li class="phone"><?php echo $data['DienThoai']?></li>  
        </a>
    </ul>
    <?php
		}
	?>
</div>