<?php
include "dbconnection.php";
?>

<style>
    .card-img-top {
        height: 200px; /* Set a fixed height for card images */
        object-fit: cover; /* Ensure images are the same size and cover the card */
    }
</style>

<?php
$sql = "SELECT * FROM course"; // Assuming there's a field 'is_popular' in your course table
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="container mt-5">';
    echo '<h1 class="text-center">Popular Courses</h1>';
    echo '<div class="card-deck mt-4 row">';

    while ($row = $result->fetch_assoc()) {
        $courseID=$row['course_id'];
        $courseName = $row['course_name'];
        $description = $row['course_desc'];
        $author = $row['course_author'];
        $imagePath = $row['course_img'];
        $duration = $row['course_duration'];
        $price = $row['course_price'];
        $originalPrice = $row['course_original_price'];

        echo '<div class="card col-sm-12 col-md-6 col-lg-4 my-3">';
        echo '<img src="image/courseimg/' . $imagePath . '" alt="" class="card-img-top">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $courseName . '</h5>';
        echo '<p class="card-text">' . $description . '</p>';
        echo '</div>';
        echo '<div class="card-footer">';
        echo '<p class="card-text d-inline">';
        echo 'Author: ' . $author . '<br>';
        echo 'Duration: ' . $duration . '<br>';
        echo 'Price: <span class="font-weight-bolder">&nbsp; &#8360 ' . $price . '</span>';
        echo '<del>&#8360 ' . $originalPrice . '</del><br>';
        echo '<a href="coursedetails.php?course_id=' . $courseID . '" class="btn btn-primary text-white font-weight-bolder enroll-section">Enroll</a>';

        echo '</p>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>';
    echo '</div>';
}
?>
