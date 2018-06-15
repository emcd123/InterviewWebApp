<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$usernameErr = $passwordErr = "";
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "User Name is required";
  } else {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z' ]*$/",$username)) {
      $usernameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if e-mail address is well-formed
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Log In</h2>
<p><span class="error">* required field, please enter data surrounded by ' '</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  User Name: <input type="text" name="username" value="<?php echo $username;?>">
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br>
  Password: <input type="password" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
//echo "<h2>Your Input:</h2>";
//echo $username;
//echo "<br>";
//echo $password;
//echo "<br>";

$servername = "localhost";
$user = "owen";
$pass = "mynewpassword";
$dbname = "Questionaire";

// Create connection
$conn = mysqli_connect($servername, $user, $pass, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
 }
$firstsql = "SELECT username ,password FROM Users Where username=$username AND password=$password AND permissions='super'";
$firstresult = $conn->query($firstsql);
if ($firstresult->num_rows == 1) {
	echo "<h3> Successfully logged in. </h3>";
	header("Location:question_review.php"); 
	exit; // <- don't forget this!
}
else{
$sql = "SELECT username, password FROM Users WHERE username=$username AND password=$password ";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
	echo "<h3> Successfully logged in. </h3>";
	header("Location:questions.php"); 
	exit; // <- don't forget this!
}
}
mysqli_close($conn);
?>

</body>
</html>
