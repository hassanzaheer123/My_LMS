<?php
include "dbconnection.php";

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['is_login'])) {
    $stuLogEmail = $_SESSION['stuLogemail'];
} else {
    echo "<script>location.href='student_login_or_signup.php';</script>";
}

// Check if course_id is provided
if (isset($_POST['course_id'])) {
    $courseID = $_POST['course_id'];

    // Fetch course details from the database
    $query = "SELECT course_name, course_desc, course_duration, course_price, course_original_price FROM course WHERE course_id = $courseID";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $course = $result->fetch_assoc();
        $courseName = $course['course_name'];
        $courseDescription = $course['course_desc'];
        $courseDuration = $course['course_duration'];
        $coursePrice = $course['course_price'];
        $courseOriginalPrice = $course['course_original_price'];
    } else {
        echo "Course not found.";
    }
} else {
    echo "Course ID not provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .course-details {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .course-details h1 {
            font-size: 24px;
        }
        .course-details p {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="course-details">
            <h1><?php echo $courseName; ?></h1>
            <p><strong>Course Description:</strong> <?php echo $courseDescription; ?></p>
            <p><strong>Duration:</strong> <?php echo $courseDuration; ?></p>
            <p><strong>Price:</strong> ₨ <?php echo $coursePrice; ?> <?php if ($courseOriginalPrice > 0) echo "<del>₨ $courseOriginalPrice</del>"; ?></p>

            <!-- Add your payment form and processing logic here -->
        </div>
    </div>
</body>
</html>
