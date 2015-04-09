
<h4>
Categories
</h4>
<?php
// echo $querybase;
$query = "select (GENRE), count(ISBN) as c from BS_M_GENRE where ISBN in (". $isbnquery.") group by GENRE order by count(ISBN) desc limit 15";
// echo $query;
$result = mysqli_query($con,$query);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo ' <li class = "filter"><input type="checkbox" name="aauthor" value="Bike"> <a href="query.php?q='.$row["GENRE"].'&qtype=Category">'.$row["GENRE"].'</a> ('.$row["c"].')</li>';
}
} else {
echo "0 results";
}
?>
<h4>
  Author
</h4>
<?php
$query = "select (NAME), count(ISBN) as c from (". $isbnquery.") as x natural join BS_AUTHOR group by NAME order by count(ISBN) desc limit 15";
// $query = "select distinct(NAME), count(*) as c from BS_AUTHOR group by NAME order by count(ISBN) desc limit 15";
$result = mysqli_query($con,$query);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo ' <li class = "filter"><input type="checkbox" name="aauthor" value="Bike"> <a href="query.php?q='.$row["NAME"].'&qtype=Author">'.$row["NAME"].'</a> ('.$row["c"].')</li>';
}
} else {
echo "0 results";
}
?>
<h4>
  Format
</h4>
<?php
$query = "select (COVER), count(ISBN) as c from (". $isbnquery.") as x natural join BS_BOOKS group by COVER order by count(ISBN) desc limit 15";
// $query = "select distinct(COVER), count(*) as c from BS_BOOKS group by COVER order by count(ISBN) desc limit 15";
$result = mysqli_query($con,$query);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo ' <li class = "filter"><input type="checkbox" name="aauthor" value="Bike"> <a href="#">'.$row["COVER"].'</a> ('.$row["c"].')</li>';
}
} else {
echo "0 results";
}
?>
<h4>
  Language
</h4>
<?php
$query = "select (LANGUAGE), count(*) as c from (".$isbnquery .") as x natural join BS_BOOKS group by LANGUAGE order by count(ISBN) desc limit 5";
$result = mysqli_query($con,$query);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo ' <li class = "filter"><input type="checkbox" name="aauthor" value="Bike"> <a href="#">'.$row["LANGUAGE"].'</a> ('.$row["c"].')</li>';
}
} else {
echo "0 results";
}
?>
