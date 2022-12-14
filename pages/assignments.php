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




<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>


</body>
</html>