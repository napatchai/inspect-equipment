<?php 
include('../condb.php');
$id = mysqli_real_escape_string($conn, $_POST['id']);
$check = "SELECT per_status FROM personnel WHERE per_id = '$id'";
$resultcheck = mysqli_query($conn, $check) or die ("ERROR $check" . mysqli_error());
$row1 = mysqli_fetch_array($resultcheck);

if($row1[0] == 0){
    $newstatus = 1;
}else if($row1[0] == 1){
    $newstatus = 0;
}


$sql = "UPDATE personnel SET per_status = $newstatus WHERE per_id = '$id'";
$result = mysqli_query($conn, $sql) or die ("ERROR : $sql" . mysqli_error());
if($result){
    echo "<script>window.top.window.showResult1('5');</script>";    
}
else{
    echo "<script>window.top.window.showResult1('4');</script>";    
}
?>