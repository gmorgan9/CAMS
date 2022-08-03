<?php

require_once "../app/database/connection.php";
require_once "../app/database/functions.php";
require_once "../app/database/path.php";

session_start();

if(!isLoggedIn()){
   header('location:../student-login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- Custom Styles -->
   <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/other-style.css?v=2.2' ?>">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>
<body>
<?php include("../app/includes/header.php"); ?>
   
<div class="land-container">

   <div class="content">
      <h3 style="color: white;"><span>Admin Profile Page</span> <?php echo $_SESSION['isadmin'] ?></h3>
      <h1 style="color: white;">welcome <span><?php echo $_SESSION['admin_fname'] ?></span></h1>
      <p style="color: white;">this is an admin page</p>
      <a style="color: white;" href="logout.php" class="btn">logout</a>
   </div>

</div>

<?php include("../app/includes/footer.php"); ?>

</body>
</html>