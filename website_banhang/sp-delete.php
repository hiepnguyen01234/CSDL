<?php
require './libs/sp.php';

$id=isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($id) {
   delete_sp($id);
}

header("location: sp-list.php");
?>