<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <?php include('../header.php'); ?>
    <title>Director Page</title>
</head>

<body>
    <?php 
    session_start();
    include('./navbar.php'); 
    include('../condb.php');
    echo "<span style='font-size: 15px'>";
    include('./headwelcome.php');
    echo "</span>";
    $id = mysqli_real_escape_string($conn, $_GET['agency']);
    $status = mysqli_real_escape_string($conn, $_GET['status']);
    $top = "SELECT *, COUNT(dura_id) as dura_count FROM durable as d 
    INNER JOIN Type as t ON d.type_id = t.type_id
    INNER JOIN agency as a ON d.agency_id = a.agency_id
    GROUP BY a.agency_id LIMIT 5";
    $resulttop = mysqli_query($conn, $top) or die ("ERROR : $top" . mysqli_error());
    ?>
    <div style="margin-top: 50px;"></div>
    <div class="container">
        <div class="col-sm-12 miss">
            <div class="logodete" style="float: left;background-color: #a0fafa">
                <div class="inside">
                    <a href="#" style="float: left;">
                        <img src="../img/business-center.png" width="70%" class="iconcon">
                    </a>
                </div>
            </div>
            <br><br>
            <div class="textall" style="margin-top: -30px">
                <span class="texton">Report Agency</span><br><span
                    class="textunder">รายงานครุภัณฑ์ตามหน่วยงานพัสดุ</span>
            </div>
        </div>
        <div style="margin-top: 70px"></div>
        <div class="col-sm-12">
            <div class="form-group">
                <div class="input-group">
                    <span
                        style="padding: 5px 0px;text-align: center;align-item: center;background: #EEEEEE;font-size: 15px;width:100px">Search</span>
                    <input type="text" name="search_text" id="search_text" style="font-size: 15px;"
                        placeholder="Search by Durable Articles Detail" class="form-control" />
                        <input type="hidden" id="id1" value="<?php echo $id ?>">
                        <input type="hidden" id="status" value="<?php echo $status ?>">
                </div>
            </div>
        </div>
        <br>
        <div id="result" style="font-size: 15px">
        
        </div>
    </div>



    <script>
        $(document).ready(function () {
            load_data();

            function load_data(query) {
                var id = $('#id1').val();
                var status = $('#status').val();
                $.ajax({
                    url: "report_agency_load.php",
                    method: "POST",
                    data: {query: query, id: id,status: status}   
                    ,
                    success: function (data) {
                        $('#result').html(data);
                    }
                });
            }
            $('#search_text').keyup(function () {
                var search = $(this).val();
                if (search != '') {
                    load_data(search);
                } else {
                    load_data();
                }
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