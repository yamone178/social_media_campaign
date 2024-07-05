<!DOCTYPE html>
<?php 

include("dbconnect.php");
if(isset($_POST['btnReg']))
{
   $name=$_POST['name'];
   $email=$_POST['email'];
   $password=$_POST['password'];
   $city=$_POST['city'];
   $sub=$_POST['sub'];

   $sql="INSERT INTO member (name,email,password,city,subscription,usertype) VALUES ('$name','$email','$password','$city','$sub',0) ";

   if($conn->query($sql))
   {
    session_start();
    $_SESSION['email'] =$email;
     header("location:home.php");
   }


}

?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Safety Campaign</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <nav>
      <ul>
        <li class="link"><a href="index.php">Home</a></li>
        <li class="link"><a href="binformation.php">Information</a></li>
        <li class="link"><a href="blegislation.php">Legislation</a></li>
        <li class="link"><a href="login.php">Login</a></li>
      </ul>
     
    </nav>
    <header>
      <h1>Online Safety Campaign</h1>
      <!-- Custom Cursors and 3D Illustrations can be added here -->
    </header>
     
    <main>
      <section id="contact">
        <h2>Registration</h2>
      
        <!-- Contact Form -->
        <form action="#" method="POST">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required />

          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required />

          <label for="name">Password:</label>
          <input type="password" id="name" name="password" required />

          <label for="name">City:</label>
          <input type="text" id="name" name="city" required />

          <label for="name">Newsletter Subscription:</label>
          <input type="radio" id="name" name="sub" value="1" required />Yes
          <input type="radio" id="name" name="sub" value="0" required />No
          
          <button type="submit" name="btnReg">Register</button>
        </form>

        <!-- Privacy Policy Link -->
        <p>
          Before sending a message, please review our
          <a href="privacy-policy.html" target="_blank">Privacy Policy</a>.
        </p>
      </section>
    </main>

    <footer>
      <p>You are here: Registration</p>
      <div class="footer-content">
        <p>&copy; 2024 Online Safety Campaign</p>
        <!-- Add social media buttons with relevant links -->
        <a href="#" style="color: white">Facebook</a>
        <a href="#" style="color: white; margin-left: 10px">Twitter</a>
        <a href="#" style="color: white; margin-left: 10px">Instagram</a>
      </div>
    </footer>
  </body>
</html>
