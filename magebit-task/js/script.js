
var error = document.querySelector(".errors");
function MainValidation() { //if validateCheckBox() and ValidateEmail is true then retrun true.
  if (!validateCheckBox() || !ValidateEmail()) {
    return false;
    
  } else {
    return true;
  }
}
function ValidateEmail() { // checking input with class email for errors,if no errors return true,esle error,and error type
  var input=document.querySelector(".email").value;
  var mailformat = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (input == "") {
    error.innerHTML = "Email address is required";
    return false;
  } else if (!input.match(mailformat)) {
    error.innerHTML = "Please provide a valid e-mail address";
    return false;
  } else if (input.endsWith(".co")) {
    error.innerHTML = "We are not accepting subscriptions from Colombia emails";
    return false;
  } else return true;
}
function validateCheckBox() { //if input with class checmakr is clicked,then return true,else false and error
  var checkBox = document.querySelector(".checkmark");
  if (checkBox.checked == true) return true;
  else {
    error.innerHTML = "You must accept the terms and conditions";
    return false;
  }
}