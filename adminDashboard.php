<?php
if (!isset($_SESSION)) {
    session_start();
}
include "adminheader.php";
if (!isset($_SESSION['is_admin_login'])) {
    echo "<script>location.href='index.php';</script>";
 }
?>
<div class="col-sm-9 mt-5">

    <!-- Cards for dispalying Data -->
    <div class="row mx-5 text-center">
        <div class="col-sm-4 mt-5">
        <?php
include "dbconnection.php";

// Assuming you have a database table named 'courses'
$query = "SELECT COUNT(*) AS course_count FROM course";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $courseData = $result->fetch_assoc();
    $courseCount = $courseData['course_count'];
} else {
    $courseCount = 0; // Default to 0 if no courses are found
}
?>

<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
    <div class="card-header">Courses</div>
    <div class="card-body">
        <h4 class="card-title"><?php echo $courseCount; ?></h4>
        <a href="adminpanel_courses.php" class="btn text-white">View</a>
    </div>
</div>

        </div>
        <div class="col-sm-4 mt-5">
        <?php

// Assuming you have a database table named 'students'
$query = "SELECT COUNT(*) AS student_count FROM student";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $studentData = $result->fetch_assoc();
    $studentCount = $studentData['student_count'];
} else {
    $studentCount = 0; // Default to 0 if no students are found
}
?>

<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
    <div class="card-header">Students</div>
    <div class="card-body">
        <h4 class="card-title"><?php echo $studentCount; ?></h4>
        <a href="admin_students.php" class="btn text-white">View</a>
    </div>
</div>

        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">Sold</div>
                <div class="card-body">
                    <h4 class="card-title">3</h4>
                    <a href="" class="btn text-white">View</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Layout -->
    <div class="mx-5 mt-5 text-center">
        <p class="bg-dark text-white p-2">
            Course Ordered
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Course ID</th>
                    <th scope="col">Student Email</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">22</th>
                    <td>100</td>
                    <td>hassan@gmail.com</td>
                    <td>20/10/2023</td>
                    <td>2000</td>
                    <td><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
<?php
include "adminfooter.php";
?>