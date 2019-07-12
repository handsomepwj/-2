<?php 
$host = "127.0.0.1";
$username="root";
$password="zxq930220...";
$dbname = "wjwx";
$conn = new mysqli($servername, $username, $password, $dbname);
$id=$_POST["bookId"];
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
mysqli_query($conn, 'set names utf8'); 
$sql = " DELETE FROM  amouse_mobile_recycling_book WHERE id = '$id'";
$result = $conn->query($sql); 

if($result== true)
	echo $a=1;

