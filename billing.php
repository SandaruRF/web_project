<?php
include "connection.php";

session_start();
if(!isset($_SESSION['email'])) {
    header("Location: create.php");
    exit();
}

if (isset($_POST['submit'])) {
  $Fname = $_POST['Firstname'];
  $Lname = $_POST['lastname'];
  $contactno = $_POST['Cno'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $country = $_POST['country'];
  $postalcode = $_POST['postalcode'];
  $email = $_POST['email'];

  // $ccard=$_POST['ccard'];
  $cno = $_POST['cardnum'];
  $exp = $_POST['exp'];
  $sscode = $_POST['cvn'];
  $nameoncard = $_POST['nameoncard'];



  $sql1 = "INSERT INTO `c_billing_data`(`Fname`, `Lname`, `Address`, `City`, `Postalcode`,`Country`,`Contactno`,`email`) VALUES ('$Fname','$Lname','$address','$city','$postalcode','$country','$contactno','$email')";


  $result = $conn->query($sql1);

  if ($result == TRUE) {

    echo "New record created successfully.";

  } else {

    echo "Error:" . $sql1 . "<br>" . $conn->error;
  }




  $sql2 = "INSERT INTO `carddetail`(`C_ID`, `CVN`, `Exp_Date`, `Nameoncard`) VALUES ('$cno','$sscode',' $exp','$nameoncard')";

  $result = $conn->query($sql2);

  if ($result == TRUE) {

    // echo "New record created successfully.";

  } else {

    echo "Error:" . $sql2 . "<br>" . $conn->error;
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
  <title>Billing Details</title>
  <link rel="stylesheet" href="billing.css">

</head>

<body>
  <div id="main">
  <header class="header">
        <div >
            <img class="image2 logo" src="./assets2/diagonal_white_gradient_bkg.png" alt="alt text" />
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
    <div id="Billingform">

      <form action="" method="POST">
        <div class="fielsdset">

          <fieldset>

            <legend>
              <h2>Billing Details:</h2>
            </legend>

            <label>First name:</label><br>

            <input class="long" type="text" name="Firstname" required>

            <br>

            <label>Last name:</label><br>

            <input class="long" type="text" name="lastname"required>

            <br>

            <label> Contact Number:</label><br>

            <input class="long" type="con" name="Cno"required>

            <br>

            <label>Address:</label><br>

            <input class="long" type="text" name="address"required>

            <br>

            <div class="forminline">
              <div class="left-col-1">
                <label> City:</label><br>
                <input class="inline1" type="text" name="city"required><br>
              </div>
              <div class="left-col-2">
                <label>Country:</label><br>
                <input class="inline1" type="text" name="country"required><br>
              </div>
            </div>

            <label>Postal Code:</label><br>

            <input type="text" name="postalcode"required><br>

            <label>Email:</label><br>

            <input class="long" type="email" name="email"required><br>


          </fieldset>


          <fieldset>

            <legend>
              <h2>Payment Details:</h2>
            </legend>



            <input type="radio" name="ccard"required>
            <label>Credit Card</label>

            <br>

            <label>Card Number:</label><br>

            <input class="long" type="number" name="cardnum"required>

            <br>
            <div class="forminline">
              <div class="left-col-1">

                <label>Expiry Date:</label><br>
                <input class="inline1" type="date" name="exp"required>
              </div>
              <div>

                <label> CVN:</label><br>

                <input class="inline1" type="password" name="cvn"required>
              </div>
            </div class="eft-col-2">
            <label>Name on Card:</label><br>
            <input class="long" type="text" name="nameoncard"required><br>
          </fieldset>

          <input id="button" type="submit" name="submit" value="Pay Now">

      </form>
    </div>
  </div>
  <div id="roadmap">
    <h1><img src="./assets2/img.jpg" class="img"></h1>


  </div>
  </div>
  <footer class="footer" id="footer">
        <div>
            <img class="image3 logo1" src="./assets2/footprint_brand_logo_blue.png" alt="alt text" />
            <div class="soc"> 
                <img src="./assets2/twitter.png">
                <img id="img2" src="./assets2/facebook.png">
                <img id="img3" src="./assets2/social.png">
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
            <a href=""><span>Accessories</span></a>
            <a href=""><span>New Arrivals</span></a>
        </div>  
        
        <div class="info">
            <h5 class="">Company Info</h5>
            <a href=""><span >About FootPrint</span></a>
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

</html>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
<script src="validation.js"></script>
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