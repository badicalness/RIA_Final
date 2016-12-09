<?php
    require_once("connect.php"); ?>
<?php
    require_once("admin_functions.php"); ?>
     <?php 
    include("navigations.php"); ?>
<?php

$db = 'localhost';
// $email = 'root';
// $password = '';

$db = NEW mysqli($db, "root", "", "RIA_Final");


//pulling info from phpmyadmin
$query = ("SELECT users.first_name AS firstName, users.last_name AS lastName, users.email AS email, users.phone_number AS phoneNumber, order_history.billing_address AS billingAddress, order_history.shipping_address AS shippingAddress FROM users, order_history 
           WHERE users.first_name = 'Erin' 
            AND users.last_name = users.last_name 
            AND users.email = users.email 
            AND users.phone_number = users.phone_number
            AND order_history.billing_address = order_history.billing_address 
            AND order_history.shipping_address = order_history.shipping_address");
$result = mysqli_query($db, $query);
 

if (!$result) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
}



                while($row = mysqli_fetch_array($result)) {
                    $first_name = $row['firstName'];
                    $last_name = $row['lastName'];
                    $email = $row['email'];
                    $phone_number = $row['phoneNumber'];
                    $billing_address = $row['billingAddress'];
                    $shipping_address = $row['shippingAddress'];
                    


                }
?>  
 </br> 
 </br>   
<h2> <?php 
echo "$first_name";
?>'s Account </h2>
</br>
<p>  
First Name: 
<?php
echo "$first_name";
?></br>
Last Name:
<?php
echo "$last_name";
?></br>
Email:
<?php
echo "$email";
?></br>
Phone Number:
<?php
echo "$phone_number";
?></br>
</br>
Billing Address: </br> 
<?php
echo "$billing_address";
?>
</br>
</br>
Shipping Address: </br> 
<?php
echo "$shipping_address";
?>
</br>

</p> 

    <!-- page content here -->  
   

     <div class="edit">
     <a href="edit_profile2.php"><input type="button" name="edit_btn" value="Edit Account Information"></a> |
     <a href="user_account.php"><input type="button" name="cancel_btn" value="Cancel"></a>
    </div>

   
