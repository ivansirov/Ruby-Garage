<?php
require_once 'config.php';
session_start();
$uName = $_POST['username'];
//$pWord = md5($_POST['pwd']);
$pWord = $_POST['pword'];
echo 'pword='+$pWord;
echo '<br>';
echo $qry;
if (empty($uName))
{
	echo "Поле username не должно быть пустым";
}
else
if (strlen($pWord)<8)
{
	echo "Поле password должно содержать минимум 8 симоволов";
}
else	
{	
$qry = "SELECT usrid, username, oauth FROM usermeta WHERE username='".$uName."' AND pass='".   $pWord."' AND status='active'";
$res = mysql_query($qry);
$num_row = mysql_num_rows($res);
$row = mysql_fetch_assoc($res);
if ($num_row == 1) {
	echo $qry;
 echo 'true';
 $_SESSION['uName'] = $row['username'];
 $_SESSION['oId'] = $row['orgid'];
 $_SESSION['auth'] = $row['oauth'];
 $url = "http://localhost/webslessonRuby/";
 //header('Location: '.$url);
 header('Location: '+$url);
 echo "<br>newurl=".$url;
 }
else {
	echo $qry;
 echo 'false';
}
}
?>