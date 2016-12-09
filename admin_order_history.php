<?php
$conn = NEW MySQLI ('localhost', 'root', '', 'RIA_Final');

if(isset($_GET['order'])){
  $order = $_GET['order'];
} else{
  $order = 'first_name';
}

if(isset($_GET['sort'])){
  $sort = $_GET['sort'];
} $sort = 'ASC';

$resultSet = $conn->query("SELECT * FROM order_history ORDER BY $order $sort");

if($resultSet->num_rows > 0 ) {

  $sort = 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

  echo"
  <center>
  <table border='1'>
    <tr>
      <th><a href='?order=first_name&&sort=$sort'>First Name</a></th>
      <th><a href='?order=last_name&&sort=$sort'>Last Name</a></th>
      <th><a href='?order=item_name&&sort=$sort'>Item</a></th>
      <th><a href='?order=purchase_time&&sort=$sort'>Date Purchased</a></th>
      <th><a href='?order=shipping_address&&sort=$sort'>Shipping Address</a></th>
      </center>
  ";
  while($rows = $resultSet->fetch_assoc())
    {
        $first_name = $rows['first_name'];
        $last_name = $rows['last_name'];
        $item_name = $rows['item_name'];
        $purchase_time = $rows['purchase_time'];
        $shipping_address = $rows['shipping_address'];


        echo"
        <center>
        <tr>
          <td>$first_name</td>
          <td>$last_name</td>
          <td>$item_name</td>
          <td>$purchase_time</td>
          <td>$shipping_address</td>
        </tr>
        </center>
        ";
        
        
        
    }

}else {
  echo "No records returned.";
}
echo">Number of Orders:" . $resultSet->num_rows;
?>