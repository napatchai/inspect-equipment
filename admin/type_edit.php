<?php 
    include('../condb.php');
    $typeid = mysqli_real_escape_string($conn, $_POST['type_id1']);
    $typeid1 = mysqli_real_escape_string($conn, $_POST['type_id1']);
    $typename = mysqli_real_escape_string($conn, $_POST['type_name']);
    $typename1 = mysqli_real_escape_string($conn, $_POST['type_name1']);

    $checkid = "SELECT * FROM Type WHERE type_id = '$typeid'";
    $resultid = mysqli_query($conn , $checkid) or die ("ERROR : $checkid" . mysqli_error());
    $numid = mysqli_num_rows($resultid);
    if($numid > 0){
        while($row3 = mysqli_fetch_array($resultid)){
            $checkid2 = 0;
            if($row3['type_id'] == $typeid1 && $row3['type_name'] == $typename1 ){
                $checkid2 = 1;
            }else{
                echo "<script>window.top.window.showResult('0');</script>";
            }
        }
    }else{
        $checkname = "SELECT * FROM Type WHERE type_name = '$typename'";
        $resultname = mysqli_query($conn, $checkname) or die ("ERROR : $checkname" . mysqli_error());
        $numname = mysqli_num_rows($resultname);
        if($numname > 0){
            while($row2 = mysqli_fetch_array($resultname)){
                $checkid2 = 0;
                if($row2['type_id'] == $typeid1 && $row2['type_name'] == $typename1){
                    $checkid2 =1;
                }else{
                    echo "<script>window.top.window.showResult('1');</script>";
                }
            }
        }else{
            $sql = "UPDATE Type SET type_id = '$typeid', type_name = '$typename' WHERE type_id = '$typeid1'";
            $result = mysqli_query($conn, $sql) or die ("ERROR : $sql" . mysqli_error());
            if($result){
                echo "<script>window.top.window.showResult('4');</script>";
            }else{
                echo "<script>window.top.window.showResult('3');</script>";
            }
        }
    }
    if($checkid2 == 1 ){
        $sql = "UPDATE Type SET type_id = '$typeid', type_name = '$typename' WHERE type_id = '$typeid1'";
        $result = mysqli_query($conn, $sql) or die ("ERROR : $sql" . mysqli_error());
        if($result){
            echo "<script>window.top.window.showResult('4');</script>";
        }else{
            echo "<script>window.top.window.showResult('3');</script>";
        }
    }
?>