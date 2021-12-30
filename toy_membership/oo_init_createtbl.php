<!-- 
  파일명 : oo_init_createtbl.php
  최초작업자 : swcodingschool
  최초작성일자 : 2021-12-28
  업데이트일자 : 2021-12-28
  
  기능: 
  데이터베이스 toymembership 에 사용자 등록을 위한 users 테이블을 생성한다.
  이 코드는 납품시 최초 1 회 실행하며, 백업에 대한 고려는 하지 않았다.

  테이블 구성 : 
  CREATE TABLE `toymembership`.`users` ( `id` INT(6) NOT NULL AUTO_INCREMENT , `username` VARCHAR(20) UNIQUE NOT NULL COMMENT 'user account' , `password` VARCHAR(256) NOT NULL COMMENT 'user password' , `cellphone` VARCHAR(13) NOT NULL COMMENT 'phone number' , `email` VARCHAR(50) NOT NULL COMMENT 'mail address' , `registdate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'registration date' , `lastdate` DATETIME NULL COMMENT 'last login date' , `status` INT NULL DEFAULT '0' COMMENT 'activity status' , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci COMMENT = 'users registration table';
-->

<?php
  require "./adbconfig.php";

  // create connection
  $conn = new mysqli($dbservername, $dbusername, $dbpassword,$dbname);

  // check connection : 연결 확인, 오류가 있으면 메시지 출력 후 프로세스 정료
  if($conn->connect_error) {
    echo outmsg(DBCONN_FAIL);
    die("연결실패 :".$conn->connect_error);
  }else {
    if(DBG) echo outmsg(DBCONN_SUCCESS);
  }

  // 기존 테이블이 있으면 삭제하고 새롭게 생성
  $sql = "DROP TABLE IF EXISTS users";
  if($conn->query($sql) == TRUE){
    if(DBG) echo outmsg(DROPTBL_SUCCESS);
  }

  // 테이블을 생성한다.
  $sql = "CREATE TABLE `toymembership`.`users` (
     `id` INT(6) NOT NULL AUTO_INCREMENT , 
     `username` VARCHAR(20) UNIQUE NOT NULL COMMENT 'user account' , 
     `passwd` VARCHAR(256) NOT NULL COMMENT 'user password' , 
     `cellphone` VARCHAR(13) NOT NULL COMMENT 'phone number' , 
     `email` VARCHAR(50) NOT NULL COMMENT 'mail address' , 
     `registdate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'registration date' , 
     `lastdate` DATETIME NULL COMMENT 'last login date' , 
     `status` INT NULL DEFAULT '0' COMMENT 'activity status' , 
     PRIMARY KEY (`id`)
     ) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci COMMENT = 'users registration table';";
  
  if($conn->query($sql) == TRUE){
    if(DBG) echo outmsg(CREATETBL_SUCCESS);
  }else{
    echo outmsg(CREATETBL_FAIL);
  }

  // 데이터베이스 연결 인터페이스 리소스를 반납한다.
  $conn->close();

  // 프로세스 플로우를 인덱스 페이지로 돌려준다.
  header('Location: index.php');
?>