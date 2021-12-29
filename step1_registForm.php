<?php
var_dump($_POST);
var_dump($_GET);
if(empty($_POST)) {
    echo "empty";
} else {
    echo "have value";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>가입 폼</title>
</head>
<body>
    <form action="step1_RegistProcess.php" method="post">
    <label for="me">사용자명 :</label>
        <input type="text" name="username" placeholder="이름을 입력하세요"><br>
        <label for="me">이  메  일 :</label>
        <input type="text" name="email" placeholder="이메일을 입력하세요"><br>
        <label for="me">비밀번호 :</label>
        <input type="text" name="password" placeholder="비번 입력하세요"><br>
        <input type="submit" value="저장">
    </form>
</body> 
</html>