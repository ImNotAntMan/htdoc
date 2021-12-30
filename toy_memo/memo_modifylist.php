<?php
$subject = "테스트";
$content = "테스트";
$datestream = date("Y-m-d", time());
$username = "username";
$userid = 1;    // 회원 정보를 가져 오지 않고 실행 하기 때문에 1로 고정
$memoid = $_GET['memoid'];
require "dbconfig.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메모 수정 이력</title>
</head>
<body>
    <table>
        <tr>
        <th>제목</th><th>생성일<br>최종수정일</th><th>변경유형</th><th></th><th></th><th></th>
        </tr>
        <?php
        //    $sql = "SELECT * FROM toymemoupdate where memoid=".$memoid;
           $sql = "select toymemo.memoid,toymemo.userid, toymemo.subject, toymemo.contents, toymemoupdate.modifydate, toymemoupdate.subject, toymemoupdate.contents, toymemoupdate.modify from toymemo LEFT join toymemoupdate on toymemo.memoid = toymemoupdate.memoid where toymemo.memoid =".$memoid." order by modifydate desc";

           $resultset = $conn->query($sql);

           if($resultset->num_rows > 0) {
            while( $row = $resultset->fetch_assoc() ) {
                $subject = $row['subject'];
                $modifydate = $row['modifydate'];
                $modify = $row['modify'];
                if(empty($modifydate)) {
                    $modifydate = "수정이력이 없습니다.";
                }
                echo "<tr>";
                echo "<td>";
                echo "<a href='memo_view.php?memoid=".$row['memoid']."&userid=".$row['userid']."'>";
                echo $subject;
                echo "</a>";
                echo "</td>";
                echo "<td>";
                echo $modifydate."<br>";
                echo "</td>";
                echo "<td>";
                echo "</td>";
                echo "<td>";
                echo $modify;
                echo "</td>";
                echo "<td>";
                echo "</td>";
                echo "<td>";
                echo "</td>";
                echo "</tr>";
             } 
            } 
        ?>
    </table>
    <table>
        <tr>
            <td>
                <a href="memo_writeForm.html">새로운 메모 작성</a>
                <a href="index.php">리스트로 돌아가기</a>
            </td>
        </tr>
    </table>

</body>
</html>