<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap Css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- font awesome Css -->
  <link rel="stylesheet" href="css/all.min.css">

  <link rel="stylesheet" href="css/style.css">
  <title>iSchool</title>
</head>

<body>
  <!-- Start Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg border-body ps-lg-5" data-bs-theme="dark">
    <div class="container-fluid">

      <a class="navbar-brand" href="index.php">ICP <span class="navbar-text">Learn and Implement</span></a>



      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav custom-nav ps-5">
          <li class="nav-item custom-nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item custom-nav-item"><a class="nav-link" href="courses.php">Courses</a></li>
          <li class="nav-item custom-nav-item"><a class="nav-link" href="paymentstatus.php">Payment Status</a></li>
          <?php
          if (!isset($_SESSION)) {
            session_start();
         }
          if (isset($_SESSION['is_login'])) {
            echo ' <li class="nav-item custom-nav-item"><a class="nav-link" href="student_profile.php">My Profile</a></li>
              <li class="nav-item custom-nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
          } else {
            echo '
              <li class="nav-item custom-nav-item" data-bs-toggle="modal" data-bs-target="#stusigninModal"><a class="nav-link" href="#">Login</a></li>
              <li class="nav-item custom-nav-item" data-bs-toggle="modal" data-bs-target="#sturegmodal"><a class="nav-link" href="#">Signup</a></li>
              ';
          }
          ?>

          <li class="nav-item custom-nav-item"><a class="nav-link" href="student_feedback.php">Feedback</a></li>
          <li class="nav-item custom-nav-item"><a class="nav-link" href="#Contact">Contact</a></li>




        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navigation -->