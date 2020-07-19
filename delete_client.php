<?php

include "assets/database.php";
$client_id=$_GET['id'];

$query ="DELETE from clients where client_id='$client_id'";
$statement = $connect->prepare($query);
$statement->execute();

header('location:view_clients.php');


