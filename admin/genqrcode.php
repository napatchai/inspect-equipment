<?php 
// include QR_BarCode class 
include('./QR_BarCode.php'); 

// QR_BarCode object 
$qr = new QR_BarCode(); 
$gha = "llllllaaaaa";
// create text QR code 
$qr->text($gha); 
$test = 'gen1';
// $qr->qrCode(350,'images/cw-qr.png');
$qr->qrCode(350,'imgqrcode/' . $test . '.png' );
// display QR code image


?>