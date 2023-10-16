<?php
include "header.php";
include "dbconnection.php";

// Ensure you have a valid course ID passed in the URL
if (isset($_GET['course_id']) && !empty($_GET['course_id'])) {
    $courseID = $_GET['course_id'];

    // Fetch course details
    $sql = "SELECT * FROM course WHERE course_id = $courseID"; // Replace with your table name
    $courseResult = $conn->query($sql);

    if ($courseResult && $courseResult->num_rows > 0) {
        $course = $courseResult->fetch_assoc();
        $courseName = $course['course_name'];
        $courseID = $course['course_id'];
        $description = $course['course_desc'];
        $duration = $course['course_duration'];
        $price = $course['course_price'];
        $originalPrice = $course['course_original_price'];
    }
    else {
        // Handle case where the course is not found
        echo "Course not found.";
    }

    // Fetch lessons related to the course
    $sql = "SELECT * FROM lesson WHERE course_id = $courseID"; // Replace with your table name
    $lessonResult = $conn->query($sql);

    if ($lessonResult && $lessonResult->num_rows > 0) {
        // Lessons found
    }
    else {
        // Handle case where there are no lessons for this course
    }
}
else {
    // Handle case where no course ID is provided in the URL
    echo "Course ID not provided.";
}
?>


<div class="container-fluid remove-vid-margin">
    <div class="vid-parent">
        <!-- Use the actual image path from the database or a placeholder -->
        <img src="image/coursedetails.jpg" style="height: 500px; width: 100%;" id="courses" alt="Courses">
        <div class="vid-overlay"></div>
    </div>
    <div class="vid-content">
    </div>
</div>

<!-- Start Main Content -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-4 mt-2">
        <img src="image/courseimg/<?php echo $course['course_img']; ?>" class="card-img-top" alt="<?php echo $courseName; ?>">

        </div>
        <div class="col-md-8 mt-2">
            <div class="card-body">
                <h5 class="card-title">
                    Course Name: <?php echo $courseName; ?>
                </h5>
                <p class="card-text mt-3">
                    Description: <?php echo $description; ?>
                </p>
                <p class="card-text">
                    Duration: <?php echo $duration; ?>
                </p>
                <form action="checkout.php" method="post">
                    <p class="card-text d-inline">
                        Price: <small><del>&#8360 <?php echo $originalPrice; ?></del></small>
                        <b>&#8360 <?php echo $price; ?></b>
                    </p>
                    <br>
                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                    <input type="hidden" name="course_id" value="<?php echo $courseID; ?>">

                    
                    <button type="submit" class="btn btn-primary text-white font-weight-bolder float-right" name="buy">Buy Now</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Lesson No.</th>
                    <th scope="col">Lesson Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index=1;
                while ($lesson = $lessonResult->fetch_assoc()) {
                    
                    echo '<tr>';
                    echo '<th scope="row">' . $index . '</th>';
                    echo '<td>' . $lesson['lesson_name'] . '</td>';
                    echo '</tr>';
                    $index++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- End Main Content -->

<?php
include "modals.php";
include "footer.php";
?>
