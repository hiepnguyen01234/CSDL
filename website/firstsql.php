<!DOCTYPE html>
<html>
    <head>
        <title></title>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <form method="POST">
            Username: <input type="text" name="username" value=""/> <br/>
            password: <input type="password" name="password" value=""/><br/>
            <input type="submit" name="form_click" value="Gửi Dữ Liệu"/><br/>
            <?php
                // Nếu người dùng click vào button Gửi Dữ Liệu
                // Vì button đó tên là form_click nên đó cũng là
                // tên của key nằm trong biến $_POST
                if (isset($_POST['form_click'])){
                    echo 'Tên đăng nhập là: ' . $_POST['username'];
                    echo '<br/>';
                    echo 'Mật khẩu là: ' . $_POST['password'];
					echo '<br /> cac ban hay "an cut" di.';
                }
           ?>
        </form>
    </body>
</html>


<?php
/*$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();*/



/*$conn=null;
if(!$conn){
	$conn=mysqli_connect('localhost','root','','test') or die('khong the ket noi csdl');
	mysqli_set_charset($conn,'utf-8');
}
$sql=null;
$row=null;
$data=array();
$result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }*/
	
	
/*mysql_connect("localhost","root","root") or die ("no connect");
mysql_select_db("test");
mysql_query("set names 'utf8'");*/
?>