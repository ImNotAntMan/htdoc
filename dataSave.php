<?php
$name = $_POST["name"];          // 전송받은 데이터 대입
$gender = $_POST["gender"];
$email = $_POST["email"];
$member = "";


echo "이름 : ".$name."<br/>";    // 데이터 출력
echo "성별 : ".$gender."<br/>";
echo "이메일 : ".$email;

$fp = fopen("list.txt", 'a');    // list.txt 파일을 쓰기 전용으로 열고 반환된 파일 포인터를 $fp에 저장.

$str = $name."\t".$gender."\t".$email."\n";
fwrite($fp, $str);               // list.txt 파일에 $str 변수를 저장함.

fclose($fp);                     // list.txt 파일 닫음.
echo "회원 등록 완료<br>";
$fp = fopen("list.txt", 'r');    // list.txt 파일을 쓰기 전용으로 열고 반환된 파일 포인터를 $fp에 저장.
while(!feof($fp)) {
    $member = fgets($fp);
    echo $member."<br>";
}
$dir    = '.';
$files = scandir($dir);

print_r($files);
$i = 0;
while($i < count($files)) {
    echo $files[$i];
    echo "<br>";
    ++$i;
}
?>