<!-- WORKING -->
<?php

require_once "../app/database/connection.php";
require_once "../app/database/functions.php";
require_once "../path.php";

session_start();

if(!isLoggedIn()){
   header('location: /login.php');
}


$sID = $_SESSION['sID'];
$select = " SELECT * FROM students WHERE studentID = '$sID' ";
$result = mysqli_query($conn, $select);

if(isset($_POST['update-profile'])){

   //$sID   = mysqli_real_escape_string($conn, $_POST['studentID']);
   $fname = mysqli_real_escape_string($conn, $_POST['fname']);
   $lname = mysqli_real_escape_string($conn, $_POST['lname']);
   $uname = mysqli_real_escape_string($conn, $_POST['uname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   // $pass = md5($_POST['password']);
   // $cpass = md5($_POST['cpassword']);
   // $isadmin = $_POST['isadmin'];

   $update_select = " SELECT * FROM students WHERE uname = '$uname' && email = '$email' ";

   $update_result = mysqli_query($conn, $update_select);

   if(mysqli_num_rows($result) > 0){

      // $error[] = 'user already exist!';
      $update = "UPDATE students SET fname = '$fname', lname = '$lname', uname = '$uname', email = '$email' where studentID = '$sID' ";
      mysqli_query($conn, $update);
      $success[] = 'Success';
      header('location:' . BASE_URL . '/admin/profile.php');
      
   }else{
      
   } 
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CAMS | Manage Users</title>

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
   
<?php 

if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
?>

  <div class="page-header mx-auto">
    <p class="page_title" style="float: left; padding-top: 2px;">Manage Users</p>
    <ul class="breadcrumb">
      <li><a href="<?php echo BASE_URL . '/dashboard.php' ?>">Dashboard</a></li>
      <li>Manage Users</li>
    </ul>
  </div>

  <div class="jumbotron jumbotron-fluid bg-white m-2 mx-auto" style="width: 98%;">
  <div class="container">
    <h3 class="display-6 text-center" style="padding-top: 5px !important;padding-bottom: 10px !important;">Welcome, <span style="text-transform: capitalize;"><?php echo $row['fname'] ?>!</span></h3>
  </div>
</div>

<!-- start PAGE-CONTENT -->
<div class="page-content mx-auto">





<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <tr>
      <th scope="row"><?php echo $row['studentID'] ?></th>
      <td><?php echo $row['fname'] ?></td>
      <td><?php echo $row['lname'] ?></td>
      <td><?php echo $row['uname'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td colspan="2">

        <a href="#" class="btn-primary"><i class="bi bi-eye"></i></a>
        <a href="#" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
        <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>



      </td>
  </tbody>
</table>












      <?php 
      }
   } else {
     echo "0 results";
   }
      ?>
 
 <!-- end PAGE-CONTENT -->
</div>

 
<!-- end MAIN -->
</div> 


<?php include(ROOT_PATH . "app/includes/footer.php"); ?>

</body>
</html>