<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 폼</title>
</head>
<body>
    <h1>로그인 시스템 제작 테스트</h1>
    <form action="step1_LoginProcess.php" method="post">
        <label for="me">User Name :</label>
        <input type="text" name="username" placeholder="사용자명을 입력해주세요."><br>
        <label for="me">Password :</label>
        <input type="text" name="password" placeholder="암호를 입력해주세요"><br>
        <input type="submit" name="submit" value="로그인">
    </form>
</body>
</html>