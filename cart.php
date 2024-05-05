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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="cart.css">
</head>
<body>
    <h1>Shopping Cart</h1>
    
    <div class="container">
        <div class="row">
            <div class="col-2">
               <div id="cart-items">
                 <?php
                    foreach ($cart_items as $item) {
                        echo "<div>";
                        echo "Shoe ID: " . $item["product_id"] . " Shoe Name:" .$item["product_name"]." - Quantity: " . $item["quantity"] . " - Price: $" . $item["price"];
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
                  <?php echo "Total: $" . number_format($total_price, 2); ?>
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
</body>
</html>
