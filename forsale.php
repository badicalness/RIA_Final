<?php   
 session_start();
  
 $connect = mysqli_connect("localhost", "root", "", "RIA_Final");  
 if(isset($_POST["add_to_checkout"]))  
 {  
      if(isset($_SESSION["checkout"]))  
      {  
           $item_array_id = array_column($_SESSION["checkout"], "isbn_number");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["checkout"]);  
                $item_array = array(  
                     'isbn_number'=>$_GET["isbn_number"],  
                     'item_name'=>$_POST["item_name"],  
                     'item_price'=>$_POST["item_price"],    
                );  
                $_SESSION["checkout"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="index.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'isbn_number'=>$_GET["isbn_number"],  
                'item_name'=>$_POST["item_name"],  
                'item_price'=>$_POST["item_price"],   
           );  
           $_SESSION["checkout"][0] = $item_array;  
      }  
 }  
  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Items For Sale</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:700px;">  
                <h3 align="center">Books</h3><br />  
                <?php  
                $query = "SELECT * FROM products";  
                $result = mysqli_query($connect, $query);  
              if (!$result) {
    printf("Error: %s\n", mysqli_error($connect));
    exit();
}
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="checkout.php">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               <img src="<?php echo $row["image"]; ?>" class="img-responsive" /><br />  
                               <h4 class="text-info"><?php echo $row["item_name"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $row["Item_price"]; ?></h4>   
                               <input type="hidden" name="item_name" value="<?php echo $row['item_name']; ?>" />  
                               <input type="hidden" name="item_price" value="<?php echo $row['Item_price']; ?>" /> 
                               <input type="hidden" name="image" value="<?php echo $row['image']; ?>" /> 
                               <input type="submit" name="add_to_checkout" style="margin-top:5px;" class="btn btn-success" value="Checkout" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>   
           <br />  
      </body>  
 </html> 