<?php
if (!isset($_SESSION)) {
    session_start();
}
include "adminheader.php";
include "dbconnection.php";
if (!isset($_SESSION['is_admin_login'])) {
    echo "<script>location.href='index.php';</script>";
 }
if (isset($_REQUEST['courseSubmitBtn'])) {
    // Checking for empty fields
    if(($_REQUEST['course_name']=="")||($_REQUEST['course_desc']=="")|| 
    ($_REQUEST['course_author']=="")|| ($_REQUEST['course_duration']=="")|| 
    ($_REQUEST['course_original_price']=="")|| ($_REQUEST['course_price']=="") ){
        $msg='<div class="alert alert-warning col-sm-6 ms-5 mt-2">Fill all Fields</div>';
    }
    else {
        $course_name=$_REQUEST['course_name'];
        $course_desc=$_REQUEST['course_desc'];
        $course_author=$_REQUEST['course_author'];
        $course_duration=$_REQUEST['course_duration'];
        $course_original_price=$_REQUEST['course_original_price'];
        $course_price=$_REQUEST['course_price'];
        $course_img=$_FILES['course_img']['name'];
        $course_img_temp=$_FILES['course_img']['tmp_name'];
        $img_folder='image/courseimg/'.$course_img;
        move_uploaded_file($course_img_temp,$img_folder);

        $sql="INSERT INTO course(course_name,course_desc,course_author,course_img,course_duration,course_price,course_original_price) VALUES
        ('$course_name','$course_desc','$course_author','$course_img','$course_duration','$course_price','$course_original_price') ";
        if ($conn->query($sql)==TRUE) {
            $msg='<div class="alert alert-success col-sm-6 ms-5 mt-2">Course Added Successfully</div>';

        }
        else {
            $msg='<div class="alert alert-danger col-sm-6 ms-5 mt-2">Unable to add course !</div>';

        }
    }
}
?>

<!-- Form to add New Course -->
<div class="col-sm-6 mt-5 mx-3 px-5 pb-5 pt-3" style="background-color: #F7F4EF;">
    <h3 class="text-center">Add New Course</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" name="course_name" id="course_name">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea class="form-control" name="course_desc" id="course_desc"
             rows="2" row="2"></textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" name="course_author" id="course_author">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" name="course_duration" id="course_duration">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="text" class="form-control" name="course_original_price" id="course_original_price">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" name="course_price" id="course_price">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <br><br>
            <input type="file" class="form-control-file" name="course_img" id="course_img">
        </div><br>
        <div class="text-center">
            <button type="submit" id="courseSubmitBtn" name="courseSubmitBtn"
             class="btn btn-danger">Submit</button>
             <a href="adminpanel_courses.php" class="btn btn-secondary">Close</a>
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