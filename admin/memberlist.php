<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <?php include('../header.php') ?>
    <title>Admin Page</title>
</head>

<body>
    <!-- start query personnel -->
    <?php 
    include('../condb.php');
    session_start();
        $sql = "SELECT * FROM personnel" or die ('ERROR : ' . mysqli_error());
        $result = mysqli_query($conn, $sql);
        function level($level2){
            if($level2 == "p"){
                echo "President";
            }elseif($level2 == "d"){
                echo "Director";
            }elseif($level2 == "a"){
                echo "Admin";
            }
        }
    ?>
    <!-- end query personnel -->

    <!-- start popup Add -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Personnel Add</h5>
                    </button>
                </div>
                <form name="frmMain" method="post" action="member_add.php" target="iframe_target">
                    <iframe id="iframe_target" name="iframe_target" src="#"
                        style="width:0;height:0;border:0px solid #fff;"></iframe>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Username:</label>
                            <input type="text" name="username" required class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Password:</label>
                            <input type="password" name="password" required class="form-control" minlength="8"
                                maxlength="20" id="recipient-name password">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Confirm-Password:</label><span
                                id='message'></span>
                            <input type="password" name="conpassword" required class="form-control"
                                id="recipient-name conpassword">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Level :</label>
                            <select name="level" class="form-control" required>
                                <option value="">--Select--</option>
                                <option value="p">--President--</option>
                                <option value="d">--Director--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">First Name:</label>
                            <input type="text" name="Fname" required class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Last Name:</label>
                            <input type="text" name="Lname" required class="form-control" id="recipient-name">
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
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Personnel Edit</h5>
                    </button>
                </div>
                <form name="frmMain" method="post" action="member_edit.php" target="iframe_target">
                    <iframe id="iframe_target" name="iframe_target" src="#"
                        style="width:0;height:0;border:0px solid #fff;"></iframe>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Username:</label>
                            <input type="text" id="username" name="username" required class="form-control"
                                id="recipient-name">
                            <input type="hidden" id="username1" name="username1" required class="form-control"
                                id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Level :</label>
                            <select name="level" class="form-control" required>
                                <option value="">--Select--</option>
                                <option value="p" id="p">--President--</option>
                                <option value="d" id="d">--Director--</option>
                                <option value="d" id="a" style="display: none;">--Admin--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">First Name:</label>
                            <input type="text" name="Fname" id="firstname" required class="form-control"
                                id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Last Name:</label>
                            <input type="text" name="Lname" id="lastname" required class="form-control"
                                id="recipient-name">
                            <input type="hidden" name="per_id" id="per_id" vlaue="">
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

    <div class="modal" id="exampleModal2" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form name="frmMain" method="post" action="memberdelete.php" target="iframe_target">
                <iframe id="iframe_target" name="iframe_target" src="#"
                    style="width:0;height:0;border:0px solid #fff;"></iframe>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Do you want to delete</h5>
                    </div>
                    <div class="modal-body">
                        <p>Do you want to delete</p>
                        <input type="hidden" id="id" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Start Navbar -->
    <?php include('./navbar.php'); ?>
    <!-- End Navbar -->
    <!-- Start Head welcome -->
    <?php include('./headwelcome.php'); ?>
    <!-- End Head welcome -->
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
                                        <img src="../img/user.png" width="100%" class="imgmember"
                                            style="margin-top: 8%;margin-bottom: 8%;margin-left: 10%;" alt="">
                                    </div>
                                    <!-- <div  class="col-sm-6 textmember">Add Member</div> -->
                                    <div class="col-sm-6" style="margin-top: 5%;">
                                        Add Member
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>


                    <?php while($row = mysqli_fetch_array($result)){ 
                        $strlevel = $row['per_level']; 
                        if($row['per_status'] == 0){
                            $status = '<span style="color: #6ac92a">เปิดใช้งาน</span>';
                        } else if($row['per_status'] == 1){
                            $status = '<span style="color: #e62e09">ปิดใช้งาน</span>';
                        } 
                    ?>
                    <div class="col-md-4 col-sm-6" style="font-size: 15px;">
                        <div class="list">
                            <div class="row">
                                <div class="col-sm-3 img2">
                                    <img src="../img/profile.png" width="100%" class="imgmember"
                                        style="margin-top: 8%;margin-bottom: 8%;margin-left: 10%;" alt="">
                                </div>
                                <div class="col-md-7 col-sm-6 textmember">
                                    <?php echo $row['per_username'] . ' '. $status; ?>
                                    <br>
                                    <span style="font-weight: lighter;">
                                        <?php echo $row['per_firstname'] . ' ' . $row['per_lastname']; ?></span>
                                    <br><br>
                                    <span style="font-weight: lighter;font-size: 13px">Level Member :
                                        <?php level($strlevel); ?></span>
                                </div>
                                <div class="col-md-2 col-sm-3">
                                    <a href="#" class="edit-personnel" data-toggle="modal" data-target="#exampleModal1"
                                        data-whatever="@mdo" data-id="<?php echo $row['per_id']; ?>"
                                        data-username="<?php echo $row['per_username']; ?>"
                                        data-firstname="<?php echo $row['per_firstname']; ?>"
                                        data-lastname="<?php echo $row['per_lastname']; ?>"
                                        data-level="<?php echo $row['per_level']; ?>">
                                        <i i class="far fa-edit editmem" style="margin-top: 5px;"></i>
                                    </a>

                                    <!-- <button onclick="edit()"><i i class="far fa-edit editmem" style="margin-top: 5px;"></i></button> -->
                                    <?php 
                                    if($row['per_status'] == 0 ){
                                        echo '<a href="#" onclick="edit(\''.$row['per_id'].'\')" data-toggle="modal" data-target="#exampleModal2"
                                        data-whatever="@mdo"><i i class="far fa-trash-alt editmem" style="margin-top: 50px;"></i></a>';
                                    }else{
                                        echo '<a href="#" onclick="edit(\''.$row['per_id'].'\')" data-toggle="modal" data-target="#exampleModal2"
                                        data-whatever="@mdo"><i i class="fas fa-user-plus editmem" style="margin-top: 50px;"></i></a>';
                                    }
                                     ?>


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
    <script src="member.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
        function edit(data) {
            $('#id').val(data);
        }
        
    </script>

    <script>
    $(document).ready(function () {
    $('.edit-personnel').click(function () {
        //get data from edit btn
        var id = $(this).attr('data-id');
        var firstname = $(this).attr('data-firstname');
        var lastname = $(this).attr('data-lastname');
        var level = $(this).attr('data-level');
        var username = $(this).attr('data-username');
        //set value to model
        $('#per_id').val(id);
        $('#firstname').val(firstname);
        $('#lastname').val(lastname);
        $('#username').val(username);
        $('#username1').val(username);
        if (level == 'p') {
            document.getElementById("p").selected = "true";
            document.getElementById("p").style.display = "block";
            document.getElementById("d").style.display = "block";
            document.getElementById("a").style.display = "none";
        } else if (level == 'd') {
            document.getElementById("d").selected = "true";
            document.getElementById("p").style.display = "block";
            document.getElementById("d").style.display = "block";
            document.getElementById("a").style.display = "none";
        } else if (level == 'a') {
            document.getElementById("a").style.display = "block";
            document.getElementById("a").selected = "true";
            document.getElementById("p").style.display = "none";
            document.getElementById("d").style.display = "none";
        }
    })
})</script>
    

    <script>
    function showResult1(result) {
        if (result == 5) {
        setTimeout(function () {
            swal({
                title: "Personnel delete Success",
                type: "success"
            }, function () {
                window.location = "./memberlist.php";
            });
        }, 1000);
    } else if (result == 4) {
        swal("", "Something warning !!", "error");
    }
}
    </script>

</body>

</html>