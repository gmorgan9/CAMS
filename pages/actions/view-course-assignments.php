<!-- WORKING -->
<?php

// REQUIRE
  require_once "../../app/database/connection.php";
  require_once "../../app/database/functions.php";
  require_once "../../path.php";
// END REQUIRE

session_start();

if(!isLoggedIn()){
   header('location:' . BASE_URL . '/pages/entry/login.php');
}

// UPDATE TIME FUNCTION
  if(isset($_POST['update-course'])){
    $id = $_GET['courseID'];
    $reason = mysqli_real_escape_string($conn, $_POST['reason']);
  
    $update = "UPDATE course SET approval_status = 'pending', reason = '$reason' WHERE courseID = '$id'";
    mysqli_query($conn, $update);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  
  };
// END UPDATE TIME FUNCTION

// ADD LAB FUNCTION
    if(isset($_POST['add-lab'])){
        $id = $_GET['courseID'];
        $reason = mysqli_real_escape_string($conn, $_POST['reason']);
        $lab_idno  = rand(1000000, 9999999); // figure how to not allow duplicates
        $lab_start_time = mysqli_real_escape_string($conn, $_POST['lab_start_time']);
        $lab_end_time = mysqli_real_escape_string($conn, $_POST['lab_end_time']);
        $lab_days = implode(", ", $_POST['lab_days']);
        $lab_location = mysqli_real_escape_string($conn, $_POST['lab_location']);
  
        $update = "UPDATE course SET lab_idno = '$lab_idno', lab_start_time = '$lab_start_time',lab_end_time = '$lab_end_time', lab_location = '$lab_location', lab_days = '$lab_days' WHERE courseID = '$id'";
        mysqli_query($conn, $update);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    };
// END ADD LAB FUNCTION

// UPDATE LAB FUNCTION
    if(isset($_POST['update-lab'])){
        $id = $_GET['courseID'];
        $reason = mysqli_real_escape_string($conn, $_POST['reason']);
        //$lab_idno  = rand(1000000, 9999999); // figure how to not allow duplicates
        $lab_start_time = mysqli_real_escape_string($conn, $_POST['lab_start_time']);
        $lab_end_time = mysqli_real_escape_string($conn, $_POST['lab_end_time']);
        // $lab_days = implode(", ", $_POST['lab_days']);
        $lab_location = mysqli_real_escape_string($conn, $_POST['lab_location']);
  
        $update = "UPDATE course SET lab_start_time = '$lab_start_time',lab_end_time = '$lab_end_time', lab_location = '$lab_location', reason = '$reason' WHERE courseID = '$id'";
        mysqli_query($conn, $update);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    };
// END UPDATE LAB FUNCTION

// SET TERMINATED
if (isset($_POST['terminated'])) {
    $terUpdateQuery = "UPDATE course SET lab_idno = null, lab_start_time = null, lab_end_time = null, lab_location = null, reason = null WHERE courseID = '".$_POST['courseID']."'";
    $terUpdateResult = mysqli_query($conn, $terUpdateQuery);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
// END SET TERMINATED

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CAMS | View Course</title>

  <!-- START LINKS -->
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
        
<!-- start MAIN -->
  <div class="main"> 

  <!-- VIEW COURSE -->
    
    <?php 

    $id = $_GET['courseID'];
    $select = " SELECT * FROM course WHERE courseID = '$id' ";
    $result = mysqli_query($conn, $select);
    
    if (mysqli_num_rows($result) > 0) {
       while($row = mysqli_fetch_assoc($result)) {
          //$acc_type = $row['acc_type'];
    ?>
      <div class="page-header mx-auto">
        <p class="page_title" style="float: left; padding-top: 2px;">Course Assignments</p>
        <ul class="breadcrumb">
          <li><a href="<?php echo BASE_URL . '/pages/dashboard.php' ?>">Dashboard</a></li>
          <li><a href="<?php echo BASE_URL . '/pages/assignments.php' ?>">Assignments</a></li>
          <li>Viewing: <span class="text-muted" style="text-transform: capitalize"><?php echo $row['shortcourse']; ?>  </span></li>
        </ul>
      </div>

      <!-- start PAGE-CONTENT -->
<div class="page-content mx-auto mt-2">

<?php 

$student_idno = $_SESSION['student_idno'];
$sql = "SELECT * FROM course WHERE student_idno = '$student_idno' AND status = 'active' ORDER BY start_time ASC";
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
    <span class="text-muted fs-5" style="width: 95%;"><?php echo $semester; ?></span>
</div>
<table class="table">
<thead>
<tr>
  <th scope="col">ID #</th>
  <th scope="col">Course Name</th>
  <th scope="col">Course Title</th>
  <th scope="col">Start Time / End Time</th>
  <!-- <th scope="col">Status</th> -->
  <th scope="col">Actions</th>
</tr>
</thead>
<tbody class="table-group-divider">

<?php
  $student_idno = $_SESSION['student_idno'];
  $sql = "SELECT * FROM course WHERE student_idno = '$student_idno' AND status = 'active' ORDER BY start_time ASC";
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
    <?php }}}}?>
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

  
  </div> 
<!-- end MAIN -->

<

<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

</body>
</html>