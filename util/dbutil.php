<?php
namespace loginex;
$HOSTNAME = 'localhost';
$PORT = '3306';
$USERNAME = 'webapp';
$PASSWORD = 'webapp';
$DATABASENAME = 'webdb';
//
$dbconn = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASENAME);
echo "들어왔니????";
if($dbconn) {
    echo "db 연결이 성공하였습니다.";
} else {
    die("db 연결에 실패하였습니다.".mysqli_connect_error());
}
?>