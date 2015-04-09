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
    <option value="GEnre">Genre</option>
</select>

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