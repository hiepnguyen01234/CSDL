<?php
require './libs/students.php';

// thuc hien xoa
$id=isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($id) {
   delete_student($id);
}

// tro ve trang danh sach
header("location: student-list.php");
?>