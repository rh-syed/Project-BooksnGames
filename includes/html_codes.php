<?php
//Code for Header and Search Bar
function headerAndSeachCode(){
	$defaultText = htmlentities($_GET['keywords']);
	
	echo '
		<header id ="main_header">
			<div id="rightAlign">
			
	';
	
	//links will be here. Check if user is logged in or logged out. Depending on that link will be displayed.
	topRightLinks(); 
	echo "
			</div>
			<a href =\"index.php\"><img src = \"images/mainLogo.png\"></a>
		</header>
		
		<div id = \"top_search\">
			<form name=\"input\" action=\"search.php\" method=\"get\">
				<input type=\"text\" id=\"keywords\" name=\"keywords\" size=\"100\" class=\"searchBox\"
				value=\"$defaultText\"> &nbsp;
				
				<select id=\"category\" name=\"category\" class=\"searchBox\">
	"; //category id css is missing
	
	//include categories here
	createCategoryList();
	echo '
				</select>
				<input type="submit" value="Search" class="button" />
			</form>
		</div>
	';
}

//Top Right Links
function topRightLinks(){
	//If user is logged out
	if(!isset($_SESSION['user_id'])){
		echo '<a href="register.php"> Register </a> | <a href="login.php"> Log In </a>' ;
	}
	else{//if user is logged in
		$user = $_SESSION['user_id'];
		$result = mysql_query("SELECT * FROM messages WHERE receiver = $user AND status = 'unread'" or die(mysql_error) );
		
		$num = mysql_num_rows($result );
		if($num == 0){
			echo '<a href = "messages_inbox.php">Messages</a> |';
		}
		else{
			echo "<span class =\"usernames\"><a href = \"messages_inbox.php\">Messages($num)</a></span> |";
		}
		
		echo '<a href="additem.php">Add Item</a> | <a href="account.php">My Account</a> | <a href="logout.php">Log out</a>';
	}
}

//Create Category <option>'s for search bar

function createCategoryList(){
	
	if ( ctype_digit($_GET['category'])) {
		$x = $_GET['category'];
	}
	else{
		$x = 999;
	}
	
	echo "<option>All Categories</option>";
	
	$i= 0;
	
	while(1){
		if(numberToCategory($i) == "Category Does Not Exist"){
			break;
		}
		else{
			echo " <option value = \"$i\" ";
			if($i==$x){echo 'SELECTED';}
			echo " > ";
			echo numberToCategory($i);
			echo "</option>";
		}
		$i++;
	}
}
//Category Number to String
function numberToCategory($n){
	switch ($n){
		case 0:
			$cat = "Autobiography";
			break;
		case 1:
			$cat = "Biography";
			break;
		case 2: 
			$cat = "Fantasy";
			break;
		case 3: 
			$cat = "Historical Fiction";
			break;
		case 4:
			$cat = "Informational";
			break;
		case 5:
			$cat = "Mystery & Adventure";
			break;
		case 6: 
			$cat = "Poetry";
			break;
		case 7: 
			$cat = "Realistic Fiction";
			break;
		case 8: 
			$cat = "Science Fiction";
			break;
		default:
			$cat = "Category Does Not Exist";
	}
}

//Code for footer
function footerCode(){
	echo '
		<footer id="main_footer">
			<table>
				<tr>
					<td><a href="https://www.youtube.com/channel/UCK7MGRRcyoK_aUKOLknZNCw">YouTube</a></td>
					<td><a href="https://www.facebook.com/rsm12">Ifah Facebook</a></td>
					<td><a href="https://www.twitter.com/6ixFlix">Twitter+</a></td>
				</tr>
			</table>
		</footer>
	';
}
?>