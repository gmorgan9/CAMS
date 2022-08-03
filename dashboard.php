<?php
session_start();
require_once "app/database/functions.php";

if(isLoggedIn()) {
echo "welcome";
}else {
  header('location: student-login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="../main-style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">



    <title>CAMS | Home Page</title>
</head>
<body>
    
<?php include("app/includes/header.php"); ?>

    <h1>Dashboard</h1>


      <?php include("app/includes/footer.php"); ?>


</body>
</html>