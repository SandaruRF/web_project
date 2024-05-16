<?php
// Include the database connection file
include 'connection.php';
session_start();
if(!isset($_SESSION['email'])) {
    header("Location: create.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form data is set
    if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
        // Sanitize form data
        $product_id = intval($_POST['product_id']);
        $quantity = intval($_POST['quantity']);

        // Decrement the quantity by 1
        $quantity--;

        // Check if the quantity becomes zero
        if ($quantity <= 0) {
            // Delete the item from the database
            $sql = "DELETE FROM cart WHERE product_id = $product_id"; // Error line: 29
        } else {
            // Update the quantity in the database
            $sql = "UPDATE cart SET quantity = $quantity WHERE product_id = $product_id"; // Error line: 33
        }

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) { // Error line: 37
            // Redirect to the same page to refresh the cart
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        } else {
            echo "Error updating quantity: " . $conn->error; // Error line: 42
        }
    }
}

// Fetch cart items from the database
$sql = "SELECT * FROM cart";
$result = $conn->query($sql);

$cart_items = array();
$total_price = 0;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $cart_items[] = $row;
        // Calculate total price
        $total_price += $row['quantity'] * $row['price'];
    }
}



    $email = $_SESSION['email'];

    $sql = "SELECT firstname, lastname FROM signup WHERE email = '$email'";
    $result = $conn->query($sql);

    if($result->num_rows >0){
        $row = $result->fetch_assoc();
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
    }
    else{
        $firstname = "User";
        $lastname = "";
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="cart.css">
    <link rel="icon" type="image/x-icon" href="assets2/icon.png">
</head>
<body>
    <video autoplay muted loop id="myVideo">
    <source src="assets2/Istockphoto-1497685251-640 Adpp Is-Vmake(1).m4v">
    </video>
    <header class="header">
        <div >
            <!-- <img class="image2 logo" src="./assets2/diagonal_white_gradient_bkg.png" alt="alt text" /> -->
            <img class="image3 logo" id="user"  src="./assets2/footprint_brand_logo_blue.png" alt="alt text" />
        </div>
        <div class="topnav">
            <a href="./userpage.php">Home</a>
            <a href="./userpage.php#aboutus">About Us</a>
            <a href="./userpage.php#ourcollection">Products</a>
            <a href="">FAQ</a>
            <a href="#footer">Contact Us</a>
            <a class="dd dropbtn" onclick="dropDown()">
                    <img class="login"   src="./assets2/9b91e3b2b4b199ba203624dabc95f709 copy - Copy.svg" alt="login" />
                    <div id="dropOption" class="dropdown-content">
                        <a href="#"><?php echo $firstname . " " . $lastname; ?>!</h2></a>
                        <a href="logout.php" id="logOut" >Logout</a>
                    </div>
            </a>
            <a href="./cart.php"><img src="./assets2/c8f056c259f21206352cc27abfdf197a.png" alt="alt text" /></a>
          </div>
           
    </header>
    <h1>Shopping Cart</h1>
    
    <div class="container">
        <div class="row">
            <div class="col-2">
               <div id="cart-items">
                 <?php
                    foreach ($cart_items as $item) {
                        echo "<div>";
                        echo "Shoe ID: " . $item["product_id"] . " Shoe Name:" .$item["product_name"]." - Quantity: " . $item["quantity"] . " - Price: Rs." . $item["price"];
                        // Form for decrementing quantity
                        echo "<form method='POST'>";
                        echo "<input type='hidden' name='product_id' value='{$item['product_id']}'>"; // Changed name to product_id
                        echo "<input type='hidden' name='quantity' value='{$item['quantity']}'>";
                        echo "<button type='submit'>Remove One</button>";
                        echo "</form>";
                        echo "</div>";
                    }
                 ?>
               </div>
            </div>
            <div class="col-2">
                <div id="total-price">
                  <?php echo "Total: Rs." . number_format($total_price, 2); ?>
                </div>
                
                <div id="bill">
                   <form action="billing.php" method="post">
                      <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
                    <button type="submit">Checkout</button>
                   </form>
                </div> 

            </div>    
        </div>
    </div>
                
    <footer class="footer" id="footer">
        <div>
            <img class="image3 logo1" src="./assets2/footprint_brand_logo_blue.png" alt="alt text" />
            <div class="soc"> 
                <a href=""><img src="assets2/twitter.png"></a>
                <a href=""><img id="img2" src="assets2/facebook.png"></a>
                <a href=""> <img id="img3" src="assets2/social.png"></a>
            </div>
        </div>
        <div class="links">
            <h5 class="">Main Links</h5>
            <a href="men's_collection.php"><span >Men&#x27;s</span></a>
            <a href="women's_collection.php"><span>Women&#x27;s</span></a>
            <a href="kid's_collection.php"><span>Kid&#x27;s</span></a>  
            <a href=""><span>Limited Edition</span></a>
            <a href=""><span>School Shoes</span></a>
            <a href=""><span>Flip Flops &amp; Sandals</span></a>
            <a href="accessories_collection.php"><span>Accessories</span></a>
            <a href=""><span>New Arrivals</span></a>
        </div>  
        
        <div class="info">
            <h5 class="">Company Info</h5>
            <a href="#aboutus"><span >About FootPrint</span></a>
            <a href=""><span>Our Story</span></a>
            <a href=""><span>Meet the Team</span></a>
        </div>  
        
        
        <div class="cus">
            <h5 class="">Customer Support</h5>
            <a href=""><span >Shipping &amp; Delivery</span></a>
            <a href=""><span>Returns &amp; Exchanges</span></a>
        </div>  

        <div class="policy">
            <a href=""><h5>Privacy Policy</h5></a>
        </div>

        <div class="copy">
            <a href=""><h5>© 2024 FootPrint, Inc.</h5></a>
        </div>

        <div class="cookie">
            <a href=""><h5>Cookie Policy</h5></a>
        </div>

        <div class="terms">
            <a href=""><h5>Terms and Services</h5></a>
        </div>
   
    </footer>
    <script>
        const usr = document.getElementById('user');
        user.addEventListener('click', function() {
        window.location.href = "userpage.php";
        });  
        let state = false;
        function dropDown() {
            if(state==false){
                state = true;
                document.getElementById("dropOption").classList.add("show");
                document.getElementById("dropOption").classList.remove("hide");
            }else{
                state = false;
                document.getElementById("dropOption").classList.add("hide");
                document.getElementById("dropOption").classList.remove("show");
            }
            
            

            /*window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
                }
            }
        }*/
        }
    </script>
</body>
</html>
