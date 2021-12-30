<!-- 
  파일명 : adbconfig.php
  최초작업자 : swcodingschool
  최초작성일자 : 2021-12-28
  업데이트일자 : 2021-12-28
  
  기능: 
  DBMS 시스템에 접속하기 위한 기본 정보를 포함한다.
  상용 소프트웨어 제작시에는 DBMS별, 버전별 configuration 정보에 따라 
  동작하도록 구성하여야 한다.
-->
<?php
$dbservername = 'localhost'; // 개발 및 테스트 환경에서는 localhost를 전제로 한다.
$dbusername = 'toymembership';  // 현재 DBMS에 root계정을 이용하여 접속한다.
$dbpassword = 'toymembership';  // 현재 DBMS root 계정의 패스워드를 적는다.
$dbname = 'toymembership';

require_once "asysconfig.php"; // 시스템 관리를 위한 각종 환경 변수 및 메시지 처리
?>