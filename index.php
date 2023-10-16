<?php
include "header.php";
?>
<!-- Start Video Background -->
<div class="container-fluid remove-vid-margin">
  <div class="vid-parent">
    <video playsinline autoplay muted loop>
      <source src="video/banvid.mp4">
    </video>
    <div class="vid-overlay"></div>
  </div>
  <div class="vid-content">
    <h1 class="my-content">Welcome to ICP</h1>
    <small class="my-content">Learn and Implement</small>
    <br>
    <?php
      if (!isset($_SESSION['is_login'])) {
        echo '<a href="" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#sturegmodal">Get Started</a>';
      }
      else {
        echo'<a class="btn btn-danger mt-2" href="student_profile.php">My Profile</a>';
      }
      ?>
  </div>
</div>
<!-- End Video Background -->


<!-- Start Text Banner -->
<div class="container-fluid bg-danger txt-banner">
  <div class="row bottom-banner">
    <div class="col-sm">
      <h5><i class="fas fa-book-open me-3"></i>100+ online Courses</h5>
    </div>
    <div class="col-sm">
      <h5><i class="fas fa-users me-3"></i>Expert Instructors</h5>
    </div>
    <div class="col-sm">
      <h5><i class="fas fa-keyboard me-3"></i>Lifetime Access</h5>
    </div>
    <div class="col-sm">
      <h5><i class="fas fa-dollar-sign me-3"></i>Money-Back Guarnatee*</h5>
    </div>
  </div>
</div>
<!-- End Text Banner -->


<!-- Start Most Popular Courses -->
<?php
include "popularcourses.php";
?>
<!-- End Most Popular Courses -->

<!-- Start Contact Us -->
<?php
include "contact.php";
?>
<!-- End Contact Us -->

<!--Testimonial Corousel Starts here  --><!-- Start Social Follow -->
<?php
include "feedback.php";
?>
<!-- End Social Follow --><!-- Testimonial Corousel Ends here -->

<!--Start Modals  -->
<?php
include "modals.php";
?>
<!--End Modals  -->

<!-- Footer Starts Here -->
<?php
include "footer.php";
?>
<!-- Footer Ends Here -->