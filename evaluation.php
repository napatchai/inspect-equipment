<?php
session_start();
    // if($_SESSION['per_level'] == 'a'){
        
    // }if($_SESSION['per_level'] == 'p'){
        
    // }if($_SESSION['per_level'] == 'd'){
       
    // }else{
    //     header("Location: ./index.php ");	
    // }
    
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
        
        include('./condb.php');
        include('./header.php');
        $dura_id = mysqli_real_escape_string($conn, $_GET['id']);
        if($_SESSION['per_level'] == 'a'){ ?>
    <nav style="background-color: #F5F5F5;z-index: 100">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <div class="imglogo">
            <a href="index.php">
                <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/KU_SubLogo_Thai.png" class="logo">
            </a>
        </div>
        <ul class="menu1">
            <form action="">
                <div class="search search1">
                    <input type="text" placeholder="Search" class="inputsearch">
                    <a href="#"><i class="fas fa-search se"></i></a>
                </div>
            </form>
            <li class="menu ca" style="color: #d4d4d4;">-</li>
            <li><a href="./scan.php" class="menu">Evaluation</a></li>
            <li><a href="./admin/manage.php" class="menu">Manage</a></li>
            <li><a href="./admin" class="menu">Report</a></li>
            <li><a class="menu logout" href="./logout.php">Logout</a></li>
        </ul>
    </nav>
    <script>
    function next (){
        var search = document.getElementById('inputsearch').value
        var next1 = './admin/search.php?search=' + search
        window.location = next1
    }
    </script>
        <?php }elseif($_SESSION['per_level'] == 'p'){ ?>
            <nav style="background-color: #F5F5F5;z-index: 100">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <div class="imglogo">
            <a href="index.php">
                <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/KU_SubLogo_Thai.png" class="logo">
            </a>
        </div>
        <ul class="menu1">
            <form action="search.php" method="post" id="formsearch">
                <div class="search search1">
                    <input type="text" id="inputsearch" placeholder="Search" class="inputsearch">
                    <a href="#" onclick="next()"><i class="fas fa-search se"></i></a>
                </div>
            </form>
            <li class="menu ca" style="color: #d4d4d4;">-</li>
            <li><a href="./scan.php" class="menu"></a></li>
            <li><a href="./scan.php" class="menu">Evaluation</a></li>
            <li><a href="index.php" class="menu">Report</a></li>
            <li><a class="menu logout" href="./logout.php">Logout</a></li>
        </ul>
    </nav>
    <script>
    function next (){
        var search = document.getElementById('inputsearch').value
        var next1 = './president/search.php?search=' + search
        window.location = next1
    }
    </script>
        <?php }elseif($_SESSION['per_level'] == 'd'){ ?>
            <nav style="background-color: #F5F5F5;z-index: 100">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <div class="imglogo">
            <a href="index.php">
                <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/KU_SubLogo_Thai.png" class="logo">
            </a>
        </div>
        <ul class="menu1">
            <form action="search.php" method="post" id="formsearch">
                <div class="search search1">
                    <input type="text" id="inputsearch" placeholder="Search" class="inputsearch">
                    <a href="#" onclick="next()"><i class="fas fa-search se"></i></a>
                </div>
            </form>
            <li class="menu ca" style="color: #d4d4d4;">-</li>
            <li><a href="" class="menu"></a></li>
            <li><a href="./scan.php" class="menu"></a></li>
            <li><a href="./scan.php" class="menu"></a></li>
            <li><a href="./scan.php" class="menu">Evaluation</a></li>
            <li><a class="menu logout" href="./logout.php">Logout</a></li>
        </ul>
    </nav>

    <script>
    function next (){
        var search = document.getElementById('inputsearch').value
        var next1 = './director/search.php?search=' + search
        window.location = next1
    }
    </script>
        <?php } ?>
    <?php 
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
    }elseif($_SESSION['per_level'] == 'p'){
        $level = 'President';
    }elseif($_SESSION['per_level'] == 'd'){
        $level = 'Director';
    }
    ?>
    <div style="margin-top: 90px;"></div>
    <div class="row" style="z-index: -1;">
        <div style="width: 10%;"></div>
        <div class="profile col-md-1 col-sm-1 col-xs-1">
            <img src="./img/profile.png" width="70px" class="img1">
        </div>
        <div class="col-md-6 col-sm-6 col-xs-1 username">
            Welcome <?php echo $_SESSION['per_firstname'] .'  ' . $_SESSION['per_lastname'] ?>
            <i class="far fa-edit edit" style="margin-left: 20px;"></i>
            <br>
            Member level: <?php echo $level ?>
            <div style="width: 100%;">
                <div style="width: 100%;">
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4">
                <span style="font-size: 22px;font-weight: bold;color: #8E8E8E;z-index: -1;">Evaluation</span>
                <div class="QRcode">
                    <!-- <img src="./admin/imgqrcode/<?php echo $row['dura_qr'] ?>"
                        class="qr-code img-thumbnail img-responsive imgqrcodereal1" /> -->
                        <img src="https://chart.googleapis.com/chart?cht=qr&chl=<?php echo $row['dura_id'] ?>&chs=160x160&chld=L|0"
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
                        <?php if(!isset($row['dura_id'])){
                            echo "<script>window.location.href = './scan.php'</script>";
                        } ?>
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
            <div class="col-sm-12" style="margin-top: 20px"></div>
            <span style="margin-top: 30px">Evaluation</span>
            <div class="col-am-12" style="margin-bottom: 20px">
                <div class="row">
                    <div class="col-sm-6 col-md-3 col-lg-2">
                        <a href="#" class="btnunder">
                            <div class="boxunder1" style="padding: 10px 10px" onclick="eva('1')">
                                <span class="top">Normal</span><br>
                                <span class="under">ครุภัณฑ์ปกติ</span>
                                <br>
                                <img src="./img/social-group.png" class="imgunder" alt="">
                            </div>
                        </a>
                    </div>
                    <br class="none">
                    <div class="col-sm-6 col-md-3 col-lg-2">
                        <a href="#" class="btnunder">
                            <div class="boxunder1" style="padding: 10px 10px" onclick="eva('2')">
                                <span class="top">Lost</span><br>
                                <span class="under">ครุภัณฑ์ขาด</span>
                                <br>
                                <img src="./img/package.png" class="imgunder" alt="">
                            </div>
                        </a>
                    </div>
                    <br class="none">
                    <div class="col-sm-6 col-md-3 col-lg-2" onclick="eva('3')">
                        <a href="#" class="btnunder">
                            <div class="boxunder1" style="padding: 10px 10px">
                                <span class="top">Over</span><br>
                                <span class="under">ครุภัณฑ์เกิน</span>
                                <br>
                                <img src="./img/books.png" class="imgunder" alt="">
                            </div>
                        </a>
                    </div>
                    <br class="none">
                    <div class="col-sm-6 col-md-3 col-lg-2" onclick="eva('4')">
                        <a href="#" class="btnunder">
                            <div class="boxunder1" style="padding: 10px 10px">
                                <span class="top">Damaged</span><br>
                                <span class="under">ครุภัณฑ์ชำรุด</span>
                                <br>
                                <img src="./img/damaged-package.png" class="imgunder" alt="">
                            </div>
                        </a>
                    </div>
                    <br class="none">
                    <div class="col-sm-6 col-md-3 col-lg-2" onclick="eva('5')">
                        <a href="#" class="btnunder">
                            <div class="boxunder1" style="padding: 10px 10px">
                                <span class="top">Deteriorateaged</span><br>
                                <span class="under">ครุภัณฑ์เสื่อมสภาพ</span>
                                <br>
                                <img src="./img/box.png" class="imgunder" alt="">
                            </div>
                        </a>
                    </div>

                </div>



            </div>
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