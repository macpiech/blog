<?php
 
class blog
{
//konstruktor
private $dbConn;
function __construct($serverName, $userName, $password, $dbName )
{
  // Create connection
  $this-> dbConn = mysqli_connect($serverName, $userName, $password, $dbName);
  
  // Check connection
  if (!$this-> dbConn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
}
 
function dodaj($date, $intro, $readmore, $authors, $title){
$sql= "INSERT INTO Posts (postDate, postIntro, postReadmore, postAuthors, postTitle) VALUES ('$date','$intro','$readmore','$authors','$title')";
mysqli_query($this->dbConn, $sql);
mysqli_close($this->dbConn);
}
 
function usun($id){
$sql="DELETE FROM Posts where idPosts=$id;";
mysqli_query($this->dbConn, $sql);
mysqli_close($this->dbConn);
}
 
}
 
$blogTomka= new blog('localhost','root','root','blog3');

$action = $_GET['action'];



switch($action){
  case 'usun':
  $blogTomka->usun(1);
  break;
}
 
?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>
<body>
  <a href="index.php?action=usun&id=2">usun</a>
</body>
</html>