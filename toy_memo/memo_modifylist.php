<?php
$subject = "테스트";
$content = "테스트";
$datestream = date("Y-m-d", time());
$username = "username";
$userid = 1;
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
        <th>제목</th><th>생성일<br>최종수정일</th><th>사용자이름</th><th></th><th></th><th></th>
        </tr>
        <?php
           $sql = "SELECT * FROM toymemoupdate where memoid=".$memoid;
           $sqljoin = "select
           toymemo.subject,
           toymemo.contents,
           toymemoupdate.modifydate
           from toymemo
           LEFT join toymemoupdate on toymemo.memoid = toymemoupdate.memoid";

           $resultset = $conn->query($sql);

           if($resultset->num_rows > 0) {
            while( $row = $resultset->fetch_assoc() ) {
                echo "<tr>";
                echo "<td>";
                echo "<a href='memo_view.php?memoid=".$row['memoid']."&userid=".$row['userid']."'>";
                echo $row['subject'];
                echo "</a>";
                echo "</td>";
                echo "<td>";
                echo $row['modifydate']."<br>";
                echo $row['registdate'];
                echo "</td>";
                echo "<td>";
                echo $row['userid']."홍길동";
                echo "</td>";
                echo "<td>";
                echo "<a href='memo_modify.php?memoid=".$row['memoid']."'>수정</a>";
                echo "</td>";
                echo "<td>";
                echo "<a href='memo_delete.php?memoid=".$row['memoid']."'>삭제</a>";
                echo "</td>";
                echo "<td>";
                echo "<a href='memo_modifylist.php?memoid=".$row['memoid']."'>수정이력</a>";
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
            </td>
        </tr>
    </table>

</body>
</html>