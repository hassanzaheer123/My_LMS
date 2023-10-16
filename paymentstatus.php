<?php
include "header.php";
?>

<!-- Start Course Page Banner -->
<div class="container-fluid remove-vid-margin">
    <div class="vid-parent">
        <img src="image/paymentstatus.webp" style="height: 500px;
        width: 100%;" id="courses" alt="Courses">
        <div class="vid-overlay"></div>
    </div>
    <div class="vid-content">
    </div>
</div>
<!-- End Course Page Banner -->

<div class="conatiner mb-5">
    <h2 class="text-center my-4">Payment Status</h2>
    <form action="" method="post">
        <div class="form-group row d-flex justify-content-center">
            <div class="col-md-1">
            <label for="" class="offset-sm-3 d-inline col-form-label d-inline">Order ID: </label>

            </div>
            <div  class="col-md-3">
            <input type="text" name="" id="" class="form-control mx-3 d-inline">

            </div>
            <div class="col-md-3">
            <button class="btn btn-primary d-inline" type="submit">View</button>

            </div>


        </div>
    </form>

</div>


<?php
include "contact.php";
include "modals.php";
include "footer.php";
?>