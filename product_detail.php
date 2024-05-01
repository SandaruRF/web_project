<?php
require_once 'connection.php';
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $sql = "SELECT * FROM product WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found.";
        exit();
    }
} else {
    echo "Product ID not provided.";
    exit();
}

if (isset($_POST["add-to-cart"])) {
    $id = $_GET["product_id"];
    $qty = $_POST["qty"];

    $sql = "INSERT INTO cart(shoe_id,quantity,price)VALUES(".$id.",".$qty.",".$product['price'].")";
    if($conn->query($sql)===true){
        echo "<script>console.log('Added to the cart');</script>";
    }else{
        echo "<script>console.log('Cannot Add');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Men's Shoes & Sneakers</title>
</head>

<body>
    <header class="header1">
        <div>
            <img class="image2 logo" src="imgs/diagonal_white_gradient_bkg.png" alt="alt text" />
            <img class="image3 logo" src="imgs/footprint_brand_logo_blue.png" alt="alt text" />
        </div>
        <div class="topnav">
            <a href="./homepage.php">Home</a>
            <a href="#aboutus">About Us</a>
            <a href="#ourcollection">Products</a>
            <a href="">FAQ</a>
            <a href="#footer">Contact Us</a>
            <a href="./create.php"><img id="user" src="imgs/user.png" alt="alt text" /></a>
            <a href="./cart.php"><img id="cart" src="imgs/cart.png" alt="alt text" /></a>
        </div>
    </header>


    <main style="justify-content: space-evenly; margin-bottom: 150px; margin-top: 30px">
        <div class="product_images">
            <div>
                <div class="small">
                    <img id="image1" src="<?php echo $product['image1']; ?>" onclick="changeImage1()">
                </div>
                <div class="small">
                    <img id="image2" src="<?php echo $product['image2']; ?>" onclick="changeImage2()">
                </div>
                <div class="small">
                    <img id="image3" src="<?php echo $product['image3']; ?>" onclick="changeImage3()">
                </div>
                <div class="small">
                    <img id="image4" src="<?php echo $product['image4']; ?>" onclick="changeImage4()">
                </div>
            </div>
            <div class="big">
                <img id="image5" src="<?php echo $product['image1']; ?>">
            </div>
        </div>
        <div class="verticle_line"></div>
        <div class="product_details">
            <h3><?php echo $product['brand']; ?></h3>
            <h1><?php echo $product['product_name']; ?></h1>
            <p>Men's Shoes</p>
            <p style="font-size: 18px; margin-bottom: 50px"><b>Rs. <?php echo $product['price']; ?>.00</b></p>
            <p>Size</p>
            <div class="sizes">
                <div>6</div>
                <div>7</div>
                <div>8</div>
                <div>9</div>
                <div>10</div>
            </div>

            <form action="" method="post">
                <div class="counter_btn">
                    <div class="counter">
                        <div class="op" onclick="downCounter()">-</div>
                        <input type="text" class="count-value" name="qty" id="count" value="1">
                        <div class="op" onclick="upCounter()">+</div>
                    </div>
                    <div>
                        <button name="add-to-cart">ADD TO CART</button>
                    </div>
                </div>

            </form>

            <div class="row wishlist-div">
                <img src="imgs/heart.png">
                <p style="cursor: pointer;" id="wishlist">Add to Wishlist</p>
            </div>


            <p>Shown: <?php echo $product['color1']; ?>/<?php echo $product['color2']; ?></p>
            <p>Style: <?php echo $product['model']; ?></p>
        </div>
    </main>

    <footer>
        <div class="footer">

        </div>
    </footer>

    <script>

        let count = 0;

        let upCounter = () => {
            count+=1;
            document.getElementById("count").value = count;
        }

        let downCounter = () => {
            if(count == 0){
                console.log("Quantity cannot be Zero");
            }else{
                count-=1;
                document.getElementById("count").value = count;
            }
        }
        function changeImage2() {
            let displayImage = document.getElementById('image5')
            if (!displayImage.src.match('<?php echo $product['image2']; ?>')) {
                displayImage.src = '<?php echo $product['image2']; ?>'
            }
        }

        function changeImage1() {
            let displayImage = document.getElementById('image5')
            if (!displayImage.src.match('<?php echo $product['image1']; ?>')) {
                displayImage.src = '<?php echo $product['image1']; ?>'
            }
        }

        function changeImage3() {
            let displayImage = document.getElementById('image5')
            if (!displayImage.src.match('<?php echo $product['image3']; ?>')) {
                displayImage.src = '<?php echo $product['image3']; ?>'
            }
        }

        function changeImage4() {
            let displayImage = document.getElementById('image5')
            if (!displayImage.src.match('<?php echo $product['image4']; ?>')) {
                displayImage.src = '<?php echo $product['image4']; ?>'
            }
        }
    </script>
</body>

</html>