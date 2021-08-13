<?php 
    include('../condb.php');
    $agencyid = mysqli_real_escape_string($conn, $_POST['agency_id1']);
    $agencyid1 = mysqli_real_escape_string($conn, $_POST['agency_id1']);
    $agencyname = mysqli_real_escape_string($conn, $_POST['agency_name']);
    $agencyname1 = mysqli_real_escape_string($conn, $_POST['agency_name1']);

    $checkid = "SELECT * FROM agency WHERE agency_id = '$agencyid'";
    $resultid = mysqli_query($conn, $checkid) or die ("ERROR : $checkid " . mysqli_error());
    $num_id = mysqli_num_rows($resultid);
    $checkname = "SELECT * FROM agency WHERE agency_name = '$agencyname'";
    $resultname = mysqli_query($conn, $checkname) or die ("ERROR : $checkname " . mysqli_error());
    $num_name = mysqli_num_rows($resultname);
    if($num_id > 0){
        $check = 0;
        if($agencyid == $agencyid1 && $num_name == 0){
            $check = 1;
        }elseif($agencyid == $agencyid1 && $num_name >= 1 && $agencyname == $agencyname1){
            $check = 1;
        }elseif($agencyid == $agencyid1 && $num_name >= 1){
            echo "<script>window.top.window.showResult('1');</script>";
        }else{
            echo "<script>window.top.window.showResult('0');</script>";
        }
    }else{
        if($num_name > 0){
            if($agencyname == $agencyname1){
                $check = 1;
            }else{
                echo "<script>window.top.window.showResult('1');</script>";
            }
        }else{
            $check = 1;
        }
    }
    if($check == 1){
        $sql1 = "UPDATE agency SET agency_id = '$agencyid', agency_name = '$agencyname' WHERE agency_id = '$agencyid1'";
        $result1 = mysqli_query($conn, $sql1);
        if($result1){
            echo "<script>window.top.window.showResult('4');</script>";
        }else{
            echo "<script>window.top.window.showResult('3');</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="#" method="post">
    ID :
    <input type="text" name="ID">
    Name :
    <input type="text" name="name">
    address :
    <input type="text" name="address">
    city :
    <input type="text" name="city">
    state :
    <input type="text" name="state">
    Zip :
    <input type="text" name="zip">
    <input type="submit" name='submit' value="Save">
</form>
<?php 
if(isset($_POST['submit'])){
    $ID = $_POST['ID'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $status = $_POST['status'];
    $zip = $_POST['zip'];
	$conn= mysqli_connect("localhost","root","","test_dev") or die("Error: " . mysqli_error($conn));
    mysqli_query($conn, "SET NAMES 'utf8' "); 
    $sql = "INSERT INTO Customer Set Name = '$name' , address = '$address' , city = '$city', status = '$status', Zip = '$zip'";
    $result = mysqli_query($conn, $sql);

}
?>
</body>
</html>