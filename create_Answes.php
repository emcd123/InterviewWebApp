 
 <!DOCTYPE html>
<html>
<body>
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

// sql to create table
$sql = "CREATE TABLE Answers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
answer VARCHAR(200) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Answers created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
?>
</body>
</html>
