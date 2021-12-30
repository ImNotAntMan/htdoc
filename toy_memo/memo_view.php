<?php
require "dbconfig.php";
$memoid = $_GET['memoid'];
$userid = $_GET['userid'];
$subject = "없네?";
$contents = "없어?";
$registdate = "웅?";
$sql = "SELECT * FROM toymemo WHERE memoid=".$memoid;
$resultset = $conn->query($sql);
if($resultset->num_rows > 0) {
    $row = $resultset->fetch_assoc();
    $memoid = $row['memoid'];
    $subject = $row['subject'];
    $contents = $row['contents'];
    $registdate = $row['registdate'];
}
?>

<!DOCTYPE html>
<html lang="kr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>toy project 1st</title>
</head>
<body>
  <h1>메모 보기</h1>
    <input type="hidden" value="1" name="userid">
    <label>생성일 : </label><input maxlength="140" type="text" name="registdate" value="<?=$registdate?>" /><br>
    <label>제목 : </label><input type="text" name="subject" value="<?=$subject?>"/><br>
    <label>내용 : </label><input type="textbox" name="contents" value="<?=$contents?>" /><br>
    <br>
    <a href="memo_modify.php?memoid=<?=$memoid?>">수정</a>
    <a href="index.php">리스트</a>
    <a href="delete_memo.php?memoid=<?=$memoid?>">삭제</a>
 </body>
</html>