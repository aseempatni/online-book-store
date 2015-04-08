<?php
$con=mysqli_connect("10.117.9.250","aseem","aseem","12CS10023");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Perform queries 
$result = mysqli_query($con,"SELECT * FROM BS_BOOKS limit 10");
// mysqli_query($con,"INSERT INTO Persons (FirstName,LastName,Age) 
// VALUES ('Glenn','Quagmire',33)");
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ISBN: " . $row["ISBN"]. " - Title: " . $row["Title"]. " " . $row["PRICE"]. "<br>";
    }
} else {
    echo "0 results";
}
mysqli_close($con);
?>