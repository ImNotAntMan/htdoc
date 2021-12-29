<?php
namespace loginex;
$HOSTNAME = 'localhost';
$PORT = '3306';
$USERNAME = 'webapp';
$PASSWORD = 'webapp';
$DATABASENAME = 'webdb';
//
$dbconn = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASENAME);
if($dbconn) {
    echo "db 연결이 성공하였습니다.<br>";
} else {
    die("db 연결에 실패하였습니다.".mysqli_connect_error());
}
$sql = "select * from users where userpwd = sha2('".$PASSWORD."', 256)";
echo $sql."<br>";
?>