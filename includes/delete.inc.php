
<?php
session_start();
if(isset($_GET['id'])){
    include_once'dbh.inc.php';
    $id = $_GET['id'];
    $tablename =  $_SESSION['u_uid'];
    $sql="DELETE FROM $tablename WHERE id = $id";
    $query=mysqli_query($conn,$sql);
    header("Location: ../dashboard.php?expense=deleted");
    
    
   
   }
   ?>
  
