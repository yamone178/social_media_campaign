<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Safety Campaign</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <?php
  
  include("dbconnect.php");

  if(isset($_POST['btnSave']))
  {
     $title=$_POST['title'];
     $content=$_POST['content'];
    
     if(isset($_FILES["image"]) && $_FILES["image"]["error"]==0)
     {
       // Real file name
       $filename = $_FILES["image"]["name"];
       // file path
       $filepath = $_FILES["image"]["tmp_name"];
     }

   

     $sql="INSERT INTO newsletter (title, content, image) VALUES ('$title','$content', '$filename') ";
     if($conn->query($sql))
     {
      move_uploaded_file($filepath, "images/".$filename);
       header("location:newsletterSetup.php");
     }

  }

  if (isset($_GET['deleteId'])) {
    $did = $_GET['deleteId'];

    $sql = "Delete from newsletter where id='$did'";
    if ($conn->query($sql) == true) {
      echo "<div> Delete a record successfully</div>";
      header("location:newsletterSetup.php");
    }
  }

  // $oldSql = mysql_query("Select * from newsletter where")

  if (isset($_GET['editId'])) {
    $eid = $_GET['editId'];
    $sql = "Select * from newsletter where id='$eid'";
    if ($conn->query($sql)) {
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
    }
  }else {
    $sql = "Select * from newsletter";
    $result = $conn->query($sql);
  }

  if(isset($_POST['btnUpdate'])){
    $id= $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    if(isset($_FILES["image"]) && $_FILES["image"]["error"]==0)
     {
       // Real file name
       $image = $_FILES["image"]["name"];
       // file path
       $filepath = $_FILES["image"]["tmp_name"];
     } else{
      $sql = "Select image from newsletter where id='$id'";
      $res = $conn->query($sql);
      $test = $res->fetch_assoc();
      $image = $test['image'];
     }
     $sql = "UPDATE newsletter SET title='$title', content='$content', image='$image'
          where id = $id ";
      if ($conn->query($sql) == true) {
      move_uploaded_file($filepath, "images/".$image);
      echo "<div> Update a record successfully</div>";
      header("location:newsletterSetup.php");

}     
   
   }

  $sql = "Select * from newsletter";
  $result = $conn->query($sql);
  
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
      <h1>NewsLetter Set up</h1>
      <!-- Custom Cursors and 3D Illustrations can be added here -->
    </header>

    <main>
      <section id="contact">
        <h2>Contact Us</h2>
        <p>
          Feel free to reach out to us using the contact form below. We
          appreciate your feedback and inquiries.
        </p>

        <!-- Contact Form -->
        <form action="#" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo isset($row['id'])? $row['id']: ''?>">
          <label for="title">Title:</label>
          <input type="text" id="title" name="title" 
          value="<?php echo isset($row['title']) ? $row['title']: "" ?>" required />

          <label for="content">content:</label>
          <textarea id="content" name="content" rows="4" required>
           <?php echo isset($row['content']) ? $row['content']: "" ?>
          </textarea>

          <?php

            if (isset($row['image'])) { ?>
                <img src="<?php echo "images\\".$row['image'] ?>" alt="" width="100px">
            <?php 
              }
          
          ?>

          <label for="image">Logo:</label>
          <input type="file" id="image" name="image" 
          value="<?php echo isset($row['title']) ? $row['title']: "" ?>"/>

          <?php
            if (isset($_GET['editId'])) {
            ?>  
              <button type="submit" name="btnUpdate">Update</button>
            <?php
            }else{ ?>
               <button type="submit" name="btnSubmit">Save</button>
             <?php  }  ?>
        </form>

        <!-- Privacy Policy Link -->
        <p>
          Before sending a message, please review our
          <a href="privacy-policy.html" target="_blank">Privacy Policy</a>.
        </p>
      </section>

     

      <?php 
    
          if($result->num_rows>0)
          {
        ?>
        <h2> Services List </h2>
        <table border="1" cellspacing="5" cellpadding="5px">
          <tr>
            <th>Id</th>
            <th>Title</th>
            <th>content</th>
            <th>image</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
           <?php 
            while($row=$result->fetch_assoc())
           {
           ?>

          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['content']; ?></td>
            <td>
              <img src="<?php echo "images\\".$row['image']; ?>" alt="" width="100px" height="100px">
              
            </td>
            <td><?php echo $row['publishdate']; ?></td>
            <td>
            <a href="newsletterSetup.php?editId=<?php echo $row['id'];?>">Edit</a>
              <a href="newsletterSetup.php?deleteId=<?php echo $row['id']; ?>">Delete</a>
            </td>
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

    </main>



    <footer>
      <p>You are here: Home</p>
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
