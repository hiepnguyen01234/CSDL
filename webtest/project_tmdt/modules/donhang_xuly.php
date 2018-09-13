<style>
ul.forms li.txt{width:90px !important;}
ul.forms li.inputfield label{width:210px !important; line-height:20px;}
div.table{width:360px; height:320px; float:left
}
</style>
<title>Thanh toán</title>
<?php
	//$cart = array(1=>'nokia', 'samsung','apple','LG','HTC');
	$cart = $_SESSION['cart'];
	$Email = $_SESSION['Email'];
	$idDH = $_GET['idDH'];
	if(isset($_POST['Email'])){
		if($_POST['MatMa'] == $_SESSION['MatMa']){
			$HoTenNN = mysql_escape_string($_POST['HoTen']);
			$Email = mysql_escape_string($_POST['Email']);
			$DienThoai = mysql_escape_string($_POST['DienThoai']);
			$NgayNhan = mysql_escape_string(convertDate($_POST['NgayNhan']));
			$DiaChi = mysql_escape_string($_POST['DiaChi']);
			$GhiChu = mysql_escape_string($_POST['GhiChu']);
			$idNguoiDung = mysql_escape_string($_SESSION['idNguoiDung']);
			if(is_numeric($DienThoai)){
				if($DiaChi!=''){
					$sql = "insert into `cms_donhang` values 
							('','$idNguoiDung',now(),'$HoTenNN','$DiaChi','$NgayNhan','$Email','$DienThoai','$GhiChu','1')";
					//echo $sql;
					$qDHCT = mysql_query($sql);			
		
					$idDH = mysql_insert_id();
					foreach($cart as $k => $v){
						$sql = 'select `Gia` from `cms_sanpham` where `idSP`='.$k;
						$q = mysql_query($sql);
						$data = mysql_fetch_assoc($q);
						$gia = $data['Gia'];
						
						$sql = "insert into `cms_donhang_chitiet` values ('$idDH','$k','$v','$gia')";
						$qDH = mysql_query($sql);//insert vao don hang chi tiet		
					}
					if($qDH and $qDHCT){
						echo '<script>alert("Bạn đã thanh toán thành công!");window.location="?m=capnhat";</script>';
						unset($_SESSION['cart']);
					}
				}else{
					echo '<script>
						alert("Mã bảo mật chưa đúng. Xin nhập lại!");
						document.getElementById("DiaChi").focus();
						</script>';
				}//end if else Dia chi co gia tri
			}else{
				echo '<script>
						alert("Mã bảo mật chưa đúng. Xin nhập lại!");
						document.getElementById("DienThoai").focus();
						</script>';
			}//end if else is_numeric Dien thoai
		}else{
			echo '<script>alert("Mã bảo mật chưa đúng. Xin nhập lại!");document.getElementById("MatMa").focus();</script>';
		}//end if else mat ma
	}//end if else isset Email
