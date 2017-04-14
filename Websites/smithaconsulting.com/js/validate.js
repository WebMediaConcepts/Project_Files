function validate() {
    var firstname = $('#fname').val();
    $('#fname').val(firstname);
    var lastname = document.getElementById('#fname').innerHTML;
    var email = document.myform.em.value;
    var username = document.myform.ph.value;
    var password = document.myform.age.value;
    var name_pattern = /^[a-zA-Z][a-zA-Z\s]+$/;
    var digit_pattern = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    var email_pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
    // name error checking
    if (name_pattern.test(firstname) == false) {
        document.getElementById("fname_err").innerHTML = "First name is a required field and can only be alphabetic characters";
        return false;
    }
    if (name_pattern.test(lastname) == false) {
        document.getElementById("lname_err").innerHTML = "Last name is a required field and can only be alphabetic characters";
        return false;
    }
    if (email_pattern.test(email) == false) {
        document.getElementById("em_err").innerHTML = "Invalid email address";
        return false;
    }
    if (name_pattern.test(username) == false) {
        document.getElementById("uname_err").innerHTML = "Invalid email address";
        return false;
    }
    if (name_pattern.test(password) == false) {
        document.getElementById("pw_err").innerHTML = "Invalid email address";
        return false;
    }

    alert("Validation Complete. Returning true value.");
    return true;
}