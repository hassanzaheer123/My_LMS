<?php
if (!isset($_SESSION)) {
    session_start();
}
include "adminheader.php";
include "dbconnection.php";
if (!isset($_SESSION['is_admin_login'])) {
    echo "<script>location.href='index.php';</script>";
 }
 else {
     $adminEmail=$_SESSION['adminLogemail'];
 }

// Update Course
if (isset($_REQUEST['requpdate'])) {
   
   // Checking for empty fields
   if(($_REQUEST['course_name']=="")||($_REQUEST['course_desc']=="")|| 
   ($_REQUEST['course_author']=="")|| ($_REQUEST['course_duration']=="")|| 
   ($_REQUEST['course_original_price']=="")|| ($_REQUEST['course_price']=="") ){
       $msg='<div class="alert alert-warning col-sm-6 ms-5 mt-2">Fill all Fields</div>';}
       else {
        $course_id=$_REQUEST['course_id'];
        $course_name=$_REQUEST['course_name'];
        $course_desc=$_REQUEST['course_desc'];
        $course_author=$_REQUEST['course_author'];
        $course_duration=$_REQUEST['course_duration'];
        $course_original_price=$_REQUEST['course_original_price'];
        $course_price=$_REQUEST['course_price'];
        $course_img=$_FILES['course_img']['name'];
        $course_img_temp=$_FILES['course_img']['tmp_name'];
        $img_folder='image/courseimg/'.$course_img;
        // Move new file to server
        move_uploaded_file($course_img_temp,$img_folder);
        $oldimgaddress=$_REQUEST['oldimgaddress'];
        // Delete the previous file from the server
        $file_path = 'image/courseimg/' . $oldimgaddress;
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        
       

        $sql="UPDATE course SET course_id='$course_id',course_name='$course_name',course_desc='$course_desc',
        course_author='$course_author',course_duration='$course_duration',course_original_price='$course_original_price',
        course_price='$course_price',course_img='$course_img' WHERE course_id='$course_id'";
        if ($conn->query($sql)==TRUE) {
            $msg='<div class="alert alert-success col-sm-6 ms-5 mt-2">Course Updated Successfully</div>';

        }
        else {
            $msg='<div class="alert alert-danger col-sm-6 ms-5 mt-2">Unable to update course !</div>';

        }
    }
}

?>

<!-- Form to Update Course -->
<div class="col-sm-6 mt-5 mx-3 px-5 pb-5 pt-3" style="background-color: #F7F4EF;">
    <h3 class="text-center">Update Course Details</h3>
    <?php
    if (isset($_REQUEST['view'])) {
        $sql="SELECT * FROM course WHERE course_id={$_REQUEST['id']}";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
    }

    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" value="<?php if(isset($row['course_id'])) {echo $row['course_id'];}?>"
             class="form-control" name="course_id" id="course_id" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" value="<?php if(isset($row['course_name'])) {echo $row['course_name'];}?>"
             class="form-control" name="course_name" id="course_name">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea class="form-control" name="course_desc" id="course_desc" rows="2" row="2"><?php
             if(isset($row['course_desc'])) {echo $row['course_desc'];}?></textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" value="<?php if(isset($row['course_author'])) {echo $row['course_author'];}?>"
             class="form-control" name="course_author" id="course_author">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" value="<?php if(isset($row['course_duration'])) {echo $row['course_duration'];}?>"
             class="form-control" name="course_duration" id="course_duration">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="text" value="<?php if(isset($row['course_original_price'])) {echo $row['course_original_price'];}?>" 
             class="form-control" name="course_original_price" id="course_original_price">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" value="<?php if(isset($row['course_price'])) {echo $row['course_price'];}?>"
             class="form-control" name="course_price" id="course_price">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <input type="hidden" name="oldimgaddress" id="oldimgaddress" value="<?php if(isset($row['course_img']))
             {echo $row['course_img'];}?>">
            <img class="img-thumbnail" src="image/courseimg/<?php if(isset($row['course_img']))
             {echo $row['course_img'];}?>" alt="" style="width: 25vw;">
            <br>
            <input type="file" class="form-control-file" name="course_img" id="course_img">
        </div><br>
        <div class="text-center">
            <button type="submit" id="requpdate" name="requpdate" class="btn btn-danger">Update</button>
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