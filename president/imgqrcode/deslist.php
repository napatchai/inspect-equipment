<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <?php include('../header.php') ?>
    <title>Admin Page</title>
</head>

<body>
    <?php 
    session_start();
    include('../condb.php');
     ?>
     <?php 
    // Include the database config file 
    include_once '../condb.php'; 
    $sql = "SELECT * FROM description";
    $result1 = mysqli_query($conn, $sql) or die ("ERROR query : $sql" . mysqli_error());
    // Fetch all the country data 
    $query = "SELECT * FROM category "; 
    $result = $conn->query($query); 
    ?>


    <!-- start popup Add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Description Add</h5>
                    </button>
                </div>
                <form name="frmMain" method="post" action="des_add.php" target="iframe_target">
                    <iframe id="iframe_target" name="iframe_target" src="#"
                        style="width:0;height:0;border:0px solid #fff;"></iframe>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Description ID:</label>
                            <input type="text" name="des_id" required class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Category :</label>
                        </div>
                        <select id="country" name="category_id" required class="form-control" id="recipient-name">
                        <option value="">Select Category</option>
                        <?php 
                        
                            if($result->num_rows > 0){ 
                                while($row = $result->fetch_assoc()){  
                                    echo '<option value="'.$row['category_id'].'">'.$row['category_id'] .' '.$row['category_name'].'</option>'; 
                                } 
                            }else{ 
                            echo '<option value="">Country not available</option>'; 
                        } 
                        ?>
                        </select>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Kind :</label>
                            <select id="state" name="kind_id" required class="form-control" id="recipient-name">
                                <option value="">Select country first</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Description Name:</label>
                            <input type="text" name="des_name" required class="form-control" id="recipient-name">
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
                    <h5 class="modal-title" id="exampleModalLabel">Description Edit</h5>
                    </button>
                </div>
                <form name="frmMain" method="post" action="des_edit.php" target="iframe_target">
                    <iframe id="iframe_target" name="iframe_target" src="#"
                        style="width:0;height:0;border:0px solid #fff;"></iframe>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Description ID:</label>
                            <input type="text" name="des_id" id="des_id" required class="form-control" id="recipient-name">
                            <input type="hidden" name="des_id1" id="des_id1" required class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Category :</label>
                        </div>
                        <select id="category" disabled name="category_id" require class="form-control" id="recipient-name">
                        <option value="">Select Category</option>
                        <?php 
                        $sql5 = "SELECT * FROM category";
                        $result5 = mysqli_query($conn, $sql5) or die ("ERROR query : $sql5" . mysqli_error());
                            if($result5->num_rows > 0){ 
                                while($row = $result5->fetch_assoc()){   ?>
                                    <option id="<?php echo $row['category_id'] ?>" value="<?php echo $row['category_id'] ?>"><?php echo $row['category_id'].' ' . $row['category_name'] ?></option>
                                <?php } 
                            }else{ 
                            echo '<option value="">Country not available</option>'; 
                        } 
                        ?>
                        </select>
                        <input type="hidden" name="category_id1" id="category_id">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Kind :</label>
                            <input type="text" disabled name="kind_id" id="kind_id" required class="form-control" id="recipient-name">
                            <input type="hidden" name="kind_id" id="kind_id1">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Description Name:</label>
                            <input type="text" name="des_name" id="des_name" required class="form-control" id="recipient-name">
                            <input type="hidden" name="des_name1" id="des_name1" required class="form-control" id="recipient-name">
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
                                        <span class="textunit">Add Description</span>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                    <?php while($row = mysqli_fetch_array($result1)){ ?>

                    <div class="col-md-4 col-sm-6" style="font-size: 15px;">
                        <div class="list">
                            <div class="row">
                                <div class="col-sm-3 img2">
                                    <img src="../img/4692523.jpg" width="100%" height="80px" class="imgmember"
                                        style="margin-top: 8%;margin-bottom: 8%;margin-left: 10%;" alt="">
                                </div>
                                <!-- <div  class="col-sm-6 textmember">Add Member</div> -->
                                <div class="col-md-7 col-sm-6">
                                    <span class="textunit"><?php echo $row['category_id'] . $row['kind_id'] . $row['des_id'] ?></span><br><br>
                                    <?php echo $row['des_name'] ?>
                                </div>
                                <div class="col-md-2 col-sm-3">
                                        <a href="#" class="edit-type" data-toggle="modal" data-target="#exampleModal1"
                                        data-whatever="@mdo" 
                                        data-id="<?php echo $row['des_id']; ?>"
                                        data-name="<?php echo $row['des_name']; ?>"
                                        data-cate="<?php echo $row['category_id']; ?>"
                                        data-kind="<?php echo $row['kind_id']; ?>"
                                        >
                                            <i   i class="far fa-edit editmem" style="margin-top: 5px;"></i>
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
                swal("Error", "Description Id is has been used !!", "error");
            } else if (result == 1) {
                swal("Error", "Description Name is has been used !!", "error");
            } else if (result == 2) {
                setTimeout(function () {
                    swal({
                        title: "Description add Success",
                        type: "success"
                    }, function () {
                        window.location = "./deslist.php"
                    })
                })
            } else if (result == 3) {
                swal("Error", "Somethine warning", "error");
            } else if (result == 4) {
                setTimeout(function () {
                    swal({
                        title: "Description edit Success",
                        type: "success"
                    }, function () {
                        window.location = "./deslist.php"
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
$(document).ready(function(){
    $('#country').on('change', function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select Cateegory first</option>');
        }
    });
    
});
</script>
<script>
$(document).ready(function(){
    $('#category').on('change', function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#kind').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select Cateegory first</option>');
        }
    });
});
</script>
</body>
</html>