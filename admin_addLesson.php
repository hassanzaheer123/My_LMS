<?php
if (!isset($_SESSION)) {
    session_start();
}
include "adminheader.php";
include "dbconnection.php";
if (!isset($_SESSION['is_admin_login'])) {
    echo "<script>location.href='index.php';</script>";
}

// Check if course_id and course_name are set in the session
if (isset($_SESSION['course_id']) && isset($_SESSION['course_name'])) {
    $course_id = $_SESSION['course_id'];
    $course_name = $_SESSION['course_name'];

    if (isset($_REQUEST['lessonSubmitBtn'])) {
        // Checking for empty fields
        if (
            ($_REQUEST['lesson_name'] == "") ||
            ($_REQUEST['lesson_desc'] == "") ||
            ($_REQUEST['course_id'] == "") ||
            ($_REQUEST['course_name'] == "")
        ) {
            $msg = '<div class="alert alert-warning col-sm-6 ms-5 mt-2">Fill all Fields</div>';
        } else {
            $lesson_name = $_REQUEST['lesson_name'];
            $lesson_desc = $_REQUEST['lesson_desc'];

            $lesson_link = $_FILES['lesson_link']['name'];
            $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
            $link_folder = 'video/lessonvideo/' . $lesson_link;
            move_uploaded_file($lesson_link_temp, $link_folder);

            $sql = "INSERT INTO lesson(lesson_name, lesson_desc, lessson_link, course_id, course_name) VALUES
                    ('$lesson_name','$lesson_desc','$lesson_link','$course_id','$course_name') ";
            if ($conn->query($sql) === TRUE) {
                $msg = '<div class="alert alert-success col-sm-6 ms-5 mt-2">Lesson Added Successfully</div>';
            } else {
                $msg = '<div class="alert alert-danger col-sm-6 ms-5 mt-2">Unable to add lesson !</div>';
            }
        }
    }
} else {
    // Handle the case where course_id and course_name are not set in the session
    $msg = '<div class="alert alert-warning col-sm-6 ms-5 mt-2">Course information is missing. Please select a course first.</div>';
}
?>

<!-- Form to add New Lesson -->
<div class="col-sm-6 mt-5 mx-3 px-5 pb-5 pt-3" style="background-color: #F7F4EF;">
    <h3 class="text-center">Add New Lesson</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input readonly type="text" class="form-control" name="course_id" id="course_id"
                value="<?php echo $course_id; ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input readonly type="text" class="form-control" name="course_name" id="course_name"
                value="<?php echo $course_name; ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" name="lesson_name" id="lesson_name">
        </div>
        <br>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea class="form-control" name="lesson_desc" id="lesson_desc" rows="2" row="2"></textarea>
        </div>
        <br>

        <div class="form-group">
            <label for="lesson_link">Lesson Video Link</label>
            <input type="file" class="form-control-file" name="lesson_link" id="lesson_link">
        </div>

        <div class="text-center">
            <button type="submit" id="lessonSubmitBtn" name="lessonSubmitBtn" class="btn btn-danger">Submit</button>
            <a href="admin_lessons.php" class="btn btn-secondary">Close</a>
        </div>
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
