<!-- WORKING -->
<?php

require_once "../app/database/connection.php";
require_once "../app/database/functions.php";
require_once "../path.php";

session_start();

if(!isLoggedIn()){
   header('location: /login.php');
}


$sIDNO = $_SESSION['student_idno'];
$select = " SELECT * FROM course WHERE student_idno = '$sIDNO' ";
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

// if (mysqli_num_rows($result) > 0) {
//    while($row = mysqli_fetch_assoc($result)) {
?>

  <div class="page-header mx-auto">
    <p class="page_title" style="float: left; padding-top: 2px;">Employees</p>
    <ul class="breadcrumb">
      <li><a href="<?php echo BASE_URL . '/pages/dashboard.php' ?>">Dashboard</a></li>
      <li>Employees</li>
    </ul>
  </div>

  <!-- <div class="jumbotron jumbotron-fluid bg-white m-2 mx-auto" style="width: 98%;">
  <div class="container">
    <h3 class="display-6 text-center" style="padding-top: 5px !important;padding-bottom: 10px !important;">Welcome, <span style="text-transform: capitalize;"><?php //echo $row['fname'] ?>!</span></h3>
  </div>
</div> -->

<!-- start PAGE-CONTENT -->
<div class="page-content mx-auto mt-2">

    <?php 

    $student_idno = $_SESSION['student_idno'];
    $sql = "SELECT * FROM course WHERE student_idno = '$student_idno' ORDER BY start_time ASC";
    $all = mysqli_query($conn, $sql);
        if($all) {
            while ($row = mysqli_fetch_assoc($all)) {
                $student_fname = $row['student_fname'];
                $student_lname = $row['student_lname'];
                $semester = $row['semestername'];

            }}
    
    ?>
    <div class="section-header text-center pt-2">
      <span class="text-muted fs-3 pt-4" style="width: 95%;">Course Schedule for <?php echo $student_fname; ?> <?php echo $student_lname; ?></span>
    </div>
    <div class="section-header text-center pt-2">
        <span class="text-muted fs-5 pt-1" style="width: 95%;"><?php echo $semester; ?></span>
    </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID #</th>
      <th scope="col">Course Name</th>
      <th scope="col">Course Title</th>
      <th scope="col">Start Time / End Time</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

  <?php
      $student_idno = $_SESSION['student_idno'];
      $sql = "SELECT * FROM course WHERE student_idno = '$student_idno' ORDER BY start_time ASC";
      $all = mysqli_query($conn, $sql);
      if($all) {
          while ($row = mysqli_fetch_assoc($all)) {
            $sID            = $row['studentID'];
            $semester       = $row['semestername'];
            $idno           = $row['idno'];
            $shortcourse    = $row['shortcourse'];
            $coursename     = $row['coursename'];
            $start_time     = $row['start_time'];
            $end_time       = $row['end_time'];
            $location       = $row['location'];
            $student_fname  = $row['student_fname'];
            $student_lname  = $row['student_lname'];
            $student_idno   = $row['student_idno'];
            $status         = $row['approval_status'];
            ?>
    <tr>
        <th scope="row"><?php echo $idno; ?></th>
        <td><?php echo $shortcourse; ?></td>
        <td><?php echo $coursename; ?></td>
        <?php 
        $start_time = date("h:i A", strtotime($row['start_time']));
        $end_time = date("h:i A", strtotime($row['end_time']));
        ?>
        <td><?php echo $start_time; ?> - <?php echo $end_time; ?></td>
        <td>
          <!-- <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#editEmployee" class="badge text-bg-primary" href="actions/edit-employee.php?employeeID=<?php echo $empID; ?>">Edit</a> -->
          <a style="text-decoration: none;" class="badge text-bg-success" href="actions/view-employee.php?employeeID=<?php echo $empID; ?>">View</a>
          <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#confirmDelete" class="badge text-bg-danger" href="employees.php?employeeID=<?php echo $empID; ?>">Delete</a>
        </td>
        <?php }}?>
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