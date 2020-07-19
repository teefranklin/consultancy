<?php

include "assets/database.php";
$userid=$_GET['id'];

$query ="DELETE from user_info where userid='$userid'";
$statement = $connect->prepare($query);
$statement->execute();

$query ="DELETE from login_details where userid='$userid'";
$statement = $connect->prepare($query);
$statement->execute();
header('location:view_users.php');

