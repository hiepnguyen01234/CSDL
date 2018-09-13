<?php
$a=fopen("bodem.txt","a+");
$b=(int)fgets($a);
fclose($a);
$b++;
$a=fopen("bodem.txt","w+");
fwrite($a,$b);
echo "so luot truy cap la :".$b ;
fclose($a);

?>