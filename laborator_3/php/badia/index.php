<?php
function first($g,$n=1){
    $t = [];
    for ($i=0;$i<$n;$i++) $t[]=$g[$i];
    return $t;
}

var_dump(first([7, 9, 0, -2]));
var_dump(first([7, 9, 0, -2], 3));

function union($g,$o){
    $p=[];
    foreach($g as $v){
        if(!in_array($v,$p))$p[]=$v;
        foreach($o as $v1)if(!in_array($v1,$p))$p[]=$v1;
    }
    return $p;
}

var_dump(union([1, 2, 3], [100, 2, 1, 10]));

function rangeBetwee($s,$f){
$p=[];
for($s=$s;$s<=$f;$s++)$p[]=$s;
return $p;
}

var_dump(rangeBetwee(-4, 7));
