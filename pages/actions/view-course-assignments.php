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


// /// ADD JOB
// if(isset($_POST['add-assignment'])){
//     $assignmentID = mysqli_real_escape_string($conn, $_POST['assignmentID']);
//     $idno  = rand(1000000, 9999999); // figure how to not allow duplicates
//     $title = mysqli_real_escape_string($conn, $_POST['title']);
//     $description = mysqli_real_escape_string($conn, $_POST['description']);
//     $duedate = mysqli_real_escape_string($conn, $_POST['duedate']);
//     $duetime = mysqli_real_escape_string($conn, $_POST['duetime']);
//     $category = mysqli_real_escape_string($conn, $_POST['category']);
//     //$days = mysqli_real_escape_string($conn, $_POST['days']);
//     $coursename = mysqli_real_escape_string($conn, $_POST['coursename']);
//     $course_idno = mysqli_real_escape_string($conn, $_POST['course_idno']);
//     $professorname = mysqli_real_escape_string($conn, $_POST['professorname']);
//     $student_idno = mysqli_real_escape_string($conn, $_POST['student_idno']);
//     $student_fname = mysqli_real_escape_string($conn, $_POST['student_fname']);
//     $student_lname = mysqli_real_escape_string($conn, $_POST['student_lname']);


//     $select = " SELECT * FROM assignment";
//     $result = mysqli_query($conn, $select);

//     $insert = "INSERT INTO assignment (idno, title, description, duedate, duetime, category, coursename, course_idno, professorname, student_fname, student_lname, student_idno) VALUES('$idno', '$title', '$description', '$duedate', '$duetime', '$category', '$coursename', '$course_idno', '$professorname', '$student_fname', '$student_lname', '$student_idno')";
//     mysqli_query($conn, $insert);
//     header('location: view-course-assignments.php');
//   };
// // END ADD JOB

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

    $id = $_GET['course_idno'];
    //$student_idno = $_SESSION['student_idno'];
    $select = " SELECT * FROM course WHERE idno = '$id'";
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

$id = $_GET['course_idno'];
$sql = "SELECT * FROM course WHERE idno = '$id'";
$all = mysqli_query($conn, $sql);
    if($all) {
        while ($row = mysqli_fetch_assoc($all)) {
            $student_fname = $row['student_fname'];
            $student_lname = $row['student_lname'];
            //$semester = $row['semestername'];

        }}

?>
<div class="section-header text-center pt-2">
  <span class="text-muted fs-3 pt-4" style="width: 95%;">Assignments for <?php echo $student_fname; ?> <?php echo $student_lname; ?></span>
</div>
<a class="text-decoration-none badge text-bg-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="bi bi-plus"></i> Assignment</a>
<div class="section-header text-center pt-2">
    <!-- <span class="text-muted fs-5" style="width: 95%;"><?php //echo $semester; ?></span> -->
</div>
<table class="table">
<thead>
<tr>
  <th scope="col">ID #</th>
  <th scope="col">Title</th>
  <th scope="col">Due Date / Due Time</th>
  <!-- <th scope="col">Start Time / End Time</th> -->
  <!-- <th scope="col">Status</th> -->
  <th scope="col">Actions</th>
</tr>
</thead>
<tbody class="table-group-divider">

