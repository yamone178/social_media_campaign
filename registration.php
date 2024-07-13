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
     
    <main>
      <section id="account">
        <div class="account-container .register">
            <h2>Registration</h2>
          
          <!-- Contact Form -->
          <form action="#" method="POST">

          <div class="container">
              <div class="col-2">
              <div class="account-control">
              <label for="name">Name:</label>
              <input type="text" id="name" name="name" required />
              </div>
              <div class="account-control">
                <label for="email">Email:</label>
                  <input type="email" id="email" name="email" required />
              </div>
              </div>
              <div class="col-2">
                  <div class="account-control">
                  <label for="name">Password:</label>
                  <input type="password" id="name" name="password" required />
              </div>
              <div class="account-control">
                  <label for="name">City:</label>
                  <input type="text" id="name" name="city" required />
              </div>
              </div>

          </div>

          <div class="news-letter">
              <label for="name">Newsletter Subscription</label> <br> <br>
              <div class="d-flex ">
                  <div class="rdo">
                    <input type="radio" id="name" name="sub" value="1" required />Yes
                  </div>
                  <div class="rdo">
                  <input type="radio" id="name" name="sub" value="0" required />No
                    </div>
              </div>
          </div>
       
            <button class="btn btn-dark" type="submit" name="btnReg">Register</button>
          </form>

          <!-- Privacy Policy Link -->
          <p class=" mt-10">
            Before sending a message, please review our
            <a href="privacy-policy.html" target="_blank">Privacy Policy</a>.
          </p>
        </div>
      </section>
    </main>

   
  </body>
</html>
