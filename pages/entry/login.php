<!-- WORKING -->
<?php

require_once "../../app/database/connection.php";
require_once "../../app/database/functions.php";
require_once "../../path.php";

session_start();

if(isLoggedIn()){
   header('location:' . BASE_URL . '/pages/dashboard.php');
}



if(isset($_POST['submit'])){

   $sID = mysqli_real_escape_string($conn, $_POST['studentID']);
   $fname = mysqli_real_escape_string($conn, $_POST['fname']);
   $lname = mysqli_real_escape_string($conn, $_POST['lname']);
   $uname = mysqli_real_escape_string($conn, $_POST['uname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $isadmin = $_POST['isadmin'];
   $loggedin = $_POST['loggedin'];

   $select = " SELECT * FROM student WHERE uname = '$uname' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);
      $sql = "UPDATE student SET loggedin='1' WHERE uname='$uname'";
      if (mysqli_query($conn, $sql)) {
         echo "Record updated successfully";
       } else {
         echo "Error updating record: " . mysqli_error($conn);
       }
       $_SESSION['fname']            = $row['fname'];
       $_SESSION['sID']              = $row['studentID'];
       $_SESSION['loggedin']         = $row['loggedin'];
       $_SESSION['student_idno']     = $row['idno'];
       $_SESSION['lname']            = $row['lname'];
       $_SESSION['acc_type']         = $row['acc_type'];
       $_SESSION['uname']            = $row['uname'];
       $_SESSION['email']            = $row['email'];
       $_SESSION['pass']             = $row['password'];
       $_SESSION['cpass']            = $row['cpassword'];
      header('location:' . BASE_URL . '/pages/dashboard.php');
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CAMS | Login</title>

<!-- Custom Styles -->
<link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/main-style.css?v='. time(); ?>">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>
<body>

<div class="blocked-page">
   <?php include(ROOT_PATH . '/app/includes/blocked-page.php'); ?>
</div>


<div class="main-container">
<?php include("../../app/includes/header.php"); ?>
   
<br><br><br>
<div class="form-container mx-auto">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="uname" required placeholder="enter your user name">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="Login" class="form-btn">
      <p>don't have an account? <a href="register.php">register now</a></p>
   </form>

</div>

<?php include("../../app/includes/footer.php"); ?>
</div>

</body>
</html>