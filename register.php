<?php
session_start();
include("includes/connect.php");
include("includes/html_codes.php");

if(isset($_POST['submit'])){
	$error = array();
	
	//username
	if(empty($_POST['username'])){
		$error[] = 'Please enter a username. ';
	}else if( ctype_alnum($_POST['username']) ){
		$username = $_POST['username'];
	}else{
		$error[] = 'Username must consist of letters and numbers only. ';
	}
	
	//email
    if(empty($_POST['email'])){
        $error[] = 'Please enter your email. ';
    }else if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])){
		$email = mysql_real_escape_string($_POST['email']);
    }else{
		$error[] = 'Your e-mail address is invalid. ';
    }
	
	//password
	if(empty($_POST['password'])){
		$error[] = 'Please enter a password. ';
	}else{
		$password = mysql_real_escape_string($_POST['password']);
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/forms.css">
	<link rel="stylesheet" href="css/register.css">
</head>
<body>
	<div id="wrapper">
		<?php headerAndSearchCode(); ?>
		<aside id="left_side">
			<img src="images/registerbanner.png" />
		</aside>
		
		<section id="right_side">
			<form id="generalform" class="container" method="post" action="">
				<h3>Register</h3>
				<?php echo $error_message; ?>
				<div class="field">
					<label for="username">Username:</label>
					<input type="text" class="input" id="username" name="username" maxlength="20"/>
					<p class="hint">20 characters maximum (letters and numbers only)</p>
				</div>
				<div class="field">
					<label for="email">Email:</label>
					<input type="text" class="input" id="email" name="email" maxlength="80"/>
				</div>
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" class="input" id="password" name="password" maxlength="20"/>
					<p class="hint">20 characters maximum</p>
				</div>
				<input type="submit" name="submit" id="submit" class="button" value="Submit"/>
			</form>
		</section>
		<?php footerCode(); ?>
	</div>
</body>
</html>