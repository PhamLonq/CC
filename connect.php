
<?php
$servername = "3.132.234.157";
$username ="long";
$password="long";
$database = "mmusicapp";
$connect = mysqli_connect($servername, $username,$password,$database);
if(!$connect){
 echo"failed to connect";
}
else{
 echo"";
}
?>


