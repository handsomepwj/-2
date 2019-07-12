<?php
$host = "127.0.0.1";
$username="root";
$password="zxq930220...";
$dbname = "wjwx";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
mysqli_query($conn, 'set names utf8'); 
$sql = "SELECT * FROM ims_ybsc_recyle_order"; 
$result = $conn->query($sql); 
$dataArr = array();
if ($result->num_rows > 0) {  
 	while($row = $result->fetch_assoc()) { 
 		$dataArr[] = $row;
 		} 
      echo json_encode($dataArr);

 	} 

else{   
 	} 
?>

