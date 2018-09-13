<?php

$conn=mysqli_connect('localhost:8080','root','','qluser') or die ('khong the ket noi database');
$sql='select * from users';
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
  var_dump($row); 
  }

?>