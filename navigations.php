<nav>
        <a href="index.php">Home</a> |

        <?php 
            if(loggedIn()){

        ?>
        <a href="user_account.php">Profile</a> |
        <a href="order_history.php">Order History</a> |
        <a href="logout.php">Logout</a> |
        <?php

            if(getUser_value("role") == "admin"){
                ?>
                <a href="admin.php">Admin Pannel</a> |
                <?php
            }
        ?>
        <?php
		} else {
	?>
        <a href="login2.php">Login</a> |
        <a href="register2.php">Create Account</a> |

        <?php
            }
        ?>
    </nav>