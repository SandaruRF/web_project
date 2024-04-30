<?php
    require_once 'connection.php';

    $sql = "SELECT * FROM product";
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
    <nav class="navbar">
        <img id="logo" src="imgs/logo.png">
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">About Us</a></li>
            <li><a href="">Products</a></li>
            <li><a href="">FAQ</a></li>
            <li><a href="">Contact Us</a></li>
        </ul>
        <a href=""><img id="user" src="imgs/user.png"></a>
        <a href=""><img id="cart" src="imgs/cart.png"></a>
    </nav>

    <div class="header">
        <h1>Men's Shoes & Sneakers</h1>
        <p>Life's a journey, and your shoes should be ready for wherever it takes you. 
            Here at FootPrint, we've curated a diverse collection of men's footwear designed 
            to keep you comfortable and confident, no matter the destination. From sleek 
            dress shoes for the office to rugged boots for conquering the outdoors, we 
            have the perfect pair to match your style and needs.</p>
    </div>

    <div class="sort">
        <p>Size &nbsp;&nbsp;&nbsp; color &nbsp;&nbsp;&nbsp;brand&nbsp;&nbsp;&nbsp; sortby</p>
    </div>

    <main>
        <?php
            while($row = mysqli_fetch_assoc($all_product)){
        ?>
        <div class="card">
            <a href="">
                <div class="image">
                    <img src="<?php echo $row["image1"]; ?>" alt="">
                </div>
            </a>
            <a href="">
                <div class="caption">
                    <p><?php echo $row["brand"]; ?></p>
                    <p><?php echo $row["product_name"]; ?></p>
                    <p><?php echo $row["price"]; ?></p>
                </div>
            </a>
        </div>
        <?php
            }
        ?>
    </main>

    <footer>
        <div class="footer">
            
        </div>
    </footer>
</body>
</html>