<?php 
include "connection.php";
session_start();

if(!isset($_SESSION['email'])) {
    header("Location: create.php");
    exit();
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
    <title>FootPrint</title>
    <link rel="stylesheet" type="text/css" href="./userpage.css" />
</head>
<body>
    <header class="header">
        <div >
            <img class="image2 logo" src="./assets2/diagonal_white_gradient_bkg.png" alt="alt text" />
            <img class="image3 logo" id="user"  src="./assets2/footprint_brand_logo_blue.png" alt="alt text" />
        </div>
        <div class="topnav">
            <a href="./userpage.php">Home</a>
            <a href="#aboutus">About Us</a>
            <a href="#ourcollection">Products</a>
            <a href="">FAQ</a>
            <a href="#footer">Contact Us</a>
            <a class="dd dropbtn" onclick="dropDown()">
                    <img class="login"   src="./assets2/9b91e3b2b4b199ba203624dabc95f709%20copy.svg" alt="login" />
                    <div id="dropOption" class="dropdown-content">
                        <a href="#"><?php echo $firstname . " " . $lastname; ?>!</h2></a>
                        <a href="logout.php" id="logOut" >Logout</a>
                    </div>
            </a>
            <a href="./cart.php"><img src="./assets2/c8f056c259f21206352cc27abfdf197a.png" alt="alt text" /></a>
          </div>
           
    </header>
    
    <img class="brandImg" src="./assets2/fingerpost_painting.png" alt="alt text" />
    <div class="discover">
        <img class="disBack" src="./assets2/abstract_dna_graphics.png" alt="alt text" />
        <h1 class="disText">STEP INTO STYLE, LEAVE YOUR FOOTPRINT</h1>
        <a href="#ourcollection">
        <div class="disBtn">
            <img class="Btntxt" src="./assets2/discover_word_black.png" alt="alt text" />
        </div></a>
    </div>
    <div class="rect"></div>
    <img class="img1" src="./assets2/single_sneaker_presentation.png" alt="alt text" />

    <div class="aboutus" id="aboutus">
        <h1 class="hero">About Us</h1>
        <h3 class="subhero">
            At FootPrint, we believe that shoes are more than just functional footwear - they&#x27;re a powerful
            expression of personal style and confidence. Founded in 2020 by a team of passionate shoe enthusiasts,
            we&#x27;ve curated a diverse collection of fashionable, high-quality shoes to help you step out in stride,
            no matter the occasion.<br />What sets us apart is our unwavering commitment to customer satisfaction. We
            work closely with leading designers to ensure every pair not only looks great, but provides unparalleled
            comfort and support. Our in-house fit experts are dedicated to helping you find your perfect match.<br />FootPrint
            is a lifestyle brand that celebrates self-expression and the transformative power of fashion. When you shop
            with us, you&#x27;re investing in a brand that shares your values and will help you make your mark on the
            world, one step at a time.
        </h3>
    </div>
    <img class="img2" src="./assets2/assorted_shoes_row.png" alt="alt text" />
    <div class="collection" id="ourcollection" >
        <h1 class="colTitle">Our Collection</h1>
        <div class="rect4">
            <div class="rect5" id="mens">
                <img class="tileimage1" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfQf6xjKGh-M8G4r3KqbK0ANDnU1E_WCZQSJnI8I3zEmTp8BUWxwl5w-13kz8m9l7EwI0&usqp=CAU" alt="alt text" />
                <h1 class="tile1">Men's Collection</h1>
            </div>
            <div class="rect51" id="womens">
                <img class="tileimage2" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWu_9A3SYwnclx45iWr6I4BeeC2cfZLNn68nzgWsS2xDElQUz5jj5Ie1hezYwaJUFZmS4&usqp=CAU" alt="alt text" />
                <h1 class="tile2">Women's Collection</h1>
            </div>
            <div class="rect52"  id="kids">
                <img class="tileimage3" src="https://img.tatacliq.com/images/i3/437Wx649H/MP000000003609424_437Wx649H_20180906085331.jpeg" alt="alt text" />
                <h1 class="tile3">Kids Collection</h1>
            </div>
            <div class="rect53" id="flips">
                <h1 class="tileimage4">Flip Flops &amp; Sandals</h1>
                <img class="tile4" src="https://assets.ajio.com/medias/sys_master/root/20230629/ImxV/649ce961eebac147fc3593fc/-473Wx593H-466011327-aqua-MODEL.jpg" alt="alt text" />
            </div>
            <div class="rect6" id="acc">
                <h1 class="tileimage5">Accessories</h1>
                <img class="tile5" src="https://thumbs.dreamstime.com/b/set-short-socks-white-grey-black-isolated-white-background-three-pair-socks-set-short-socks-white-grey-black-isolated-208760863.jpg" alt="alt text" />
            </div>
            <div class="rect54" id="limited">
                <img class="tileimage6" src="./assets2/greenish_sneakers_isolated.png" alt="alt text" />
                <h1 class="tile6">Limited Edition</h1>
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
            <a href="men's_collection.php"><span >Men&#x27;s</span></a>
            <a href="women's_collection.php"><span>Women&#x27;s</span></a>
            <a href="kids_collection.php"><span>Kid&#x27;s</span></a>
            <a href=""><span>Kids</span></a>
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
</body>


                

    <script>
       

        const usr = document.getElementById('user');
        const mens = document.getElementById('mens');
        const womens = document.getElementById('womens');
        const kids = document.getElementById('kids');
        const flips = document.getElementById('flips');
        const acc = document.getElementById('acc');
        const limited = document.getElementById('limited');

       
        user.addEventListener('click', function() {
        window.location.href = "userpage.php";
        }); 
        mens.addEventListener('click', function() {
        window.location.href = "men's_collection.php";
        });

        womens.addEventListener('click', function() {
        window.location.href = "women's_collection.php";
        });


        kids.addEventListener('click', function() {
        window.location.href = "kids's_collection.php";
        });

        acc.addEventListener('click', function() {
        window.location.href = "accessories's_collection.php";
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


   