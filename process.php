<?php
// process.php

$errors = array();  // array to hold validation errors
$data = array();        // array to pass back data

// validate the variables ========
if (empty($_POST['city']))
  $errors['city'] = 'City is required.';

if (empty($_POST['activities']))
  $errors['activities'] = 'Activitie(s) are required.';

//Sanitize name string
$str = $name;
$newstr = filter_var($str, FILTER_SANITIZE_STRING);
echo $newstr;

//Sanitize phone number
$int = $phone;
if (!filter_var($int, FILTER_VALIDATE_INT) === false) {
  echo("Integer is valid");
} else {
  echo("Integer is not valid");
}
 
// return a response ==============

// response if there are errors
if ( ! empty($errors)) {

  // if there are items in our errors array, return those errors
  $data['success'] = false;
  $data['errors']  = $errors;
} else {

  // if there are no errors, return a message
  $data['success'] = true;
  $data['message'] = 'Success!';
}

// return all our data to an AJAX call
echo json_encode($data);

?>