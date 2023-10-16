<?php
if (!isset($_SESSION)) {
    session_start();
}

include "dbconnection.php";
include "student_profile_header.php";

if (isset($stuLogEmail)) {
    $sql = "SELECT * FROM student WHERE stu_email='$stuLogEmail'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $stu_id = $row['stu_id'];
        $stu_img = $row['stu_img'];
    } else {
        echo "Query failed: " . $conn->error;
    }

    if (isset($_POST['submitFeedbackBtn'])) {
        if (empty($_POST['f_content'])) {
            $passMsg = '<div class="alert alert-warning col-sm-6 ms-5 mt-2" role="alert">Fill all fields</div>';
        } else {
            $f_content = $conn->real_escape_string($_POST['f_content']);
            $sql = "INSERT INTO feedback (f_content, stu_id) VALUES ('$f_content', $stu_id)";
            if ($conn->query($sql) === TRUE) {
                $passMsg = '<div class="alert alert-success col-sm-6 ms-5 mt-2" role="alert">Submitted Successfully</div>';
            } else {
                $passMsg = '<div class="alert alert-danger col-sm-6 ms-5 mt-2" role="alert">Unable to Submit</div>';
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
  
<div class="col-sm-5 mt-5">
    <h2 class="text-center">Feedback</h2>
    <form action="" method="post" class="mx-5">
        <div class="form-group mt-3">
            <label for="stu_id">Student ID</label>
            <input readonly type="text" class="form-control" name="stu_id" id="stu_id" value="<?php if(isset($stu_id)) { echo $stu_id; } ?>">
        </div>
        <div class="form-group mt-3">
            <label for="f_content">Write Feedback</label>
            <textarea name="f_content" id="f_content" rows="2" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2" name="submitFeedbackBtn">Submit</button>
        <?php
            if(isset($passMsg)){
                echo $passMsg;
            }
        ?>
    </form>
</div>
<?php
include "student_profile_footer.php";
?>
