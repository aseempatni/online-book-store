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
    function viewbook() {
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
        xmlhttp.open("GET","book.php?q="+str,true);
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
        <script type="text/javascript">
                $(function() {                  
                         $('span.stars').stars();
                });

                $.fn.stars = function() {
                        return $(this).each(function() {
                                $(this).html($('<span />').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * 16));
                        });
                }
        </script>
        <style type="text/css">
                span.stars, span.stars span {
                        display: inline-block;
                        background: url(http://s30.postimg.org/le6oizdyl/stars.png) 0 -16px repeat-x;
                        /*background: url(http://s30.postimg.org/le6oizdyl/stars.png) 0 -16px repeat-x;*/
                        width: 80px;
                        height: 16px;
                }

                span.stars span {
                        background-position: 0 0;
                }
        </style>
  </head>

  <body>
    <?php
    $con=mysqli_connect("10.5.18.66","12CS10023","btech12","12CS10023");
// Check connection
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

    $q = $_GET['q'];
  if(isset($q)) {
      $querybase = "SELECT * FROM BS_BOOKS as a left join `BX-Books` as b on a.ISBN = b.ISBN left join BS_M_GENRE as g on a.ISBN = g.ISBN where" ;
    if(strcmp($_GET['qtype'] ,"Publisher")==0) {
        $querybase .= " e.NAME ";
    }
    else if($_GET['qtype'] == "Author") {
        $querybase .= " d.NAME ";
    }
    else if(strcmp($_GET['qtype'] ,"Title")==0) {
        $querybase .= " Title ";
    }
    $querybase .= "like '%".$q."%'";
      echo $querybase;
  }
  ?>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Book Store</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="query.php">Home</a></li>
        <li><a href="#about">About</a></li>
        <!-- <li><a href="#contact">Contact</a></li> -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categories <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Browse All</a></li>
            <li class="divider"></li>

            <?php
            $query = "select (GENRE) from BS_M_GENRE group by GENRE order by count(ISBN) desc limit 10";
            $result = mysqli_query($con,$query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                 echo '  <li><a href="#">'.$row["GENRE"].'</a></li>';
             }
         } else {
            echo "0 results";
        }
        ?>

            </ul>
        </li>
    </ul>
    <form class="navbar-form navbar-left" role="search" action="query.php" method="get" id = "queryForm">
      <div class="input-group">
          <span class="input-group-addon" id="sizing-addon1">Q</span>
          <input autocomplete="off" type="text" class="form-control" placeholder="Search" aria-describedby="sizing-addon1" id = "qterm" name="q" onkeyup="autocomplet()">
      </div>
      <!-- <button class="btn btn-default" type="submit" >Q</button> -->
      <ul id="hints"></ul>
in
  <select class="form-control" name = "qtype">
    <option value="Title">Title</option>
    <option value="Author">Author</option>
    <option value="Publisher">Publisher</option>
</select>

<!-- Single button -->

  </form>


  <ul class="nav navbar-nav navbar-right">
    <li><a href="../navbar-static-top/">Admin</a></li>
    <li><a href="signin/signin.php">Sign in</a></li>
    <li><a href="register/register.php">Register</a></li>
    <!-- <li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li> -->
</ul>
</div><!--/.nav-collapse -->
</div>
</nav>
<div class="container">
  <div class="col-md-3">

    Refine by

    <h4>
        Categories
    </h4>

    <?php
    // echo $querybase;
    $query = "select (GENRE), count(ISBN) as c from (". $querybase.") as a group by GENRE order by count(ISBN) desc limit 15";
    // echo $query;
    $result = mysqli_query($con,$query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
         echo '  <li class = "filter"><input type="checkbox" name="aauthor" value="Bike"> <a href="#">'.$row["GENRE"].'</a> ('.$row["c"].')</li>';
     }
 } else {
    echo "0 results";
}
?>

<h4>
    Format
</h4>
    <?php
    $query = "select (COVER), count(ISBN) as c from (". $querybase.") as a group by COVER order by count(ISBN) desc limit 15";
    // $query = "select distinct(COVER), count(*) as c from BS_BOOKS group by COVER order by count(ISBN) desc limit 15";
    $result = mysqli_query($con,$query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
         echo '  <li class = "filter"><input type="checkbox" name="aauthor" value="Bike"> <a href="#">'.$row["COVER"].'</a> ('.$row["c"].')</li>';
     }
 } else {
    echo "0 results";
}
?>

<h4>
    Author
</h4>
    <?php
    $query = "select (NAME), count(ISBN) as c from (". $querybase.") as a group by NAME order by count(ISBN) desc limit 15";
    // $query = "select distinct(NAME), count(*) as c from BS_AUTHOR group by NAME order by count(ISBN) desc limit 15";
    $result = mysqli_query($con,$query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
         echo '  <li class = "filter"><input type="checkbox" name="aauthor" value="Bike"> <a href="#">'.$row["NAME"].'</a> ('.$row["c"].')</li>';
     }
 } else {
    echo "0 results";
}
?>

<h4>
    Language
</h4>

<?php
$query = "select distinct(LANGUAGE), count(*) as c from BS_BOOKS group by LANGUAGE order by count(ISBN) desc limit 5";
$result = mysqli_query($con,$query);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
         echo '  <li class = "filter"><input type="checkbox" name="aauthor" value="Bike"> <a href="#">'.$row["LANGUAGE"].'</a> ('.$row["c"].')</li>';
   }
} else {
    echo "0 results";
}
?>

</div>
<div id = "books" class="col-md-9">

    <?php

    if(isset($q)) {

    // Perform queries 
    // $query = "SELECT * FROM BS_BOOKS where Title like '%".$q."%' limit 10";
      $query = $querybase." group by ISBN limit 15";
      $result = mysqli_query($con,$query);

    // mysqli_query($con,"INSERT INTO Persons (FirstName,LastName,Age) 
    // VALUES ('Glenn','Quagmire',33)");
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           echo ' <a href="book.php?q='.$row["ISBN"].'" class="list-group-item">
           <div class="row">
           <div class="col-md-3">
           <img src = '.$row["Image-URL-M"].'>
           </div>
           <div class="col-md-9">
           <h4 class="list-group-item-heading">'. $row["Title"] . '</h4>
           <p class="list-group-item-text">';

  echo '<b> Rating: </b>'.'<span class="stars"><span style="width: '.( (  floatval($row["Rating"]) )/5)*80 .'px;"></span></span><br>'.
           "<b>ISBN: </b>" . $row["ISBN"]. "<br>".
           "<b> Price: </b>" . $row["PRICE"]. "<br>".
           "<b> Language: </b>" . $row["LANGUAGE"]. "<br>".
           "<b> Cover: </b>" . $row["COVER"]. "<br>".
           "<b> Dimension: </b>" . $row["DIMENSION"]. "<br>".

           "<b> Pages: </b>" . $row["PAGES"]. "<br>".
           "<b> Category: </b>" . $row["GENRE"]. "<br>"
           ;
           echo '</p>
           </div>
           </div>
           </a>';
       }
   } else {
    echo "0 results";
}
}
?>


Results
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

