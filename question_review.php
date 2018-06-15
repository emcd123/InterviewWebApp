<!DOCTYPE html>
<html>
<head>
<title>Welcome!</title>
</head>
<body>
<h3> Hello admin </h3>
<p> Here you can review the answers given to each question for all users. </p>
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
$count=1;
foreach($array as $entry){
	echo $count,". ", $entry, '<br><br>';	
	$count++;
}
$query2="SELECT * FROM Answers";
$results = mysqli_query($conn,$query2);
while ($row = mysqli_fetch_assoc($results)) {
    echo '<tr>';
    foreach($row as $field) {
        echo '<td>' . htmlspecialchars($field) . '</td><br>';
    }
    echo '</tr>';
}
?>
<form action="front_page.php">
    <input type="submit" value="Return to home" />
</form>
</body>
</html>
