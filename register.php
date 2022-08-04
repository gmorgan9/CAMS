<?php
// require_once "app/database/functions.php";

session_start();

if(isLoggedIn()){
   header('location: dashboard.php');
}

// if(isset($_POST['register'])){

//    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
//    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
//    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
//    $email = mysqli_real_escape_string($conn, $_POST['email']);
//    $pass = md5($_POST['password']);
//    $cpass = md5($_POST['cpassword']);
//    $loggedin = 0;
//    //$user_type = $_POST['user_type'];

//    $select = " SELECT * FROM students WHERE uname = '$uname' && email = '$email' && password = '$pass' ";

//    $result = mysqli_query($conn, $select);

//    if(mysqli_num_rows($result) > 0){

//       $error[] = 'user already exist!';

//    }else{

//       if($pass != $cpass){
//          $error[] = 'Passwords do not match!';
//       }else{
//          $insert = "INSERT INTO students (fname, lname, uname, email, password) VALUES('$fname', '$lname', '$uname', '$email','$pass','$user_type')";
//          mysqli_query($conn, $insert);
//          echo "success";
//          header('location:login.php');
//       }
//    }

// };


$servername = "localhost";
$username = "garrett";
$password = "BIGmorgan1999!";
$database = "cams";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// receive all input values from the form. Call the e() function
    // defined below to escape form values
    $fname    =  e($_POST['fname']);
    $lname    =  e($_POST['lname']);
    $uname    =  e($_POST['uname']);
    $email    =  e($_POST['email']);
    $pass     =  e($_POST['password']);
    $cpass    =  e($_POST['cpassword']);
 
    // form validation: ensure that the form is correctly filled
    if (empty($fname)) { 
       array_push($errors, "First name is required"); 
    }
    if (empty($lname)) { 
       array_push($errors, "Last name is required"); 
    }
    if (empty($uname)) { 
       array_push($errors, "Username is required"); 
    }
    if (empty($email)) { 
       array_push($errors, "Email is required"); 
    }
    if (empty($pass)) { 
       array_push($errors, "Password is required"); 
    }
    if ($pass != $cpass) {
       array_push($errors, "The two passwords do not match");
    }
 
    // register user if there are no errors in the form
    if (count($errors) == 0) {
       $password = md5($pass);//encrypt the password before saving in the database
          $query = "INSERT INTO students (fname, lname, uname, email, password, isadmin, loggedin) 
                  VALUES('$fname', '$lname', '$uname', '$email', '$password', 0, 0)";
          mysqli_query($conn, $query);
 
          // get id of the created user
          // $logged_in_user_id = mysqli_insert_id($conn);
 
          // $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
          $_SESSION['success']  = "You are now logged in";
          header('location: login.php');				
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CAMS | Register</title>

   <!-- Custom Styles -->
   <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/main-style.css?v='. time(); ?>">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>
<body>
<?php include("app/includes/header.php"); ?>
   
<br><br><br>
<div class="form-container mx-auto">


   <form action="register.php" method="post">
      <h3>Register Now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="fname" required placeholder="enter your first name">
      <input type="text" name="lname" required placeholder="enter your last name">
      <input type="text" name="uname" required placeholder="enter your user name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <!-- <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select> -->
      <input type="submit" name="register_btn" value="register now" class="form-btn">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

</div>

<?php include("app/includes/footer.php"); ?>

</body>
</html>