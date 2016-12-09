<?php
?>

<Doctype html>
<head>
<title>Create Account - Admin Pannel</title>
</head>
<body>
    <?php 
    require_once("admin_functions.php"); ?>
     <?php 
    include("navigations.php"); ?>

    <?php
    if(loggedIn()){
        header("location: account2.php");
    }
?>

<h3> Create a New Account </h3>

    <form method="POST">

<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        echo "<p>Account Created!</p>";

        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $phone_number = $_POST["phone_number"];
        $email = $_POST["email"]; 
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"]; 

        if($password == $confirm_password) {
            $password = password_hash($password, PASSWORD_DEFAULT);
        }
        if(empty($first_name) || empty($last_name) || empty($phone_number) || empty($email) || empty($password) || empty($confirm_password)) {
             $error = "Fields were empty.";
        } else {
            
            $sql = "INSERT INTO users VALUES ('','$first_name','$last_name','$email', '$password', '$phone_number', 'user')";
        
            if($conn->query($sql) === TRUE){

                $error = "User Created";
            }else { 
            
            $error = "Error in creating account. Please contact Admin with this issue.";
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

        Password: </br>
        <input type="password" name="password" />
        </br></br>

        Confirm Password: </br>
        <input type="password" name="confirm_password" />
        </br></br>

        <input type="submit" value="Create Account" />
        </br></br>
    </form>
</body>
</html>