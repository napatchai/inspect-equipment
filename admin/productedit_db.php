<?php 
    session_start();
    include('../condb.php');
    $dura_id_old = mysqli_real_escape_string($conn, $_POST['dura_id_old']);
    $dura_name = mysqli_real_escape_string($conn, $_POST['name']);
    $money_id = mysqli_real_escape_string($conn, $_POST['money_id']);
    $agency_id = mysqli_real_escape_string($conn, $_POST['agency_id']);
    $type_id = mysqli_real_escape_string($conn, $_POST['type_id']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $kind_id = mysqli_real_escape_string($conn, $_POST['kind_id']);
    $des_id = mysqli_real_escape_string($conn, $_POST['des_id']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $typeunit = mysqli_real_escape_string($conn, $_POST['typeunit']);
    $cost = mysqli_real_escape_string($conn, $_POST['cost']);
    $date_id = mysqli_real_escape_string($conn, $_POST['date_id']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $use = mysqli_real_escape_string($conn, $_POST['use']);


    // print_r($_POST);
    
    $date1 = substr($date , -2);
    $month1 = substr($date , -5,2);
    if($money_id == 1){
        $p = 'ผ.';
    }else{
        $p = 'รด.';
    }
    @$Year1 = $date + 543;
    $year = date("y", strtotime($Year1)); 
    $dura_date = $Year1 . '-' . $month1 . '-' . $date1;

        $dura_id = $money_id . '-' . $agency_id . '-' . $type_id . '-' . $category_id . $kind_id . $des_id . '/' . $p . $year . '-' . $last;
        $check = "SELECT * FROM durable WHERE dura_id = '$dura_id'";
        $resultcheck = mysqli_query($conn, $check) or die ("ERROR : $check" . mysqli_error());
        $num = mysqli_num_rows($resultcheck);
        // if($num > 0){
        //     if($dura_id == $id){
        //         $check =1 ;
        //     }else{
        //         echo "<script>window.top.window.showResult('0');</script>";
        //     }
            
        // } else{
            $sql = "UPDATE durable SET dura_id = '$dura_id', dura_name = '$dura_name', type_id = '$type_id', dura_date = '$dura_date', dura_qty = '1', unit_id = '$typeunit' , dura_cost = '$cost' , agency_id = '$agency_id',
        category_id = '$category_id', kind_id = '$kind_id', dura_year = '$year', IVZ_FSNum = '', money_id = '$money_id', des_id = '$des_id', code_year = '$date_id', dura_use = '$use' WHERE dura_id = '$dura_id_old' ";
        $result = mysqli_query($conn, $sql) or die ("ERROR : $sql" . mysqli_error());
        if($result){
            echo "<script>window.top.window.showResult('2');</script>";
        }else{
            echo "<script>window.top.window.showResult('3');</script>";
        }
        // }

?>




       <!-- if($check == 1){
            $sql = "UPDATE durable SET dura_name = '$dura_name', type_id = '$type_id', dura_date = '$dura_date', dura_qty = '1', unit_id = '$typeunit' , dura_cost = '$cost' , agency_id = '$agency_id',
        category_id = '$category_id', kind_id = '$kind_id', dura_year = '$year', IVZ_FSNum = '', money_id = '$money_id', des_id = '$des_id', code_year = '$date_id', dura_use = '$use' WHERE dura_id = '$dura_id_old' ";
        $result = mysqli_query($conn, $sql) or die ("ERROR : $sql" . mysqli_error());
        if($result){
            echo "<script>window.top.window.showResult('2');</script>";
        }else{
            echo "<script>window.top.window.showResult('3');</script>";
        }
        } -->