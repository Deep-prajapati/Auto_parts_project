<?php 

function slug($name){
    $specialChars = array("`","#","@","%","^","&","*","(",")","_","-","=","+","!");
    $cleanString = str_replace($specialChars, '', $name);
    $result = str_replace(" " , "-" , $cleanString);

    return $result;
}