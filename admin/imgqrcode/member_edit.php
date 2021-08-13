<?php
    include('../condb.php');
    $per_username = mysqli_real_escape_string($conn, $_POST['username']);
    $per_username1 = mysqli_real_escape_string($conn, $_POST['username1']);
    $per_level = mysqli_real_escape_string($conn, $_POST['level']);
    $per_firstname = mysqli_real_escape_string($conn, $_POST['Fname']);
    $per_lastname = mysqli_real_escape_string($conn, $_POST['Lname']);
    $per_id = mysqli_real_escape_string($conn, $_POST['per_id']);

    $check = "SELECT per_username FROM personnel WHERE per_username = '$per_username'";
    $result1 = mysqli_query($conn, $check) or die ("Error : " . mysqli_error());
    $num = mysqli_num_rows($result1);
    if($num > 0){
        $check1 = 0;
        while($row = mysqli_fetch_array($result1)){
            if($row['per_username'] == $per_username1){
                $check1 = 1;
            }else{
                echo "<script>window.top.window.showResult('1');</script>";
            }
        }
    }
    if($check1 == 1 || $num<1){
        if($per_level == 'p'){
            $status = "UPDATE personnel SET per_level = 'd' WHERE per_level != 'a'";
            $resultstatus = mysqli_query($conn, $status) or die ("ERROR : $status" . mysqli_error());
        }
        if($resultstatus){
            $sql = "UPDATE personnel SET 
    per_username = '$per_username',
    per_firstname = '$per_firstname',
    per_lastname = '$per_lastname',
    per_level = '$per_level'
    WHERE per_id = '$per_id'";
    $result = mysqli_query($conn, $sql) or die ("Error in query : $sql" . mysqli_error());
        }
    
        if($result){
            echo "<script>window.top.window.showResult('3');</script>";    
        }
        else{
            echo "<script>window.top.window.showResult('4');</script>";    
        }
    }

?>