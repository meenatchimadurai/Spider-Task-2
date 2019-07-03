<?php
session_start();

if(isset($_POST['submit'])){
include_once'dbh.inc.php';
$expensename = mysqli_real_escape_string($conn, $_POST['expensename']);
$expensedescription = mysqli_real_escape_string($conn, $_POST['expensedescription']);
$amount = mysqli_real_escape_string($conn, $_POST['amount']);
$username =  $_SESSION['u_uid'];
$sql = "INSERT INTO expense (expensename, expensedescription, amount, username) VALUES ('$expensename', '$expensedescription', '$amount', '$username');";
 mysqli_query($conn, $sql);
 



 header("Location: dashboard.php?expense=added");
             exit();
}
             