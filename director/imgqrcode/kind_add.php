<?php 
    include('../condb.php');
    $kind_id = mysqli_real_escape_string($conn, $_POST['kind_id']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $kind_name = mysqli_real_escape_string($conn, $_POST['kind_name']);


    $check_id = "SELECT * FROM kind WHERE kind_id = '$kind_id' AND category_id = '$category_id'";
    $resultid = mysqli_query($conn, $check_id) or die ("ERROR : $check_id" . mysqli_error());
    $num_id = mysqli_num_rows($resultid);

    if($num_id > 0){
        echo "<script>window.top.window.showResult('0');</script>";
    }else{
        $check_name = "SELECT * FROM kind WHERE kind_name = '$kind_name'";
        $resultname = mysqli_query($conn, $check_name) or die ("ERROR : $check_name " . mysqli_error());
        $num_name = mysqli_num_rows($resultname);
        if($num_name > 0){
            echo "<script>window.top.window.showResult('1');</script>";
        }else{
            $sql = "INSERT INTO kind SET category_id = '$category_id', kind_name = '$kind_name', kind_id = '$kind_id'";
            $result = mysqli_query($conn, $sql) or die ("ERROR : $sql" . mysqli_error());
            if($result){
                echo "<script>window.top.window.showResult('2');</script>";
            }else{
                echo "<script>window.top.window.showResult('3');</script>";
            }
        }
    }
?>