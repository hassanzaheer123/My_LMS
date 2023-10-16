<?php
if (!isset($_SESSION)) {
    session_start();
}
include "adminheader.php";
include "dbconnection.php";
if (!isset($_SESSION['is_admin_login'])) {
    echo "<script>location.href='index.php';</script>";
} else {
    $adminEmail = $_SESSION['adminLogemail'];
}

// Update Student Details
if (isset($_REQUEST['newStuSubmitBtn'])) {


    // Checking for empty fields
    if (($_REQUEST['stu_id'] == "") || ($_REQUEST['stu_name'] == "") ||
        ($_REQUEST['stu_email'] == "") || ($_REQUEST['stu_pass'] == "") ||
        ($_REQUEST['stu_occ'] == ""))
     {
        $msg = '<div class="alert alert-warning col-sm-6 ms-5 mt-2">Fill all Fields</div>';
    } else {
        $stu_id = $_REQUEST['stu_id'];
        $stu_name = $_REQUEST['stu_name'];
        $stu_email = $_REQUEST['stu_email'];
        $stu_pass = $_REQUEST['stu_pass'];
        $stu_occ = $_REQUEST['stu_occ'];

      
        $sql = "UPDATE student SET stu_id='$stu_id',stu_name='$stu_name',stu_email='$stu_email',
        stu_pass='$stu_pass',stu_occ='$stu_occ' WHERE stu_id='$stu_id'";

        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ms-5 mt-2">Student Details Updated Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ms-5 mt-2">Unable to update Student Details  !</div>';
        }
    }
}

?>

<!-- Form to Update Course -->
<div class="col-sm-6 mt-5 mx-3 px-5 pb-5 pt-3" style="background-color: #F7F4EF;">
    <?php
    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM student WHERE stu_id={$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }

    ?>
    <!-- Form to add New Student -->
    <h3 class="text-center mt-4">Update Student Details</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group mt-2">
            <label for="stu_id">Student ID</label>
            
            <input readonly type="text" class="form-control" name="stu_id" id="stu_id" value="<?php if (isset($row['stu_id'])) {
                                                                                                    echo $row['stu_id'];
                                                                                                } ?>">
        </div>
        <div class="form-group mt-2">
            <label for="stu_name">Name</label>
            <input type="text" class="form-control" name="stu_name" id="stu_name" value="<?php if (isset($row['stu_name'])) {
                                                                                                echo $row['stu_name'];
                                                                                            } ?>">
        </div>
        <div class="form-group mt-2">
            <label for="stu_email">Email</label>
            <input type="email" class="form-control" name="stu_email" id="stu_email" value="<?php if (isset($row['stu_email'])) {
                                                                                                echo $row['stu_email'];
                                                                                            } ?>">
        </div>
        <div class="form-group mt-2">
            <label for="stu_pass">Password</label>
            <input type="password" class="form-control" name="stu_pass" id="stu_pass" value="<?php if (isset($row['stu_pass'])) {
                                                                                                    echo $row['stu_pass'];
                                                                                                } ?>">
        </div>
        <div class="form-group mt-2">
            <label for="stu_occ">Occupation</label>
            <input type="text" class="form-control" name="stu_occ" id="stu_occ" value="<?php if (isset($row['stu_occ'])) {
                                                                                            echo $row['stu_occ'];
                                                                                        } ?>">
        </div>
        <div class="text-center mt-5">
        <button type="submit" class="btn btn-danger" id="newStuSubmitBtn" name="newStuSubmitBtn">Update</button>
            <a href="admin_students.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if (isset($msg)) {
            echo $msg;
        }  ?>
    </form>
</div>










<?php
include "adminfooter.php";
?>