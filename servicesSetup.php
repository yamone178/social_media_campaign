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
      <h1 class="setup-title">Services Set up</h1>
      <!-- Custom Cursors and 3D Illustrations can be added here -->
    </header>

    <div class="page-container">
    <main>
      <section id="servicesSetup">

        <!-- Contact Form -->

        <div class="setup-form">
            <form action="#" method="POST">

              <input type="hidden" name="id" value="<?php echo isset($row['id'])? $row['id'] : "" ?>">

              <div class="form-control">
                  <label for="name">Title:</label> 

                  <input type="text" id="name" name="title" 
                  value="<?php echo isset($row['title'])? $row['title'] : "" ?>" required />
              </div>

              <div class="form-control">
                  <label for="description">Description:</label>
                  <textarea id="description" name="des" rows="4" required>
                    <?php echo isset($row['description'])? $row['description'] : "" ?>
                  </textarea>
              </div>


              <div class="form-control">
                  <label for="message">Info:</label>
                  <textarea id="message" name="info" rows="4" required>
                    <?php echo isset($row['info'])? $row['info'] : "" ?>
                  </textarea>

              </div>



              <?php
                if (isset($_GET['editId'])) {
                ?>  
                  <button type="submit" class="btnSubmit btn btn-dark" name="btnUpdate">Update</button>
                <?php
                }else{ ?>
                  <button type="submit" class="btnSubmit btn btn-dark" name="btnSubmit">Save</button>
                <?php  }  ?>


              </form>
        </div>
        
        
        <br><br>
        <hr>
        <?php 
          if($result->num_rows>0)
          {
        ?>
        <h2 class="table-title"> Services List </h2>
        <table cellspacing="0" cellpadding="5px">
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
                <span class="d-flex">
                  <a href="servicesSetup.php?editId=<?php echo $row['id'];?>">
                  <svg xmlns="http://www.w3.org/2000/svg"   class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                  </svg>
              </a>
                <a href="servicesSetup.php?deleteId=<?php echo $row['id']; ?>">
                      <svg xmlns="http://www.w3.org/2000/svg"  class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>
                </a>
                </span>
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
    
    <div class="section-divider"></div>
    <footer>
        <div class="footer-container justify-center">
          <h4 class="">Copyright &copy 2024 by safeteenonline  All Rights Reserved</h4>
        </div>
    </footer>
    </div>
  </body>
</html>
