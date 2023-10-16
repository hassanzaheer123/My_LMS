<?php
include "dbconnection.php";
include "header.php";


?>

<div class="container-fluid bg-dark">
    <div class="row">
        <img src="image/coursesbanner.webp" alt="courses" style="height: 300px;
        width:100%; object-fit: cover; box-shadow: 10px;">
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col-md-4 my-5">
            <h1 class="modal-title fs-5 my-3" id="stusigninModalLabel">If Already Registered !! Login
            </h1>
            <!-- Student Sign In Form Start-->
            <form action="" id="stu_login_form">

                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <label for="stuLogemail" class="ps-2 font-weight-bold">Email</label>
                    <input type="email" name="stuLogemail" class="form-control" placeholder="Name" id="stuLogemail">
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <label for="stuLogpass" class="ps-2 font-weight-bold">Password</label>
                    <input type="password" name="stuLogpass" class="form-control" placeholder="Password" id="stuLogpass">
                </div>
            </form>


            <small id="statusLogMsg"></small>
            <button onclick="checkStuLogin()" type="submit" class="btn mt-2 btn-danger" id="stuLoginBtn" name="stuLoginBtn">Log In</button>
            <button type="button" onclick="clearStuLoginField() " class="btn mt-2 btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <!-- Student Sign In Form End-->


        </div>

        <div class="col-md-6 offset-md-1 my-5">
            <h1 class="modal-title fs-5 my-3" id="sturegmodalLabel">New User !! Sign Up</h1>


            <!-- Student Registration Form Start-->
            <form action="" id="stu_reg_form">
                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <label for="stuname" class="ps-2 font-weight-bold">Name</label>
                    <small id="statusMsg1"></small>
                    <input type="text" name="stuname" class="form-control" placeholder="Name" id="stuname">
                </div>
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <label for="stuemail" class="ps-2 font-weight-bold">Email</label>
                    <small id="statusMsg2"></small>
                    <input type="email" name="stuemail" class="form-control" placeholder="Email" id="stuemail">
                    <small class="form-text">We will never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <label for="stupass" class="ps-2 font-weight-bold">Password</label>
                    <small id="statusMsg3"></small>
                    <input type="password" name="stupass" class="form-control" placeholder="Password" id="stupass">
                </div>
            </form>
            <!-- Student Registration Form End-->
            <span id="successMsg"></span>
            <button onclick="addStu()" id="stusignupbtn" type="button" class="btn my-2 btn-danger">Sign Up</button>
            <button type="button" onclick="clearStuRegField()" class="btn my-2 btn-secondary" data-bs-dismiss="modal">Close</button>



        </div>
    </div>
</div>







<?php
include "footer.php";
?>