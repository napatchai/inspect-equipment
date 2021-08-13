<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>President Page</title>
</head>
<style>
.head{
    margin-top: 80px;
}
@media print{
   .noprint{
       display:none;
   }
   .head{
       margin-top: -80px;
   }
}
</style>

<body>
    <?php 
    session_start();
    include('../condb.php');
    include('../header.php');
    echo "<div class='noprint'>";
    include('./navbar.php');
    echo "</div>";
    $dura_id = mysqli_real_escape_string($conn, $_GET['id']);
    $id = substr($dura_id, 0,-5);
    $sql = "SELECT *  FROM `durable` WHERE `dura_id` LIKE '$id%' ORDER BY dura_id";
    $result = mysqli_query($conn, $sql) or die ("ERROR $sql" . mysqli_error());?>
    <div class="col-sm-12 noprint head" style='text-align: center;font-size: 25px;color: #000'>
        Print QR Code
    </div>
    <button onClick="window.print();" media="noprint" class="noprint">Print</button>
    <br class="noprint">
    <br class="noprint">
        <div class="row">
    <?php while($row = mysqli_fetch_array($result)){ ?>

            <div style="width: 14%;
             align-items: center;
             text-align: center;
            /* height: 120px; */
            background: none;
            border-radius: 10px;
            margin-top: 40px;
            box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 0px 8px;">
                <img src="./imgqrcode/<?php echo $row['dura_qr'] ?>" width="100%" style="margin-left: 0px" alt=""><br>
                <span><?php echo $row['dura_id'] ?></span>
            </div>

    <?php } ?>
    
        </div>


</body>

</html>