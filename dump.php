echo '<h1> hello </h1>';

$query="SELECT * FROM Users";
$results = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($results)) {
    echo '<tr>';
    foreach($row as $field) {
        echo '<td>' . htmlspecialchars($field) . '</td>';
    }
    echo '</tr>';
}




$sql=mysqli_query("SELECT FROM users (username, password) WHERE $username=$username");
 if(mysql_num_rows($sql)>=1)
   {
    echo"name already exists";
   }
 else
    {
   //insert query goes here
    }