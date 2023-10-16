<?php
include "header.php";
?>

<!-- Start Course Page Banner -->
<div class="container-fluid remove-vid-margin">
    <div class="vid-parent">
        <img src="image/coursesbanner.webp" style="height: 500px;
        width: 100%;" id="courses" alt="Courses">
        <div class="vid-overlay"></div>
    </div>
    <div class="vid-content">
    </div>
</div>
<!-- End Course Page Banner -->


<?php
include "popularcourses.php";
include "modals.php";
include "footer.php";
?>