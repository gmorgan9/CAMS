<!-- WORKING -->
<?php

require_once "../app/database/connection.php";
require_once "../app/database/functions.php";
require_once "../path.php";

session_start();

if(!isLoggedIn()){
   header('location: /login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CAMS | Admin Profile</title>

   <!-- Custom Styles -->
   <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/other-style.css?v='. time(); ?>">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>
<body>

   
<!-- <div class="land-container">
   <div class="content">

      <h3><span>Admin Profile Page</span></h3>
      <h1>welcome <span><?php //echo $_SESSION['admin_fname'] ?></span></h1>
      <p>this is an admin profile</p>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div> -->

<?php include(ROOT_PATH . "/app/includes/header.php"); ?>


<?php include(ROOT_PATH . "/app/includes/sidebar.php") ?>
        
<!-- start MAIN -->
<div class="main"> 
   


  <div class="page-header mx-auto">
    <p class="page_title" style="float: left; padding-top: 2px;">Profile</p>
    <ul class="breadcrumb">
      <li><a href="<?php echo BASE_URL . '/dashboard.php' ?>">Dashboard</a></li>
      <li>Profile</li>
    </ul>
  </div>

  <div class="jumbotron jumbotron-fluid bg-white m-2 mx-auto" style="width: 98%;">
  <div class="container">
    <h3 class="display-6 text-center" style="padding-top: 10px !important;">Welcome, <span style="text-transform: capitalize;"><?php echo $_SESSION['admin_fname'] ?>!</span></h3>
    <p class="subtitle text-muted text-center">Admin Profile Page</p>
  </div>
</div>

<div class="page-content mx-auto" style="margin-top: -6.5px;">
<form action="" method="post">
      <h3>Edit Profile</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <div class="form-group">
         <label for="fname">First Name</label>
         <input class="form-control" id="fname" type="text" name="fname" required>
      </div>
      <div class="form-group">
         <label for="fname">Last Name</label>
         <input class="form-control" id="lname" type="text" name="lname" required>
      </div>
      <div class="form-group">
         <label for="fname">User Name</label>
         <input class="form-control" id="uname" type="text" name="uname" required>
      </div>   
      <div class="form-group">
         <label for="fname">Email Address</label>
         <input class="form-control" id="email" type="email" name="email" required>
      </div>   
      <div class="form-group">
         <label for="fname">Password</label>
         <input class="form-control" id="password" type="password" name="password" required>
      </div>   
      <div class="form-group w-25">
         <label for="fname">Cnfirm Password</label>
         <input class="form-control" id="cpassword" type="password" name="cpassword" required>
      </div>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="student-login.php">login now</a></p>
   </form>
</div>

 
<!-- end MAIN -->
</div> 


<?php include(ROOT_PATH . "app/includes/footer.php"); ?>

</body>
</html>