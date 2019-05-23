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
echo "\n\nConnected to MySQL successfully!\n\n";

// sql to create DB
$sql = "CREATE DATABASE IF NOT EXISTS my_db";
if(!$conn->query($sql)){
    echo "\n\nDB creation failed: (" . $conn->errno . ") \n\n" . $conn->error;
}
$dbname='my_db';
// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("\n\nConnection failed: \n\n" . $conn->connect_error);
} 
// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS `USERS` (
    `ID` int(11) NOT NULL,
    `NAME` varchar(255),
    `AGE` int(10)
)";
if(!$conn->query($sql)){
    echo "\n\nTable creation failed: (" . $conn->errno . ")\n\n " . $conn->error;
}
// Attempt insert query execution
$sql = "INSERT INTO USERS (ID,NAME, AGE) VALUES
            (1,'Rambo',21),
            (2,'Clark',22),
            (3,'John',23),
            (4,'Harry',24)";
if(mysqli_query($conn, $sql)){
    echo "\n\nRecords added successfully.\n\n";
} else{
    echo "\n\nERROR: Could not able to execute $sql. \n\n" . mysqli_error($conn);
}
$sql = "SELECT * FROM USERS";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "\n\n\n\nid: " . $row["ID"]. " - Name: " . $row["NAME"]. " AGE:" . $row["AGE"]. "<br>\n\n\n\n";
    }
} else {
    echo "\n\n0 results\n\n";
}
$conn->close();
?>
