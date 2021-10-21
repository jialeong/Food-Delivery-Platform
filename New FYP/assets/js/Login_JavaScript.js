// Login Page JavaScript

function validate() {
  var user_email = document.getElementById("user_email").value;
  var user_password = document.getElementById("user_password").value;
  if (user_email == "user123" && user_password == "user123") {
    window.location = "Home.html";
    return false;
  } else if (user_email != "user123" || user_password != "user123") {
    alert("Incorrect email address or password");
    return false;
  }
  return true;
}

function admin_validate() {
  var admin_email = document.getElementById("admin_email").value;
  var admin_password = document.getElementById("admin_password").value;
  if (admin_email == "admin123" && admin_password == "admin123") {
    window.location = "Contact Us Page.html";
    return false;
  } else if (admin_email != "admin123" || admin_password != "admin123") {
    alert("Incorrect email address or password");
    return false;
  }
  return true;
}
