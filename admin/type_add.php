<?php 
    include('../condb.php');
    $type_id = mysqli_real_escape_string($conn, $_POST['type_id']);
    $type_name = mysqli_real_escape_string($conn, $_POST['type_name']);
    
    $checkid = "SELECT * FROM Type WHERE type_id = '$type_id'";
    $resultid = mysqli_query($conn, $checkid) or die ("ERROR : $checkid" . mysqli_error());
    $numid = mysqli_num_rows($resultid);
    if($numid > 0 ){
        echo "<script>window.top.window.showResult('0');</script>";
    }else{
        // $checkname = "SELECT * FROM type WHERE type_name = '$type_name'";
        // $resultname = mysqli_query($conn , $checkname) or die ("ERROR : $checkname" . mysqli_error());
        // $numname = mysqli_num_rows($resultname);
        // echo $numname;
        // if($numname > 0 ){
        //     echo "<script>window.top.window.showResult('1');</script>";
        // }else{
            $sql = "INSERT INTO Type SET type_id = '$type_id', type_name = '$type_name'";
            $result = mysqli_query($conn, $sql) or die ("ERROR : $sql" . mysqli_error());
            if($result){
                echo "<script>window.top.window.showResult('2');</script>";
            }else{
                echo "<script>window.top.window.showResult('3');</script>";
            }
        // }
    }
?>