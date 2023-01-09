// var fname =document.getElementById('name');
// var email =document.getElementById('email');
// var phone =document.getElementById('phone');
// var password =document.getElementById('password');
// var cpassword =document.getElementById('cpassword');
// var text = "";
function validateName()
{ 
  var letters = /^[A-Z,a-z ]*$/;
  var fnamevalue =document.getElementById('name');
  var regex = /^\s/;
  if(fnamevalue.value.match(regex))
  {
    text="No white space allowed";
    document.getElementById('name_err').innerHTML = text;
    document.getElementById('signup_btn').disabled = true;
    return true;
  }
  if(fnamevalue.value.match(letters) && fnamevalue.value.length>=3 ) 
  {
    text="";
    document.getElementById('name_err').innerHTML = text;
    document.getElementById('signup_btn').disabled = false;
    return false;
  }
  else
  {
    text="Name should contain only alphabets and atleast 3 characters";
    document.getElementById('name_err').innerHTML = text;
    document.getElementById('signup_btn').disabled = true;
    return true;
  }
}

function validateEmail()
{
  var emailvalue =document.getElementById('email');
  var mailformat=/^[a-z,A-Z,0-9][a-z,A-Z,0-9,_,.]*@[a-z]{3,5}\.[a-z]{2,3}$/;
  if (emailvalue.value.match(mailformat)) {
    text="";
    document.getElementById('mail_err').innerHTML = text;
    document.getElementById('signup_btn').disabled = false;
    return false;
  }     
  else {
    text="Invalid email format.";
    document.getElementById('mail_err').innerHTML = text;
    document.getElementById('signup_btn').disabled = true;
    return true;
  }
}

function validatePhone()
{
  var phonevalue =document.getElementById('phone');
  var format=/^[6-9]\d{9}/;
  if(phonevalue.value.length==10 && phonevalue.value.match(format))
  {
    text="";
    document.getElementById('ph_err').innerHTML = text;
    document.getElementById('signup_btn').disabled = false;
    return false;
  }
  else
  {
    text="Invalid Phone Number";
    document.getElementById('ph_err').innerHTML = text;
    document.getElementById('signup_btn').disabled = true;
    return true;
  }
}
function validatePassword() 
{
  var password =document.getElementById('password');
  var pformat=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
  if(password.value.match(pformat))
  {
    text="";
    document.getElementById('pwd_err').innerHTML = text;
    document.getElementById('signup_btn').disabled = false;
    return false;
  }
  else {
    text="Password should contain atleast one capital letter, special character and a number";
    document.getElementById('pwd_err').innerHTML = text;
    document.getElementById('signup_btn').disabled = true;
    return true;
  }
}

function validateConfirm() 
{	
  var password =document.getElementById('password');
  var cpassword =document.getElementById('cpassword');
  var x=passwordvalue.value;
  var y=cpasswordvalue.value;
	if (x === y) 
  { 
    text="";
		document.getElementById('cpwd_err').innerHTML = text;
		document.getElementById('signup_btn').disabled = false;
		return false;
	}
  else 
  {
    text="Password does not match";
    document.getElementById('cpwd_err').innerHTML = text;
    document.getElementById('signup_btn').disabled = true;
		return true;
  }
}
    