<title>Đơn hàng</title>
<div class="col_min">
	<h1 class="title heading">Danh sách đơn hàng</h1>
    <div id="second-sidebar">
        <ul class="tabs">
            <li><a href="#moidat" class="active">Mới đặt</a></li>
            <li><a href="#daxacnhan">Đã xác nhận</a></li>
            <li><a href="#danggiaohang">Đang giao hàng</a></li>
            <li><a href="#hoantat">Hoàn tất</a></li>
            <li><a href="#huydonhang">Hủy đơn hàng</a></li>
        </ul>
        <div class="tabs_container">
            <div id="moidat" class="tab_content">
                <table border="0" cellspacing="1" cellpadding="0" width="920px">
                  <tr>
                    <td width="40">&nbsp;</td>
                    <td width="369">&nbsp;</td>
                    <td width="150">&nbsp;</td>
                    <td width="179">&nbsp;</td>
                    <td width="179">&nbsp;</td>
                    <td width="202">&nbsp;</td>
                  </tr>
                  <tr style="background-color:#0CF; font-weight:bold; text-align:center;">
                    <td>STT</td>
                    <td>Tên người nhận</td>
                    <td>Ngày đặt</td>
                    <td>Ngày nhận</td>
                    <td>Tổng tiền VNĐ</td>
                    <td>Công cụ</td>
                  </tr>
                  
                    <?php
                        $sql = "SELECT `NgayGiaoHang`,`ThoiGianDat`,`TenNguoiNhan`,`idDH` FROM `cms_donhang` as dh
								WHERE `TinhTrang` =1 order by `idDH` DESC";
                        $q = mysql_query($sql);
                        $stt = 1;
                        while($data=mysql_fetch_assoc($q)){
							$idDH = $data['idDH'];
                    ?>
                   <tr class="<?php if($stt%2!=1) echo 'gray1';?> center hover">
                    <td>&nbsp;<?php echo $stt++?></td>
                    <td align="left">&nbsp;<?php echo $data['TenNguoiNhan'];?></td>
                    <td>&nbsp;<?php echo date('d-m-y',strtotime($data['ThoiGianDat']))?></td>
                    <td>&nbsp;<?php echo date('d-m-y',strtotime($data['NgayGiaoHang']));?></td>
                    <td align="right">&nbsp;
						<?php
							  $sqlTT = "SELECT sum(`SoLuong`*`Gia`) as `tongtien`  FROM `cms_donhang_chitiet` WHERE `idDH` =".$idDH;
							  $qTT = mysql_query($sqlTT);
							  $dataTT = mysql_fetch_assoc($qTT);
							  echo number_format($dataTT['tongtien'],0,'.',',');
						  ?>
                    </td>
                    <td>&nbsp;
                      <a href="?m=donhang_thongtin&act=1&idDH=<?php echo $data['idDH'];?>">
                      	<img src="images/viewer.png" width="30" alt="Xem">
                      </a>&nbsp;
                      
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
              </table>
            </div>
            <div id="daxacnhan" class="tab_content">
                <table border="0" cellspacing="1" cellpadding="0" width="920px">
                  <tr>
                    <td width="40">&nbsp;</td>
                    <td width="369">&nbsp;</td>
                    <td width="150">&nbsp;</td>
                    <td width="179">&nbsp;</td>
                    <td width="179">&nbsp;</td>
                    <td width="202">&nbsp;</td>
                  </tr>
                  <tr style="background-color:#0CF; font-weight:bold; text-align:center;">
                    <td>STT</td>
                    <td>Tên người nhận</td>
                    <td>Ngày đặt</td>
                    <td>Ngày nhận</td>
                    <td>Tổng tiền VNĐ</td>
                    <td>Công cụ</td>
                  </tr>
                  
                    <?php
                        $sql = "SELECT `NgayGiaoHang`,`ThoiGianDat`,`TenNguoiNhan`,`idDH` FROM `cms_donhang` as dh
								WHERE `TinhTrang` =2 order by `idDH` DESC";
                        $q = mysql_query($sql);
                        $stt = 1;
                        while($data=mysql_fetch_assoc($q)){
							$idDH = $data['idDH'];
                    ?>
                   <tr class="<?php if($stt%2!=1) echo 'gray1';?> center hover">
                    <td>&nbsp;<?php echo $stt++?></td>
                    <td align="left">&nbsp;<?php echo $data['TenNguoiNhan'];?></td>
                    <td>&nbsp;<?php echo date('d-m-y',strtotime($data['ThoiGianDat']))?></td>
                    <td>&nbsp;<?php echo date('d-m-y',strtotime($data['NgayGiaoHang']));?></td>
                    <td align="right">&nbsp;
						<?php
							  $sqlTT = "SELECT sum(`SoLuong`*`Gia`) as `tongtien`  FROM `cms_donhang_chitiet` WHERE `idDH` =".$idDH;
							  $qTT = mysql_query($sqlTT);
							  $dataTT = mysql_fetch_assoc($qTT);
							  echo number_format($dataTT['tongtien'],0,'.',',');
						  ?>
                    </td>
                    <td>&nbsp;
                      <a href="?m=donhang_thongtin&act=2&idDH=<?php echo $data['idDH'];?>" class="colr">
                      	<img src="./images/viewer.png" width="30" alt="Xem">
                      </a>&nbsp;/
                      <a href="?m=donhang_xuly&idDH=<?php echo $data['idDH'];?>&act=2"  class="colr">Đang giao</a>
                      
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
              </table>
            </div>
            <div id="danggiaohang" class="tab_content">
                <table border="0" cellspacing="1" cellpadding="0" width="920px">
                  <tr>
                    <td width="40">&nbsp;</td>
                    <td width="369">&nbsp;</td>
                    <td width="150">&nbsp;</td>
                    <td width="179">&nbsp;</td>
                    <td width="179">&nbsp;</td>
                    <td width="202">&nbsp;</td>
                  </tr>
                  <tr style="background-color:#0CF; font-weight:bold; text-align:center;">
                    <td>STT</td>
                    <td>Tên người nhận</td>
                    <td>Ngày đặt</td>
                    <td>Ngày nhận</td>
                    <td>Tổng tiền VNĐ</td>
                    <td>Công cụ</td>
                  </tr>
                  
                    <?php
                        $sql = "SELECT `NgayGiaoHang`,`ThoiGianDat`,`TenNguoiNhan`,`idDH` FROM `cms_donhang` as dh
								WHERE `TinhTrang` =3 order by `idDH` DESC";
                        $q = mysql_query($sql);
                        $stt = 1;
                        while($data=mysql_fetch_assoc($q)){
							$idDH = $data['idDH'];
                    ?>
                   <tr class="<?php if($stt%2!=1) echo 'gray1';?> center hover">
                    <td>&nbsp;<?php echo $stt++?></td>
                    <td align="left">&nbsp;<?php echo $data['TenNguoiNhan'];?></td>
                    <td>&nbsp;<?php echo date('d-m-y',strtotime($data['ThoiGianDat']))?></td>
                    <td>&nbsp;<?php echo date('d-m-y',strtotime($data['NgayGiaoHang']));?></td>
                    <td align="right">&nbsp;
						<?php
							  $sqlTT = "SELECT sum(`SoLuong`*`Gia`) as `tongtien`  FROM `cms_donhang_chitiet` WHERE `idDH` =".$idDH;
							  $qTT = mysql_query($sqlTT);
							  $dataTT = mysql_fetch_assoc($qTT);
							  echo number_format($dataTT['tongtien'],0,'.',',');
						  ?>
                    </td>
                    <td>&nbsp;
                      <a href="?m=donhang_thongtin&act=3&idDH=<?php echo $data['idDH'];?>" >
                      	<img src="images/viewer.png" width="30" alt="Xem">
                      </a>&nbsp;/
                      <a href="?m=donhang_xuly&idDH=<?php echo $data['idDH'];?>&act=2"  class="colr">Hoàn tất</a>
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
              </table>
            </div>
            <div id="hoantat" class="tab_content">
                <table border="0" cellspacing="1" cellpadding="0" width="920px">
                  <tr>
                    <td width="40">&nbsp;</td>
                    <td width="369">&nbsp;</td>
                    <td width="150">&nbsp;</td>
                    <td width="179">&nbsp;</td>
                    <td width="179">&nbsp;</td>
                    <td width="202">&nbsp;</td>
                  </tr>
                  <tr style="background-color:#0CF; font-weight:bold; text-align:center;">
                    <td>STT</td>
                    <td>Tên người nhận</td>
                    <td>Ngày đặt</td>
                    <td>Ngày nhận</td>
                    <td>Tổng tiền VNĐ</td>
                    <td>Công cụ</td>
                  </tr>
                  
                    <?php
                        $sql = "SELECT `NgayGiaoHang`,`ThoiGianDat`,`TenNguoiNhan`,`idDH` FROM `cms_donhang` as dh
								WHERE `TinhTrang` =4 order by `idDH` DESC";
                        $q = mysql_query($sql);
                        $stt = 1;
                        while($data=mysql_fetch_assoc($q)){
							$idDH = $data['idDH'];
                    ?>
                   <tr class="<?php if($stt%2!=1) echo 'gray1';?> center hover">
                    <td>&nbsp;<?php echo $stt++?></td>
                    <td align="left">&nbsp;<?php echo $data['TenNguoiNhan'];?></td>
                    <td>&nbsp;<?php echo date('d-m-y',strtotime($data['ThoiGianDat']))?></td>
                    <td>&nbsp;<?php echo date('d-m-y',strtotime($data['NgayGiaoHang']));?></td>
                    <td align="right">&nbsp;
						<?php
							  $sqlTT = "SELECT sum(`SoLuong`*`Gia`) as `tongtien`  FROM `cms_donhang_chitiet` WHERE `idDH` =".$idDH;
							  $qTT = mysql_query($sqlTT);
							  $dataTT = mysql_fetch_assoc($qTT);
							  echo number_format($dataTT['tongtien'],0,'.',',');
						  ?>
                    </td>
                    <td>&nbsp;
                      <a href="?m=donhang_thongtin&act=4&idDH=<?php echo $data['idDH'];?>" class="colr">
                      	<img src="images/viewer.png" width="30" alt="Xem">
                      </a>&nbsp;
                      
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
              </table>
            </div>
            <div id="huydonhang" class="tab_content">
                <table border="0" cellspacing="1" cellpadding="0" width="920px">
                  <tr>
                    <td width="40">&nbsp;</td>
                    <td width="369">&nbsp;</td>
                    <td width="150">&nbsp;</td>
                    <td width="179">&nbsp;</td>
                    <td width="179">&nbsp;</td>
                    <td width="202">&nbsp;</td>
                  </tr>
                  <tr style="background-color:#0CF; font-weight:bold; text-align:center;">
                    <td>STT</td>
                    <td>Tên người nhận</td>
                    <td>Ngày đặt</td>
                    <td>Ngày nhận</td>
                    <td>Tổng tiền VNĐ</td>
                    <td>Công cụ</td>
                  </tr>
                  
                    <?php
                        $sql = "SELECT `NgayGiaoHang`,`ThoiGianDat`,`TenNguoiNhan`,`idDH` FROM `cms_donhang` as dh
								WHERE `TinhTrang` =5 order by `idDH` DESC";
                        $q = mysql_query($sql);
                        $stt = 1;
                        while($data=mysql_fetch_assoc($q)){
							$idDH = $data['idDH'];
                    ?>
                   <tr class="<?php if($stt%2!=1) echo 'gray1';?> center hover">
                    <td>&nbsp;<?php echo $stt++?></td>
                    <td align="left">&nbsp;<?php echo $data['TenNguoiNhan'];?></td>
                    <td>&nbsp;<?php echo date('d-m-y',strtotime($data['ThoiGianDat']))?></td>
                    <td>&nbsp;<?php echo date('d-m-y',strtotime($data['NgayGiaoHang']));?></td>
                    <td align="right">&nbsp;
						<?php
							  $sqlTT = "SELECT sum(`SoLuong`*`Gia`) as `tongtien`  FROM `cms_donhang_chitiet` WHERE `idDH` =".$idDH;
							  $qTT = mysql_query($sqlTT);
							  $dataTT = mysql_fetch_assoc($qTT);
							  echo number_format($dataTT['tongtien'],0,'.',',');
						  ?>
                    </td>
                    <td>&nbsp;
                      <a href="?m=donhang_thongtin&act=5&idDH=<?php echo $data['idDH'];?>" class="colr">
                      	<img src="images/viewer.png" width="30" alt="Xem">
                      </a>&nbsp;
                      
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
              </table>
            </div>
        </div><!-- end tabs container -->
    </div><!-- end second sidebar -->
</div>