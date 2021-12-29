<?php
require_once "util/dbutil.php";

try {
    $conn = new PDO("mysql:host=$HOSTNAME;dbname=webdb", $USERNAME, $PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  ?>
?>