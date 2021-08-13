<?php 
    include('../condb.php');
    print_r($_POST);
    $des_id = mysqli_real_escape_string($conn, $_POST['des_id1']);
    $des_id1 = mysqli_real_escape_string($conn, $_POST['des_id1']);
    $category_id1 = mysqli_real_escape_string($conn, $_POST['category_id1']);
    $kind_id = mysqli_real_escape_string($conn, $_POST['kind_id']);
    $des_name = mysqli_real_escape_string($conn, $_POST['des_name']);
    $des_name1 = mysqli_real_escape_string($conn, $_POST['des_name1']);
    

    $checkid = "SELECT * FROM description WHERE des_id = '$des_id' AND category_id = '$category_id1' AND kind_id = '$kind_id'";
    $resultid = mysqli_query($conn, $checkid) or die ("ERROR : $checkid " . mysqli_error());
    $num_id = mysqli_num_rows($resultid);
    $checkname = "SELECT * FROM description WHERE des_name = '$des_name'";
    $resultname = mysqli_query($conn, $checkname) or die ("ERROR : $checkname " . mysqli_error());
    $num_name = mysqli_num_rows($resultname);
    if($num_id > 0){
        $check = 0;
        if($des_id == $des_id1 && $num_name == 0){
            $check = 1;
        }elseif($des_id == $des_id1 && $num_name >= 1 && $des_name == $des_name1){
            $check = 1;
        }elseif($des_id == $des_id1 && $num_name >= 1){
            echo "<script>window.top.window.showResult('1');</script>";
        }else{
            echo "<script>window.top.window.showResult('0');</script>";
        }
    }else{
        if($num_name > 0){
            if($des_name == $des_name1){
                $check = 1;
            }else{
                echo "<script>window.top.window.showResult('1');</script>";
            }
        }else{
            $check = 1;
        }
    }
    if($check == 1){
        $sql1 = "UPDATE description SET des_id = '$des_id', category_id = '$category_id1' , kind_id = '$kind_id' , des_name = '$des_name' WHERE des_id = '$des_id1' AND category_id = '$category_id1' AND kind_id = '$kind_id'";
        $result1 = mysqli_query($conn, $sql1);
        if($result1){
            echo "<script>window.top.window.showResult('4');</script>";
        }else{
            echo "<script>window.top.window.showResult('3');</script>";
        }
    }
?>