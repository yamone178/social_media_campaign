<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="stylesheet" href="./style.css">
</head>
<?php

include("dbconnect.php");
if (isset($_POST['btnSubmit'])) {
  $name = $_POST['name'];
  $link = $_POST['link'];
  $plink = $_POST['privacylink'];

  if (isset($_FILES["logo"]) && $_FILES["logo"]["error"] == 0) {
    // Real file name
    $filename = $_FILES["logo"]["name"];
    // file path
    $filepath = $_FILES["logo"]["tmp_name"];
  }

  $sql = "INSERT INTO socialmediaapps (name,logo,link,privacylink) VALUES ('$name','$filename','$link','$plink') ";
  if ($conn->query($sql)) {
    move_uploaded_file($filepath, "images/" . $filename);
    header("location:socialmediaappSetup.php");
  }
}

if (isset($_GET['deleteId'])) {
  $did = $_GET['deleteId'];

  $sql = "Delete from socialmediaapps where id='$did'";
  if ($conn->query($sql) == true) {
    echo "<div> Delete a record successfully</div>";
    header("location:socialmediaappSetup.php");
  }
}

if (isset($_GET['editId'])) {
  $eid = $_GET['editId'];
  $sql = "Select * from socialmediaapps where id='$eid'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
} else {
  $sql = "Select * from socialmediaapps";
  $result = $conn->query($sql);
}





if (isset($_POST['btnUpdate'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $link = $_POST['link'];
  $privacylink = $_POST['privacylink'];

  if (isset($_FILES["logo"]) && $_FILES["logo"]["error"] == 0) {
    // Real file name
    $logo = $_FILES["logo"]["name"];
    // file path
    $filepath = $_FILES["logo"]["tmp_name"];
  } else {
    $sql = "Select logo from socialmediaapps where id='$id'";
    $res = $conn->query($sql);
    $test = $res->fetch_assoc();
    $logo = $test['logo'];
  }
  $sql = "UPDATE socialmediaapps SET name='$name', logo='$logo', link='$link', 'privacylink'='$privacylink'
         where id = $id ";
  if ($conn->query($sql) == true) {
    move_uploaded_file($filepath, "images/" . $image);
    echo "<div> Update a record successfully</div>";
    header("location:socialmediaapps.php");
  }
}

$sql1 = "SELECT * from socialmediaapps";
$result = $conn->query($sql1);

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
    <h1 class="setup-title">Social Media Apps Set up</h1>
    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>

  <div class="page-container">
    <main>
      <section id="contact">

        <div class="setup-form">
          <form action="#" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : "" ?>">

            <div class="form-control">
              <label for="name">Name:</label>
              <input type="text" id="name" name="name" value="<?php echo isset($row['name']) ? $row['name'] : "" ?>" required />
            </div>

            <div class="form-control">
              <label for="name">Logo:</label>
              <input type="file" id="name" name="logo" />
            </div>

            <div class="form-control">
              <label for="name">Login Link:</label>
              <input type="text" id="name" name="link" value="<?php echo isset($row['link']) ? $row['link'] : "" ?>" required />
            </div>

            <div class="form-control">
              <label for="name">Privacy Setting Link:</label>
              <input type="text" id="name" name="privacylink" value="<?php echo isset($row['privacylink']) ? $row['privacylink'] : "" ?>" required />
            </div>

            <?php
            if (isset($_GET['editId'])) {
            ?>
              <button type="submit" class="btnSubmit btn btn-dark" name="btnUpdate">Update</button>
            <?php
            } else { ?>
              <button type="submit" class="btnSubmit btn btn-dark" name="btnSubmit">Save</button>
            <?php  }  ?>
          </form>

        </div>
        <br><br>
        <hr>
        <?php
        if ($result->num_rows > 0) {
        ?>
          <h2 class="table-title"> Popular social media apps List</h2>
          <table cellspacing="0" cellpadding="10px">
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Logo</th>
              <th>Login Link</th>
              <th>Privacy Setting Link</th>
              <th>Action</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>

              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><img src="<?php echo "images\\" . $row['logo']; ?>" width="100px" height="100px"></td>
                <td><?php echo $row['link']; ?></td>
                <td><?php echo $row['privacylink']; ?></td>
                <td>
                  <span class="d-flex justify-center align-center">
                    <a href="socialmediaappSetup.php?editId=<?php echo $row['id']; ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                      </svg>
                    </a>
                    <a href="socialmediaappSetup.php?deleteId=<?php echo $row['id']; ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
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
        } else {
          echo " There is no data";
        }
        ?>
      </section>
    </main>

    <div class="section-divider"></div>
    <footer>
      <div class="footer-container justify-center">
        <h4 class="">Copyright &copy 2024 by safeteenonline All Rights Reserved</h4>
      </div>
    </footer>
  </div>
</body>

</html>