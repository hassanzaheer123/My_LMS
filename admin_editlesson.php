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

<div class="col-sm-9 mt-5 mx-3">
    <?php
    // Check if the form is submitted for updating
    if (isset($_POST['requpdate'])) {
        $lesson_id = $_POST['lesson_id'];
        $lesson_name = $_POST['lesson_name'];
        $lesson_desc = $_POST['lesson_desc'];

        // Update lesson data in the database
        $sql = "UPDATE lesson SET lesson_name='$lesson_name', lesson_desc='$lesson_desc' WHERE lesson_id='$lesson_id'";
        if ($conn->query($sql) === TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ms-5 mt-2">Lesson Updated Successfully</div>';

            // Check if a new lesson file is uploaded
            if (!empty($_FILES['lessson_link']['name'])) {
                $lesson_link = $_FILES['lessson_link']['name'];
                $lesson_link_temp = $_FILES['lessson_link']['tmp_name'];
                $link_folder = 'video/lessonvideo/' . $lesson_link;

                // Delete the old video file
                $sql_select = "SELECT lessson_link FROM lesson WHERE lesson_id='$lesson_id'";
                $result_select = $conn->query($sql_select);
                if ($result_select->num_rows == 1) {
                    $row_select = $result_select->fetch_assoc();
                    $old_filename = $row_select['lessson_link'];
                    $old_file_path = 'video/lessonvideo/' . $old_filename;
                    if (file_exists($old_file_path)) {
                        unlink($old_file_path);
                    }
                }

                // Move the new video file to the folder
                move_uploaded_file($lesson_link_temp, $link_folder);

                // Update the lesson record with the new file name
                $sql_update_link = "UPDATE lesson SET lessson_link='$lesson_link' WHERE lesson_id='$lesson_id'";
                $conn->query($sql_update_link);
            }
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ms-5 mt-2">Unable to update lesson</div>';
        }
    }

    // Retrieve the lesson details for editing
    if (isset($_POST['view'])) {
        $lesson_id = $_POST['id'];
        $sql = "SELECT * FROM lesson WHERE lesson_id='$lesson_id'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        } else {
            echo '<div class="alert alert-danger col-sm-6 ms-5 mt-2">Lesson not found</div>';
        }
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="lesson_id">Lesson ID</label>
            <input type="text" value="<?php echo isset($row['lesson_id']) ? $row['lesson_id'] : ''; ?>" class="form-control" name="lesson_id" id="lesson_id" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" value="<?php echo isset($row['lesson_name']) ? $row['lesson_name'] : ''; ?>" class="form-control" name="lesson_name" id="lesson_name" >
        </div>
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" value="<?php echo isset($row['course_id']) ? $row['course_id'] : ''; ?>" class="form-control" name="course_id" id="course_id" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" value="<?php echo isset($row['course_name']) ? $row['course_name'] : ''; ?>" class="form-control" name="course_name" id="course_name" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea class="form-control" name="lesson_desc" id="lesson_desc" rows="2" row="2"><?php echo isset($row['lesson_desc']) ? $row['lesson_desc'] : ''; ?></textarea>
        </div>
        <div class="form-group">
            <label for="lessson_link">Lesson Link</label>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="<?php
                    echo isset($row['lessson_link']) ? "video/lessonvideo/" . $row['lessson_link'] : '';
                ?>" frameborder="0" allowfullscreen></iframe>
            </div>
            <input type="file" class="form-control-file" name="lessson_link" id="lessson_link">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
            <a href="admin_lessons.php" class="btn btn-secondary">Close</a>
        </div><br>
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>
    </form>
</div>

<?php
include "adminfooter.php";
?>
