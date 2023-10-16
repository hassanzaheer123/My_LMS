<!-- SignUp Modal Starts here -->
<div class="modal fade" data-bs-backdrop="static" id="sturegmodal" tabindex="-1" aria-labelledby="sturegmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="sturegmodalLabel">Registration Form</h1>
        <button type="button" onclick="clearStuRegField()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Student Registration Form Start-->
        <form action="" id="stu_reg_form">
          <div class="form-group">
            <i class="fas fa-user"></i>
            <label for="stuname" class="ps-2 font-weight-bold">Name</label>
            <small id="statusMsg1" ></small>
            <input type="text" name="stuname" class="form-control" placeholder="Name" id="stuname">
          </div>
          <div class="form-group">
            <i class="fas fa-envelope"></i>
            <label for="stuemail" class="ps-2 font-weight-bold">Email</label>
            <small id="statusMsg2" ></small>
            <input type="email" name="stuemail" class="form-control" placeholder="Email" id="stuemail">
            <small class="form-text">We will never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <i class="fas fa-key"></i>
            <label for="stupass" class="ps-2 font-weight-bold">Password</label>
            <small id="statusMsg3" ></small>
            <input type="password" name="stupass" class="form-control" placeholder="Password" id="stupass">
          </div>
        </form>
        <!-- Student Registration Form End-->

      </div>
      <div class="modal-footer">
        <span id="successMsg"></span>
        <button onclick="addStu()" id="stusignupbtn" type="button" class="btn btn-danger">Sign Up</button>
        <button type="button" onclick="clearStuRegField()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- SignUp Modal Ends here -->


<!--Student Sign In Modal Starts here  -->
<div class="modal fade" data-bs-backdrop="static"  id="stusigninModal" tabindex="-1" aria-labelledby="stusigninModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="stusigninModalLabel">Student Login In Form<Form></Form>
        </h1>
        <button type="button" onclick="clearStuLoginField() " class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
        <!-- Student Sign In Form End-->

      </div>
      <div class="modal-footer">
        <small id="statusLogMsg"></small>
        <button onclick="checkStuLogin()" type="submit" class="btn btn-danger" id="stuLoginBtn" name="stuLoginBtn">Log In</button>
        <button type="button" onclick="clearStuLoginField() " class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!--Student Sign In Modal Ends here  -->


<!--Admin Sign In Modal Starts here  -->
<div class="modal fade" data-bs-backdrop="static" id="adminsigninModal" tabindex="-1" aria-labelledby="adminsigninModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="adminsigninModalLabel">Admin Login In Form<Form></Form>
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Admin Sign In Form Start-->
        <form action="" id="admin_login_form">

          <div class="form-group">
            <i class="fas fa-envelope"></i>
            <label for="adminLogemail" class="ps-2 font-weight-bold">Email</label>
            <input type="email" name="adminLogemail" class="form-control" placeholder="Name" id="adminLogemail">
          </div>
          <div class="form-group">
            <i class="fas fa-key"></i>
            <label for="adminLogpass" class="ps-2 font-weight-bold">Password</label>
            <input type="password" name="adminLogpass" class="form-control" placeholder="Password" id="adminLogpass">
          </div>
        </form>
        <!-- Admin Sign In Form End-->

      </div>
      <div class="modal-footer">
        <small id="statusAdminLogMsg"></small>
        <button type="submit" onclick="checkAdminLogin()" class="btn btn-danger" id="adminLoginBtn" name="adminLoginBtn">Log In</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!--Admin Sign In Modal Ends here  -->