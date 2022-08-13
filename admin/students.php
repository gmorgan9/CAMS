<!-- WORKING -->
<?php

require_once "../app/database/connection.php";
require_once "../app/database/functions.php";
require_once "../path.php";

session_start();

if(!isLoggedIn()){
   header('location: /login.php');
}
if(!isAdmin()){
  header('location: /dashboard.php');
}


$empID = $_SESSION['empID'];
$select = " SELECT * FROM employee WHERE employeeID = '$empID' ";
$result = mysqli_query($conn, $select);

if(isset($_POST['update-profile'])){

   $employeeID   = mysqli_real_escape_string($conn, $_POST['employeeID']);
   $fname = mysqli_real_escape_string($conn, $_POST['fname']);
   $lname = mysqli_real_escape_string($conn, $_POST['lname']);
   $uname = mysqli_real_escape_string($conn, $_POST['uname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   // $pass = md5($_POST['password']);
   // $cpass = md5($_POST['cpassword']);
   // $isadmin = $_POST['isadmin'];

   $update_select = " SELECT * FROM employee WHERE uname = '$uname' && email = '$email' ";

   $update_result = mysqli_query($conn, $update_select);

   if(mysqli_num_rows($result) > 0){

      // $error[] = 'user already exist!';
      $update = "UPDATE employee SET fname = '$fname', lname = '$lname', uname = '$uname', email = '$email' where employeeID = '$empID' ";
      mysqli_query($conn, $update);
      $success[] = 'Success';
      header('location:' . BASE_URL . '/admin/profile.php');
      
   }else{
      
   } 
};

// Delete User
if(isset($_GET['employeeID'])) {
    $id = $_GET['employeeID'];

    $sql = "DELETE FROM employee WHERE employeeID = $id";
    $delete = mysqli_query($conn, $sql);
    if($delete) {
        // echo "Deleted Successfully";
        header('location: employees.php'); // returns back to same page
    } else {
        die(mysqli_error($conn));
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>WMS | Employees</title>

   <!-- Custom Styles -->
   <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/other-style.css?v='. time(); ?>">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<!-- scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>


<?php include(ROOT_PATH . "/app/includes/header.php"); ?>


<?php include(ROOT_PATH . "/app/includes/sidebar.php") ?>
        
<!-- start MAIN -->
<div class="main"> 

  <div class="page-header mx-auto">
    <p class="page_title" style="float: left; padding-top: 2px;">Students</p>
    <ul class="breadcrumb">
      <li><a href="<?php echo BASE_URL . '/pages/dashboard.php' ?>">Dashboard</a></li>
      <li>Students</li>
    </ul>
  </div>



<!-- start PAGE-CONTENT -->
<div class="page-content mx-auto mt-2">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID #</th>
      <th scope="col">Student</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

  <?php
      $sql = "SELECT * FROM student";
      $all = mysqli_query($conn, $sql);
      if($all) {
          while ($row = mysqli_fetch_assoc($all)) {
            $sID     = $row['studentID'];
            $idno      = $row['idno'];
            $fname     = $row['fname'];
            $lname     = $row['lname'];
            $uname     = $row['uname'];
            $email     = $row['email'];
            $acc_type  = $row['acc_type'];
            $status    = $row['status'];
            ?>
    <tr>
        <?php if($_SESSION['sID'] != $row['studentID']){ ?>
        <th scope="row"><?php echo $idno; ?></th>
        <td><?php echo $lname; ?>, <?php echo $fname; ?></td>
        <?php if($status == 1){ ?>
          <td>Active</td>
        <?php } else { ?>
          <td>Inactive</td>
        <?php } ?>
        <td>
          <a style="text-decoration: none;" class="badge text-bg-success" href="actions/view-student.php?studentID=<?php echo $sID; ?>">View</a>
          <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#confirmDelete" class="badge text-bg-danger" href="students.php?studentID=<?php echo $sID; ?>">Delete</a>
        </td>
        <?php } }}?>
  </tbody>
</table>
      <?php 
  //     }
  //  } else {
  //    echo "0 results";
  //  }
      ?>
 
 <!-- end PAGE-CONTENT -->
</div>

 
<!-- end MAIN -->
</div> 


<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

</body>
</html>