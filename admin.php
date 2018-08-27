<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{//if user is login

 // Create database connection
 include 'conn.php';

 // If upload button is clicked ...
 if (isset($_POST['upload']))

 {
   // Get image name
   $image = mysqli_real_escape_string($conn,$_FILES['image']['name']);
   // Get text
   //$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

    $img_title=mysqli_real_escape_string($conn,$_POST['title']);
    $image_title_description=mysqli_real_escape_string($conn,$_POST['itd']);
    $post_time= date(DATE_RFC822);//for post date and time
    $img_date= mysqli_real_escape_string($conn,$_POST['date_of']);
   $target = "pics/".basename($image);

    $sql = "INSERT INTO images (image,title,date,description,date_of) VALUES ('$image', '$img_title','$post_time','$image_title_description','$img_date')";
   // execute query
   mysqli_query($conn, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
     $msg = "Image uploaded successfully";
    echo $msg;
 }


    else{
   $msg = "Failed to upload image";
   echo $msg;

  }

}
}
else {
 echo "smthng wrong ";
 session_destroy();
 header('Location:login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>cvam0000</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}

    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 200%;
    }

    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;}
    }
  </style>
</head>
<body>


<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2><?php echo $_SESSION['username']; ?></h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Dashboard</a></li>
        <li><a href="#section2">Profile</a></li>
        <li><a href="#section3">Edit Profile</a></li>
        <li><a href="#section3">Gallery</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul><br>
    </div>
    <br>

    <div class="col-sm-9">
      <div class="well">
        <h2>Dashboard</h2>

      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="well">
            <h5>Select an image to upload</h5>
            <form method="POST" action="admin.php" enctype="multipart/form-data">
   <input type="hidden" name="size" value="1000000">
   <div>
     <input type="file" name="image">
</div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="well">
            <h5>Add title or description in any </h5>
            <input type="text" name="title" placeholder="title">
<input type="text" name="itd" placeholder="description">
          </div>
        </div>
        <div class="col-sm-12">
          <div class="well">
          <h5>Add date for the image </h5>
          <h4><input type="date" name="date_of" ></h4>
          <button class="button button1" type="submit" name="upload">POST</button>

          </div>
        </div>






      </div>
    </div>
  </div>
</div>

</body>
</html>
