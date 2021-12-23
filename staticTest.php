<!DOCTYPE html>
<html>
<body>

<?php
class greeting {
  public static function welcome() {
    echo "Hello World!";
  }
}

class SomeOtherClass {
  public function message() {
    greeting::welcome();
  }
}
$a = new SomeOtherClass();
$a -> message();
?>
 
</body>
</html>