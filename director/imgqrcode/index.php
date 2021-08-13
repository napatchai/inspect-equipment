<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Admin Page</title>
</head>

<body>

    <?php   
    session_start();   
    include('navbar.php'); 
    include('./headwelcome.php');
    ?>
    <!-- start Content -->
    <div style="margin-top: 20px;margin-left: 10%;">
        <div class="col-sm-12">
            <span style="font-weight: bold;font-size: 20px;">Durable Articles</span>
        </div>
        <br>
        <div class="row">
            <!-- start scan -->
            <div class="col-md-6 col-sm-12">
                <div class="col-sm-10 scan">
                    <div class="row">
                        <div class="col-sm-7" class="imgqrcode">
                            <img src="../img/qr-codes.png" alt="" class="imgqrcodereal">
                        </div>
                        <div class="col-sm-5 test" style="color: #fff;font-size: 50px;margin-top: 25px;">
                            Scan QRcode
                            <br>
                            <a href="../scan.php" style="text-decoration: none;">
                                <div class="now">
                                    NOW
                                </div>
                            </a>

                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <!-- end scan -->
            <!-- start menu right -->
            <div class="col-md-6 col-sm-12">
                <span style="font-weight: bold;font-size: 18px;">Type Report</span>
                <br>
                <div class="row">
                <a href="./report_deteriorate1.php" class="col-xs-4 col-sm-6" style="margin-top: 0px;text-decoration: none;margin-top: 5px">
                    <div class="col-xs-12 col-sm-12 miss" style="margin-top: 20px">
                        <div class="logodete" style="float: left;">
                            <div class="inside">
                                
                                    <img src="../img/shredder.png" width="70%" class="iconcon">
                                
                            </div>
                        </div>
                        <div class="textall"><span class="texton">Report Deteriorate</span><br><span
                                class="textunder">รายงานครุภัณฑ์ที่เสื่อมสภาพ</span></div>
                    </div>
                </a>
                
                <a href="report_over.php" class="col-xs-4 col-sm-6" style="margin-top: 0px;text-decoration: none;margin-top: 5px">
                    <div class="col-xs-12 col-sm-12 miss" style="margin-top: 20px">
                        <div class="logodete" style="float: left;background-color: #D7FDB1;">
                            <div class="inside">
                                
                                    <img src="../img/books.png" width="70%" class="iconcon">
                                
                            </div>
                        </div>
                        <div class="textall"><span class="texton">Report Over</span><br><span
                                class="textunder">รายงานครุภัณฑ์ที่เกิน</span></div>
                    </div>
                </a>


                <a href="report_normal.php" class="col-xs-4 col-sm-6" style="margin-top: 0px;text-decoration: none;margin-top: 0px">
                    <div class="col-xs-12 col-sm-12 miss" style="margin-top: 20px">
                        <div class="logodete" style="float: left;background-color: #FDDDB1;">
                            <div class="inside">
                                
                                    <img src="../img/laptop.png" width="70%" class="iconcon">
                                
                            </div>
                        </div>
                        <div class="textall"><span class="texton">Report Normal</span><br><span
                                class="textunder">รายงานครุภัณฑ์ที่ปกติ</span></div>
                    </div>
                </a>


                <a href="#" class="col-xs-4 col-sm-6" style="margin-top: 0px;text-decoration: none;margin-top: 5px">
                    <div class="col-xs-12 col-sm-12 miss" style="margin-top: 20px">
                        <div class="logodete" style="float: left;background-color: #b6fdb1;">
                            <div class="inside">
                                
                                    <img src="../img/electrocardiogram-report.png" width="70%" class="iconcon">
                                
                            </div>
                        </div>
                        <div class="textall"><span class="texton">Annual Report</span><br><span
                                class="textunder">รายงานประจำปี</span></div>
                    </div>
                </a>

                
                <div class="col-sm-8"></div>

                <a href="./report_lost.php" class="col-xs-12 col-sm-5" style="margin-top: 0px;text-decoration: none;margin-top: 0px">
                    <div class="col-xs-12 col-sm-12 miss" style="margin-top: 20px">
                        <div class="logodete" style="float: left;background-color: #FDF1B1;">
                            <div class="inside">
                                
                                    <img src="../img/board-games-with-roles.png" width="70%" class="iconcon">
                                
                            </div>
                        </div>
                        <div class="textall"><span class="texton">Report Lost</span><br><span
                                class="textunder">รายงานครุภัณฑ์ที่ขาด</span></div>
                    </div>
                </a>
                <div class="col-sm-8"></div>

                <a href="./report_damage.php" class="col-xs-12 col-sm-5" style="margin-top: 0px;text-decoration: none;margin-top: 0px">
                    <div class="col-xs-12 col-sm-12 miss" style="margin-top: 20px">
                        <div class="logodete" style="float: left;background-color: #F1FDB1;">
                            <div class="inside">
                                
                                    <img src="../img/fragile.png" width="70%" class="iconcon">
                                
                            </div>
                        </div>
                        <div class="textall"><span class="texton">Report Damaged</span><br><span
                                class="textunder">รายงานครุภัณฑ์ที่ชำรุด</span></div>
                    </div>
                </a>
                

                </div>

            </div>
            <!-- end menu right -->
        </div>
        <!-- stop content -->
        <!-- Start Under content -->
        <div class="under">
            <div class="col-sm-12" style="font-weight: bold;font-size: 20px;margin-top: 40px;">
                Manage
            </div>
            <div class="row">
                <div class=" col-sm-2 boxunder" style="margin-top: 30px;font-size: 15px;">
                    <a href="memberlist.php" style="text-decoration: none;">
                        <div>
                            <div style="font-weight: bold;">Manage Member</div>
                            <div style="font-weight: lighter;font-size: 13px;">จัดการข้อมูลสมาชิก</div>
                            <br>
                            <div style="float: right;margin-left: 80%;">
                                <img src="../img/social-group.png" class="nonee" width="100%" alt="">
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-2 boxunder" style="margin-top: 30px;font-size: 15px;">
                    <a href="productlist.php" style="text-decoration: none;"> 
                    <div style="font-weight: bold;">Manage Durable Articles</div>
                    <div style="font-weight: lighter;font-size: 13px;">จัดการข้อมูลครุภัณฑ์</div>
                    <br>
                    <div style="float: right;margin-left: 80%;">
                        <img src="../img/workspace.png" class="nonee" width="100%" alt="">
                    </div>
                    </a>
                </div>
                <div class="col-sm-2 boxunder" style="margin-top: 30px;font-size: 15px;">
                    <a href="typelist.php" style="text-decoration: none;"> 
                        <div>
                    <div style="font-weight: bold;">Manage Type</div>
                    <div style="font-weight: lighter;font-size: 13px;">จัดการข้อมูลกลุ่มครุภัณฑ์</div>
                    <br>
                    <div style="float: right;margin-left: 80%;">
                        <img src="../img/folder.png" class="nonee" width="100%" alt="">
                    </div>
                </div>
                </a>
                </div>
                <div class="col-sm-2 boxunder" style="margin-top: 30px;font-size: 15px;">
                    <a href="unitlist.php" style="text-decoration: none;"> 
                        <div>
                            <div style="font-weight: bold;">Manage units</div>
                            <div style="font-weight: lighter;font-size: 13px;">จัดการข้อมูลหน่วยนับ</div>
                            <br>
                            <div style="float: right;margin-left: 80%;">
                                <img src="../img/computer.png" class="nonee" width="100%" alt="">
                            </div>
                        </div>
                    </a>


                </div>
            </div>
        </div>
        <!-- End Under content -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>
</body>

</html>