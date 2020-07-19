<?php
include "assets/database.php";
session_start();
$travel_id= $_GET['id'];
$today=date('Y-m-d H:i');
    //updating client
    $query="UPDATE travel_request SET
            status='rejected',
            approver='".$_SESSION['user_id']."',
            approval_date='$today'
            WHERE travel_id='$travel_id'
            ";
    $statement = $connect->prepare($query);
    $statement->execute();

    header('Location:assigned_travels.php');

