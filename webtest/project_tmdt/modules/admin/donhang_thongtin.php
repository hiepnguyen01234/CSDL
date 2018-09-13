<style>
ul.forms li.txt{width:90px !important;}
ul.forms li.inputfield label{width:210px !important; line-height:20px;}

</style>
<title>Đơn hàng</title>
<?php
	$act = $_GET['act'];
	$idDH = round($_GET['idDH']);
?>
  <div class="clear"></div>
    <div class="col_min">
      <div id="table" style="width:100%; display:inline-block; height:auto;">
        <h3 class="heading">Thông tin đơn hàng</h3>
        <div class="shoppingcart" style="margin-left:100px;">
            <ul class="tablehead">
                <li class="qty colr">STT</li>
                <li class="title colr">Tên sản phẩm</li>
                <li class="thumb colr">&nbsp;</li>
                <li class="price colr">Giá VNĐ</li>
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
            <ul class="cartlist <?php if($stt%2!=0) echo 'gray2'?>">
                <li class="qty txt"><?php echo $stt;?></li>
                <li class="title txt"><a href=""><?php echo $data['TenSP']?></a></li>
                <li class="thumb">
                	<a href="#">
                		<img src="images/sanpham/<?php echo $data['UrlHinh'];?>" alt="<?php echo $data['TenSP']?>" />
					</a>
                </li>
                <li class="price txt" style="text-align:right"><?php echo number_format($data['Gia'],0,',','.');?></li>
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

          <?php 
		  	$sql = "select `TenNguoiNhan`, `ThoiGianDat`, `DiaDiemGiao`, `NgayGiaoHang`, `Email`, `DienThoai`, `GhiChu`, `TinhTrang`
					from `cms_donhang` where `idDH` = ".$idDH;
			$q = mysql_query($sql);
			$data = mysql_fetch_assoc($q);
		  ?>
        <div id="table" style="width:400px; min-height:500px;">
              <h3 class="heading" style="text-align:center;">Thông tin người đặt hàng</h3>
              <ul class="forms">
                  <li class="txt">Họ và tên <span class="req">*</span></li>
                  <li class="inputfield"><label id="HoTen"><?php echo $data['TenNguoiNhan']?></label></li>
              </ul>
              <ul class="forms">
                <li class="txt">Địa chỉ mail <span class="req">*</span></li>
                  <li class="inputfield"><label id="Email"><?php echo $data['Email']?></label></li>
              </ul>
              <ul class="forms">
                  <li class="txt">Số điện thoại <span class="req">*</span></li>
                  <li class="inputfield"><label id="DienThoai"><?php echo $data['DienThoai']?></label></li>
              </ul>
              <ul class="forms">
                  <li class="txt">Địa chỉ <span class="req">*</span></li>
                  <li class="inputfield"><label id="DiaChi"><?php echo $data['DiaDiemGiao']?></label></li>
              </ul>
              <ul class="forms">
                  <li class="txt">Ngày đặt <span class="req">*</span></li>
                  <li class="inputfield"><label id="NgayDat"><?php echo date('m-d-Y',strtotime($data['ThoiGianDat']))?></label></li>
              </ul>
              <ul class="forms">
                  <li class="txt">Ngày nhận <span class="req">*</span></li>
                  <li class="inputfield"><label id="NgayNhan"><?php echo date('d/m/Y', strtotime($data['NgayGiaoHang']))?></label></li>
              </ul>
              <ul class="forms">
                  <li class="txt">Tình trạng <span class="req">*</span></li>
                  <li class="inputfield"><label id="TrinhTrang"><?php echo $TinhTrang[$data['TinhTrang']]?></label></li>
              </ul>
              <ul class="forms">
                  <li class="txt">Ghi chú <span class="req">*</span></li>
                  <li class="inputfield">
                    <label id="GhiChu"><?php echo $data['GhiChu'];?>&nbsp;</label>
                  </li>
              </ul>
            
            <div class="clear"></div>
            <ul class="forms">
              <li class="txt">&nbsp;</li>
              <?php
              	if($act==1){
			  ?>
                  <li><label class="button bold right"><a href="?m=donhang_xuly&idDH=<?php echo $idDH?>&act=1">&nbsp;&nbsp;Xác nhận&nbsp;&nbsp;</a></label></li>
                  <li><label class="button bold right"><a href="?m=donhang_xuly&idDH=<?php echo $idDH?>&act=4">&nbsp;&nbsp;Hủy&nbsp;&nbsp;</a></label></li>
               <?php
               	}
				if($act==2){
			   ?>
               <li><label class="button bold right"><a href="javascript:void(1);" onclick="history.back()">&nbsp;&nbsp;Quay lại&nbsp;&nbsp;</a></label></li>
               <li><label class="button bold right"><a href="?m=donhang_xuly&idDH=<?php echo $idDH?>&act=2">&nbsp;&nbsp;Đang giao hàng&nbsp;&nbsp;</a></label></li>
               <?php
				}
				if($act==3){
			   ?>
               <li><label class="button bold right"><a href="javascript:void(1);" onclick="history.back()">&nbsp;&nbsp;Quay lại&nbsp;&nbsp;</a></label></li>
               <li><label class="button bold right"><a href="?m=donhang_xuly&idDH=<?php echo $idDH?>&act=3">&nbsp;&nbsp;Hoàn tất&nbsp;&nbsp;</a></label></li>
			   <?php
				}
				if($act==4 or $act==5){				
			   ?>
               <li><label class="button bold right"><a href="javascript:void(1);" onclick="history.back()">&nbsp;&nbsp;Quay lại&nbsp;&nbsp;</a></label></li>
               <?php
				}
			   ?>
              </ul>
          </div>
          
    </div><!-- end col_min -->
  <div class="clear"></div>