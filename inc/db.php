<?php

$con = mysqli_connect("localhost","root","","pro_1");
if(!$con)
{
    die("error :".mysqli_connect_error());
}