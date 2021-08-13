<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <?php include('../header.php'); ?>
    <title>Admin Page</title>
</head>
<style>
    .table1 {
        margin-top: -40px;
    }

    .table2 {
        font-size: 15px
    }

    @media print {
        .noprint {
            display: none;
        }

        .table1 {
            margin-top: -80px;
        }

        .table2 {
            margin-top: -40px;
            font-size: 12px;
        }

        .head {
            font-size: 14px;
        }
    }
</style>

<body>
    <?php 
    session_start();
    echo "<div class='noprint'>";
    include('./navbar.php'); 
    echo "</div>";
    include('../condb.php');
    @$codeyear = mysqli_real_escape_string($conn, $_POST['codeyear']);
    @$agency1 = mysqli_real_escape_string($conn, $_POST['agency']);
    @$money1 = mysqli_real_escape_string($conn, $_POST['money']);
    @$type1 = mysqli_real_escape_string($conn, $_POST['type']);
    
    $top = "SELECT *, COUNT(dura_id) as dura_cu FROM durable as d INNER JOIN agency as a ON d.agency_id = a.agency_id WHERE dura_status = '5' GROUP BY d.agency_id ORDER BY COUNT(dura_id) DESC  LIMIT 5";
    $resulttop = mysqli_query($conn, $top) or die ("ERROR : $top" . mysqli_error());
    ?>
    <div style="margin-top: 90px;"></div>
    <div class="">
        <div class="col-sm-12 miss noprint">
            <div class="logodete noprint" style="float: left;background-color: #b6fdb1;">
                <div class="inside">
                    <a href="#" style="float: left;">
                        <img src="../img/shredder.png" width="70%" class="iconcon">
                    </a>
                </div>
            </div>
            <div class="textall noprint">
                <span class="texton">Annual Report</span><br><span class="textunder">รายงานครุภัณฑ์ประจำปี</span></div>
            <br>
            <form action="#" method="post">
                <div class="row">
                    <div class="col-sm-2">
                        <select id="codeyear" name="codeyear" id="" required class="inputadd1 noprint">
                            <option value="">--กรุณาเลือกรหัสปี--</option>
                            <?php 
                        $queryyear = "SELECT * FROM `evaluation` GROUP BY eva_year";
                        $resultyear = mysqli_query($conn, $queryyear) or die ("ERROR $queryyear" . mysqli_error());
                        while($rowyear = mysqli_fetch_array($resultyear)) {
                        ?>
                            <option value="<?php echo $rowyear['eva_year'] ?>">-- <?php echo $rowyear['eva_year'] ?> --
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select id="agency" name="agency" id="" required class="inputadd1 noprint">
                            <option value="">--กรุณาเลือกหน่วยงาน--</option>
                            <?php 
                        $queryagen = "SELECT * FROM agency";
                        $resultagen = mysqli_query($conn, $queryagen) or die ("ERROR $queryagen" . mysqli_error());
                        while($rowagen = mysqli_fetch_array($resultagen)) {
                        ?>
                            <option value="<?php echo $rowagen['agency_id'] ?>">--
                                <?php echo $rowagen['agency_id'] . ' ' . $rowagen['agency_name'] ?> --</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select id="money" name="money" id="" required class="inputadd1 noprint">
                            <option value="">--กรุณาเลือกแหล่งเงิน--</option>
                            <?php 
                        $querymoney = "SELECT * FROM money";
                        $resultmoney = mysqli_query($conn, $querymoney) or die ("ERROR $querymoney" . mysqli_error());
                        while($rowmoney = mysqli_fetch_array($resultmoney)) {
                        ?>
                            <option value="<?php echo $rowmoney['money_id'] ?>">--
                                <?php echo $rowmoney['money_id'] . ' ' . $rowmoney['money_name'] ?> --</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select id="type" name="type" id="" required class="inputadd1 noprint">
                            <option value="">--กรุณาเลือกกลุ่มครุภัณฑ์--</option>
                            <?php 
                        $querytype = "SELECT * FROM Type";
                        $resulttype = mysqli_query($conn, $querytype) or die ("ERROR $querytype" . mysqli_error());
                        while($rowtype = mysqli_fetch_array($resulttype)) {
                        ?>
                            <option value="<?php echo $rowtype['type_id'] ?>">--
                                <?php echo $rowtype['type_id'] . ' ' . $rowtype['type_name'] ?> --</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <input type="submit" value="Submit" style="margin-top: 8px" class="buttonsubmit noprint">
                    </div>
                    <div class="col-sm-2">
                        <!-- <button onClick="window.print();" style="margin-top: 7px;padding: 1px 15px" media="buttonsubmit" class="noprint"><i class="fas fa-print"></i></button> -->
                        <a href="#" onClick="window.print();" style="margin-top: 100px;font-size: 25px"
                            media="buttonsubmit" class="noprint"><i class="fas fa-print"></i></a>
                    </div>
                </div>

            </form>
            <br>
        </div>
        <div style="margin-top: 50px" class="noprint"></div>
        <div class="row table1">
            <div class="col-sm-12 head" style="text-align: center">
                <?php 
                $queryagenhead = "SELECT * FROM agency WHERE agency_id = '$agency1'";
                $resultagenhead = mysqli_query($conn, $queryagenhead) or die ("ERROR : $queryagenhead" . mysqli_error());
                $rowagenhead = mysqli_fetch_array($resultagenhead);

                $querymonhead = "SELECT * FROM money WHERE money_id = '$money1'";
                $resultmonhead = mysqli_query($conn, $querymonhead) or die ("ERROR : $querymonhead" . mysqli_error());
                $rowmonhead = mysqli_fetch_array($resultmonhead);
            ?>
                <?php if(isset($_POST['codeyear'])){ ?>
                <span>รายงานครุภัณฑ์ประจำปี <?php echo @$codeyear ?></span><br>
                <span>หน่วยงาน <?php echo @$rowagenhead[0] ?> - <?php echo @$rowagenhead[1] ?></span><br>
                <span>แหล่งเงิน <?php echo $rowmonhead[0] ?>000 - เงินงบประมาณ<?php echo $rowmonhead[1] ?></span><br>
                <?php }else{ ?>
                <span>กรุณาเลือกรหัสปี,หน่วยงาน,แหล่งเงิน </span><br>
                <?php } ?>
                <hr size="5">
            </div>
            <div class="col-sm-12 noprint ">
            </div>
            <div class="col-sm-12 col-md-12 table2">
                <table class="table  table-sm" style="text-align: center;">
                    <thead>
                        <tr>
                            <th style="width: 2%">NO</th>
                            <th style="width: 5%">กลุ่ม</th>
                            <th style="width: 30%">หมายเลขครุภัณฑ์</th>
                            <th style="width: 10%">ชื่อครุภัณฑ์</th>
                            <th style="width: 2%">จำนวน</th>
                            <th style="width: 10%">หน่วยวัด</th>
                            <th style="width: 10%">วันที่ได้มา</th>
                            <th style="width: 8%">ราคาทุน<br>(รวม VAT)</th>
                            <th style="width: 5%">ตรวจนับได้</th>
                            <th style="width: 2%">ขาด</th>
                            <th style="width: 2%">เกิน</th>
                            <th style="width: 2%">ชำรุด</th>
                            <th style="width: 2%">เสื่อมสภาพ</th>
                            <th style="width: 10%">ใช้ประจำที่</th>
                        </tr>
                    </thead>
                    <?php if(isset($_POST['codeyear'])){ ?>
                    <tbody>
                        <?php 
                        $sql = "SELECT * FROM durable as d INNER JOIN agency as a ON d.agency_id = a.agency_id INNER JOIN unit AS u ON d.unit_id = u.unit_id 
                        INNER JOIN evaluation AS e on e.dura_id = d.dura_id INNER JOIN Type as t ON d.type_id = t.type_id
                        WHERE d.agency_id = '$agency1' AND money_id = '$money1' AND e.eva_year = '$codeyear'  AND d.type_id = '$type1' ";
                        $result = mysqli_query($conn, $sql) or die ("ERROR : $sql " . mysqli_error());
                        @$u = 0;
                        @$countqty=0;
                        @$countcost=0;
                        while($row2 = mysqli_fetch_array($result)){ $u+= 1;
                            $countqty += $row2['dura_qty'];
                            $countcost += $row2['dura_cost']
                    ?>

                        <tr>
                            <th scope="row"><?php echo $u ?></th>
                            <td><a style="color: #8E8E8E;text-decoration: none;" href="#" title="กลุ่มสินทรัพย์ถาวร"
                                    data-toggle="popover" data-placement="right" data-trigger="focus"
                                    data-content="<?php echo $row2['type_name'] ?>"><?php echo $row2['type_id'] ?></a>
                            </td>
                            <td><a target="_blank" style="color: #8E8E8E;text-decoration: none;"
                                    href="report_see_dura.php?id=<?php echo $row2['dura_id'] ?>"><?php echo $row2['dura_id'] ?></a>
                            </td>
                            <td><?php echo $row2['dura_name'] ?></td>
                            <td><?php echo $row2['dura_qty'] ?></td>
                            <td><?php echo $row2['unit_name'] ?></td>
                            <td><?php echo $row2['dura_date'] ?></td>
                            <td><?php echo number_format($row2['dura_cost'] , 2) ?></td>
                            <td><?php echo $row2['dura_qty'] ?></td>
                            <td><?php echo $row2['eva_miss'] ?></td>
                            <td><?php echo $row2['eva_over'] ?></td>
                            <td><?php echo $row2['eva_damage'] ?></td>
                            <td><?php echo $row2['eva_deteriorate'] ?></td>
                            <td><?php echo $row2['dura_use'] ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2">กลุ่ม <?php echo $type1 ?></td>
                            <td colspan="2"></td>
                            <td><?php echo $countqty ?></td>
                            <td colspan="2"></td>
                            <td><?php echo number_format($countcost , 2) ?></td>
                        </tr>

                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            load_data();

            function load_data() {
                var codeyear = $('#codeyear').val();
                var agency = $('#agency').val();
                var money = $('#money').val();
                var type = $('#type').val();
                $.ajax({
                    url: "report_annual_load.php",
                    method: "POST",
                    data: {
                        codeyear: codeyear,
                        agency: agency,
                        money: money,
                        type: type
                    },
                    success: function (data) {
                        $('#result').html(data);
                    }
                });
            }
            $('#codeyear').change(function () {
                var search = $(this).val();
                
                if (search != '') {
                    load_data();
                    // alert("test")
                } 
                // else {
                //     load_data();
                // }
            });

            $('#agency').change(function () {
                var search = $(this).val();
                
                if (search != '') {
                    load_data();
                    // alert("test")
                } 
                // else {
                //     load_data();
                // }
            });
            $('#money').change(function () {
                var search = $(this).val();
                
                if (search != '') {
                    load_data();
                    // alert("test")
                } 
                // else {
                //     load_data();
                // }
            });
            $('#type').change(function () {
                var search = $(this).val();
                
                if (search != '') {
                    load_data();
                    // alert("test")
                } 
                // else {
                //     load_data();
                // }
            });
        })
    </script>
    <script>
        $(document).ready(function () {
            $('[data-toggle="popover"]').popover();
        });
    </script>
</body>

</html>