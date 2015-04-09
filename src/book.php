<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">

    <title>Book Store</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- // <script src="../assets/js/ie-emulation-modes-warning.js"></script> -->
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script>
    // document.onkeydown=function(){
    //     if(window.event.keyCode=='13'){
    //         getbooks();
    //         return false;
    //     }
    // }
    function getbooks() {
      str = document.getElementById("qterm").value;
  // console.log(str);
  if (str == "") {
    document.getElementById("books").innerHTML = "";
    return;
} else {
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("books").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getbook.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<link rel="stylesheet" href="style.css" />

<script type="text/javascript" src="script.js"></script>
<style>
body {
  min-height: 2000px;
  padding-top: 70px;
}

</style>

<style>
li.filter
{
    list-style-type: none;
}
</style>

<script type="text/javascript" src = "stars.js"> </script>
<link rel="stylesheet" href="stars.css" />

  </head>
  <body>

<?php include 'connect.php';?>

<?php
$q = $_GET['q'];
if(isset($q)) {
  $querybase = "SELECT * FROM BS_BOOKS as a left join `BX-Books` as b on a.ISBN = b.ISBN left join BS_M_GENRE as g on a.ISBN = g.ISBN where a.ISBN = '".$q."' limit 1 ";
}
?>
<?php include 'nav.php';?>

<div class="container">

    <?php

    if(isset($q)) {

    // Perform queries 
    // $query = "SELECT * FROM BS_BOOKS where Title like '%".$q."%' limit 10";
      $query = $querybase." group by ISBN limit 15";
      // echo $querybase;
      $result = mysqli_query($con,$querybase);

    // mysqli_query($con,"INSERT INTO Persons (FirstName,LastName,Age) 
    // VALUES ('Glenn','Quagmire',33)");
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           echo '  <div class="col-md-4">

           <img src = '.$row["Image-URL-L"].' width="100%">

</div>
<div id = "books" class="col-md-8">

 <a href="#" class="list-group-item">
           <div class="row">
           <h4 class="list-group-item-heading">'. $row["Title"] . '</h4>
           <p class="list-group-item-text">';
?>

<div class="col-md-6">
  <?php
  echo '<b> Rating: </b>'.'<span class="stars"><span style="width: '.( (  floatval($row["Rating"]) )/5)*80 .'px;"></span></span><br>'.
  "<b>ISBN: </b>" . $row["ISBN"]. "<br>".
  "<b> Price: </b>" . $row["PRICE"]. "<br>".
  "<b> Language: </b>" . $row["LANGUAGE"]. "<br>".
  "<b> Cover: </b>" . $row["COVER"]. "<br>".
  "<b> Dimension: </b>" . $row["DIMENSION"]. "<br>".
  "<b> Pages: </b>" . $row["PAGES"]. "<br>"
  ;
  ?>
</div>
<div class="col-md-6">

<p>
      <b>
        Authors: 
      </b>
            <?php
            $query = "select * from BS_AUTHOR where ISBN = '".$q. "' limit 1";
            $result = mysqli_query($con,$query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                 echo $row["NAME"].', ';
             }
         } else {
            echo "0 results";
        }
        ?>
        <br>
      <b>
        Publisher: 
      </b>
            <?php
            $query = "select * from BS_PUBLISH where ISBN = '".$q. "' limit 1";
            $result = mysqli_query($con,$query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                 echo $row["NAME"].', ';
             }
         } else {
            echo "0 results";
        }
        ?>
        <br>
      <b>
        Publisher Date: 
      </b>
            <?php
            $query = "select * from BS_PUBLISH where ISBN = '".$q. "' limit 1";
            $result = mysqli_query($con,$query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                 echo $row["DATE"].', ';
             }
         } else {
            echo "0 results";
        }
        ?>
    <br>
      <b>
        Genre: 
      </b>
            <?php
            $query = "select * from BS_M_GENRE where ISBN = '".$q. "' limit 1";
            $result = mysqli_query($con,$query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                 echo $row["GENRE"].', ';
             }
         } else {
            echo "0 results";
        }
        ?>


    </p>

</div>

<?php
echo '</p>
</div>
</a>';
}
} else {
  echo "0 results";
}
}
?>
<br>
<p><a class="btn btn-primary btn-lg" href="#" role="button">Buy now</a></p>
<!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Add to cart</a></p> -->

    <h4>
        Description
    </h4>
    <p>
            <?php
            $query = "select * from BS_BOOK_DESCRIPTION where ISBN = '".$q. "' limit 1";
            // echo $query;
            $result = mysqli_query($con,$query);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                 echo ' '.$row["Description"].'';
             }
         } else {
            echo "0 results";
        }
        ?>
      </p>
    
    <h4>
        Reviews:
    </h4>

            <?php
            $query = "select * from BS_M_REVIEWS where ISBN = '".$q. "' ";
            // echo $query;
            $result = mysqli_query($con,$query);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                 echo "Name: ".$row["NAME"].'<br>';
                 echo "Rating: ".$row["Rating"].'<br>';
                 echo "Review: ".$row["Review"] .'<br><br>';
             }
         } else {
            echo "0 results";
        }
        ?>

    <h4>
        Similar books:
    </h4>

    <?php

    if(isset($q)) {

//       $query = "SELECT * FROM BS_BOOKS as a left join `BX-Books` as b on a.ISBN = b.ISBN where a.ISBN in (select ISBN_2 from  BS_RECCOMENDED where ISBN_1 = '".$q. "')";
//       echo $query;
//       $result = mysqli_query($con,$query);

//     // mysqli_query($con,"INSERT INTO Persons (FirstName,LastName,Age) 
//     // VALUES ('Glenn','Quagmire',33)");
//       if ($result->num_rows > 0) {
//         // output data of each row
//         while($row = $result->fetch_assoc()) {
//            echo ' <a href="book.php?q='.$row["ISBN"].'" class="list-group-item">
//            <div class="row">
//            <div class="col-md-3">
//            <img src = '.$row["Image-URL-M"].'>
//            </div>
//            <div class="col-md-9">
//            <h4 class="list-group-item-heading">'. $row["Title"] . '</h4>
//            <p class="list-group-item-text">';
//            echo "<b>ISBN: </b>" . $row["ISBN"]. "<br>".
//            "<b> Price: </b>" . $row["PRICE"]. "<br>".
//            "<b> Language: </b>" . $row["LANGUAGE"]. "<br>".
//            "<b> Cover: </b>" . $row["COVER"]. "<br>".
//            "<b> Dimension: </b>" . $row["DIMENSION"]. "<br>".
//            "<b> Rating: </b>" . $row["Rating"]. "<br>".
//            "<b> Pages: </b>" . $row["PAGES"]. "<br>".
//            "<b> Category: </b>" . $row["GENRE"]. "<br>"
//            ;
//            echo '</p>
//            </div>
//            </div>
//            </a>';
//        }
//    } else {
//     echo "0 results";
// }
}
?>



</div>

</div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- // <script src="../assets/js/ie10-viewport-bug-workaround.js"></script> -->
</body>
</html>

<?php
mysqli_close($con);
?>

