<?php
?>

<Doctype html>
<head>
<title>Login - Admin Pannel</title>
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
<h3> Login Account </h3>

    <form method="POST">


    <?php 
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        echo "<p>Sorry, login email/password were incorrect!</p>";

        $email = $_POST["email"]; 
        $password = $_POST["password"];
        

        if(empty($email) || empty($password)) {
             $error = "Fields were empty.";
        } else {
            
            $sql = "SELECT id, password, role FROM users WHERE email = '$email'";

            $result = $conn->query($sql);

            if($result->num_rows == 1) {
                
                $row = $result->fetch_assoc();

                $user_id = $row['id'];
                $_SESSION['user_id'] = $user_id;

                $password_verify = password_verify($password, $row['password']);
                
                if ($row["role"] == 'user') {
                    header('Location: account2.php');
                } else if ($row["role"] == 'admin') {
                    header('Location: account2.php');
                }

                $error = "You can Login";
            } else {
                $error = "Email or Password Incorrect.";
            }
        }
        echo "<p>$error</p>";
    }
    ?>


        Email: </br>
        <input type="text" name="email" />
        </br></br>

        Password: </br>
        <input type="password" name="password" />
        </br></br>

        <input type="submit" value="Login" />
        </br></br>
    </form>
</body>
</html>