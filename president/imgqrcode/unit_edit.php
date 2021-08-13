<?php 
    include('../condb.php');
    echo "<per>";
    print_r($_POST);
    echo "</per>";
    $unit_name = mysqli_real_escape_string($conn, $_POST['unit_name']);
    $unit_id = mysqli_real_escape_string($conn, $_POST['unit_id']);

    $checkname = "SELECT * FROM unit WHERE unit_name = '$unit_name'";
    $resultcheck = mysqli_query($conn, $checkname) or die ("ERROR : " . mysqli_error());
    $num = mysqli_num_rows($resultcheck);
    if($num > 0){
        echo "<script>window.top.window.showResult('0');</script>";
    }else{
        $sql = "UPDATE unit SET unit_name = '$unit_name' WHERE unit_id = '$unit_id'";
        $result = mysqli_query($conn, $sql) or die ("ERROR : " . mysqli_error());
        if($result){
            echo "<script>window.top.window.showResult('3');</script>";
        }else{
            echo "<script>window.top.window.showResult('2');</script>";
        }
    }
?>