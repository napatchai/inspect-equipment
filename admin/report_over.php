<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <?php include('../header.php'); ?>
    <title>Admin Page</title>
</head>

<body>
    <?php 
    session_start();
    include('./navbar.php'); 
    include('../condb.php');
    $top = "SELECT *, COUNT(dura_id) as dura_cu FROM durable as d INNER JOIN agency as a ON d.agency_id = a.agency_id WHERE dura_status = '3' GROUP BY d.agency_id ORDER BY COUNT(dura_id) DESC  LIMIT 5";
    $resulttop = mysqli_query($conn, $top) or die ("ERROR : $top" . mysqli_error());
    ?>
    <div style="margin-top: 90px;"></div>
    <div class="container">
        <div class="col-sm-12 miss">
            <div class="logodete" style="float: left;background-color: #D7FDB1;">
                <div class="inside">
                    <a href="#" style="float: left;">
                        <img src="../img/books.png" width="70%" class="iconcon">
                    </a>
                </div>
            </div>
            <div class="textall">
                <span class="texton">Report Over</span><br><span class="textunder">รายงานครุภัณฑ์ที่เกิน</span></div>
        </div>
        <div style="margin-top: 50px"></div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <canvas id="myChart" width="100%" height="46px"></canvas>
            </div>
            <div class="col-sm-12 col-md-6">
                <span class="texton">Top 5 most Over</span>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Agency</th>
                            <th scope="col" style="text-align: center;">Qulity</th>
                            <th scope="col"style="text-align: center;">Over</th>
                            <th scope="col" style="text-align: center;">Click</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0; $agenct = array();$qty1 = array();?>
                    <?php while($row = mysqli_fetch_array($resulttop)){  $i += 1; 
                    $agency_id = $row['agency_id'];
                        $query = "SELECT *, COUNT(dura_id) as dura_count FROM durable as d INNER JOIN Type as t ON d.type_id = t.type_id INNER JOIN agency as a ON d.agency_id = a.agency_id WHERE d.agency_id = 'k5522' GROUP BY a.agency_id ";
                        $resultquery = mysqli_query($conn, $query) or die ("ERROR : $query" . mysqli_error());
                        $row1 = mysqli_fetch_array($resultquery);
                        $agenct[] = "\"".$row['agency_id']."\"";
                        $agen = $row['agency_id'];
                        $querygen = "SELECT COUNT(dura_id) as cou FROM durable WHERE agency_id = '$agen' GROUP BY agency_id";
                        $resultagen = mysqli_query($conn, $querygen);
                        $row3 = mysqli_fetch_array($resultagen);
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><a style="color: #8E8E8E;" href="#" title="กลุ่มสินทรัพย์ถาวร" data-toggle="popover"
                                    data-placement="top" data-trigger="focus" data-content="<?php echo $row['agency_name'] ?>"><?php echo $row['agency_id'] ?></a></td>



                            <td style="text-align: center;"><?php echo $row3[0] ?></td>


                            
                            <?php @$check123 = $row['dura_cu']; if($check123 != 0){  $qty1[] = "\"".$row['dura_cu']."\""; ?>
                                <td style="text-align: center;"><?php echo $row['dura_cu'] ?></td>
                                
                            <?php }else{ ?>
                                <td style="text-align: center;">0</td>
                            <?php } ?>
                            <td style="text-align: center;"เ><a href="report_agency.php?agency=<?php echo $row['agency_id'] ?>&status=3" class="textclick">Click</a>
                            </td>
                        </tr>
                        
                    <?php  } $agenct = implode(",", $agenct);  $qty1 = implode(",", $qty1); ?>
                        
                        
                    </tbody>
                </table>
            </div>
            <div class="col-sm-12">
                <span class="texton">Report</span>
            </div>
            <div class="col-sm-12 col-md-11">
                <table class="table  table-sm" style="text-align: center;">
                    <thead>
                        <tr >
                            <th style="width: 5%">ID</th>
                            <th style="width: 20%">Agency</th>
                            <th style="width: 30%">Name</th>
                            <th style="width: 10%">Qulity</th>
                            <th style="width: 10%" >Over</th>
                            <th style="width: 20%">Unit</th>
                            <th style="width: 5%">click</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $sql = "SELECT * FROM durable as d INNER JOIN agency as a ON d.agency_id = a.agency_id INNER JOIN unit AS u ON d.unit_id = u.unit_id WHERE d.dura_status = 3 ";
                        $result = mysqli_query($conn, $sql) or die ("ERROR : $sql " . mysqli_error());
                        @$u = 0;
                        while($row2 = mysqli_fetch_array($result)){ $u+= 1;
                    ?>
                        <tr>
                            <th scope="row"><a style="color: #8E8E8E;" href="#" title="ID" data-toggle="popover"
                                    data-placement="right" data-trigger="focus"
                                    data-content="<?php echo $row2['dura_id'] ?>"><?php echo $u ?></a></th>
                            <td><a style="color: #8E8E8E;" href="#" title="กลุ่มสินทรัพย์ถาวร" data-toggle="popover"
                                    data-placement="top" data-trigger="focus" data-content="<?php echo $row2['agency_name'] ?>"><?php echo $row2['agency_id'] ?></a></td>
                            <td><?php echo $row2['dura_name'] ?></td>
                            <td><?php echo $row2['dura_qty'] ?></td>
                            <td><?php echo '1' ?></td>
                            <td><?php echo $row2['unit_name'] ?></td>
                            <td><a href="report_see_dura.php?id=<?php echo $row2['dura_id'] ?>" class="textclick">Click</a>
                            </td>
                        </tr>
                        <?php } ?>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php echo $agenct ?>],
                datasets: [{
                    label: 'จำนวนที่เกิน',
                    data: [<?php echo $qty1 ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $('[data-toggle="popover"]').popover();
        });
    </script>
</body>

</html>