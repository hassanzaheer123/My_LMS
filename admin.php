<?php
if (!isset($_SESSION)) {
   session_start();
}
include "dbconnection.php";


//Admin Login Verification
if (!isset($_SESSION['is_admin_login'])) {

   if (
      isset($_POST['checkLogemail']) && isset($_POST['adminLogemail'])
      && isset($_POST['adminLogpass'])
   ) {

      $adminLogemail = $_POST['adminLogemail'];
      $adminLogpass = $_POST['adminLogpass'];

      $sql = "SELECT admin_email,admin_pass FROM admin WHERE admin_email='" . $adminLogemail . "' AND admin_pass='" . $adminLogpass . "'";

      $result = $conn->query($sql);

      $row = $result->num_rows;

      if ($row == 1) {
         $_SESSION['is_admin_login'] = true;
         $_SESSION['adminLogemail'] = $adminLogemail;
         echo json_encode($row);

      } elseif ($row == 0) {
         echo json_encode($row);
      }
   }
   elseif (
      !isset($_POST['checkLogemail']) && !isset($_POST['adminLogemail'])
      && !isset($_POST['adminLogpass'])
   ) {
      echo "<script>location.href='index.php';</script>";
   }
}
else {
   echo "<script>location.href='adminDashboard.php';</script>";
}



?>