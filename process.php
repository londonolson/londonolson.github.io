<?php
// process.php

$errors = array();  // array to hold validation errors
$data = array();        // array to pass back data
 
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

//Send data to a MySQL table
$link = mysqli_connect("localhost", "root", "", "demo");

if($link === false){
  die("ERROR: Could not connect. " .
mysqli_connect_error());
}

$sql = "INSERT INTO customers (name, adults, children, checkInDate, checkOutDate, phone, destination)
VALUES ($name, $adults, $children, $checkInDate, $checkOutDate, $phone, $destination)";
if(mysqli_query($link, $sql)){
  echo "Records inserted successfully.";
} else{
  echo "ERROR: Was not able to execute $sql. " .
mysqli_error($link);
}

mysqli_close($link);

?>