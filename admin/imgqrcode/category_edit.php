<?php 
    include('../condb.php');
    $categoryid = mysqli_real_escape_string($conn, $_POST['category_id']);
    $categoryid1 = mysqli_real_escape_string($conn, $_POST['category_id1']);
    $categoryname = mysqli_real_escape_string($conn, $_POST['category_name']);
    $categoryname1 = mysqli_real_escape_string($conn, $_POST['category_name1']);

    $checkid = "SELECT * FROM category WHERE category_id = '$categoryid'";
    $resultid = mysqli_query($conn, $checkid) or die ("ERROR : $checkid " . mysqli_error());
    $num_id = mysqli_num_rows($resultid);
    $checkname = "SELECT * FROM category WHERE category_name = '$categoryname'";
    $resultname = mysqli_query($conn, $checkname) or die ("ERROR : $checkname " . mysqli_error());
    $num_name = mysqli_num_rows($resultname);
    if($num_id > 0){
        $check = 0;
        if($categoryid == $categoryid1 && $num_name == 0){
            $check = 1;
        }elseif($categoryid == $categoryid1 && $num_name >= 1 && $categoryname == $categoryname1){
            $check = 1;
        }elseif($categoryid == $categoryid1 && $num_name >= 1){
            echo "<script>window.top.window.showResult('1');</script>";
        }else{
            echo "<script>window.top.window.showResult('0');</script>";
        }
    }else{
        if($num_name > 0){
            if($categoryname == $categoryname1){
                $check = 1;
            }else{
                echo "<script>window.top.window.showResult('1');</script>";
            }
        }else{
            $check = 1;
        }
    }
    if($check == 1){
        $sql1 = "UPDATE category SET category_id = '$categoryid', category_name = '$categoryname' WHERE category_id = '$categoryid1'";
        $result1 = mysqli_query($conn, $sql1);
        if($result1){
            echo "<script>window.top.window.showResult('4');</script>";
        }else{
            echo "<script>window.top.window.showResult('3');</script>";
        }
    }
?>