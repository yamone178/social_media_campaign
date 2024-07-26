<!DOCTYPE html>
<?php 
        session_start();
        if(isset($_SESSION['attempt_again']))
        {
            $now = time();
            if($now >= $_SESSION['attempt_again'])
            {
              unset($_SESSION['attempt']);
              unset($_SESSION['attempt_again']);
              unset($_SESSION['msg']);
              unset($_SESSION['check']);
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
        
            <div class="account-container login">
             <h2 class="">Login</h2>
             <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. In, aliquid.</small>

<!-- Contact Form -->

<?php
                    if(isset($_SESSION['msg']))
                    {
                ?>
                <div class="alert-msg">
                    <?php 
                        echo $_SESSION['msg'];
                    ?>
                </div>
                <?php
                    }
                    if(isset($_SESSION['check']) != 1)
                    {
                ?>
            <form action="login-success.php" method="POST">
            
              <div class="account-control">
                <label for="email">Email</label> <br>
                <input type="email" id="email" name="email"
                placeholder="example@gmail.com" required /> 
              </div>

             <div class="account-control">
                <label for="message">Password</label> <br>
                 <input type="password" id="email" name="password"
                 placeholder="your password" required />
             </div>
              <button type="submit" class="btn btn-dark">Login</button>
            </form>

            <?php } ?>
            <br>
           <p class=""> Not a member register <a href="registration.php"> here </a></p>
            <!-- Privacy Policy Link -->
            <p class=" mt-5">
              Before sending a message, please review our
              <a href="privacy-policy.html" target="_blank">Privacy Policy</a>.
              </p>
            </div>
    
        
       
      </section>
    </main>

   
  </body>
</html>
