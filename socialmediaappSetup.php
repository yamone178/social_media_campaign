<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Safety Campaign</title>
    <link rel="stylesheet" href="">
  </head>
  <?php 

  include("dbconnect.php");
  if(isset($_POST['btnSave']))
  {
     $name=$_POST['name'];
     $link=$_POST['llink'];
     $plink=$_POST['plink']; 

     if(isset($_FILES["logo"]) && $_FILES["logo"]["error"]==0)
     {
       // Real file name
       $filename = $_FILES["logo"]["name"];
       // file path
       $filepath = $_FILES["logo"]["tmp_name"];
     }

     $sql="INSERT INTO socialmediaapps (name,logo,link,privacylink) VALUES ('$name','$filename','$link','$plink') ";
     if($conn->query($sql))
     {
       header("location:socialmediaappSetup.php");
     }

  }
  $sql1="SELECT * from socialmediaapps";
  $result=$conn->query($sql1);

  ?>
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
    <header>
      <h1>Social Media Apps Set up</h1>
      <!-- Custom Cursors and 3D Illustrations can be added here -->
    </header>

    <main>
      <section id="contact">
        <h2>Social Media Apps Set up</h2>

        <form action="#" method="post" enctype="multipart/form-data">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required />

          <label for="name">Logo:</label>
          <input type="file" id="name" name="logo" required />

          <label for="name">Login Link:</label>
          <input type="text" id="name" name="llink" required />

          <label for="name">Privacy Setting Link:</label>
          <input type="text" id="name" name="plink" required />

          <button type="submit" name="btnSave">Save</button>
        </form>
        <br><br>
        <hr>
        <?php 
          if($result->num_rows>0)
          {
        ?>
        <h2> Popular social media apps </h2>
        <table border="1" cellspacing="5" cellpadding="5px">
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Logo</th>
            <th>Login Link</th>
            <th>Privacy Setting Link</th>
            <th>Action</th>
          </tr>
           <?php 
            while($row=$result->fetch_assoc())
           {
           ?>

          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><img src="<?php echo "images\\" . $row['logo']; ?>" width="100px" height="100px" ></td>
            <td><?php echo $row['link']; ?></td>
            <td><?php echo $row['privacylink']; ?></td>
            <td><a href=""> Edit </a> <a href="">Delete</a></td>
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

    <footer>
      <p>You are here: Social Media Apps Setup</p>
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
