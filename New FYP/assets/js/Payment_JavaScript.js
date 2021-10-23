// Payment Page JavaScript

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
