<title>Liên hệ</title>
<div class="col_min">
	<h1 class="title heading">Danh sách đơn hàng</h1>
    <div id="second-sidebar">
        <ul class="tabs">
            <li><a href="#moigui" class="active">Mới gửi</a></li>
            <li><a href="#daxacnhan">Đã xác nhận</a></li>
        </ul>
        <div class="tabs_container">
            <div id="moigui" class="tab_content">
                <table border="0" cellspacing="1" cellpadding="0" width="920px">
                  <tr>
                    <td width="27">&nbsp;</td>
                    <td width="150">&nbsp;</td>
                    <td width="160">&nbsp;</td>
                    <td width="76">&nbsp;</td>
                    <td width="70">&nbsp;</td>
                    <td width="140">&nbsp;</td>
                    <td width="170">&nbsp;</td>
                    <td width="80">&nbsp;</td>
                  </tr>
                  <tr style="background-color:#0CF; font-weight:bold; text-align:center;">
                    <td>STT</td>
                    <td>Họ tên</td>
                    <td>Công ty</td>
                    <td>Email</td>
                    <td>Điện thoại</td>
                    <td>Địa chỉ</td>
                    <td>Nội dung</td>
                    <td>Ngày gửi</td>
                    <td width="37">Công cụ</td>
                  </tr>
                  
                    <?php
                        $sql = "SELECT * FROM `cms_lienhe`
								WHERE `XacNhan` = 0 order by `idLienHe` DESC";
                        $q = mysql_query($sql);
                        $stt = 1;
                        while($data=mysql_fetch_assoc($q)){
                    ?>
                   <tr class="<?php if($stt%2!=1) echo 'gray1';?> center hover">
                    <td>&nbsp;<?php echo $stt++?></td>
                    <td align="left">&nbsp;<?php echo $data['HoTen'];?></td>
                    <td>&nbsp;<?php echo $data['CongTy']?></td>
                    <td>&nbsp;<?php echo $data['Email'];?></td>
                    <td>&nbsp;<?php echo $data['DienThoai'];?></td>
                    <td>&nbsp;<?php echo $data['DiaChi'];?></td>
                    <td align="left"><?php echo $data['NoiDung']?></td>
                    <td align="right"><?php echo date('d-m-y',strtotime($data['NgayGui']))?></td>
                    <td align="center"><a href="?m=lienhe_xuly&act=1&idLH=<?php echo $data['idLienHe'];?>" class="colr">Xác nhận</a></td>
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
                    <td width="27">&nbsp;</td>
                    <td width="150">&nbsp;</td>
                    <td width="160">&nbsp;</td>
                    <td width="76">&nbsp;</td>
                    <td width="70">&nbsp;</td>
                    <td width="140">&nbsp;</td>
                    <td width="170">&nbsp;</td>
                    <td width="80">&nbsp;</td>
                  </tr>
                  <tr style="background-color:#0CF; font-weight:bold; text-align:center;">
                    <td>STT</td>
                    <td>Họ tên</td>
                    <td>Công ty</td>
                    <td>Email</td>
                    <td>Điện thoại</td>
                    <td>Địa chỉ</td>
                    <td>Nội dung</td>
                    <td>Ngày gửi</td>
                    <td width="37">Công cụ</td>
                  </tr>
                  
                    <?php
                        $sql = "SELECT * FROM `cms_lienhe`
								WHERE `XacNhan` = 1 order by `idLienHe` DESC";
                        $q = mysql_query($sql);
                        $stt = 1;
                        while($data=mysql_fetch_assoc($q)){
                    ?>
                   <tr class="<?php if($stt%2!=1) echo 'gray1';?> center hover">
                    <td>&nbsp;<?php echo $stt++?></td>
                    <td align="left">&nbsp;<?php echo $data['HoTen'];?></td>
                    <td>&nbsp;<?php echo $data['CongTy']?></td>
                    <td>&nbsp;<?php echo $data['Email'];?></td>
                    <td>&nbsp;<?php echo $data['DienThoai'];?></td>
                    <td>&nbsp;<?php echo $data['DiaChi'];?></td>
                    <td align="left"><?php echo $data['NoiDung']?></td>
                    <td align="right"><?php echo date('d-m-y',strtotime($data['NgayGui']))?></td>
                    <td align="center"><a href="?m=lienhe_xuly&act=2&idLH=<?php echo $data['idLienHe'];?>" class="colr">Xóa</a></td>
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