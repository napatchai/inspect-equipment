<?php 

    session_start();
/**
 * QR_BarCode - Barcode QR Code Image Generator
 * @author CodexWorld
 * @url http://www.codexworld.com
 * @license http://www.codexworld.com/license/
 */
class QR_BarCode{
    // Google Chart API URL
    private $googleChartAPI = 'http://chart.apis.google.com/chart';
    // Code data
    private $codeData;
    
    /**
     * URL QR code
     * @param string $url
     */
    public function url($url = null){
        $this->codeData = preg_match("#^https?\:\/\/#", $url) ? $url : "http://{$url}";
    }
    
    /**
     * Text QR code
     * @param string $text
     */
    public function text($text){
        $this->codeData = $text;
    }
    
    /**
     * Email address QR code
     *
     * @param string $email
     * @param string $subject
     * @param string $message
     */
    public function email($email = null, $subject = null, $message = null) {
        $this->codeData = "MATMSG:TO:{$email};SUB:{$subject};BODY:{$message};;";
    }
    
    /**
     * Phone QR code
     * @param string $phone
     */
    public function phone($phone){
        $this->codeData = "TEL:{$phone}";
    }
    
    /**
     * SMS QR code
     *
     * @param string $phone
     * @param string $text
     */
    public function sms($phone = null, $msg = null) {
        $this->codeData = "SMSTO:{$phone}:{$msg}";
    }
    
    /**
     * VCARD QR code
     *
     * @param string $name
     * @param string $address
     * @param string $phone
     * @param string $email
     */
    public function contact($name = null, $address = null, $phone = null, $email = null) {
        $this->codeData = "MECARD:N:{$name};ADR:{$address};TEL:{$phone};EMAIL:{$email};;";
    }
    
    /**
     * Content (gif, jpg, png, etc.) QR code
     *
     * @param string $type
     * @param string $size
     * @param string $content
     */
    public function content($type = null, $size = null, $content = null) {
        $this->codeData = "CNTS:TYPE:{$type};LNG:{$size};BODY:{$content};;";
    }
    
    /**
     * Generate QR code image
     *
     * @param int $size
     * @param string $filename
     * @return bool
     */
    public function qrCode($size = 200, $filename = null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->googleChartAPI);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "chs={$size}x{$size}&cht=qr&chl=" . urlencode($this->codeData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $img = curl_exec($ch);
        curl_close($ch);
    
        if($img) {
            if($filename) {
                if(!preg_match("#\.png$#i", $filename)) {
                    $filename .= ".png";
                }
                
                return file_put_contents($filename, $img);
            } else {
                header("Content-type: image/png");
                print $img;
                return true;
            }
        }
        return false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<style>
.head{
    margin-top: 80px;
}
@media print{
   .noprint{
       display:none;
   }
   .head{
       margin-top: -80px;
   }
   @page{
       size: landscape;
   }
}
</style>

<body>
    <?php 
    // session_start();
    include('../condb.php');
    include('../header.php');
    echo "<div class='noprint'>";
    include('./navbar.php');
    echo "</div>";
  
    @$dura_id = mysqli_real_escape_string($conn, $_GET['id']);
    @$id = substr($dura_id, 0,-5);
    $sql = "SELECT *  FROM `durable` WHERE `dura_id` LIKE '$id%' ORDER BY dura_id";
    $result = mysqli_query($conn, $sql) or die ("ERROR $sql" . mysqli_error());?>
    <div class="col-sm-12 noprint head" style='text-align: center;font-size: 25px;color: #000'>
        Print QR Code
    </div>
    <button onClick="window.print();" media="noprint" class="noprint">Print</button>
    <br class="noprint">
    <br class="noprint">
        <div class="row">
    <?php while($row = mysqli_fetch_array($result)){ ?>
           
            <div style="width: 20%;
            font-size: 13px;
             align-items: center;
             text-align: center;
            height: 33.74vh;
            background: none;
            border-radius: 10px;
            margin-top: 0px;
            "
            >
            
                <!-- <img src="./imgqrcode/<?php echo $row['dura_qr'] ?>" width="100%" onerror="myFunction('<?php echo $row['dura_id'] ?>')" style="margin-left: 0px" alt=""><br> -->

                <img src="https://chart.googleapis.com/chart?cht=qr&chl=<?php echo $row['dura_id'] ?>&chs=120x97&chld=L|0"
                        class="qr-code img-thumbnail img-responsive imgqrcodereal1" />

                <span><?php echo $row['dura_id'] ?></span><br>
            </div>

    <?php } ?>
    
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

function myFunction(data) {
    var data1 = data

   
}
</script>

</body>

</html>