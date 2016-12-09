<?php

?>

<Doctype html>
<head>
<title>Checkout</title>

</head>
<body>
    <?php 
    require_once("admin_functions.php"); ?>
     <?php 
    include("navigations.php"); ?>

  

<h3> Checkout </h3>
    <img src="<?php echo $_POST['image']; ?>"/>
    <p><?php echo $_POST['item_name'];?></p>
    <p><?php echo $_POST['item_price'];?></p>

    <form method="POST">

<?php 
//    $_SESSION["forsale.php"] = array {

//    }
        if(empty($billing_address) || empty($shipping_address)) {
             $error = "Fields are empty.";
        } else {
            
            $sql = "INSERT INTO order_history VALUES ('$billing_address','$shipping_address')";
        
            if($conn->query($sql) === TRUE){

                $error = "User Created";
            }else { 
            
            $error = "Error in creating account. Please contact Admin with this issue.";
        }
        }
        echo "<p>$error</p>";
    

    ?>

        Billing Address: </br>
        <input type="text" name="billing_address" />
        </br></br>

        Shipping Address: </br>
        <input type="text" name="shipping_address" />
        </br></br>

    </form>


    <form action="checkout_process.php" method="post">
        Credit Card #:
        <input type="text" name="cc" /> 
        
    <div>
        <label>CVC: </label>
        <input name="cc-cvc" type="text" value="" required/>
    </div>
    <div>
        <label>Card Type: </label>
        <select id="cc-brand">
            <option value="01">------</option>
            <option value="02" required>Visa</option>
            <option value="03"required>MasterCard</option>
        </select>
        </br>
        <label>Expiry Date: </label>
        <select id="cc-exp-month">
            <option value="01">Jan</option>
            <option value="02">Feb</option>
            <option value="03">Mar</option>
            <option value="04">Apr</option>
            <option value="05">May</option>
            <option value="06">Jun</option>
            <option value="07">Jul</option>
            <option value="08">Aug</option>
            <option value="09">Sep</option>
            <option value="10">Oct</option>
            <option value="11">Nov</option>
            <option value="12">Dec</option>
        </select>
        <select id="cc-exp-year">
            <option value="13">2013</option>
            <option value="14">2014</option>
            <option value="15">2015</option>
            <option value="16">2016</option>
            <option value="17">2017</option>
            <option value="18">2018</option>
            <option value="19">2019</option>
            <option value="20">2020</option>
            <option value="21">2021</option>
            <option value="22">2022</option>
        </select>
         <input type="hidden" name="item_name" value="<?php echo $_POST['item_name']; ?>" />  
         <input type="hidden" name="item_price" value="<?php echo $_POST['item_price']; ?>" /> 
         <input type="hidden" name="image" value="<?php echo $_POST['image']; ?>" /> 
        </br>
        <input type="submit" name="submit" value="submit" />
    </div>

    </form>
</body>

</html>
