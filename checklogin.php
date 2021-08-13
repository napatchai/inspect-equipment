
<?php
    session_start();
    if(isset($_POST['username'])){
        include("condb.php");
        $per_username = mysqli_real_escape_string($conn, $_POST['username']);
        $per_password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $sql = "SELECT * FROM personnel WHERE per_username = '$per_username' AND per_password = '$per_password'" or die ("ERROR: " . mysqli_error());
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
            $_SESSION["per_id"] = $row["per_id"];
            $_SESSION["per_username"] = $row["per_username"];
            $_SESSION["per_password"] = $row["per_password"];
            $_SESSION["per_firstname"] = $row["per_firstname"];
            $_SESSION["per_lastname"] = $row["per_lastname"];
            $_SESSION["per_level"] = $row["per_level"];
            $_SESSION["per_status"] = $row["per_status"];
            // echo "<script>window.top.window.showResult('0');</script>";
            if($row['per_level'] == 'a' && $row['per_status'] == 0){
                echo "<script>window.top.window.showResult('0');</script>";
            }elseif($row['per_level'] == 'a' && $row['per_status'] == 1){
                echo "<script>window.top.window.showResult('2');</script>";
            }elseif($row['per_level'] == 'p' && $row['per_status'] == 0){
                echo "<script>window.top.window.showResult('3');</script>";
            }elseif($row['per_level'] == 'p' && $row['per_status'] == 1){
                echo "<script>window.top.window.showResult('2');</script>";
            }elseif($row['per_level'] == 'd' && $row['per_status'] == 0){
                echo "<script>window.top.window.showResult('4');</script>";
            }elseif($row['per_level'] == 'd' && $row['per_status'] == 1){
                echo "<script>window.top.window.showResult('2');</script>";
            }
        }else{
            echo "<script>window.top.window.showResult('1');</script>";
        }
        
    }
?>


