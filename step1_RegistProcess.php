<?php
// Pseudo Code : 처리과정을 일상의 언어로 적어가는 것
/*
    1. get the value from $_POST
    2. Form validation 진행(전돨된 값이 공백이면 다시 값을 입력하라고 요청한다.)
    3.1 데이터베이스를 연결하고
    3.2 질의어를 구성한다.
    4. 구성된 질의어를 실행시킨다.(Mysql에 질의를 던진다.)
    5. 실행 결과를 돌려 받는다.
    6.1 결과를 확인하고 결과가 있으면 로그인 성공 페이지로 이동.
    6.2 결과가 없으면 로그인 실패 다시 로그인 페이지로 이동.
*/
// 1.
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$email = trim($_POST['email']);
$errMessage = $_GET;
if(empty($errMessage)) {

} else {
    echo "<script>alert('dddddd');</script>";
}
// 2.
// 사용자명 또는 비밀번호 중 하나라도 입력하지 않았으면 다시 로그인폼 화면으로 돌려 보낸다.
if(empty($username) || empty($password)) {
    // echo "<script>alert('ddddd.')</script>";
    header('Location: step1_RegistForm.php?err=');
}

// 3.1 데이터베이스 연결
$host = "localhost";
$user = "webapp";
$pass = "webapp";
$db = "webdb";
$dbconn = mysqli_connect($host, $user, $pass, $db);
// $dbconn = mysqli_connect("localhost", "webapp", "webapp", "webdb");
if(is_null($dbconn)) {
    echo "데이터베이스 연결에 문제가 생겼습니다.";
}
$sql = "select username from users where username='".$username."'";
$result = mysqli_query($dbconn, $sql);
if($result->num_rows > 0) {
    echo "<script>alert('이미 가입하신 분입니다.')</script>";
    header('Location: step1_RegistForm.php?'.'dddddafsfdad');
} else {
// 3.2 sql문 구성
    $stmt = $dbconn -> stmt_init();
    $stmt = $dbconn -> prepare("insert into users (username, userpwd, email) values(?, sha2(?, 256), ?)");
// $sql = "insert into users (username, userpwd, email) values('".$username."', sha2('".$password."', 256),'".$email."')";
    $stmt -> bind_param("sss", $username, $password, $email);
    $stmt ->execute();
    $result = $stmt->get_result();
    // 4, 5.
    var_dump($result)."<br>";
    if($stmt) {
        var_dump($stmt)."<br>";
        $stmt -> close();
        header('Location: step1_LoginForm.php');
    } else {
        var_dump($stmt)."<br>";
        $stmt -> close();
        header('Location: step1_RegistForm.php');
    }
}
?>