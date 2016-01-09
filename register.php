<?php

session_start();
include ("includes/connect.php");
include ("includes/html_codes.php");
?>

<!DOCTYPE html>

<html lang ="en">

<head>
	<title> Register </title>
	<link rel = "stylesheet" href = "css/main.css">
	<link rel = "stylesheet" href = "css/forms.css">
	<link rel = "stylesheet" href = "css/register.css">
</head>

<body>
	<div id = "wrapper">
		<?php headerAndSeachCode (); ?>
		<aside id = "left_side">
			<img src = "images/registerbanner.png" />
		</aside>
		
		<section id = "right_side">
			<form id = "generalform" class = "container" method ="post" action ="">
				<h3> Register </h3>
				<?php echo $error_message; ?>
				<div class ="field">
					<label for = ="username">Username:</label>
					<input type="text" class="input" id="username" name="username" maxlength="20"/>
					<p class ="hint">20 characters maximum (letters and numbers only)</p>
				</div>	
				
				<div class ="field">
					<label for = ="username">Email:</label>
					<input type="text" class="input" id="email" name="email" maxlength="80"/>
				</div>	
				
				<div class = "field">
					<label for = ="username">Password:</label>
					<input type="password" class="input" id="password" name="password" maxlength="20"/>
					<p class ="hint">20 characters maximum </p>
				</div>
				<input type ="button" name="submit" id="submit" class="button" value="Register"/>
			</form>
		</section>
	</div>
</body>

</html>