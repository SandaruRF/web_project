<?php 
include "connection.php";
session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    $first_name = mysqli_real_escape_string($conn,$_POST['firstname']);
    $last_name = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM signup WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows >0){
      echo "<script>window.location.href='create.php'; alert('Email address already exists'); </script>";
    }
    else{
      $hashed_password = md5($password);

      $stmt = $conn->prepare("INSERT INTO  signup (firstname , lastname , email, password) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss",$first_name, $last_name, $email, $hashed_password);
    


      if($stmt->execute()){
        $_SESSION["email"] = $email;
        echo "<script>alert('Sign Up Successful');  window.location.href='./signin.php';</script>";
        exit();
      }
      else{
        echo "<script>alert(' Sign Up Failed: " . $conn->error. " ';</script>";
      }

      $stmt->close();
    }
    
    $conn->close(); 

  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FootPrint Sign Up</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600&display=swap" />
    <link rel="stylesheet" href="create.css" />
  </head>
  <body>
  <video autoplay muted loop id="myVideo">
  <source src="./assets2/Istockphoto-1282857824-640 Adpp Is-Vmake.m4v">
</video>
    <div class="main-container">
      <div class="frame"></div>
      <div class="rectangle"></div>
      <span class="create">create account</span>
      <div class="pngwing"></div>

      <form id="signupForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="text" class="rectangle-div-2" placeholder="First Name" name="firstname" required autocomplete="on">
        <input type="text" class="rectangle-div" placeholder="Last Name" name="lastname" required autocomplete="on">
        <input type="email" class="rectangle-4" placeholder="Email" name="email" required autocomplete="on">
        <input type="password" class="rectangle-8" placeholder="Password" name="password" required autocomplete="on">
        <input type="submit" value="Sign Up" class="group-e sign-up" name="signup" autocomplete="on">
        <a href="./signin.php" style="text-decoration:none;"><input type="submit" value="Sign In" class="group-b sign-in-c" name="signin" id="signinButton"></a>
        
        
      
      </form>
      
    </div>


    <script>
      var signupForm = document.getElementById('signupForm');
      var signinButton = document.getElementById('signinButton');


      signinButton.addEventListener('click' , function(event){
        event.preventDefault();
        window.location.href= 'signin.php';
      });
      
    </script>
  </body>
</html>
