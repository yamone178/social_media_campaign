<!DOCTYPE html>

<?php 
  session_start();
  $email=$_SESSION['email'];
  include("dbconnect.php");

  $sql1="SELECT * from socialmediaapps";
  $result=$conn->query($sql1);

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
        <li class="link"><a href="home.php">Home</a></li>
        <li class="link"><a href="information.php">Information</a></li>
        <li>
          Campaigns
          <ul>
            <li class="link">
              <a href="popular-apps.php">Popular Apps</a>
            </li>
            <li class="link">
              <a href="parents-help.php">Parents Help</a>
            </li>
            <li class="link">
              <a href="livestreaming.php">Livestreaming</a>
            </li>
          </ul>
        </li>

        <li class="link"><a href="contact.php">Contact</a></li>
        <li class="link"><a href="legislation.php">Legislation</a></li>
        <li class="link"><a href="logout.php">Logout</a></li>
      </ul>
      <form action="/search" method="get" class="search-input">
        <input type="text" id="search" name="search" placeholder="Search..." />
        <button type="submit">Search</button>
      </form>
    </nav>
    <header>
      <h1>Online Safety Campaign</h1>
      <!-- Custom Cursors and 3D Illustrations can be added here -->
    </header>

    <main>
      <section id="popular-apps">
        <h2>Most Popular Social Media Apps</h2>

        <?php 
         if($result->num_rows>0)
         {
          while($row=$result->fetch_assoc())
          {
       ?>
        <!--  Service 1 -->
        <div class="web-service">
          <h3><?php echo $row['name']; ?></h3>
          <p><img src="<?php echo "images\\" . $row['logo']; ?>" width="100px" height="100px" ></p>
          <p>
          <a href="<?php echo $row['link']; ?>" > Facebook Login </a>
          </p>
          <p><strong><a href="<?php echo $row['privacylink']; ?>"> Privacy Settings </a></strong> </p>
         
        </div>
        <?php 
          }
         }
        ?>
   

      </section>
    </main>

    <footer>
      <p>You are here: Popular Apps</p>
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
