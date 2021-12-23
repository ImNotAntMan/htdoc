<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-kr">
    </head>

    <body>
        <h1>Array Example</h1>
        <?php
            $coworkers = array (
                '반장' => '이만기',
                '부반장' => '홍길동',
                '총무' => '성춘향');
            echo $coworkers['반장']."<br>";
            echo $coworkers['부반장']."<br>";
            var_dump($coworkers);
            echo "<br>";
            echo count($coworkers)."<br>";
            var_dump(count($coworkers));
            echo "<br>";
            echo "hey";
            echo "<br>";

            //배열에 새로운 요소 추가
            $coworkers += ['하루방' => '고유비'];
            $coworkers += ['미화부장' => '민재기'];
            var_dump($coworkers);
            echo "<br>";

        ?>
    </body>
</html>
<?php

?>