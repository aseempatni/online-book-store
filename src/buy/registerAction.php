<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration Form in PHP and Mysql, Sign up Form with PHP and Mysql</title>
<meta name="description" content="This tutorial explains that how to create a simple registration form in PHP and mysql with Javascript validation for input and store input data in database."/>
<meta name="keywords" content="Registration Form in PHP and Mysql with Javascript validation, Registration Form with Javascript validation, Sign up, Registration Form, Sign up Form with Javascript validation, Registration Form in PHP"/>
<link href="style.css" rel="stylesheet" type="text/css">

</head>
<body>

<?php
include "dbConfig.php";
if($_POST[ 'name' ]!="") {
	
	$name = mysql_real_escape_string(htmlspecialchars($_POST["name"]));
	$email = mysql_real_escape_string($_POST["email"]);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //PHP 5 supported
      		echo 'Invalid email format';
    	} else {
		$password = mysql_real_escape_string($_POST["password"]);

		$query = mysql_query("SELECT * FROM BS_MEMBERS WHERE email = '$email'") or die(mysql_error());
		$num_rows = mysql_num_rows($query);
		if($num_rows==0)
		{
			echo "OK ";
		
			$query = "insert into BS_MEMBERS set name='".$name."', email='".$email."', password='".$password."' ";
			$data = mysql_query ($query)or die(mysql_error());
			if($data)
			{
				echo "YOUR REGISTRATION IS COMPLETED...";
				$msg = '
				<p class = "tanx">Thank you for completing your online registration form!.';
			}
		}
	}
	else
	{
		echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
	}


} else {
	$msg = "Your enquiry sending failed";
}	

?>
<div class="thanks-text">
<?php echo $msg?>

<div class="tut"> <a href="http://www.discussdesk.com/create-registration-form-using-php-and-mysql.htm">Go back to the Tutorial </a> </div>
</div>
</body>
</html>

