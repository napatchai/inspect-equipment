<?php 
    include('../condb.php');
    $moneyid = mysqli_real_escape_string($conn, $_POST['money_id1']);
    $moneyid1 = mysqli_real_escape_string($conn, $_POST['money_id1']);
    $moneyname = mysqli_real_escape_string($conn, $_POST['money_name']);
    $moneyname1 = mysqli_real_escape_string($conn, $_POST['money_name1']);
    
    $checkid = "SELECT * FROM money WHERE money_id = '$moneyid'";
    $resultid = mysqli_query($conn, $checkid) or die ("ERROR : $checkid " . mysqli_error());
    $num_id = mysqli_num_rows($resultid);
    $checkname = "SELECT * FROM money WHERE money_name = '$moneyname'";
    $resultname = mysqli_query($conn, $checkname) or die ("ERROR : $checkname " . mysqli_error());
    $num_name = mysqli_num_rows($resultname);
    if($num_id > 0){
        $check = 0;
        if($moneyid == $moneyid1 && $num_name == 0){
            $check = 1;
        }elseif($moneyid == $moneyid1 && $num_name >= 1 && $moneyname == $moneyname1){
            $check = 1;
        }elseif($moneyid == $moneyid1 && $num_name >= 1){
            echo "<script>window.top.window.showResult('1');</script>";
        }else{
            echo "<script>window.top.window.showResult('0');</script>";
        }
    }else{
        if($num_name > 0){
            if($moneyname == $moneyname1){
                $check = 1;
            }else{
                echo "<script>window.top.window.showResult('1');</script>";
            }
        }else{
            $check = 1;
        }
    }
    if($check == 1){
        $sql1 = "UPDATE money SET money_id = '$moneyid', money_name = '$moneyname' WHERE money_id = '$moneyid1'";
        $result1 = mysqli_query($conn, $sql1);
        if($result1){
            echo "<script>window.top.window.showResult('4');</script>";
        }else{
            echo "<script>window.top.window.showResult('3');</script>";
        }
    }
?>