<?php 
    include('../condb.php');
    $money_id = mysqli_real_escape_string($conn, $_POST['money_id']);
    $money_name = mysqli_real_escape_string($conn, $_POST['money_name']);

    $check_id = "SELECT * FROM money WHERE money_id = '$money_id'";
    $resultid = mysqli_query($conn, $check_id) or die ("ERROR : $check_id" . mysqli_error());
    $num_id = mysqli_num_rows($resultid);
    if($num_id > 0){
        echo "<script>window.top.window.showResult('0');</script>";
    }else{
        $check_name = "SELECT * FROM money WHERE money_name = '$money_name'";
        $resultname = mysqli_query($conn, $check_name) or die ("ERROR : $check_name " . mysqli_error());
        $num_name = mysqli_num_rows($resultname);
        if($num_name > 0){
            echo "<script>window.top.window.showResult('1');</script>";
        }else{
            $sql = "INSERT INTO money SET money_id = '$money_id', money_name = '$money_name'";
            $result = mysqli_query($conn, $sql) or die ("ERROR : $sql" . mysqli_error());
            if($result){
                echo "<script>window.top.window.showResult('2');</script>";
            }else{
                echo "<script>window.top.window.showResult('3');</script>";
            }
        }
    }
?>