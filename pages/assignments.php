<!-- WORKING -->
<?php
require_once "../app/database/connection.php";
require_once "../app/database/functions.php";
require_once "../path.php";
session_start();

if(!isLoggedIn()){
  header('location:/login.php');
}


/// ADD JOB
if(isset($_POST['add-assignment'])){
  $assignmentID = mysqli_real_escape_string($conn, $_POST['assignmentID']);
  $idno  = rand(1000000, 9999999); // figure how to not allow duplicates
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $duedate = mysqli_real_escape_string($conn, $_POST['duedate']);
  $duetime = mysqli_real_escape_string($conn, $_POST['duetime']);
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  //$days = mysqli_real_escape_string($conn, $_POST['days']);
  $coursename = mysqli_real_escape_string($conn, $_POST['coursename']);
  $course_idno = mysqli_real_escape_string($conn, $_POST['course_idno']);
  $professorname = mysqli_real_escape_string($conn, $_POST['professorname']);
  $student_idno = mysqli_real_escape_string($conn, $_POST['student_idno']);
  $student_fname = mysqli_real_escape_string($conn, $_POST['student_fname']);
  $student_lname = mysqli_real_escape_string($conn, $_POST['student_lname']);


  $select = " SELECT * FROM assignment";
  $result = mysqli_query($conn, $select);

  $insert = "INSERT INTO assignment (idno, title, description, duedate, duetime, category, coursename, course_idno, professorname, student_fname, student_lname, student_idno) VALUES('$idno', '$title', '$description', '$duedate', '$duetime', '$category', '$coursename', '$course_idno', '$professorname', '$student_fname', '$student_lname', '$student_idno')";
  mysqli_query($conn, $insert);
  header('location: view-course-assignments.php');
};
// END ADD JOB

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

    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>CAMS | Assignments</title>
</head>
<body>
    
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>


<?php include(ROOT_PATH . "/app/includes/sidebar.php") ?>
        
<div class="main">
  <div class="page-header mx-auto">
    <p class="page_title" style="float: left; padding-top: 2px;">Assignments</p>
    <ul class="breadcrumb">
      <li><a href="<?php echo BASE_URL . '/dashboard.php' ?>">Dashboard</a></li>
      <li>Assignments</li>
    </ul>
  </div>


  <!-- start PAGE-CONTENT -->
<div class="page-content mx-auto mt-2">
<a class="text-decoration-none badge text-bg-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="bi bi-plus"></i> Assignment</a>

  <?php 
      $student_idno = $_SESSION['student_idno'];
      $sql = "SELECT * FROM course WHERE student_idno = '$student_idno' AND status = 'active' ORDER BY start_time ASC";
      $all = mysqli_query($conn, $sql);
      if($all) {
          while ($row = mysqli_fetch_assoc($all)) {
            $courseID = $row['courseID'];
            $coursename = $row['shortcourse'];
            $idno = $row['idno'];

            ?>
    <a class="text-decoration-none badge text-bg-secondary" href="actions/view-course-assignments.php?course_idno=<?php echo $idno; ?>"><?php echo $coursename ?></a>
  <?php }} ?> 

 
 <!-- end PAGE-CONTENT -->
</div>






</div>

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
            $id = $_GET['courseID'];
            $select = " SELECT * FROM course WHERE courseID = '$id' ";
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
                <input class="form-control" id="coursename" type="hidden" name="coursename" value="<?php echo $coursename; ?>">
                <input class="form-control" id="course_idno" type="hidden" name="course_idno" value="<?php echo $course_idno; ?>">
                <input class="form-control" id="professorname" type="hidden" name="professorname" value="<?php echo $professorname; ?>">
                <input class="form-control" id="student_fname" type="hidden" name="student_fname" value="<?php echo $student_fname; ?>">
                <input class="form-control" id="student_lname" type="hidden" name="student_lname" value="<?php echo $student_lname; ?>">
                <input class="form-control" id="student_idno" type="hidden" name="student_idno" value="<?php echo $student_idno; ?>">
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
                <button type="submit" style="border-color: rgba(0,0,0,0);" name="update-course" class="badge text-bg-secondary">Update Schedule</button>
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