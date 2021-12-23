
<?php
$idErr = $passErr = $nameErr = $phoneErr = $emailErr = $genderErr = $websiteErr = "";
$id = $password = $name = $phone = $email = $gender = $comment = $website = "";

function validation_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["id"])) {
        $idErr = "ID is required";
      } else {
        $id = validation_input($_POST["id"]);
        if (!preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$",$id)) {
            $idErr = "최소 8 자, 하나 이상의 대문자, 하나의 소문자 및 하나의 숫자";
          } else {
            $idErr = "적합";
          }
      }

      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } else {
        $name = validation_input($_POST["name"]);
        if (!preg_match("/^[가-힣 a-zA-Z-' ]*$/",$name)) {
            $nameErr = "한글 1글자 이상 4글자 이하";
          }
      }
          
      if (empty($_POST["password"])) {
        $passErr = "Password is required";
      } else {
        $password = validation_input($_POST["password"]);
        if (!preg_match("^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$",$password)) {
            $passErr = " 8글자 이상 알파벳, 1개 이상 대문자, 1개 이상 숫자, 1개 이상 특수 문자";
          }
      }

      if (empty($_POST["phone"])) {
        $phoneErr = "Cell Phone is required";
      } else {
        $name = validation_input($_POST["phone"]);
        if (!preg_match("/\d{3}-\d{4}-\d{4}/;",$phone)) {
            $phoneErr = "010-1234-1234";
          }
      }

      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = validation_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
          }
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/register.css">
    <title>회원 가입</title>
</head>
<body>
<h2>PHP Form Validation Example</h2>
<br>
<p><span class="error">* required field</span></p>
<br>
<div>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="id">* ID * <?php echo $idErr;?></label>
    <input type="text" id="id" name="id" placeholder="Your ID.." >

    <label for="password">* Password * <?php echo $passErr; ?></label>
    <input type="text" id="password" name="password" placeholder="Your Password..">

    <label for="name">* Your Name * <?php echo $nameErr; ?></label>
    <input type="text" id="name" name="name" placeholder="Your name..">

    <label for="phone">* Your CellPhone * <?php echo $phoneErr; ?></label>
    <input type="text" id="phone" name="phone" placeholder="Your Phone Number..">

    <label for="email">Email * <?php echo $emailErr;?></label>
    <input type="email" id="email" name="email" placeholder="Your email..">
  
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>