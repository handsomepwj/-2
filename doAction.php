<?php
header("Access-Control-Allow-Origin: *");
$host = "localhost";
$username="root";
$password="";
$dbname = "test";
$conn =new mysqli($host,$username,$password);
if (mysqli_select_db($conn,$dbname)){
    echo  "<script type='text/javascript'>alert('数据库链接成功')</script>";
}else{
}
print_r($_FILES);
error_reporting(0);
$tmp_name = $_FILES['myfile']['tmp_name'];
$filename = $_FILES['myfile']['name'];
$type = $_FILES['myfile']['type'];
$size = $_FILES['myfile']['size'];
$error = $_FILES['myfile']['error'];
move_uploaded_file($_FILES["myfile"]["tmp_name"],"./upload/".$_FILES["myfile"]["name"]);
$dz=stripslashes("E:/PHP/wamp64/www/ewei_shopv2/upload/".$_FILES["myfile"]["name"]);
$suffix = substr($filename,-3);
$sql2 = mysqli_query($conn,"select * from video WHERE name='$filename'");
while ($res = mysqli_fetch_assoc($sql2)){
    $name = $res['name'];
}
if ($filename != $name) {
    $sql = "INSERT INTO video(videourl,name,suffix)values('$dz','$filename','$suffix') ";
    $res = $conn->query($sql);
}else{
  echo  "<script type='text/javascript'>alert('您以上传该视频或音频')</script>";
}
$sql1 = "SELECT * FROM video";
$result = $conn->query($sql1);
$dataArr = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $dataArr[] = $row;
    }
    echo json_encode($dataArr);

}



