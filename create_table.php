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
$sql = "CREATE TABLE Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
permissions VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Users created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// sql to create table
$sql = "CREATE TABLE Questions (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
question1 VARCHAR(100) NOT NULL,
question2 VARCHAR(100),
question3 VARCHAR(100)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Questions created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);

?> 