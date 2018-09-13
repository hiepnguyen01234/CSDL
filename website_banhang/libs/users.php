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
 
function get_all_users()
{
    global $conn;
     
    connect_db();
     
    $sql = "select * from tb_user";
     
    $query = mysqli_query($conn, $sql);
     
    $result = array();
     
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }
     
    return $result;
}
 
function get_user($user_id)
{
    global $conn;
     
    connect_db();
     
    $sql = "select * from tb_user where id = {$user_id}";
     
    $query = mysqli_query($conn, $sql);
     
    $result = array();
     
    if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $result = $row;
    }
     
    return $result;
}
 
function add_user($username, $password, $email, $address, $phone, $level)
{
    global $conn;
     
    connect_db();
     
    $sql = "
            INSERT INTO tb_user(username, password, email, address, phone, level) VALUES
            ('$username', '$password', '$email', '$address', '$phone', '$level')
    ";
     
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
 
 
function edit_user($user_id, $username, $password, $email, $address, $phone, $level)
{
    global $conn;
     
    connect_db();
     
    $sql = "
            UPDATE tb_user SET
            username = '$username',
            password = '$password',
            email = '$email',
			address = '$address',
			phone = '$phone',
			level = '$level'
            WHERE id = $user_id
    ";
     
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
 
 
function delete_user($user_id)
{
    global $conn;
     
    connect_db();
     
    $sql = "
            DELETE FROM tb_user
            WHERE id = $user_id
    ";
     
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
?>