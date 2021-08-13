<?php 
    include('../condb.php');
    $kind_id = mysqli_real_escape_string($conn, $_POST['kind_id']);
    $kind_id1 = mysqli_real_escape_string($conn, $_POST['kind_id1']);
    $category_id1 = mysqli_real_escape_string($conn, $_POST['category_id1']);
    $kind_name = mysqli_real_escape_string($conn, $_POST['kind_name']);
    $kind_name1 = mysqli_real_escape_string($conn, $_POST['kind_name1']);
    print_r($_POST);
    $checkid = "SELECT * FROM kind WHERE kind_id = '$kind_id' AND category_id = '$category_id1'";
    $resultid = mysqli_query($conn, $checkid) or die ("ERROR : $checkid " . mysqli_error());
    $num_id = mysqli_num_rows($resultid);
    $checkname = "SELECT * FROM kind WHERE kind_name = '$kind_name'";
    $resultname = mysqli_query($conn, $checkname) or die ("ERROR : $checkname " . mysqli_error());
    $num_name = mysqli_num_rows($resultname);
    if($num_id > 0){
        $check = 0;
        if($kind_id == $kind_id1 && $num_name == 0){
            $check = 1;
        }elseif($kind_id == $kind_id1 && $num_name >= 1 && $kind_name == $kind_name1){
            $check = 1;
        }elseif($kind_id == $kind_id1 && $num_name >= 1){
            echo "<script>window.top.window.showResult('1');</script>";
        }else{
            echo "<script>window.top.window.showResult('0');</script>";
        }
    }else{
        if($num_name > 0){
            if($kind_name == $kind_name1){
                $check = 1;
            }else{
                echo "<script>window.top.window.showResult('1');</script>";
            }
        }else{
            $check = 1;
        }
    }
    if($check == 1){
        $sql1 = "UPDATE kind SET kind_id = '$kind_id', kind_name = '$kind_name' WHERE kind_id = '$kind_id1' AND category_id = '$category_id1'";
        echo $sql1;
        $result1 = mysqli_query($conn, $sql1);
        if($result1){
            echo "<script>window.top.window.showResult('4');</script>";
        }else{
            echo "<script>window.top.window.showResult('3');</script>";
        }
    }
?>