?>
  <div class="clear"></div>
    <div class="col_min">
        <h1 class="heading title">Thanh toán</h1>
        
      <div id="table" style="width:100%; display:inline-block; height:auto;">
        <h3 class="heading">Thanh toán giỏ hàng</h3>
        <div class="shoppingcart">
            <ul class="tablehead">
                <li class="qty colr">STT</li>
                <li class="title colr">Tên sản phẩm</li>
                <li class="thumb colr">&nbsp;</li>
                <li class="price colr">Giá</li>
                <li class="qty colr">Số lượng</li>
                <li class="total colr">Thành tiền</li>
                <li class="remove colr"></li>
            </ul>
            <?php
				$sql = "SELECT dhct.`idSP`, dhct.`SoLuong` , dhct.`Gia` , sp.`UrlHinh` , sp.`TenSP` 
						FROM `cms_donhang_chitiet` AS dhct, `cms_sanpham` AS sp
						WHERE sp.`idSP` = dhct.`idSP`
						AND dhct.`idDH` =".$idDH;
				$query = mysql_query($sql);
				$stt=0;
				$sum=0;
				while($data = mysql_fetch_assoc($query)){
					$stt++;
					$k = $data['idSP'];
					$v = $data['SoLuong'];	
			?>
            <ul class="cartlist <?php if($stt%2!=0) echo 'gray'?>">
                <li class="qty txt"><?php echo $stt;?></li>
                <li class="title txt"><a href="?m=sanpham_chitiet&idSP=<?php echo $k;?>"><?php echo $data['TenSP']?></a></li>
                <li class="thumb">
                	<a href="?m=sanpham_chitiet&idSP=<?php echo $k;?>">
                		<img src="images/sanpham/<?php echo $data['UrlHinh'];?>" alt="<?php echo $data['TenSP']?>" />
					</a>
                </li>
                <li class="price txt"><?php echo number_format($data['Gia'],0,',','.');?></li>
                <li class="qty txt"><label><?php echo $v?></label></li>
                <li class="total txt"><?php echo number_format($data['Gia']*$v,0,',','.'); $sum +=($data['Gia']*$v)?></li>
                <li class="remove txt">
                   
                </li>
            </ul>
            <?php
				}
			?>
            <div class="subtotal">
                <span class="colr bold">Tổng tiền: </span>
                <span class="colr bold"><?php echo number_format($sum,0,',','.')?> VNĐ</span>
            </div>
            <div class="clear">&nbsp;</div>
          </div>
      </div>
      
  </div><!-- end col_min -->
  <div class="col_min">
          <h1 class="heading title"  style="text-align:right;">Thông tin giao hàng</h1>
          <?php
          	$sql = "SELECT `DiaChi`,`DienThoai` FROM `cms_quantri_nguoidung` WHERE `Email` = '$Email'";
			$q = mysql_query($sql);
			$data = mysql_fetch_assoc($q);
		  ?>
        <div id="table" style="width:360px; float:left; margin-right:5px; height:360px;">
              <h3 class="heading" style="text-align:center;">Thông tin người đặt hàng</h3>
              <ul class="forms">
                  <li class="txt">Họ và tên <span class="req"></span></li>
                  <li class="inputfield"><label id="HoTenDH"><?php echo $_SESSION['HoTen']?></label></li>
              </ul>
              
              <ul class="forms">
                  <li class="txt">Địa chỉ mail <span class="req"></span></li>
                  <li class="inputfield"><label id="EmailDH"><?php echo $Email?></label></li>
              </ul>
              <ul class="forms">
                  <li class="txt">Số điện thoại <span class="req"></span></li>
                  <li class="inputfield"><label id="DienThoaiDH"><?php echo $data['DienThoai']?></label></li>
              </ul>
              <ul class="forms">
                  <li class="txt">Địa chỉ <span class="req"></span></li>
                  <li class="inputfield"><label id="DiaChiDH"><?php echo $data['DiaChi']?></label></li>
              </ul>
            <div class="clear"></div>
            <p style="font-style:italic">Nếu người đặt hàng cũng là người nhận hàng thì chọn vào bút bên dưới!</p>
            <ul class="forms">
              <li class="txt">&nbsp;</li>
                  <li><label class="button bold right"><a href="javascript:void(1);" onclick="copyThongTin();" >&nbsp;&nbsp;Lấy thông tin &raquo;&nbsp;&nbsp;</a></label></li>
              </ul>
          </div>
          
          <?php
          	$sql = "select `TenNguoiNhan`, `ThoiGianDat`, `DiaDiemGiao`, `NgayGiaoHang`, `Email`, `DienThoai`, `GhiChu`, `TinhTrang`
					from `cms_donhang` where `idDH` = ".$idDH;
			$q = mysql_query($sql);
			$data = mysql_fetch_assoc($q)
		  ?>
          <form action="" method="post" id="formTT" onsubmit="return checkData();">
        <div id="table" style="width:360px; height:360px; float:left">
              <h3 class="heading" style="text-align:center;">Thông tin người đặt hàng</h3>
              <ul class="forms">
                  <li class="txt">Họ và tên <span class="req">*</span></li>
                  <li class="inputfield"><input type="text" value="<?php echo $data['TenNguoiNhan']?>" name="HoTen" id="HoTen" /></li>
              </ul>
              <ul class="forms">
                <li class="txt">Địa chỉ mail <span class="req">*</span></li>
                  <li class="inputfield"><input type="email" value="<?php echo $data['Email']?>" name="Email" id="Email" /></li>
              </ul>
              <ul class="forms">
                  <li class="txt">Số điện thoại <span class="req">*</span></li>
                  <li class="inputfield"><input type="number" value="<?php echo $data['DienThoai']?>" name="DienThoai" id="DienThoai" /></li>
              </ul>
              <ul class="forms">
                  <li class="txt">Địa chỉ <span class="req">*</span></li>
                  <li class="inputfield"><input type="text" value="<?php echo $data['DiaDiemGiao']?>" name="DiaChi" id="DiaChi" /></li>
              </ul>
              <ul class="forms">
                  <li class="txt">Ngày nhận <span class="req">*</span></li>
                  <li class="inputfield"><input type="text" value="<?php echo date('d-m-Y',strtotime($data['NgayGiaoHang']))?>" readonly name="NgayNhan" id="NgayNhan" onfocus="scwShow(this,event);" onclick="scwShow(this,event);" /></li>
                  <script>
					var scwBaseYear        = scwDateNow.getFullYear();
					// How many years do want to be valid and to show in the drop-down list?
					var scwDropDownYears   = 2;
				  </script>
              </ul>
              <ul class="forms">
                  <li class="txt">Ghi chú <span class="req">*</span></li>
                  <li class="inputfield">
                    <textarea name="GhiChu" id="GhiChu" style="height:70px;"><?php echo $data['GhiChu']?></textarea>
                  </li>
              </ul>
            <ul class="forms">
                <li class="txt">Mật mã <span class="req">*</span></li>
                <li class="inputfield"><input name="MatMa" type="text" id="MatMa" style="width:120px;" /></li>
                <li>&nbsp;
                  <img src="libs/CaptchaSecurityImages.php" id="capcha" alt="Mật mã" height="25"/>&nbsp;
                  <a href="javascript:void(1)"><img src="images/Refresh_16x16.png" height="16" alt="refCode" onclick="document.getElementById('capcha').src='libs/CaptchaSecurityImages.php?ran='+Math.random()" /></a>
                </li>
            </ul>
            <div class="clear"></div>
            <ul class="forms">
              <li class="txt">&nbsp;<input type="submit" id="submitLH" class="none" /></li>
                  <li><label class="button bold right"><a href="javascript:void(1);" onclick="history.back()" >&nbsp;&nbsp;Quay lại&nbsp;&nbsp;</a></label></li>
                  <li><label class="button bold right"><a href="javascript:void(1);" onclick="document.getElementById('formTT').submit()" >&nbsp;&nbsp;Cập nhật&nbsp;&nbsp;</a></label></li>
                  
              </ul>
          </div>
          </form>
    </div><!-- end col_min -->
  <div class="clear"></div>