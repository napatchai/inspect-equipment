<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>

<body>
    <?php
        session_start();
        if(@$_SESSION['per_level'] == 'a'){?>
    <script>
        window.location = "./admin";
    </script>
    <?php }elseif(@$_SESSION['per_level'] == 'p'){ ?>
    <script>
        window.location = "./president";
    </script>
    <?php }elseif(@$_SESSION['per_level'] == 'd'){ ?>
    <script>
        window.location = "./director";
    </script>
    <?php } ?>
    <div class="box">
        <div class="logologin">
            <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/KU_SubLogo_Thai.png" width="150px"
                height="150px">
        </div>
        <form name="frmMain" method="post" action="checklogin.php" target="iframe_target">
            <iframe id="iframe_target" name="iframe_target" src="#"
                style="width:0;height:0;border:0px solid #fff;"></iframe>
            <div class="email">
                <div class="row">
                    <div class="iconmail">
                        <i class="fas fa-envelope"></i>
                        <input class="inputemail" name="username" type="text" placeholder="Username" required>
                    </div>
                </div>
            </div>
            <div class="password">
                <div class="row">
                    <div class="iconmail">
                        <i class="fas fa-lock"></i>
                        <input class="inputemail" name="password" type="password" placeholder="Password" required>
                    </div>
                </div>
            </div>
            <div class="login">
                <input type="submit" value="Login" class="btnlogin">
            </div>
        </form>
        <!-- <div class="forget">
            <span style="color: #ADADAD;">Forget</span> <span style="color: #676767;">Username / Password ?</span>
        </div> -->
        <div class="createacc">
            <a class="create" href="">
                <!-- Create you Account —> -->
            </a>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>
</body>

</html>

<script language="JavaScript">
    function showResult(result) {
        if (result == 1) {
            swal("", "Username หรือ Password ไม่ถูกต้อง !!", "error");
        } else if (result == 0) {
            setTimeout(function () {
                swal({
                    title: "Login Success",
                    type: "success"
                }, function () {
                    window.location = "./admin"; //หน้าที่ต้องการให้กระโดดไป
                });
            }, 1000);
        } else if(result==2){
            swal("", "ถูกละงับการใช้งาน", "error");
        }else if (result == 3) {
            setTimeout(function () {
                swal({
                    title: "Login Success",
                    type: "success"
                }, function () {
                    window.location = "./president"; 
                });
            }, 1000);
        }else if (result == 4) {
            setTimeout(function () {
                swal({
                    title: "Login Success",
                    type: "success"
                }, function () {
                    window.location = "./director"; 
                });
            }, 1000);
        }
    }
</script>