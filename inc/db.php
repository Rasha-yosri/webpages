<?php
$db= new mysqli("localhost","root","","phpproject");

if($db->connect_errno){
    echo"falied";
    exit();
}
?>