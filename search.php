<?php
include "assets/database.php";
$id = $_POST['id']; // Retrieve id data sent via AJAX
$query ="SELECT * FROM clients where client_id='$id'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $data){ 
  
  $callback = array(
    'status' => 'success', // Set array status with success // Set array name with the contents of the name field in the student table
    'email' => $data['email'], 
    'phone' => $data['phone'], // Set array phone with phone column contents in student table
    'address' => $data['address'], // Set the address array with the contents of the address field in the student table
  );
}
echo json_encode($callback); // converting varible $callback to JSON
?>