<title>Tin tức</title>
<style>
label.absolute{position:absolute; top:180px; right:200px;}
</style>
              <div class="clear"></div>
                <div class="col_min">
                	<h1 class="heading title">Tin Tức công nghệ </h1><br/>
                    <label class="button right absolute"><a href="?m=tintuc_xuly&act=1">&nbsp;Thêm mới tin tức&nbsp;</a></label>
                    <div class="tintuc">
						<ul>
							<?php
                            	$sql = "SELECT `idTin` , `UrlHinh` , `TieuDe` , `TomTat` , `NgayDang` , `idNguoiDung` , `AnHien`
										FROM `cms_tin`
										ORDER BY `idTin` DESC";
								$q = mysql_query($sql);
								$count = mysql_num_rows($q);
								$dem = 0;
								while($data = mysql_fetch_assoc($q)){
								$dem++;
							?>
                            <li <?php if($dem==$count) echo 'class="last_bottom"';?>>
                                <a href="?m=tintuc_chitiet&idTin=<?php echo $data['idTin']?>" class="left"><img src="images/<?php echo $data['UrlHinh']?>" alt="Ảnh mô tả"></a>
                                <div class="text">
                                	<h3><a href="?m=tintuc_chitiet&idTin=<?php echo $data['idTin']?>"><?php echo $data['TieuDe'];?></a></h3>
                                	<h4>
                                        <span>
											<?php echo date('d / m / Y',strtotime($data['NgayDang']))?>&nbsp;&nbsp;-&nbsp;&nbsp;
											<?php 
												$idTG = $data['idNguoiDung'];
												$sqlTG = "SELECT `HoTen` FROM `cms_quantri_admin` WHERE `idNguoiDung` = $idTG";
												$qTG = mysql_query($sqlTG);
												$dataTG = mysql_fetch_row($qTG);
												echo $dataTG[0];
											?>
                                        </span>
                                    </h4>
                                    <p><?php echo $data['TomTat']?></p>
                                    <label class="button right"><a href="?m=tintuc_xuly&act=4&idTin=<?php echo $data['idTin']?>" onclick="return confirm('<?php echo $_SESSION['HoTenQT']?>\nBạn chắc là có muốn xóa tin tức này không?')">&nbsp;Xóa&nbsp;</a></label>
                                    <label class="button right"><a href="?m=tintuc_xuly&flag=<?php echo $data['AnHien']?>&act=3&idTin=<?php echo $data['idTin']?>">&nbsp;
                                    	<?php if($data['AnHien']!=0) echo 'Ẩn đi'; else echo 'Hiện lên';?>
                                    &nbsp;</a></label>
                                    <label class="button right"><a href="?m=tintuc_edit&idTin=<?php echo $data['idTin']?>">&nbsp;Cập nhật&nbsp;</a></label>
                                    
                                    
                                </div>
                            </li>
                            <?php
								}
							?>
                        </ul>
                    </div><!-- end div tin tuc -->
                </div><!-- end col_min -->
              <div class="clear"></div>