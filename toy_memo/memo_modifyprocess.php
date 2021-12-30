<!-- 
  파일명 : oo_user_updateprocess.php
  파일명 : memo_modifyprocess.php
  최초작업자 : swcodingschool
  최초작성일자 : 2021-12-28
  업데이트일자 : 2021-12-28
  업데이트일자 : 2021-12-30 by 민재기
  
  기능: 
  memo_modify.php 메모 수정 화면에서 입력된 값을 받아, 
  memo 테이블에 수정된 데이터를 업데이트 한다.
-->

<?php
  // db연결 준비
  require "./dbconfig.php";

  // 데이터베이스 작업 전, 메모 수정 화면으로 부터 값을 전달 받고
  $memoid = $_POST['memoid'];
  $userid = $_POST['userid'];
  $subject = $_POST['subject'];
  $contents = $_POST['contents'];
  $registdate = date("Y-m-d H:i:s");
  
  // 현재의 데이터를 받아 온다. 
  $sql = "select * from toymemo where memoid=".$memoid." order by registdate desc";
  $resultset = $conn->query($sql);
  if($resultset->num_rows > 0) {
      $row = $resultset->fetch_assoc();
      $originalsubject = $row['subject'];
      $originalcontents = $row['contents'];
  }

  // 수정 사항이 어떤건지 알아내자.
  if(($subject != $originalsubject) && ($contents != $originalcontents)) {
    $msg = "제목과, 내용 변경";
    $stmt = $conn->prepare("UPDATE toymemo SET subject = ?, contents = ?  WHERE memoid = ?" );
    $stmt->bind_param("sss", $subject, $contents, $memoid);
    $stmt->execute();

    // 수정이 처음일 때 처리하는 루틴
    $sql = "select * from toymemoupdate where memoid=".$memoid;
    $resultset = $conn->query($sql);
    if($resultset->num_rows <= 0) {   //수정이력 사항이 없을 때 처음으로 원본을 넣어 줌.
        $stmt = $conn->prepare("INSERT INTO toymemoupdate(userid, memoid, modifydate, subject, contents, modify) VALUES(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $userid, $memoid, $registdate, $originalsubject, $originalcontents, $msg);
        $stmt->execute();
    }

    $stmt = $conn->prepare("INSERT INTO toymemoupdate(userid, memoid, modifydate, subject, contents, modify) VALUES(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $userid, $memoid, $registdate, $subject, $contents, $msg);
    $stmt->execute();    
  } else if (($subject == $originalsubject) && ($contents != $originalcontents)) {
    $msg = "내용 변경";
    $stmt = $conn->prepare("UPDATE toymemo contents = ?  WHERE memoid = ?" );
    $stmt->bind_param("ss", $contents, $memoid);
    $stmt->execute();
      
    // 수정이 처음일 때 처리하는 루틴
    $sql = "select * from toymemoupdate where memoid=".$memoid;
    $resultset = $conn->query($sql);
    if($resultset->num_rows <= 0) {   //수정이력 사항이 없을 때 처음으로 원본을 넣어 줌.
        $stmt = $conn->prepare("INSERT INTO toymemoupdate(userid, memoid, modifydate, subject, contents, modify) VALUES(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $userid, $memoid, $registdate, $originalsubject, $originalcontents, $msg);
        $stmt->execute();
    }

    $stmt = $conn->prepare("INSERT INTO toymemoupdate(userid, memoid, modifydate, subject, contents, modify) VALUES(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $userid, $memoid, $registdate, $subject, $contents, $modify);
    $stmt->execute();
      
  } else if(($subject != $originalsubject) && ($contents == $originalcontents)) {
    $msg = "제목 변경";
    $stmt = $conn->prepare("UPDATE toymemo SET subject = ? WHERE memoid = ?" );
    $stmt->bind_param("ss", $subject, $memoid);
    $stmt->execute();
    
    // 수정이 처음일 때 처리하는 루틴
    $sql = "select * from toymemoupdate where memoid=".$memoid;
    $resultset = $conn->query($sql);
    if($resultset->num_rows <= 0) {   //수정이력 사항이 없을 때 처음으로 원본을 넣어 줌.
        $stmt = $conn->prepare("INSERT INTO toymemoupdate(userid, memoid, modifydate, subject, contents, modify) VALUES(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $userid, $memoid, $registdate, $originalsubject, $originalcontents, $msg);
        $stmt->execute();
    }
  
    $stmt = $conn->prepare("INSERT INTO toymemoupdate(userid, memoid, modifydate, subject, contents, modify) VALUES(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $userid, $memoid, $registdate, $subject, $contents, $msg);
    $stmt->execute();
  
  } else {
    $msg = "뭘 하실려구??";
    echo "<script>alert('".$msg."')</script>";
  }

//   // 수정이 처음일 때 처리하는 루틴
//   $sql = "select * from toymemoupdate where memoid=".$memoid;
//   $resultset = $conn->query($sql);
//   if($resultset->num_rows <= 0) {   //수정이력 사항이 없을 때 처음으로 원본을 넣어 줌.
//     $stmt = $conn->prepare("INSERT INTO toymemoupdate(userid, memoid, modifydate, subject, contents, modify) VALUES(?, ?, ?, ?, ?, ?)");
//     $stmt->bind_param("sssss", $userid, $memoid, $registdate, $originalsubject, $originalcontents, $msg);
//     $stmt->execute();
//   }
  // create connection
  // get connection 하는 코드를 adbconfig로 이동하며... 
  // 아래 코드는 일단 코멘트 처리함. 2021-12-29 by swcodingschool
  //================  여기부터 ============================================
  // $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

  // // check connection : 연결 확인, 오류가 있으면 메시지 출력 후 프로세스 정료
  // if($conn->connect_error) {
  //   echo outmsg(DBCONN_FAIL);
  //   die("연결실패 :".$conn->connect_error);
  // }else {
  //   if(DBG) echo outmsg(DBCONN_SUCCESS);
  // }
  //================  여기까지 ============================================

//   // 업데이트 처리를 위한 prepared sql 구성 및 bind
//   $stmt = $conn->prepare("UPDATE toymemo SET subject = ?, contents = ?  WHERE memoid = ?" );
//   $stmt->bind_param("sss", $subject, $contents, $memoid);
//   $stmt->execute();

//   $stmt = $conn->prepare("INSERT INTO toymemoupdate(userid, memoid, modifydate, subject, contents) VALUES(?, ?, ?, ?, ?)");
//   $stmt->bind_param("sssss", $userid, $memoid, $registdate, $subject, $contents);
//   $stmt->execute();

  // 데이터베이스 연결 인터페이스 리소스를 반납한다.
  $conn->close();

  // 프로세스 플로우를 인덱스 페이지로 돌려준다.
  header('Location: memo_view.php?userid='.$userid.'&memoid='.$memoid);
?>