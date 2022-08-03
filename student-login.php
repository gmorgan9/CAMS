
<?php
session_start();
// Include config file
require_once "database/connection.php";
require_once "database/validation.php";
 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="assets/css/landingStyle.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


    <style>
        .active {
            color:rgba(28, 28, 28, 0.7) !important;
        }
    </style>


    <title>CAMS | Student Login</title>
</head>
<body>
    
<?php include("includes/header.php"); ?>
    <br><br>
    
<h2 class="text-center">
    Students
</h2>


    <!-- <div class="m-5"></div> -->
    <ul class="nav nav-tabs" id="myTab" role="tablist"  style="margin-right: 550px !important;border-color: rgba(28, 28, 28, 0.7);">
        <li class="nav-item" role="presentation" style="background-color: rgba(28, 28, 28, 0.7); border-radius: 10px 10px 0px 0px;">
          <button class="nav-link active text-light" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-tab-pane" type="button" role="tab" aria-controls="login-tab-pane" aria-selected="true">Login</button>
        </li>
        <li class="nav-item" role="presentation" style="background-color: rgba(28, 28, 28, 0.7); border-radius: 10px 10px 0px 0px;">
          <button class="nav-link text-light" id="signup-tab" data-bs-toggle="tab" data-bs-target="#signup-tab-pane" type="button" role="tab" aria-controls="signup-tab-pane" aria-selected="false">Sign Up</button>
        </li>
        <li class="nav-item" role="presentation" style="background-color: rgba(28, 28, 28, 0.7); border-radius: 10px 10px 0px 0px;">
          <button class="nav-link text-light" id="forgot-tab" data-bs-toggle="tab" data-bs-target="#forgot-tab-pane" type="button" role="tab" aria-controls="forgot-tab-pane" aria-selected="false">Forgot Password?</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="p-4"></div>
        <div class="tab-pane show active" id="login-tab-pane" role="tabpanel" aria-labelledby="login-tab" tabindex="0">
            
            <div class="form w-50 d-flex mx-auto" style=" background-color: rgba(28, 28, 28, 0.7); color: white; padding: 20px; border-radius:15px;">
                
            <form class="row g-3 needs-validation mx-auto" novalidate>
                <div class="col-md-6 mx-auto">
                  <label for="validationCustomUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                      Please enter a username.
                    </div>
                  </div>
                <div class="row"></div>
                <div class="col-md-6 mx-auto">
                    <label for="validationCustomUsername" class="form-label">Password</label>
                    <div class="input-group has-validation">
                      <!-- <span class="input-group-text" id="inputGroupPrepend"></span> -->
                      <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                      <div class="invalid-feedback">
                        Please enter a password.
                      </div>
                    </div>
                  </div>
                <div class="col-12 d-flex justify-content-center">
                  <button class="btn btn-secondary" type="submit">Login</button>
                </div>
              </form>
            </div>
            </div>
<!-- sign up -->


<div class="tab-pane" id="signup-tab-pane" role="tabpanel" aria-labelledby="signup-tab" tabindex="0">
    <!-- <div class="m-5"></div> -->
    
    <div class="form w-50 d-flex mx-auto" style="background-color: rgba(28, 28, 28, 0.7); color: white; padding: 20px; border-radius:15px;">
        <!-- <h2>Signup</h2> -->
     <form class="row g-3 needs-validation" novalidate method="POST" action="validation.php">
         <div class="col-md-6">
           <label for="fName" class="form-label">First name</label>
           <input type="text" name="fName" class="form-control" id="fName" value="" required>
           <div class="valid-feedback">
             Looks good!
           </div>
           <div class="invalid-feedback">
               Please enter a valid first name.
             </div>
         </div>
         <div class="col-md-6">
           <label for="lName" class="form-label">Last name</label>
           <input type="text" name="lName" class="form-control" id="lName" value="" required>
           <div class="valid-feedback">
             Looks good!
           </div>
           <div class="invalid-feedback">
               Please enter a valid last name.
             </div>
         </div>
         <div class="col-md-6">
           <label for="uName" class="form-label">Username</label>
             <input type="text" name="uName" class="form-control" id="uName" aria-describedby="inputGroupPrepend" required>
             <div class="valid-feedback">
             Looks good!
             </div>
             <div class="invalid-feedback">
               Please choose a valid username.
             </div>
           </div>
         <div class="col-md-6">
           <label for="validationCustomUsername" class="form-label">Email</label>
             <input type="text" name="email" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
             <div class="valid-feedback">
             Looks good!
             </div>
             <div class="invalid-feedback">
               Please enter a valid email.
             </div>
           </div>
         <div class="col-md-6">
           <label for="validationCustom03" class="form-label">Password</label>
           <input type="text" name="password" class="form-control" id="validationCustom03" required>
           <div class="valid-feedback">
             Looks good!
             </div>
           <div class="invalid-feedback">
             Please enter a valid password.
           </div>
         </div>
         <div class="col-md-6">
             <label for="validationCustom03" class="form-label">Confirm Password</label>
             <input type="text" name="confirm_password" class="form-control" id="validationCustom03" required>
             <div class="valid-feedback">
             Looks good!
             </div>
             <div class="invalid-feedback">
               Please enter a valid confirmed password.
             </div>
           </div>
     
         <div class="col-12 d-flex justify-content-center">
           <div class="form-check">
             <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
             <label class="form-check-label" for="invalidCheck">
               Agree to terms and conditions
             </label>
             <div class="invalid-feedback">
               You must agree before submitting.
             </div>
           </div>
         </div>
         <div class="col-12 d-flex justify-content-center">
           <button class="btn btn-secondary" type="submit">Register</button>
         </div>
       </form>
     </div>
     </div>

     <!-- forgot password -->
     <div class="tab-pane" id="forgot-tab-pane" role="tabpanel" aria-labelledby="forgot-tab" tabindex="0">
            
        <div class="form w-50 d-flex mx-auto" style=" background-color: rgba(28, 28, 28, 0.7); color: white; padding: 20px; border-radius:15px;">
        <form class="row g-1 needs-validation mx-auto" novalidate>
            <div class="col-md-6 mx-auto">
              <p>Have you forgotten your password?</p>
            </div>
            <div class="row"></div>
            <div class="col-md-6 mx-auto">
                <label for="validationCustomUsername" class="form-label">Password</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend"></span> -->
                  <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                  <div class="invalid-feedback">
                    Please enter a username.
                  </div>
                </div>
              </div>
              <div class="m-2"></div>
            <div class="col-12 d-flex justify-content-center">
              <button class="btn btn-secondary" type="submit">Reset Password</button>
            </div>
          </form>
        </div>
        </div>


 </div>

 <footer class="fixed-bottom py-3">
    <div class="text-center text-muted" style="background-color: rgba(0, 0, 0, 0.05);">
        &copy; 2022 Course Assignment Management System
      </div>
    </footer>



 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

    


      <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
      </script>
      
      


</body>
</html>