<?php

global $conn;
 
function connect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    if (!$conn){
        $conn = mysqli_connect('localhost','root','','qluser') or die ('Can\'t not connect to database');
        mysqli_set_charset($conn, 'utf8');
    }
}
 
function disconnect_db()
{
    global $conn;
     
    if ($conn){
        mysqli_close($conn);
    }
}
 
function get_all_sp()
{
    global $conn;
     
    connect_db();
     
    $sql = "select * from tb_sp";
     
    $query = mysqli_query($conn, $sql);
     
    $result = array();
     
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }
     
    return $result;
}
 
function get_sp($sp_id)
{
    global $conn;
     
    connect_db();
     
    $sql = "select * from tb_sp where id = {$sp_id}";
     
    $query = mysqli_query($conn, $sql);
     
    $result = array();
     
    if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $result = $row;
    }
     
    return $result;
}
 
function add_sp($id, $ten, $hang, $soluong, $damua, $daban, $img, $gia)
{
    global $conn;
     
    connect_db();
     
    $sql = "
            INSERT INTO tb_sp(id, ten, hang, soluong, damua, daban, img, gia) VALUES
            ('$id', '$ten', '$hang', '$soluong', '$damua', '$daban', '$img', '$gia')
    ";
     
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
 
 
function edit_sp($sp_id, $ten, $hang, $soluong, $damua, $daban, $img, $gia)
{
    global $conn;
     
    connect_db();
     
    $sql = "
            UPDATE tb_sp SET
            ten = '$ten',
            hang = '$hang',
            soluong = '$soluong',
			damua = '$damua',
			daban = '$daban',
			img = '$img',
			gia = '$gia'
            WHERE id = $sp_id
    ";
     
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
 
 
function delete_sp($sp_id)
{
    global $conn;
     
    connect_db();
     
    $sql = "
            DELETE FROM tb_sp
            WHERE id = $sp_id
    ";
     
    $query = mysqli_query($conn, $sql);
     
    return $query;
}

function dat_sp($sp_id)
{
    $data = get_sp($sp_id);
	global $conn;
     
    connect_db();
    $a = $data[damua] + 1;
	$b = $data[daban] + 1;
	$c = $data[soluong] -1;
         
    $sql = "
            UPDATE tb_sp SET
			damua = '$a',
			daban = '$b',
			soluong = '$c'
            WHERE id = $sp_id
    ";
     
    $query = mysqli_query($conn, $sql);
     
    return $query;
}

function edit_dat($username, $address, $id, $ten, $hang)
{
    global $conn;
     
    connect_db();
     
    $sql = "
            INSERT INTO tb_dat(username, address, id, ten, hang) VALUES
            ( '$username', '$address','$id', '$ten', '$hang')
    ";
     
    $query = mysqli_query($conn, $sql);
     
    return $query;
}

function get_all_dat()
{
    global $conn;
     
    connect_db();
     
    $sql = "select * from tb_dat";
     
    $query = mysqli_query($conn, $sql);
     
    $result = array();
     
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }
     
    return $result;
}

function delete_dat($sp_id)
{
    global $conn;
     
    connect_db();
     
    $sql = "
            DELETE FROM tb_dat
            WHERE id = $sp_id
    ";
     
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
 
?>