<?php
function abbrStr($s){
    if(strlen($s) > 10)
        return mb_substr($s,0,10,'utf8')."...";
    return $s;
}

function formatStr($s){
    for($i = 0; $i < strlen($s); $i++){
        $c = substr($s,$i,1);
        // if ($c == "<")
        //     $s = substr_replace($s,"&lt",$i,1);
        // else if ($c == ">")
        //     $s = substr_replace($s,"&gt",$i,1);
        // else if ($c == "&")
        //     $s = substr_replace($s,"&amp",$i,1);
        // else if ($c == " ")
        //     $s = substr_replace($s,"&nbsp",$i,1);
        if ($c == " ")
            $s = substr_replace($s,"&nbsp",$i,1); 
    }
    $s = nl2br($s);
    return $s;
}