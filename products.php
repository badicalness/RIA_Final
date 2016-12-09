<?php include'header.php' ?>
    
    <?php

$db = mysqli_connect("localhost", "root", "", "RIA_final");


    ?>
    
    <!--PRODUCTS -->
<h2>Please veryify the information below</h2> 
</br>
<p>
Item Selected: </br>
Price: </br>
Tax: </br>
Shipping Cost: $9.99</br>
</br>
</br>
</p> 
<form>
    <label>Billing Address:</label>
    <input type="text" name="billing_address" class="textInput">  
    </br>
    </br>
    <label>Shipping Address:</label> 
    <input type="text" name="shipping_address" class="textInput">
</form>    
<form id="simplify-payment-form" action="" method="POST">
    <div>
        <label>Credit Card Number: </label>
        <input id="cc-number" type="text" maxlength="20" autocomplete="off" value="" autofocus />
    </div>
    <div>
        <label>CVC: </label>
        <input id="cc-cvc" type="text" maxlength="4" autocomplete="off" value=""/>
    </div>
    <div>
        <label>Card Type: </label>
        <select id="cc-brand">
            <option value="01">------</option>
            <option value="02">Visa</option>
            <option value="03">MasterCard</option>
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
    </div>
    <button id="process-payment-btn" type="submit">Process Payment</button>
</form>
    
   <?php include'footer.php' ?>