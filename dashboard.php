<?php
session_start();
?>
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
<li><a href="index.php">Home</a></li>
</ul>
<div class="nav-login">
<form action="includes/logout.inc.php" method="POST" >
       <button type="submit" name="submit">Logout</button>
   
       </form>   
       </div>
</div>
</nav>
</header> 
<h1>   My Dashboard </h1>
<h2>Add Expenses</h2>
<form action="includes/add.inc.php" method="POST">
    <input type="text" name="expensename" placeholder="Name of expense"><br>
    <input type="text" name="expensedescription" placeholder="description"><br>
    <input type="number" name="amount" placeholder="Enter Amount"><br>
    
    <button type="submit" name="submit">ADD EXPENSES</button>
</form>
<h2>My expenses</h2>
<form action="includes/balancesheet.inc.php" method="POST">

    <button type="submit" name="submit">VIEW</button>
</form>
<h2>Settlement Options</h2>
<form action="settle.php" method="POST">
    <button type="submit" name="submit">SETTLE</button>
</form>
</body>
</html>