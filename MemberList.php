<!DOCTYPE html>
<?php 
    include('dbconnect.php');

    $sql1="SELECT * from member";
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
  <li class="link"><a href="adminhome.php">Home</a></li>
        <li class="link"><a href="servicesSetup.php">Services</a></li>
        <li class="link"><a href="newsletterSetup.php">NewsLetter</a></li>
        <li class="link"><a href="howparenthelpSetup.php">HowParentHelp</a></li>
        <li class="link"><a href="socialmediaappSetup.php">SocialMediaApps</a></li>
        <li class="link"><a href="contactList.php">Help/Support</a></li>
        <li class="link"><a href="MemberList.php">MemberList</a></li>
        <li class="link"><a href="logout.php">Logout</a></li>
      </ul>
    
    </nav>
    <div class="section-divider"></div>
  
    <header>
      <h1>MemberList</h1>
      <!-- Custom Cursors and 3D Illustrations can be added here -->
    </header>
    <div class="page-container">
    <main>
      <section id="contact" class=" d-flex justify-center align-center">
        
        <?php 
          if($result->num_rows>0)
          {
        ?>
     
        <table border="1" cellspacing="5" cellpadding="5px">
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>City</th>
            <th>Newsletter Subscription</th>
            <th>User Type</th>
          </tr>
           <?php 
            while($row=$result->fetch_assoc())
           {
           ?>

          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td><?php echo $row['subscription']==1? "Yes":"No"; ?></td>
            <td><?php echo $row['usertype']==1? "Admin":"User"; ?></td>
           
          </tr>
          <?php 
           }
           ?>
        </table>
        <?php 
          }
          else{
            echo " There is no data";
          }
        ?>
       
      </section>
    </main>

    <div class="section-divider"></div>
    <footer>
        <div class="footer-container justify-center">
          <h4 class="">Copyright &copy 2024 by safeteenonline  All Rights Reserved</h4>
        </div>
    </footer>
    </div>
  </body>
</html>
