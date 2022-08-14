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

// Add Department
if(isset($_POST['update-course'])){

  $jobID = mysqli_real_escape_string($conn, $_POST['jobID']);
  $idno  = rand(1000000, 9999999); // figure how to not allow duplicates
  $jobtitle = mysqli_real_escape_string($conn, $_POST['jobtitle']);
  $companyname = mysqli_real_escape_string($conn, $_POST['companyname']);
  $deptname = mysqli_real_escape_string($conn, $_POST['deptname']);

  $select = " SELECT * FROM course WHERE jobtitle = '$jobtitle' ";
  $result = mysqli_query($conn, $select);

  if(mysqli_num_rows($result) > 0){

     $error[] = 'Job already exist!';

  }else{
        // $insert2 = "INSERT INTO employee_company_data (employee_code, company_code, dept_code, job_code) SELECT employee_code, company_code, dept_code, jobID FROM job";
        $insert = "INSERT INTO job (idno, jobtitle, companyname, deptname) VALUES('$idno', '$jobtitle', '$companyname', '$deptname')";
        mysqli_query($conn, $insert);
        // mysqli_query($conn, $insert2);
        header('location: /admin/jobs.php');
     }

};



// Delete Department
if(isset($_GET['courseID'])) {
    $id = $_GET['courseID'];

    $sql = "DELETE FROM course WHERE courseID = $id";
    $delete = mysqli_query($conn, $sql);
    if($delete) {
        // echo "Deleted Successfully";
        header('location: courses.php'); // returns back to same page
    } else {
        die(mysqli_error($conn));
    }
  }

  
  
  if (isset($_POST['approved']))
    {
        $appUpdateQuery = "UPDATE course SET approval_status = 'approved', status = 'active' WHERE courseID = '".$_POST['courseID']."'";
        $appUpdateResult = mysqli_query($conn, $appUpdateQuery);
        header('location: courses.php');
        // $appInsertQuery = "INSERT INTO approved(id,status) VALUES ('".$_POST['row_id']."','Approved')";
        // $appInsertResult = mysqli_query($conn, $appInsertQuery);
    }
        
    if (isset($_POST['rejected']))
    {
        $rejUpdateQuery = "UPDATE course SET approval_status = 'rejected' WHERE courseID = '".$_POST['courseID']."'";
        $rejUpdateResult = mysqli_query($conn,$rejUpdateQuery);
        header('location: courses.php');
        // $rejInsertQuery = "INSERT INTO rejected(id,status) VALUES ('".$_POST['row_id']."','Rejected')";
        // $rejInsertResult = mysqli_query($conn, $rejInsertQuery);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CAMS | Courses</title>

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
    <p class="page_title" style="float: left; padding-top: 2px;">Courses</p>
    <ul class="breadcrumb">
      <li><a href="<?php echo BASE_URL . '/pages/dashboard.php' ?>">Dashboard</a></li>
      <li>Courses</li>
    </ul>
  </div>


<!-- start PAGE-CONTENT -->
<div class="page-content float-start" style="margin-top: 12px; width: 34%;margin-left: -74px; height: unset !important;">
  <!-- <form action="" method="post"> -->
    <div class="section-header pt-2">
      <span class="text-muted pt-4" style="width: 95%;">Pending Course Requests</span>
    </div>
    <hr style="margin-bottom: -5px; margin-top: 5px;">
    <table class="table">
  <thead>
    <tr>
      <th scope="col" style="font-size: 14px;">Course Name</th>
      <th scope="col" style="font-size: 14px;">Actions</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

  <?php
      $sql = "SELECT * FROM course where approval_status = 'pending' AND status = 'inactive'";
      $result = mysqli_query($conn, $sql);
      if($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $courseID    = $row['courseID'];
            $idno        = $row['idno'];
            $shortcourse = $row['shortcourse'];
            $status      = $row['approval_status'];
            // $companyname    = $row['companyname'];
  ?>
    <tr>
        <th scope="row"><a class="text-decoration-none text-dark" href="actions/view-job.php?jobID=<?php echo $courseID; ?>"><?php echo $shortcourse; ?></a></th>
        <td>
          <div class="forms d-flex" style="">
        <form class="me-2" method="post" action="">
        <?php $courseid = $row['courseID']; ?>
          <input type="hidden" name="courseID" value="<?php echo $courseid; ?>" />
          <button style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" type="submit" name="approved"><span class="badge text-bg-success">Approve</span></button>
        </form>
        <form method="post" action="">
          <input type="hidden" name="courseID" value="<?php echo $courseid; ?>" />
          <button style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" type="submit" name="rejected"><span class="badge text-bg-danger">Reject</span></button>
        </form>
        </div>
        </td>
        <!--  onclick="return confirm('Be Careful! \r\nOK to delete?')" -->
        <?php } 
        
        ?>
        
   
      </tbody>
</table> 
<?php 
     
} else {
  echo "0 results";
}
    ?>
 <!-- end PAGE-CONTENT -->
</div>

<!-- start PAGE-CONTENT -->
<div class="page-content mt-2 float-end" style="width: 63%; margin-right: 10px;">
    <table class="table">
  <thead>
    <tr>
      <th scope="col" style="font-size: 14px;">ID #</th>
      <th scope="col" style="font-size: 14px;">Course Name</th>
      <th scope="col" style="font-size: 14px;">Course Title</th>
      <th scope="col" style="font-size: 14px;">Actions</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

  <?php
      $sql = "SELECT * FROM course WHERE approval_status != 'pending'";
      $all = mysqli_query($conn, $sql);
      if($all) {
          while ($row = mysqli_fetch_assoc($all)) {
            $courseid       = $row['courseID'];
            $idno           = $row['idno'];
            $coursename     = $row['coursename'];
            $shortcourse    = $row['shortcourse'];
            $app_status     = $row['approval_status'];
  ?>
    <tr>
        <th scope="row"><?php echo $idno; ?></th>
        <td><?php echo $shortcourse; ?></td>
        <td><?php echo $coursename; ?></td>
        <?php if($app_status == 'approved'){ ?>
        <td><span class="text-capitalize text-success"><?php echo $app_status; ?><span></td>
        <?php } if($app_status == 'rejected') { ?>
          <td><span class="text-capitalize text-danger"><?php echo $app_status; ?><span></td>
        <?php } if($app_status == 'pending') { ?>
          <td><span class="text-capitalize text-primary"><?php echo $app_status; ?><span></td>
        <?php } if($app_status == 'terminated') { ?>
          <td><span class="text-capitalize text-danger"><?php echo $app_status; ?><span></td>
        <?php }?>
        <td>
          <?php if($app_status != 'terminated') { ?>
            <a style="text-decoration: none;" class="badge text-bg-success" href="actions/view-course.php?courseID=<?php echo $courseid; ?>">View</a>
          <?php } else {} ?>
          <a onclick="return confirm('Be Careful! \r\nOK to delete?')" style="text-decoration: none;" class="badge text-bg-danger" href="courses.php?courseID=<?php echo $courseid; ?>">Delete</a>
        </td>
        <?php } ?>
        
   
      </tbody>
</table> 
<?php 
     
} else {
  echo "0 results";
}
    ?>
 <!-- end PAGE-CONTENT -->
</div>
 
<!-- end MAIN -->
</div> 


<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

</body>
</html>