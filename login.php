<?php
namespace loginex;
// if(isset($_POST)) {
//     echo "데이터 없음.";
// } else {
//     echo "데이터 있음.수상함.";
// }
if(!empty($_POST)) {
    $input_username = $_POST['userName'];
    $input_password = $_POST['password'];    
    echo "폼에 입력된 항목이 있네요.";
    echo count($_POST);
    // 필요한 작업 내용을 pseudo code로 표현해 보자
    // 데이터베이스와 연결(get connection)
    require_once './util/dbutil.php';
    // 질의를 구성한다. id와 password를 만족하는 항목이 있는지 확인
    // 질의를 실행
    // 실행한 결과 해당 항목이 있으면 ==> 로그인 성공, 성공페이지로 이동
    // 실행한 결과 해당 항목이 없으면 ==> 로그인 실패, 로그인 페이지로 이동

} else {
    $input_username = "";
    echo "<script>alert('사용자명을 입력해 주세요!');</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
</head>
<body>
    <form name="frmUser" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="">User Name : </label>
        <input type="text"value="<?=$input_username?>" name="userName" placeholder="Input your name"><br>
        <label for="">Password : </label>
        <input type="password" name="password" placeholder="inpu your password"><br>
        <label for="">Email : </label>
        <input type="email" name="email" placeholder="inpu your email" ><br>
        <input type="submit" value="Login" name="submit">
    </form>
</body>
</html>