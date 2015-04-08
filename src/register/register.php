<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration Form in PHP and Mysql, Sign up Form with PHP and Mysql</title>
<meta name="description" content="This tutorial explains that how to create a simple registration form in PHP and mysql with Javascript validation for input and store input data in database."/>
<meta name="keywords" content="Registration Form in PHP and Mysql with Javascript validation, Registration Form with Javascript validation, Sign up, Registration Form, Sign up Form with Javascript validation, Registration Form in PHP"/>
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" language="javascript" src="validate.js"></script>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
<style >
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

</style>
</head>
<body>



 <div class="container">

      <form class="form-signin">
        <h2 class="form-signin-heading">Register</h2>

        <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">@</span>
  <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
</div>


        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <div class="btn-group" role="group" aria-label="...">
        <button class="btn btn-lg btn-primary " type="submit">Sign Up</button>

        <button class="btn btn-lg btn-secondary " type="submit">Reset</button>
</div>

      </form>

    </div> <!-- /container -->
    


	<form name="frmregister"action="registerAction.php" method="post" onSubmit="return validate();"	>
		<table class="form" border="0">
			<tr>
				<th><label for="name"><strong>Name:</strong></label></th>
				<td><input class="inp-text" name="name" id="name" type="text" size="30" /></td>
			</tr>

			<tr>
				<th><label for="name"><strong>Email:</strong></label></th>
				<td><input class="inp-text" name="email" id="email" type="text" size="30" /></td>
			</tr>
			
			<tr>
				<th><label for="name"><strong>Password:</strong></label></th>
				<td><input class="inp-text" name="password" id="password" type="password" size="30" /></td>
			</tr>

			<tr>
				<th><label for="name"><strong>Phone Number:</strong></label></th>
				<td><input class="inp-text" name="nick_name" id="nick_name" type="text" size="30" /></td>
			</tr>
			<tr>
			<td></td>
				<td class="submit-button-right">
				<input class="send_btn" type="submit" value="Submit" alt="Submit" title="Submit" />
				
				<input class="send_btn" type="reset" value="Reset" alt="Reset" title="Reset" /></td>
				
			</tr>
		</table>
	</form>
</body>
</html>



<!DOCTYPE html>
<html lang="en">
  <head>
  </head>


  <body>
