<?php
require "./adbconfig.php";
//require "./asysconfig.php";
// create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

// check connection : 연결 확인, 오류가 있으면 메시지 출력 후 프로세스 정료
if($conn->connect_error) {
  echo outmsg(DBCONN_FAIL);
  die("연결실패 :".$conn->connect_error);
}else {
  if(DBG) echo outmsg(DBCONN_SUCCESS);
}
$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$cellphone = $_POST['cellphone'];

$stmt = $conn -> prepare("Update users set cellphone = ?, email = ? where id = ?");
$stmt -> bind_param("sss", $cellphone, $email, $id);
$stmt -> execute();

$conn -> close();

header('Location: oo_user_loginsuccess.php?id='.$id);
?>