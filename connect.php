<?php
$db = "localhost";
$db_users = "root";
$db_password ="";
$db_name = "RIA_Final";


$conn = new mysqli("$db","$db_users","$db_password","$db_name");

/*If it all went well*/

if($conn->connect_error){
    die("Error: connection to database failed." . $conn->connect_error);
}  




?>