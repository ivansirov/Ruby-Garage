<?php
$connect = mysqli_connect("localhost", "root", "", "RubyGarage");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM tasks WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>
