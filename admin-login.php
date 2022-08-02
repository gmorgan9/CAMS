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
<h2 class="login-signup-title text-center">
    Admin Login
</h2>

<div class="m-5"></div>
<br>
            
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