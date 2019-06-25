
<?php
session_start();

if(isset($_POST['submit'])){
include_once'dbh.inc.php';
$expensename1 = "Settlement from";
$expensename = "Settlement to";
$expensedescription1 = $_SESSION['u_uid'];
$expensedescription =  $_POST['to'];
$amount = mysqli_real_escape_string($conn, $_POST['amount']);

$amount1 = -$amount;
$tablename = $_SESSION['u_uid'];
$tablename1 =  mysqli_real_escape_string($conn, $_POST['to']);
$s = "INSERT INTO $tablename1 (expensename, expensedescription, amount) VALUES ('$expensename1', '$expensedescription1', '$amount1');";
mysqli_query($conn, $s);
$sql = "INSERT INTO $tablename (expensename, expensedescription, amount) VALUES ('$expensename', '$expensedescription', '$amount');";
 mysqli_query($conn, $sql);
 header("Location: ../dashboard.php?expense=added");
             exit();
}



