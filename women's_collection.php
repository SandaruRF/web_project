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

    $sql = "SELECT * FROM product WHERE product_id BETWEEN 1 AND 10 $sortOrder";
    $all_product = $conn->query($sql);
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
        <div >
            <img class="image2 logo" src="imgs/diagonal_white_gradient_bkg.png" alt="alt text" />
            <img class="image3 logo" src="imgs/footprint_brand_logo_blue.png" alt="alt text" />
        </div>
        <div class="topnav">
            <a href="./homepage.php">Home</a>
            <a href="#aboutus">About Us</a>
            <a href="#ourcollection">Products</a>
            <a href="">FAQ</a>
            <a href="#footer">Contact Us</a>
            <a href="./create.php"><img id="user" src="imgs/user.png" alt="alt text"/></a>
            <a href="./cart.php"><img id="cart" src="imgs/cart.png" alt="alt text"/></a>
        </div>
    </header>

    <div class="header">
        <h1>Women's Shoes & Sneakers</h1>
        <p>Life's a journey, and your shoes should be ready for wherever it takes you. 
            Here at FootPrint, we've curated a diverse collection of men's footwear designed 
            to keep you comfortable and confident, no matter the destination. From sleek 
            dress shoes for the office to rugged boots for conquering the outdoors, we 
            have the perfect pair to match your style and needs.</p>
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

    <footer>
        <div class="footer">
            
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
    </script>
</body>
</html>