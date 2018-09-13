<html>
    <head>
        <title>search user</title>
		<link rel="stylesheet" type="text/css" href="webbanhang/style/style1.css" />
        <script language="javascript" src="webbanhang/script/script.js"></script>
    </head>
    <body>
	<div class="topav">
        <a href="index.php">trang chu</a>
		</div>
		</div>
		<div style="background-color:green;">
        <img src="webbanhang/image/1.jpg" height="300px" width="1285px" />
		</div>
		
		<br /><br /><br />
        <div align="center">
            <form action="search.php" method="get">
                Search: <input type="text" name="search" />
                <input type="submit" name="ok" value="search" />
            </form>
        </div>
        <?php
        if (isset($_REQUEST['ok'])) 
        {
            $search = $_GET['search'];
 
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                $query = "select * from tb_user where username like '%$search%'";
 
                $conn= mysqli_connect("localhost", "root", "", "qluser");
 
                $sql = mysqli_query($conn,$query);
 
                $num = mysqli_num_rows($sql);
 
                if ($num > 0 && $search != "") 
                {
                    echo "$num ket qua tra ve voi tu khoa <b>$search</b>";
                    echo '<table border="1" cellspacing="0" cellpadding="10">';
					echo '<tr>';
                            echo "<td>id</td>";
                            echo "<td>username'</td>";
                            echo "<td>password</td>";
                            echo "<td>email</td>";
                            echo "<td>address</td>";
							echo "<td>phone</td>";
							echo "<td>level</td>";
                        echo '</tr>';
                    while ($row = mysqli_fetch_assoc($sql)) {
                        echo '<tr>';
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['username']}</td>";
                            echo "<td>{$row['password']}</td>";
                            echo "<td>{$row['email']}</td>";
                            echo "<td>{$row['address']}</td>";
							echo "<td>{$row['phone']}</td>";
							echo "<td>{$row['level']}</td>";
                        echo '</tr>';
                    }
                    echo '</table>';
                } 
                else {
                    echo "Khong tim thay ket qua!";
                }
				mysqli_close($conn);
            }
        }
        ?>  
<div style="background-color:black; color:white;">
		<strong > hello world </strong>
		<div style="background-color:#ddd; color:#333; font-size:25;">
		<p>copyright by nhom thuc hanh co so du lieu<br />
		san pham cua website ban hang gi do ma lai<br />
		so dien thoai lien he:03892347819<br />
		<p>
		</div>
		</div>		
    </body>
</html>