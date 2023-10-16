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
if (isset($_REQUEST['adminPassUpdateBtn'])) {
    if ($_REQUEST['inputnewpassword'] == "") {
        $passmsg = '<div class="alert alert-warning col-sm-6 ms-5 mt-2">Fill All Fields !</div>';
    } else {
        $sql = "SELECT * FROM admin WHERE admin_email='$adminEmail'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $adminPass = $_REQUEST['inputnewpassword'];
            $sql = "UPDATE admin SET admin_pass='$adminPass' WHERE admin_email='$adminEmail'";
            if ($conn->query($sql) == TRUE) {
                $passmsg = '<div class="alert alert-success col-sm-6 ms-5 mt-2">Updated Successfully !</div>';
            } else {
                $passmsg = '<div class="alert alert-danger col-sm-6 ms-5 mt-2">Unable to Update  !</div>';
            }
        }
    }
}
?>

<div class="col-sm-9 mt-5">
    <div class="row">
        <div class="col-sm-6 ms-5 pb-5" style="background-color: #F7F4EF;">
            <form action="" method="post" class="mt-5 mx-5">
                <h3 class="mb-4">Change Password</h3>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="text" name="inputEmail" id="inputEmail" class="form-control" readonly 
                    value="<?php echo $adminEmail; ?>">
                </div>
                <div class="form-group">
                    <label for="inputnewpassword">New Password</label>
                    <input type="password" name="inputnewpassword" id="inputnewpassword" class="form-control" placeholder="New Password">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger mt-3" name="adminPassUpdateBtn">Update</button>
                    <button type="reset" class="btn btn-secondary mt-3">Reset</button>
                </div>
                <?php if(isset($passmsg)){echo $passmsg;} ?>
            </form>
        </div>
    </div>
</div>

<?php
include "adminfooter.php";
?>
