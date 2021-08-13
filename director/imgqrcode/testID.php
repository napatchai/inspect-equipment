<?php 
    $first = "U113";
    echo $first;
    echo "<hr>";
    $str = substr($first, 1,3);
    echo $str;
    echo "<hr>";
    $plus = $str + 1;
    echo $plus;
    echo "<hr>";
    if(strlen($plus) == 1){
        $echo = 'U00' . $plus;
    }elseif (strlen($plus) == 2){
        $echo = 'U0' . $plus;
    }elseif (strlen($plus) == 3){
        $echo = 'U' . $plus;
    }
    echo $echo;
?>
