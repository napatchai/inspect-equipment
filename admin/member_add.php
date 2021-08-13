<?php
    include('../condb.php');
    include('../header.php');
    $per_username = mysqli_real_escape_string($conn, $_POST['username']);
    $per_password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $per_conpassword = mysqli_real_escape_string($conn, md5($_POST['conpassword']));
    $per_level = mysqli_real_escape_string($conn, $_POST['level']);
    $per_Fname = mysqli_real_escape_string($conn, $_POST['Fname']);
    $per_Lname = mysqli_real_escape_string($conn, $_POST['Lname']);

    $text_per_id = substr($per_username , 0,2);
    $date = date("ymd");
    $time = date("hms");

    $per_id = $text_per_id . $date . $time;
    
    $check = "SELECT per_username FROM personnel WHERE per_username = '$per_username'";
    $result1 = mysqli_query($conn, $check) or die ("ERROR : " . mysqli_error());
    $num=mysqli_num_rows($result1);
    if($per_password != $per_conpassword){ 
        echo "<script>window.top.window.showResult('0');</script>";
     } 
    elseif($num > 0){ 
        echo "<script>window.top.window.showResult('1');</script>";
    }
    else{
        if($per_level == 'p'){
            $status = "UPDATE personnel SET per_level = 'd' WHERE per_level != 'a'";
            $resultstatus = mysqli_query($conn, $status) or die ("ERROR : $status" . mysqli_error());
        }
        $sql = "INSERT INTO personnel (per_id, per_username, per_password, per_firstname, per_lastname, per_level) VALUE ('$per_id', '$per_username', '$per_password', '$per_Fname', '$per_Lname', '$per_level')";
        $result = mysqli_query($conn, $sql) or die ("ERROR in Query : $sql " . mysqli_error());
    }
    if($result){ 
        echo "<script>window.top.window.showResult('2');</script>";
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
?>