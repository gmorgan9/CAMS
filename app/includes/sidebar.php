<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
            <a href="<?php echo BASE_URL . '/pages/dashboard.php' ?>" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                <i class="bi bi-sliders2"></i>
                <span>  Dashboard</span>
            </a>
            <?php if($_SESSION['acc_type'] == 0) { ?>
            <a href="<?php echo BASE_URL . '/pages/info.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                <i class="bi bi-info-circle"></i>
                <span>  Information</span>
            </a>
            <?php } else {} ?>
            <?php if($_SESSION['acc_type'] == 0){ ?>
            <a href="<?php echo BASE_URL . '/pages/timesheet.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                <i class="bi bi-clock"></i>
                <span>  Timesheet</span>
            </a>
            <?php } ?>

            <?php if($_SESSION['acc_type'] == 1){ ?>
                <br>
                <span style="margin-left: 38px; margin-bottom: -10px;">Admin Links</span>
                <hr>
                <a style="margin-top: -15px;" href="<?php echo BASE_URL . '/admin/manage-users.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="bi bi-person-badge"></i>
                    <span>  Students</span>
                </a>
                <?php 
                //WHERE approval_status = 'pending' OR approval_status = 'terminated' 
                $sql = " SELECT * FROM course";
                if ($result = mysqli_query($conn, $sql)) {
                    $rowcount = mysqli_num_rows( $result );
                ?>
                <a href="<?php echo BASE_URL . '/admin/courses.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="bi bi-briefcase"></i>
                    <?php if($rowcount == 0){ ?>
                        <span>  Courses</span>
                    <?php } else { ?>
                        <span>  Courses</span> &nbsp;  <span class="badge rounded-pill text-bg-danger" style="margin-top: -10px !important;"><?php echo $rowcount; ?></span>
                    <?php } ?>
                </a>
                <?php 
                // WHERE approval_status = 'pending' 
                $sql = " SELECT * FROM professors";
                if ($result = mysqli_query($conn, $sql)) {
                    $rowcount = mysqli_num_rows( $result );
                ?>
                <a href="<?php echo BASE_URL . '/pages/professors.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="bi bi-clock-history"></i>
                    <?php if($rowcount == 0){ ?>
                        <span>  Professors</span>
                    <?php } else { ?>
                        <span>  Professors</span> &nbsp;  <span class="badge rounded-pill text-bg-danger" style="margin-top: -10px !important;"><?php echo $rowcount; ?></span>
                    <?php }} ?>
                </a>
                <?php 
                // WHERE approval_status = 'pending' OR approval_status = 'terminated' 
                $sql = " SELECT * FROM assignment ";
                if ($result = mysqli_query($conn, $sql)) {
                    $rowcount = mysqli_num_rows( $result );
                ?>
                <a href="<?php echo BASE_URL . '/pages/assignments.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="bi bi-calendar-range"></i>
                    <?php if($rowcount == 0){ ?>
                        <span>  Assignments</span>
                    <?php } else { ?>
                        <span>  Assignments</span> &nbsp;  <span class="badge rounded-pill text-bg-danger" style="margin-top: -10px !important;"><?php echo $rowcount; ?></span>
                    <?php }} ?>
                </a>
                <a href="<?php echo BASE_URL . '/admin/reports.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="bi bi-bar-chart"></i>
                    <span>  Reports</span>
                </a>
                <?php } ?>
            <?php } else {?>
                <br>
                <span style="margin-left: 38px; margin-bottom: -10px;">Employee Links</span>
                <hr>
                <a style="margin-top: -15px;" href="<?php echo BASE_URL . '/pages/job_request.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="bi bi-briefcase"></i>
                    <span>  Request Course</span>
                </a>
                <a href="<?php echo BASE_URL . '/pages/schedule.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="bi bi-calendar-range"></i>
                    <span>  Class Schedule</span>
                </a>

           <?php } ?>
        </div>
    </div>
</nav>