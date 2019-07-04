
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
<h6>Do not Refresh this page</h6>
<h4>Enter User Name of the Receiver</h4>


    <form action="settle.inc.php" method="POST">

    SETTLE TO:<input type="text" placeholder="Enter user name" name="to"><br>
    DESCRIPTION: <input type="text" placeholder="Enter description" name="expensedescription"><br>
    AMOUNT  :<input type="int" placeholder="Amount" name="amount"><br>
     <button type="submit" name="submit">Settle</button>
    </form>
    
</div>

 </body>
 </html>


