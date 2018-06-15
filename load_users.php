 <?php
$servername = "localhost";
$username = "owen";
$password = "mynewpassword";
$dbname = "Questionaire";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$f = fopen("users.txt", "r");
while(!feof($f)) { 
  $data = explode(" ", fgets($f));
  $name = $data[0];
  $password = $data[1];
  $reg_date = $data[2];
  $permissions = $data[3];
  mysqli_query("INSERT INTO Users (name, password, reg_date, permissions) values ('$name', '$password', '$reg_date', '$permissions')") or die(mysqli_error());;
}
fclose($f);

mysqli_close($conn);
?>