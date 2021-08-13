<?php
    if($_SESSION['per_level'] != 'p' || $_SESSION["per_status"] == 1){
        header("Location: ../index.php ");	
    }
?>
<script src="./main.js"></script>
<nav style="z-index: 100">
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
                    <input type="text" name="search" id="inputsearch" placeholder="Search" class="inputsearch">
                    <a href="#" onclick="next()"><i class="fas fa-search se"></i></a>
                </div>
            </form>
            <li class="menu ca" style="color: #d4d4d4;">-</li>
            <li><a href="../scan.php" class="menu"></a></li>
            <li><a href="../scan.php" class="menu">Evaluation</a></li>
            <li><a href="index.php" class="menu">Report</a></li>
            <li><a class="menu logout" href="../logout.php">Logout</a></li>
        </ul>
    </nav>


    <script>
    function next (){
        var search = document.getElementById('inputsearch').value
        var next1 = './search.php?search=' + search
        window.location = next1
    }
    </script>