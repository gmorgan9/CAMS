<!-- WORKING -->
<?php

// REQUIRES
  require_once "../app/database/connection.php";
  require_once "../app/database/functions.php";
  require_once "../path.php";
// END REQURIES

session_start();

if(!isLoggedIn()){
    header('location: '. BASE_URL . '/pages/entry/login.php');
}

// ADD JOB
  if(isset($_POST['add-semester'])){
    $semesterID = mysqli_real_escape_string($conn, $_POST['semesterID']);
    $idno  = rand(1000000, 9999999); // figure how to not allow duplicates
    $semestername = mysqli_real_escape_string($conn, $_POST['semestername']);
    $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $select = " SELECT * FROM semester WHERE semestername = '$semestername' ";
    $result = mysqli_query($conn, $select);


    $days=implode(", ", $_POST['days']);
    $insert = "INSERT INTO semester (idno, semestername, start_date, end_date, status) VALUES('$idno', '$semestername', '$start_date', '$end_date', '$status')";
    mysqli_query($conn, $insert);
    header('location: semester.php');
  };
// END ADD JOB

// DELETE JOB (NOT IN USE)
  if(isset($_GET['semesterID'])) {
    $id = $_GET['semesterID'];

    $sql = "DELETE FROM semester WHERE semesterID = $id";
    $delete = mysqli_query($conn, $sql);
    if($delete) {
        // echo "Deleted Successfully";
        header('location: semester.php'); // returns back to same page
    } else {
        die(mysqli_error($conn));
    }
  }
// END DELETE JOB (NOT IN USE)

// SET TERMINATED
  if (isset($_POST['inactive'])) {
    $terUpdateQuery = "UPDATE semester SET status = 'inactive' WHERE semesterID = '".$_POST['semesterID']."'";
    $terUpdateResult = mysqli_query($conn, $terUpdateQuery);
    header('location: semester.php');
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
    <div class="page-content float-start" style="margin-top: 12px; width: 32%;margin-left: -73px; height: unset !important;">
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
    <label for="semester" style="font-size: 14px;">Semester <span class="text-muted" style="font-size: 10px;">Pick semester for requested course.</span></label>
        <select class="form-select" aria-label="Default select example" name="semester">
            <option selected>Select One...</option>
            <option value="fall22">Fall 2022</option>
            <option value="win23">Winter 2023</option>
        </select>
    </div>
    <div class="form-group pt-3 mx-auto" style="width: 95%;">
      <label for="start_time" style="font-size: 14px;">Start Time</label>
      <input class="form-control" id="start_time" type="time" name="start_time" value="" required>
    </div>
    <div class="form-group pt-3 mx-auto" style="width: 95%;">
      <label for="end_time" style="font-size: 14px;">End Time</label>
      <input class="form-control" id="end_time" type="time" name="end_time" value="" required>
    </div>
    <fieldset class="row pt-3 mx-auto">
        <legend class="col-form-label col-sm-6 pt-3" style="font-size: 14px;">Course Days</legend>
        <div class="form-group " style="width: 95%; margin-top: -20px;">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="days[]" value="M"> M
            &nbsp;
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="days[]" value="Tu"> Tu
            &nbsp;
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="days[]" value="W"> W
            &nbsp;
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="days[]" value="Th"> Th
            &nbsp;
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="days[]" value="F"> F
        </div>
    </fieldset>
    <div class="form-group pt-3 mx-auto d-grid d-md-flex justify-content-md-end" style="width: 95%; margin-bottom: 10px;">
      <button type="submit" style="border-color: rgba(0,0,0,0);" name="add-course" class="badge text-bg-secondary">Request Course</button>
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
        <th scope="col" style="font-size: 14px;">Semester Name</th>
        <th scope="col" style="font-size: 14px;">Status</th>
        <th scope="col" style="font-size: 14px;">Actions</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">

    <?php
        $sql = "SELECT * FROM semester";
        $all = mysqli_query($conn, $sql);
        if($all) {
            while ($row = mysqli_fetch_assoc($all)) {
              $semesterID       = $row['semesterID'];
              $idno        = $row['idno'];
              $semestername    = $row['semestername'];
              $status  = $row['status'];
    ?>
      <tr>
          <th scope="row"><?php echo $idno; ?></th>
          <td><?php echo $semestername; ?></td>
          <?php if($status == 'active'){ ?>
          <td><span class="text-capitalize text-success"><?php echo $status; ?><span></td>
          <?php } if($status == 'inactive') { ?>
            <td><span class="text-capitalize text-danger"><?php echo $status; ?><span></td>
          <?php } ?>
          <td>
            <form method="post" action="">
              <input type="hidden" name="semesterID" value="<?php echo $semesterID; ?>" />
              <button onclick="return confirm('Be Careful, Can\'t be undone! \r\nOK to delete?')" style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" type="submit" name="inactive"><span class="badge text-bg-danger">Inactive</span></button>
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