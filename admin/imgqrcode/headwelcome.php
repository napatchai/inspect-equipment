<?php 
    if($_SESSION['per_level'] == 'a'){
        $level = 'Admin';
    }
    ?>
    <div style="margin-top: 90px;"></div>
    <div class="row" style="z-index: -1;">
        <div style="width: 10%;"></div>
        <div class="profile col-md-1 col-sm-1 col-xs-1">
            <img src="../img/profile.png" width="70px" class="img1">
        </div>
        <div class="col-md-6 col-sm-6 col-xs-1 username">
            Welcome <?php echo $_SESSION['per_firstname'] .'  ' . $_SESSION['per_lastname'] ?>
            <i class="far fa-edit edit" style="margin-left: 20px;"></i>
            <br>
            Member level: <?php echo $level ?>
            <div style="width: 100%;">
                <div style="width: 100%;">
                    <hr>
                </div>
            </div>
        </div>
    </div>