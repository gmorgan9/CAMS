<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
            <a href="<?php echo BASE_URL . '/pages/dashboard.php' ?>" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                <i class="bi bi-speedometer"></i>
                <span>  Dashboard</span>
            </a>
            <a href="<?php echo BASE_URL . '/pages/courses.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                <i class="bi bi-mortarboard"></i>
                <span>  Courses</span>
            </a>
            <a href="<?php echo BASE_URL . '/pages/assignments.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                <i class="bi bi-clipboard-data"></i>
                <span>  Assignments</span>
            </a>
            <a href="<?php echo BASE_URL . '/pages/progress-report.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                <i class="bi bi-bar-chart"></i>
                <span>  Progress Report</span>
            </a>

            <?php if($_SESSION['acc_type'] == 1){ ?>
                <br>
                <span style="margin-left: 38px; margin-bottom: -10px;">Admin Links</span>
                <hr>
                <a style="margin-top: -15px;" href="<?php echo BASE_URL . '/admin/manage-users.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                <i class="bi bi-bar-chart"></i>
                <span>  Students</span>
                </a>
                <?php 
                $sql = " SELECT * FROM course WHERE approval_status = 'pending' OR approval_status = 'terminated' ";
                if ($result = mysqli_query($conn, $sql)) {
                    $rowcount = mysqli_num_rows( $result );
             
                ?>
                <a href="<?php echo BASE_URL . '/admin/jobs.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="bi bi-briefcase"></i>
                    <?php if($rowcount == 0){ ?>
                        <span>  Jobs</span>
                    <?php } else { ?>
                        <span>  Jobs</span> &nbsp;  <span class="badge rounded-pill text-bg-danger" style="margin-top: -10px !important;"><?php echo $rowcount; ?></span>
                    <?php }} ?>
                </a>
            <?php } else {} ?>
        </div>
    </div>
</nav>