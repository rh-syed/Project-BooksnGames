<?php
//Code for Header and Search Bar
function headerAndSeachCode(){
	$defaultText = htmlentities($_GET['keywords']);
	
	echo '
		<header id ="main+header">
			<div id="rightAlign">
			
	';
	
	//links will be here
	echo "
			</div>
			<a href =\"index.php\"><img src = \"images/mainLogo.png\"></a>
		</header>
		
		<div id = \"top_search\">
			<form name=\"input\" action=\"search.php\" method=\"get\">
				<input type=\"text\" id=\"keywords\" name=\"keywords\" size=\"100\" class=\"searchBox\"
				value=\"$defaultText\"> &nbsp;
				
				<select id=\"category\" name=\"category\" class=\"searchBox\">
	";
	//include categories here
	echo '
				</select>
				<input type="submit" value="Search" class="button" />
			</form>
		</div>
	';
}
?>