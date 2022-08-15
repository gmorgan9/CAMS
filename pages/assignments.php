<!-- WORKING -->
<?php
require_once "../app/database/connection.php";
require_once "../app/database/functions.php";
require_once "../path.php";
session_start();

if(!isLoggedIn()){
  header('location:/login.php');
}

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
          <h5 class="modal-title" id="exampleModalLabel">Course Change Request</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <?php 
            $id = $_GET['courseID'];
            $select = " SELECT * FROM course WHERE courseID = '$id' ";
            $result = mysqli_query($conn, $select);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
            ?>

            <form action="" method="post">
                <div class="section-header pt-2 text-center fs-5">
                    <span class="text-muted pt-4" style="width: 95%;">Course Requests</span>
                </div>
                <hr style="margin-bottom: -5px; margin-top: 5px;">
                <div class="form-group pt-3 mx-auto">
                    <label for="notes" style="font-size: 14px;">Notes</label>
                    <input class="form-control" id="reason" type="text" name="reason" value="<?php echo $row['idno'] ?>" readonly>
                </div>
                <div class="form-group pt-3 mx-auto">
                    <label for="notes" style="font-size: 14px;">Reason <span class="text-muted" style="font-size: 10px;">List dates and times wanted to be changed. Give reason behind change.</span></label>
                    <textarea class="form-control" id="reason" type="text" name="reason" value=""></textarea>
                </div> <?php }} ?>

        </div>
    
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