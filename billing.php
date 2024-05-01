<?php
include "connection.php";
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
      <div>
        <img class="image2 logo" src="./assets2/diagonal_white_gradient_bkg.png" alt="alt text" />
        <img class="image3 logo" src="./assets2/footprint_brand_logo_blue.png" alt="alt text" />
      </div>
      <div class="topnav">
        <a href="./homepage.php">Home</a>
        <a href="#aboutus">About Us</a>
        <a href="#ourcollection">Products</a>
        <a href="">FAQ</a>
        <a href="#footer">Contact Us</a>
        <a href="./create.php"><img src="./assets2/9b91e3b2b4b199ba203624dabc95f709.png" alt="alt text" /></a>
        <a href="./cart.php"><img src="C:\xampp\htdocs\Billing page\footprint_brand_logo_blue.png" alt="alt text" /></a>
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

          <input id="button" type="submit" name="submit" value="Pay Now"required>

      </form>
    </div>
  </div>
  <div id="roadmap">
    <h1><img src="img.jpg" class="img"></h1>


  </div>
  </div>
</body>

</html>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
<script src="validation.js"></script>