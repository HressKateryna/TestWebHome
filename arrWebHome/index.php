<?php
//$arr = array(
//    array(1, 2, 3, 4),
//    array(10, 11, 12, 5),
//    array(9, 8, 7, 6)
//);

//$arr = array(
//    array(1, 2, 3, 4),
//    array(12, 13, 14, 5),
//    array(11, 16, 15, 6),
//    array(10, 9, 8, 7)
//);

$arr = array(
    array(1, 2, 3, 4, 5, 6),
    array(16, 17, 18, 19, 20, 7),
    array(15, 24, 23, 22, 21, 8),
    array(14, 13, 12, 11, 10, 9)
);

$n = 6;
$m = 4;


$num = 0;

$p = $m;
$q = $n;

$i = 0;
$j = 0;
$c = 0; //i сверху
$r = $n - 1; //j справа
$l = $m - 1; //i снизу
$w = 0; //j слева

$d = 1;

while ($num < $m*$n){

    if ($c == $n - $q){
        for ($j = $c ; $j < $q; $j++){
            print ($arr[$c][$j]);
            print (" ");
            $num++;
            if ($num >= $m*$n) break;
        }
    }


    if ($r == $q - 1){
        for ($i = $d; $i <= $l-1; $i++){
            print ($arr[$i][$r]);
            print (" ");
            $num++;
            if ($num >= $m*$n) break;
        }
    }

    if ($l == $p - 1){
        for ($j = $l+1; $j >= 0; $j--){
            print ($arr[$l][$j]);
            print (" ");
            $num++;
            if ($num >= $m*$n) break;
        }
    }

    if ($w == $m - $p){
        for ($i = $p - 2; $i >= (($m - $p) + 1); $i--){
            print ($arr[$i][$w]);
            print (" ");
            $num++;
            if ($num >= $m*$n) break;
        }
    }

    $w++;
    $q--;
    $p--;
    $c++;
    $l--;
    $r--;
}
