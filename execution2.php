<?php
require_once "util/dbutil.php";

$mysqli = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DATABASENAME);
$mysqli -> query("Drop table if exists test");
$mysqli -> query("Create table test(id int)");
$mysqli -> query("insert into test(id) values (1), (2), (3), (4)");

$result =  $mysqli -> query("Select id from test order by id asc");
echo "Reverse Order....<br>";
for($row_no = $result -> num_rows - 1;$row_no >= 0; $row_no--) {
//    var_dump($result)."<br>";
    $result -> data_seek($row_no);
    $row = $result -> fetch_assoc();
    echo "id = ".$row['id']."<br>";
}

echo "Result set order....<br>";
foreach($result as $row) {
    echo "id = ".$row['id']."<br>";
}
?> 