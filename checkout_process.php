<?php include'header.php' ?>
<!--<?php include'business_days.php' ?>-->
<?php
$db = 'localhost';
// $email = 'root';
// $password = '';

$db = NEW mysqli($db, "root", "", "RIA_Final");
// if (!$db) {
//     die("Database connection failed: " .$mysqli_error());
// }
// mysqli_select_db($db, "RIA_Final");
// if (!$db) {
//     die("Database connection failed: " .$mysqli_error());
// }


//credit card numbers
if($_POST['cc'] == '4111111111111111') {
    echo "Your Visa Payment has processed";
}else if($_POST['cc'] == '5555555555554444') {
            echo "Your MasterCard Payment has processed";
}else if($_POST['cc'] == '4012888888881881') {
               header( "Location: failed.php" ); die;
    } else {
        header( "Location: failed.php" ); die;
    }


//pulling info from phpmyadmin
$query = ("SELECT products.item_name AS itemName, products.item_price AS itemPrice, products.sales_tax AS salesTax, order_history.purchase_time AS purchaseTime, order_history.billing_address AS billingAddress, order_history.shipping_address AS shippingAddress, order_history.estimated_date AS estimatedDate FROM products, order_history 
           WHERE products.item_name = '".$_POST['item_name']."'
            AND products.item_price = products.item_price 
            AND products.sales_tax = products.sales_tax 
            AND order_history.purchase_time = order_history.purchase_time
            AND order_history.billing_address = order_history.billing_address 
            AND order_history.shipping_address = order_history.shipping_address
            AND order_history.estimated_date = order_history.estimated_date");

$result = mysqli_query($db, $query);
 

if (!$result) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
}
//sales tax
$shipping_cost = 9.99;
$taxrate = .0685; // % value
$days3 = 3;
$days5 = 5;
function addDayswithdate($date,$days3,$days5){

    $date = strtotime("+".$days." days", strtotime($date));
    return  date("Y-m-d", $date);

}

                while($row = mysqli_fetch_array($result)) {
                    $item_name = $row['itemName'];
                    $item_price = $row['itemPrice'];
                    $sales_tax = $row['salesTax'];
                    $purchase_time = strtotime($row['purchaseTime']);
                    $billing_address = $row['billingAddress'];
                    $shipping_address = $row['shippingAddress'];
                    $estimated_date = $row['estimatedDate'];
                    $item_total = $item_price * $taxrate;
                    $grand_total = $shipping_cost + $item_total + $item_price;
                    $date = date('d-m-Y', $purchase_time);

                }
?>
 </br> 
 </br> 
 </br>   
<h2> THANK YOU FOR YOUR ORDER! </h2>
</br>
</br>
</br>
<p> Your book, 
<?php 
echo $_POST['item_name'];
?>, will be shipped out during our current business hours. You'll be recieving it within the next 3-5 business days. 
</br>
</br>
*Please veryify the information below and if you have any questions please contact our customer service. 
</br>
</br>
Items being shipped: 
<?php
echo $_POST['item_name'];
?></br>
Price: $
<?php
echo $_POST['item_price'];
?></br>
Tax: $
<?php
echo "$item_total";
?></br>
Shipping Cost: $
<?php
echo "$shipping_cost";
?></br>
Date of Purchase: 
<?php
echo "$date";
?>
</br>
</br>
Total: $
<?php
echo "$grand_total";
?>
</br>
</br>
</br>
Billing Address:  
<?php
echo "$billing_address";
?>
</br>
</br>
Shipping Address: 
<?php
echo "$shipping_address";
?>
</br>
</br>
Estimated time of Delivery: 
<?php
echo tentative_delivery_date();?> - <?php  echo tentative_delivery_date(5);
?>
</br>
</p> 
    
    
   <?php include'footer.php' ?>