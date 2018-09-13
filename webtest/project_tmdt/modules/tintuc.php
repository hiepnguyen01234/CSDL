<title>Tin tức</title>

              <div class="clear"></div>
                <div class="col_min">
                	<h1 class="heading title">Tin Tức công nghệ</h1><br/>
                    <div class="tintuc">
						<ul>
							<?php
								//Phan trang
								$sql = "SELECT count(`idTin`) as `total` FROM `cms_tin` WHERE `AnHien` =1 ";
								$q = mysql_query($sql);
								$row = mysql_fetch_row($q);
								$ipp = 3;
								$page = round($_GET['p']);
								$total = $row[0];
								$totalP = ceil($total/$ipp);
								$page = max(1,min($totalP,$page));
								$begin = $page - 2; $begin = max(1,$begin);
								$end = $page + 2; $end = min($totalP,$end);
								
								//lich su gio hang
								$pos = ($page-1)*$ipp;
                            	$sql = "SELECT `idTin` , `UrlHinh` , `TieuDe` , `TomTat` , `NgayDang` , `idNguoiDung`
										FROM `cms_tin`
										WHERE `AnHien` =1
										ORDER BY `idTin` DESC limit $pos,$ipp";
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
                                    <label class="button right"><a href="?m=tintuc_chitiet&idTin=<?php echo $data['idTin']?>">Xem chi tiết</a></label>
                                </div>
                            </li>
                            <?php
								}
							?>
                        </ul>
                    </div><!-- end div tin tuc -->
                    <div id="divPage">
                    	<a href="?m=tintuc&p=1">&laquo;</a>
                        <a href="?m=tintuc&p=<?php echo $page-1; ?>">&lsaquo;</a> 
                        <?php
                            for($i=$begin; $i<=$end; $i++){
						?>
                        <a href="?m=tintuc&p=<?php echo $i?>" class="<?php if($page==$i) echo "activePage";?>"><?php echo $i;?></a> 
                        <?php
							}
						?>
                        <a href="?m=tintuc&p=<?php echo $page+1; ?>">&rsaquo;</a>
                        <a href="?m=tintuc&p=<?php echo $totalP?>">&raquo;</a>
                    
                    </div>
              </div><!-- end col_min -->
              <div class="clear"></div>