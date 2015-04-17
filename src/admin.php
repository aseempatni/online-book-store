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
  $querybase = "select * from BS_MEMBERS";
}
?>
<?php include 'nav.php';?>

<div class="container">
  <h2>Users</h2>
  <!-- <p>The .table-striped class adds zebra-stripes to a table:</p>             -->

  <table class="table table-striped">
    <thead>
      <tr>
        <th>NAME</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
            <?php
            // $query = "select * from BS_AUTHOR where ISBN = '".$q. "' limit 1";
            $result = mysqli_query($con,$querybase);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>".$row["NAME"]. "</td>";
                  echo "<td>".$row["EMAIL"]. "</td>";
                  echo "<td>".$row["NAME"]. "</td>";

                  echo "</tr>";
             }
         } else {
            echo "0 results";
        }
        ?>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
</div>



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
