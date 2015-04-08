<div class="list-group">
<?php

$q = $_GET['q'];
$con=mysqli_connect("10.5.18.66","12CS10023","btech12","12CS10023");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


// Perform queries 
// $query = "SELECT * FROM BS_BOOKS where Title like '%".$q."%' limit 10";
$query = "SELECT * FROM BS_BOOKS natural join `BX-Books` as b where Title like '%".$q."%' limit 15";
$result = mysqli_query($con,$query);

// mysqli_query($con,"INSERT INTO Persons (FirstName,LastName,Age) 
// VALUES ('Glenn','Quagmire',33)");
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       echo ' <a href="#" class="list-group-item">
        <div class="row">
       <div class="col-md-3">
    	<img src = '.$row["Image-URL-M"].'>
    	</div>
       <div class="col-md-9">
    <h4 class="list-group-item-heading">'. $row["Title"] . '</h4>
    <p class="list-group-item-text">';
        echo "<b>ISBN: </b>" . $row["ISBN"]. "<br>".
        "<b> Price: </b>" . $row["PRICE"]. "<br>".
        "<b> Language: </b>" . $row["LANGUAGE"]. "<br>".
        "<b> Cover: </b>" . $row["COVER"]. "<br>".
        "<b> Dimension: </b>" . $row["DIMENSION"]. "<br>".
        "<b> Rating: </b>" . $row["Rating"]. "<br>".
        "<b> Pages: </b>" . $row["PAGES"]. "<br>"
        ;
    echo '</p>
    </div>
    	</div>
  </a>';
    }
} else {
    echo "0 results";
}
mysqli_close($con);
?>
</div>