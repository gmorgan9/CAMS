<!-- WORKING -->
<header>
        <div class="logo">
            <h1>
                <a style="text-decoration:none;" class="logo-link" href="/"><i class="bi bi-file-earmark-check"></i> CAMS</a>
            </h1>
        </div>
        <nav class="nav">
            <ul class="nav-list">
                
                <?php if(isset($_SESSION['user_fname']) || isset($_SESSION['admin_fname'])){ ?>
                    <?php if($_SESSION['isadmin'] == 1){ ?>
                    <li class="nav-list-item"><a class="nav-list-item-link" href="<?php echo BASE_URL . '/dashboard.php' ?>"><i class="bi bi-globe2"></i>  Dashboard</a></li>
                    <li class="nav-list-item"><a class="nav-list-item-link" href="<?php echo BASE_URL . '/admin/profile.php' ?>"><i class="bi bi-person"></i>  Profile</a></li>
                    <?php } else { ?>
                    <li class="nav-list-item"><a class="nav-list-item-link" href="<?php echo BASE_URL . '/dashboard.php' ?>"><i class="bi bi-globe2"></i>  Dashboard</a></li>
                    <li class="nav-list-item"><a class="nav-list-item-link" href="<?php echo BASE_URL . '/profile.php' ?>"><i class="bi bi-person"></i>  Profile</a></li>
                    <?php }?>
                    <li class="nav-list-item"><a class="nav-list-item-link" href="<?php echo BASE_URL . '/logout.php' ?>">Logout</a></li>
                <?php } else { ?>
                    <li class="nav-list-item"><a class="nav-list-item-link" href="/">Home</a></li>
                    <li class="nav-list-item"><a class="nav-list-item-link" href="login.php">Login/Signup</a></li>
                <?php } ?>



                
            </ul>
        </nav>
    </header>