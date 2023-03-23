// Validate name
function nameValidation(){
    var name = document.querySelector("#name").value;
    var errorElement = document.querySelector("#name-error");

    if (name == "") {
        document.querySelector("#name-error").innerHTML = "Please enter a name.";
        errorElement.style.color = "red";
        return false;
      }
      else{
        document.querySelector("#name-error").innerHTML = "";
        return true;
      }
}

// Validate phone number
function phoneValidation(){
    var phone = document.querySelector("#phone").value;
    var error_element = document.querySelector("#phone-error");


  if (phone == "") {
    document.querySelector("#phone-error").innerHTML = "Please enter a phone number.";
    error_element.style.color = "red";
    return false;
  } else if (!phone.match(/^\d{10}$/)) {
    document.querySelector("#phone-error").innerHTML = "Please enter a valid phone number.";
    error_element.style.color = "red";
    return false;
  }
  else{
    document.querySelector("#phone-error").innerHTML = "";
    return true;
  }
}

// Validate email
function emailValidation(){
    var email = document.querySelector("#email").value;
    var email_error = document.querySelector("#email-error");
    if (email == "") {
        document.querySelector("#email-error").innerHTML = "Please enter an email address.";
        email_error.style.color = "red";
        return false;
      } else if (!email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
        document.querySelector("#email-error").innerHTML = "Please enter a valid email address.";
        email_error.style.color = "red";
        return false;
      }
      else{
        document.querySelector("#email-error").innerHTML = "";
        return true;
      }
}

// validate id
function idValidation(){
    var id = document.querySelector("#id").value;
    var id_error = document.querySelector("#id-error");
    if (id == "") {
        document.querySelector("#id-error").innerHTML = "Please enter an ID.";
        id_error.style.color = "red";
        return false;
      }
      else{
        document.querySelector("#id-error").innerHTML = "";
        return true;
      }
}


function validateForm(event) {

  var isNameValid = nameValidation();
  var isPhoneValid = phoneValidation();
  var isEmailValid = emailValidation();
  var isIdValid = idValidation();

  if (isNameValid && isPhoneValid && isEmailValid && isIdValid) {
    // All validation functions returned true, and there are no errors, so submit the form to connection.php
    document.querySelector("form").dispatchEvent(new Event('submit'));
  } else {
    event.preventDefault();
    // At least one validation function returned false, so don't submit the form
    return false;
  }
}
