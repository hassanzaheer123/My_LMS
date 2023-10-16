<?php
include "adminheader.php";
include "dbconnection.php";

?>
<div class="col-sm-9 mt-5">
    <p class="bg-dark text-white p-2 ps-5">List of Feedbacks</p>
    <?php
    $sql="SELECT * FROM feedback";
    $result=$conn->query($sql);
    if ($result->num_rows>0) {
        echo'<table class="table">
        <thead>
            <tr>
                <th scope="col">Feedback</th>
                <th scope="col">Content ID</th>
                <th scope="col">Student ID</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>';
        while ($row=$result->fetch_assoc()) {
            echo '<tr>
            <th scope="row">'.$row["f_id"].'</th>
            <td>'.$row["f_content"].'</td>
            <td>'.$row["stu_id"].'</td>
            <td>
                <form action="" method="post" class="d-inline">
                    <input type="hidden" name="id" id="" value="'.$row["f_id"].'">
                    <button type="submit" class="btn btn-secondary" name="delete" value="delete">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </form>
            </td>
        </tr>';
        }
        echo '</tbody>
        </table>';
    }
    else {
        echo 'Zero Result';
    }
    if (isset($_REQUEST['delete'])) {
       $sql="DELETE FROM feedback WHERE f_id ={$_REQUEST['id']}";
       if ($conn->query($sql)==TRUE) {
        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
       }else {
        echo "Unable to Delete Data";
    }
    } 
    


    ?>
</div>

<?php
include "adminfooter.php";

?>