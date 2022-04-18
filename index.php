<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header">
        <div class="logo">
            <a href="index.php"> <img  src="images/logo1.jpg" alt=""></a>
        </div>
         <div class="menu">
            <li><a href="imdex.php">MAIN PAGE</a>
            <li><a href="">BILLBOARD</a></li>
            <li><a href="login.php">LOG OUT</a></li>
        </div>

        <div class="wrap">
   <div class="search">
      <input type="text" class="searchTerm" placeholder="What are you looking for?">
      <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
   </div>
</div>

<?php 
include('connect.php');
if(isset($_SESSION['username'])){
    $a = $_SESSION['username'];
    ?>

<div class="login"><a href="login.php"><?php echo "Welcome $a"; ?></a></div>
<?php
}
?>
    </header>
<!-----------------slider------------------------->
<div class="body">
<div class="slider">
    <section id="slider">
        <div class="aspect-ratio-169">
            <img class="sl1" src="images/slide1.jpg">
            <img class="sl2" src="images/slide2.jpg">
            <img class="sl3" src="images/slide3.jpg">
            <img class="sl4" src="images/slide4.jpg">
        </div>

        <div class="dot-container">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </section>
</div>
    <!-----------------app-container------------------------->

     
 
  <!-----------------product-card------------------------->
  <div class="container">
	<div class="row mt-5">
        <br>
        <br>
		<a class="list-product-title">New toy</a>

		</div>

        <br>
		<div class="">
			<div class="row">
            <?php 
            include ('connect.php') ;
		    $spl= "SELECT * from song";
            $result = mysqli_query ($connect, $spl);
            while ($row_toy = mysqli_fetch_array($result))
			{
                $toy_id = $row_toy['toy_id'];
                $toy_name= $row_toy['toy_name'];
                $toy_img = $row_toy['toy_img'];
                $toy_price = $row_toy['toy_price'];
                ?>
<div class="card-product d-flex justify-content-center mt-50 mb-50">
    <div class="row">
        <div class="col-md-2 mt-2 mr-2">
            <div class="card">
                <div class="card-body">
                    <div class="card-img-actions" > <a href=""><img src=images/<?php echo"$toy_img" ?> style="width: 199px;" alt=""> </a></div>
                </div>
                <div class="card-body bg-light text-center">
                    <div class="mb-2">
                        <p class="font-weight-semibold " class="text-default mb-2"><?php echo"$toy_name"?> </p>
                    </div>
                    <br>
                    <p class="mb-0 font-weight-semibold "><?php echo"$toy_price" ?></p>
                    <br>
                    <div class="button">
                     <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"><a href="detail.php?id=<?php echo"$toy_id" ?>" style="color:white">View detail</a></i></button>
                     <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"><a href="">Buy now</a></i> </button>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>				
			</div>
		</div>
	</div>
</div>
</div>



</body>
<script>
    const header = document.querySelector("header")
 window.addEventListener("scroll",function(){
     x=window.pageYOffset
     if(x>0){
         header.classList.add("sticky")
     }
     else{
        header.classList.remove("sticky")
     }
    
   
 })




    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
    const imgContainer = document.querySelector(".aspect-ratio-169 ")
    const dotItem = document.querySelectorAll(".dot")
    let index=0
    let imgNuber = imgPosition.length
    //
    imgPosition.forEach(function(image,index){
        image.style.left=index*100+"%"
        dotItem[index].addEventListener("click",function(){
        slider(index)
        })
    })
    function imgSlide (){
        index++;
        console.log(index)
        if(index>=imgNuber){index=0}
        slider (index)
    }
    function slider (index){
        imgContainer.style.left = "-" +index*100+ "%"
        const dotAtive= document.querySelector(".active")
        dotAtive.classList.remove("active")
        dotItem[index].classList.add("active")
    }
    setInterval(imgSlide,4000)
</script>
</html>