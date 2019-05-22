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

// sql to create DB
$sql = "CREATE DATABASE IF NOT EXISTS my_db";
if(!$conn->query($sql)){
    echo "DB creation failed: (" . $conn->errno . ") " . $conn->error;
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
    `ID` int(11) NOT NULL,
    `NAME` varchar(255),
    `AGE` int(10)
)";
if(!$conn->query($sql)){
    echo "Table creation failed: (" . $conn->errno . ") " . $conn->error;
}
// Attempt insert query execution
$sql = "INSERT INTO USERS (ID,NAME, AGE) VALUES
            (1,'Rambo',21),
            (2,'Clark',22),
            (3,'John',23),
            (4,'Harry',24)";
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
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
