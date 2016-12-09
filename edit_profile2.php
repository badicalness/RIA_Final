<?php

$db = 'localhost';
// $email = 'root';
// $password = '';

$db = NEW mysqli($db, "root", "", "RIA_Final");

?>

<Doctype html>
<head>
<title>Edit Account - Admin Pannel</title>
</head>
<body>
    <?php 
    require_once("admin_functions.php"); ?>
     <?php 
    include("navigations.php"); ?>


<h3> Edit Account Information </h3>

    <form method="POST">

<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        

        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $phone_number = $_POST["phone_number"];
        $email = $_POST["email"];  

        
        if(empty($first_name) || empty($last_name) || empty($phone_number) || empty($email)) {
             $error = "Fields were empty.";
        } else {
            
            $sql = "UPDATE users SET '',first_name = '$first_name', last_name = '$last_name', email = '$email', '', phone_number = '$phone_number' WHERE email = '$email'";
        
            
            if($conn->query($sql) === TRUE){

                $error = "Account Updated";
            }else { 
            
            $error = "Error in updating account. Please contact Admin with this issue.";
        }
        }
        echo "<p>$error</p>";
    }

    ?>
        First Name: </br>
        <input type="text" name="first_name" />
        </br></br>

        Last Name: </br>
        <input type="text" name="last_name" />
        </br></br>

        Phone Number: </br>
        <input type="number" name="phone_number" />
        </br></br>

        Email: </br>
        <input type="text" name="email" />
        </br></br>


        <input type="submit" value="Update Account" />
        </br></br>
    </form>
</body>
</html>