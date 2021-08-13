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
    <title>Admin Page</title>
</head>

<body>
    <?php 
    session_start();
    include('../condb.php');
    $sql = "SELECT * FROM category";
    $result = mysqli_query($conn, $sql) or die ("ERROR query : $sql" . mysqli_error());
     ?>


    <!-- start popup Add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category Add</h5>
                    </button>
                </div>
                <form name="frmMain" method="post" action="category_add.php" target="iframe_target">
                    <iframe id="iframe_target" name="iframe_target" src="#"
                        style="width:0;height:0;border:0px solid #fff;"></iframe>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Category ID:</label>
                            <input type="text" name="category_id" required class="form-control" id="recipient-name" placeholder="Please complete 4 characters.">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Category Name:</label>
                            <input type="text" name="category_name" required class="form-control" id="recipient-name" placeholder="Category Name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end popup Add -->

    <!-- start popup Edit -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category Edit</h5>
                    </button>
                </div>
                <form name="frmMain" method="post" action="category_edit.php" target="iframe_target">
                    <iframe id="iframe_target" name="iframe_target" src="#"
                        style="width:0;height:0;border:0px solid #fff;"></iframe>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Category ID:</label>
                            <input type="text" disabled name="category_id" id="category_id" required class="form-control"
                                id="recipient-name" placeholder="Please complete 5 characters.">
                            <input type="hidden" name="category_id1" id="category_id1" required class="form-control"
                                id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Category Name:</label>
                            <input type="text" name="category_name" id="category_name" required class="form-control"
                                id="recipient-name" placeholder="Category Name">
                            <input type="hidden" name="category_name1" id="category_name1" required class="form-control"
                                id="recipient-name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end popup Edit -->

    <?php include('./navbar.php'); ?>
    <div style="margin-top: 90px;"></div>
    <?php include('./headwelcome.php') ?>
    <!-- start Content -->
    <div style="margin-top: 20px;">
        <!-- Start Under content -->
        <div class="under">


            <div class="container">
                <div class="row">

                    <div class="col-md-4 col-sm-6" style="font-size: 15px;">
                        <div class="list">
                            <a href="#" style="text-decoration: none;" data-toggle="modal" data-target="#exampleModal"
                                data-whatever="@mdo">
                                <div class="row">
                                    <div class="col-sm-3 img2">
                                        <img src="../img/add.png" width="100%" class="imgmember"
                                            style="margin-top: 8%;margin-bottom: 8%;margin-left: 10%;" alt="">
                                    </div>
                                    <!-- <div  class="col-sm-6 textmember">Add Member</div> -->
                                    <div class="col-sm-6">
                                        <span class="textunit">Add Category</span>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                    <?php while($row = mysqli_fetch_array($result)){ ?>

                    <div class="col-md-4 col-sm-6" style="font-size: 15px;">
                        <div class="list">
                            <div class="row">
                                <div class="col-sm-3 img2">
                                    <img src="../img/4559992.jpg" width="100%" class="imgmember"
                                        style="margin-top: 8%;margin-bottom: 8%;margin-left: 10%;" alt="">
                                </div>
                                <!-- <div  class="col-sm-6 textmember">Add Member</div> -->
                                <div class="col-md-7 col-sm-6">
                                    <span class="textunit"><?php echo $row['category_id'] ?></span><br><br>
                                    <?php echo $row['category_name'] ?>
                                </div>
                                <div class="col-md-2 col-sm-3">
                                    <a href="#" class="edit-type" style="position: relative;top: 22%"
                                        data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo"
                                        data-name="<?php echo $row['category_name']; ?>"
                                        data-id="<?php echo $row['category_id']; ?>">
                                        <i i class="far fa-edit editmem" style="margin-top: 5px;"></i>
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
                swal("Error", "Category Id is has been used !!", "error");
            } else if (result == 1) {
                swal("Error", "Category Name is has been used !!", "error");
            } else if (result == 2) {
                setTimeout(function () {
                    swal({
                        title: "Category add Success",
                        type: "success"
                    }, function () {
                        window.location = "./categorylist.php"
                    })
                })
            } else if (result == 3) {
                swal("Error", "Somethine warning", "error");
            } else if (result == 4) {
                setTimeout(function () {
                    swal({
                        title: "Category edit Success",
                        type: "success"
                    }, function () {
                        window.location = "./categorylist.php"
                    })
                })
            }
        }

        $(document).ready(function () {
            $('.edit-type').click(function () {
                var name = $(this).attr('data-name');
                var id = $(this).attr('data-id');
                $('#category_id').val(id);
                $('#category_id1').val(id);
                $('#category_name').val(name);
                $('#category_name1').val(name);
            })
        })
    </script>

</body>

</html>