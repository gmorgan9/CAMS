<!-- WORKING -->
<?php

// REQUIRES
  require_once "../app/database/connection.php";
  require_once "../app/database/functions.php";
  require_once "../path.php";
// END REQURIES

session_start();

if(!isLoggedIn()){
   header('location: /login.php');
}

// ADD JOB
  if(isset($_POST['add-course'])){
    $courseID = mysqli_real_escape_string($conn, $_POST['courseID']);
    $idno  = rand(1000000, 9999999); // figure how to not allow duplicates
    $coursename = mysqli_real_escape_string($conn, $_POST['coursename']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $days = mysqli_real_escape_string($conn, $_POST['days']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $days = mysqli_real_escape_string($conn, $_POST['days']);
    $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);
    $note = mysqli_real_escape_string($conn, $_POST['note']);
    $reason = mysqli_real_escape_string($conn, $_POST['reason']);
    $student_fname = mysqli_real_escape_string($conn, $_POST['student_fname']);
    $student_lname = mysqli_real_escape_string($conn, $_POST['student_lname']);
    $student_idno = mysqli_real_escape_string($conn, $_POST['student_idno']);

    $select = " SELECT * FROM course WHERE coursename = '$coursename' ";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
      $error[] = 'Course already exist!';
    }else{
      // $insert2 = "INSERT INTO employee_company_data (employee_code, company_code, dept_code, job_code) SELECT employee_code, company_code, dept_code, jobID FROM job";
      $insert = "INSERT INTO course (idno, coursename, time, days, student_fname, student_lname, student_idno) VALUES('$idno', '$coursename', '$time', '$days', '$student_fname', '$student_lname', '$student_idno')";
      mysqli_query($conn, $insert);
      // mysqli_query($conn, $insert2);
      header('location: course_request.php');
    }
  };
// END ADD JOB

// DELETE JOB (NOT IN USE)
  if(isset($_GET['courseID'])) {
    $id = $_GET['courseID'];

    $sql = "DELETE FROM course WHERE courseID = $id";
    $delete = mysqli_query($conn, $sql);
    if($delete) {
        // echo "Deleted Successfully";
        header('location: course_request.php'); // returns back to same page
    } else {
        die(mysqli_error($conn));
    }
  }
// END DELETE JOB (NOT IN USE)

// SET TERMINATED
  if (isset($_POST['terminated'])) {
    $terUpdateQuery = "UPDATE course SET approval_status = 'terminated' WHERE courseID = '".$_POST['courseID']."'";
    $terUpdateResult = mysqli_query($conn, $terUpdateQuery);
    header('location: course_request.php');
  }
// END SET TERMINATED

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>WMS | Course Request</title>

  <!-- LINKS -->
    <!-- Custom Styles -->
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/other-style.css?v='. time(); ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- END LINKS -->

</head>
<body>


<?php include(ROOT_PATH . "/app/includes/header.php"); ?>
<?php include(ROOT_PATH . "/app/includes/sidebar.php") ?>
        
