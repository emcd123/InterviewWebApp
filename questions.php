<!DOCTYPE html>
<html>
<head>
<title>Answer Questions</title>
</head>
<ody>
<?php
// define variables and set to empty values
$nameErr = $question1Err = $question2Err = $question3Err = "";
$name = $question1 = $question2 = $question3 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["question1"])) {
    $question1Err = "Answer is required";
  } else {
    $question1 = test_input($_POST["question1"]);
  }
    
  if (empty($_POST["question2"])) {
    $question2 = "Answer is required";
  } else {
    $question2 = test_input($_POST["question2"]);
  }

  if (empty($_POST["question3"])) {
    $question3 = "Answer is required";
  } else {
    $question3 = test_input($_POST["question3"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<?php
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

$query = $conn->query("SELECT questions FROM Questions;");
$array = Array();
while($result = $query->fetch_assoc()){
    $array[] = $result['questions'];
}
?>

<h2>Questionaire</h2>
<h3> Please answer the below questions. </h3>
<p><span class="error">* required field, please enter data surrounded by ' '</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  User Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  <?php echo $array[0]?><br><br> <input type="text" name="question1" value="<?php echo $question1;?>">
  <span class="error"> <?php echo $question1Err;?></span>
  <br><br>
  <?php echo $array[1]?><br><br> <input type="text" name="question2" value="<?php echo $question2;?>">
  <span class="error"><?php echo $question2Err;?></span>
  <br><br>
  <?php echo $array[2]?><br><br> <input type="text" name="question3" value="<?php echo $question3;?>">
  <span class="error"><?php echo $question3Err;?></span>
  <br><br>
	<input type="submit" name="submit" value="Submit">
</form>

<?php
//echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $question1;
echo "<br>";
echo $question2;
echo "<br>";
echo $question3;

//Redirect to page that gives you a successfully submitted message.
if(isset($_POST['submit'])){
	//need to write query that inserts these answers with username into rows in the database
	$sql = "INSERT INTO Answers (`name`, `answer1`, `answer2`, `answer3`) VALUES ($name, $question1,$question2, $question3)";
	mysqli_query($conn,$sql);
	echo "<h3> Successfully Submitted. </h3>";
	header("Location:submitted.php"); 
	exit; // <- don't forget this!
}
mysqli_close($conn);
?>
</body>
</html>
