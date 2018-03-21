<?php
$connect = mysqli_connect("localhost", "root", "", "RubyGarage");
if(isset($_POST["name"], $_POST["priority"]))
{
 $name = mysqli_real_escape_string($connect, $_POST["name"]);
 $priority = mysqli_real_escape_string($connect, $_POST["priority"]);
 $status = mysqli_real_escape_string($connect, $_POST["status"]);
 $project_id = mysqli_real_escape_string($connect, $_POST["project_id"]); 
 if (empty($priority)) {
	 $priority = 0;
 }
if (empty($status)) {
	 $status = 0;
 }
 if (empty($project_id)) {
	 $project_id = 0;
 }
 $debug1 = "priority=".$priority."<br>".$status."<br>".$project_id;
 $file = "debug1.txt";
// Пишем содержимое обратно в файл
  
 //$query = "INSERT INTO tasks(name, priority, status, project_id) VALUES('$name', '$priority', '$status', '$project_id')";
 $query = "INSERT INTO tasks(name, priority, status, project_id) VALUES('$name', $priority, $status, $project_id)";
 $debug1 .= "query=".$query;
 file_put_contents($file, $debug1);
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>
