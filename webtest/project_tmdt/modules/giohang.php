<title>Giỏ hàng</title>
<style>
.hover:hover{cursor:pointer; background-color: #B3BDDF;}
</style>
<?php
	//$cart = array(1=>'nokia', 'samsung','apple','LG','HTC');
	$cart = $_SESSION['cart'];
?>
  <div class="clear"></div>
    <div class="col_min">
        <h1 class="heading title">Giỏ hàng</h1>
        <?php
        if(count($cart)>0){
		?>
      <div id="table" style="width:100%; display:inline-block; height:auto;">
        <h3 class="heading">Thông tin giỏ hàng</h3>
        <form action="?m=giohang_xuly&act=3" method="post" id="giohang">
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
				$stt=0;
				$sum=0;
            	foreach($cart as $k=>$v){
					$stt++;
					$sql='select `TenSP`,`Gia`,`UrlHinh` from `cms_sanpham` where `idSP`='.$k;
					$q=mysql_query($sql);
					$data=mysql_fetch_assoc($q);
			?>
            <ul class="cartlist <?php if($stt%2!=0) echo 'gray'?> hover">
                <li class="qty txt"><?php echo $stt;?></li>
                <li class="title txt"><a href="?m=sanpham_chitiet&idSP=<?php echo $k;?>"><?php echo $data['TenSP']?></a></li>
                <li class="thumb">
                	<a href="?m=sanpham_chitiet&idSP=<?php echo $k;?>">
                		<img src="images/sanpham/<?php echo $data['UrlHinh'];?>" alt="<?php echo $data['TenSP']?>" />
                  </a>
                </li>
                <li class="price txt"><?php echo number_format($data['Gia'],0,',','.');?></li>
                <li class="qty"><input name="<?php echo $k?>" type="number" value="<?php echo $v?>" /></li>
                <li class="total txt"><?php echo number_format($data['Gia']*$v,0,',','.'); $sum +=($data['Gia']*$v)?></li>
                <li class="remove txt">
                    <a href="?m=giohang_xuly&act=2&idSP=<?php echo $k;?>" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng không ?')">
                    	<img src="images/delete.gif" alt="" width="10px" />
                    </a>
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
          <input type="submit" class="none" />
        </form>
        <li><label class="button bold right" style="margin-right:10px;"><a href="?m=thanhtoan">&nbsp;&nbsp;Thanh toán&nbsp;&nbsp;</a></label></li>
            <ul class="forms">                   	    	
                <li><label class="button bold "><a href="?m=trangchu">&nbsp;&nbsp;Tiếp tục mua&nbsp;&nbsp;</a></label></li>
                <li><label class="button bold "><a href="javascript:void(1);" onclick="document.getElementById('giohang').submit()">&nbsp;&nbsp;Cập nhật&nbsp;&nbsp;</a></label></li>
            </ul>
      </div>
      <?php
		}else{
	  ?>
      <div id="table" style="height:100px; background:none;">
      <h3 class="heading">Giỏ hàng</h3>
    <p>
      Xin chào <span><?php echo $HoTen;?></span>.<br />
			Chưa có sản phẩm nào trong giỏ hàng của bạn.
      Bấm vào <a href="javascript:void(1);" onclick="history.back();" class="colr">đây</a> để quay lại trang trước. </p>
  </div>
      <?php
		}
	  ?>
      
      
  </div><!-- end col_min -->
  <div class="clear"></div>