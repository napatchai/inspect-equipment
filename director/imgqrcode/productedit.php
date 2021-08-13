<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <?php include('../header.php') ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Admin Page</title>
</head>

<body>
    <?php
        session_start();
        include('../condb.php');
        include('./navbar.php');
    ?>

    <div style="margin-top: 90px;"></div>
    <?php include('./headwelcome.php'); 
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $query1 = "SELECT * FROM durable as d INNER JOIN money as m ON d.money_id = m.money_id INNER JOIN Type as t ON d.type_id = t.type_id
            INNER JOIN agency as a ON d.agency_id = a.agency_id
            INNER JOIN category AS c ON d.category_id = c.category_id
            WHERE dura_id = '$id'";
            $resule = mysqli_query($conn, $query1) or die ("ERROR : $query1" . mysqli_error());
            $row = mysqli_fetch_array($resule);
            $mon1 = $row['money_id'];
            $agen1 = $row['agency_id'];
            $agenname1 = $row['agency_name'];
            $ty1 = $row['type_id'];
            $tyname1 = $row['type_name'];
            $cate1 = $row['category_id'];
           $catename1 = $row['category_name'];
           $ki = $row['kind_id'];
           $de1 = $row['des_id'];
           $da1 = $row['dura_date'];
           $yda1 = substr($da1, 0,4) - 543;
           $dm1 = substr($da1, 4,9);
           $relda1 = $yda1 . $dm1;
           $uni1 = $row['unit_id'];
           $ca1 =$row['dura_cost'];
           $co1 = $row['code_year'];
    ?>

    <!-- start content -->
    <div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-sm-4">
                <span style="font-size: 22px;font-weight: bold;color: #8E8E8E;">Edit Durable Articles</span>
                <div class="QRcode">
                    <img src="https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0"
                        class="qr-code img-thumbnail img-responsive imgqrcodereal1" />
                </div>
            </div>
            <div class="inputaddproduct col-sm-8">
                <form name="frmMain" action="productedit_db.php" method="POST" target="iframe_target">
                    <iframe id="iframe_target" name="iframe_target" src="#"
                        style="width:0;height:0;border:0px solid #fff;"></iframe>
                        <input type="hidden" name="last" value="<?php echo substr($id, -4) ?>">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="row">
                        <div class="col-sm-4">
                            Name :
                            <br>
                            <input type="text" required name="name" class="inputadd1" style="padding: 5px"
                                value="<?php echo $row['dura_name'] ?>">
                        </div>
                        <div class="col-sm-3">
                            <?php  
                            $querymoney = "SELECT * FROM money WHERE money_id != '$mon1'"; 
                            $resultmoney = $conn->query($querymoney); 
                        ?>
                            Money :
                            <select name="money_id" id="money_id" required class="inputadd">
                                <option value="<?php echo $mon1 ?>">
                                    <?php echo $row['money_id'] . ' ' . $row['money_name'] ?></option>
                                <?php while($row = mysqli_fetch_array($resultmoney)){ ?>
                                <option value="<?php echo $row['money_id'] ?>">
                                    <?php echo $row['money_id'] . ' ' . $row['money_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <?php 
                            $queryagency = "SELECT * FROM agency WHERE agency_id != '$agen1'"; 
                            $resultagency = $conn->query($queryagency); 
                            ?>
                            Agency :
                            <select name="agency_id" id="agency_id" required class="inputadd" style="padding: 5px">
                                <option value="<?php echo $agen1 ?>"><?php echo $agen1 . ' ' . $agenname1 ?></option>
                                <?php while($row = mysqli_fetch_array($resultagency)){ ?>
                                <option value="<?php echo $row['agency_id'] ?>">
                                    <?php echo $row['agency_id'] . ' ' . $row['agency_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <br><br><br>
                        <div class="col-sm-4">
                            <?php  
                            $querytype = "SELECT * FROM type "; 
                            $resulttype = $conn->query($querytype); 
                        ?>
                            Type :
                            <select name="type_id" id="type_id" required class="inputadd">
                                <option value="<?php echo $ty1 ?>"><?php echo $ty1 . ' ' . $tyname1; ?></option>
                                <?php while($row = mysqli_fetch_array($resulttype)){ ?>
                                <option value="<?php echo $row['type_id'] ?>">
                                    <?php echo $row['type_id'] . ' ' . $row['type_name'] ?></option>
                                <?php } ?>
                            </select>
                            <input type="hidden" id="kind_test" value="<?php echo $ki ?>">
                        </div>
                        <div class="col-sm-8">
                            <?php  
                            $querycategory = "SELECT * FROM category WHERE category_id != '$cate1'"; 
                            $resultcategory = $conn->query($querycategory); 
                        ?>
                            Category :
                            <select id="country" name="category_id" required class="inputadd" id="recipient-name">
                                <option value="<?php echo $cate1 ?>"><?php echo $cate1 .' ' . $catename1 ?></option>
                                <?php 
                                    $query = "SELECT * FROM category WHERE category_id != '$cate1'"; 
                                    $result = $conn->query($query);
                                        if($result->num_rows > 0){ 
                                            while($row = $result->fetch_assoc()){  
                                                echo '<option value="'.$row['category_id'].'">'.$row['category_id'] .' '.$row['category_name'].'</option>'; 
                                            } 
                                        }else{ 
                                        echo '<option value="">Category not available</option>'; 
                                    } 
                                    ?>
                            </select>
                        </div>

                        <div class="col-sm-4" style="margin-top: 10px">
                            Kind :
                            <select id="state" name="kind_id" required class="inputadd" id="recipient-name">
                                <option value="">Select Category first</option>
                            </select>
                        </div>
                        <script>
                            var countryID = document.getElementById("country").value;
                            if (countryID) {
                                $.ajax({
                                    type: 'POST',
                                    url: 'ajaxData.php',
                                    data: 'country_id=' + countryID,
                                    success: function (html) {
                                        $('#state').html(html);
                                        var kindid = document.getElementById("kind_test").value;
                                        document.getElementById(kindid).selected = "true";
                                        $('#city').html(
                                            '<option value="">Select Kind first</option>');
                                    }
                                });

                            } else {
                                $('#state').html('<option value="">Select Cateegory first</option>');
                                $('#city').html('<option value="">Select Cateegory first</option>');
                            }
                        </script>
                        <div class="col-sm-4" style="margin-top: 20px">
                            Description :
                            <select id="city" name="des_id" required class="inputadd" id="recipient-name">
                                <option value="">Select Category first</option>
                            </select>
                        </div>
                        <input type="hidden" id="des_test" value="<?php echo $de1 ?>">
                        <input type="hidden" id="unit_test" value="<?php echo $uni1 ?>">
                        <script>
                            var stateID = document.getElementById("kind_test").value;
                            var country_id = document.getElementById("country").value;
                            if (stateID) {
                                $.ajax({
                                    type: 'POST',
                                    url: 'ajaxData.php',
                                    data: {
                                        state_id: stateID,
                                        country_id: country_id
                                    },
                                    success: function (html) {
                                        $('#city').html(html);
                                        var desid = document.getElementById("des_test").value;

                                        document.getElementById(desid).selected = "true";


                                    }
                                });
                            } else {

                                $('#city').html('<option value="">Select Cateegory first</option>');
                            }
                        </script>
                        <div class="col-sm-4" style="margin-top: 20px">
                            <br>
                            <input type="button" id="generate" required value="Generate QR code" class="gen">
                        </div>
                        <br><br><br><br>
                        <div class="col-sm-3">
                            Date Recived
                            <br>
                            <input type="date" max="<?php echo date('Y-m-d') ?>" required name="date" class="inputadd1"
                                style="padding: 5px" value="<?php echo $relda1 ?>">
                        </div>
                        <div class="col-sm-3">
                            Unit :
                            <br>
                            <select name="typeunit" required class="inputadd">
                                <option value="">Select Unit</option>
                                <?php 
                                    $queryunit = "SELECT * FROM unit "; 
                                    $resultunit = $conn->query($queryunit);
                                        if($result->num_rows > 0){ 
                                            while($row = $resultunit->fetch_assoc()){   ?>
                                <option id="<?php echo $row['unit_id'] ?>" value="<?php echo $row['unit_id'] ?>">
                                    <?php echo $row['unit_name'] ?></option>
                                <?php  } 
                                        }else{ 
                                        echo '<option value="">Category not available</option>'; 
                                    } 
                                    ?>
                            </select>
                        </div>
                        <script>
                            var uniid = document.getElementById("unit_test").value;
                            document.getElementById(uniid).selected = "true";
                        </script>
                        <div class="col-sm-3">
                            Cost (VAT Include)
                            <br>
                            <input type="number" required name="cost" class="inputadd1" style="text-align: right;"
                                step="0.01" value="<?php echo $ca1 ?>">
                        </div>
                        <br><br><br><br>
                        <input type="hidden" value="<?php echo $co1 ?>" id="code_tesy">
                        <div class="col-sm-2">
                            <!-- รูปครุภัณฑ์
                            <br>
                            <div class="inputadd1">
                                <input type="file" style="margin-left: 20px;margin-top: 1px;">
                            </div> -->
                            Code Year :
                            <br>
                            <select name="date_id" required class="inputadd" style="width: 100px">
                                <?php 
                            $y =date("Y") + 543; 
                            $y1 = substr($y , -2);
                            ?>
                                <option value="<?php echo $y1; ?>"><?php echo $y1; ?></option>
                                <?php 
                                        $y1--;
                                        for(;$y1 > "0"; $y1--){?>
                                <option id="<?php echo $y1; ?>" value="<?php echo $y1; ?>"><?php echo $y1; ?></option>
                                <?php } ?>
                            </select>
                            <script>
                            var codid = document.getElementById("code_tesy").value;
                            document.getElementById(codid).selected = "true";
                        </script>

                        </div>
                        <div class="col-sm-8"></div>
                        <div class="col-sm-3" style="margin-top: 25px;">
                            <div class="row">
                                <br>
                                <div class="col-sm-7">
                                    <input type="submit" value="Submit" class="buttonsubmit">
                                </div>
                                <div class="col-sm-2">
                                    <input type="button" value="back" class="buttonback">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
    <script src="type.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        function showResult(result) {
            if (result == 0) {
                swal("Error", "Durable Articles Id is has been used !!", "error");
            } else if (result == 1) {
                swal("Error", "Durable Articles Name is has been used !!", "error");
            } else if (result == 2) {
                setTimeout(function () {
                    swal({
                        title: "Durable Articles add Success",
                        type: "success"
                    }, function () {
                        window.location = "./productlist.php"
                    })
                })
            } else if (result == 3) {
                swal("Error", "Somethine warning", "error");
            } else if (result == 4) {
                setTimeout(function () {
                    swal({
                        title: "Durable Articles edit Success",
                        type: "success"
                    }, function () {
                        window.location = "./productlist.php"
                    })
                })
            }
        }

        $(document).ready(function () {
            $('.edit-type').click(function () {
                var name = $(this).attr('data-name');
                var id = $(this).attr('data-id');
                var cate = $(this).attr('data-cate');
                var kind = $(this).attr('data-kind');
                $('#des_id').val(id);
                $('#des_id1').val(id);
                $('#category_id').val(cate);
                $('#kind_id').val(kind);
                $('#kind_id1').val(kind);
                $('#des_name').val(name);
                $('#des_name1').val(name);
                document.getElementById(cate).selected = "true";
            })

        })
    </script>


</body>

</html>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>


    <script>
        $(document).ready(function () {
            $('#country').on('change', function () {
                var countryID = $(this).val();
                if (countryID) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajaxData.php',
                        data: 'country_id=' + countryID,
                        success: function (html) {
                            $('#state').html(html);
                            $('#city').html('<option value="">Select Kind first</option>');
                        }
                    });
                } else {
                    $('#state').html('<option value="">Select Cateegory first</option>');
                    $('#city').html('<option value="">Select Cateegory first</option>');
                }
            });

            $('#state').on('change', function () {
                var stateID = $(this).val();
                var country_id = document.getElementById("country").value;
                if (stateID) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajaxData.php',
                        data: {
                            state_id: stateID,
                            country_id: country_id
                        },
                        success: function (html) {
                            $('#city').html(html);

                        }
                    });
                } else {

                    $('#city').html('<option value="">Select Cateegory first</option>');
                }
            });




        });
    </script>

</body>

</html>