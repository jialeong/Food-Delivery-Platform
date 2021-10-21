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
