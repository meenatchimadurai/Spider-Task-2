<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="style.css">
<title>
MY Wallet
</title>
</head>
<body>
<header>
<nav>
<div class="main-wrapper">
<ul>
<li><a href="dashboard.php">Go to My DashBoard</a></li>
</ul>

</div>
</nav>
</header>
<div>

<?php

session_start();
if(isset($_POST['submit'])){
include_once'dbh.inc.php';
$total=0;
$monthlybudget = $_SESSION['u_budget'];
$username =  $_SESSION['u_uid'];

//$stmt = $conn->prepare("SELECT * FROM expense WHERE username='$username'");
//$stmt->execute();
$stmt = $conn->prepare("SELECT * FROM expense WHERE username='$username' ORDER BY amount DESC");
$stmt->execute();
$stmt->bind_result($expensenumber, $expensename, $expensedescription, $amount, $created_at, $user);

echo '<table style="width:50%;border:1px solid black">';
echo "<tr><th>ExpenseID</th><th>Expense Name</th><th>Description</th><th>Amount</th><th>created_at</th></tr>";
while($stmt->fetch()){
    echo '<tr><td style="text-align:center;border:1px solid black">';
    echo $expensenumber;
    echo '</td><td style="text-align:center;border:1px solid black">';
    echo $expensename;
    echo '</td><td style="text-align:center;border:1px solid black">';
    echo $expensedescription;
    echo '</td> <td style="text-align:center;border:1px solid black">';
    echo $amount;
    echo '</td> <td style="text-align:center;border:1px solid black">';
    echo $created_at;
    echo "</td></tr>";
    $total = $total + $amount;
    $output = $monthlybudget - $total;
}

 echo "Balance";
 echo $output;

}

?>
</div>
<div>
 <form action="delete.inc.php" method="GET">
 Enter ExpenseID to be Deleted:<input type="int" name="id" placeholder="ExpenseID">
 <button type="submit" name="submit" type="submit" value="given"> DELETE
 </button>
 </form>
 </div>
 </body>
 </html>
