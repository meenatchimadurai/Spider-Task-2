
<?php
session_start();

if(isset($_POST['submit'])){
include_once'dbh.inc.php';
$expensename1 = "Settlement from";
$expensename11 = $_POST['expensedescription'];
$expensename = "Settlement to";
$expensedescription1 = $_SESSION['u_uid'];
$expensedescription =  $_POST['to'];
$amount = mysqli_real_escape_string($conn, $_POST['amount']);

$amount1 = -$amount;
$tablename = $_SESSION['u_uid'];
$tablename1 =  mysqli_real_escape_string($conn, $_POST['to']);
$s = "INSERT INTO expense (expensename, expensedescription, amount, username) VALUES ('$expensename1 $expensedescription1', ' $expensename11', '$amount1', '$tablename1');";
mysqli_query($conn, $s);
$sql = "INSERT INTO expense (expensename, expensedescription, amount, username) VALUES ('$expensename $expensedescription', ' $expensename11', '$amount', '$tablename');";
 mysqli_query($conn, $sql);
 header("Location: dashboard.php?expense=added");
             exit();
}



