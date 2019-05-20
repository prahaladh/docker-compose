<?php
$con=mysqli_connect("localhost","my_user","my_password","my_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  mysqli_query($con,"CREATE Database test_db");
  
  mysqli_query($con,"CREATE TABLE employee( '.
      'emp_id INT NOT NULL AUTO_INCREMENT, '.
      'emp_name VARCHAR(20) NOT NULL, '.
      'emp_address  VARCHAR(20) NOT NULL, '.
      'emp_salary   INT NOT NULL, '.
      'join_date    timestamp(14) NOT NULL, '.
      'primary key ( emp_id ))");
	  
 $result = mysqli_query($con,"SELECT emp_id, emp_name, emp_salary FROM employee");
  
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["emp_id"]. " - Name: " . $row["emp_name"]. " " . $row["emp_salary"]. "<br>";
    }
} else {
    echo "0 results";
}
  
mysqli_close($con);
?>
