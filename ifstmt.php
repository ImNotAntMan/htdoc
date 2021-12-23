<?php
$LOGIN = 1;
$userName = "이만기";
    if($LOGIN) {
?>
    <h1 style="font-size: 78px;color:red;border:10px solid black;width:1300px;height:200px;"><?= $userName ?>님이 로그인 하셨습니다.</h1>
    <h1>if문이 참인 경우 이 문장이 샐행됩니다.</h1>
<?php
    } else {
?>
    <h1>LogIn이 필요합니다.</h1>
<?php
    }


    $array = array(
        1    => "a",
        "1"  => "b",
        1.5  => "c",
        true => "d",
    );
    var_dump($array);
?>