<?php
	$cart = $_SESSION['cart'];
?>
<div class="widget">
    <h2 class="heading">Giỏ hàng</h2>
    <?php
    	if(count($cart)>0){
			
	?>
            <p class="ct"><a href="?m=giohang"><?php echo count($cart);?></a></p>
            <table id="gh_menu" width="196" border="0" cellspacing="1" cellpadding="0">
                <?php
				$sum=0;
                foreach($cart as $k=>$v){
				$q = mysql_query("select `TenSP`, `Gia` from `cms_sanpham` where `idSP` = ".$k);				
				$data = mysql_fetch_assoc($q);
				?>
                <tr>
                    <td><a href="#"><?php echo $data['TenSP']?></a></td>
                    <td align="right">x<?php echo $v?></td>
                </tr>
                <?php
					$sum += ($data['Gia']*$v);
				}
				?>
          </table>
            <span class="colr bold total"><?php echo number_format($sum,0,',','.');?> VNĐ</span>                
            <label class="right label bold"><a href="?m=thanhtoan">Thanh toán</a></label>
    <?php
				
		}else{
	?>
    <img src="images/cart_big.png" width="198" alt="cart" /> 
    <?php
		}
	?>
</div><!-- end div widget -->