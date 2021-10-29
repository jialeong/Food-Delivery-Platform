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


// Forgot Password Page JavaScript

function ValidateEmail()
{
  var test_email = document.getElementById("emailAddr").value;
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(forget_password_Form.emailAddr.value) && test_email == "d@gmail.com")
  {
    window.location = "Reset_Password_Page.html";
    return (false)
  }
    alert("You have entered an invalid email address!")
    document.forget_password_Form.emailAddr.focus();
    return (false)
}


// Register Account Page JavaScript

function regis_validate() {
  if (document.regis_form.regis_email.value == "") {
    alert("Please provide your Email Address");
    document.regis_form.regis_email.focus();
    return false;
  }
  if (document.regis_form.regis_mobile_phone.value == "") {
    alert("Please provide your Mobile Phone Number");
    document.regis_form.regis_mobile_phone.focus();
    return false;
  }
  var test_phone_length = /^\d{10}$/;
  if (document.regis_form.regis_mobile_phone.value.match(test_phone_length)) {
  } else {
    alert("Not a valid Phone Number");
    document.regis_form.regis_mobile_phone.focus();
    return false;
  }
  if (document.regis_form.regis_nick_name.value == "") {
    alert("Please provide your Nick Name");
    document.regis_form.regis_nick_name.focus();
    return false;
  }
  if (document.regis_form.regis_delivery_address1.value == "") {
    alert("Please provide your Delivery Address");
    document.regis_form.regis_delivery_address1.focus();
    return false;
  }
  if (document.regis_form.regis_password.value == "") {
    alert("Please provide your Account Password");
    document.regis_form.regis_password.focus();
    return false;
  }
  if (document.regis_form.regis_retype_password.value == regis_password.value) {
  } else {
    alert("Cannot match the Account Password");
    document.regis_form.regis_retype_password.focus();
    return false;
  }
  if (document.regis_form.regis_checkbox.checked == false) {
    alert("Please tick the check box");
    document.regis_form.regis_checkbox.focus();
    return false;
  }
  alert(
    "Congratulation Mr / Ms. " +
      regis_nick_name.value +
      " you are successfully registered."
  );
  return true;
}


// Checkout Page JavaScript

// Validation
function payment_validate() {
  if (document.payment_form.payment_nick_name.value == "") {
    alert("Please provide your Nick Name");
    document.payment_form.payment_nick_name.focus();
    return false;
  }
  if (document.payment_form.payment_delivery_address_1.value == "") {
    alert("Please provide your Delivery Address");
    document.payment_form.payment_delivery_address_1.focus();
    return false;
  }
  if (document.payment_form.payment_contact_number.value == "") {
    alert("Please provide your Contact Number");
    document.payment_form.payment_contact_number.focus();
    return false;
  }
  var test_contact_number_length = /^\d{10}$/;
  if (document.payment_form.payment_contact_number.value.match(test_contact_number_length)) {
  } else {
    alert("Not a valid Phone Number");
    document.payment_form.payment_contact_number.focus();
    return false;
  }
  return true;
}

// Upload File Validate Function
function fileValidate() {
  var File_Upload = document.getElementById("upload_file");
  var File_Path = File_Upload.value;
  var Allow_File_Type = /(\.jpg|\.jpeg|\.png)$/i;

  if (!Allow_File_Type.exec(File_Path)) {
    alert("Invalid file type");
    File_Upload.value = "";
    return false;
  }
}

// Radio Button Function
function displayBank(x) {
  if (x == 1)
    document.getElementById("bank_information").style.display = "block";
  else document.getElementById("bank_information").style.display = "none";
  return;
}
