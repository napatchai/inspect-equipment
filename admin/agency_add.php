<?php 
    include('../condb.php');
    $agency_id = mysqli_real_escape_string($conn, $_POST['agency_id']);
    $agency_name = mysqli_real_escape_string($conn, $_POST['agency_name']);

    $check_id = "SELECT * FROM agency WHERE agency_id = '$agency_id'";
    $resultid = mysqli_query($conn, $check_id) or die ("ERROR : $check_id" . mysqli_error());
    $num_id = mysqli_num_rows($resultid);
    if($num_id > 0){
        echo "<script>window.top.window.showResult('0');</script>";
    }else{
        $check_name = "SELECT * FROM agency WHERE agency_name = '$agency_name'";
        $resultname = mysqli_query($conn, $check_name) or die ("ERROR : $check_name " . mysqli_error());
        $num_name = mysqli_num_rows($resultname);
        if($num_name > 0){
            echo "<script>window.top.window.showResult('1');</script>";
        }else{
            $sql = "INSERT INTO agency SET agency_id = '$agency_id', agency_name = '$agency_name'";
            $result = mysqli_query($conn, $sql) or die ("ERROR : $sql" . mysqli_error());
            if($result){
                echo "<script>window.top.window.showResult('2');</script>";
            }else{
                echo "<script>window.top.window.showResult('3');</script>";
            }
        }
    }
?>