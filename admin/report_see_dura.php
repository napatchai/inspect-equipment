<?php
session_start();
    if($_SESSION['per_level'] != 'a'){
        header("Location: ./index.php ");	
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./admin/style.css">
    <title>Evalucation</title>
</head>

<body>
    <style>
        .boxunder1 {
            margin-top: 50px;
            margin-left: 20px;
            height: 110px;
            background-color: #fff;
            border-radius: 20px;
            margin-top: 40px;
            box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 0px 8px;
        }

        .top {
            font-weight: bold;
        }

        .under {
            font-weight: lighter;
        }

        .imgunder {
            width: 20%;
            margin-top: 5%;
            margin-left: 80%;
        }

        .show {
            display: none;
        }

        .btnunder {
            text-decoration: none;
        }

        .con1 {
            display: block;
        }

        @media all and (max-width: 876px) {
            .imgunder {
                margin-top: -5%;
                margin-left: 70%;
            }

            .boxunder1 {
                margin-left: 0px
            }
        }

        @media all and (max-width: 600px) {
            .show {
                display: block;
            }

            .con1 {
                display: none;
            }

            .btnshow {
                position: relative;
                z-index: 0;
                width: 100%;
                border: none;
                background: #A2DFFA;
                color: #fff;
                height: 50px;
                font-size: 20px
            }
        }

        @media all and (max-width: 575px) {
            .imgunder {
                width: 15%;
                margin-left: 85%;
                margin-top: -30px
            }
        }
    </style>
    <?php 
        
        include('../condb.php');
        include('../header.php');
        $dura_id = mysqli_real_escape_string($conn, $_GET['id']);
        if($_SESSION['per_level'] == 'a'){ ?>
    <?php
        include('./navbar.php')
    ?>
    <?php }
        $sql = "SELECT * FROM durable as d INNER JOIN money as m ON d.money_id = m.money_id
        INNER JOIN agency as a ON d.agency_id = a.agency_id
        INNER JOIN Type As t ON d.type_id = t.type_id
        INNER JOIN category as c ON d.category_id = c.category_id
        INNER JOIN kind as k ON d.kind_id = k.kind_id
        INNER JOIN description as des ON d.des_id = des.des_id
        INNER JOIN unit AS u ON d.unit_id = u.unit_id
         WHERE dura_id = '$dura_id'";
        $result = mysqli_query($conn, $sql) or die ("ERROR : $sql" . mysqli_error());
        $row = mysqli_fetch_array($result);
    
    ?>
    <?php 
    if($_SESSION['per_level'] == 'a'){
        $level = 'Admin';
    }
    ?>
    <div style="margin-top: 90px;"></div>
    <?php include('./headwelcome.php') ?>

    <div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4">
                <span style="font-size: 22px;font-weight: bold;color: #8E8E8E;z-index: -1;">Evaluation</span>
                <div class="QRcode">
                    <!-- <img src="../admin/imgqrcode/<?php echo $row['dura_qr'] ?>"
                        class="qr-code img-thumbnail img-responsive imgqrcodereal1" /> -->
                        <img src="https://chart.googleapis.com/chart?cht=qr&chl=<?php echo $dura_id ?>&chs=160x160&chld=L|0"
                        class="qr-code img-thumbnail img-responsive imgqrcodereal1" />
                </div>
            </div>
            <div class="inputaddproduct col-sm-12 col-md-12 col-lg-8">
                <div class="col-sm-12 show">
                    <button class="btnshow" onclick="myFunction()">Show Description</button>
                </div>
                <form class="con1" id="con1" name="frmMain" action="scan.php" method="POST" target="iframe_target">
                    <iframe id="iframe_target" name="iframe_target" src="#"
                        style="width:0;height:0;border:0px solid #fff;"></iframe>
                    <div class="row">

                        <div class="col-sm-6 col-md-4" style="z-index: -100;">
                            <span>Name :</span>
                            <br>
                            <textarea name="" id="" class="inputadd1" style="padding: 2px 7px"><?php echo $row['dura_name'] ?></textarea>
                        </div>
                        <div class="col-sm-6 col-md-3" style="z-index: -100;">
                            Money :
                            <div class="inputadd1" style="padding: 2px 7px"><?php echo $row['money_name'] ?></div>

                        </div>
                        <div class="col-sm-12  col-md-5" style="z-index: -100;">
                            Agency :
                            <div class="inputadd1" style="padding: 2px 7px"><?php echo $row['agency_name'] ?></div>
                        </div>
                        <br><br><br>
                        <div class="col-sm-12 col-md-4" style="z-index: -100;">
                            Type :
                            <div class="inputadd1" style="padding: 2px 7px"><?php echo $row['type_name'] ?></div>
                        </div>
                        <div class="col-sm-12 col-md-8" style="z-index: -100;">
                            Category :
                            <div class="inputadd1" style="padding: 2px 7px">
                                <?php echo $row['category_id'] . ' ' . $row['category_name'] ?></div>
                        </div>

                        <div class="col-sm-12 col-md-4" style="margin-top: 15px;z-index: -100;">
                            Kind :
                            <div class="inputadd1" style="padding: 2px 7px">
                                <?php echo $row['kind_id'] . ' ' . $row['kind_name'] ?></div>
                        </div>
                        <div class="col-sm-12 col-md-4" style="margin-top: 15px;z-index: -100;">
                            Description :
                            <div class="inputadd1" style="padding: 2px 7px">
                                <?php echo $row['des_id'] . ' ' . $row['des_name'] ?></div>
                        </div>

                        <div class="col-sm-12 col-md-3" style="margin-top: 15px;z-index: -100;">
                            Date Recived
                            <br>
                            <div class="inputadd1" style="padding: 2px 7px"><?php echo $row['dura_date'] ?></div>
                        </div>
                        <br><br><br><br>
                        <div class="col-sm-6 col-md-3" style="z-index: -100;">
                            Quality :
                            <br>
                            <div class="inputadd1" style="padding: 2px 7px"><?php echo $row['dura_qty'] ?></div>
                        </div>
                        <div class="col-sm-6 col-md-3" style="z-index: -100;">
                            Unit :
                            <br>
                            <div class="inputadd1" style="padding: 2px 7px"><?php echo $row['unit_name'] ?></div>
                        </div>
                        <div class="col-sm-6 col-md-3" style="z-index: -100;">
                            Cost (VAT Include)
                            <br>
                            <div class="inputadd1" style="padding: 2px 7px"><?php echo $row['dura_cost'] ?></div>
                        </div>
                        <br><br><br><br>
                        <div class="col-sm-6 col-md-2" style="z-index: -100;">
                            <!-- รูปครุภัณฑ์
                            <br>
                            <div class="inputadd1">
                                <input type="file" style="margin-left: 20px;margin-top: 1px;">
                            </div> -->
                            Code Year :
                            <br>
                            <div class="inputadd1" style="padding: 2px 7px"><?php echo $row['code_year'] ?></div>

                        </div>
                    </div>

                </form>
                <form method="POST" action="eva_db.php" id="DeleteUserForm" name="frmMain" target="iframe_target">
                    <iframe id="iframe_target" name="iframe_target" src="#"
                        style="width:0;height:0;border:0px solid #fff;"></iframe>
                    <input type="hidden" name="id" id="id12" value="<?php echo $_GET['id']; ?>">
                    <input type="hidden" name="eva" id="eva">

                </form>
            </div>
            <?php echo '<div class="table-responsive">
   <table class="table table bordered" >
    <tr>
     <th>Evaluation Year</th>
     <th>Durable Articles ID</th>
     <th style="text-align: center;">Count</th>
     <th style="text-align: center;">Normal</th>
     <th style="text-align: center;">Miss</th>
     <th style="text-align: center;">Over</th>
     <th style="text-align: center;">Damage</th>
     <th style="text-align: center;">Deteriorate</th>
     <th>Date</th>
     <th>Personnel Name</th>
    </tr>' ;
    $query = "
    SELECT * FROM evaluation as e
    INNER JOIN personnel as p ON e.per_id = p.per_id
    WHERE dura_id = '$dura_id'
    ORDER BY eva_date
    ";
    $result = mysqli_query($conn, $query) or die ("ERROR : $query" . mysqli_error());

    while($row = mysqli_fetch_array($result)) 
 { 
  echo '
   <tr>
   
   <td> '.$row["eva_year"].'</td>
    <td>'.$row["dura_id"].'</td>
    <td style="text-align: center;">'.$row["eva_count"].'</td>
    <td style="text-align: center;">'.$row["eva_normal"].'</td>
    <td style="text-align: center;">'.$row["eva_miss"].'</td>
    <td style="text-align: center;">'.$row["eva_over"].'</td>
    <td style="text-align: center;">'.$row["eva_damage"].'</td>
    <td style="text-align: center;">'.$row['eva_deteriorate'].'</td>
    <td>'.$row["eva_date"].'</td>
    <td>'.$row["per_firstname"] . ' ' . $row["per_lastname"] .'</td>

   </tr>
  ';
 }
    
    ?>

        </div>
    </div>
    <script src="./admin/main.js"></script>
    <script>
        function showResult(result) {
            if (result == 0) {
                swal("Error", "The equipment has been evaluation!!", "error");
            } else if (result == 1) {
                setTimeout(function () {
                    swal({
                        title: "Evaluation success",
                        type: "success"
                    }, function () {
                        window.location = "./scan.php"
                    })
                })
            } else if (result == 2) {
                swal("Error", "Somethine warning", "error");
            }
        }
    </script>

    <script>
        function myFunction() {
            var x = document.getElementById("con1");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function eva(data) {
            $('#eva').val(data);
            var id = $('#id12').val();
            document.getElementById("DeleteUserForm").submit();
        }
    </script>
</body>

</html>