<!-- STAR MAIN -->
  <div class="main"> 

  <div class="page-header mx-auto">
    <p class="page_title" style="float: left; padding-top: 2px;">Courses</p>
    <ul class="breadcrumb">
      <li><a href="<?php echo BASE_URL . '/pages/dashboard.php' ?>">Dashboard</a></li>
      <li>Courses</li>
    </ul>
  </div>


  <!-- START ADD COMPANY (LEFT SIDE) -->
    <div class="page-content float-start" style="margin-top: 12px; width: 32%;margin-left: -65px; height: unset !important;">
    <form action="" method="post">
    <div class="section-header pt-2">
      <span class="text-muted pt-4" style="width: 95%;">Course Requests</span>
    </div>
    <hr style="margin-bottom: -5px; margin-top: 5px;">
    <?php 

    $sql = "SELECT * FROM student";
    $all = mysqli_query($conn, $sql);
      if($all) {
        while ($row = mysqli_fetch_assoc($all)) {
    
    $fname = $row['fname'];
    $lname = $row['lname']; 
    $studentID = $row['idno']?>
    <?php }} ?>
      <input class="form-control" id="student_fname" type="hidden" name="student_fname" value="<?php echo $fname; ?>">
      <input class="form-control" id="student_lname" type="hidden" name="student_lname" value="<?php echo $lname; ?>">
      <input class="form-control" id="student_idno" type="hidden" name="student_idno" value="<?php echo $studentID; ?>">
    <div class="form-group pt-3 mx-auto" style="width: 95%;">
      <label for="coursename" style="font-size: 14px;">Course <span class="text-muted" style="font-size: 10px;">e.g. "Intro to Computers"</span></label>
      <input class="form-control" id="coursename" type="text" name="coursename" value="" required>
    </div>
    <div class="form-group pt-3 mx-auto" style="width: 95%;">
      <label for="start_time" style="font-size: 14px;">Start Time</label>
      <input class="form-control" id="start_time" type="time" name="start_time" value="" required>
    </div>
    <div class="form-group pt-3 mx-auto" style="width: 95%;">
      <label for="end_time" style="font-size: 14px;">End Time</label>
      <input class="form-control" id="end_time" type="time" name="end_time" value="" required>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
        <label class="form-check-label" for="inlineCheckbox1">1</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
        <label class="form-check-label" for="inlineCheckbox2">2</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
        <label class="form-check-label" for="inlineCheckbox1">1</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
        <label class="form-check-label" for="inlineCheckbox2">2</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
        <label class="form-check-label" for="inlineCheckbox2">2</label>
    </div>
    <div class="form-group pt-3 mx-auto d-grid d-md-flex justify-content-md-end" style="width: 95%; margin-bottom: 10px;">
      <button type="submit" style="border-color: rgba(0,0,0,0);" name="add-job" class="badge text-bg-secondary">Request Job</button>
    </div>
    </form>
    </div>
  <!-- END ADD JOB (LEFT SIDE) -->

  <!-- START JOB-REQUEST (RIGHT SIDE) -->
    <div class="page-content mt-2 float-end" style="width: 65%; margin-right: 10px;">
    <table class="table">
    <thead>
      <tr>
        <th scope="col" style="font-size: 14px;">ID #</th>
        <th scope="col" style="font-size: 14px;">Job Title / Position</th>
        <th scope="col" style="font-size: 14px;">Status</th>
        <th scope="col" style="font-size: 14px;">Actions</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">

    <?php
        $sql = "SELECT * FROM job WHERE approval_status != 'terminated'";
        $all = mysqli_query($conn, $sql);
        if($all) {
            while ($row = mysqli_fetch_assoc($all)) {
              $jobID       = $row['jobID'];
              $idno        = $row['idno'];
              $jobtitle    = $row['jobtitle'];
              $companyname = $row['companyname'];
              $deptname    = $row['deptname'];
              $app_status  = $row['approval_status'];
              // $companyname    = $row['companyname'];
    ?>
      <tr>
          <th scope="row"><?php echo $idno; ?></th>
          <td><?php echo $jobtitle; ?></td>
          <?php if($app_status == 'approved'){ ?>
          <td><span class="text-capitalize text-success"><?php echo $app_status; ?><span></td>
          <?php } if($app_status == 'rejected') { ?>
            <td><span class="text-capitalize text-danger"><?php echo $app_status; ?><span></td>
          <?php } if($app_status == 'pending') { ?>
            <td><span class="text-capitalize text-primary"><?php echo $app_status; ?><span></td>
          <?php } if($app_status == 'terminated') { ?>
            <td><span class="text-capitalize text-danger"><?php echo $app_status; ?><span></td>
          <?php }?>
          <!-- <td><?php //echo $companyname; ?></td> -->
          <td>
            <form method="post" action="">
              <input type="hidden" name="jobID" value="<?php echo $jobID; ?>" />
              <button onclick="return confirm('Be Careful, Can\'t be undone! \r\nOK to delete?')" style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" type="submit" name="terminated"><span class="badge text-bg-danger">Delete</span></button>
            </form>
          </td>
          <?php } ?>
          
          
        </tbody>
        </table> 
        <?php 
        } else {
          echo "0 results";
        }
          ?>
      </div>
  <!-- END JOB-REQUEST (RIGHT SIDE) -->

  </div> 
<!-- END MAIN -->

<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

</body>
</html>