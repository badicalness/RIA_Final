<html>
<head>
<title>Account - Admin Pannel</title>
</head>
<body>
    <?php 
    require_once("admin_functions.php"); ?>
     <?php 
    include("navigations.php"); ?>

   <?php
    if(!loggedIn() || getUser_value("role") !=  "admin"){
        header("location: login.php");
    }
?>

<h3>
Welcome to the Admin Pannel</h3>


<div>
<a href="admin_users.php">Users</a> |
<a href="admin_order_history.php">Order History</a> 
</div>
</body>
</html>