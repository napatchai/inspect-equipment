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

    <!-- start popup -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                    <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end popup -->

    <?php
    session_start();
    include('./navbar.php');
    ?>
    <div style="margin-top: 90px;"></div>
    <?php include('./headwelcome.php'); ?>
    <!-- start Content -->
    <div style="margin-top: 20px;" class="container">
        <!-- Start Under content -->
        <div class="under">

            <div style="font-size: 20px;margin-top: 20px;margin-bottom: 50px">
                <div class="row">
                    <div class="texton col-sm-12">Manage</div>
                    <div class="textunder col-sm-12" style="font-size: 13px;margin-top: 20px">Manage Type </div>
                    <div class="col-xs-4 col-sm-4 col-md-2"
                        style="margin-top: 20px;align-item: center; text-align: center;">
                        <a href="typelist.php">
                            <img src="../img/4560004.jpg" width="100%" alt="">
                        </a>
                        <div class="textunder" style="font-size: 15px">จัดการข้อมูลกลุ่มครุภัณฑ์</div>
                        <div class="texton" style="font-size: 15px">Manage Type</div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-xs-4 col-sm-4 col-md-2"
                        style="margin-top: 20px;align-item: center; text-align: center;">
                        <a href="unitlist.php">
                            <img src="../img/4120254.jpg" width="100%" alt="">
                        </a>
                        <div class="textunder" style="font-size: 15px">จัดการข้อมูลหน่วยนับ</div>
                        <div class="texton" style="font-size: 15px">Manage Unit</div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-xs-4 col-sm-4 col-md-2"
                        style="margin-top: 20px;align-item: center; text-align: center;">
                        <a href="agencylist.php">

                            <img src="../img/35877.jpg" width="100%" alt="">
                        </a>
                        <div class="textunder" style="font-size: 15px">จัดการข้อมูลหน่วยงานพัสดุ</div>
                        <div class="texton" style="font-size: 15px">Manage Agency</div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-xs-4 col-sm-4 col-md-2"
                        style="margin-top: 20px;align-item: center; text-align: center;">
                        <a href="categorylist.php">
                            <img src="../img/4559992.jpg" width="100%" alt="">
                        </a>
                        <div class="textunder" style="font-size: 15px">จัดการข้อมูลประเภทพัสดุ</div>
                        <div class="texton" style="font-size: 15px">Manage Category</div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-xs-4 col-sm-4 col-md-2"
                        style="margin-top: 20px;align-item: center; text-align: center;">
                        <a href="kindlist.php">
                            <img src="../img/17627.jpg" width="100%" height="140px" alt="">
                        </a>
                        <div class="textunder" style="font-size: 15px">จัดการข้อมูลชนิดพัสดุ</div>
                        <div class="texton" style="font-size: 15px">Manage Kind</div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-xs-4 col-sm-4 col-md-2"
                        style="margin-top: 20px;align-item: center; text-align: center;">
                        <a href="moneylist.php">
                            <img src="../img/42589.jpg" width="100%" height="140px" alt="">
                        </a>
                        <div class="textunder" style="font-size: 15px">จัดการข้อมูลประเภทแหล่งเงิน</div>
                        <div class="texton" style="font-size: 15px">Manage Money</div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-xs-4 col-sm-4 col-md-2"
                        style="margin-top: 20px;align-item: center; text-align: center;">
                        <a href="deslist.php">
                            <img src="../img/4692523.jpg" width="100%" alt="">
                        </a>
                        <div class="textunder" style="font-size: 15px">จัดการข้อมูลรายละเอียดพัสดุ</div>
                        <div class="texton" style="font-size: 15px">Manage Description</div>
                    </div>
                    <div class="textunder col-sm-12" style="font-size: 13px;margin-top: 50px">Manage Main Type</div>
                    <div class="col-xs-4 col-sm-4 col-md-2"
                        style="margin-top: 20px;align-item: center; text-align: center;">
                        <a href="memberlist.php">
                            <img src="../img/4157721.jpg" width="100%" alt="">
                        </a>
                        <div class="textunder" style="font-size: 15px">จัดการข้อมูลบุคลากร</div>
                        <div class="texton" style="font-size: 15px">Manage Personnel</div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-xs-4 col-sm-4 col-md-2"
                        style="margin-top: 20px;align-item: center; text-align: center;">
                        <a href="productlist.php">
                            <img src="../img/30797.jpg" width="100%" alt="">
                        </a>
                        <div class="textunder" style="font-size: 15px">จัดการข้อมูลครุภัณฑ์</div>
                        <div class="texton" style="font-size: 15px">Manage Durable Articles</div>
                    </div>
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