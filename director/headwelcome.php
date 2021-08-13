
    
    
    <?php include('../header.php'); ?>
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


<!-- start popup Add -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> -->
    <div class="modal fade" id="exampleModal15" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                    </button>
                </div>
                <form name="frmMain" method="post" action="profile_edit.php" target="iframe_target">
                    <iframe id="iframe_target" name="iframe_target" src="#"
                        style="width:0;height:0;border:0px solid #fff;"></iframe>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Username:</label>
                            <input type="text" name="username" value="<?php echo $_SESSION['per_username'] ?>" required class="form-control" id="recipient-name">
                            <input type="hidden" name="username1" value="<?php echo $_SESSION['per_username'] ?>" required class="form-control" id="recipient-name">
                            <input type="hidden" name="per_id" value="<?php echo $_SESSION['per_id'] ?>" required class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">First Name:</label>
                            <input type="text" name="Fname" value="<?php echo $_SESSION['per_firstname'] ?>" required class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Last Name:</label>
                            <input type="text" name="Lname" value="<?php echo $_SESSION['per_lastname'] ?>" required class="form-control" id="recipient-name">
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



<!-- start popup edit password -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> -->
    <div class="modal fade" id="exampleModal16" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Password</h5>
                    </button>
                </div>
                <form name="frmMain" method="post" action="edit_password.php" target="iframe_target">
                    <iframe id="iframe_target" name="iframe_target" src="#"
                        style="width:0;height:0;border:0px solid #fff;"></iframe>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Old Password:</label>
                            <input type="password" name="old_password"  required class="form-control" id="recipient-name">
                            <input type="hidden" name="per_id" value="<?php echo $_SESSION['per_id'] ?>" required class="form-control" id="recipient-name">
                            <input type="hidden" name="old_pass" value="<?php echo $_SESSION['per_password'] ?>" required class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">New Password:</label>
                            <input type="password" name="new_password" id="new_pass"  required class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">confirm Password:</label>
                            <input type="password" name="con_password" id="con_pass"  required class="form-control" id="recipient-name">
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
            <img src="../img/profile.png" width="70px" class="img1">
        </div>
        <div class="col-md-3 col-sm-6 col-xs-1 username">
            Welcome <?php echo $_SESSION['per_firstname'] .'  ' . $_SESSION['per_lastname'] ?>
            <!-- <i onclick="test()" class="far fa-edit " style="margin-left: 20px;margin-top: 2px"></i> -->
            <br>
            Member level: <?php echo $level ?>
            <div style="width: 100%;">
                <div style="width: 100%;">
                    <!-- <hr> -->
                </div>
            </div>
        </div>
        <div class="col-sm-1" style="text-align: center;margin-top: 9px">
            <a href="#" class="edit-personnel" data-toggle="modal" data-target="#exampleModal15"
                                        data-whatever="@mdo">
                <i class="far fa-edit"></i>
            </a>
            <br>
            <a href="#" class="edit-personnel" data-toggle="modal" data-target="#exampleModal16"
                                        data-whatever="@mdo">
            <i class="fas fa-key"></i>
            </a>
        </div><br class="none"><br class="none"><br class="none"><br class="none">
        <hr style="z-index: -1">
    </div>

    <script>
    $(document).ready(function(){
        $('.edit-type').click(function(){

        })
    })
    </script>

<script>
    function showResult(result) {
        if (result == 8) {
            swal("Error", "password and confirm-password are not match !!", "error");
    }else if (result == 9) {
            swal("Error", "The old password is incorrect.!!", "error");
    }else if (result == 7) {
        setTimeout(function () {
            swal({
                title: "Edit Password Success",
                type: "success"
            }, function () {
                window.location = "./index.php";
            });
        }, 1000);
    }
}
    </script>