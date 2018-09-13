<?php
// Thiết lập charset utf8
header('Content-Type: text/html; charset=utf-8');
  
// Vì tên button submit là do-register nên ta sẽ kiểm tra nếu
// tồn tại key này trong biến toàn cục $_POST thì nghĩa là người 
// dùng đã click register(submit)
if (isset($_POST['do-register']))
{
    // Lấy thông tin
    // Để an toàn thì ta dùng hàm mssql_escape_string để
    // chống hack sql injection
    /*$username   = isset($_POST['username']) ? mysql_escape_string($_POST['username']) : '';
    $password   = isset($_POST['password']) ? md5($_POST['password']) : '';
    $email      = isset($_POST['email'])    ? mysql_escape_string($_POST['email']) : '';
    $phone      = isset($_POST['phone'])    ? mysql_escape_string($_POST['phone']) : '';
    $level      = isset($_POST['level'])    ? (int)$_POST['level'] : '';*/
	$username   = isset($_POST['username']) ? ($_POST['username']) : '';
    $password   = isset($_POST['password']) ? ($_POST['password']) : '';
    $email      = isset($_POST['email'])    ? ($_POST['email']) : '';
    $phone      = isset($_POST['phone'])    ? ($_POST['phone']) : '';
    $level      = isset($_POST['level'])    ? (int)$_POST['level'] : '';
      
    // Validate Thông Tin Username và Email có bị trùng hay không
      
    // Kết nối CSDL
    $conn = mysqli_connect('localhost', 'root', '', 'php_example') or die ('Lỗi kết nối');
    mysqli_set_charset($conn, "utf8");
      
    // Kiểm tra username hoặc email có bị trùng hay không
    $sql = "SELECT * FROM member WHERE username = '$username' OR email = '$email'";
      
    // Thực thi câu truy vấn
    $result = mysqli_query($conn, $sql);
      
    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0)
    {
        // Sử dụng javascript để thông báo
        echo '<script language="javascript">alert("Thông tin đăng nhập bị sai"); window.location="dangky.php";</script>';
          
        // Dừng chương trình
        die ();
    }
    else {
        // Ngược lại thì thêm bình thường
        $sql = "INSERT INTO member (username, password, email, phone, level) VALUES ('$username','$password','$email','$phone', '$level')";
          
        if (mysqli_query($conn, $sql)){
            echo '<script language="javascript">alert("Đăng ký thành công"); window.location="dangky.php";</script>';
        }
        else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="dangky.php";</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <form method="post" action="dangky.php">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value=""/></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password" value=""/></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value=""/></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone" value=""/></td>
                </tr>
                <tr>
                    <td>Level</td>
                    <td>
                        <select name="level">
                            <option value="0">Thành Viên</option>
                            <option value="1">Admin</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="do-register" value="Đăng Ký"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>