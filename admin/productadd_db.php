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


    include('../condb.php');
    $dura_name = mysqli_real_escape_string($conn, $_POST['name']);
    $money_id = mysqli_real_escape_string($conn, $_POST['money_id']);
    $agency_id = mysqli_real_escape_string($conn, $_POST['agency_id']);
    $type_id = mysqli_real_escape_string($conn, $_POST['type_id']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $kind_id = mysqli_real_escape_string($conn, $_POST['kind_id']);
    $des_id = mysqli_real_escape_string($conn, $_POST['des_id']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $qty = mysqli_real_escape_string($conn, $_POST['qty']);
    $typeunit = mysqli_real_escape_string($conn, $_POST['typeunit']);
    $cost = mysqli_real_escape_string($conn, $_POST['cost']);
    $date_id = mysqli_real_escape_string($conn, $_POST['date_id']);
    $use = mysqli_real_escape_string($conn, $_POST['use']);




    
    
    $date1 = substr($date , -2);
    $month1 = substr($date , -5,2);
    if($money_id == 1){
        $p = 'ผ.';
    }else{
        $p = 'รด.';
    }
    @$Year1 = $date + 543;
    $year = date("y", strtotime($Year1)); 
    $dura_date = $Year1 . '-' . $month1 . '-' . $date1;
    $dura_id_check = $money_id . '-' . $agency_id . '-' . $type_id . '-' . $category_id . $kind_id . $des_id . '/' . $p . $date_id . '-';
    $checksql = "SELECT MAX(dura_id) FROM `durable` WHERE dura_id LIKE '$dura_id_check%'";
    $resultcheck = mysqli_query($conn, $checksql);
    $rowcheck = mysqli_fetch_array($resultcheck);
    $check = mysqli_num_rows($resultcheck);
    if($check > 0 && isset($rowcheck[0])){
        $numst = substr($rowcheck[0], -3) ;
        $qty = $qty + $numst ;
        $numst += 1;
        
    }else{
        $numst = 1;
    }
    for($x = $numst ; $x <= $qty; $x++){
        if(strlen($x) == 1){
            $x1 = '00' . $x; 
        }elseif(strlen($x) == 2){
            $x1 = '0' . $x; 
        }elseif(strlen($x) == 3){
            $x1 = $x; 
        }
        $dura_id = $money_id . '-' . $agency_id . '-' . $type_id . '-' . $category_id . $kind_id . $des_id . '/' . $p . $date_id . '-' . $x1;
        $ud = './showqrcodeall.php?id=' . $dura_id;
        echo "<input type='text' id='du_id' value='$ud'  />";
        // include QR_BarCode class 
            // include('./QR_BarCode.php'); 

            // QR_BarCode object 
            // $qr = new QR_BarCode(); 

            // create text QR code 
            // $qr->text($dura_id); 
            //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
            // $numrand = (mt_rand(100000000000000, 999999999999999));



                // $qr->qrCode(350,'imgqrcode/' . $numrand . '.png' );
            // $qrcode1 = $numrand .'.png';
            $qrcode1 = '';
            

        $check = "SELECT * FROM durable WHERE dura_id = '$dura_id'";
        $resultcheck = mysqli_query($conn, $check) or die ("ERROR : $check" . mysqli_error());
        $num = mysqli_num_rows($resultcheck);
        if($num > 0){
            echo "<script>window.top.window.showResult('0');</script>";
        }else{
            $sql = "INSERT INTO durable SET dura_id = '$dura_id', dura_name = '$dura_name', type_id = '$type_id', dura_date = '$dura_date', dura_qty = '1', unit_id = '$typeunit' , dura_cost = '$cost' , agency_id = '$agency_id',
        category_id = '$category_id', kind_id = '$kind_id', dura_year = '$year', IVZ_FSNum = '', money_id = '$money_id', des_id = '$des_id', code_year = '$date_id', dura_qr ='$qrcode1', dura_use='$use' ";
        $result = mysqli_query($conn, $sql) or die ("ERROR : $sql" . mysqli_error());
        }
        
    }

    if($result){
        echo "<script>var du_id = document.getElementById('du_id').value</script>";
        echo "<script>window.top.window.showResult(du_id);</script>";
    }else{
        echo "<script>window.top.window.showResult('3');</script>";
    }
?>
