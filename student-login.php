<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">

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
    
    <header>
        <div class="logo">
            <h1>
                <i class="bi bi-file-earmark-check"></i> CAMS
            </h1>
        </div>
        <nav class="nav">
            <ul class="nav-list">
                <li class="nav-list-item"><a class="nav-list-item-link" href="/">Home</a></li>
                <li class="nav-list-item"><a class="nav-list-item-link" href="student-login.php">Students</a></li>
                <li class="nav-list-item"><a class="nav-list-item-link" href="admin-login.php">Admin</a></li>
            </ul>
        </nav>
    </header>
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
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                      Please enter a username.
                    </div>
                  </div>
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
     <form class="row g-3 needs-validation" novalidate>
         <div class="col-md-4">
           <label for="validationCustom01" class="form-label">First name</label>
           <input type="text" class="form-control" id="validationCustom01" value="" required>
           <div class="valid-feedback">
             Looks good!
           </div>
         </div>
         <div class="col-md-4">
           <label for="validationCustom02" class="form-label">Last name</label>
           <input type="text" class="form-control" id="validationCustom02" value="" required>
           <div class="valid-feedback">
             Looks good!
           </div>
         </div>
         <div class="col-md-4">
           <label for="validationCustomUsername" class="form-label">Username</label>
           <div class="input-group has-validation">
             <span class="input-group-text" id="inputGroupPrepend">@</span>
             <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
             <div class="invalid-feedback">
               Please choose a username.
             </div>
           </div>
         </div>
         <div class="col-md-6">
           <label for="validationCustomUsername" class="form-label">Email</label>
           <div class="input-group has-validation">
             <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-envelope"></i></span>
             <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
             <div class="invalid-feedback">
               Please choose an email.
             </div>
           </div>
         </div>
         <div class="col-md-6 mx-auto">
           <label for="validationCustom04" class="form-label">Gender</label>
           <select class="form-select" id="validationCustom04" required>
             <option selected disabled value="">Choose...</option>
             <option>Male</option>
             <option>Female</option>
             <option>Rather not say</option>
           </select>
           <div class="invalid-feedback">
             Please select a valid state.
           </div>
         </div>
         <div class="col-md-6">
           <label for="validationCustom03" class="form-label">Password</label>
           <input type="text" class="form-control" id="validationCustom03" required>
           <div class="invalid-feedback">
             Please provide a valid city.
           </div>
         </div>
         <div class="col-md-6">
             <label for="validationCustom03" class="form-label">Confirm Password</label>
             <input type="text" class="form-control" id="validationCustom03" required>
             <div class="invalid-feedback">
               Please provide a valid city.
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