<?php
    include('../condb.php');
    include('../header.php');
    $old_password = mysqli_real_escape_string($conn, $_POST['old_password']);
    $per_id = mysqli_real_escape_string($conn, md5($_POST['per_id']));
    $old_pass = mysqli_real_escape_string($conn, md5($_POST['old_pass']));
    $new_password = mysqli_real_escape_string($conn, md5($_POST['new_password']));
    $con_password = mysqli_real_escape_string($conn, md5($_POST['con_password']));
    // echo "<script>window.top.window.showResult('0');</script>";

    $sql = "SELECT * FROM personnel WHERE per_password = '$old_pass'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    
    if($new_password != $con_password){ 
        echo "<script>window.top.window.showResult('8');</script>";
    }elseif($num >0){
        echo "<script>window.top.window.showResult('9');</script>";
    }
      else{
            $status = "UPDATE personnel SET per_password = '$new_password' WHERE per_id != '$per_id'";
            $resultstatus = mysqli_query($conn, $status) or die ("ERROR : $status" . mysqli_error());
            if($resultstatus){ 
                echo "<script>window.top.window.showResult('7');</script>";
            //     <script>
            //         setTimeout(function() {
            //     swal({
            //         title: "Personnel add Success",
            //         type: "success"
            //     }, function() {
            //         window.location = "./memberlist.php";
            //     });
            // }, 1000);
            //     </script>
            }
    }

?>