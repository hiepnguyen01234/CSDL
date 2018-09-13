<!DOCTYPE html>
<html>

<head>
<title>tinh bieu thuc bac mot</title>
</head>

<body>

<h1 style="color:red ;"> chao mung den voi web tinh toan </h1>
<br />

<?php
$sum='';
if (isset($_POST['clickme'])){
	$a=isset($_POST['a']) ? (float)(trim($_POST['a'])) : '' ;
	$b=isset($_POST['b']) ? (float)(trim($_POST['b'])) : '' ;
	
	if($a=='') { $sum= 'ban chua nhap a' ;}
    else if($b=='') { $sum= 'ban chua nhap b' ;}
	else if ($a==0) { $sum= 'he so a phai khac : 0' ;}
	else { 
	$sum=(-$b)/$a ;
	}
}
?>

<form method="post" action="">
<input type="text" name="a"> a 
+
<input type="text" name="b"> = 0 
<br />
<br />
<input type="submit" name="clickme" value="tinh" >
</form>

<?php
echo $sum;
?>

</body>
</html>