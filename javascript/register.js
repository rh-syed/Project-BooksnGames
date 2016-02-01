var username = document.getElementById('username');
var password = document.getElementById('password');
var email = document.getElementById('email');
console.log(username + ' '+password +' '+email );

function checkUsername(){
	if(username.value.match(/\W/) != null || username.value.length == 0){ 
		errorMsg = document.getElementById('error_username');
		username.style.borderColor = "Red";
		errorMsg.innerHTML ="Username should not contain symbols";
		errorMsg.style.color = "Red";
		errorMsg.style.fontSize = "15px";
		errorMsg.style.fontFamily ="Monospace";
		username.value = '';
	   }
	
}
function checkEmail(){
	filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(!filter.test(email.value) || email.value.length == 0){
		errorMsg = document.getElementById('error_email');
		email.style.borderColor = "Red";
		errorMsg.innerHTML ="Invalid email address";
		errorMsg.style.color = "Red";
		errorMsg.style.fontSize = "15px";
		errorMsg.style.fontFamily ="Monospace";
		email.value= '';
	}
	
}