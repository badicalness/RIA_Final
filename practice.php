<!doctype html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>order history table</title>
    </head>
    <body>
      <?php
      include('connect.php');

      //execute the SQL query and return records
      $sql = "SELECT first_name, last_name, item_name, purchase_time, estimated_date, billing_address, shipping_address FROM order_history";
      $result = $conn->query($sql);
      
      
      ?>
      <table border="2" style= "background-color: #84ed86; color: #761a9b; margin: 0 auto;" >
      <thead>
        <tr>
          <th>first_name</th>
          <th>last_name</th>
          <th>item_name</th>
          <th>purchase_time</th>
          <th>estimated_date</th>
          <td>billing_address</td>
          <td>shipping_address</td>
        </tr>
      </thead>
      <tbody>
        <?php
          while($row = $result->fetch_assoc()){
            echo
            "<tr>
              <td>{$row['first_name']}</td>
              <td>{$row['last_name']}</td>
              <td>{$row['item_name']}</td>
              <td>{$row['purchase_time']}</td>
              <td>{$row['estimated_date']}</td>
              <td>{$row['billing_address']}</td> 
              <td>{$row['shipping_address']}</td> 
            </tr>\n";
          }
        ?>
      </tbody>
    </table>
     <?php mysqli_close($conn); ?>
    </body>
    </html>