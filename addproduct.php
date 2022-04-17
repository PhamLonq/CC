<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/addproduct.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
   <?php include ('header.php') ;?>
   
<div class="add">
   <div class="songadd">
<form action="" method="post" enctype="multipart/form-data">    
   <table border="1px">      
<tr>
   <td colspan="7">
   <h2>Add Product</h2>
   <div class="border_bottom"></div>
   </td>
</tr>
 
<tr>
   <td><b class="title">toy Name:</b></td>
   <td><input type="text" name="toy_name" ></td>
</tr>

<tr>
  <td><b class="title">Price: </b></td>
  <td><input type="text" name="songprice" ></td>
</tr>

<tr>
  <td><b class="title">Image: </b></td>
  <td><input type="file" name="toy_img" /></td>
</tr>
<tr>
   <td></td>
   <td colspan="7"><input type="submit" name="Upload" value="Add Product"/></td>
</tr>
   </table>
   </div>

   <div class="songlist">
   <table border="1px">
	<thead class="object">
		<tr>
			<td >toy id</td>
			<td >stoy name</td>
			<td >price</td>
         <td >toy image</td>
		<tr>
	</thead>
	<body>
    <?php
	session_start(); 
 ?>
	<?php 
    include ('connect.php') ;
    $spl= "SELECT * from song";
    $result = mysqli_query ($connect, $spl);
		 while ($data= mysqli_fetch_array($result)) {


	?>
		<tr class="tablelist">

			<td><?php echo $data['toy_id']; ?></td>
			<td><?php echo $data['toy_name']; ?></td>
			<td><?php echo $data['toy_price'] ?></td>
         <td><?php echo $data['toy_img'] ?></td>
         <td><button name="delete?"> delete</button> </td>
			
		</tr>
	<?php 

		}
	?>
	</tbody>
</table>
</div>
</div> 
</form>
</body>

<?php
include ('connect.php') ;
if(isset($_POST["Upload"])){
$toy_name = $_POST['songname'];
$stoy_price = $_POST['toy_price'];
$toy_img = $_FILES['toy_img']['name'];
$toy_img_tmp = $_FILES['toy_img']['tmp_name'];
move_uploaded_file($toy_img_tmp,"./images/$toy_img");

   $sql =  "INSERT INTO song VALUES (NULL,'$toy_name','$toy_price','$toy_img')";
   $insert_pro = mysqli_query($connect, $sql);
   
   if($insert_pro){
    echo "<script>alert('a new song has been added!')</script>";
    echo "<script>window.open('addproduct.php','_self')</script>";
   }
   else{
      echo"failed";
   }
}
?>





            

</html>
