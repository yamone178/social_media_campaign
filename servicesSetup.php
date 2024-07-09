<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Safety Campaign</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <?php 
    include('dbconnect.php');
    if(isset($_POST['btnSubmit']))
    {
      $title=$_POST['title'];
      $des=$_POST['des'];
      $info=$_POST['info'];
  
      $sql="INSERT INTO services (title, description, info ) VALUES ('$title', '$des', '$info')";
      if($conn->query($sql)==TRUE)
      {
        echo " Insert service successfully ";
        header("location:servicesSetup.php");
      }
    }

      
    if (isset($_GET['deleteId'])) {
      $did = $_GET['deleteId'];

      $sql = "Delete from services where id='$did'";
      if ($conn->query($sql) == true) {
         echo "<div> Delete a record successfully</div>";
         header("location:servicesSetup.php");
      }
  }

// edit service
  
      if (isset($_GET['editId'])) {
        $did = $_GET['editId'];
        $sql = "Select * from services where id='$did'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }else{
        $sql = "Select * from services";
        $result = $conn->query($sql);
    }

    // update service

    if (isset($_POST['btnUpdate'])) {
      $id = $_POST['id'];
      $title = $_POST['title'];
      $des = $_POST['des'];
      $info = $_POST['info'];

      $sql = "UPDATE services SET title='$title', description='$des', info='$info'
              where id = $id ";
      if ($conn->query($sql) == true) {
      echo "<div> Update a record successfully</div>";
      header("location:servicesSetup.php");
      
      }    
  }

    $sql1="SELECT * from services";
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
      <h1>Services Set up</h1>
      <!-- Custom Cursors and 3D Illustrations can be added here -->
    </header>

    <main>
      <section id="contact">

        <!-- Contact Form -->
        <form action="#" method="POST">

          <input type="hidden" name="id" value="<?php echo isset($row['id'])? $row['id'] : "" ?>">

          <label for="name">Title:</label>
          <input type="text" id="name" name="title" 
          value="<?php echo isset($row['title'])? $row['title'] : "" ?>" required />

          <label for="description">Description:</label>
          <textarea id="description" name="des" rows="4" required>
            <?php echo isset($row['description'])? $row['description'] : "" ?>
          </textarea>

          <label for="message">Info:</label>
          <textarea id="message" name="info" rows="4" required>
            <?php echo isset($row['info'])? $row['info'] : "" ?>
          </textarea>

          <?php
            if (isset($_GET['editId'])) {
            ?>  
              <button type="submit" name="btnUpdate">Update</button>
            <?php
            }else{ ?>
               <button type="submit" name="btnSubmit">Save</button>
             <?php  }  ?>

          
        </form>
        <br><br>
        <hr>
        <?php 
          if($result->num_rows>0)
          {
        ?>
        <h2> Services List </h2>
        <table border="1" cellspacing="5" cellpadding="5px">
          <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Information</th>
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
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['info']; ?></td>
            <td><?php echo $row['createdat']; ?></td>
            <td>
            <a href="servicesSetup.php?editId=<?php echo $row['id'];?>">Edit</a>
              <a href="servicesSetup.php?deleteId=<?php echo $row['id']; ?>">Delete</a>
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

      </section>
    </main>

    <footer>
      <p>You are here: Services</p>
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
