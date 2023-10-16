<!--Testimonial Corousel Starts here -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php
    // Replace with your database connection code
    include "dbconnection.php";

    // Fetch feedback data from the database
    $sql = "SELECT f_content, stu_name, stu_img, stu_occ FROM feedback INNER JOIN student ON feedback.stu_id = student.stu_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $active = true; // Flag to indicate the active item
      while ($row = $result->fetch_assoc()) {
        $feedback = $row['f_content'];
        $studentName = $row['stu_name'];
        $studentImage = $row['stu_img'];
        $studentOccupation = $row['stu_occ'];

        // Display feedback in carousel
        echo '<div class="carousel-item Testimonial_items' . ($active ? ' active' : '') . '">';
        echo '<h1 class="text-center text-light my-4 feedback_head">Feedback <span class="small_text"> by ' . $studentName . ' <br>' . $studentOccupation . '</span></h1>';
        echo '<div class="containersmall border p-5 whitecolor">';
        echo '<p>' . $feedback . '</p>';
        echo '<img class="users_commenting" src="image/stu/' . $studentImage . '" alt="Student">';
        echo '</div>';
        echo '</div>';
        
        $active = false; // Set active flag to false for subsequent items
      }
    }
    ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Testimonial Corousel Ends here -->


<!-- Start Social Follow -->
<div class="container-fluid bg-danger">

  <div class="row text-white text-center p-1">
    <div class="col-sm">
      <a href="" class="text-white social-hover"><i class="fab fa-facebook-f"></i>&nbsp;Facebook</a>
    </div>
    <div class="col-sm">
      <a href="" class="text-white social-hover"><i class="fab fa-twitter"></i>&nbsp;Twitter</a>
    </div>
    <div class="col-sm">
      <a href="" class="text-white social-hover"><i class="fab fa-whatsapp"></i>&nbsp;Whatsapp</a>
    </div>
    <div class="col-sm">
      <a href="" class="text-white social-hover"><i class="fab fa-instagram"></i>&nbsp;Instagram</a>
    </div>
  </div>

</div>

<!-- End Social Follow -->