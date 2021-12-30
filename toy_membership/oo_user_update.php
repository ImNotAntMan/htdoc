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
$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = ".$id;
$resultset = $conn->query($sql);
if($resultset -> num_rows > 0) {
  $row = $resultset -> fetch_assoc();
  $username = $row['username'];
  $email = $row['email'];
  $cellphone = $row['cellphone'];
  } else {
  echo outmsg(INVALID_USER);
  header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="kr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>회원정보 수정 화면</h1>
    <form action="oo_user_updateprocess.php" method="POST">
      <label>사용자 아이디 : </label>
      <input type="text" name="username" placeholder="영숫자 8글자 이상으로 입력해주세요." value="<?=$username?>" required readonly/><br>
      <label>비밀번호 : </label>
      <input type="password" name="passwd" placeholder=""  value="" disabled/><br>
      <label>전화번호 : </label>
      <input type="text" name="cellphone" placeholder="셀폰번호를 010-1234-1234 형식으로 입력해주세요." value="<?=$cellphone?>" required /><br>
      <label>E-Mail : </label>
      <input type="text" name="email" placeholder="이메일 주소를 이메일 주소 형식에 맞게 입력해주세요."  value="<?=$email?>" required /><br>
      <br>
      <input type="hidden" name="id" value="<?=$id?>">
      <input type=submit value="수정"><input type=submit name="cancel" value="취소">
    </form>
  
</body>
</html>