
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>President Page</title>
</head>

<body>

    <?php

    session_start();
    include('./navbar.php');
    include('../condb.php');
    if(isset($_GET['search'])){
    @$search = $_GET['search'];
    }else{
        @$search = $_POST['search'];
    }
    $sql = " SELECT * FROM durable as d 
    INNER JOIN Type as t ON d.type_id = t.type_id 
    INNER JOIN unit AS u ON d.unit_id = u.unit_id
    INNER JOIN agency as a ON d.agency_id = a.agency_id
    INNER JOIN category AS c ON d.category_id = c.category_id
    INNER JOIN money AS m ON d.money_id = m.money_id
    WHERE (dura_id LIKE '%$search%'
    OR dura_name LIKE '%$search%'
    OR d.type_id LIKE '%$search%'
    OR type_name LIKE '%$search%'
    OR d.unit_id LIKE '%$search%'
    OR unit_name LIKE '%$search%'
    OR d.category_id LIKE '%$search%'
     OR category_name LIKE '%$search%'
     OR kind_id LIKE '%$search%'
     OR code_year LIKE '%$search%'
    OR d.money_id LIKE '%$search%'
    OR d.dura_date LIKE '%$search%'
     OR money_name LIKE '%$search%')
    ORDER BY dura_id";


    $result = mysqli_query($conn, $sql) or die ("ERROR : $sql" . mysqli_error());
    ?>
    <div style="margin-top: 90px;"></div>
    <?php include('./headwelcome.php'); ?>
    <!-- start Content -->
    <div style="margin-top: 20px;">
        <!-- Start Under content -->
        <div class="under">


            <div class="container">
                <div class="row">


                    <?php while($row = mysqli_fetch_array($result)){ ?>
                    <div class="col-lg-4 col-md-6 col-sm-6" style="font-size: 15px;">
                        <div class="list">
                            <div class="row">
                                <div class="col-sm-3 img2" id="clcik">
                                    <!-- <img src="./imgqrcode/<?php echo $row['dura_qr'] ?>" width="100%" class="imgmember"
                                        style="margin-top: 8%;margin-bottom: 8%;margin-left: 10%;" alt=""> -->
                                        <img src="https://chart.googleapis.com/chart?cht=qr&chl=<?php echo $row['dura_id']; ?>&chs=160x160&chld=L|0"
                        class="qr-code img-thumbnail img-responsive imgqrcodereal1" style="margin-top : 10px;margin-left: 10px" />
                                </div>
                                <!-- <div  class="col-sm-6 textmember">Add Member</div> -->
                                <div class="col-md-8 col-sm-7;">
                                    <a href="report_see_dura.php?id=<?php echo $row['dura_id'] ?>" style="color: #8E8E8E;text-decoration: none;">
                                        <?php echo $row['dura_id'] ?><br>
                                        <?php echo $row['dura_name'] ?><br>
                                        <span
                                            class="textproduct"><?php echo $row['type_name'] ?><br><?php echo $row['dura_date'] ?></span>
                                    </a>
                                </div>
                                <div class="col-md-1 col-sm-2">
                                    <a href="../evaluation.php?id=<?php echo $row['dura_id'] ?>"
                                        style="text-decoration: none;">
                                        <i class="far fa-clipboard editmem" style="margin-top: 5px;font-size: 19px"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php } ?>




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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>