<?php
  $id = $_GET['course_idno'];
  $student_idno = $_SESSION['student_idno'];
  $sql = "SELECT * FROM assignment WHERE course_idno = '$id' AND student_idno = '$student_idno' ORDER BY duedate ASC";
  $all = mysqli_query($conn, $sql);
  if($all) {
      while ($row = mysqli_fetch_assoc($all)) {
        $sID            = $row['studentID'];
        //$semester       = $row['semestername'];
        $idno           = $row['idno'];
        //$shortcourse    = $row['shortcourse'];
        $title          = $row['title'];
        $coursename     = $row['coursename'];
        //$duedate        = $row['duedate'];
        //$duetime        = $row['duetime'];
        //$location       = $row['location'];
        $student_fname  = $row['student_fname'];
        $student_lname  = $row['student_lname'];
        $student_idno   = $row['student_idno'];
        $status         = $row['approval_status'];
        ?>
<tr>
    <th scope="row"><?php echo $idno; ?></th>
    <td><?php echo $title; ?></td>
    <!-- <td><?php //echo $coursename; ?></td> -->
    <?php 
    $duedate = date("M d, Y", strtotime($row['duedate']));
    $duetime = date("h:i A", strtotime($row['duetime']));
    ?>
    <td><?php echo $duedate; ?> / <?php echo $duetime; ?></td>
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


<!-- EDIT MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Assignment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        <?php 
            $id = $_GET['course_idno'];
            $select = " SELECT * FROM course WHERE idno = '$id' ";
            $result = mysqli_query($conn, $select);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  $coursename     = $row['coursename'];
                  $course_idno    = $row['course_idno'];
                  $professorname  = $row['professorname'];
                  $student_fname  = $row['student_fname'];
                  $student_lname  = $row['student_lname'];
                  $student_idno   = $row['student_idno'];
                }
              }
            ?>

            <form action="" method="post">
                <div class="section-header pt-2 text-center fs-5">
                    <span class="text-muted pt-4" style="width: 95%;">Add Assignment</span>
                </div>
                <hr style="margin-bottom: -5px; margin-top: 5px;">
                <!-- hidden -->
                <input class="form-control" id="coursename" type="text" name="coursename" value="<?php echo $coursename; ?>">
                <input class="form-control" id="course_idno" type="text" name="course_idno" value="<?php echo $course_idno; ?>">
                <input class="form-control" id="professorname" type="text" name="professorname" value="<?php echo $professorname; ?>">
                <input class="form-control" id="student_fname" type="text" name="student_fname" value="<?php echo $student_fname; ?>">
                <input class="form-control" id="student_lname" type="text" name="student_lname" value="<?php echo $student_lname; ?>">
                <input class="form-control" id="student_idno" type="text" name="student_idno" value="<?php echo $student_idno; ?>">
                <!-- end hidden -->
                <div class="form-group pt-3 mx-auto">
                    <label for="title" style="font-size: 14px;">Title</label>
                    <input class="form-control" id="title" type="text" name="title" required>
                </div>
                <div class="form-group pt-3 mx-auto">
                    <label for="description" style="font-size: 14px;">Description <span class="text-muted" style="font-size: 10px;">Explain assignment.</span></label>
                    <textarea class="form-control" id="description" type="text" name="description" value=""></textarea>
                </div>
                <div class="form-group pt-3 mx-auto">
                    <label for="category" style="font-size: 14px;">Category <span class="text-muted" style="font-size: 10px;">e.g. "Quizzes"</span></label>
                    <input class="form-control" id="category" type="text" name="category" required>
                </div>
                <div class="row">
                  <div class="form-group pt-3 mx-auto" style="width: 50%;">
                    <label for="duedate" style="font-size: 14px;">Due Date</label>
                    <input class="form-control" id="duedate" type="date" name="duedate" required>
                  </div>
                  <div class="form-group pt-3 mx-auto" style="width: 50%;">
                    <label for="duetime" style="font-size: 14px;">Due Time</label>
                    <input class="form-control" id="duetime" type="time" name="duetime" required>
                  </div>
                </div>
    <br>
        <div class="modal-footer">
            <div class="form-group pt-3 mx-auto d-grid d-md-flex justify-content-md-end" style="width: 95%; margin-bottom: 10px;">
                <button type="button" style="border-color: rgba(0,0,0,0);" class="badge text-bg-secondary" data-bs-dismiss="modal">Close</button> &nbsp;
                <button type="submit" style="border-color: rgba(0,0,0,0);" name="add-assignment" class="badge text-bg-secondary">Update Schedule</button>
            </div>
        </form>
        </div>
      </div>
    </div>
    
  </div>
<!-- END EDIT MODAL -->

<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

</body>
</html>