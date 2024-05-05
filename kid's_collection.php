<?php
    require_once 'connection.php';

    $sortOrder = "ORDER BY price ASC";

    if(isset($_GET['sort']) && $_GET['sort'] == 'low_high') {
        $sortOrder = "ORDER BY price ASC";
    } elseif(isset($_GET['sort']) && $_GET['sort'] == 'high_low') {
        $sortOrder = "ORDER BY price DESC";
    } elseif(isset($_GET['sort']) && $_GET['sort'] == 'nike') {
        $sortOrder = "AND brand='Nike'";
    } elseif(isset($_GET['sort']) && $_GET['sort'] == 'lacoste') {
        $sortOrder = "AND brand='Lacoste'";
    } elseif(isset($_GET['sort']) && $_GET['sort'] == 'adidas') {
        $sortOrder = "AND brand='Adidas'";
    } elseif(isset($_GET['sort']) && $_GET['sort'] == 'newBalance') {
        $sortOrder = "AND brand='New Balance'";
    } elseif(isset($_GET['sort']) && $_GET['sort'] == 'airJordan') {
        $sortOrder = "AND brand='Air Jordan'";
    } elseif(isset($_GET['sort']) && $_GET['sort'] == 'white') {
        $sortOrder = "AND color1='white' OR color2='white'";
    } elseif(isset($_GET['sort']) && $_GET['sort'] == 'black') {
        $sortOrder = "AND color1='black' OR color2='black'";
    } elseif(isset($_GET['sort']) && $_GET['sort'] == 'green') {
        $sortOrder = "AND color1='green' OR color2='green'";
    } elseif(isset($_GET['sort']) && $_GET['sort'] == 'yellow') {
        $sortOrder = "AND color1='yellow' OR color2='yellow'";
    } elseif(isset($_GET['sort']) && $_GET['sort'] == 'blue') {
        $sortOrder = "AND color1='blue' OR color2='blue'";
    }

    $sql = "SELECT * FROM product WHERE product_id BETWEEN 22 AND 33 $sortOrder";
    $all_product = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Kid's Shoes & Sneakers</title>
</head>
<body>
    <header class="header1">
        <div >
            <img class="image2 logo" src="imgs/diagonal_white_gradient_bkg.png" alt="alt text" />
            <img class="image3 logo" id="home" src="imgs/footprint_brand_logo_blue.png" alt="alt text" />
        </div>
        <div class="topnav">
            <a href="./index.php">Home</a>
            <a href="index.php#aboutus">About Us</a>
            <a href="index.php#ourcollection">Products</a>
            <a href="">FAQ</a>
            <a href="#footer">Contact Us</a>
            <a href="./create.php"><img id="user" src="imgs/user.png" alt="alt text"/></a>
            <a href="./cart.php"><img id="cart" src="imgs/cart.png" alt="alt text"/></a>
        </div>
    </header>

    <div class="header">
        <h1>Kid's Shoes & Sneakers</h1>
    </div>

    <div class="sort">
        <div style="width: 70%; display:flex; gap: 20px">
            <div class="dropdown">
                <button>Size: Any</button>
                <div class="content">
                    <a href="">6</a>
                    <a href="">7</a>
                    <a href="">8</a>
                    <a href="">9</a>
                    <a href="">10</a>
                </div>
            </div>

            <div class="dropdown">
                <button>Color: Any</button>
                <div class="content">
                    <a href="?sort=white">White</a>
                    <a href="?sort=black">Black</a>
                    <a href="?sort=blue">Blue</a>
                    <a href="?sort=green">Green</a>
                    <a href="?sort=yellow">Yellow</a>
                </div>
            </div>

            <div class="dropdown">
                <button>Brand: Any</button>
                <div class="content">
                    <a href="?sort=nike">Nike</a>
                    <a href="?sort=adidas">Adidas</a>
                    <a href="?sort=lacoste">Lacoste</a>
                    <a href="?sort=airJordan">Air Jordan</a>
                    <a href="?sort=newBalance">New Balance</a>
                </div>
            </div>
        </div>

        <div style="width: 30%; margin-left: 600px">
            <div class="dropdown">
                <button style="width: 250px;">Sort by: Any</button>
                <div class="content">
                    <a href="?sort=high_low" style="width: 226px;">Price: High-Low</a>
                    <a href="?sort=low_high" style="width: 226px;">Price: Low-High</a>
                </div>
            </div>
        </div>
    </div>

    <main>
        <?php
            for ($i=0; $i<2; $i++){
                while($row = mysqli_fetch_assoc($all_product)){
        ?>
        <div class="card" data-product-id="<?php echo $row["product_id"]; ?>">
            
                <div class="image">
                    <img src="<?php echo $row["image1"]; ?>" alt="">
                </div>
            
                <div class="caption">
                    <p><?php echo $row["brand"]; ?></p>
                    <p style="color: rgba(58, 59, 64, 1);"><?php echo $row["product_name"]; ?></p>
                    <p>Rs. <?php echo $row["price"]; ?>.00</p>
                </div>
            
        </div>
        <?php
                }
                mysqli_data_seek($all_product, 0);
            }
        ?>
    </main>

    <footer class="footer" id="footer" style="top: 3000px;">
        <div>
            <img class="image3 logo1" src="./assets2/footprint_brand_logo_blue.png" alt="alt text" />
            <div class="soc"> 
                <img src="assets2/twitter.png">
                <img id="img2" src="assets2/facebook.png">
                <img id="img3" src="assets2/social.png">
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
            <a href="index.php#aboutus"><span >About FootPrint</span></a>
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
        document.addEventListener("DOMContentLoaded", function() {
            var productElements = document.querySelectorAll('.card');

            productElements.forEach(function(productElement) {
                productElement.addEventListener('click', function() {
                    var productId = this.dataset.productId;

                    window.location.href = 'product_detail.php?product_id=' + productId;
                })
            })
        })

        const home = document.getElementById('home');
        home.addEventListener('click', function() {
        window.location.href = "index.php";
        }); 
    </script>
</body>
</html>