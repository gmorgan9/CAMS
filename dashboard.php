<!-- WORKING -->
<?php
require_once "app/database/connection.php";
require_once "app/database/functions.php";
require_once "path.php";
session_start();

if(!isLoggedIn()){
  header('location:/login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Custom Styles -->
   <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/other-style.css?v='. time(); ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">



    <title>CAMS | Dashboard</title>
</head>
<body>
    
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>


<?php include(ROOT_PATH . "/app/includes/sidebar.php") ?>
        
<div class="main">
  <div class="page-header mx-auto">
    <p class="page_title" style="float: left; padding-top: 2px;">Dashboard</p>
    <!-- <ul class="breadcrumb">
      <li>Dashboard</li>
    </ul> -->
  </div>


  <!-- stats -->
<div class="stats d-flex justify-content-center" style="margin-left: -1px; margin-top: 5px !important;">



<div class="row">


  <div class="card" style="width: 24.1rem; margin-right: 20px; border-radius: 0 !important; border-color: #fff;">
  <div class="card-body">
    <h5 class="card-title text-end">Total Courses</h5>
    <h6 class="card-subtitle mb-2 text-muted text-end" style="font-size: 40px !important;">3</h6>
    <p class="card-text text-end">View Details</p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>

<div class="card" style="width: 24.1rem; border-radius: 0 !important; border-color: #fff;">
  <div class="card-body">
    <h5 class="card-title text-end">Total Assignments Due</h5>
    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    <p class="card-text text-end">View Details</p>
    <i class="bi bi-file-earmark-text" style="text-align: left;"></i>
  </div>
</div>

<!-- <div class="card" style="width: 24.1em; border-radius: 0 !important; border-color: #fff;">
  <div class="card-body">
    <h5 class="card-title">Total </h5>
    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    <p class="card-text text-end">View Details</p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div> -->


</div>


</div>






</div>


<?php include(ROOT_PATH . "app/includes/footer.php"); ?>


</body>
</html>