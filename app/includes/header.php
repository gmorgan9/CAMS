<header>
        <div class="logo">
            <h1>
                <a style="color:white; text-decoration:none;" href=""><i class="bi bi-file-earmark-check"></i> CAMS</a>
            </h1>
        </div>
        <nav class="nav">
            <ul class="nav-list">
                <li class="nav-list-item"><a class="nav-list-item-link" href="/">Home</a></li>
                <?php if(isset($_SESSION['user_fname']) || isset($_SESSION['admin_fname'])){ ?>

                    <li class="nav-list-item"><a class="nav-list-item-link" href="logout.php">Logout</a></li>


                <?php } else { ?>
                    <li class="nav-list-item"><a class="nav-list-item-link" href="student-login.php">Login/Signup</a></li>
                <?php } ?>



                
            </ul>
        </nav>
    </header>