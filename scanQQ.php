<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./admin/style.css">
    <link rel="stylesheet" href="./scan.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Admin Page</title>
</head>

<body>
    <?php 
    session_start();

    // print_r($_SESSION);
    if($_SESSION['per_level'] == 'a' || $_SESSION["per_status"] == 0){
        
    }elseif($_SESSION['per_level'] == 'p' || $_SESSION["per_status"] == 0){

    }elseif($_SESSION['per_level'] == 'd' || $_SESSION["per_status"] == 0){

    }else{
        header("Location: ./index.php ");	
    }
?>
    <?php
        if($_SESSION['per_level'] == 'a'){ ?>
        
            <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <div class="imglogo">
            <a href="index.php">
                <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/KU_SubLogo_Thai.png" class="logo">
            </a>
        </div>
        <ul class="menu1">
            <form action="search.php" method="post" id="formsearch">
                <div class="search search1">
                    <input type="text" id="inputsearch" placeholder="Search" class="inputsearch">
                    <a href="#" onclick="next()"><i class="fas fa-search se"></i></a>
                </div>
            </form>
            <li class="menu ca" style="color: #d4d4d4;">-</li>
            <li><a href="./scan.php" class="menu">Evaluation</a></li>
            <li><a href="./admin/manage.php" class="menu">Manage</a></li>
            <li><a href="./admin/index.php" class="menu">Report</a></li>
            <li><a class="menu logout" href="./logout.php">Logout</a></li>
        </ul>
    </nav>

    <script>
    function next (){
        var search = document.getElementById('inputsearch').value
        var next1 = './search.php?search=' + search
        window.location = next1
    }
    </script>
     <?php   } 
    // include('./headerwelcomde.php');
    if($_SESSION['per_level'] == 'p'){ ?>
        <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <div class="imglogo">
            <a href="index.php">
                <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/KU_SubLogo_Thai.png" class="logo">
            </a>
        </div>
        <ul class="menu1">
            <form action="search.php" method="post" id="formsearch">
                <div class="search search1">
                    <input type="text" id="inputsearch" placeholder="Search" class="inputsearch">
                    <a href="#" onclick="next()"><i class="fas fa-search se"></i></a>
                </div>
            </form>
            <li class="menu ca" style="color: #d4d4d4;">-</li>
            <li><a href="./scan.php" class="menu">Evaluation</a></li>
            <li><a href="index.php" class="menu">Report</a></li>
            <li><a href="index.php" class="menu">Proflie</a></li>
            <li><a class="menu logout" href="./logout.php">Logout</a></li>
        </ul>
    </nav>

    <script>
    function next (){
        var search = document.getElementById('inputsearch').value
        var next1 = './search.php?search=' + search
        window.location = next1
    }
    </script>
    
    <?php }
    ?>
    <?php 

if($_SESSION['per_level'] == 'd'){ ?>
    <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <div class="imglogo">
        <a href="index.php">
            <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/KU_SubLogo_Thai.png" class="logo">
        </a>
    </div>
    <ul class="menu1">
        <form action="search.php" method="post" id="formsearch">
            <div class="search search1">
                <input type="text" id="inputsearch" placeholder="Search" class="inputsearch">
                <a href="#" onclick="next()"><i class="fas fa-search se"></i></a>
            </div>
        </form>
        <li class="menu ca" style="color: #d4d4d4;">-</li>
        <li><a href="" class="menu"></a></li>
        <li><a href="" class="menu"></a></li>
        <li><a href="" class="menu"></a></li>
        <li><a href="./scan.php" class="menu">Evaluation</a></li>
        <li><a class="menu logout" href="./logout.php">Logout</a></li>
    </ul>
</nav>

<script>
function next (){
    var search = document.getElementById('inputsearch').value
    var next1 = './search.php?search=' + search
    window.location = next1
}
</script>

<?php }
?>

    <div class="qrscan">
        <form action="evaluation.php">
            <canvas id="mycanvas"></canvas>
            <br>
            <input type="button" id="btnscan" value="Scan Now">
            <input type="hidden" id="datainput" name="datainput">
        </form>


    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- <script src="main.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"> -->
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="></script> -->
    <script src="./qrscan/jsQR.js"></script>
    <script src="./qrscan//dw-qrscan.js"></script>
    <!-- <script src="./scan.js"></script> -->
    <script>
        DWTQR("mycanvas");
        $("#btnscan").click(function () {
            dwStartScan();
            $("#datainput").val('');
        });

        function dwQRReader(data) {
            // alert(data);
            var next = './evaluation.php?id=' + data; 
            window.location = next
            $("#datainput").val(data);

        }
    </script>

</body>

</html>