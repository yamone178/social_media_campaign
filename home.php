<!DOCTYPE html>
<?php 
  session_start();
  $email=$_SESSION['email'];
  include("dbconnect.php");

  $sql="SELECT * from services";
  $resService=$conn->query($sql);

  $sql2="SELECT * from newsletter";
  $resNews=$conn->query($sql2);

  $sub=0;
  $sql1="SELECT * from member WHERE email='$email'";
  $resSub=$conn->query($sql1);
  if($resSub->num_rows>0)
  {
    $row1=$resSub->fetch_assoc();
    $sub=$row1['subscription'];
  }

  if(isset($_POST['btnSub']))
  {
    $sub=$_POST['sub'];
  $sql3="UPDATE member SET subscription = '$sub' WHERE email= '$email' ";    
  if($conn->query($sql3)==TRUE)
  {
   echo " Newsletter subscribed";
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
      <section id="home">
        <h2>Welcome to Our Campaign</h2>
        <form action="/search" method="get">
          <input
            type="text"
            id="search"
            name="search"
            placeholder="Search..."
          />
          <button type="submit">Search</button>
        </form>
        <p>Empowering teenagers to navigate the digital world safely.</p>
       <?php 
         if($resService->num_rows>0)
         {
          while($rowSer=$resService->fetch_assoc())
          {
       ?>
        <!--  Service 1 -->
        <div class="web-service">
          <h3><?php echo $rowSer['title']; ?></h3>
          <p>
          <?php echo $rowSer['description']; ?>
          </p>
          <p><strong><?php echo $rowSer['info']; ?></strong> </p>
          <p><strong><?php echo $rowSer['createdat']; ?></strong></p>
          <a href="#">Register Now</a>
        </div>
        <?php 
          }
         }
        ?>
   
        <!-- Most Popular Social Media Apps -->
        <section class="popular-apps">
          <h3>Most Popular Social Media Apps</h3>
          <ul>
            <li>Instagram</li>
            <li>Facebook</li>
            <li>Twitter</li>
            <li>Snapchat</li>
            <li>TikTok</li>
            <li>WhatsApp</li>
            <!-- Add more social media apps as needed -->
          </ul>
        </section>

        <!-- How to Stay Safe Online -->
        <section class="stay-safe-online">
          <h3>How to Stay Safe Online</h3>
          <p>Follow these tips to ensure a secure online experience:</p>
          <ul>
            <li>Set strong, unique passwords</li>
            <li>Enable two-factor authentication</li>
            <li>Be cautious about sharing personal information</li>
            <li>Regularly update privacy settings</li>
            <li>Use antivirus software</li>
            <li>Verify the authenticity of online information</li>
          </ul>
        </section>

        <section id="contact">
          <?php 
            if($sub==1)
            {
          ?>
           <h2>News</h2>
           <?php 
         if($resNews->num_rows>0)
         {
          while($rowNews=$resNews->fetch_assoc())
          {
       ?>
        <!--  Service 1 -->
        <div class="web-service">
          <h3><?php echo $rowNews['title']; ?></h3>
          <p>
          <?php echo $rowNews['content']; ?>
          </p>
          <p><img src="<?php echo "images\\" . $rowNews['image']; ?>" width="200px"  ></p>
          <p><strong><?php echo $rowNews['publishdate']; ?></strong></p>
          
        </div>
        <?php 
          }
         }
            }
            else {
           ?>
             <!-- Contact Form -->
        <form action="#" method="POST">
          <label for="name">Newsletter Subscription:</label>
            <input type="radio" id="name" name="sub" value="1" required />Yes
            <input type="radio" id="name" name="sub" value="0" required />No
          <button type="submit" name="btnSub">Subscribe</button>
        </form>

          <?php }
          ?>
        </section>

        
      </section>
    </main>

    <footer>
      <p>You are here: Home: <?php echo $email; ?></p>
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
