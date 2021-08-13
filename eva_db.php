<?php 
    session_start();
    include('./condb.php');
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $eva = mysqli_real_escape_string($conn, $_POST['eva']);
    $per_id = $_SESSION['per_id'];
    $normal = 0;
    $miss = 0;
    $over = 0;
    $damage = 0;
    $deteriorate = 0;

    $today = date("Y-m-d");
    $month = date("m");
    $year = date("Y");
    $year = $year + 543;
    
    if($month >= 10){
        $year += 1;
    }
    if($eva == 1){
        $normal = 1;
    }elseif($eva == 2){
        $miss = 1;
    }elseif($eva == 3){
        $over = 1;
    }elseif($eva == 4){
        $damage = 1;
    }elseif($eva == 5){
        $deteriorate = 1;
    }
    echo substr($year , 0) ;

    $check = "SELECT * FROM evaluation WHERE dura_id = '$id' AND eva_year = '$year' ";
    $resultcheck = mysqli_query($conn, $check) or die ("ERROR : $check" . mysqli_error());
    $numcheck = mysqli_num_rows($resultcheck);
    
    if($numcheck > 0){
        echo "<script>window.top.window.showResult('0');</script>";
    }else{
        $update = "UPDATE durable SET dura_status = '$eva' WHERE dura_id = '$id'";
        $resultupdate = mysqli_query($conn, $update) or die ("ERROR : $update" . mysqli_error());
        $sql = "INSERT INTO evaluation SET eva_year = '$year', dura_id = '$id', eva_count = 1, eva_normal= '$normal', eva_miss = '$miss', eva_over = '$over', eva_damage = '$damage', eva_deteriorate = '$deteriorate', per_id = '$per_id'";
        $result = mysqli_query($conn, $sql) or die ("ERROR : $sql" .mysqli_error());
        
        if($result){
            echo "<script>window.top.window.showResult('1');</script>";
        }else{
            echo "<script>window.top.window.showResult('2');</script>";
        }
    }
    
?>