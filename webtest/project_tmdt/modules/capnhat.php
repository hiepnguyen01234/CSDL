<?php
	$Email = $_SESSION['Email'];
	if(!isset($Email)){
		header('location: ?m=dangnhap&chuyenhuong=capnhat');
		exit();
	}
?>
<title>Cập nhật tài khoản</title>
<style>
.shoppingcart_me ul,li{
	padding-top:3px !important;
	height:20px !important;
}
ul.forms li.txt{width:90px !important;}
ul.forms li.inputfield label{width:210px !important; line-height:20px; }
div.table{width:360px; height:320px; float:left
}
#apImg {
	position: absolute;
	left: 880px;
	top: 300px;
	width: 130px;
	height: 150px;
	z-index: 1;
}
.shoppingcart ul li.title{width:200px;}
.shoppingcart ul li.price{width:110px;}
.hover:hover{cursor:pointer; background-color: #B3BDDF;}
</style>
  <div id="apImg"><img src="images/support-icon.png" width="130" alt="Avatar" /></div>
  <div class="clear"></div>
    <div class="col_min">
        <h1 class="heading title">Cập nhật tài khoản</h1>
        <div id="table" style="width:100%; display:inline-block; height:auto;">
        <h3 class="heading" style="text-align:right;font-size:13px; border-bottom: 1px dashed #999999 !important ;"><?php echo $_SESSION['HoTen'];?></h3>
      <?php
      	$sql = "select `DienThoai`,`DiaChi`,`NgaySinh`,`GioiTinh`,`CMND`
				from `cms_quantri_nguoidung`
				where `Email`='$Email'";
		$q = mysql_query($sql);
		$data = mysql_fetch_assoc($q);
	  ?>
      <form action="" method="post" id="formLH">
        <div id="table" style="width:500px; height:330px;">
              <h3 class="heading">Thông tin cá nhân</h3>
              <ul class="forms">
                  <li class="txt">Địa chỉ mail <span class="req"></span></li>
                  <li class="inputfield"><label id="Email"><?php echo $_SESSION['Email']?></label></li>
              </ul>              
              <ul class="forms">
                  <li class="txt">Số điện thoại <span class="req"></span></li>
                  <li class="inputfield"><label id="DienThoai"><?php echo $data['DienThoai'];?></label></li>
              </ul>
              <ul class="forms">
                  <li class="txt">Ngày sinh <span class="req"></span></li>
                  <li class="inputfield"><label id="NgaySinh"><?php if($data['NgaySinh']==0) echo 'Cập nhật...'; else echo date('d-m-Y',strtotime($data['NgaySinh']));?></label></li>
              </ul>
              <ul class="forms">
                  <li class="txt">Giới tính <span class="req"></span></li>
                  <li class="inputfield"><label id="GioiTinh"><?php if($data['GioiTinh']==2)echo 'Cập nhật...';elseif($data['GioiTinh']==1) echo 'Nam'; else echo 'Nữ';?></label></li>
              </ul>
              <ul class="forms">
                  <li class="txt">CMND <span class="req"></span></li>
                  <li class="inputfield"><label id="CMND"><?php if($data['CMND']==0) echo 'Cập nhật...'; else echo $data['CMND'];?></label></li>
              </ul>
              <ul class="forms">
                  <li class="txt">Địa chỉ <span class="req"></span></li>
                  <li class="inputfield">
                    <label id="DiaChi"><?php echo $data['DiaChi'];?></label>
                  </li>
              </ul>
            <div class="clear">&nbsp;</div><div class="clear">&nbsp;</div>
            <div class="clear">&nbsp;</div>
            <ul class="forms">
              <li class="txt">&nbsp;<input type="submit" id="submitLH" class="none" /></li>
                  <li><label class="button bold right"><a href="?m=capnhat_xuly&act=1" >&nbsp;&nbsp;Cập nhật thông tin&nbsp;&nbsp;</a></label></li>
                  <li><label class="button bold right"><a href="?m=capnhat_xuly&act=2" >&nbsp;&nbsp;Thay đổi Mật khẩu&nbsp;&nbsp;</a></label></li>
          </ul>
        </div>
          </form>
      
        <h3 class="heading" style="text-align:left; font-size:13px; border-bottom: 1px dashed #999999 !important ;">Lịch sử đơn đặt hàng</h3>
            <div class="shoppingcart shoppingcart_me">
            <ul class="tablehead">
                <li class="qty colr">STT</li>
                <li class="title colr">Người nhận</li>
                <li class="price colr">Ngày đặt hàng</li>
                <li class="price colr">Tổng số tiền /VNĐ</li>
                <li class="total colr">Trạng thái</li>
                <li class="total colr">Xem/Sửa</li>
            </ul>
            <?php 
				$sql = "select `TenNguoiNhan`,`ThoiGianDat`,`idDH`,`TinhTrang` from `cms_donhang` 
						where `idNguoiDung` = '".$_SESSION['idNguoiDung']."' order by `idDH` DESC";
				$q = mysql_query($sql);
				$dem = 0;
				while($data = mysql_fetch_assoc($q)){
					$dem++;
					$idDH = $data['idDH'];
			?>
            <ul class="cartlist shoppingcart_me hover <?php if($dem%2!=0) echo 'gray'; ?>">
                <li class="qty txt"><?php echo $dem?></li>
                <li class="title txt" style="color:black;"><?php echo $data['TenNguoiNhan'];?></li>
                <li class="price txt"><?php echo date('d/m/Y', strtotime($data['ThoiGianDat']));?></li>
                
              <li class="price txt" style="text-align:right">
                	<?php
						$sqlTT = "SELECT sum(`SoLuong`*`Gia`) as `tongtien`  FROM `cms_donhang_chitiet` WHERE `idDH` =".$idDH;
						$qTT = mysql_query($sqlTT);
						$dataTT = mysql_fetch_assoc($qTT);
						echo number_format($dataTT['tongtien'],0,'.',',');
					?>
                </li>
                
              <li class="total txt"><?php echo $TinhTrang[$data['TinhTrang']];?></li>
                <li class="total txt">
                	<?php if($data['TinhTrang']==1){?>
							<a href="?m=donhang_xuly&idDH=<?php echo $idDH?>" class="colr">Sửa </a>/
					<?php }?>
                          <a href="?m=donhang_xem&idDH=<?php echo $idDH?>" class="colr"> Xem</a>
                </li>                
            </ul>
            <?php
				}
			?>
            <div class="clear">&nbsp;</div>
          </div>
      </div>
  </div><!-- end col_min -->
  <div class="clear"></div>
