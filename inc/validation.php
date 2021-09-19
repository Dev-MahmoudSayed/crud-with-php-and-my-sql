<?php
$error =[];
$success = '';
function reqVal($value){
    return empty($value);
}
// sanitize string
function sanVal($value){
    $str = trim($value);
    $str = filter_var($str,FILTER_SANITIZE_STRING);
    return $str;
}


function numericVal($value)
{
    if( !is_numeric($value)){
        return false;
    }
    return true;
}
function minVal($value,$min)
{
    if(strlen($value) < $min){
        return true;
    }
    return false;
}

function maxVal($value,$max)
{
    if(strlen($value) > $max){
        return true;
    }
    return false;
}
function emailVal($email)
{
    if(filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        return true;
    }
    return false;
 }


?>