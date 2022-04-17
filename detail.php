<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Detail.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <title>song detail</title>
</head>
<body>
  <?php 
  include('header.php');
  ?>
<div class="row">
<?php
include('connect.php');
    $id = $_GET["id"];
    $sql = "SELECT * FROM song where toy_id = '$id'";
    $result = mysqli_query($connect, $sql);
    while($row_toy= mysqli_fetch_array($result))
{
  $toy_id = $row_toy['toy_id'];
  $toy_name= $row_toy['toy_name'];
  $toy_img = $row_toy['toy_img'];
  $toy_price = $row_toy['toy_price'];                                       
?> 
         
<div class="player">
  <div class="songdetail-lyric">
 <div class="song-detail">  
  <!-- Define the section for displaying details -->
  <div class="details">
    <div class="now-playing"></div>
    <br>
    <img class="card-img-top" src="images/<?php echo"toy_img" ?>" alt="Card image cap">
    <br>
    <div class="track-name"><?php echo"$toy_name" ?></div>
    <div class="track-artist"></div>
    <br>
  </div>

  <!-- Define the section for displaying track buttons -->
  
  </div>  
  <div class="lyric"><?php echo"$toy_name" ?></div>
  </div>
  <!-- Define the section for displaying the seek slider-->
  <br>
  <div class="slider_container">

  </div>
  <!-- Define the section for displaying the volume slider-->
  



<!-- Load the main script for the player -->
<script src="main.js"></script>
<?php } ?>
</div>
</body>
</html>