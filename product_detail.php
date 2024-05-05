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
    <link rel="stylesheet" href="productstyle.css">
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
            <img class="image3 logo" id="home" src="imgs/footprint_brand_logo_blue.png" alt="alt text" />
        </div>
        <div class="topnav">
            <a href="./homepage.php">Home</a>
            <a href="homepage.php#aboutus">About Us</a>
            <a href="homepage.php#ourcollection">Products</a>
            <a href="">FAQ</a>
            <a href="#footer">Contact Us</a>
            <a href="./create.php"><img id="user  user1" src="./assets2/9b91e3b2b4b199ba203624dabc95f709.svg" alt="alt text" /></a>
            <a href="./cart.php"><img id="cart  user1" src="./assets2/c8f056c259f21206352cc27abfdf197a.png" alt="alt text" /></a>
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
        
        const home = document.getElementById('home');
        home.addEventListener('click', function() {
        window.location.href = "homepage.php";
        }); 
    </script>
</body>

</html>