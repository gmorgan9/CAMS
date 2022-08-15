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

    $id = $_GET['assignmentID'];
    $select = " SELECT * FROM assignment WHERE assignmentID = '$id' ";
    $result = mysqli_query($conn, $select);
    
    if (mysqli_num_rows($result) > 0) {
       while($row = mysqli_fetch_assoc($result)) {
          //$acc_type = $row['acc_type'];
    ?>
      <div class="page-header mx-auto">
        <p class="page_title" style="float: left; padding-top: 2px;">View Assignment</p>
        <ul class="breadcrumb">
          <li><a href="<?php echo BASE_URL . '/pages/dashboard.php' ?>">Dashboard</a></li>
          <li><a href="<?php echo BASE_URL . '/pages/assignments.php' ?>">Assignments</a></li>
          <li>Viewing: <span class="text-muted" style="text-transform: capitalize"><?php echo $row['idno']; ?>  </span></li>
        </ul>
      </div>


      <div class="page-content mx-auto mt-2">
          <h3 class="text-center">Assignment View</h3>
          <div class="col-md-8 mx-auto">
                  <div class="card mb-3">
                    <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Student</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                  <span class="text-capitalize"><?php echo $row['student_lname']; ?>, <?php echo $row['student_fname']; ?> (<?php echo $row['student_idno']; ?>)</span>
                                  </div>
                                </div>
                      <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Course</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                        <?php echo $row['coursename']; ?> (<?php echo $row['course_idno']; ?>)
                                  </div>
                                </div>
                      <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Title</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                        <?php echo $row['title']; ?>
                                  </div>
                                </div>
                      <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Description</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                    <?php echo $row['description']; ?>
                                  </div>
                                </div>
                      <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Category</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                        <?php echo $row['category']; ?>
                                  </div>
                                </div>
                      <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Due</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                    <?php 
                                    $duedate = date("M d, Y", strtotime($row['duedate']));
                                    $duetime = date("h:i A", strtotime($row['duetime']));
                                    ?>
                                        <?php echo $duedate; ?> / <?php echo $duetime; ?> 
                                  </div>
                                </div>
                      <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Completed</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                    <?php if($row['completed'] == 1) { ?>
                                        <span class="text-success">Completed</span>
                                    <?php } else { ?>
                                        <span class="text-danger">Not Completed</span>
                                    <?php } ?>
                                  </div>
                                </div>
                      <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Actions</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                  <a class="text-decoration-none badge text-bg-success" data-bs-toggle="modal" data-bs-target="#updateAssignment" href="#">Update</a>
                                  </div>
                                </div>
                    </div>
                  </div>
                </div>       
                       
                            
                            
          <?php 
          }
       } else {
         echo "0 results";
       }
          ?>
       </form>
    </div>
  <!-- END VIEW COURSE --> 

  
  </div> 
<!-- end MAIN -->


<!-- EDIT ASSIGNMENT MODAL -->
<div class="modal fade" id="updateAssignment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Assignment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        <?php 
            $id = $_GET['assignmentID'];
            $select = " SELECT * FROM assignment WHERE assignmentID = '$id' ";
            $result = mysqli_query($conn, $select);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  $coursename     = $row['coursename'];
                  $course_idno    = $row['idno'];
                  $professorname  = $row['professorname'];
                  $student_fname  = $row['student_fname'];
                  $student_lname  = $row['student_lname'];
                  $student_idno   = $row['student_idno'];
                  $title          = $row['title'];
                  $description    = $row['description'];
                  $category       = $row['category'];
                  $duedate        = $row['duedate'];
                  $duetime        = $row['duetime'];
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
                    <input class="form-control" id="title" type="text" name="title" value="<?php echo $title; ?>" required>
                </div>
                <div class="form-group pt-3 mx-auto">
                    <label for="description" style="font-size: 14px;">Description <span class="text-muted" style="font-size: 10px;">Explain assignment.</span></label>
                    <textarea class="form-control" id="description" type="text" name="description"><?php echo $description; ?></textarea>
                </div>
                <div class="form-group pt-3 mx-auto">
                    <label for="category" style="font-size: 14px;">Category <span class="text-muted" style="font-size: 10px;">e.g. "Quizzes"</span></label>
                    <input class="form-control" id="category" type="text" name="category" value="<?php echo $category; ?>" required>
                </div>
                <div class="row">
                  <div class="form-group pt-3 mx-auto" style="width: 50%;">
                    <label for="duedate" style="font-size: 14px;">Due Date</label>
                    <input class="form-control" id="duedate" type="date" name="duedate" value="<?php echo $duedate; ?>" required>
                  </div>
                  <div class="form-group pt-3 mx-auto" style="width: 50%;">
                    <label for="duetime" style="font-size: 14px;">Due Time</label>
                    <input class="form-control" id="duetime" type="time" name="duetime" value="<?php echo $duetime; ?>" required>
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
  </div>
<!-- END EDIT MODAL -->

<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

</body>
</html>