<?php 
    include('../condb.php');
    include('../header.php');
    $unit_name = mysqli_real_escape_string($conn, $_POST['unit_name']);

    $checkid = "SELECT unit_id FROM unit ORDER BY unit_id DESC LIMIT 0,1";
    $resultcheck = mysqli_query($conn, $checkid) or die ("ERROR : " . mysqli_error() );
    $row = mysqli_fetch_array($resultcheck);
    //เก็บค่า ID ล่าสุด
    $first = $row[0];
    //ดึงค่าตัวเลขออกมา
    $str = substr($first, 1,4);
    //เอาค่าที่ดึงมาได้บวก 1
    $plus = $str + 1;
    if(strlen($plus) == 1){
        $echo = 'U000' . $plus;
    }elseif (strlen($plus) == 2){
        $echo = 'U00' . $plus;
    }elseif (strlen($plus) == 3){
        $echo = 'U0' . $plus;
    }elseif (strlen($plus) == 4){
        $echo = 'U' . $plus;
    }
    echo $echo;
    $checkname = "SELECT unit_name FROM unit WHERE unit_name = '$unit_name'";
    $resultname = mysqli_query($conn, $checkname) or die ("ERROR IN line check name : $checkname" . mysqli_error());
    $num = mysqli_num_rows($resultname);
    if($num > 0){
        echo "<script>window.top.window.showResult('0');</script>";
    }else{
        $sql = "INSERT INTO unit SET unit_id = '$echo' , unit_name = '$unit_name'";
        $resultsql = mysqli_query($conn, $sql) or die ("ERROR insert : $sql " . mysqli_error() );
        if($resultsql){
            echo "<script>window.top.window.showResult('1');</script>";
        }else{
            echo "<script>window.top.window.showResult('2');</script>";
        }
    }
?>