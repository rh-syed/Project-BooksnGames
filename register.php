<?php

session_start();
include ("includes/connect.php");
include ("includes/html_codes.php");

if (isset($_POST['submit'])){//If user hits submit
	$error = array(); //an array to store error messages
	
	//username
	if(empty($_POST['username'])){//If username field is empty
		$error[] = 'Please enter a username. ';
	}else if( ctype_alnum($_POST['username']) ){//if user name is of correct format, letters and numbers only
		$username = $_POST['username']; //set username to username variable
	}else{
		$error[] = 'Username must consist of letters and numbers only. '; //single quotes are as is
	}
	//email
	if(empty($_POST['email'])){
		$error[] = 'Please enter your email. ';
	}else if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){//checks if email is of the right format
		$email = mysqli_real_escape_string($_POST['email']); //converts the string so it is database safe
	}else{
		$error[] = 'Your e-mail address is invalid. ';
	}
	//password
	if(empty($_POST['password'])){
		$error[] = 'Please enter a password. ';
	}else{
		$password = mysqli_real_escape_string( $_POST['password']);
	}
	
	if (empty($error)){
		//this is good info
		$result = mysql_query("SELECT * FROM users WHERE email ='$email' OR username='$username'") or die(mysql_error());
		
		if(mysql_num_rows($result) == 0){
			//that's good. Username and email is available.
			$activation = md5(uniqid(rand(),true));
			
			//since info is good, store it in temporary table.
			$insertDataTemp = mysql_query("INSERT INTO tempusers(user_id,username,email,password,activation)
				VALUES('','$username','$email','$password','$activation')") or die(mysql_error());
				
			if (!$insertDataTemp){
				die ('Could not insert into database: '.mysql_error());
			}else{
				//info inserted succesfully in temp database
				$message = "To activate your account, please click on this link: \n\n";
				//link to activate.php page, this page grabs email from url and unique random code with email is matched. Looks for the match in temp database,
				//if the combo is found then email is real and activated.
				$message = "http://booksngames.ca".'/activate.php?email='.urlencode($email)."&key=$activation";
				
				mail($email,'Registration Confirmation', $message);
				header('Location:prompt.php?x=1'); //prompt page to finalize registration
			}
		}else{
			//Username and email already available.
			header('Location:prompt.php?x=2');
		}
	}else{
		$error_message = '<span class="error">';
		foreach ($error as $key => $values){
			$error_message = "$values";
		}
		$error_message = "</span><br/><br/>";
	}
}
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