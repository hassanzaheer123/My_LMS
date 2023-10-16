<?php
if (!isset($_SESSION)) {
    session_start();
}

include "dbconnection.php";
include "student_profile_header.php";

?>
<?php
if (!isset($_SESSION['is_login'])) {
    echo "<script>location.href='index.php';</script>";
} else {
    $stuLogEmail = $_SESSION['stuLogemail'];
}

if (isset($_REQUEST['studentPassUpdateBtn'])) {
    if ($_REQUEST['inputnewpassword'] == "") {
        $passmsg = '<div class="alert alert-warning col-sm-6 ms-5 mt-2">Fill All Fields!</div>';
    } else {
        $sql = "SELECT * FROM student WHERE stu_email='$stuLogEmail'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $stuPass = $_REQUEST['inputnewpassword'];
            $sql = "UPDATE student SET stu_pass='$stuPass' WHERE stu_email='$stuLogEmail'";
            if ($conn->query($sql) == TRUE) {
                $passmsg = '<div class="alert alert-success col-sm-6 ms-5 mt-2">Updated Successfully!</div>';
            } else {
                $passmsg = '<div class="alert alert-danger col-sm-6 ms-5 mt-2">Unable to Update!</div>';
            }
        }
    }
}
?>

<!-- Sidebar -->
<div class="container-fluid mb-3" style="margin-top: 40px;">
    <div class="row">
        <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item mb-3">
                        <img class="img-thumbnail rounded-circle" src="<?php echo 'image/stu/' . $stu_img; ?>" alt="Profile Picture">
                    </li>
                    <li class="nav-item">
                        <a href="student_profile.php" class="nav-link">
                            <i class="fas fa-user"></i>
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="student_myCourse.php" class="nav-link">
                            <i class="fab fa-accessible-icon"></i>
                            My Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="student_feedback.php" class="nav-link">
                            <i class="fab fa-accessible-icon"></i>
                            Feedback
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="student_change_pass.php" class="nav-link">
                            <i class="fas fa-key"></i>
                            Change Password
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>


        <div class="col-sm-6 ms-5 pb-5" >
            <form action="" method="post" class="mt-5 mx-5">
                <h3 class="mb-4">Change Password</h3>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="text" name="inputEmail" id="inputEmail" class="form-control" readonly 
                    value="<?php echo $stuLogEmail; ?>">
                </div>
                <div class="form-group">
                    <label for="inputnewpassword">New Password</label>
                    <input type="password" name="inputnewpassword" id="inputnewpassword" class="form-control" placeholder="New Password">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger mt-3" name="studentPassUpdateBtn">Update</button>
                    <button type="reset" class="btn btn-secondary mt-3">Reset</button>
                </div>
                <?php if(isset($passmsg)){echo $passmsg;} ?>
            </form>
        </div>
   

<?php
include "student_profile_footer.php";
?>