<?php

require_once "database/connection.php";

session_start();

if(!isset($_SESSION['user_fname']) && !isset($_SESSION['user_lname'])){
   header('location:student-login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- Custom Styles -->
   <link rel="stylesheet" href="main-style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>
<body>
<?php include("includes/header.php"); ?>
   
<div class="land-container">

   <div class="content">
      <h3 style="color: white;">hi, <span>user</span></h3>
      <h1 style="color: white;">welcome <span><?php echo $_SESSION['user_fname'] ?></span></h1>
      <p style="color: white;">this is an user page</p>
      <a style="color: white;" href="login_form.php" class="btn">login</a>
      <a style="color: white;" href="register_form.php" class="btn">register</a>
      <a style="color: white;" href="logout.php" class="btn">logout</a>
   </div>

</div>

<?php include("includes/footer.php"); ?>

</body>
</html>