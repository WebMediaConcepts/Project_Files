
function validate(){
	var firstname = document.myform.fname.value;
	var lastname  = document.myform.lname.value;
	var email = document.myform.em.value;
	var phonenumber = document.myform.ph.value;
	var age = document.myform.age.value;
	var age_len = age.length;
	var ph_len = phonenumber.length;
	var name_pattern = /^[a-zA-Z][a-zA-Z\s]+$/;
	var digit_pattern = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	var email_pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
	// name error checking
	if(name_pattern.test(firstname)==false){
		document.getElementById("fname_err").innerHTML="First name is a required field and can only be alphabetic characters";
		return false;
	}
	if(name_pattern.test(lastname)==false){
		document.getElementById("lname_err").innerHTML="Last name is a required field and can only be alphabetic characters";
		return false;
	}
	if(email_pattern.test(email)==false){
		document.getElementById("em_err").innerHTML="Invalid email address";
		return false;
	}
	if(age_len < 1){
		document.getElementById("age_err").innerHTML="Field cannot be blank";
		return false;
	}
	// phone number error checking
	if(phonenumber == "" || isNaN(phonenumber)){
		document.getElementById("ph_err").innerHTML = "Phone number can't be blank";
		return false;
	}
	if(ph_len != 10){
		document.getElementById("ph_err").innerHTML = "Length need to be of size 10.";
		return false;
	}
	
	alert("Validation Complete. Returning true value.");
	return true;
}