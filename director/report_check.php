<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <title>Director Page</title>
</head>

<body>

    <?php 
    session_start();
    include('./navbar.php');
     ?>
    <div style="margin-top: 90px;"></div>
    <?php include('./headwelcome.php'); ?>

    <!-- start content -->
    <div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-sm-4">
                <span style="font-size: 22px;font-weight: bold;color: #8E8E8E;">Add Durable Articles</span>
                <div class="QRcode">
                    <img src= 
                    "https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0"
                            class="qr-code img-thumbnail img-responsive imgqrcodereal1" /> 
                </div>
            </div>
            <div class="inputaddproduct col-sm-8">
                <form action="#">
                    <div class="row">
                        <div class="col-sm-4">
                            Name
                            <br>
                            <input type="text" required name="name" class="inputadd1" value="Name" disabled style="background: none;padding: 5px">
                            
                        </div>
                        <div class="col-sm-4">
                            Type ID
                            <input type="text" required name="name" class="inputadd1" value="Type ID" disabled style="background: none;padding: 5px">
                        </div>
                        <div class="col-sm-4">
                            Type Name
                            <br>
                            <input type="text" required name="typename" class="inputadd1" value="Type Name" disabled style="background: none;padding: 5px">
                        </div>
                        <br><br><br><br>
                        <div class="col-sm-8">
                            ID Durable Articles
                            <br>
                            <!-- <input type="text" required name="iddurablearticles" class="inputadd1"> -->
                            <input type="text" size="60" maxlength="60" class="form-control inputadd1" id="content" value="1-k2200-FN01-09200001" disabled  style="background: none;padding: 5px"/> 
                        </div>
                        <div class="col-sm-4">
                            <br>
                            <input type="button" id="generate" required value="Generate QR code" class="gen">
                        </div>
                        <br><br><br><br>
                        <div class="col-sm-3">
                            วันที่ได้รับมา
                            <br>
                            <input type="text" required name="typename" class="inputadd1" value="14/1/64" disabled style="background: none;padding: 5px">
                        </div>
                        <div class="col-sm-3">
                            จำนวน
                            <br>
                            <input type="text" required name="typename" class="inputadd1" value="1" disabled style="background: none;padding: 5px;text-align: right;">
                        </div>
                        <div class="col-sm-3">
                            หน่วยวัด
                            <br>
                            <input type="text" required name="typename" class="inputadd1" value="ตัว" disabled style="background: none;padding: 5px">
                        </div>
                        <div class="col-sm-3">
                            ราคาทุน (รวม VAT)
                            <br>
                            <input type="number" required name="typename" class="inputadd1" value="1000000" disabled style="background: none;padding: 5px">
                        </div>
                        <br><br><br><br>
                        <div class="col-sm-8">
                            
                        </div>
                        <div class="col-sm-3" style="margin-top: 25px;">
                            <div class="row">
                                <div class="col-sm-7">
                                    <input type="button" value="Submit" class="buttonsubmit">
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


    <script src="https://code.jquery.com/jquery-3.5.1.js">
    </script>

    <script>
        // Function to HTML encode the text 
        // This creates a new hidden element, 
        // inserts the given text into it 
        // and outputs it out as HTML 
        function htmlEncode(value) {
            return $('<div/>').text(value)
                .html();
        }

        $(function () {

            // Specify an onclick function 
            // for the generate button 
            $('#generate').click(function () {

                // Generate the link that would be 
                // used to generate the QR Code 
                // with the given data 
                let finalURL =
                    'https://chart.googleapis.com/chart?cht=qr&chl=' +
                    htmlEncode($('#content').val()) +
                    '&chs=160x160&chld=L|0'

                // Replace the src of the image with 
                // the QR code image 
                $('.qr-code').attr('src', finalURL);
            });
        });
    </script>
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