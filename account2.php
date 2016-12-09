
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
    if(!loggedIn()){
        header("location: login.php");
    }
?>

<h3>
<?php 
echo getUser_value("email"); ?></h3>
</body>
</html>