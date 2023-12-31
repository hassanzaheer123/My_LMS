<?php
if (!isset($_SESSION)) {
    session_start();
}
include "adminheader.php";
include "dbconnection.php";
if (!isset($_SESSION['is_admin_login'])) {
    echo "<script>location.href='index.php';</script>";
}
?>
<div class="col-sm-9 mt-5 mx-3">
    <form action="" class="mt-3 ms-5" style="display: flex; ">
        <div class="form-group me-3" style="display: flex; justify-content: center;">
            <label class="me-3" for="checkid">Enter Course ID:</label>
            <input type="text" class="form-control mx-2" name="checkid" id="checkid">
        </div>
        <button type="submit" class="btn btn-danger mx-2">Search</button>
    </form>
    <?php
    $sql="SELECT course_id FROM course";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
        if (isset($_REQUEST['checkid']) && $_REQUEST['checkid']==$row['course_id']) {
            $sql="SELECT * FROM course WHERE course_id={$_REQUEST['checkid']}";
            $result=$conn->query($sql);
            $row=$result->fetch_assoc();
            if ($row['course_id']==$_REQUEST['checkid']) {
                $_SESSION['course_id']=$row['course_id'];
                $_SESSION['course_name']=$row['course_name'];
                ?>
                <h5 class="bg-dark  text-white mt-5 p-2 ps-5">Course ID : <?php
                if (isset($row['course_id'])) {
                    echo $row['course_id'];
                }
                ?>
                Course Name : <?php
                if (isset($row['course_name'])) {
                    echo $row['course_name'];
                }
                ?></h5> <!-- Add the missing PHP tag here -->
                <?php
                $sql=" SELECT * FROM lesson WHERE course_id={$_REQUEST['checkid']}";
                $result=$conn->query($sql);
                
                echo'
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Lesson Id</th>
                            <th scope="col">Lesson Name</th>
                            <th scope="col">Lesson Link</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                    while ($row=$result->fetch_assoc()) {
                        echo'<tr>';
                        echo '<th scope="row">'.$row["lesson_id"].'</th>';
                        echo '<td scope="row">'.$row["lesson_name"].'</td>';
                        echo '<td scope="row">'.$row["lessson_link"].'</td>';
                        echo'<td>
                        <form action="admin_editlesson.php" method="POST"
                        class="d-inline">
                        <input type="hidden" name="id" value="'.$row["lesson_id"].'">
                        <button type="submit" class="btn btn-info me-3" name="view"
                        ><i class="fas fa-pen"></i></button>
                        </form>
                        <form action="" method="POST"
                        class="d-inline">
                        <input type="hidden" name="id" value="'.$row["lesson_id"].'">
                        <button type="submit" class="btn btn-secondary me-3"
                        name="delete" value="delete"
                        ><i class="far fa-trash-alt"></i></button>
                        </form>
                        </td>
                        </tr>
                        ';
                    }
                    echo'</tbody>
                    </table>';
                   
            }
            else {
                echo '<div class="alert alert-dark mt-4" role="alert">Course not Found !</div>';
            }
            if (isset($_REQUEST['delete'])) {
                $sql_select = "SELECT lessson_link FROM lesson WHERE lesson_id={$_REQUEST['id']}";
                $result_select = $conn->query($sql_select);
            
                if ($result_select->num_rows == 1) {
                    $row_select = $result_select->fetch_assoc();
                    $filename = $row_select['lessson_link'];
            
                    // Delete the file from the server
                    $file_path = 'video/lessonvideo/' . $filename;
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
            
                    $sql = "DELETE FROM lesson WHERE lesson_id={$_REQUEST['id']}";
                    if ($conn->query($sql) == TRUE) {
                        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                    } else {
                        echo "Unable to delete Data";
                    }
                }
            }
            
        }

    }
    ?>
</div>
<?php
if (isset($_SESSION['course_id'])
) {
    echo'<div>
    <a href="admin_addLesson.php" class="btn btn-danger box">
        <i class="fas fa-plus fa-2x"></i>
    </a>
</div>';
}
?>

<?php
include "adminfooter.php";
?>
