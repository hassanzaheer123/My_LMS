<?php
if (!isset($_SESSION)) {
    session_start();
}
include "adminheader.php";
include "dbconnection.php";
if (!isset($_SESSION['is_admin_login'])) {
    echo "<script>location.href='index.php';</script>";
 }
?>

<div class="col-sm-9 mt-5">
    <!-- Table -->
    <p class="bg-dark text-center text-white p-2">List of Students</p>
    <?php
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

    ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) {
                    echo '
            <tr>
                <th scope="row">' . $row["stu_id"] . '</th>
                <td>' . $row["stu_name"] . '</td>
                <td>' . $row["stu_email"] . '</td>
                <td>
                    <form action="adminedit_student.php" method="post" class="d-inline">
                    <input type="hidden" name="id" value="' . $row["stu_id"] . '"></input>
                        <button type="submit" class="btn btn-info me-3" name="view" value="view">
                            <i class="fas fa-pen"></i>
                        </button>
                    </form>
                    <form action="" method="post" class="d-inline">
                        <input type="hidden" name="id" value="' . $row["stu_id"] . '"></input>
                        <button type="submit" class="btn btn-secondary" name="delete" value="delete">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>';
                }   ?>
            </tbody>
        </table>
    <?php
    } else {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Sorry!</strong> You have zero students right now . Add some students to display ! 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

    // Deleting Courses from database
    if (isset($_REQUEST["delete"])) {
        // Retrieve the filename from the database based on the course ID
        // $sql_select = "SELECT course_img FROM course WHERE course_id={$_REQUEST['id']}";
        // $result_select = $conn->query($sql_select);

        // if ($result_select->num_rows == 1) {
        //     $row_select = $result_select->fetch_assoc();
        //     $filename = $row_select['course_img'];

            // Delete the file from the server
            // $file_path = 'image/courseimg/' . $filename;
            // if (file_exists($file_path)) {
            //     unlink($file_path);
            // }

            // Delete the database record
            $sql_delete = "DELETE FROM student WHERE stu_id={$_REQUEST['id']}";
            if ($conn->query($sql_delete) === TRUE) {
                echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
            } else {
                echo 'Unable to Delete Data';
            }
        }
    // }

    ?>

</div>

<div>
    <a href="admin_addnewstudent.php" class="btn btn-danger box"><i class="fas fa-plus fa-2x"></i></a>
</div>








<?php
include "adminfooter.php";
?>