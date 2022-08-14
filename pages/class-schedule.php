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



    <title>CAMS | Class Schedule</title>
</head>
<body>
    
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>


<?php include(ROOT_PATH . "/app/includes/sidebar.php") ?>
        
<div class="main">

  <div class="page-header mx-auto">
    <p class="page_title" style="float: left; padding-top: 2px;">Class Schedule</p>
    <ul class="breadcrumb">
      <li><a href="<?php echo BASE_URL . '/dashboard.php' ?>">Dashboard</a></li>
      <li>Class Schedule</li>
    </ul>


    <!-- start PAGE-CONTENT -->
<div class="page-content mx-auto mt-2" style="width: 100%;">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID #</th>
      <th scope="col">Employee</th>
      <!-- <th scope="col">Company</th> -->
      <!-- <th scope="col">Department</th> -->
      <!-- <th scope="col">Postion</th> -->
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

  <?php
      $student_idno = $_SESSION['student_idno'];
      $sql = "SELECT * FROM course WHERE student_idno = '$student_idno'";
      $all = mysqli_query($conn, $sql);
      if($all) {
          while ($row = mysqli_fetch_assoc($all)) {
            $sID            = $row['studentID'];
            $semester       = $row['semestername'];
            $idno           = $row['idno'];
            $shortcourse    = $row['shortcourse'];
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
        <td><?php echo $student_lname; ?>, <?php echo $student_fname; ?></td>
        <!-- <?php //if($acc_type == 1){ ?>
          <td>Admin</td>
        <?php //} else { ?>
          <td>Employee</td>
        <?php //} ?> -->
        <?php if($status == 1){ ?>
          <td>Active</td>
        <?php } else { ?>
          <td>Inactive</td>
        <?php } ?>
        <td>
          <!-- <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#editEmployee" class="badge text-bg-primary" href="actions/edit-employee.php?employeeID=<?php echo $empID; ?>">Edit</a> -->
          <a style="text-decoration: none;" class="badge text-bg-success" href="actions/view-employee.php?employeeID=<?php echo $empID; ?>">View</a>
          <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#confirmDelete" class="badge text-bg-danger" href="employees.php?employeeID=<?php echo $empID; ?>">Delete</a>
        </td>
        <?php }}?>
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
</div>


<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>


</body>
</html>