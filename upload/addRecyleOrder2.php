<?php
$host = "127.0.0.1";
$username="root";
$password="zxq930220...";
$dbname = "wjwx";


$order_no=date('YmdHis',time()).rand(100000,999999);

$open_id=$_POST['open_id'];
$username=$_POST['username'];
$goods=$_POST['goods'];
$adderss=$_POST['adderss'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
mysqli_query($conn, 'set names utf8'); 
$sql = "INSERT INTO ims_ybsc_recyle_order(order_no,open_id,username,goods,adderss)values('$oder_no','$open_id','$username','$goods','$adderss') "; 
 if($res == true){
		echo $a=1;
	}
	  else{

	}

?>
