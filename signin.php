<?php 
    include "connection.php";
    session_start();

    if ($_SERVER["REQUEST_METHOD"] =="POST" && isset($_POST["signin"])) {
        $username = mysqli_real_escape_string($conn, $_POST['email']);
        $password = $_POST['password'];
        
        $tally = $conn->prepare("SELECT * FROM signup WHERE email = ? ");
        $tally->bind_param("s",$username);
        $tally->execute();
        $result = $tally->get_result();

        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            $signup_pw = $row['password'];

            
            if(md5($password) == $signup_pw/*password_verify($password, $signup_pw)*/){
                $_SESSION['email'] = $username;
                echo "<script>alert('Login Successful.');  window.location.href='./userpage.php';</script>";
            }  
            else{
                echo "<script>alert('Username or Password Incorrect.');</script>";/*md5($password)*/
            }
            
        }else{
            echo "<script>alert('No previous record found. Sign Up First'); window.location.href='./create.php';</script>";
        }

        $conn->close();
    }

/*
        $user = new Client_users();
        $result = $user->login($username, $password);
        if ($result) {
            $_SESSION["username"]=$username;
            echo "<script>alert('Login Successful');
                    location.replace('./dashboard.php');
            </script>";
        } else {
            echo "<script>alert('Login Failed');
            </script>";
        }
    }/*
    function login($username,$password){
        $db = new database();
        $con = $db->get_con();
        $sql = "SELECT c_un,c_pw FROM client_users WHERE c_un = '".$username."';";
        $result = $con->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $db_un = $row["c_un"];
                $db_pw = $row["c_pw"];
                if(($db_un == $username) && ($db_pw == $password)){
                    return true;
                }else{
                    echo "<script>console.log('Username or Password Incorrect');</script>";
                    return false;
                }
            }
        }else{
            echo "<script>console.log('Cannot find the record');</script>";
            return false;
        }*/

?>










<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FootPrint Sign In</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600&display=swap" />
    <link rel="stylesheet" href="signin.css" />
    <link rel="icon" type="image/x-icon" href="assets2/icon.png">
  </head>
  <body>
        <video autoplay muted loop id="myVideo">
        <source src="./assets2/Istockphoto-1282857824-640 Adpp Is-Vmake.m4v">
        </video>
        <div class="main-container">
      <div class="frame"></div>
      <div class="rectangle"></div>
      <span class="create">Log In</span>
      <div class="pngwing"></div>

      <form id="signupForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="email" class="rectangle-4" placeholder="Username" name="email" required>
        <input type="password" class="rectangle-8" placeholder="Password" name="password" required>

        <input type="submit" value="Sign In" class="group-b sign-in-c" name="signin" id="signinButton">
        
      
      </form>
      
    </div>

  </body>
</html>