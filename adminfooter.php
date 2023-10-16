<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['is_admin_login'])) {
    echo "<script>location.href='index.php';</script>";
 }
?>
</div>
    </div>
    <!-- Jquey -->
    <script src="js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- ajax admin js -->
    <script src="adminajaxrequest.js"></script>
    <!-- Custom js -->
    <script src="js/custom.js"></script>
</body>
</html>