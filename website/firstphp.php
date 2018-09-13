<?php

if(isset($_POST['login'])){
$user=$_POST['username'];
$pass=$_POST['password'];
if($user=="admin" && $pass="12345"){
echo "<font color='red'>wellcom </font>";}
else {
echo "wrong username or password,please try again";}
}

?>