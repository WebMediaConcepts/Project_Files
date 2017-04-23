function validate() {
    var firstname = document.forms["RegForm"]["firstname"].value;
    if (firstname == "")
    {
        document.getElementById("#fname_err").innerHTML = "First name cannnot be blank";
    }
    document.getElementById("#fname_err").innerHTML = "First name cannnot be blank";
    alert();
}