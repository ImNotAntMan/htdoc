<?php
  require "./adbconfig.php";

  // create connection
  $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

  // check connection : 연결 확인, 오류가 있으면 메시지 출력 후 프로세스 정료
  if($conn->connect_error) {
    echo outmsg(DBCONN_FAIL);
    die("연결실패 :".$conn->connect_error);
  }else {
    if(DBG) echo outmsg(DBCONN_SUCCESS);
  }
  $sql = "SELECT * FROM users";
  $resultset = $conn->query($sql);
// 여기까진 다 아시는 거고
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>html과 PHP가 뒤섞인 코딩 My Style</title>
</head>
<body>
    <table style="border: 1px solid red"> 테이블의 시작
        <tr>
        <th>Num</th><th>셩명</th><th>전화번호</th>
        <th>이메일</th><th>등록일</th>
        </tr>
        <?php
        $i = 1;
        while($row = $resultset->fetch_assoc()) { // tr 생성 테스트
            // 참고로 fetch_assoc는 키값을 이름으로 받아옵니다.(named index)
            // fetch_array는 키값을 번호로 받아옵니다.(numbered index)
            echo "<tr>";
            echo "<td>";
            echo   $i;
            echo "</td>";
            echo "<td>";
            echo $row['username'];
            echo "</td>";
            echo "<td>";
            echo $row['cellphone'];
            echo "</td>";
            echo "<td>";
            echo $row['email'];
            echo "</td>";
            echo "<td>";
            echo $row['registdate'];
            echo "</td>";
            echo "</tr>";
            $i++;
        }
        ?>
    </table> 테이블의 끝
</body>
</html>