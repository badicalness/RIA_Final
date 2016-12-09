<!doctype html>

<html lang="en">
<head>
<meta charset="utf-8">

<!---THE START-->
<title>Portable Magic</title>

<!-- TELLS PHONES NOT TO LIE ABOUT THEIR WIDTH & stops the font from enlarging whena phone is turned sideways-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!--- STYLE SHEETS -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.simplify.com/commerce/v1/simplify.js"></script>

<script>
$(document).ready(function(){
var str=location.href.toLowerCase();
$(".mymenu li a").each(function(){
if (str.indexOf(this.href.toLowerCase()) > -1) {
$("li.active").removeClass("active");
$(this).parent().addClass("active");
}
});
})
</script>
<!---CONNECT MYSQLI-->
<?php
$db_host ='localhost';
$username ='root';
$password ='';


mysqli_connect ("$db_host","$username","$password");
   
?>

<!--- STYLE SHEETS -->
<link href="css/main.css" rel="stylesheet">



<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
     
</head>
<body>
<div id="wrapper">
<div id="container">
	
	<header>

        <div class="login">
            <button><a href="register2.php">Login</a></button>
            
        </div>

        <div class="search">
            <input type="text" name="search" value="search..."/>
        </div>

        <img src="image/book.jpg" width="100%" alt="logo">
    
    <div class="keepopen"> </div>
    </header>
    
    
    <!-- page navigation links here -->
    <nav>
    <ul class="mymenu">
    	<li class="active"><a href="index.php">Home</a></li>
    	<li><a href="forsale.php">Books</a></li>
    	<li><a href="aboutus.php">About Us</a></li>
        <li><a href="contactus.php">Contact Us</a></li>
    </ul>
    <div class="keepopen"> </div>
    </nav>
    