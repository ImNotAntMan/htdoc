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
$username = $_POST['username'];
$password = $_POST['password'];
//$email = $_POST['email'];

// 2.
// 사용자명 또는 비밀번호 중 하나라도 입력하지 않았으면 다시 로그인폼 화면으로 돌려 보낸다.
if(empty($username) || empty($password)) {
    echo "<script>alert('ddddd.')</script>";
    header('Location: step1_LoginForm.php?'.'dddddd');
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

// 3.2 sql문 구성
$stmt = $dbconn -> stmt_init();
$stmt = $dbconn -> prepare("select * from users where username = ? and userpwd = sha2(?, 256)");
$stmt -> bind_param("ss", $username, $password);
$stmt ->execute();
$result = $stmt->get_result();

// 4, 5.
//$resultset = mysqli_query($dbconn, $sql);
//var_dump($resultset);

if($result->num_rows > 0) {
    //echo "<script>alert('".$username."');</script>";
    echo "<script>alert('".$username."환영');</script>";
    header('Location: step1_LoginSucess.php');
} else {
    echo "<script>alert('사용자가 존재하지 않습니다.')</script>";
    header('Location: step1_LoginForm.php?'.'존재하지 않는 사용자');
}
?>