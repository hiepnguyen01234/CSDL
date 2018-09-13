<?php

require './libs/sp.php';

$id=isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($id) {
   dat_sp($id);
   delete_dat($id);
}

header("location: dat-list.php");
?>