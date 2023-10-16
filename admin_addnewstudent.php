<?php
if (!isset($_SESSION)) {
    session_start();
}
include "adminheader.php";
include "dbconnection.php";
if (!isset($_SESSION['is_admin_login'])) {
    echo "<script>location.href='index.php';</script>";
}
if (isset($_REQUEST['newStuSubmitBtn'])) {
    // Checking for empty fields
    if (($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "") ||
        ($_REQUEST['stu_pass'] == "") || ($_REQUEST['stu_occ'] == "")
    ) {
        $msg = '<div class="alert alert-warning col-sm-6 ms-5 mt-2">Fill all Fields</div>';
    } else {
        $stu_name = $_REQUEST['stu_name'];
        $stu_email = $_REQUEST['stu_email'];
        $stu_pass = $_REQUEST['stu_pass'];
        $stu_occ = $_REQUEST['stu_occ'];

        $sql = "INSERT INTO student(stu_name,stu_email,stu_pass,stu_occ) VALUES
        ('$stu_name','$stu_email','$stu_pass','$stu_occ') ";

        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ms-5 mt-2">Student Added Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ms-5 mt-2">Unable to add Student !</div>';
        }
    }
}
?>

<!-- Form to add New Student -->
<div class="col-sm-6 mt-5 mx-3 px-5 pb-5 pt-3" style="background-color: #F7F4EF;">
    <h3 class="text-center mt-4">Add New Student</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group mt-2">
            <label for="stu_name">Name</label>
            <input type="text" class="form-control" name="stu_name" id="stu_name">
        </div>
        <div class="form-group mt-2">
            <label for="stu_email">Email</label>
            <input type="email" class="form-control" name="stu_email" id="stu_email">
        </div>
        <div class="form-group mt-2">
            <label for="stu_pass">Password</label>
            <input type="password" class="form-control" name="stu_pass" id="stu_pass">
        </div>
        <div class="form-group mt-2">
            <label for="stu_occ">Occupation</label>
            <input type="text" class="form-control" name="stu_occ" id="stu_occ">
        </div>
        <div class="text-center mt-5">
            <button type="submit" class="btn btn-danger" id="newStuSubmitBtn" name="newStuSubmitBtn">Submit</button>
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