<?php
$con=mysqli_connect("mysql","root","root");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
   else {
    echo "Connected successfully";
}
  
mysqli_close($con);
?>
