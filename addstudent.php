<?php
if (!isset($_SESSION)) {
   session_start();
}
$_SESSION['is_admin_login']=false;
include "dbconnection.php";

// Check If Email Already Exists
if (isset($_POST['checkemail']) && isset($_POST['stuemail'])) {
   $stuemail = $_POST['stuemail'];
   $sql = "SELECT stu_email FROM `student` WHERE stu_email = '" . $stuemail . "'";
   $result = $conn->query($sql);
   $row = $result->num_rows;
   echo json_encode($row);
}


// Insert Student
if (
   isset($_POST['stusignup']) && isset($_POST['stuname'])
   && isset($_POST['stuemail']) && isset($_POST['stupass'])) {

   $stuname = $_POST['stuname'];
   $stuemail = $_POST['stuemail'];
   $stupass = $_POST['stupass'];


   $sql = "INSERT INTO `student` (`stu_name`, `stu_email`, `stu_pass`) VALUES ('" . $stuname . "', '" . $stuemail . "', '" . $stupass . "')";

   // $result= mysqli_query($conn,$sql);

   if ($conn->query($sql) == TRUE) {
      echo json_encode("OK");
   } else {
      echo json_encode("FAILED");
   }
}


//Student Login Verification
if (!isset($_SESSION['is_login'])) {

   if (
      isset($_POST['checkLogemail']) && isset($_POST['stuLogemail'])
      && isset($_POST['stuLogpass'])
   ) {

      $stuLogemail = $_POST['stuLogemail'];
      $stuLogpass = $_POST['stuLogpass'];

      $sql = "SELECT stu_email,stu_pass FROM student WHERE stu_email='" . $stuLogemail . "' AND stu_pass='" . $stuLogpass . "'";

      $result = $conn->query($sql);

      $row = $result->num_rows;

      if ($row == 1) {
         $_SESSION['is_login'] = true;
         $_SESSION['stuLogemail'] = $stuLogemail;
         echo json_encode($row);

      } elseif ($row == 0) {
         echo json_encode($row);
      }
   }
}




?>