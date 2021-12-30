<!-- 
  파일명 : oo_init_createdb.php
  최초작업자 : swcodingschool
  최초작성일자 : 2021-12-28
  업데이트일자 : 2021-12-28
  
  기능: 
  DBMS 시스템에 접속, 시스템이 동작하는데 필요한 Database(toymembership) 를 생성한다.
  이 코드는 납품시 최초 1 회 실행하며, 백업에 대한 고려는 하지 않았다.
-->

<?php
$dbservername = 'localhost'; // 개발 및 테스트 환경에서는 localhost를 전제로 한다.
$dbusername = 'root';  // 현재 DBMS에 root계정을 이용하여 접속한다.
$dbpassword = '';  // 현재 DBMS root 계정의 패스워드를 적는다.
$dbname = 'toymembership';

require "./asysconfig.php";

// create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword);

// check connection : 연결 확인, 오류가 있으면 메시지 출력 후 프로세스 정료
if ($conn->connect_error) {
  echo outmsg(DBCONN_FAIL);
  die("연결실패 :" . $conn->connect_error);
} else {
  if (DBG) echo outmsg(DBCONN_SUCCESS);
}

// 데이터베이스가 있으면 삭제하고 새롭게 생성
$sql = "DROP DATABASE IF EXISTS toymembership;";
if ($conn->query($sql) == TRUE) {
  if (DBG) echo outmsg(DROPDB_SUCCESS);
}

// 데이터베이스를 생성한다.
$sql = "CREATE DATABASE IF NOT EXISTS toymembership";
// $sql = "CREATE USER IF NOT EXISTS 'toymembership'@'%' IDENTIFIED BY 'toymembership';
// GRANT USAGE ON *.* TO 'toymembership'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
// CREATE DATABASE IF NOT EXISTS toymembership;
// GRANT ALL PRIVILEGES ON `toymembership`.* TO 'toymembership'@'%';";
if ($conn->query($sql) == TRUE) {
  if (DBG) echo outmsg(CREATEDB_SUCCESS);
} else {
  echo outmsg(CREATEDB_FAIL);
}

// 데이터베이스 연결 인터페이스 리소스를 반납한다.
$conn->close();

// 프로세스 플로우를 인덱스 페이지로 돌려준다.
header('Location: index.php');
?>