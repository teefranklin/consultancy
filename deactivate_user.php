<?php

include "assets/database.php";
$userid=$_GET['id'];

$query ="SELECT * FROM login_details where userid='$userid'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row){
    if($row['status']=='active'){
        $query ="UPDATE login_details set status='deactivated' where userid='$userid'";
        $statement = $connect->prepare($query);
        $statement->execute();
    }else{
        $query ="UPDATE login_details set status='active' where userid='$userid'";
        $statement = $connect->prepare($query);
        $statement->execute();
    }
}

header('location:view_users.php');

