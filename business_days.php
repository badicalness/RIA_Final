<?php


function tentative_delivery_date($shipping_days = 3) {
    $today = time(); //timestamp for current time to be used for current date 
    $day_of_week = date("N", $today); // get the day of week, e.g. 1 = Monday through 7 = Sunday 
 
    if($day_of_week + $shipping_days < 6) {
        // delivery can be made within same business week
        $tentative_delivery_date = strtotime("+$shipping_days days");
    } else if(($day_of_week + $shipping_days) >= 6 && ($day_of_week + $shipping_days) < 15) {
        // delivery is possible next week hence add two days for weekend (Saturday and Sunday)
        $shipping_days += 2;
        $tentative_delivery_date = strtotime("+$shipping_days days");
        // check if new delivery date is falling in second weekend and adjust accordingly
        if(date("N", $tentative_delivery_date) == 6 || date("N", $tentative_delivery_date) == 7) {
            $shipping_days += 2;
            $tentative_delivery_date = strtotime("+$shipping_days days");
        }
    } else {
        // this function does not support shipping time > 7 days
        return "Not supported";
    }
    return date('jS M (D)', $tentative_delivery_date); // Format the date nicely.This format => 1st Jan (Wed) 
}
 
// USAGE
echo tentative_delivery_date(1);
echo tentative_delivery_date(2);
echo tentative_delivery_date(); // default 3
echo tentative_delivery_date(4);
echo tentative_delivery_date(5);
echo tentative_delivery_date(6);
echo tentative_delivery_date(7);
?>