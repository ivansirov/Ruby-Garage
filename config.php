<?php
$con = mysql_connect('localhost','root','') or die(mysql_error());

if (!$con) {
    echo "Unable to connect to DB: " . mysql_error();
    exit;
}

if (!mysql_select_db("RubyGarage")) {
    echo "Unable to select mydbname: " . mysql_error();
    exit;
}

$con = mysql_connect('localhost','root','') or die(mysql_error());
 
if (!$con) {
    echo "Unable to connect to DB: " . mysql_error();
    exit;
}
 
if (!mysql_select_db("RubyGarage")) {
    echo "Unable to select mydbname: " . mysql_error();
    exit;
}
?>