<?php

$conn = mysqli_connect('localhost', 'root', '', 'php_example') or die ('Không thể kết nối tới database');
 
$sql = 'SELECT * FROM tb_user';
 
$result = mysqli_query($conn, $sql);
 
if (!$result){
    die ('Câu truy vấn bị sai');
}
 
echo '<ul>';
while ($row = mysqli_fetch_assoc($result)){
	echo '<li>';
	echo '<pre>';
    var_dump($row);
	echo '</pre>';
	echo '</li>';
}
echo '</ul>';
 
mysqli_free_result($result);
 
mysqli_close($conn);

?>