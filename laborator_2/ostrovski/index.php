<?php

printf("Am intirziat cu prezentarea laboratorului. Imi cer scuze.");
function a3($n){
    if ($n==1) return $n;
    return (2*$n-1)+a3($n-1);
}
printf("<br>" . a3(5));

function b3($n){
    if ($n==1) return 2;
    return (2*$n)+b3($n-1);
}
printf("<br>" . b3(5));

function c3($n){
    if ($n==1) return 2;
    return (3*$n-1)+c3($n-1);
}
printf("<br>" . c3(5));

function d3($n){
    if ($n==1) return $n;
    return (4*$n-3)+d3($n-1);
}
printf("<br>" . d3(5));

function e3($n){
    if ($n==1) return 0.5;
    return (1/(5*$n-3))+e3($n-1);
}
printf("<br>" . e3(5));

function f3($n){
    if ($n==1) return 1/3;
    return (1/(5*$n-2))+f3($n-1);
}
printf("<br>" . f3(5));

function g3($n){
    if ($n==1) return 1/3;
    return (pow($n,-1)*(1/pow($n,2)))+g3($n-1);
}
printf("<br>" . g3(5));

function S($n){
    if ($n<=0) return 0;
    return $n+S($n-1);
}
printf("<br>" . S(5));

function r9($n){
    if ($n==0) return 0;
    if ($n==1) return 1;
    return (r9($n-1)+r9($n-2));
}

printf("<br>");
for($i=0;$i<5;$i++){
    printf(r9($i).",");
}
printf("<br>");

function d9($n){
    $o = $l = 0;
    $p = 1;
    $ns = [];
    while ($l < $n) {
        $ns[] = $o;
        $n_3 = $p + $o;
        $o = $p;
        $p = $n_3;
        $l = $l + 1;
    }
    return $ns;
}
printf("<br>" . json_encode(d9(5)));

function ac($o, $p){
    if ($o==0) return $p+1;
    if ($p==0) return ac($o-1,1);
    if ($o>0&&$p>0) return ac($o-1,ac($o,$p-1));
}
printf("<br>" . ac(1, 1));

function h($n){
    if ($n>12) return $n-1;
    if ($n<=12) return h(h($n+2));
    return 0;
}
printf("<br>" . h(5));
