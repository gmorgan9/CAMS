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
<!-- Admin Page Wrapper -->
<div class="dash-wrapper">

<?php include(ROOT_PATH . "/app/includes/sidebar.php") ?>
        
<!-- Admin Content -->
<div class="dash-content">

<div class="content">

    <h2 class="page-title">Dashboard</h2>

    <?php //include(ROOT_PATH . '/app/includes/messages.php'); ?>

</div>

</div>
<!-- // Admin Content -->

</div>
<!-- // Page Wrapper -->


<?php include(ROOT_PATH . "app/includes/footer.php"); ?>


</body>
</html>