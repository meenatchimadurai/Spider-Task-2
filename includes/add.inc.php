<?php
session_start();

if(isset($_POST['submit'])){
include_once'dbh.inc.php';
$expensename = mysqli_real_escape_string($conn, $_POST['expensename']);
$expensedescription = mysqli_real_escape_string($conn, $_POST['expensedescription']);
$amount = mysqli_real_escape_string($conn, $_POST['amount']);
$tablename =  $_SESSION['u_uid'];
$sql = "INSERT INTO $tablename (expensename, expensedescription, amount) VALUES ('$expensename', '$expensedescription', '$amount');";
 mysqli_query($conn, $sql);
 
$stmt = $conn->prepare("SELECT * FROM $tablename ORDER BY amount DESC");
$stmt->execute();
 header("Location: ../dashboard.php?expense=added");
             exit();
}
             