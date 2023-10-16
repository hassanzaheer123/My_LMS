<?php
include "dbconnection.php";

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['is_login'])) {
    $stuLogEmail = $_SESSION['stuLogemail'];
} else {
    echo "<script>location.href='index.php';</script>";
}

if (isset($stuLogEmail)) {
    $sql = "SELECT stu_img FROM student WHERE stu_email='$stuLogEmail'";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $stu_img = $row['stu_img'];
    } else {
        echo "Query failed: " . $conn->error;
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Font Ubuntu -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Ubuntu:wght@700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!-- top Navbar -->
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow" style="background-color: #225470;">
        <a href="index.php" class="navbar-brand col-sm-3 col-md-2 me-0">E - learning</a>
    </nav>
