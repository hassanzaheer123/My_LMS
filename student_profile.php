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
        $stu_email = $row['stu_email'];
        $stu_name = $row['stu_name'];
        $stu_occ = $row['stu_occ'];
        $stu_img = $row['stu_img'];
        $old_stu_img = $stu_img;
    }
}

if (isset($_POST['updateStuNameBtn'])) {
    if (empty($_POST['stu_name'])) {
        $passMsg = '<div class="alert alert-warning col-sm-6 ms-5 mt-2" role="alert">Fill all fields</div>';
    } else {
        $stu_name = $_POST['stu_name'];
        $stu_occ = $_POST['stu_occ'];

        // Check if a new image was uploaded
        if (!empty($_FILES['stu_img']['name'])) {
            $stu_img = $_FILES['stu_img']['name'];
            $stu_img_temp = $_FILES['stu_img']['tmp_name'];
            $img_folder = 'image/stu/' . $stu_img;
            move_uploaded_file($stu_img_temp, $img_folder);

            // Delete the old image if a new one was uploaded
            if (!empty($old_stu_img) && $stu_img !== $old_stu_img) {
                unlink("image/stu/$old_stu_img");
            }
        } else {
            // No new image was uploaded, keep the old image
            $stu_img = $old_stu_img;
        }

        // Check if the update is successful
        $sql = "UPDATE student SET stu_name='$stu_name', stu_occ='$stu_occ', stu_img='$stu_img' WHERE stu_email='$stuLogEmail'";
        if ($conn->query($sql) === TRUE) {
            $passMsg = '<div class="alert alert-warning col-sm-6 ms-5 mt-2" role="alert">Updated Successfully</div>';
            if (!headers_sent()) {
                header("Location: " . $_SERVER['REQUEST_URI']);
                exit();
            }
        } else {
            $passMsg = '<div class="alert alert-warning col-sm-6 ms-5 mt-2" role="alert">Unable to Update</div>';
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


        <div class="col-sm-5 mt-5 ms-5 pb-5 pt-3" >
        <h2 class="text-center">Profile</h2>

            <form action="" method="post" enctype="multipart/form-data" class="mx-5">
                <div class="form-group mb-3">
                    <label for="stu_id">Student ID</label>
                    <input class="form-control" value="<?php if (isset($stu_id)) {
                                                            echo $stu_id;
                                                        }  ?>" type="text" name="stu_id" id="stu_id" readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="stu_email"> Email</label>
                    <input class="form-control" value="<?php if (isset($stu_email)) {
                                                            echo $stu_email;
                                                        }  ?>" type="text" name="stu_email" id="stu_email" readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="stu_name"> Name</label>
                    <input class="form-control" value="<?php if (isset($stu_name)) {
                                                            echo $stu_name;
                                                        }  ?>" type="text" name="stu_name" id="stu_name">
                </div>
                <div class="form-group mb-3">
                    <label for="stu_occ">Occupation</label>
                    <input class="form-control" value="<?php if (isset($stu_occ)) {
                                                            echo $stu_occ;
                                                        }  ?>" type="text" name="stu_occ" id="stu_occ">
                </div>
                <div class="form-group mb-3">
                    <label for="stu_img">Upload Image</label>
                    <input class="form-control-file" type="file" name="stu_img" id="stu_img">
                </div>
                <button type="submit" class="btn btn-danger" name="updateStuNameBtn">Update</button>
                <?php
                if (isset($passMsg)) {
                    echo $passMsg;
                }
                ?>
            </form>
        </div>



        <?php

        include "student_profile_footer.php";
        ?>