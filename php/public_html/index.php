<h1>Hello!</h1>
<h4>Attempting MySQL connection from php...</h4>
<?php
$host = 'mysql';
$user = 'root';
$pass = 'root';
$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected to MySQL successfully!";

// Make my_db the current database
$db_selected = mysqli_select_db('my_db', $conn);

if (!$db_selected) {
  // If we couldn't, then it either doesn't exist, or we can't see it.
  $sql = 'CREATE DATABASE my_db';

  if (mysqli_query($sql, $conn)) {
      echo "Database my_db created successfully\n";
  } else {
      echo 'Error creating database: ' . mysqli_error() . "\n";
  }
}
$dbname='my_db';
// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS `USERS` (
    `ID` int(11) unsigned NOT NULL auto_increment,
    `NAME` varchar(255) NOT NULL default '',
    `AGE` int(10) NOT NULL default ''
)";
if(!$conn->query($sql)){
    echo "Table creation failed: (" . $conn->errno . ") " . $conn->error;
}
// Attempt insert query execution
$sql = "INSERT INTO USERS (NAME, AGE) VALUES
            ('Rambo', '21'),
            ('Clark',  '22'),
            ('John', '23'),
            ('Harry', , '24')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
$sql = "SELECT * FROM USERS";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["NAME"]. " AGE:" . $row["AGE"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
