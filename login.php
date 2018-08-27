
<?php
   include 'conn.php';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      $_username = mysqli_real_escape_string($conn,$_POST['user']);
      $_password = mysqli_real_escape_string($conn,$_POST['pass']);
      $_username = stripslashes($_username);//to protect from sql injection
      $_password = stripslashes($_password);//to protect from sql injection
      $sql = "SELECT id FROM login WHERE username = '$_username' and password = '$_password'";
      $result=mysqli_query($conn,$sql)or die("Error: " . mysqli_error($conn));
       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
           $count = mysqli_num_rows($result);
           echo $count;
           if($count == 1)
                {
                     session_start();
                     $_SESSION['loggedin'] = true;
                     $_SESSION['username'] = $_POST['user'];
                     header("location: admin.php");
                }
      else {
         $error = "Your Login Name or Password is invalid";
      }
      // If result matched $myusername and $mypassword, table row must be 1 row
   }
?>



<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/form.css">
  <title></title>
</head>
<body>

<div class="login-page">
  <div class="form">

    <form class="login-form" method="POST" action="">
      <input type="text" name="user" placeholder="username"/>
      <input type="password" name="pass"placeholder="password"/>
      <button>login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>
</body>
</html>
