<!DOCTYPE html>
<html lang="en">
<?php 
    if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./admin/style.css">
    <link rel="stylesheet" href="./scan.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <title>Admin Page</title>
        <script src="./qrscan/jsQR.js"></script>
    <script src="./qrscan//dw-qrscan.js"></script>
</head>

<body>
    <?php 
    session_start();

    if($_SESSION['per_level'] == 'a' || $_SESSION["per_status"] == 0){
        
    }elseif($_SESSION['per_level'] == 'p' || $_SESSION["per_status"] == 0){

    }elseif($_SESSION['per_level'] == 'd' || $_SESSION["per_status"] == 0){

    }else{
        header("Location: ./index.php ");	
    }
?>
    <?php
        if($_SESSION['per_level'] == 'a'){ ?>
        
            <nav style="background-color: #F5F5F5;">
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
        <nav style="background-color: #F5F5F5;">
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
            <li><a href="./scan.php" class="menu">Evaluation</a></li>
            <li><a href="index.php" class="menu">Report</a></li>
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
    <nav style="background-color: #F5F5F5;">
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

    <div id="loadingMessage" >🎥 Unable to access video stream (please make sure you have a webcam enabled)</div>
    <div style="margin-top: 90px;"></div>
    <div class="col-sm-12 col-md-3"></div>
    <div class="col-sm-12 col-md-6" style="border-radius: 50px;border: 1px solid #000;z-index: -1">
  <canvas id="canvas" hidden style="width: 100%;padding: 10px;border-radius: 50px"></canvas>
    
    </div>
    <div class="col-sm-12 col-md-3"></div>
  <div id="output" hidden>
    <div id="outputMessage" ></div>
    <div hidden><b>Data:</b> <span id="outputData"></span></div>
  </div>
  <script>
    var video = document.createElement("video");
    var canvasElement = document.getElementById("canvas");
    var canvas = canvasElement.getContext("2d");
    var loadingMessage = document.getElementById("loadingMessage");
    var outputContainer = document.getElementById("output");
    var outputMessage = document.getElementById("outputMessage");
    var outputData = document.getElementById("outputData");

    function drawLine(begin, end, color) {
      canvas.beginPath();
      canvas.moveTo(begin.x, begin.y);
      canvas.lineTo(end.x, end.y);
      canvas.lineWidth = 4;
      canvas.strokeStyle = color;
      canvas.stroke();
    }

    // Use facingMode: environment to attemt to get the front camera on phones
    navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }).then(function(stream) {
      video.srcObject = stream;
      video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
      video.play();
      requestAnimationFrame(tick);
    });

    function tick() {
      loadingMessage.innerText = "⌛ Loading video..."
      if (video.readyState === video.HAVE_ENOUGH_DATA) {
        loadingMessage.hidden = true;
        canvasElement.hidden = false;
        outputContainer.hidden = false;

        canvasElement.height = video.videoHeight;
        canvasElement.width = video.videoWidth;
        canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
        var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
        var code = jsQR(imageData.data, imageData.width, imageData.height, {
          inversionAttempts: "dontInvert",
        });
        if (code) {
          drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF3B58");
          drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF3B58");
          drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF3B58");
          drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF3B58");
          outputMessage.hidden = true;
          outputData.parentElement.hidden = false;
          var checklength = code.data.length;
          if(outputData != '' && (checklength <= 35 || checklength >= 31)){
              window.location.href = "./evaluation.php?id=" +code.data;
              outputData.innerText = code.data;
          }
        } else {
            outputData.innerText = "Incorece Infomation";
          outputMessage.hidden = false;
          outputData.parentElement.hidden = true;
        }
      }
      requestAnimationFrame(tick);
    }
  </script>

</body>

</html>