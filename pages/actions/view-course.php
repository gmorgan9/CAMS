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

// UPDATE TIME FUNCTION
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
// END UPDATE TIME FUNCTION

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
        <p class="page_title" style="float: left; padding-top: 2px;">View Course</p>
        <ul class="breadcrumb">
          <li><a href="<?php echo BASE_URL . '/pages/dashboard.php' ?>">Dashboard</a></li>
          <li><a href="<?php echo BASE_URL . '/pages/course-request.php' ?>">Courses</a></li>
          <li>Viewing: <span class="text-muted" style="text-transform: capitalize"><?php echo $row['idno']; ?>  </span></li>
        </ul>
      </div>

      <div class="page-content mx-auto mt-2">
          <h3 class="text-center">Course View</h3>
          <div class="col-md-8 mx-auto">
                  <div class="card mb-3">
                    <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Student</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                  <span class="text-capitalize"><?php echo $row['student_lname']; ?>, <?php echo $row['student_fname']; ?></span>
                                  </div>
                                </div>
                      <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Title</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                        <?php echo $row['coursename']; ?>
                                  </div>
                                </div>
                      <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Course</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                        <?php echo $row['shortcourse']; ?> (00<?php echo $row['section']; ?>)
                                  </div>
                                </div>
                      <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Professor</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                        <?php echo $row['professorname']; ?>
                                  </div>
                                </div>
                      <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Credits</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                        <?php echo $row['credits']; ?>.0
                                  </div>
                                </div>
                      <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Course Time</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                        <?php
                                        $start_time = date("h:i A", strtotime($row['start_time']));
                                        $end_time = date("h:i A", strtotime($row['end_time']));
                                        ?>
                                        <?php echo $start_time; ?> - <?php echo $end_time; ?> (<?php echo $row['days']; ?>)
                                  </div>
                                </div>
                      <hr>
                      <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Location</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                        <?php echo $row['location']; ?>
                                  </div>
                                </div>
                      <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Status</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                    <?php if($row['approval_status'] == 'approved'){ ?>
                                    <span class="text-capitalize text-success"><?php echo $row['approval_status']; ?><span>
                                    <?php } if($row['approval_status'] == 'rejected') { ?>
                                      <span class="text-capitalize text-danger"><?php echo $row['approval_status']; ?><span>
                                    <?php } if($row['approval_status'] == 'pending') { ?>
                                      <span class="text-capitalize text-primary"><?php echo $row['approval_status']; ?><span>
                                    <?php } if($row['approval_status'] == 'terminated') { ?>
                                      <span class="text-capitalize text-danger"><?php echo $row['approval_status']; ?><span>
                                    <?php }?>
                                  </div>
                                </div>
                      <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <h6 class="mb-0">Actions</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary">
                                  <a class="text-decoration-none badge text-bg-success" data-bs-toggle="modal" data-bs-target="#addLab" href="#">Add Lab</a>
                                  <a class="text-decoration-none badge text-bg-success" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">Edit</a>
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

<!-- EDIT MODAL -->
<div class="modal fade" id="addLab" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <span class="text-muted pt-4" style="width: 95%;">Course Lab Requests</span>
                </div>
                <hr style="margin-bottom: -5px; margin-top: 5px;">
                <div class="form-group pt-3 mx-auto">
                    <label for="lab_start_time" style="font-size: 14px;">Lab Start Time</label>
                    <input class="form-control" id="lab_start_time" type="time" name="lab_start_time" required>
                </div>
                <div class="form-group pt-3 mx-auto">
                    <label for="lab_end_time" style="font-size: 14px;">Lab End Time</label>
                    <input class="form-control" id="lab_end_time" type="time" name="lab_end_time" required>
                </div>
                <fieldset class="row pt-3 mx-auto">
                    <legend class="col-form-label col-sm-6 pt-3" style="font-size: 14px;">Course Days</legend>
                    <div class="form-group " style="width: 95%; margin-top: -20px;">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="lab_days[]" value="M"> M
                        &nbsp;
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="lab_days[]" value="Tu"> Tu
                        &nbsp;
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="lab_days[]" value="W"> W
                        &nbsp;
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="lab_days[]" value="Th"> Th
                        &nbsp;
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="lab_days[]" value="F"> F
                    </div>
                </fieldset>
                <div class="form-group pt-3 mx-auto">
                    <label for="lab_location" style="font-size: 14px;">Lab Location</label>
                    <input class="form-control" id="lab_location" type="text" name="lab_location" required>
                </div>
                <!-- <div class="form-group pt-3 mx-auto">
                    <label for="notes" style="font-size: 14px;">Notes <span class="text-muted" style="font-size: 10px;">List dates and times wanted to be changed. Give reason behind change.</span></label>
                    <textarea class="form-control" id="reason" type="text" name="reason" value=""></textarea>
                </div>  -->
                <?php }} ?>

        </div>
    
        <div class="modal-footer">
            <div class="form-group pt-3 mx-auto d-grid d-md-flex justify-content-md-end" style="width: 95%; margin-bottom: 10px;">
                <button type="button" style="border-color: rgba(0,0,0,0);" class="badge text-bg-secondary" data-bs-dismiss="modal">Close</button> &nbsp;
                <button type="submit" style="border-color: rgba(0,0,0,0);" name="add-lab" class="badge text-bg-secondary">Update Course</button>
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