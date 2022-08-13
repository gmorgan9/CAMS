<!-- WORKING -->
<?php

require_once "app/database/connection.php";
require_once "app/database/functions.php";
require_once "path.php";
session_start();

if(isLoggedIn()){
  header('location: '. BASE_URL . '/pages/dashboard.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- Custom Styles -->
   <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/main-style.css?v='. time(); ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">



    <title>CAMS | Home Page</title>
</head>
<body>

<div class="blocked-page">
<?php include("app/includes/blocked-page.php"); ?>
</div>
    
<div class="main-container">
<?php include("app/includes/header.php"); ?>

    <div class="container text-end">
        <br><br><br><br><br><br><br>
        <div class="row">
          <div class="col"></div>
          <div class="col"></div>
          <div class="col"></div>
        </div>
        <div class="row">
          <div class="col"></div>
          <div class="col">
            <h1 style="color: white;">The Best Place to Track your <span style="color:#48ceff;">Assignments</span></h1>
          </div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col">
              <p style="color: white; font-weight: 100 !important;">Successful Careers start with Proactive Education</p>
            </div>
          </div>
          <div class="row">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col" style="margin-top: -23px;">
                <span style="border-bottom: 3px solid #ffffff; color: rgba(0, 0, 0, 0);">color</span><span style="border-bottom: 3px solid #48ceff; margin-top: -150px !important; color: rgba(0, 0, 0, 0);">color</span>
            </div>
          </div>
      </div>


      <?php include("app/includes/footer.php"); ?>
      </div>

</body>
</html>