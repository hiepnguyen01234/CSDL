
<?php					
  $timeout=1;//Thoi gian timout tính bằng phút
  $id=session_id();
  $user=$_SESSION['Email'];  
  //echo $id;
  //echo $user;
  //Xóa những user đã timeout
  $sql="delete from cms_luottruycap_online where unix_timestamp()-`lastvisit`>$timeout * 60";
  mysql_query($sql);
  //Xoa user co $id va Them user vao bang nncms_online
  $sql="replace into cms_luottruycap_online set `id`='$id',`lastvisit`=unix_timestamp(),`user`='$user'";
  mysql_query($sql);  
  //Dem online users
  $sql='select count(*) from cms_luottruycap_online';
  $rs=mysql_query($sql);
  $r=mysql_fetch_row($rs);
  $users=$r[0];  
  //Dem members
  $sql="select count(*) from cms_luottruycap_online where `user`!=''";
  $rs=mysql_query($sql);
  $r=mysql_fetch_row($rs);
  $mems=$r[0];  
  //Số lượt truy cập
  if($_COOKIE['counter']==''){//Neu nhu chua co cookies -> chua dem 1 luot
	  setcookie('counter','1',time()+1*60);					
	  $sql='update `cms_luottruycap_counter` set `cnt`=`cnt`+1';
	  mysql_query($sql);
  }
  //Lay so luot truy cap
  $sql="select `cnt` from `cms_luottruycap_counter`";
  $rs=mysql_query($sql);
  $r=mysql_fetch_row($rs);
  $visits=$r[0];
  ?>
<div class="widget clear" style="margin:20px 0 5px 0;">
    <h2 class="heading">Thống kê truy cập</h2>
    <ul id="menu-categories-menu" class="truycap">
    	<li><span>+ Thành viên online:</span> <?php echo $mems ?></a></li>
        <li><span>+ Số khách online:</span> <?php echo $users-$mems ?></li>
        <li><span>+ Số người online:</span> <?php echo $users ?></li>        
        <li><span>+ Tổng cộng lượt:</span> <?php echo $visits?> </li>
    </ul>                
</div><!-- end div widget -->