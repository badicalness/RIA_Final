<?php
$conn = NEW MySQLI ('localhost', 'root', '', 'RIA_Final');

if(isset($_GET['order'])){
  $order = $_GET['order'];
} else{
  $order = 'id';
}

if(isset($_GET['sort'])){
  $sort = $_GET['sort'];
} $sort = 'ASC';

$resultSet = $conn->query("SELECT * FROM users ORDER BY $order $sort");

if($resultSet->num_rows > 0 ) {

  $sort = 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

  echo"
  <center>
  <table border='1'>
    <tr>
      <th><a href='?order=id&&sort=$sort'>ID</a></th>
      <th><a href='?order=first_name&&sort=$sort'>First Name</a></th>
      <th><a href='?order=last_name&&sort=$sort'>Last Name</a></th>
      <th><a href='?order=email&&sort=$sort'>Email</a></th>
      <th><a href='?order=phone_number&&sort=$sort'>Phone Number</a></th>
      <th><a href='?order=role&&sort=$sort'>Role</a></th>
      </center>
  ";
  while($rows = $resultSet->fetch_assoc())
    {
        $id = $rows['id'];
        $first_name = $rows['first_name'];
        $last_name = $rows['last_name'];
        $email = $rows['email'];
        $phone_number = $rows['phone_number'];
        $role = $rows['role'];


        echo"
        <center>
        <tr>
          <td>$id</td>
          <td>$first_name</td>
          <td>$last_name</td>
          <td>$email</td>
          <td>$phone_number</td>
          <td>$role</td>
        </tr>
        </center>
        ";
        
        
        
    }

}else {
  echo "No records returned.";
}
  
  echo "Number of Users:" . $resultSet->num_rows;

?>
