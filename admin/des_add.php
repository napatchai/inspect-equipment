<?php 
    include('../condb.php');
    $des_id = mysqli_real_escape_string($conn, $_POST['des_id']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $kind_id = mysqli_real_escape_string($conn, $_POST['kind_id']);
    $des_name = mysqli_real_escape_string($conn, $_POST['des_name']);

    $check_id = "SELECT * FROM description WHERE des_id = '$des_id' AND category_id = '$category_id' AND kind_id = '$kind_id'";
    $resultid = mysqli_query($conn, $check_id) or die ("ERROR : $check_id" . mysqli_error());
    $num_id = mysqli_num_rows($resultid);
    if($num_id > 0){
        echo "<script>window.top.window.showResult('0');</script>";
    }else{
        $check_name = "SELECT * FROM description WHERE des_name = '$des_name'";
        $resultname = mysqli_query($conn, $check_name) or die ("ERROR : $check_name " . mysqli_error());
        $num_name = mysqli_num_rows($resultname);
        if($num_name > 0){
            echo "<script>window.top.window.showResult('1');</script>";
        }else{
            $sql = "INSERT INTO description SET des_id = '$des_id', category_id = '$category_id', kind_id = '$kind_id', des_name = '$des_name'";
            $result = mysqli_query($conn, $sql) or die ("ERROR : $sql" . mysqli_error());
            if($result){
                echo "<script>window.top.window.showResult('2');</script>";
            }else{
                echo "<script>window.top.window.showResult('3');</script>";
            }
        }
    }
?>